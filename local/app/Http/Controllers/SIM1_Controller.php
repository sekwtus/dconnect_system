<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use App\sim1_data_log;
use App\sim1_lose_time;

class SIM1_Controller extends Controller
{
  // ! SIM1
  public function sim1($order) {
    $group_topic = DB::table('sim1_lose_case')->select('*')->groupBy('topic_id')->get();

    $lose_cases = DB::table('sim1_lose_case')->select('*')->where('branch_id',Auth::user()->id_type_branch )->get();
    if (Auth::user()->id_type_branch == 3) {
      $lose_cases = DB::table('sim1_lose_case')->select('*')->get();
    }

    $period_time = DB::table('sim1_period_time')->select('*')->get();
    // $line_master = DB::table('type_line')->select('*')->groupBy('line_number')->get();
    $branch_user = DB::table('type_branch')->select('*')->where('id' , Auth::user()->id_type_branch )->first();
    $order_detail = DB::select("SELECT
          SAP_ProductionOrders_Header.*,
          SAP_ProductionOrders_Operation.resource,
          SAP_ProductionOrders_Operation.operation_number,
          SAP_MaterialMaster_Description.material_description,
          type_line.line_number
      FROM
          SAP_ProductionOrders_Header
          LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
          LEFT JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
          LEFT JOIN type_line ON SAP_ProductionOrders_Operation.resource = type_line.type_line
      WHERE SAP_ProductionOrders_Header.production_order = '$order'
      ORDER BY SAP_ProductionOrders_Header.createdon");

    $get_time = sim1_lose_time::select('*')->where(['production_order'=>$order , 'status' => 'start'])->orderBy('id','DESC')->first();

    $time_start = isset($get_time) ? $get_time->date_time_start_meeting : '';
    
    return view('D-SIM.sim1.index',compact('group_topic' , 'lose_cases' , 'period_time' , 'branch_user' ,'order' ,'order_detail','time_start'));
  }

  public function send_lose_case(Request $req ){
      $sim1_data = new sim1_data_log;
      $sim1_data->lose_case_id = $req->lose_case_id;
      $sim1_data->lose_time = $req->lose_time;
      $sim1_data->time_period = $req->time_period;
      $sim1_data->line = $req->line;
      $sim1_data->department = $req->department_id;
      $sim1_data->user_id = Auth::user()->id;
      $sim1_data->production_order = $req->production_order;
      $sim1_data->description = $req->description;
      $sim1_data->save();
      return redirect()->back()->with('message', 'บันทึกสำเร็จ');;
  }

  public function order_today(Request $request)
  {
      return view('D-SIM.SIM1.order_today');
  }

  public function order_report()
  {
      $line = DB::table('type_line')->select('*')->where('status','1')->get();
      return view('D-SIM.SIM1.report_data_log',compact('line'));
  }

  public function get_sim1_data_log(Request $req)
  { 
    $where_line = '';
    if ($req->line_number != 0) {
        $where_line = 'AND sim1_data_log.line = '.$req->line_number;
    }

      $sim1_data_log = DB::select("SELECT
            sim1_data_log.id,
            sim1_data_log.production_order,
            sim1_data_log.lose_case_id,
            sim1_data_log.lose_time,
            sim1_data_log.time_period,
            sim1_data_log.line,
            sim1_data_log.department,
            sim1_data_log.user_id,
            sim1_data_log.description,
            sim1_data_log.created_at,
            sim1_data_log.updated_at,
            sim1_lose_case.topic_id,
            sim1_lose_case.topic,
            sim1_lose_case.detail,
            sim1_period_time.period,
            type_branch.type_branch,
            type_line.line_number 
          FROM
            sim1_data_log
            LEFT JOIN sim1_lose_case ON sim1_data_log.lose_case_id = sim1_lose_case.id_lose_case
            LEFT JOIN sim1_period_time ON sim1_data_log.time_period = sim1_period_time.id
            LEFT JOIN type_branch ON sim1_data_log.department = type_branch.id
            LEFT JOIN type_line ON sim1_data_log.line = type_line.id
          WHERE DATE_FORMAT(sim1_data_log.created_at,'%d/%m/%Y') = ?
          $where_line
      ", [$req->date_spec]);  

      return Datatables::of($sim1_data_log)->addIndexColumn()->make(true);
  }

  public function get_data_chart(Request $req)
  {
    $where_line = '';
    if ($req->line_number != 0) {
        $where_line = 'AND sim1_data_log.line = '.$req->line_number;
    }
    
      $sim1_data_log = DB::select("SELECT
            sim1_period_time.id,
            sim1_period_time.period,
            sum( sim1_data_log.lose_time ) AS sum_lose_time 
          FROM
            sim1_period_time  
            LEFT JOIN sim1_data_log ON sim1_data_log.time_period = sim1_period_time.id 
            AND DATE_FORMAT(sim1_data_log.created_at,'%d/%m/%Y') = ? $where_line
          GROUP BY
            sim1_period_time.id 
          ORDER BY
            sim1_period_time.id ", 
        [$req->date_spec]);

      $period_time = DB::table('sim1_period_time')->select('*')->get();
      foreach ($sim1_data_log as $key => $data_log) {
        $arr_period_time[] = $data_log->period;
        $arr_sum_lose_time[] = $data_log->sum_lose_time == null ? 0 : intval($data_log->sum_lose_time);
      } 
      
      return array($arr_period_time,$arr_sum_lose_time);
  }

  public function set_time_start(Request $req){
      $get_time = sim1_lose_time::select('*')
      ->where(['production_order'=>$req->order , 'status' => 'start' ,'id_user' => Auth::user()->id ])
      ->orderBy('id','DESC')->first();

      if (isset($get_time)) {
        return response()->json([
          'msg' => 'จับเวลาต่อเนื่อง  '.$get_time->date_time_start_meeting ,
          'time' => $get_time->date_time_start_meeting,
        ]);
      } else {
        $set_time = new sim1_lose_time;
        $set_time->production_order = $req->order;
        $set_time->date_time_start_meeting = $req->time_now;
        $set_time->id_user = Auth::user()->id;
        $set_time->status = 'start';
        $set_time->save();
        
        return response()->json([
          'msg' => 'บันทึกเวลา  '.$req->time_now ,
          'time' => $req->time_now,
        ]);
      }
  }

  public function set_time_stop(Request $req){

        $set_time = sim1_lose_time::select('*')
        ->where(['production_order'=>$req->order , 'status' => 'start','id_user' => Auth::user()->id])
        ->orderBy('id','DESC')->first();
        $set_time->date_time_stop_meeting = $req->time_now;
        $set_time->status = 'stop';
        $set_time->save();
        
        return response()->json([
          'msg' => 'บันทึกเวลาหยุด  '.$set_time->date_time_stop_meeting ,
          'time_start' => $set_time->date_time_start_meeting,
          'time_stop' => $set_time->date_time_stop_meeting,
        ]);
  }
  

}

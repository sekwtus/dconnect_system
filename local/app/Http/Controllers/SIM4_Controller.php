<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use Carbon\Carbon;
use DB;
use Auth;
use App\SIM_information;

use App\SIM_PDCA;
use App\SIM_master;
use App\SIM_department;
use App\sim4_master;
use App\sim4_user_meeting;
use DataTables;
use App\SIM4_data_log;
use Svg\Tag\Rect;
use App\sim4_meeting_time;
use App\SIM3_information_sharing; 

class SIM4_Controller extends Controller
{
  
  public function index_sim4() {
    $sim4_master = DB::table('sim4_master')->orderBy('grouping')->get();

    $users = DB::table('sim4_user')->get();
    $sim_department = DB::table('SIM_department')->get();

    $type_line = DB::table('type_line')->where('status','1')->get();

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    return view('D-Sim/sim4/index', compact(
      'users' ,'sim4_master',
      'sim_department',
      'type_line'
    ));
  }

  // ดึงรายชื่อผู้เข้าร่วมประชุม sim4
  public function get_sim4_user(Request $req) {
    $sim4_department = DB::table('SIM_department')->get();

    $sim4_user = DB::select("SELECT
      sim4_user.id,
      sim4_user.`name`,
      sim4_user.department_id,

      sim4_user_meeting.user_id as user_checked,
      sim4_user_meeting.save_date,
      sim4_user_meeting.created_at 

      FROM sim4_user
      
      LEFT JOIN sim4_user_meeting ON sim4_user_meeting.user_id = sim4_user.id 
        AND DATE_FORMAT(save_date, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')

      ORDER BY 
      sim4_user.id ASC
    ", []);

    $department_tab = '';
    foreach ($sim4_department as $department) {
      $department_tab.= '<li class="nav-item">';
        $department_tab.= '<a class="nav-link'.($department->dep_key=='PL' ?' active' :'').'" data-toggle="tab" href="#tab_department'. $department->department_id .'" role="tab">';
          $department_tab.= "<span class='hidden-sm-up'>
            <i class='ti-home'></i></span>
            <span class='hidden-xs-down'>แผนก $department->dep_key
          </span>";
        $department_tab.= '</a>';
      $department_tab.= '</li>';
    }

    $sim4_user_meeting = '';
    foreach ($sim4_department as $department) {
      $sim4_user_meeting.= '<div class="tab-pane'.($department->dep_key=='PL' ?' active' :'' ).'" id="tab_department'. $department->department_id .'" role="tabpanel">';
        $sim4_user_meeting.= '<div class="p-2">';
          $sim4_user_meeting.= '<h3> แผนก '. $department->department_name .'</h3>';
          $sim4_user_meeting.= '<input type="hidden" name="txt_dapartment_id[]" value="'.$department->department_id.'">';

          $sim4_user_meeting.= '<div class="row">';
            foreach ($sim4_user as $emp) {
              if ($emp->department_id == $department->department_id) {
                $sim4_user_meeting.= '<div class="col-md-6">';
                  // $sim4_user_meeting.= '<input type="checkbox" name="chkUserMeeting[]" value="'. $emp->id.'" id="chk_emp'.$emp->id.'" class="check" data-checkbox="icheckbox_square-blue" '.(isset($emp->user_checked) ?'checked' :'').' >';
                  // $sim4_user_meeting.= '<label for="chk_emp'. $emp->id .'" class="pl-1">'. $emp->name .'</label>'; //,'.$emp->department_id .'
                  $sim4_user_meeting.= '<div class="custom-control custom-checkbox mr-sm-2">';
                    $sim4_user_meeting.= '<input type="checkbox" name="chkUserMeeting[]" value="'. $emp->id.'" id="chk_emp'.$emp->id.'" class="custom-control-input" '.(isset($emp->user_checked) ?'checked' :'').' >';
                    $sim4_user_meeting.= '<label for="chk_emp'. $emp->id .'" class="custom-control-label">'. $emp->name .'</label>'; //,'.$emp->department_id .'
                  $sim4_user_meeting.= '</div>';
                $sim4_user_meeting.= '</div>';
              }
            }
          $sim4_user_meeting.= '</div>';
        $sim4_user_meeting.= '</div>';

      $sim4_user_meeting.= '</div>';
    }

    return response()->json([
      'department_tab' => $department_tab,
      'sim4_user_meeting' => $sim4_user_meeting,
    ]);
  }

  // บันทึกชื่อผู้เข้าร่วมประชุม sim4
  public function save_sim4_user_meeting(Request $req) {
    // return implode(',', $req->chkUserMeeting);
    if(isset($req->chkUserMeeting)) {
      foreach ($req->chkUserMeeting as $i => $user_id) {
        // $arr_value = explode(',', $value);
        // $user_id = $arr_value[0];
        // $dapartment_id = $arr_value[1];

        $user_meeting = sim4_user_meeting::where([ 
          'user_id' => $user_id,
          'save_date' => date_format(now(), 'Y-m-d')
        ])->first();

        if(!$user_meeting) {
          $user_meeting = new sim4_user_meeting();
        }

        $dep_user = DB::table('sim4_user')->where('id',$user_id)->first();

        $user_meeting->user_id = $user_id;
        $user_meeting->department_id = $dep_user->department_id;
        $user_meeting->save_date = now();

        $user_meeting->save();
      }

      $sql_delete = "DELETE FROM sim4_user_meeting WHERE sim4_user_meeting.user_id not in(".implode(',', $req->chkUserMeeting).") AND sim4_user_meeting.save_date='".date_format(now(), 'Y-m-d')."'"; 
      $delete_user_meeting = DB::delete($sql_delete);

      $msg = 'บันทึกข้อมูลสำเร็จ';
    
    } else {
      $msg = 'กรุณาเลือกชื่อผู้เข้าร่วมประชุมก่อนทำการบันทึก';
    }

    return response()->json([
      'msg' => $msg,
      'chkUserMeeting' => isset($req->chkUserMeeting) ?implode(',', $req->chkUserMeeting) :'no checkbox',
      'sql_delete' => isset($sql_delete) ?$sql_delete :'no sql delete',
    ]);
    // return $sim4_master;
  }

  // ตั้งค่า sim4 ดึงข้อมูลของแต่ละหัวข้อขึ้นมา
  public function get_sim4_setting(Request $req) {
    $sim4_master = sim4_master::where(['topic_id'=>$req->topic_id])->first();

    return response()->json([
      'sim4_master' => $sim4_master,
      // 'sim4_user_meeting' => $sim4_user_meeting,
    ]);
  }

  // update ตั้งค่า sim4
  public function update_sim4_setting(Request $req) {
    $sim4_master = sim4_master::where(['topic_id'=>$req->topic_id])->first();

    $sim4_master->topic_eng = $req->topic_eng;
    $sim4_master->topic_detail = $req->topic_detail;
    $sim4_master->kpi = $req->kpi;
    $sim4_master->standard_rate = $req->standard_rate;
    $sim4_master->unit = $req->unit;

    $sim4_master->first_column = $req->first_column;
    $sim4_master->total_type_value = $req->total_type_value;

    $sim4_master->gauge_color1 = $req->gauge_color1;
    $sim4_master->gauge_color2 = $req->gauge_color2;
    
    $sim4_master->min_value = $req->min_value;
    $sim4_master->max_value = $req->max_value;
    $sim4_master->step_size = $req->step_size;
    $sim4_master->line_color = $req->line_color;
    $sim4_master->show_line = $req->show_line;
    $sim4_master->score_decimals = $req->score_decimals;
    $sim4_master->save();

    return response()->json([
      'msg' => 'บันทึกข้อมูลสำเร็จ',
      'sim4_master' => $sim4_master, // req->all(),
      // 'sim4_user_meeting' => $sim4_user_meeting,
    ]);
  }


  public function get_data_table(Request $req){
    $sim4_department = DB::table('SIM_department')->get();
    
    $weeks = array ( 
      // Every array will be converted 
      // to an object 
              array( 
              "shot" => "W1", 
              "full" => "January"
          ),  array( 
              "shot" => "W2", 
              "full" => "February"
          ),  array( 
              "shot" => "W3", 
              "full" => "March"
          ),  array( 
              "shot" => "W4", 
              "full" => "April"
          ),  array( 
              "shot" => "W5", 
              "full" => "May"
          ),  array( 
              "shot" => "W6", 
              "full" => "June"
          ),
    ); 
      // Function to convert array into JSON 
    $weeks = json_encode($weeks);
    $weeks = json_decode($weeks);

    $type_line = DB::table('type_line')->where('status','1')->get();
    
    // return $req->sim4_master['topic_id'];
    $days_week = "'";
    for ($i=0; $i < count($req->arr_day_week) ; $i++) { 
      $days_week = $days_week . substr($req->arr_day_week[$i],6,4).':'.substr($req->arr_day_week[$i],3,2).':'.substr($req->arr_day_week[$i],0,2) . "','";
    }
    $days_week = substr($days_week, 0, -2);

    // return $req;

    $sim4_data_log = DB::select("SELECT
      -- type_line.line_number,
      -- type_line.type_line,

      SIM4_data_log.sim4_master_id,
      SIM4_data_log.week,
      SIM4_data_log.month,
      SIM4_data_log.score,
      SIM4_data_log.save_date,

      sim4_master.topic_eng

      FROM SIM4_data_log

      -- INNER JOIN SIM4_data_log ON SIM4_data_log.line_number = type_line.line_number
      INNER JOIN sim4_master ON SIM4_data_log.sim4_master_id = sim4_master.id_sim4

      WHERE 1
        AND SIM4_data_log.sim4_master_id = ?
        AND SIM4_data_log.save_date IN ($days_week)
    ", [$req->sim4_master['id_sim4']]);

    $arr_sim4_data_log = [];

    foreach($weeks as $index_dept=>$week) {
      array_push($arr_sim4_data_log, [
        'dept'=>$week->shot,
        'dept_id'=>$week->shot,
        // 'score_Sun'=>0,
        'jan'=>0,
        'feb'=>0,
        'mar'=>0,
        'apr'=>0,
        'may'=>0,
        'jun'=>0,
        'jul'=>0,
        'aug'=>0,
        'oct'=>0,
        'sep'=>0,
        'nov'=>0,
        'dec'=>0,
        
      ]);

      foreach($sim4_data_log as $index_data_log=>$data_log) {
        if( ($week->shot == $data_log->week) ) { 
          $arr_sim4_data_log[$index_dept][$data_log->month] = floatval( $data_log->score );
        }
      }

    }
    

    // { topic:'safety", dept:'PL', sun:1, mon:2}
    // return ($arr_sim4_data_log);
    return DataTables::of($arr_sim4_data_log)->toJson();
  }

  public function sim4_data_save(Request $req){
      $arr_data = [
        'sim4_master_id' => $req->sim4_master_id,
        'week' => $req->save_week,
        'month' => $req->save_month,
        'user_id' => $req->user_id,
        'save_date' =>  substr($req->save_date,6,4).':'.substr($req->save_date,3,2).':'.substr($req->save_date,0,2),
        'plan_date' => $req->plan_date,
        'score' => $req->score,
        'problem_description' => $req->problem_description,
        'root_cause' => $req->root_cause,
        'solution' => $req->solution,
        'created_at' => now(),
      ];
      if ($req->hasFile('txtDescFile')){
          $file_names = Auth::user()->id .'_'. Carbon::now()->toDateString() .'_' . Str::random() . '.' . $req->file('txtDescFile')->getClientOriginalExtension();
          $req->file('txtDescFile')->move('assets/sim4_file', $file_names);
          
          $arr_data['file_name'] = $file_names;
      }

      // $sim4_data = new SIM3_data_log;
      $sim4_data = SIM4_data_log::updateOrCreate(
        [ 'id' => $req->id],
        $arr_data
      );
  
      return response()->json([
        'msg'=>'บันทึกสำเร็จ',
      ]);
  }

  public function get_data_modal(Request $req){
    $arr_condition = [
      'sim4_master_id'=>$req->sim4_master_id,
      'save_date'=> substr($req->save_date,6,4)."-".substr($req->save_date,3,2)."-".substr($req->save_date,0,2),
      'week'=>$req->week,
      'month'=>$req->month,
    ];
    
    
    $data_log = DB::table('SIM4_data_log')
      ->where($arr_condition)
    ->get();

    return response()->json(['SIM4_data_log'=> $data_log]);
  }

  public function get_data_log(Request $req){ //pdca

    $data_log = DB::table('SIM4_data_log')
      ->where([
              'id'=>$req->PDCA_id,
              ])
              
      ->get();

      return $data_log;
  }

  public function save_modal_sim4_PDCA(Request $req){
    $arr_data = [
      'plan_date' => $req->plan_date_pdca,
      'do_date' => $req->do_date,
      'check_date' => $req->check_date,
      'action_date' => $req->action_date,
      'problem_description' => $req->problem_description_modal,
      'root_cause' => $req->root_cause_modal,
      'solution' => $req->solution_modal,
      'user_id' => $req->user_id_pdca,
    ];
    if ($req->hasFile('txtDescFile_pdca')){
        $file_names = Auth::user()->id .'_'. Carbon::now()->toDateString() .'_' . Str::random() . '.' . $req->file('txtDescFile_pdca')->getClientOriginalExtension();
        $req->file('txtDescFile_pdca')->move('assets/sim4_file', $file_names);
        
        $arr_data['file_name'] = $file_names;
    }

    // $sim4_data = new SIM3_data_log;
    $sim4_data = SIM4_data_log::updateOrCreate(
        [ 'id' => $req->id_sim4_data_log],
        $arr_data
    );

    return $req;
  }

  public function get_table_pdca(){
    $data_pdca = DB::table('SIM4_data_log')
    ->select('*','SIM4_data_log.id as sim4_log_id')
    ->leftJoin('sim4_user', 'SIM4_data_log.user_id', '=', 'sim4_user.id')
    ->leftJoin('sim4_master', 'SIM4_data_log.sim4_master_id', '=', 'sim4_master.id_sim4')
    ->whereNotNull(['problem_description'])
    ->orWhereNotNull(['root_cause'])
    ->orWhereNotNull(['solution'])
    ->orderBy('save_date', 'DESC')
    ->orderBy('sim4_log_id', 'DESC')
    ->get();

    return DataTables::of($data_pdca)->toJson();
  }

  public function get_time_stop(){
    $sim4_meeting_time = DB::table('sim4_meeting_time')
    ->where('id_user' , Auth::user()->id )
    ->orderBy('id', 'DESC')
    ->first();

    return response()->json(['sim4_meeting_time'=> $sim4_meeting_time]);
  }

  public function save_modal_time_counter(Request $req){

    
    $sim4_meeting_time = new sim4_meeting_time;
    $sim4_meeting_time->date_time_start_meeting = $req->time_now;
    // $sim4_meeting_time->date_time_start_meeting = now();
    $sim4_meeting_time->id_user = Auth::user()->id;
    $sim4_meeting_time->time_counter = $req->time_counter;
    $sim4_meeting_time->save();
    return $req->time_counter;
  }

  public function delete_sim4_data_log(Request $req){
      DB::table('SIM4_data_log')->where('id',$req->sim4_log_id)->delete();
      return $req;
  }
  

  function get_table_information_sharing(){
    $data = DB::select("SELECT * FROM SIM3_information_sharing WHERE SIM3_information_sharing.created_at >= CURRENT_DATE - INTERVAL '30' DAY ORDER BY SIM3_information_sharing.created_at DESC");
    return DataTables::of($data)->toJson();
  }

  function save_information_sharing(Request $req){
        $info_sharing = new SIM3_information_sharing;
        $info_sharing->topic = $req->topic;
        $info_sharing->description = $req->description;
        $info_sharing->save_date = $req->save_date_info_sharing;
        $info_sharing->save();
        return $req;
  }

  public function delete_sim4_information_sharing(Request $req){
    DB::table('SIM3_information_sharing')->where('id',$req->id)->delete();
    return $req;
  }

  public function report_user_meeting(Request $request)
  {
    $user_meeting = DB::select("SELECT
        sim4_user.`name`,
        DATE_FORMAT( sim4_user_meeting.save_date, '%d/%m/%Y' ) AS save_date,
        sim4_user_meeting.created_at,
        SIM_department.department_name 
      FROM
        sim4_user_meeting
        LEFT JOIN sim4_user ON sim4_user_meeting.user_id = sim4_user.id
        LEFT JOIN SIM_department ON sim4_user_meeting.department_id = SIM_department.department_id 
      WHERE
        DATE_FORMAT( sim4_user_meeting.save_date, '%d/%m/%Y' ) = ? ",[$request->date_spec]);
        
    return Datatables::of($user_meeting)->addIndexColumn()->make(true);
  }
  
}

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
use App\sim2_master;
use App\sim2_user_meeting;
use DataTables;
use App\SIM2_data_log;
use Svg\Tag\Rect;
use App\sim2_meeting_time;
use App\SIM2_information_sharing;

class SIM2_Controller extends SIM_Controller
{
  public function topic_sim2() {
    $sim2_department = DB::select("SELECT * FROM `sim2_department` " );
    
    return view('D-SIM/SIM2/menu', compact('sim2_department'));
  }

  public function index_sim2($id) {
    $department_id = $id;
    $sim2_master = DB::table('sim2_master')->where(['sim2_department_id' => $department_id ])->get();
    $users = DB::table('sim2_user')->get();
    $sim2_department = DB::table('sim2_department')->where('id',$id)->first();

    $type_line = DB::table('type_line')->where('status','1')->get();
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    return view('D-Sim/SIM2/index', compact(
      'users' ,'sim2_master',
      'sim2_department',
      'type_line','department_id'
    ));
  }

  // ดึงรายชื่อผู้เข้าร่วมประชุม sim2
  public function get_sim2_user(Request $req) {

    $sim2_user = DB::select("SELECT
      sim2_user.id,
      sim2_user.`name`,
      sim2_user.department_id,

      sim2_user_meeting.user_id as user_checked,
      sim2_user_meeting.save_date,
      sim2_user_meeting.created_at 

      FROM sim2_user
      
      LEFT JOIN sim2_user_meeting ON sim2_user_meeting.user_id = sim2_user.id 
        AND DATE_FORMAT(save_date, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')
      WHERE sim2_user.department_id = $req->sim2_department_id
      ORDER BY 
      sim2_user.id ASC
    ", []);

    $department_tab = '';
    // foreach ($sim2_department as $department) {
    //   $department_tab.= '<li class="nav-item">';
    //     $department_tab.= '<a class="nav-link'.($department->dep_key=='PL' ?' active' :'').'" data-toggle="tab" href="#tab_department'. $department->department_id .'" role="tab">';
    //       $department_tab.= "<span class='hidden-sm-up'>
    //         <i class='ti-home'></i></span>
    //         <span class='hidden-xs-down'>แผนก $department->dep_key
    //       </span>";
    //     $department_tab.= '</a>';
    //   $department_tab.= '</li>';
    // }

    $sim2_user_meeting = '';
      foreach ($sim2_user as $emp) {
          $sim2_user_meeting.= '<div class="col-md-4" style="padding-bottom: 5px;">';
            $sim2_user_meeting.= '<div class="custom-control custom-checkbox mr-sm-2">';
              $sim2_user_meeting.= '<input type="checkbox" name="chkUserMeeting[]" value="'. $emp->id.'" id="chk_emp'.$emp->id.'" class="custom-control-input" '.(isset($emp->user_checked) ?'checked' :'').' >';
              $sim2_user_meeting.= '<label for="chk_emp'. $emp->id .'" class="custom-control-label">'. $emp->name .'</label>';
            $sim2_user_meeting.= '</div>';
          $sim2_user_meeting.= '</div>';
      }
  

    return response()->json([
      'department_tab' => $department_tab,
      'sim2_user_meeting' => $sim2_user_meeting,
    ]);
  }

  // บันทึกชื่อผู้เข้าร่วมประชุม sim2
  public function save_sim2_user_meeting(Request $req) {
    if(isset($req->chkUserMeeting)) {
      foreach ($req->chkUserMeeting as $i => $user_id) {
        // $arr_value = explode(',', $value);
        // $user_id = $arr_value[0];
        // $dapartment_id = $arr_value[1];

        $user_meeting = sim2_user_meeting::where([ 
          'user_id' => $user_id,
          'save_date' => date_format(now(), 'Y-m-d')
        ])->first();

        if(!$user_meeting) {
          $user_meeting = new sim2_user_meeting();
        }

        $user_meeting->user_id = $user_id;
        $user_meeting->department_id = $req->txt_dapartment_id;
        $user_meeting->save_date = now();

        $user_meeting->save();
      }

      $sql_delete = "DELETE FROM sim2_user_meeting WHERE sim2_user_meeting.user_id not in(".implode(',', $req->chkUserMeeting).") AND sim2_user_meeting.save_date='".date_format(now(), 'Y-m-d')."'"; 
      $delete_user_meeting = DB::delete($sql_delete);

      $msg = 'บันทึกข้อมูลสำเร็จ';
    
    } else {
      $msg = 'กรุณาเลือกชื่อผู้เข้าร่วมประชุมก่อนทการบันทึก';
    }

    return response()->json([
      'msg' => $msg,
      'chkUserMeeting' => isset($req->chkUserMeeting) ?implode(',', $req->chkUserMeeting) :'no checkbox',
      'sql_delete' => isset($sql_delete) ?$sql_delete :'no sql delete',
    ]);
    // return $sim2_master;
  }

  // ตั้งค่า sim2 ดึงข้อมูลของแต่ละหัวข้อขึ้นมา
  public function get_sim2_setting(Request $req) {
    $sim2_master = sim2_master::where(['topic_id'=>$req->topic_id , 'sim2_department_id' => $req->sim2_department_id ])->first();

    return response()->json([
      'sim2_master' => $sim2_master,
      // 'sim2_user_meeting' => $sim2_user_meeting,
    ]);
  }

  // update ตั้งค่า sim2
  public function update_sim2_setting(Request $req) {
    
    $sim2_master = sim2_master::where('topic_id',$req->topic_id)->where('sim2_department_id', $req->sim2_department_id)
    ->update([
      'topic_eng' => $req->topic_eng,
      'topic_detail' => $req->topic_detail ,
      'kpi' => $req->kpi ,
      'standard_rate' => $req->standard_rate ,
      'unit' => $req->unit ,
      'first_column' => $req->first_column ,
      'total_type_value' => $req->total_type_value ,
      'gauge_color1' => $req->gauge_color1 ,
      'gauge_color2' => $req->gauge_color2 ,
      'min_value' => $req->min_value ,
      'max_value' => $req->max_value ,
      'step_size' => $req->step_size ,
      'line_color' => $req->line_color ,
      'show_line' => $req->show_line ,
      'score_decimals' => $req->score_decimals ,
      ]); 

    return response()->json([
      'msg' => 'บันทึกข้อมูลสำเร็จ',
      'sim2_master' => $sim2_master, // req->all(),
      // 'sim2_user_meeting' => $sim2_user_meeting,
    ]);
  }


  public function get_data_table(Request $req){
    // return $req;
    $sim2_department = DB::table('SIM_department')->get();
    $type_line = DB::table('type_line')->where('status','1')->get();
    
    // return $req->sim2_master['topic_id'];
    $days_week = "'";
    for ($i=0; $i < count($req->arr_day_week) ; $i++) { 
      $days_week = $days_week . substr($req->arr_day_week[$i],6,4).':'.substr($req->arr_day_week[$i],3,2).':'.substr($req->arr_day_week[$i],0,2) . "','";
    }
    $days_week = substr($days_week, 0, -2);

    if($req->sim2_master['first_column']=='line') { // topic_id=COST ||  topic_id=DELIVERY
       $sim2_data_log = DB::select("SELECT
        type_line.line_number,
        type_line.type_line,

        sim2_data_log.sim2_topic_id,
        sim2_data_log.`day`,
        sum(sim2_data_log.score) as score, 
        sim2_data_log.score2,
        sim2_data_log.save_date,
        sim2_data_log.work_shift,

        sim2_master.topic_eng

        FROM type_line

        INNER JOIN sim2_data_log ON sim2_data_log.line_number = type_line.line_number
        INNER JOIN sim2_master ON sim2_data_log.sim2_topic_id = sim2_master.id_sim2

        WHERE 1
          AND sim2_data_log.sim2_topic_id = ?
          AND sim2_data_log.save_date IN ($days_week)
          AND sim2_data_log.sim2_department_id = ?
        GROUP BY sim2_data_log.save_date , type_line.line_number
      ", [$req->sim2_master['topic_id'], $req->sim2_department_id ] );
      
      $arr_sim2_data_log = [];

      foreach($type_line as $index_line=>$line) {
        array_push($arr_sim2_data_log, [
          'type_line'=>$line->type_line,
          'line_number'=>$line->line_number,
          'score_Sun'=>0,
          'score_Mon'=>0,
          'score_Tue'=>0,
          'score_Wed'=>0,
          'score_Thu'=>0,
          'score_Fri'=>0,
          'score_Sat'=>0,
        ]);

        foreach($sim2_data_log as $index_data_log=>$data_log) {
          if( ($line->line_number == $data_log->line_number) ) { 
            $arr_sim2_data_log[$index_line]['score_'.$data_log->day] = $data_log->score + $data_log->score2;
          }
        }
      }

    }
    else {
      // return 1;
      $sim2_data_log = DB::select("SELECT
        SIM_department.department_id,
        SIM_department.department_name,
        SIM_department.dep_key,

        sim2_data_log.sim2_topic_id,
        sim2_data_log.`day`,
        sim2_data_log.score,
        sim2_data_log.score2,
        sim2_data_log.save_date,

        sim2_master.topic_eng

        FROM SIM_department

        INNER JOIN sim2_data_log ON SIM_department.department_id = sim2_data_log.department_id
        INNER JOIN sim2_master ON sim2_data_log.sim2_topic_id = sim2_master.id_sim2
        
        WHERE 1
          AND sim2_data_log.sim2_topic_id = ?
          AND sim2_data_log.save_date IN ($days_week)
          AND sim2_data_log.sim2_department_id = ?

      ", [$req->sim2_master['topic_id'] , $req->sim2_department_id  ]);

      $arr_sim2_data_log = [];

      foreach($sim2_department as $index_dept=>$department) {
        array_push($arr_sim2_data_log, [
          'dept'=>$department->dep_key,
          'dept_id'=>$department->department_id,
          'score_Sun'=>0,
          'score_Mon'=>0,
          'score_Tue'=>0,
          'score_Wed'=>0,
          'score_Thu'=>0,
          'score_Fri'=>0,
          'score_Sat'=>0,
        ]);

        foreach($sim2_data_log as $index_data_log=>$data_log) {
          if( ($department->department_id == $data_log->department_id) ) { 
            $arr_sim2_data_log[$index_dept]['score_'.$data_log->day] = $data_log->score + $data_log->score2;
          }
        }
      }
    }

    // { topic:'safety", dept:'PL', sun:1, mon:2}
    // return ($arr_sim2_data_log);
    return DataTables::of($arr_sim2_data_log)->toJson();
  }

  // ไมไ่ด้ใช้แล้ว //
    public function get_data_gage(Request $req){
      $sim2_master = DB::table('sim2_master')->where('topic_id',($req->id)+1 )->get();

      return $sim2_master;
    }

    public function get_data_trend(Request $req){
      
      $days_week = "'";
      $x = "'"; //not in use -for debug
      for ($i=0; $i < count($req->arr_day_week) ; $i++) {
        $days_week = $days_week . substr($req->arr_day_week[$i],6,4).':'.substr($req->arr_day_week[$i],3,2).':'.substr($req->arr_day_week[$i],0,2) . "','";
      }
      $days_week = substr($days_week, 0, -2);

      if($req->sim2_master['first_column']=='line') { // topic_id=COST ||  topic_id=DELIVERY
        // return 0;
        $sim2_data_log = DB::select("SELECT
          type_line.line_number,
          sim2_data_log.sim2_topic_id,
          sim2_data_log.`day`,
          -- sim2_data_log.score,
          sum(sim2_data_log.score) as score,
          sim2_data_log.save_date,
          sim2_master.topic_eng

          FROM type_line

          INNER JOIN sim2_data_log ON sim2_data_log.line_number = type_line.line_number
          INNER JOIN sim2_master ON sim2_data_log.sim2_topic_id = sim2_master.id_sim2
          
          WHERE 1
            AND type_line.status = 1
            AND sim2_data_log.sim2_topic_id = ?
            AND sim2_data_log.save_date IN ($days_week)
          
          GROUP BY sim2_data_log.`day`
        ", [$req->sim2_master['topic_id']]);
      }
      else {
        $sim2_data_log = DB::select("SELECT
          SIM_department.department_id,
          -- SIM_department.department_name,
          -- SIM_department.dep_key,
          sim2_data_log.sim2_topic_id,
          sim2_data_log.`day`,
          sum(sim2_data_log.score) as score,
          sim2_data_log.save_date,

          sim2_master.topic_eng

          FROM SIM_department

          INNER JOIN sim2_data_log ON SIM_department.department_id = sim2_data_log.department_id
          INNER JOIN sim2_master ON sim2_data_log.sim2_topic_id = sim2_master.id_sim2
          
          WHERE 1
            AND sim2_data_log.sim2_topic_id = ?
            AND sim2_data_log.save_date IN ($days_week)
          
          GROUP BY sim2_data_log.`day`
        ", [$req->sim2_master['topic_id']]);
      }

      // return ($sim2_data_log);

      // { topic:'safety", dept:'PL', sun:1, mon:2 }
      $arr_sim2_data_log = [
        'Mon'=>0,
        'Tue'=>0,
        'Wed'=>0,
        'Thu'=>0,
        'Fri'=>0,
        'Sat'=>0,
        'Sun'=>0,
      ];

      // array_push($arr_sim2_data_log, );

      foreach($sim2_data_log as $index_data_log=>$data_log) {
        $arr_sim2_data_log[$data_log->day] = $data_log->score;
      }

      return ($arr_sim2_data_log);
    }
  // ไมไ่ด้ใช้แล้ว //
  
  public function sim2_data_save(Request $req){

    $arr_data = [
        'sim2_topic_id' => $req->txtTopicID,
        'department_id' => $req->department_id ?$req->department_id :null,
        'sim2_department_id' => $req->sim2_department,
        'line_number' => $req->ddlLine ?$req->ddlLine :null,
        'user_id' => $req->user_id,
        'save_date' =>  substr($req->save_date,6,4).':'.substr($req->save_date,3,2).':'.substr($req->save_date,0,2),
        'plan_date' => $req->plan_date,
        'score' => $req->score,
        // 'score2' => $req->score2,
        'problem_description' => $req->problem_description,
        'root_cause' => $req->root_cause,
        'solution' => $req->solution,
        'day' => $req->save_days,
        'work_shift' => $req->work_shift,
        'created_at' => now(),
      ];
      if ($req->hasFile('txtDescFile')){
          $file_names = Auth::user()->id .'_'. Carbon::now()->toDateString() .'_' . Str::random() . '.' . $req->file('txtDescFile')->getClientOriginalExtension();
          $req->file('txtDescFile')->move('assets/sim2_file', $file_names);
          
          $arr_data['file_name'] = $file_names;
      }

      // $sim2_data = new SIM2_data_log;
      $sim2_data = SIM2_data_log::updateOrCreate(
        [ 'id' => $req->id],
        $arr_data
      );
  
      return response()->json([
        'msg'=>'บันทึกสำเร็จ',
        'databack'=>$req->all(),
      ]);
  }

  public function get_data_modal(Request $req){
    //  $date_format = "'".substr($req->save_date,6,4)."-".substr($req->save_date,3,2)."-".substr($req->save_date,0,2)."'";
    // return response()->json([
    //   'department_id'=> $req->department_id, 
    //   'line_number'=>$req->line_number
    // ]);
    if(isset($req->department_id)) {
      $arr_condition = [
        'department_id'=>$req->department_id,
        'save_date'=> substr($req->save_date,6,4)."-".substr($req->save_date,3,2)."-".substr($req->save_date,0,2),
        'sim2_topic_id'=>$req->sim2_topic_id,
        'sim2_department_id' => $req->sim2_department_id,
        'work_shift'=> $req->work_shift,
      ];
      // return response()->json([
      //   'department_id'=> $req->department_id,
      //   'line_number'=>$req->line_number,
      // ]);
    }
    elseif(isset($req->line_number)) {
      $arr_condition = [
        'line_number'=>$req->line_number,
        'save_date'=> substr($req->save_date,6,4)."-".substr($req->save_date,3,2)."-".substr($req->save_date,0,2),
        'sim2_topic_id'=>$req->sim2_topic_id,
        'sim2_department_id' => $req->sim2_department_id,
        'work_shift'=> $req->work_shift,
      ];
      // return response()->json([
      //   'line_number'=>$req->line_number,
      //   'department_id'=> $req->department_id,
      // ]);
    }
    
    $data_log = DB::table('sim2_data_log')
      ->where($arr_condition)
    ->get();

    return response()->json(['SIM2_data_log'=> $data_log]);
  }

  public function get_data_log(Request $req){ //pdca

    $data_log = DB::table('sim2_data_log')
      ->where([
              'id'=>$req->PDCA_id,
              ])
              
      ->get();

      return $data_log;
  }

  public function save_modal_sim2_PDCA(Request $req){
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
        $req->file('txtDescFile_pdca')->move('assets/sim2_file', $file_names);
        
        $arr_data['file_name'] = $file_names;
    }

    // $sim2_data = new SIM2_data_log;
    $sim2_data = SIM2_data_log::updateOrCreate(
        [ 'id' => $req->id_sim2_data_log],
        $arr_data
    );

    return $req;
  }

  public function sim2_get_table_pdca(Request $req){

    $data_pdca = DB::select("SELECT
        *,
        `sim2_data_log`.`id` AS `sim2_log_id`,
        `type_line`.`line_number` AS `line_num`,
        sim2_master.id_sim2 as topic_id_as_sim2_master
      FROM
        sim2_data_log
        LEFT JOIN sim2_master ON sim2_data_log.sim2_topic_id = sim2_master.id_sim2 
        -- AND sim2_data_log.sim2_department_id = sim2_master.sim2_department_id
        LEFT JOIN `sim2_user` ON `sim2_data_log`.`user_id` = `sim2_user`.`id`
        LEFT JOIN `SIM_department` ON `sim2_data_log`.`department_id` = `SIM_department`.`department_id`
        LEFT JOIN `type_line` ON `sim2_data_log`.`line_number` = `type_line`.`id` 
      WHERE
        `sim2_data_log`.`sim2_department_id` = $req->sim2_department_id
        AND ( `problem_description` IS NOT NULL OR `root_cause` IS NOT NULL OR `solution` IS NOT NULL ) 
      ORDER BY
        `save_date` DESC,
        `sim2_log_id` DESC"
    );

    return DataTables::of($data_pdca)->toJson();
  }

  public function get_time_stop(){
    $sim2_meeting_time = DB::table('sim2_meeting_time')
    ->where('id_user' , Auth::user()->id )
    ->orderBy('id', 'DESC')
    ->first();

    return response()->json(['sim2_meeting_time'=> $sim2_meeting_time]);
  }

  public function save_modal_time_counter(Request $req){
    $sim2_meeting_time = new sim2_meeting_time;
    $sim2_meeting_time->date_time_start_meeting = $req->time_now;
    // $sim2_meeting_time->date_time_start_meeting = now();
    $sim2_meeting_time->id_user = Auth::user()->id;
    $sim2_meeting_time->time_counter = $req->time_counter;
    $sim2_meeting_time->save();
    return $req->time_counter;
  }

  public function delete_sim2_data_log(Request $req){
      DB::table('sim2_data_log')->where('id',$req->sim2_log_id)->delete();
      return $req;
  }

  function sim2_get_table_information_sharing(Request $req){
    $data = DB::select("SELECT * FROM sim2_information_sharing 
          WHERE 
          sim2_information_sharing.created_at >= CURRENT_DATE - INTERVAL '30' DAY 
          AND sim2_department_id = $req->sim2_department_id
          ORDER BY sim2_information_sharing.created_at DESC"
    );
    return DataTables::of($data)->toJson();
  }

  function save_information_sharing(Request $req){
        $info_sharing = new SIM2_information_sharing;
        $info_sharing->topic = $req->topic;
        $info_sharing->description = $req->description;
        $info_sharing->save_date = $req->save_date_info_sharing;
        $info_sharing->sim2_department_id = $req->sim2_department;
        $info_sharing->save();
        return $req;
  }

  public function delete_sim2_information_sharing(Request $req){
    DB::table('sim2_information_sharing')->where('id',$req->id)->delete();
    return $req;
  }
  
  public function report_user_meeting(Request $request){
    $user_meeting = DB::select("SELECT
        sim2_user.id,
        sim2_user.`name`,
        sim2_user.email,
        sim2_user.department_id,
        sim2_department.name as department_name,
        DATE_FORMAT( sim2_user_meeting.save_date, '%d/%m/%Y' ) AS save_date,
        sim2_user_meeting.created_at,
        sim2_user_meeting.updated_at 
      FROM
        sim2_user
        LEFT JOIN sim2_user_meeting ON sim2_user.id = sim2_user_meeting.user_id 
        AND DATE_FORMAT( sim2_user_meeting.save_date, '%d/%m/%Y' ) = ?
        LEFT JOIN sim2_department ON sim2_user.department_id = sim2_department.id 
      WHERE
        sim2_user.department_id = ?
      ORDER BY
    sim2_user.id ASC",[$request->date_spec , $request->department_id]);
        
    return Datatables::of($user_meeting)->addIndexColumn()->make(true);
  }

}

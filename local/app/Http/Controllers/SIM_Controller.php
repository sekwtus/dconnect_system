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
use App\sim3_master;
use App\sim3_user_meeting;
use DataTables;
use App\SIM3_data_log;
use Svg\Tag\Rect;
use App\sim3_meeting_time;
use App\SIM3_information_sharing;
use App\sim1_data_log;
use App\sim1_lose_time_start;

class SIM_Controller extends Controller
{

  public function index_sim2($id_sim2) {
    $sim_master = DB::table('SIM_master')
      ->where([
        'SIM_master.department_id'=>Auth::user()->department_id,
        'SIM_master.id_sim2'=>$id_sim2
      ])
    ->first();

    // $date_today = Carbon::parse(now());
    // $startOfWeek = $date_today->startOfWeek()->format('Y-m-d'); // monday
    // $endOfWeek = $date_today->endOfWeek()->format('Y-m-d'); // sunday
    // data sim_info
    $data_sim_info = DB::select("SELECT
      SIM_information.information_id,
      SIM_information.sim_master_id,
      SIM_information.sim_level,
      SIM_information.department_id,
      SIM_information.user_id,
      SIM_information.date,
      SIM_information.`day`,
      SIM_information.time_period,
      -- SIM_information.score,
      sum(SIM_information.score) as sum_score,
      SIM_information.created_at,
      SIM_information.updated_at

      FROM SIM_information

      WHERE 1
        AND SIM_information.department_id =?
        AND SIM_information.sim_master_id =? 
        AND SIM_information.date =?
        -- AND SIM_information.date >= '' 
        -- AND SIM_information.date <= ''
      -- GROUP BY SIM_information.date
    ", [Auth::user()->department_id, $id_sim2, date('Y-m-d')]);

    // return dd($data_sim_info);
    // return $data_sim_info[0]->sum_score=='' ?'0' :$data_sim_info[0]->sum_score;

    $id = $id_sim2;
    $data_pdca = DB::table('SIM_PDCA')
    ->leftJoin('users', 'SIM_PDCA.responsible_user_id', '=', 'users.id')
    ->get();

    $users = DB::table('users')->get();

    return view('D-SIM/SIM2/index', compact('sim_master','data_sim_info', 'id','data_pdca','users'));
  }

  public function insert_information_sim2(Request $request) {
    $arr_date = explode('/', $request->txtDate);
    $date = date("$arr_date[2]-$arr_date[1]-$arr_date[0]");
    // return $date;
    /*
      $sim2 = SIM_information::where([
        'sim_level' => 2,
        'date' => $date,
        'department_id' => Auth::user()->department_id,
        'topic_id' => $request->txtTopicID,
        'time_period' => $request->rdoPeriod
      ])->first();

      if(!$sim2){
        $sim2 = new SIM_information();
      }
    */
    $sim2 = new SIM_information();
    
    $sim2->sim_level = '2';
    $sim2->department_id = Auth::user()->department_id;
    $sim2->user_id = Auth::user()->id;
    $sim2->date = $date;
    $sim2->day = th_day(date($date.' H:i:s'));
    $sim2->time_period = $request->rdoPeriod;
    $sim2->score = $request->txtScore;
    $sim2->sim_master_id = $request->sim_master_id;
    $sim2->save();

    return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ');
  }

  public function pdca($id){
    $data_pdca = DB::table('SIM_PDCA')
    ->leftJoin('users', 'SIM_PDCA.responsible_user_id', '=', 'users.id')
    ->get();

    $users = DB::table('users')->get();
    return view('D-SIM.SIM2.pdca',compact('id','data_pdca','users'));
  }

  public function pdca_save(Request $request){
    $pdca = new SIM_PDCA;

    $master_info = SIM_master::where('department_id', $request->id_master)->first();
    $pdca->department_id = $master_info->department_id;    
    $pdca->sim_topic_id = $master_info->topic_id;
    $pdca->date = $request->date_today;
    $pdca->problem_description = $request->problem_description;
    $pdca->root_cause = $request->root_cause;
    $pdca->solution = $request->solution;
    $pdca->responsible_user_id = $request->responsible_user_id;
    $pdca->schedule_date = $request->schedule_date;
    $pdca->created_at = now();
    $pdca->plan_date = $request->date_today;
    $pdca->save();

    return back();
  }

  public function getPDCA_data(Request $data){
    $data_pdca = DB::table('SIM_PDCA')
    ->where(['PDCA_id' => $data->PDCA_id])
    ->leftJoin('users', 'SIM_PDCA.responsible_user_id', '=', 'users.id')
    ->get();

    return $data_pdca;
  }

  public function save_date(Request $request){
 
    DB::update("UPDATE SIM_PDCA set 
        plan_date = '$request->plan_date',
        do_date = '$request->do_date',
        check_date = '$request->check_date',
        action_date = '$request->action_date'
        WHERE PDCA_id = $request->id_action_modal
    ");

    return back();
  }

  public function get_sim_info(Request $data){
    $date_today = Carbon::parse(now());
    $startOfWeek = $date_today->startOfWeek()->format('Y-m-d'); // monday
    $endOfWeek = $date_today->endOfWeek()->format('Y-m-d'); // sunday

      // data sim_info
    $data_sim_info = DB::select("SELECT
      CONCAT(SIM_information.`day`, SIM_information.time_period) as day_time_combine,
      SIM_information.information_id,
      SIM_information.sim_master_id,
      SIM_information.sim_level,
      SIM_information.department_id,
      SIM_information.user_id,
      SIM_information.date,
      SIM_information.`day`,
      SIM_information.time_period,
      sum(SIM_information.score) as score,
      SIM_information.created_at,
      SIM_information.updated_at

      FROM SIM_information

      WHERE 1
        AND SIM_information.date >= '$startOfWeek' 
        AND SIM_information.date <= '$endOfWeek'
        AND SIM_information.sim_master_id = $data->sim_master_id
      GROUP BY
        SIM_information.date,
        SIM_information.time_period
    ", []);


    // trend กราฟเส้น
    $data_sim_info_chart = DB::select("SELECT
      CONCAT(SIM_information.`day`, SIM_information.time_period) as day_time_combine,
      SIM_information.information_id,
      SIM_information.sim_master_id,
      SIM_information.sim_level,
      SIM_information.department_id,
      SIM_information.user_id,
      SIM_information.date,
      SIM_information.`day`,
      SIM_information.time_period,
      sum(SIM_information.score) as score,
      SIM_information.created_at,
      SIM_information.updated_at

      FROM SIM_information

      WHERE 1
        AND SIM_information.date >= '$startOfWeek' 
        AND SIM_information.date <= '$endOfWeek'
        AND SIM_information.sim_master_id = $data->sim_master_id
      GROUP BY
        SIM_information.date
    ", []);
    
    return response()->json([
      'data_sim_info'=>$data_sim_info,
      'data_sim_info_chart'=>$data_sim_info_chart,
    ]);
    // return $data_sim_info;
  }  
  
  
  public function index_sim3() {
    $sim3_master = DB::table('SIM3_master')->get();
    // $sim3_master = [];
    // foreach($sim3_master_ as $item){
    //   // array_push($arr_sim3_master, [$item->topic_id => $item]);
    //   $sim3_master[$item->topic_id] = $item;
    // }
    // $sim3_master = json_encode($sim3_master);
    // $sim3_master = json_decode($sim3_master);
    // // dd( json_decode($sim3_master) );

    $sim_master = DB::table('SIM_master')
      ->where([
        'SIM_master.department_id'=>Auth::user()->department_id,
        // 'SIM_master.id_sim2'=>$id_sim2
      ])
    ->first();

    // data sim_info
    $data_sim_info = DB::select("SELECT
      SIM_information.information_id,
      SIM_information.sim_master_id,
      SIM_information.sim_level,
      SIM_information.department_id,
      SIM_information.user_id,
      SIM_information.date,
      SIM_information.`day`,
      SIM_information.time_period,
      sum(SIM_information.score) as sum_score,
      SIM_information.created_at,
      SIM_information.updated_at

      FROM SIM_information

      WHERE 1
        AND SIM_information.department_id =?
        AND SIM_information.date =?
    ", [Auth::user()->department_id, date('Y-m-d')]);

    $id = 0;

    $data_pdca = DB::table('SIM3_data_log')
    ->select('*','SIM3_data_log.id as sim3_log_id')
    ->leftJoin('users', 'SIM3_data_log.user_id', '=', 'users.id')
    ->leftJoin('SIM3_master', 'SIM3_data_log.sim3_topic_id', '=', 'SIM3_master.topic_id')
    ->leftJoin('SIM_department', 'SIM3_data_log.department_id', '=', 'SIM_department.department_id')
    ->orderBy('save_date', 'DESC')
    ->get();

    $users = DB::table('sim3_user')->get();
    $sim3_department = DB::table('SIM_department')->get();

    $type_line = DB::table('type_line')->where('status','1')->get();

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    return view('D-Sim/SIM3/index', compact(
      'sim_master','data_sim_info', 'id',
      'data_pdca','users' ,'sim3_master',
      'sim3_department',
      'type_line'
    ));
  }

  // ดึงรายชื่อผู้เข้าร่วมประชุม sim3
  public function get_sim3_user(Request $req) {
    $sim3_department = DB::table('SIM_department')->get();

    $sim3_user = DB::select("SELECT
      sim3_user.id,
      sim3_user.`name`,
      sim3_user.department_id,

      sim3_user_meeting.user_id as user_checked,
      sim3_user_meeting.save_date,
      sim3_user_meeting.created_at 

      FROM sim3_user
      
      LEFT JOIN sim3_user_meeting ON sim3_user_meeting.user_id = sim3_user.id 
        AND DATE_FORMAT(save_date, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')

      ORDER BY 
      sim3_user.id ASC
    ", []);

    $department_tab = '';
    foreach ($sim3_department as $department) {
      $department_tab.= '<li class="nav-item">';
        $department_tab.= '<a class="nav-link'.($department->dep_key=='PL' ?' active' :'').'" data-toggle="tab" href="#tab_department'. $department->department_id .'" role="tab">';
          $department_tab.= "<span class='hidden-sm-up'>
            <i class='ti-home'></i></span>
            <span class='hidden-xs-down'>แผนก $department->dep_key
          </span>";
        $department_tab.= '</a>';
      $department_tab.= '</li>';
    }

    $sim3_user_meeting = '';
    foreach ($sim3_department as $department) {
      $sim3_user_meeting.= '<div class="tab-pane'.($department->dep_key=='PL' ?' active' :'' ).'" id="tab_department'. $department->department_id .'" role="tabpanel">';
        $sim3_user_meeting.= '<div class="p-2">';
          $sim3_user_meeting.= '<h3> แผนก '. $department->department_name .'</h3>';
          $sim3_user_meeting.= '<input type="hidden" name="txt_dapartment_id[]" value="'.$department->department_id.'">';

          $sim3_user_meeting.= '<div class="row">';
            foreach ($sim3_user as $emp) {
              if ($emp->department_id == $department->department_id) {
                $sim3_user_meeting.= '<div class="col-md-6">';
                  // $sim3_user_meeting.= '<input type="checkbox" name="chkUserMeeting[]" value="'. $emp->id.'" id="chk_emp'.$emp->id.'" class="check" data-checkbox="icheckbox_square-blue" '.(isset($emp->user_checked) ?'checked' :'').' >';
                  // $sim3_user_meeting.= '<label for="chk_emp'. $emp->id .'" class="pl-1">'. $emp->name .'</label>'; //,'.$emp->department_id .'
                  $sim3_user_meeting.= '<div class="custom-control custom-checkbox mr-sm-2">';
                    $sim3_user_meeting.= '<input type="checkbox" name="chkUserMeeting[]" value="'. $emp->id.'" id="chk_emp'.$emp->id.'" class="custom-control-input" '.(isset($emp->user_checked) ?'checked' :'').' >';
                    $sim3_user_meeting.= '<label for="chk_emp'. $emp->id .'" class="custom-control-label">'. $emp->name .'</label>'; //,'.$emp->department_id .'
                  $sim3_user_meeting.= '</div>';
                $sim3_user_meeting.= '</div>';
              }
            }
          $sim3_user_meeting.= '</div>';
        $sim3_user_meeting.= '</div>';

      $sim3_user_meeting.= '</div>';
    }

    return response()->json([
      'department_tab' => $department_tab,
      'sim3_user_meeting' => $sim3_user_meeting,
    ]);
  }

  // บันทึกชื่อผู้เข้าร่วมประชุม sim3
  public function save_sim3_user_meeting(Request $req) {
    // return implode(',', $req->chkUserMeeting);
    if(isset($req->chkUserMeeting)) {
      foreach ($req->chkUserMeeting as $i => $user_id) {
        // $arr_value = explode(',', $value);
        // $user_id = $arr_value[0];
        // $dapartment_id = $arr_value[1];

        $user_meeting = sim3_user_meeting::where([ 
          'user_id' => $user_id,
          'save_date' => date_format(now(), 'Y-m-d')
        ])->first();

        if(!$user_meeting) {
          $user_meeting = new sim3_user_meeting();
        }

        $dep_user = DB::table('sim3_user')->where('id',$user_id)->first();

        $user_meeting->user_id = $user_id;
        $user_meeting->department_id = $dep_user->department_id;
        $user_meeting->save_date = now();

        $user_meeting->save();
      }

      $sql_delete = "DELETE FROM sim3_user_meeting WHERE sim3_user_meeting.user_id not in(".implode(',', $req->chkUserMeeting).") AND sim3_user_meeting.save_date='".date_format(now(), 'Y-m-d')."'"; 
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
    // return $sim3_master;
  }

  // ตั้งค่า sim3 ดึงข้อมูลของแต่ละหัวข้อขึ้นมา
  public function get_sim3_setting(Request $req) {
    $sim3_master = sim3_master::where(['topic_id'=>$req->topic_id])->first();

    return response()->json([
      'sim3_master' => $sim3_master,
      // 'sim3_user_meeting' => $sim3_user_meeting,
    ]);
  }

  // update ตั้งค่า sim3
  public function update_sim3_setting(Request $req) {
    $sim3_master = sim3_master::where(['topic_id'=>$req->topic_id])->first();

    $sim3_master->topic_eng = $req->topic_eng;
    $sim3_master->topic_detail = $req->topic_detail;
    $sim3_master->kpi = $req->kpi;
    $sim3_master->standard_rate = $req->standard_rate;
    $sim3_master->unit = $req->unit;

    $sim3_master->first_column = $req->first_column;
    $sim3_master->total_type_value = $req->total_type_value;

    $sim3_master->gauge_color1 = $req->gauge_color1;
    $sim3_master->gauge_color2 = $req->gauge_color2;
    
    $sim3_master->min_value = $req->min_value;
    $sim3_master->max_value = $req->max_value;
    $sim3_master->step_size = $req->step_size;
    $sim3_master->line_color = $req->line_color;
    $sim3_master->show_line = $req->show_line;
    $sim3_master->score_decimals = $req->score_decimals;
    $sim3_master->save();

    return response()->json([
      'msg' => 'บันทึกข้อมูลสำเร็จ',
      'sim3_master' => $sim3_master, // req->all(),
      // 'sim3_user_meeting' => $sim3_user_meeting,
    ]);
  }


  public function get_data_table(Request $req){
    $sim3_department = DB::table('SIM_department')->get();
    $type_line = DB::table('type_line')->where('status','1')->get();
    
    // return $req->sim3_master['topic_id'];
    $days_week = "'";
    for ($i=0; $i < count($req->arr_day_week) ; $i++) { 
      $days_week = $days_week . substr($req->arr_day_week[$i],6,4).':'.substr($req->arr_day_week[$i],3,2).':'.substr($req->arr_day_week[$i],0,2) . "','";
    }
    $days_week = substr($days_week, 0, -2);

    if($req->sim3_master['first_column']=='line') { // topic_id=COST ||  topic_id=DELIVERY
      // return 0;
      $sim3_data_log = DB::select("SELECT
        type_line.line_number,
        type_line.type_line,

        SIM3_data_log.sim3_topic_id,
        SIM3_data_log.`day`,
        SIM3_data_log.score,
        SIM3_data_log.save_date,

        SIM3_master.topic_eng

        FROM type_line

        INNER JOIN SIM3_data_log ON SIM3_data_log.line_number = type_line.line_number
        INNER JOIN SIM3_master ON SIM3_data_log.sim3_topic_id = SIM3_master.id_sim3

        WHERE 1
          AND SIM3_data_log.sim3_topic_id = ?
          AND SIM3_data_log.save_date IN ($days_week)
      ", [$req->sim3_master['topic_id']]);
      
      $arr_sim3_data_log = [];

      foreach($type_line as $index_line=>$line) {
        array_push($arr_sim3_data_log, [
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

        foreach($sim3_data_log as $index_data_log=>$data_log) {
          if( ($line->line_number == $data_log->line_number) ) { 
            $arr_sim3_data_log[$index_line]['score_'.$data_log->day] = $data_log->score;
          }
        }
      }

    }
    else {
      // return 1;
      $sim3_data_log = DB::select("SELECT
        SIM_department.department_id,
        SIM_department.department_name,
        SIM_department.dep_key,

        SIM3_data_log.sim3_topic_id,
        SIM3_data_log.`day`,
        SIM3_data_log.score,
        SIM3_data_log.save_date,

        SIM3_master.topic_eng

        FROM SIM_department

        INNER JOIN SIM3_data_log ON SIM_department.department_id = SIM3_data_log.department_id
        INNER JOIN SIM3_master ON SIM3_data_log.sim3_topic_id = SIM3_master.id_sim3
        
        WHERE 1
          AND SIM3_data_log.sim3_topic_id = ?
          AND SIM3_data_log.save_date IN ($days_week)
      ", [$req->sim3_master['topic_id']]);

      $arr_sim3_data_log = [];

      foreach($sim3_department as $index_dept=>$department) {
        array_push($arr_sim3_data_log, [
          'dept'=>$department->dep_key,
          'dept_id'=>$department->department_id,
          'score_Sun'=>0,
          'score_Mon'=>0,
          'score_Tue'=>0,
          'score_Wed'=>0,
          'score_Thu'=>0,
          'score_Fri'=>0,
          'score_Sat'=>0,
          // 'score_Sun'=>null,
          // 'score_Mon'=>null,
          // 'score_Tue'=>null,
          // 'score_Wed'=>null,
          // 'score_Thu'=>null,
          // 'score_Fri'=>null,
          // 'score_Sat'=>null,
        ]);

        foreach($sim3_data_log as $index_data_log=>$data_log) {
          if( ($department->department_id == $data_log->department_id) ) { 
            $arr_sim3_data_log[$index_dept]['score_'.$data_log->day] = $data_log->score;
          }
        }
      }
    }

    // { topic:'safety", dept:'PL', sun:1, mon:2}
    // return ($arr_sim3_data_log);
    return DataTables::of($arr_sim3_data_log)->toJson();
  }

  // ไมไ่ด้ใช้แล้ว //
    public function get_data_gage(Request $req){
      $sim3_master = DB::table('SIM3_master')->where('topic_id',($req->id)+1 )->get();

      return $sim3_master;
    }

    public function get_data_trend(Request $req){
      
      $days_week = "'";
      $x = "'"; //not in use -for debug
      for ($i=0; $i < count($req->arr_day_week) ; $i++) {
        $days_week = $days_week . substr($req->arr_day_week[$i],6,4).':'.substr($req->arr_day_week[$i],3,2).':'.substr($req->arr_day_week[$i],0,2) . "','";
      }
      $days_week = substr($days_week, 0, -2);

      if($req->sim3_master['first_column']=='line') { // topic_id=COST ||  topic_id=DELIVERY
        // return 0;
        $sim3_data_log = DB::select("SELECT
          type_line.line_number,
          SIM3_data_log.sim3_topic_id,
          SIM3_data_log.`day`,
          -- SIM3_data_log.score,
          sum(SIM3_data_log.score) as score,
          SIM3_data_log.save_date,
          SIM3_master.topic_eng

          FROM type_line

          INNER JOIN SIM3_data_log ON SIM3_data_log.line_number = type_line.line_number
          INNER JOIN SIM3_master ON SIM3_data_log.sim3_topic_id = SIM3_master.id_sim3
          
          WHERE 1
            AND type_line.status = 1
            AND SIM3_data_log.sim3_topic_id = ?
            AND SIM3_data_log.save_date IN ($days_week)
          
          GROUP BY SIM3_data_log.`day`
        ", [$req->sim3_master['topic_id']]);
      }
      else {
        $sim3_data_log = DB::select("SELECT
          SIM_department.department_id,
          -- SIM_department.department_name,
          -- SIM_department.dep_key,
          SIM3_data_log.sim3_topic_id,
          SIM3_data_log.`day`,
          sum(SIM3_data_log.score) as score,
          SIM3_data_log.save_date,

          SIM3_master.topic_eng

          FROM SIM_department

          INNER JOIN SIM3_data_log ON SIM_department.department_id = SIM3_data_log.department_id
          INNER JOIN SIM3_master ON SIM3_data_log.sim3_topic_id = SIM3_master.id_sim3
          
          WHERE 1
            AND SIM3_data_log.sim3_topic_id = ?
            AND SIM3_data_log.save_date IN ($days_week)
          
          GROUP BY SIM3_data_log.`day`
        ", [$req->sim3_master['topic_id']]);
      }

      // return ($sim3_data_log);

      // { topic:'safety", dept:'PL', sun:1, mon:2 }
      $arr_sim3_data_log = [
        'Mon'=>0,
        'Tue'=>0,
        'Wed'=>0,
        'Thu'=>0,
        'Fri'=>0,
        'Sat'=>0,
        'Sun'=>0,
      ];

      // array_push($arr_sim3_data_log, );

      foreach($sim3_data_log as $index_data_log=>$data_log) {
        $arr_sim3_data_log[$data_log->day] = $data_log->score;
      }

      return ($arr_sim3_data_log);
    }
  // ไมไ่ด้ใช้แล้ว //
  
  public function sim3_data_save(Request $req){
      $arr_data = [
        'sim3_topic_id' => $req->txtTopicID,
        'department_id' => $req->department_id ?$req->department_id :null,
        'line_number' => $req->ddlLine ?$req->ddlLine :null,
        'user_id' => $req->user_id,
        'save_date' =>  substr($req->save_date,6,4).':'.substr($req->save_date,3,2).':'.substr($req->save_date,0,2),
        'plan_date' => $req->plan_date,
        'score' => $req->score,
        'problem_description' => $req->problem_description,
        'root_cause' => $req->root_cause,
        'solution' => $req->solution,
        'day' => $req->save_days,
        'created_at' => now(),
      ];
      if ($req->hasFile('txtDescFile')){
          $file_names = Auth::user()->id .'_'. Carbon::now()->toDateString() .'_' . Str::random() . '.' . $req->file('txtDescFile')->getClientOriginalExtension();
          $req->file('txtDescFile')->move('assets/sim3_file', $file_names);
          
          $arr_data['file_name'] = $file_names;
      }

      // $sim3_data = new SIM3_data_log;
      $sim3_data = SIM3_data_log::updateOrCreate(
        [ 'id' => $req->id],
        $arr_data
      );
  
      return response()->json([
        'msg'=>'บันทึกสำเร็จ',
        // 'msg'=>$req->all(),
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
        'sim3_topic_id'=>$req->sim3_topic_id
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
        'sim3_topic_id'=>$req->sim3_topic_id
      ];
      // return response()->json([
      //   'line_number'=>$req->line_number,
      //   'department_id'=> $req->department_id,
      // ]);
    }
    
    $data_log = DB::table('SIM3_data_log')
      ->where($arr_condition)
    ->get();

    return response()->json(['SIM3_data_log'=> $data_log]);
  }

  public function get_data_log(Request $req){ //pdca

    $data_log = DB::table('SIM3_data_log')
      ->where([
              'id'=>$req->PDCA_id,
              ])
              
      ->get();

      return $data_log;
  }

  public function save_modal_sim3_PDCA(Request $req){
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
        $req->file('txtDescFile_pdca')->move('assets/sim3_file', $file_names);
        
        $arr_data['file_name'] = $file_names;
    }

    // $sim3_data = new SIM3_data_log;
    $sim3_data = SIM3_data_log::updateOrCreate(
        [ 'id' => $req->id_sim3_data_log],
        $arr_data
    );

    return $req;
  }

  public function get_table_pdca(){
    $data_pdca = DB::table('SIM3_data_log')
    ->select('*','SIM3_data_log.id as sim3_log_id','type_line.line_number as line_num')
    ->leftJoin('sim3_user', 'SIM3_data_log.user_id', '=', 'sim3_user.id')
    ->leftJoin('SIM3_master', 'SIM3_data_log.sim3_topic_id', '=', 'SIM3_master.topic_id')
    ->leftJoin('SIM_department', 'SIM3_data_log.department_id', '=', 'SIM_department.department_id')
    ->leftJoin('type_line', 'SIM3_data_log.line_number', '=', 'type_line.id')
    ->whereNotNull(['problem_description'])
    ->orWhereNotNull(['root_cause'])
    ->orWhereNotNull(['solution'])
    ->orderBy('save_date', 'DESC')
    ->orderBy('sim3_log_id', 'DESC')
    ->get();

    return DataTables::of($data_pdca)->toJson();

  }

  public function get_time_stop(){
    $sim3_meeting_time = DB::table('sim3_meeting_time')
    ->where('id_user' , Auth::user()->id )
    ->orderBy('id', 'DESC')
    ->first();

    return response()->json(['sim3_meeting_time'=> $sim3_meeting_time]);
  }

  public function save_modal_time_counter(Request $req){

    
    $sim3_meeting_time = new sim3_meeting_time;
    $sim3_meeting_time->date_time_start_meeting = $req->time_now;
    // $sim3_meeting_time->date_time_start_meeting = now();
    $sim3_meeting_time->id_user = Auth::user()->id;
    $sim3_meeting_time->time_counter = $req->time_counter;
    $sim3_meeting_time->save();
    return $req->time_counter;
  }

  public function delete_sim3_data_log(Request $req){
      DB::table('SIM3_data_log')->where('id',$req->sim3_log_id)->delete();
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

  public function delete_sim3_information_sharing(Request $req){
    DB::table('SIM3_information_sharing')->where('id',$req->id)->delete();
    return $req;
  }

  public function report_user_meeting(Request $request)
  {
    $user_meeting = DB::select("SELECT
        sim3_user.`name`,
        DATE_FORMAT( sim3_user_meeting.save_date, '%d/%m/%Y' ) AS save_date,
        sim3_user_meeting.created_at,
        SIM_department.department_name 
      FROM
        sim3_user_meeting
        LEFT JOIN sim3_user ON sim3_user_meeting.user_id = sim3_user.id
        LEFT JOIN SIM_department ON sim3_user_meeting.department_id = SIM_department.department_id 
      WHERE
        DATE_FORMAT( sim3_user_meeting.save_date, '%d/%m/%Y' ) = ? ",[$request->date_spec]);
        
    return Datatables::of($user_meeting)->addIndexColumn()->make(true);
  }
  
}
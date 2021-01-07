<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use Auth;
use Validator;
use DataTables;
use Carbon\Carbon;

use App\DCareTemplateHeader;
use App\DCareTemplateDetail;

use App\DCareReport;

class DCareController extends Controller
{
  //todo admin /////////////////////////////////////////
  public function d_care_function($condition=null) {
    return DB::select("SELECT
      d_care_function.id,
      d_care_function.name

      FROM d_care_function

      WHERE 1 $condition

      ORDER BY 
        d_care_function.id ASC
    ", []);
  }

  public function d_care_layout($condition=null) {
    return DB::select("SELECT
      d_care_layout.id,
      d_care_layout.name

      FROM d_care_layout

      WHERE 1 $condition

      ORDER BY 
        d_care_layout.id ASC
    ", []);
  }

  public function d_care_status($condition=null) {
    return DB::select("SELECT
      d_care_status.id,
      d_care_status.name

      FROM d_care_status

      WHERE 1 $condition

      ORDER BY 
      d_care_status.id ASC
    ", []);
  }

  public function d_care_area($condition=null) {
    return DB::select("SELECT
      d_care_area.*
      -- d_care_area.id,
      -- d_care_area.name

      FROM d_care_area

      WHERE 1 $condition

      ORDER BY 
      d_care_area.id ASC
    ", []);
  }

  public function d_care_small_group($condition=null) {
    return DB::select("SELECT
      d_care_small_group.*
      -- d_care_area.id,
      -- d_care_area.name

      FROM d_care_small_group

      WHERE 1 $condition

      ORDER BY 
        d_care_small_group.id ASC
    ", []);
  }

  public function master_operator($condition=null) {
    return DB::select("SELECT
      master_operator.id,
      master_operator.operator,
      master_operator.description

      FROM master_operator

      WHERE 1 $condition

      ORDER BY 
      master_operator.id ASC
    ", []);
  }

  public function master_pdca($condition=null) {
    return DB::select("SELECT
      master_pdca.id,
      master_pdca.status,
      master_pdca.description,
      master_pdca.color_chart

      FROM master_pdca

      WHERE 1 $condition

      ORDER BY 
        master_pdca.id ASC
    ", []);
  }

  // หน้าตาราง d-care
  public function d_care() {
    $d_care_layout = $this->d_care_layout();
    $d_care_function = $this->d_care_function();
    $d_care_status = $this->d_care_status();

    return view('d-care.d-care', compact('d_care_layout','d_care_function','d_care_status'));
  }

  public function get_d_care(Request $req) {
    // return (55);
    if ($req->ajax()) {
      $d_care = DB::select("SELECT
        d_care_template_header.id,
        d_care_template_header.name AS template_name,
        d_care_template_header.version,
        DATE_FORMAT(d_care_template_header.effective_date, '%d/%m/%Y') AS effective_date,
        d_care_template_header.create_by,
        users.name AS user_name,
        d_care_template_header.status,

        d_care_layout.name AS layout_name,
        d_care_function.name AS function_name

        FROM d_care_template_header
        INNER JOIN users ON users.id = d_care_template_header.user_id
        LEFT JOIN d_care_layout ON d_care_layout.id = d_care_template_header.layout_id
        LEFT JOIN d_care_function ON d_care_function.id = d_care_template_header.function_id

        WHERE 1
         AND d_care_template_header.status = $req->status
        
        ORDER BY
          d_care_layout.id ASC,
          d_care_function.id ASC,
          d_care_template_header.id ASC,
          d_care_template_header.version ASC
          -- LENGTH(master_o_kpi.num_order) ASC,
      ", []);

      return Datatables::of($d_care)->addIndexColumn()->make(true); //->toJson();
    }
  }

  // create
  public function create_d_care(Request $req) {
    $d_care_layout = $this->d_care_layout();
    $d_care_function = $this->d_care_function();
    $master_operator = $this->master_operator();
    $layout_id = $req->layout_id;

    // dd($d_care_layout);
    return view('d-care.d-care-create', compact('d_care_function','d_care_layout', 'master_operator','layout_id'));
  }

  // insert
  public function insert_d_care(Request $req) {
    $validate = Validator::make($req->all(), [
      'ddl_layout' => 'required',
      'ddl_function' => 'required',
      'txt_name' => 'required|unique:d_care_template_header,name,NULL,id,version,'.$req->txt_version,
      'txt_version' => 'required', //numeric|min:2|max:5|digits_between:2,5
    ], [
      'ddl_layout.required' => 'กรุณาเลือก Layout',
      'ddl_function.required' => 'กรุณาเลือก Function',
      'txt_name.required' => 'กรุณากรอกชื่อ',
      'txt_name.unique' => 'มีชื่อ และ version นี้ในระบบแล้ว',
      'txt_version.required' => 'กรุณากรอก version',
      // 'txt_name.numeric' => 'ตัวเลข',
      // 'txtFile.image'=>'ต้องเป็นไฟล์รูปภาพเท่านั้น',required|image
    ]);
    // return response()->json([
    //   'validate' => 1,
    //   'msg' => [$req->test_date],
    // ]);
    
    if($validate->passes()) {
      $arr_date = explode('/', $req->txt_date);
      $effective_date = "$arr_date[2]-$arr_date[1]-$arr_date[0]"; //.date('H:i:s')
      
      $template_header = new DCareTemplateHeader();
      $template_header->layout_id = $req->ddl_layout;
      $template_header->function_id = $req->ddl_function;
      $template_header->user_id = Auth::user()->id;
      $template_header->name = $req->txt_name;
      $template_header->version = $req->txt_version;
      $template_header->effective_date = $effective_date;
      $template_header->description = $req->txt_description;

      if($req->ddl_layout == 2) {
        // For Audit Template
        $template_header->criteria_score = $req->txt_criteria_score;
        $template_header->operator = $req->ddl_operator;
      }

      $template_header->create_by = $req->txt_create_by;
      $template_header->status = 1;
      $template_header->note = $req->ddl_layout==1 ?'gemba' :'audit';
      $template_header->save();

      if(isset($req->txt_requirement)) {
        foreach ($req->txt_requirement as $key => $requirement) {
          $template_detail = new DCareTemplateDetail();
          $template_detail->header_id = $template_header->id;
          $template_detail->requirement = $requirement;
          $template_detail->note = $template_header->layout_id==1 ?'gemba' :'audit';
          $template_detail->status = 1;
          // if ($req->hasFile('file_requirement')) {
          //   if (isset($req->file_requirement[$key])) {
          //     // Carbon::now()->toDateString('Ymd')
          //     $file_name = date('Ymd') .'_'. Auth::user()->id .'_'. Str::random(5) .'_'. $req->file_requirement[$key]->getClientOriginalName();
          //     $req->file_requirement[$key]->move('assets/d-care', $file_name);
              
          //     $template_detail->file = $file_name;
          //   }
          // }
          $template_detail->save();
        }
      }
      $msg = 'บันทึกข้อมูลสำเร็จ';
    }
    else {
      $msg = $validate->errors()->all();
    }
    
    return  response()->json([
      'validate'=>count($validate->errors()),
      'msg'=>$msg,
    ]);
  }

  // edit
  public function edit_d_care(Request $req) {
    $d_care_layout = $this->d_care_layout();
    $d_care_function = $this->d_care_function();
    $d_care_status = $this->d_care_status();
    $master_operator = $this->master_operator();

    $template_header = DB::select("SELECT
      d_care_template_header.id,
      d_care_template_header.layout_id,
      d_care_template_header.function_id,
      d_care_template_header.name,
      d_care_template_header.version,
      d_care_template_header.effective_date,
      -- DATE_FORMAT(d_care_template_header.effective_date, '%d/%m/%Y') AS effective_date,
      d_care_template_header.description,
      d_care_template_header.criteria_score,
      d_care_template_header.operator,
      d_care_template_header.create_by,
      users.name AS user_name,
      d_care_template_header.status

      FROM d_care_template_header
      INNER JOIN d_care_layout ON d_care_layout.id = d_care_template_header.layout_id
      INNER JOIN users ON users.id = d_care_template_header.user_id

      WHERE 1
        AND d_care_template_header.id = $req->template_id

      ORDER BY 
        d_care_template_header.id ASC
    ", [])[0];

    $template_detail = DB::select("SELECT
      d_care_template_detail.id,
      d_care_template_detail.header_id,
      d_care_template_detail.requirement,
      d_care_template_detail.status

      FROM d_care_template_detail

      WHERE 1
        AND d_care_template_detail.header_id = $req->template_id
        AND d_care_template_detail.status = 1

      ORDER BY 
        d_care_template_detail.id ASC
    ", []);

    // dd($template_header);
    return view('d-care.d-care-edit', compact('master_operator', 'd_care_layout','d_care_function','d_care_status', 'template_header','template_detail'));
  }

  // update
  public function update_d_care(Request $req) {
    $validate = Validator::make($req->all(), [
      'txt_name' => 'required|unique:d_care_template_header,name,'.$req->txt_id.',id,version,'.$req->txt_version,
      'txt_version' => 'required',
    ], [
      'txt_name.required' => 'กรุณากรอกชื่อ',
      'txt_name.unique' => 'มีชื่อ และ version นี้ในระบบแล้ว',
      'txt_version.required' => 'กรุณากรอก version',
    ]);
    
    if($validate->passes()) {
      $arr_date = explode('/', $req->txt_date);
      $effective_date = "$arr_date[2]-$arr_date[1]-$arr_date[0]";
    
      $template_header = DCareTemplateHeader::find($req->txt_id);
      $template_header->layout_id = $req->ddl_layout;
      $template_header->function_id = $req->ddl_function;
      $template_header->user_id = Auth::user()->id;
      $template_header->name = $req->txt_name;
      $template_header->version = $req->txt_version;
      $template_header->effective_date = $effective_date;
      $template_header->description = $req->txt_description;

      if($req->ddl_layout == 2) {
        // For Audit Template
        $template_header->criteria_score = $req->txt_criteria_score;
        $template_header->operator = $req->ddl_operator;
      }

      $template_header->create_by = $req->txt_create_by;
      $template_header->status = $req->ddl_status;
      $template_header->note = $req->ddl_layout==1 ?'gemba' :'audit';
      $template_header->save();
      
      foreach ($req->txt_requirement as $detail_id => $requirement) {

        $template_detail = DCareTemplateDetail::find($detail_id);

        if(!$template_detail) {
          $template_detail = new DCareTemplateDetail();
          $template_detail->header_id = $template_header->id;
          // return response()->json([
          //   'validate'=>1,
          //   'msg'=>$detail_id.$requirement,
          // ]);
        }

        $template_detail->requirement = $requirement;
        $template_detail->note = $template_header->layout_id==1 ?'gemba' :'audit';
        $template_detail->save();
      }
      

      return response()->json([
        'validate' => 0,
        'msg' => 'แก้ไขข้อมูลสำเร็จ',
      ]);
    } 
      else {
        return  response()->json([
          'validate'=>count($validate->errors()),
          'msg'=>$validate->errors()->all(),
        ]);
      }
  }

  // delete template
  public function delete_d_care(Request $req) {
    if ($req->template['status'] == 1) {
      // change status template (active to archived)
      $template_header = DCareTemplateHeader::find($req->template['id']);
      $template_header->status = 2;
      if($template_header->save()) {
        $msg = 'Update Success';
      }
    }
    elseif ($req->template['status'] == 2 && isset($req->restore)) {
      // change status template (archived to active)
      $template_header = DCareTemplateHeader::find($req->template['id']);
      $template_header->status = 1;
      if($template_header->save()) {
        $msg = 'Update Success';
      }
    }
    else {
      // delete template
      if(DCareTemplateHeader::destroy($req->template['id'])) {
        $delete_detail = DB::table('d_care_template_detail')->where('header_id', $req->template['id'])->delete();
        $msg = 'Delete Success';
      }
    }

    return response()->json([
      'msg'=> $msg,
    ]);
  }

  // delete template detail
  public function delete_d_care_detail(Request $req) {
    $template_detail = DCareTemplateDetail::find($req->detail_id);
    $template_detail->status = 2;
    
    if($template_detail->save()) {
      $msg = 'Delete Success';
    }
    else {
      $msg = 'Delete Fail detail_id : '.$req->detail_id;
    }

    return response()->json([
      'msg' => $msg,
    ]);
  }

  //todo user /////////////////////////////////////////
  // หน้าตาราง d-care-report
  public function d_care_report(Request $req) {
    $d_care_function = $this->d_care_function();
    $d_care_status = $this->d_care_status();

    $template_header = DCareTemplateHeader::find($req->template_id);
    $d_care_layout = $this->d_care_layout("AND d_care_layout.id = $template_header->layout_id")[0];
    // return$template_header;
    return view('d-care.d-care-report', compact('d_care_layout','d_care_function','d_care_status', 'template_header'));
  }

  // get ajax datatable
  public function get_d_care_report(Request $req) {
    // return (55);
    if ($req->ajax()) {
      $d_care = DB::select("SELECT
        d_care_report.id,
        d_care_report.header_id,
        d_care_report.detail_id,
        d_care_report.auditor_name,
        d_care_report.small_group_id,
        d_care_report.comment,
        d_care_report.file,
        d_care_report.action,
        d_care_report.status_p,
        d_care_report.status_d,
        d_care_report.status_c,
        d_care_report.status_a,
        d_care_report.status,
        DATE_FORMAT(d_care_report.created_at, '%d/%m/%Y') AS create_date,

        d_care_template_header.name AS template_name,
        d_care_template_detail.requirement,
        -- d_care_template_header.version,
        -- d_care_template_header.create_by,
        users.id AS user_id,
        users.name AS user_name,

        d_care_layout.name AS layout_name,
        d_care_function.name AS function_name,

        d_care_area.name AS area_name,
        d_care_small_group.name AS small_group_name

        FROM d_care_report
        INNER JOIN users ON users.id = d_care_report.user_id
        
        LEFT JOIN d_care_template_header ON d_care_template_header.id = d_care_report.header_id
        LEFT JOIN d_care_template_detail ON d_care_template_detail.id = d_care_report.detail_id
        LEFT JOIN d_care_area ON d_care_area.id = d_care_report.area_id
        LEFT JOIN d_care_small_group ON d_care_small_group.id = d_care_report.small_group_id
        LEFT JOIN d_care_layout ON d_care_layout.id = d_care_template_header.layout_id
        LEFT JOIN d_care_function ON d_care_function.id = d_care_template_header.function_id

        WHERE 1
         AND d_care_report.header_id = $req->header_id
         AND d_care_report.status = 1
        
        ORDER BY
          d_care_layout.id ASC,
          d_care_function.id ASC,
          d_care_area.id ASC,
          d_care_report.id ASC
          -- LENGTH(master_o_kpi.num_order) ASC,
      ", []);

      return Datatables::of($d_care)->addIndexColumn()->make(true); //->toJson();
    }
  }

  // หน้า d-care-chart
  public function d_care_chart(Request $req) {

    $d_care_area = $this->d_care_area();
    $d_care_small_group = $this->d_care_small_group();
    $master_pdca = $this->master_pdca();

    $template_header = DCareTemplateHeader::find($req->template_id);
    $d_care_layout = $this->d_care_layout("AND d_care_layout.id = $template_header->layout_id")[0];

    if($template_header->layout_id == 1) {
      $view = 'd-care.chart-gemba';
    } else {
      $view = 'd-care.chart-audit';
    }
    
    return view($view, compact('d_care_layout', 'd_care_small_group','d_care_area', 'master_pdca'));
  }

  // chart
  public function get_gemba_chart(Request $req) {
    // $date_start = substr($req->date_range,6,4)."-".substr($req->date_range,3,2)."-".substr($req->date_range,0,2);
    // $date_start = explode(' - ', $req->date_range);
    // $date_end = null; 
    $condition = '';
    if($req->date_start!=null && $req->date_end!=null) {
      $condition = "AND DATE_FORMAT(d_care_report.created_at, '%Y-%m-%d') BETWEEN '$req->date_start' AND '$req->date_end'";
    }

    if($req->type_chart == 'bar') {
      $chart_data = DB::select("SELECT
        d_care_layout.`name` AS layout_name,
        d_care_area.`name` AS area_name,
        
        COUNT(d_care_report.area_id) AS count_comment,
        d_care_report.`comment`,
        d_care_report.`status`
        
        FROM d_care_area
			
        LEFT JOIN (SELECT
          d_care_template_header.layout_id,

          d_care_report.header_id,
          d_care_report.area_id,
          d_care_report.small_group_id,
          d_care_report.comment,
          d_care_report.score,
          d_care_report.status_p,
          d_care_report.status_d,
          d_care_report.status_c,
          d_care_report.status_a,
          d_care_report.status 
          
          FROM d_care_report
          INNER JOIN d_care_template_header ON d_care_template_header.id = d_care_report.header_id
          
          WHERE 1
            AND d_care_template_header.layout_id = 1
            $condition
            
        ) AS d_care_report ON d_care_report.area_id = d_care_area.id
        
        LEFT JOIN d_care_layout ON d_care_layout.id = d_care_report.layout_id
			
        WHERE 1
          
        GROUP BY
          d_care_area.id
      ", []);
    }

    // $arr_count_pdca = [];
    if($req->type_chart == 'pie') {
      $data = DB::select("SELECT
        d_care_template_header.layout_id,
        d_care_report.header_id,
        
        COUNT(d_care_report.status_p) AS count_p,
        COUNT(d_care_report.status_d) AS count_d,
        COUNT(d_care_report.status_c) AS count_c,
        COUNT(d_care_report.status_a) AS count_a,

        d_care_report.status_p,
        d_care_report.status_d,
        d_care_report.status_c,
        d_care_report.status_a,
        d_care_report.status 
        
        FROM d_care_report
        INNER JOIN d_care_template_header ON d_care_template_header.id = d_care_report.header_id
        
        WHERE 1
          AND d_care_template_header.layout_id = 1
          $condition
      ", [])[0];

      $sum = ($data->count_p+$data->count_d+$data->count_c+$data->count_a);
      
      $chart_data = [
        'p'=> $sum==0 ?25 :($data->count_p/$sum)*100,
        'd'=> $sum==0 ?25 :($data->count_d/$sum)*100,
        'c'=> $sum==0 ?25 :($data->count_c/$sum)*100,
        'a'=> $sum==0 ?25 :($data->count_a/$sum)*100
      ];

    }

    return response()->json([
      'chart_data'=> $chart_data,
      // 'arr_count_pdca'=> $arr_count_pdca,
      'date_start'=>$req->date_start,
      'date_end'=>$req->date_end
    ]);

  }

  public function get_audit_chart(Request $req) {
    $condition = '';
    if($req->date_start!=null && $req->date_end!=null) {
      $condition = "AND DATE_FORMAT(d_care_report.created_at, '%Y-%m-%d') BETWEEN '$req->date_start' AND '$req->date_end'";
    }

    // $arr_count_pdca = [];
    if($req->type_chart == 'bar') {
      $chart_data = DB::select("SELECT
        d_care_layout.`name` AS layout_name,
        d_care_small_group.`name` AS small_group_name,
        
        SUM(d_care_report.score) AS sum_score,
        d_care_report.`score`,
        d_care_report.`status`
        
        FROM d_care_small_group
			
        LEFT JOIN (SELECT
          d_care_template_header.layout_id,

          d_care_report.header_id,
          d_care_report.area_id,
          d_care_report.small_group_id,
          d_care_report.comment,
          d_care_report.score,
          d_care_report.status 
          
          FROM d_care_report
          INNER JOIN d_care_template_header ON d_care_template_header.id = d_care_report.header_id
          
          WHERE 1
            AND d_care_template_header.layout_id = 2
            $condition
            
        ) AS d_care_report ON d_care_report.small_group_id = d_care_small_group.id
        
        LEFT JOIN d_care_layout ON d_care_layout.id = d_care_report.layout_id
			
        WHERE 1
          
        GROUP BY
          d_care_small_group.id
      ", []);

    }
    
    if($req->type_chart == 'pie') {
      $chart_data = DB::select("SELECT
        d_care_layout.`name` AS layout_name,
        d_care_area.`name` AS area_name,
        
        COUNT(d_care_report.area_id) AS count_comment,
        d_care_report.`comment`,
        d_care_report.`status`
        
        FROM d_care_area
			
        LEFT JOIN (SELECT
          d_care_template_header.layout_id,

          d_care_report.header_id,
          d_care_report.area_id,
          d_care_report.small_group_id,
          d_care_report.comment,
          d_care_report.score,
          d_care_report.status 
          
          FROM d_care_report
          INNER JOIN d_care_template_header ON d_care_template_header.id = d_care_report.header_id
          
          WHERE 1
            AND d_care_template_header.layout_id = 2
            $condition
            
        ) AS d_care_report ON d_care_report.area_id = d_care_area.id
        
        LEFT JOIN d_care_layout ON d_care_layout.id = d_care_report.layout_id
			
        WHERE 1
          
        GROUP BY
          d_care_area.id
      ", []);
    }

    return response()->json([
      'chart_data'=> $chart_data,
      // 'arr_count_pdca'=> $arr_count_pdca,
      'date_start'=>$req->date_start,
      'date_end'=>$req->date_end
    ]);

  }

  // หน้าใช้ index
  public function d_care_index(Request $req) {
    if($req->report_id == null) {
      // หน้าบันทึกข้อมูลรายงาน
      $template_header = DB::select("SELECT
        d_care_template_header.id,
        d_care_template_header.function_id,
        d_care_template_header.name,
        d_care_template_header.version,
        d_care_template_header.effective_date,
        -- DATE_FORMAT(d_care_template_header.effective_date, '%d/%m/%Y') AS effective_date,
        d_care_template_header.criteria_score,
        d_care_template_header.description,
        d_care_template_header.create_by,
        users.name AS user_name,
        d_care_template_header.status,
        
        d_care_layout.id AS layout_id,
        d_care_layout.name AS layout_name,

        master_operator.operator,
        master_operator.description AS operator_description

        FROM d_care_template_header
        INNER JOIN d_care_layout ON d_care_layout.id = d_care_template_header.layout_id
        INNER JOIN users ON users.id = d_care_template_header.user_id
        LEFT JOIN master_operator ON master_operator.operator = d_care_template_header.operator

        WHERE 1
          AND d_care_template_header.id = $req->template_id

        ORDER BY 
          d_care_template_header.id ASC
      ", [])[0];

      $template_detail = DB::select("SELECT
        d_care_template_detail.id,
        d_care_template_detail.header_id,
        d_care_template_detail.requirement

        FROM d_care_template_detail

        WHERE 1
          AND d_care_template_detail.header_id = $req->template_id

        ORDER BY 
          d_care_template_detail.id ASC
      ", []);

      $d_care_area = $this->d_care_area();
      $d_care_small_group = $this->d_care_small_group();

      if($template_header->layout_id == 1) {
        // gemba
        $view = 'd-care/index-gemba';
      } else {
        // audit
        $view = 'd-care.index-audit';
      }
      // return dd($template_header->id);
      return view($view, compact('template_header','template_detail', 'd_care_small_group','d_care_area'));
    }

    else {
      // หน้าแก้ไขข้อมูลที่รายงานไว้
      $d_care_report = DB::select("SELECT
        d_care_template_detail.requirement,

        d_care_report.id,
        d_care_report.header_id,
        d_care_report.detail_id,
        d_care_report.area_id,
        d_care_report.auditor_name,
        d_care_report.small_group_id,
        d_care_report.comment,
        d_care_report.score,
        d_care_report.file,
        d_care_report.action,
        d_care_report.status_p,
        d_care_report.status_d,
        d_care_report.status_c,
        d_care_report.status_a,
        
        d_care_template_header.name AS template_name,
        d_care_template_header.description,
        d_care_layout.id AS layout_id,
        d_care_layout.name AS layout_name

        FROM d_care_report 

        LEFT JOIN d_care_template_header ON d_care_template_header.id = d_care_report.header_id
        INNER JOIN d_care_layout ON d_care_layout.id = d_care_template_header.layout_id
        LEFT JOIN d_care_template_detail ON d_care_template_detail.id = d_care_report.detail_id
          

        WHERE 1
          AND d_care_report.id = $req->report_id

        ORDER BY 
          d_care_template_detail.id ASC
      -- ", [])[0]; //Auth::user()->id

      $d_care_area = $this->d_care_area();

      // return dd($d_care_report);

      if($d_care_report->layout_id == 1) {
        // gemba
        $view = 'd-care/index-gemba-edit';
      } else {
        // audit
        $view = 'd-care.index-audit-edit';
      }
      
      return view($view, compact('d_care_report', 'd_care_area'));
    }
  }

  // insert data
  public function insert_d_care_data(Request $req) {
    if(isset($req->txt_comment)) {
      foreach ($req->txt_comment as $key => $comment) {
        $d_care_data = new DCareReport();
        $d_care_data->header_id = $req->txt_header_id;
        $d_care_data->detail_id = $req->txt_detail_id[$key];
        $d_care_data->user_id = Auth::user()->id;
        $d_care_data->auditor_name = $req->txt_auditor_name;
        $d_care_data->small_group_id = $req->ddl_small_group;
        $d_care_data->area_id = $req->ddl_area;
        $d_care_data->comment = $comment;

        if($req->txt_layout_id == 2) { // Audit
          $d_care_data->score = $req->txt_score[$key];
          // $d_care_data->sum_score = $req->txt_sum_score;
        }

        $d_care_data->note = $req->txt_layout_id==1 ?'gemba' :'audit';
        $d_care_data->status = 1;

        if ($req->hasFile('file')) {
          if (isset($req->file[$key])) {
            // Carbon::now()->toDateString('Ymd')
            $file_name = date('Ymd') .'_'. Auth::user()->id .'_'. Str::random(5) .'_'. $req->file[$key]->getClientOriginalName();
            $req->file[$key]->move('assets/d-care', $file_name);
            
            $d_care_data->file = $file_name;
          }
        }
        $d_care_data->save();
      }
    }

    $msg = 'บันทึกข้อมูลสำเร็จ';
    
    return  response()->json([
      // 'validate'=>count($validate->errors()),
      'msg'=>$msg,
    ]);
  }

  // update data
  public function update_d_care_data(Request $req) {
    $d_care_data = DCareReport::find($req->txt_id);
    $d_care_data->auditor_name = $req->txt_auditor_name;
    $d_care_data->area_id = $req->ddl_area;
    $d_care_data->comment = $req->txt_comment;
    $d_care_data->action = $req->txt_action;
    // $d_care_data->status_pdca = isset($req->chk_status_pdca) ?implode(',' ,$req->chk_status_pdca) :null;
    $d_care_data->status_p = ($req->chk_status_p) ?($req->chk_status_p=='on' ?now() :$req->chk_status_p) :null;
    $d_care_data->status_d = ($req->chk_status_d) ?($req->chk_status_d=='on' ?now() :$req->chk_status_d) :null;
    $d_care_data->status_c = ($req->chk_status_c) ?($req->chk_status_c=='on' ?now() :$req->chk_status_c) :null;
    $d_care_data->status_a = ($req->chk_status_a) ?($req->chk_status_a=='on' ?now() :$req->chk_status_a) :null;

    if($req->txt_layout_id == 2) { // Audit
      $d_care_data->score = $req->txt_score;
    }

    if ($req->hasFile('file')) {
      // Carbon::now()->toDateString('Ymd')
      $file_name = date('Ymd') .'_'. Auth::user()->id .'_'. Str::random(5) .'_'. $req->file->getClientOriginalName();
      $req->file->move('assets/d-care', $file_name);
      
      $d_care_data->file = $file_name;
    }

    $d_care_data->save();

    $msg = 'แก้ไขข้อมูลสำเร็จ';
    
    return  response()->json([
      // 'validate'=>count($validate->errors()),
      'msg'=>$msg,
    ]);
  }

  // delete data
  public function delete_d_care_data(Request $req) {
    $d_care_report = DCareReport::find($req->d_care_report['id']);
    $d_care_report->status = 2;
    if($d_care_report->save()) {
      $msg = 'Delete Success';
    }

    return response()->json([
      'msg'=> $msg,
    ]);
  }

}

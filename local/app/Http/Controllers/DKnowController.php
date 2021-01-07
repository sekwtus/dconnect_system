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

use App\DKnowCategory;
use App\DKnow;

class DKnowController extends Controller
{
  public function d_know_category($condition=null) {
    return DB::select("SELECT
      d_know_category.*

      FROM d_know_category
      WHERE 1 $condition

      ORDER BY
        d_know_category.id ASC
    ", []);
  }

  public function d_know_type($condition=null) {
    return DB::select("SELECT
      d_know_type.*

      FROM d_know_type
      WHERE 1 $condition

      ORDER BY
      d_know_type.id ASC
    ", []);
  }

  public function index_d_know(Request $req) {
    if($req->category_id == null) {
      $d_know_category = $this->d_know_category();
      return view('d-know.d-know-main', compact('d_know_category'));
    }
    else {
      $d_know_category = $this->d_know_category("AND d_know_category.id = $req->category_id");
      // return dd($d_know_category[0]);
      $d_know_type = $this->d_know_type();
      
      $d_know_all = DB::select("SELECT
        d_know.*

        FROM d_know

        WHERE 1
          AND d_know.category_id=$req->category_id

        ORDER BY
          d_know.id ASC
      ", []);

      return view('d-know.d-know-index', compact('d_know_category','d_know_type', 'd_know_all'));
    }
  }

  public function video_d_know(Request $req) {
    
    $video = DB::table('d_know')->where(['id'=>$req->video_id])->first();

    $d_know_category = $this->d_know_category("AND d_know_category.id = $video->category_id");

    return view('d-know.d-know-video', compact('d_know_category', 'video'));
  }
  
  //todo admin
  public function get_d_know_category(Request $req) {
    // return (55);
    if ($req->ajax()) {
      $d_know_category = DB::select("SELECT
        d_know_category.id,
        d_know_category.name,
        d_know_category.description,
        d_know_category.image

        FROM d_know_category

        WHERE 1
        
        ORDER BY
          d_know_category.id ASC
          -- LENGTH(master_o_kpi.num_order) ASC,
      ", []);

      return Datatables::of($d_know_category)->addIndexColumn()->make(true); //->toJson();
    }
  }

  public function d_know(Request $req) {
    // return (55);
    $d_know_category = $this->d_know_category();
    $d_know_type = $this->d_know_type();
    return view('d-know.d-know', compact('d_know_category','d_know_type'));
  }

  public function get_d_know(Request $req) {
    // return (55);
    if ($req->ajax()) {
      $d_know = DB::select("SELECT
        d_know.id,
        d_know.category_id,
        d_know.type_id,
        d_know.name,
        d_know.detail,
        d_know.url_examination,
        d_know.file,
        d_know.image_video,
        d_know_type.name AS `type_name`

        FROM d_know
        LEFT JOIN d_know_type ON d_know_type.id = d_know.type_id

        WHERE 1
          AND d_know.category_id = $req->category_id
        
        ORDER BY
          d_know_type.id ASC,
          -- LENGTH(master_o_kpi.num_order) ASC,
          d_know.id ASC
      ", []);

      return Datatables::of($d_know)->addIndexColumn()->make(true); //->toJson();
    }
  }

  // เพิ่ม insert_d_know_category
  public function insert_d_know_category(Request $req) {
    $validate = Validator::make($req->all(), [
      'txt_name' => 'required|unique:d_know_category,name',
      'file_image' => 'nullable|image|mimes:jpeg,jpg,png,gif', //|max:10000,
    ], [
      'txt_name.required' => 'กรุณากรอกชื่อหมวดหมู่',
      'txt_name.unique' => 'มีหมวดหมู่นี้ในระบบแล้ว',
      // 'file_d_know.max' => 'ขนาดไฟล์ต้องไไม่เกิน 1 GB',
      'file_image.image'=>'ต้องเป็นไฟล์รูปภาพเท่านั้น'
    ]);

    // return  response()->json([
    //   'msg'=>$req->all(),
    // ]);
    
    if($validate->passes()) {
      $d_know = new DKnowCategory();
      $d_know->name = $req->txt_name;
      $d_know->description = $req->txt_description;

      if ($req->hasFile('file_image')) {
        $filename = date('Ymd').'_'.Str::random(5).'_'. $req->file('file_image')->getClientOriginalName();
        // $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->file('photo')->getClientOriginalExtension();
        $req->file('file_image')->move('assets/d-know/category', $filename);

        $d_know->image = $filename;
      }

      $d_know->save();

      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>'บันทึกข้อมูลสำเร็จ',
      ]);
    } 
    else {
      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>$validate->errors()->all(),
      ]);
    }
  }
  //แก้ไข d_know_category
  public function update_d_know_category(Request $req) {
    $validate = Validator::make($req->all(), [
      'txt_name' => 'required|unique:d_know_category,name,'.$req->txt_id.',id',
      'file_image' => 'nullable|image|mimes:jpeg,jpg,png,gif', //|max:10000,
    ], [
      'txt_name.required' => 'กรุณากรอกชื่อหมวดหมู่',
      'txt_name.unique' => 'มีหมวดหมู่นี้ในระบบแล้ว',
      // 'file_d_know.max' => 'ขนาดไฟล์ต้องไไม่เกิน 1 GB',
      'file_image.image'=>'ต้องเป็นไฟล์รูปภาพเท่านั้น'
    ]);
    
    if($validate->passes()) {
      $category = DKnowCategory::find($req->txt_id);
      $category->name = $req->txt_name;
      $category->description = $req->txt_description;

      if ($req->hasFile('file_image')) {
        if(file_exists('assets/d-know/category'.$category->image) && $category->image != NULL) {
          unlink('assets/d-know/category/'.$category->image); //ถ้ามีการแนบไฟล์ใหม่ จะลบไฟล์เดิมทิ้ง
        }
        $filename = date('Ymd').'_'.Str::random(5).'_'. $req->file('file_image')->getClientOriginalName();
        // $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->file('photo')->getClientOriginalExtension();
        $req->file('file_image')->move('assets/d-know/category', $filename);

        $category->image = $filename;
      }

      $category->save();

      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>'แก้ไขข้อมูลสำเร็จ',
      ]);
    } 
    else {
      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>$validate->errors()->all(),
      ]);
    }
  }

  public function insert_d_know(Request $req) {
    $validate = Validator::make($req->all(), [
      'ddl_category' => 'required',
      'ddl_type' => 'required',
      'file_d_know' => 'required', //|max:1,048,576
      'image_video' => 'nullable|image|mimes:jpeg,jpg,png,gif', //|max:10000,
    ], [
      'ddl_category.required' => 'กรุณาเลือกหมวดหมู่',
      'ddl_type.required' => 'กรุณาเลือกประเภท',
      'file_d_know.required' => 'กรุณาแนปไฟล์',
      // 'file_d_know.max' => 'ขนาดไฟล์ต้องไไม่เกิน 1 GB',
      'image_video.image'=>'ต้องเป็นไฟล์รูปภาพเท่านั้น'
    ]);

    // return  response()->json([
    //   'msg'=>$req->all(),
    // ]);
    
    if($validate->passes()) {
      $d_know = new DKnow();
      $d_know->category_id = $req->ddl_category;
      $d_know->type_id = $req->ddl_type;
      $d_know->name = $req->txt_name;
      $d_know->detail = $req->txt_detail;
      $d_know->url_examination = $req->txt_url_examination;

      if ($req->hasFile('file_d_know')) {
        $filename = date('Ymd').'_'.$req->ddl_category.$req->ddl_type.'_'.Str::random(5).'_'. $req->file('file_d_know')->getClientOriginalName();
        // $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->file('photo')->getClientOriginalExtension();
        $req->file('file_d_know')->move('assets/d-know/file', $filename);

        $d_know->file = $filename;
      }

      if ($req->hasFile('image_video')) {
        $image = date('Ymd').'_'.$req->ddl_category.$req->ddl_type.'_'.Str::random(5).'_'. $req->file('image_video')->getClientOriginalName();
        $req->file('image_video')->move('assets/d-know/image', $image);

        $d_know->image_video = $image;
      }

      $d_know->save();

      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>'บันทึกข้อมูลสำเร็จ',
      ]);
    } 
    else {
      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>$validate->errors()->all(),
      ]);
    }
  }

  // แก้ไข
  public function edit_d_know($d_know_id) {
    return ('edit_d_know '.$d_know_id);
  }
  public function update_d_know(Request $req) {
    $validate = Validator::make($req->all(), [
      'ddl_category' => 'required',
      'ddl_type' => 'required',
      'image_video' => 'nullable|image|mimes:jpeg,jpg,png,gif', //|max:10000,
    ], [
      'ddl_category.required' => 'กรุณาเลือกหมวดหมู่',
      'ddl_type.required' => 'กรุณาเลือกประเภท',
      'image_video.image'=>'ต้องเป็นไฟล์รูปภาพเท่านั้น'
    ]);

    // return  response()->json([
    //   'msg'=>$req->all(),
    // ]);
    
    if($validate->passes()) {
      $d_know = DKnow::find($req->txt_id);
      $d_know->category_id = $req->ddl_category;
      $d_know->type_id = $req->ddl_type;
      $d_know->name = $req->txt_name;
      $d_know->detail = $req->txt_detail;
      $d_know->url_examination = $req->txt_url_examination;

      if ($req->hasFile('file_d_know')) {
        if(file_exists('assets/d-know/file'.$d_know->file) && $d_know->file != NULL) {
          unlink('assets/d-know/file/'.$d_know->file); //ถ้ามีการแนบไฟล์ใหม่ จะลบไฟล์เดิมทิ้ง
        }
        $filename = date('Ymd').'_'.$req->ddl_category.$req->ddl_type.'_'.Str::random(5).'_'. $req->file('file_d_know')->getClientOriginalName();
        // $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->file('photo')->getClientOriginalExtension();
        $req->file('file_d_know')->move('assets/d-know/file', $filename);

        $d_know->file = $filename;
      }

      if ($req->hasFile('image_video')) {
        if(file_exists('assets/d-know/file'.$d_know->image_video) && $d_know->image_video != NULL) {
          unlink('assets/d-know/image/'.$d_know->image_video); //ถ้ามีการแนบไฟล์ใหม่ จะลบไฟล์เดิมทิ้ง
        }
        $image = date('Ymd').'_'.$req->ddl_category.$req->ddl_type.'_'.Str::random(5).'_'. $req->file('image_video')->getClientOriginalName();
        $req->file('image_video')->move('assets/d-know/image', $image);

        $d_know->image_video = $image;
      }

      $d_know->save();

      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>'แก้ไขข้อมูลสำเร็จ',
      ]);
    } 
    else {
      return  response()->json([
        'validate'=>count($validate->errors()),
        'msg'=>$validate->errors()->all(),
      ]);
    }
  }

  // ลบ
  public function delete_d_know(Request $req) {
    // return (55);
    $delete_d_know = DB::table('d_know')->where(['id'=>$req->d_know_id])->delete();

    if ($delete_d_know) {
      $msg = 'ลบข้อมูลสำเร็จ';
    } else {
      $msg = 'ลบข้อมูลไม่สำเร็จ '.$req->d_know_id;
    }
    
    return  response()->json([
      'msg'=>$msg,
    ]);
  }
}

@extends('layouts.master')
@section('title', 'D-Know')

@section('style')
  <style>
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Video Detail Page</h4>
  </div>
  
  <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Video Detail Page</li>
          </ol>
          <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
      </div>
  </div>
</div>

<div class="row el-element-overlay">
  <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ALL VIDEO SONGS</h5>
            <div class="row m-t-30">
              
              @php
                $arr_test = [];

                for ($i=1; $i<=10; $i++) { 
                  $num = rand(1,6);
                  if($num == '1'){
                    $department = 'pl';
                  }

                  array_push($arr_test, [
                    'id'=>$i,
                    'name'=>'video-'.$i.'.mp4',
                    'image'=>'video-'.$i.'.jpg',
                    'type_id'=>'video'
                  ]);
                }

                $data_ = json_encode($arr_test);
                $data = json_decode($data_); //return $employee;
              @endphp

              @foreach ($d_know_video as $video)
                <div class="col-lg-3 col-md-6">
                    <div class="el-card-item">
                      <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset('assets/d-know/video/'.$video->image) }}" alt="">
                        <span class="vd-time badge badge-danger badge-pill">
                          03:30
                        </span>

                          <div class="el-overlay">
                            <ul class="el-info">
                                <li>
                                  <a class="img-circle font-20" href="{{ url('video/d-know?video_id='.$video->id) }}" target="_blank">
                                    <i class="ti-control-play"></i>
                                  </a>
                                </li>
                            </ul>
                          </div>
                      </div>
                      
                      <div class="el-card-content text-left">
                        <h5 class="card-title m-b-0">
                          {{ $video->name }}
                        </h5>

                        <small class="text-muted">{{ $video->detail }}</small>
                      </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
  </div>
</div>
<!-- setting-sim3 -->
<div id="modal-setting-sim3" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog" style="max-width:50%;">
    <form id="frm-setting-sim3">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title- font-weight-bold">
            <i class="fa fa-setting"></i>
            Setting SIM 3
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="topic_id">

          <h4 class="box-title font-weight-bold">Gauge</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">topic_eng</label>
              <input type="text" name="topic_eng" class="form-control"> 
            </div>
            <div class="col-md-6">
              <label class="mb-0">topic_detail</label>
              <input type="text" name="topic_detail" class="form-control"> 
            </div>
          </div>

          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">kpi</label>
              <input type="text" name="kpi" class="form-control"> 
            </div>
            <div class="col-md-6">
              <label class="mb-0">target</label>
              <select name="target" class="form-control">
                <option disabled>เป้าหมาย</option>
                <option value=">">มากกว่า (>)</option>
                <option value="<">น้อยกว่า (<)</option>
                <option value="==">เท่ากับ (==)</option>
                <option value=">=">มากกว่าเท่ากับ(>=)</option>
                <option value="<=">น้อยกว่าเท่ากับ (<=)</option>
              </select> 
            </div>
          </div>

          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">standard_rate</label>
              <input type="text" name="standard_rate" class="form-control" value=""> 
            </div>
            <div class="col-md-6">
              <label class="mb-0">unit</label>
              <input type="text" name="unit" class="form-control" value=""> 
            </div>
          </div>

          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">gauge_color_left</label>
              <input type="text" name="gauge_color1" class="colorpicker form-control" value=""> 
            </div>
            <div class="col-md-6">
              <label class="mb-0">gauge_color_right</label>
              <input type="text" name="gauge_color2" class="colorpicker form-control" value=""> 
            </div>
          </div>

          <h4 class="box-title font-weight-bold">Table</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">first_column</label>
              <select name="first_column" class="form-control">
                <option disabled>เป้าหมาย</option>
                <option value="department">department</option>
                <option value="line">line</option>
              </select> 
            </div>
            <div class="col-md-6">
              <label class="mb-0">total_type_value</label>
              <select name="total_type_value" class="form-control">
                <option disabled>ประเภทของผลรวม</option>
                <option value="sum">sum</option>
                <option value="avg">average</option>
              </select> 
            </div>
          </div>

          <h4 class="box-title font-weight-bold">Trend</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-5">
            <div class="col-md-4">
              <label class="mb-0">min_value</label>
              <input type="text" name="min_value" class="form-control" value=""> 
            </div>
            <div class="col-md-4">
              <label class="mb-0">max_value</label>
              <input type="text" name="max_value" class="form-control" value=""> 
            </div>

            <div class="col-md-4">
              <label class="mb-0">step_size</label>
              <input type="text" name="step_size" class="form-control" value=""> 
            </div>

          </div>

          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">score_decimals</label>
              <input type="text" name="score_decimals" class="form-control" value=""> 
            </div>

            <div class="col-md-6">
              <label class="mb-0">show_line</label>
              <select name="show_line" class="form-control">
                <option value="1">true</option>
                <option value="0">false</option>
              </select> 
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label class="mb-0">line_color</label>
              <input type="text" name="line_color" class="colorpicker form-control"> 
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
          <button type="button" onclick="setting_sim3('update')" class="btn btn-success">
            <i class="far fa-save"></i>
            Save & Change
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- ลงชื่อเข้าประชุม -->
<div id="modal-sign-meeting" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog modal-xl">
    <form id="frm-sign-meeting">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title-">
            <i class="fa fa-user"></i>
            ลงชื่อเข้าประชุม
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              
              <div class="vtabs w-100">
                <ul class="nav nav-tabs tabs-vertical department_tab" role="tablist">
                  
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content pt-0 pl-0 sim3_user_meeting">
                  @php
                    $arr_employee_test = [];

                    for ($i=1; $i<=30; $i++) { 
                      $num = rand(1,6);
                      if($num == '1'){
                        $department = 'pl';
                      }
                      elseif ($num == '2') {
                        $department = 'pd';
                      }
                      elseif ($num == '3') {
                        $department = 'qfs';
                      }
                      elseif ($num == '4') {
                        $department = 'lgt';
                      }
                      elseif ($num == '5') {
                        $department = 'eng';
                      }
                      elseif ($num == '6') {
                        $department = 'ehs';
                      }
                      array_push($arr_employee_test, [
                        'id'=>$i,
                        'name'=>'นาย ทดสอบ '.$department.$i ,
                        'department_id'=>$num 
                      ]);
                    }

                    $employee_ = json_encode($arr_employee_test);
                    $employee = json_decode($employee_); //return $employee;
                  @endphp
                  
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
            <button type="button" onclick="sign_meeting('save')" class="btn btn-success">
              <i class="far fa-save"></i>
              บันทึก
            </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection 

@section('script')
<script>
  @if (\Session::has('success'))
    alert("{!! \Session::get('success') !!}");
  @endif

</script>
@endsection

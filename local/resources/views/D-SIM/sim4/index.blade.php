@extends('layouts.master')
@section('title', 'SIM 4')

@section('style')
  <!-- Date picker plugins css -->
  <link href="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/node_modules/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/node_modules/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

  <style>
    .bgGreen{
      background-color:#00c292;
    }
    .bgBlue{
      background-color:#4aa8e4;
    }

    .tb-sim4 td:not(:first-child) {
      cursor:pointer;
    }
  </style>

  {{-- date counter --}}
  <link href="{{ asset('assets/dist/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main')
<br>
<div class="{{-- row --}} ">
  <div class="{{-- col-md-12 --}}">

    <div class="{{-- card-group --}} row">
      @foreach ($sim4_master as $key => $item) 
      <div class="col-md-3">

        <div class="card ">
          <div class="card-header text-center">
            <h4 class="font-weight-bold mb-0">
              <b class="text-uppercase">
                {{ $item->topic_eng }}
              </b>
              
                        
              <div class="card-actions">
                <a type="button" onclick='refresh_opject({{ $item->topic_id }})' title="refresh">
                  <i class="icon-refresh"></i>
                </a>

                {{-- <a class="btn-minimize d-none" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <a type="button" class="{{ Auth::user()->id_type_user == 1 ? '' : 'd-none' }}" onclick="setting_sim4('open-modal', {{ $item->topic_id }})" title="ตั้งค่า">
                  <i class="ti-settings"></i>
                </a> --}}
              </div>
              
            </h4>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div id="topic_gauge{{ $item->topic_id }}" style="width:100%; height:150px;"></div>
              </div> 
            </div>

            <div class="row zoom60" >
              <div class="col-md-12 sss" style="padding-right: 1px; padding-left: 1px;">
                <table border='1' class="table-bordered tbl-dconnect w-100" id="table_sim4_{{ $item->topic_id }}">
                  <thead>
                    <tr>
                      <th class="p-0">/</th>
                      <th class="p-0">jan</th>
                      <th class="p-0">feb</th>
                      <th class="p-0">mar</th>
                      <th class="p-0">apr</th>
                      <th class="p-0">may</th>
                      <th class="p-0">jun</th>
                      <th class="p-0">jul</th>
                      <th class="p-0">aug</th>
                      <th class="p-0">oct</th>
                      <th class="p-0">sep</th>
                      <th class="p-0">nov</th>
                      <th class="p-0">dec</th>
                      {{-- <th class="p-0"> .</th>
                      <th class="p-0"> .</th> --}}
                    </tr>
                  </thead>

                  <tbody class="tb-sim4"></tbody>

                  <tfoot>
                    <tr>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      <td class="p-0"></td>
                      {{-- <td class="p-0"></td>
                      <td class="p-0"></td> --}}
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-12 px-0">
                <canvas id="chartjs-trend-sim4-{{ $item->topic_id }}" height="300"></canvas>
              </div>
            </div>
          </div>

          {{-- <div class="card-footer text-center">
            <h4 class="font-weight-bold mb-0">

              <b class="text-uppercase">
                {{ $item->topic_eng }}
              </b>
            
              <div class="card-actions">
                <a type="button" onclick='refresh_opject({{ $item->topic_id }})' title="refresh">
                  <i class="icon-refresh"></i>
                </a>

                <a class="btn-minimize d-none" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <a type="button" class="{{ Auth::user()->id_type_user == 1 ? '' : 'd-none' }}" onclick="setting_sim4('open-modal', {{ $item->topic_id }})" title="ตั้งค่า">
                  <i class="ti-settings"></i>
                </a>
              </div>

            </h4>
          </div> --}}

        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>

<!-- PDCA -->
<div class="row ">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
          <h4 class="card-title">
            <div class="row">
              <div class="col-md-5" id="text-pdca_infoshare">
                PLAN DO CHECK ACT
              </div>

              <div class="col-md-7 text-right" >
                {{-- <button class="btn btn-dark" onclick="swap_table()">
                  <i class="mdi mdi-tooltip-outline text-swap_table">Information sharing</i>
                </button> --}}

                {{-- <button onclick="sign_meeting('open-modal')" class="btn btn-info" title="ลงชื่อเข้าประชุม">
                  <i class="fa fa-user"></i>
                  ลงชื่อเข้าประชุม
                </button> --}}

                {{-- <button class="btn btn-success " onclick="save_modal_counter()" title="30 นาที">
                  <i class="fa fa-clock"></i>
                  Time start
                </button>  --}}

              </div>
            </div>
          </h4>

          <h6 class="card-subtitle" id="desc_pdca"> 
            <div class="row"> 
              <div class="col-md-12"> 
                Plan : อธิบายปัญหา, ใช้ก้างปลา, 5 WHY ค้นหาต้นเหตุ, อธิบายการแก้ไข, ระบุผู้รับผิดชอบและวันกำหนดวันเสร็จ
                Do : ลงมือแก้ไข Check : ทวนสอบปัญหาว่าจะไม่เกิดขึ้นซ้ำ Act : ผู้พบปัญหาทวนสอบหลังจากแก้ไขแล้วภายใน 15 วัน                       
              </div>
            </div>
          </h6>
          
          <div class="row">
            <div class="col-md-12">
              <table id="pdca-table" class="tbl-dconnect table-bordered table-striped">
                  <thead class="text-center">
                      <tr>
                          <th style="width:7%; padding: px;">วันที่ลงบันทึก</th>
                          <th style="width:10%; padding: px;">หัวข้อ</th>>
                          <th style="width:5%; padding: px;">จำนวน</th>
                          <th style="width:%; padding: px;">รายละเอียดของปัญหา</th>
                          <th style="width:%; padding: px;">สาเหตุของปัญหา</th>
                          <th style="width:%; padding: px;">การแก้ไข, วิธีการ</th>
                          <th style="width:7%; padding: px;">ผู้รับผิดชอบ</th>
                          <th style="width:7%; padding: px;">วันที่วางแผน</th>
                          <th style="width:10%; padding: px;">PDCA</th>
                          <th style="width:7%; padding: px;">ดำเนินการ</th>
                      </tr>
                  </thead>
              </table>

              <table id="info-sharing-table" class="tbl-dconnect table-bordered table-striped d-none">
                <thead class="text-center">
                    <tr>
                        <th style="width:13%; padding: px;">วันที่ลงบันทึก</th>
                        <th style="width:13%; padding: px;">เรื่อง</th>
                        <th style="width:69%; padding: px;">รายละเอียด</th>
                        <th style="width:5%; padding: px;">ดำเนินการ</th>
                    </tr>
                </thead>
            </table>

            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- setting-sim4 -->
<div id="modal-setting-sim4" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog" style="max-width:50%;">
    <form id="frm-setting-sim4">
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
          <button type="button" onclick="setting_sim4('update')" class="btn btn-success">
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
                <div class="tab-content pt-0 pl-0 sim4_user_meeting">
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
          <a href="{{ url('sim4/report_user_meeting') }}" class="btn btn-info">
              <i class="far fa-person"></i>
              รายงานผู้เข้าประชุม
          </a>
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

<!-- บันทึกข้อมุล sim4 -->
<div id="sim4_add_data_modal" class="modal fade">
  <div class="modal-dialog" style="max-width:50%;">
      {{-- {{ Form::open(['method' => 'post' , 'url' => 'D-SIM/sim4_data/save' , 'files' => true]) }} --}}
      <div class="modal-content">
        <form id="frm_sim4_data">
          <div class="modal-header text-center">
            <h4 class="font-weight-bold " id="sim4_modal_topic"></h4>
            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>

          <div class="modal-body">

            <div class="row">
              <div class="col-md-3">
                  <label for="save_month" >เดือน :</label>
                  <input type="text" class="form-control" name="save_month" id="save_month"  readonly />
              </div>

              <div class="col-md-3">
                  <label for="save_week" >สัปดาห์ที่ :</label>
                  <input type="text" class="form-control" name="save_week" id="save_week"  readonly />
              </div>

              <div class="col-md-3">
                  <label for="save_date" >วันที่ลงบันทึก :</label>
                  <input type="text" class="form-control" name="save_date" id="save_date" readonly />
              </div>

              <div class="col-md-3">
                <label for="plan_date" >วันที่วางแผน <span style="color:red;">PLAN</span> : </label>
                <input type="text" class="form-control" name="plan_date" id="plan_date"  />
            </div>
            </div>

            <div class="row mb-2">
              <div class="col-md-12">
                <label for="score" class="col-lg-4 control-label " style="padding-left: 0px;">จำนวน:</label> 
                <input id="score" type="text" value="0" name="score" class="col-lg-12 form-control">
              </div>
            </div>
                      
            <div class="row mb-2">
              <div class="col-md-6">
                <label for="problem_description" >รายละเอียดของปัญหา :</label>
                <textarea type="text" class="form-control" name="problem_description" id="problem_description" ></textarea>
              </div>

              <div class="col-md-6">
                  <label for="root_cause" >สาเหตุของปัญหา :</label>
                  <textarea type="text" class="form-control" name="root_cause" id="root_cause" ></textarea>
              </div>
            </div> 

            <div class="row mb-2">
              <div class="col-md-12">
                <label for="solution" >การแก้ไข, วิธีการ :</label>
                <textarea type="text" class="form-control" name="solution" id="solution" ></textarea>
                
                <input class="form-control "  id="id" type="hidden" name="id" value="">
              </div>
            </div>

        
            <div class="row mb-2">
              <div class="col-md-6">
                <label>แนบไฟล์ :</label>
                <input type="file" name="txtDescFile" style="visibility: hidden; position:absolute;" class="file-upload-default txtDescFile">
                
                <div class="input-group col-xs-12">
                  <input type="text" value="" name="file_name" id="file_name" class="form-control file-upload-info file-name txtDescFileName" placeholder="แนบไฟล์" >
                  <span class="input-group-append" >
                    <a id="a_file_name" href="" target="_blank" class="btn btn-outline-success " title="">
                        <i class="fa fa-file-pdf"></i>
                    </a>

                    <button type="button" class="file-upload-browse btn btn-outline-primary" title="แนบไฟล์">
                      <i class="fa fa-paperclip"></i>
                    </button>
                  </span>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <label for="ddlUser" >ผู้รับผิดชอบ :</label>
                <select class="select2 form-control custom-select" id="ddlUser" style="width: 100%; height:36px;">
                        <option value=""></option>
                      @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach                   
                </select>

    
                {{-- <input list="ddlUser" id="user-search" class="form-control" placeholder="รายชื่อผู้รับผิดชอบ" required>
                <datalist id="ddlUser">
                  @foreach ($users as $user)
                    <option data-value="{{ $user->id }}" value="{{ $user->name }}"></option>
                  @endforeach
                </datalist> --}}
              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              <i class="fa fa-times"></i>
              ยกเลิก
            </button>

            <input type="hidden" name="sim4_master_id">

            <button type="button" value onclick="save_data_sim4()" class="btn btn-save-data-sim4 btn-success">
              <i class="far fa-save"></i>
              บันทึก
            </button>
          </div>
      </form>
      </div>
  </div>
</div>

<div id="modal_pdca_sim4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" id="form_modal_pdca_sim4">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><span id="topic" class="text-bold"> </span> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-lg-6">
                      <label for="plan_date_pdca">วันที่วางแผน <span style="color:red;">PLAN</span>  :</label>
                      <input class="form-control "  id="plan_date_pdca" type="text" name="plan_date_pdca" value=""> 
                    </div>

                    <div class="col-lg-6">
                      <label for="do_date">วันที่ลงมือแก้ไข <span style="color:red;">DO</span> :</label>
                      <input class="form-control "  autocomplete="off"  id="do_date" type="text" name="do_date" value="">
                    </div>
                      
                    <div class="col-lg-6">
                      <label for="check_date">วันที่ตรวจสอบ <span style="color:red;">CHECK</span> :</label>
                      <input class="form-control " autocomplete="off" id="check_date" type="text" name="check_date" value="">
                    </div>
                      
                    <div class="col-lg-6">
                      <label for="action_date">วันที่ปรับปรุงปัญหา <span style="color:red;">ACTION</span> :</label>
                      <input class="form-control " autocomplete="off" id="action_date" type="text" name="action_date" value="">
                    </div>

                    <div class="col-lg-12">
                      <label for="problem_description_modal" >รายละเอียดของปัญหา :</label>
                      <textarea type="text" class="form-control" name="problem_description_modal" id="problem_description_modal" required></textarea>
                    </div>

                    <div class="col-lg-12">
                      <label for="root_cause_modal" >สาเหตุของปัญหา :</label>
                      <textarea type="text" class="form-control" name="root_cause_modal" id="root_cause_modal" required></textarea>
                    </div>

                    <div class="col-lg-12">
                      <label for="solution_modal" >การแก้ไข, วิธีการ :</label>
                      <textarea type="text" class="form-control" name="solution_modal" id="solution_modal" required></textarea>
                    </div>

                      <div class="col-md-12">
                        <label>แนบไฟล์ :</label>
                        <input type="file" name="txtDescFile_pdca" style="visibility: hidden; position:absolute;" class="file-upload-default txtDescFile">
                        
                        <div class="input-group col-xs-12">
                          <input type="text" value="" name="file_name_pdca" id="file_name_pdca" class="form-control file-upload-info file-name txtDescFileName" placeholder="แนบไฟล์" >
                          <span class="input-group-append" >
                            <a id="a_file_name_pdca" href="" target="_blank" class="btn btn-outline-success " title="">
                                <i class="fa fa-file-pdf"></i>
                            </a>
        
                            <button type="button" class="file-upload-browse btn btn-outline-primary" title="แนบไฟล์">
                              <i class="fa fa-paperclip"></i>
                            </button>
                          </span>
                        </div>
        
                      </div>
        
                      <div class="col-md-12">
                        <label for="user_id_pdca" >ผู้รับผิดชอบ :</label>
                        <select class="form-control" name="user_id_pdca" id="user_id_pdca" required>
                            <option value="" disabled selected>เลือกผู้รับผิดชอบ</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                      </div>

                    <input class="form-control " hidden name="id_sim4_data_log" id="id_sim4_data_log" value="">

                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" onclick="save_modal_sim4_PDCA()" class="btn btn-success waves-effect waves-light">Save</button>
          </div>
      </div>
    </form>
  </div>
</div>

<!-- เพิ่มข้อมูล info sharing -->
<div id="modal_info_sharing" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog modal-xl">
    <form id="frm-info-sharing">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title-">
            <i class="mdi mdi-tooltip-outline"></i>
            Infomation sharing
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12">
              <label for="topic">เรื่อง :</label>
              <input class="form-control" id="topic" type="text" name="topic" value=""/>
            </div>

              <input type="text" class="form-control" name="save_date_info_sharing" id="save_date_info_sharing" hidden/>
          
            <div class="col-lg-12">
              <label for="description">รายละเอียด :</label>
              <textarea type="text" class="form-control" rows="5" name="description" id="description" required></textarea>
            </div>

          </div>
        </div>

        <div class="modal-footer">
            <button type="button" id="save-info-sharing" onclick="modal_info_sharing('save')" class="btn btn-success">
              <i class="far fa-save"></i>
              บันทึก
            </button>
        </div>
        
      </div>
    </form>
  </div>
</div>

<!-- เลือกสัปดาห์ที่แสดงผล -->
<div id="modal-select-week" class="modal fade  modal-select-week">
  <div class="modal-dialog">
    <form id="frm-select-week">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title-">
            <i class="fa fa-user"></i>
            เลือกสัปดาห์ที่แสดงผล
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-2">
                แสดงผล
            </div>
            <div class="col-md-6">
               <input type="number" id="find_last_week" class="form-control" value="0" required>
            </div>
            <div class="col-md-4">
                สัปดาห์ก่อนหน้า
            </div>
          </div>
        </div>

        <div class="modal-footer" > 
          <button onclick="refresh_opject('all')" data-dismiss="modal"  class="btn btn-success" type="button"> <i class="far fa-save"></i> บันทึก </button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- send mail -->
<div id="modal-send-mail" class="modal fade modal-send-mail">
  <div class="modal-dialog">
    <form id="frm-select-week">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title-">
            <i class="mdi mdi-email"></i>
            ส่งอีเมล์
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <div class="row">
            
            <div class="col-md-12">
                <h5 class=" ">Multiple select boxes</h5>
                <select class="selectpicker" multiple data-style="form-control btn-info" style="width: 500px; ">
                    <option value="" disabled selected>เลือกผู้รับผิดชอบ</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
              <label for="user_id_pdca" >Multiple select boxes :</label>
              <select class="form-control" name="user_id_pdca" id="user_id_pdca" required>
             
              </select>
            </div>

          </div>
        </div>

        <div class="modal-footer" > 
          <button onclick="refresh_opject('all')" data-dismiss="modal"  class="btn btn-success" type="button"> <i class="far fa-save"></i> บันทึก </button>
        </div>
      </div>
    </form>
  </div>
</div>


@endsection 

@section('script')
<!-- datepicker-->

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}
<script type="text/javascript" src="{{asset('/assets/dist/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/dist/js/daterangepicker.min.js')}}"></script>

{{-- file upload --}}
<script src="{{ asset('assets/dist/js/file-upload.js') }}"></script>

{{-- main --}}
<script type="">

  @if (\Session::has('success'))
    alert("{!! \Session::get('success') !!}");
  @endif

  var arr_topic_gauge = {};
  var arr_trend_chart = {};
  // var json = { "{{ $sim4_master }}" };
  // console.log("" );

  var table = {}; // ตัวแปร data-table
  var sim4_master = {!! json_encode($sim4_master)  !!}; // console.log(sim4_master);
  // console.log(sim4_master);
  
  // วนลูป sim4_master
  $.each(sim4_master, function (index, value) {
    $('.first_column'+index).text(value.first_column);

    // var arr_day_week = get_days_week();
    // // console.log( arr_day_week );//วันทั้งหมดในweek

    //table move to fn datatable_calling
    datatable_calling(value);

    // modal
    $(`#table_sim4_${value.topic_id} tbody`).on("click", "td", function () {  //call modal add data
      
      if ($(this).index() != 0) {
          var data_record = table[`table_sim4_${value.topic_id}`].row($(this).parents("tr")).data();
          
          var arr_day_week = get_days_week();
          // console.log( arr_day_week );//วันทั้งหมดในweek
          // var today = arr_day_week[$(this).index() -1 ];

          var this_day = new Date(); // defualt วันนี้ ทุกการเปิด modal
          this_day = moment(this_day).format('DD/MM/YYYY');

          console.log( 
            // data_record,
            // `topic: ${value.topic_eng}\ndept: ${data_record.dept_id}\n`+
            // 'day: '+ $(`#table_sim4_${index} thead th`).eq($(this).index()).text().trim() +
            // '\nday_num : '+$(this).index()+
            // '\nvalue ของ td: '+ $(this).text()
          );

          $("input[name='score']").trigger('touchspin.destroy');
          $("input[name='score']").TouchSpin({
            min: 0,
            max: 9999,
            decimals: parseInt(value.score_decimals), // ตำแหน่งทศนิยม
            forcestepdivisibility: 'none', // ไม่ปัดเศษ
            stepinterval: 50,
            maxboostedstep: 10000000,
            postfix: value.unit,
          });

          // input
          if(data_record.dept_id) {
            $('.div-department').show();
            $("#department_id").val(data_record.dept_id);
            $('.div-line').hide();
            $("#ddlLine").attr('disabled', true);
            $("#department_id").attr('disabled', false);
          }
          else if(data_record.line_number){
            $('.div-line').show();
            $("#ddlLine").val(data_record.line_number);
            $('.div-department').hide();
            $("#department_id").attr('disabled', true);
            $("#ddlLine").attr('disabled', false);
          }

          $('#sim4_modal_topic').html(value.topic_eng + ' : ' +value.topic_detail );
          $('#save_month').val( $(`#table_sim4_${value.topic_id} thead th`).eq($(this).index()).text().trim() );
          $('#save_week').val( $(this).parent('tr').children('td:first').text() );
          $('#save_date').val(this_day);
          $("input[name='sim4_master_id']").val(value.id_sim4);

          $('.btn-save-data-sim4').attr('onclick', `save_data_sim4(${value.topic_id})`);

          $.ajax({
              type: 'get',
              // dataType: 'JSON',
              url: `{{ url('D-SIM/sim4/get_data_modal') }}`, //test
              data: {
                      sim4_master_id: value.id_sim4, 
                      month : $(`#table_sim4_${value.topic_id} thead th`).eq($(this).index()).text().trim(),
                      week : $(this).parent('tr').children('td:first').text(),
                      save_date: this_day,
                    },
              beforeSend: function(){
                  $("input[name='score']").val('');
                  $('#problem_description').val('');
                  $('#root_cause').val('');
                  $('#solution').val('');
                  // $("#user_id").val('');
                  $("#ddlUser").val('');
                  $("#ddlUser").select2();

                  $("#id").val('');
                  $("#file_name").val('');
                  $("#a_file_name").hide();

                  $("#plan_date").val(this_day);
              },
              success: function (data){ 
                console.log(data);
                if(data) {
                  $("input[name='score']").val(data.SIM4_data_log[0].score);
                  $('#problem_description').val(data.SIM4_data_log[0].problem_description);
                  $('#root_cause').val(data.SIM4_data_log[0].root_cause);
                  $('#solution').val(data.SIM4_data_log[0].solution);
                  
                  // var user_name = $('#ddlUser [data-value="' + data.SIM4_data_log[0].user_id + '"]').val(); 
                  $('#ddlUser').val(data.SIM4_data_log[0].user_id);
                  $("#ddlUser").select2();

                  $("#id").val(data.SIM4_data_log[0].id);
                  $("#file_name").val(data.SIM4_data_log[0].file_name );
                  $("#plan_date").val(data.SIM4_data_log[0].plan_date);

                  // console.log(data.SIM4_data_log[0].file_name);
                  if (data.SIM4_data_log[0].file_name) {
                    $("#a_file_name").show();
                    $("#a_file_name").attr("href",`{{ asset('assets/sim4_file/${data.SIM4_data_log[0].file_name}' ) }}`);
                  }
                }
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
                console.log("Status: " + textStatus + "\nError: " + errorThrown);
              },
              complete: function(){
              },
          });

          
          $('#sim4_add_data_modal').modal('toggle');
          
      }
    });

    // วาด trend chart
    // trend_chart(index, value, arr_day_week);
  });

  // setting_sim4
  function setting_sim4(todo, topic_id='') { 
    if (todo === 'open-modal') {
      $('input[name="topic_id"]').val(topic_id);
      // alert(todo+' '+topic_id+' '+$('input[name="topic_id"]').val());
      $.ajax({
        type: "get",
        url: `{{ url('sim4/setting') }}`,
        data: {topic_id:topic_id},
        success: function (res) {
          // console.log(res.sim4_master);
          $('input[name="topic_eng"]').val(res.sim4_master.topic_eng);
          $('input[name="topic_detail"]').val(res.sim4_master.topic_detail);
          $('input[name="kpi"]').val(res.sim4_master.kpi);
          $('select[name="target"]').val(res.sim4_master.target);
          $('input[name="standard_rate"]').val(res.sim4_master.standard_rate);
          $('input[name="unit"]').val(res.sim4_master.unit);

          // color picker
          $(".colorpicker").asColorPicker();
          $('input[name="gauge_color1"]').asColorPicker('val',res.sim4_master.gauge_color1);
          $('input[name="gauge_color2"]').asColorPicker('val', res.sim4_master.gauge_color2);

          $('select[name="first_column"]').val(res.sim4_master.first_column);
          $('select[name="total_type_value"]').val(res.sim4_master.total_type_value);

          $('input[name="min_value"]').val(res.sim4_master.min_value);
          $('input[name="max_value"]').val(res.sim4_master.max_value);
          $('input[name="step_size"]').val(res.sim4_master.step_size);
          $('input[name="line_color"]').asColorPicker('val', res.sim4_master.line_color);

          $('select[name="show_line"]').val(res.sim4_master.show_line);
          $('input[name="score_decimals"]').val(res.sim4_master.score_decimals);
          
          // $('input[name="line_color"]').asColorPicker('val', res.sim4_master.line_color);

          $('#modal-setting-sim4').modal('show');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON); ;
        },
      });
    }
    else if (todo === 'update'){
      // $(".colorpicker").asColorPicker('clear');
      // alert(todo+' '+topic_id+' '+$('input[name="txtTopicID"]').val());
      $.ajax({
        type: "post",
        url: `{{ url('sim4/setting') }}`,
        data: $('#frm-setting-sim4').serialize(),
        success: function (res) {
          console.log(res);
          alert(res.msg);
          datatable_calling(res.sim4_master);
          $('#modal-setting-sim4').modal('hide');
          // ยังไม่destroy
          $("input[name='score']").trigger('touchspin.destroy');
          console.log('touchspin.destroy');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON); ;
        },
      });
    }
  }

  // save_data_sim4
  function save_data_sim4(topic_id) {
    // alert($('#ddlUser').val());
    var form_data = new FormData($('#frm_sim4_data')[0]);   
    var value_search = $('#ddlUser').val();
    form_data.append('user_id', value_search);
    // disabled ปุ่มบันทึกไว้ กันข้อมูลเบิ้ล
    $('.btn-save-data-sim4').attr('disabled', true);    

    $.ajax({
      type: 'post',
      dataType: 'JSON',
      url: `{{ url('D-SIM/sim4_data/save') }}`,
      data: form_data,
      contentType: false,
      processData: false,
      beforeSend: function(){
      },
      success: function (res) {
        // console.log(index);
        alert(res.msg);
        
        $('.btn-save-data-sim4').attr('disabled', false);

        $('#sim4_add_data_modal').modal('toggle');
        refresh_opject(topic_id);
        table_pdaca_sim4.ajax.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest.responseJSON); ;
      },
      complete: function(){
      },
    });
  }

  function refresh_opject(topic_id) {
    // console.log(value.topic_eng);
    // var refresh_op_day_week = get_days_week();
    var str = '';
    if (topic_id === 'all') {
      $.each(sim4_master, function (indexInArray, valueOfElement) { 
          datatable_calling(valueOfElement);
          str = str +','+ valueOfElement.topic_id;
      });
      console.log('fn-[refresh_opject-all]-topic'+str);
    } else {
      var value_sim4_master;
      $.each(sim4_master, function (indexInArray, valueOfElement) { 
        if(valueOfElement.topic_id == topic_id){
          value_sim4_master = valueOfElement;
        }
      });
        
      datatable_calling(value_sim4_master);
      console.log('fn-[refresh_opject]-active');
    }
  }
  
  function datatable_calling(value) {
    var total_score_in_today = [];
    var arr_day_week = get_days_week();

    var arr_count_avg = { // ใช้เป็นตัวหารค่าเฉลี่ย OE ของ หัวข้อ COST
      count_avg_jan:0, 
      count_avg_feb:0, 
      count_avg_mar:0, 
      count_avg_apr:0, 
      count_avg_may:0, 
      count_avg_jun:0, 
      count_avg_jul:0,
      count_avg_aug:0, 
      count_avg_oct:0, 
      count_avg_sep:0, 
      count_avg_nov:0, 
      count_avg_dec:0,
    }; 

    // table
    table[`table_sim4_${value.topic_id}`] = $(`#table_sim4_${value.topic_id}`).DataTable( {  //datatable
      destroy: true,
      lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
      dom: 't',
      "scrollX": false,
      orderCellsTop: true,
      fixedHeader: true,
      "bSort": false,
      "order": [],
      ajax: {
          url: '{{ url('D-SIM/sim4/get_data_table') }}',
          data: {sim4_master:value, arr_day_week:arr_day_week},
          complete: function(){
              // $('.ajax-loader').css("visibility", "hidden");
          },
          error: function(){
            console.log('reloading_datatable');
            refresh_opject(value.topic_id)
            // table[`table_sim4_${index}`].ajax.reload();          
          },
      },
      columns: [
        { data: 'dept', className:'text-center p-0 bgBlue'},
        { data: 'jan', className:'text-center p-0'},
        { data: 'feb', className:'text-center p-0'},
        { data: 'mar', className:'text-center p-0'},
        { data: 'apr', className:'text-center p-0'},
        { data: 'may', className:'text-center p-0'},
        { data: 'jun', className:'text-center p-0'},
        { data: 'jul', className:'text-center p-0'},
        { data: 'aug', className:'text-center p-0'},
        { data: 'oct', className:'text-center p-0'},
        { data: 'sep', className:'text-center p-0'},
        { data: 'nov', className:'text-center p-0'},
        { data: 'dec', className:'text-center p-0'},
        // { data: 'score_Sun', className:'text-center p-0'},
      ],
      columnDefs: [
        {
            targets: 0,
            render: function (data, type, row, meta) { //`
              if(row.line_number) {
                return `LINE ${row.line_number}`;
              } else {
                return `${row.dept}`;
              }
            }
        },   
        {
            targets: 1,
            createdCell: function (td, cellData, row, numRow, col) {
              $(td).html( (row.jan ? parseInt(row.jan).toFixed( value.score_decimals ) : 0 ) );

              if ( func_target(value.target, row.jan, value.standard_rate) ) {
                $(td).css({'background-color':'#CCFF99' , 'font-weight' : 'bold'}); //green
              } else {
                $(td).css({'background-color':'#FF9999' , 'font-weight' : 'bold'});
              }
            },
        },   
        {
            targets: 2,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.feb ? parseInt(row.feb).toFixed( value.score_decimals ) : 0 ));
              if(func_target(value.target, row.feb, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },   
        {
            targets: 3,
            createdCell: function (td, celldata, row, numrow, col){
                $(td).html((row.mar ? parseInt(row.mar).toFixed( value.score_decimals ) : 0 ));
                
              if( func_target(value.target, row.mar, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },  
        {
            targets: 4,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.apr ? parseInt(row.apr).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.apr, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },   
        {
            targets: 5,
            createdCell: function (td, celldata, row, numrow, col){
              // if(inddex==6)
              // console.log(td);
              $(td).html((row.may ? parseInt(row.may).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.may, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        {
            targets: 6,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.jun ? parseInt(row.jun).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.jun, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        
        {
            targets: 7,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.jul ? parseInt(row.jul).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.jul, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        
        {
            targets: 8,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.aug ? parseInt(row.aug).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.aug, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        
        {
            targets: 9,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.oct ? parseInt(row.oct).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.oct, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        
        {
            targets: 10,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.sep ? parseInt(row.sep).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.sep, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        
        {
            targets: 11,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.nov ? parseInt(row.nov).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.nov, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        
        {
            targets: 12,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.dec ? parseInt(row.dec).toFixed( value.score_decimals ) : 0 ));

              if( func_target(value.target, row.dec, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        }, 
      ],
      
      //footer
      fnInitComplete: function ( row, data ) {
        var api = this.api(), data;
        
        // var count_avg = 0;
        // converting to interger to find total
        var intVal = function ( i ) {
          return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                  i : 0;
        };
        // computing column Total of the complete result 
        var janTotal = api
          .column( 1 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_jan']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var febTotal = api
          .column( 2 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              // console.log( 0/0 );
              if(b > 0){
                arr_count_avg['count_avg_feb']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var marTotal = api
          .column( 3 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_mar']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var aprTotal = api
          .column( 4 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_apr']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var mayTotal = api
          .column( 5 )
          .data()
          .reduce( function (a, b, index_value) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_may']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );

        var junTotal = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
              if(value.total_type_value === 'avg'){
                if(b > 0){
                  arr_count_avg['count_avg_jun']++
                }
              }
              return intVal(a) + intVal(b);
        }, 0 );

        var julTotal = api
            .column( 7 )
            .data()
            .reduce( function (a, b) {
              if(value.total_type_value === 'avg'){
                if(b > 0){
                  arr_count_avg['count_avg_jul']++
                }
              }
              return intVal(a) + intVal(b);
        }, 0 );

        var augTotal = api
            .column( 8 )
            .data()
            .reduce( function (a, b) {
              if(value.total_type_value === 'avg'){
                if(b > 0){
                  arr_count_avg['count_avg_aug']++
                }
              }
              return intVal(a) + intVal(b);
        }, 0 );

        var octTotal = api
            .column( 9 )
            .data()
            .reduce( function (a, b) {
              if(value.total_type_value === 'avg'){
                if(b > 0){
                  arr_count_avg['count_avg_oct']++
                }
              }
              return intVal(a) + intVal(b);
        }, 0 );

        var sepTotal = api
            .column( 10 )
            .data()
            .reduce( function (a, b) {
              if(value.total_type_value === 'avg'){
                if(b > 0){
                  arr_count_avg['count_avg_sep']++
                }
              }
              return intVal(a) + intVal(b);
        }, 0 );

        var novTotal = api
            .column( 11 )
            .data()
            .reduce( function (a, b) {
              if(value.total_type_value === 'avg'){
                if(b > 0){
                  arr_count_avg['count_avg_nov']++
                }
              }
              return intVal(a) + intVal(b);
        }, 0 );

        var decTotal = api
            .column( 12 )
            .data()
            .reduce( function (a, b) {
              if(value.total_type_value === 'avg'){
                if(b > 0){
                  arr_count_avg['count_avg_dec']++
                }
              }
              return intVal(a) + intVal(b);
        }, 0 );

        // Update footer by showing the total with the reference of the column index 
        if(value.total_type_value === 'avg') {

          var topic_footer = 'Average';
          janTotal = Number( (janTotal / arr_count_avg['count_avg_jan']) ).toFixed(value.score_decimals);
          febTotal = Number( (febTotal / arr_count_avg['count_avg_feb']) ).toFixed(value.score_decimals);
          marTotal = Number( (marTotal / arr_count_avg['count_avg_mar']) ).toFixed(value.score_decimals);
          aprTotal = Number( (aprTotal / arr_count_avg['count_avg_apr']) ).toFixed(value.score_decimals);
          mayTotal = Number( (mayTotal / arr_count_avg['count_avg_may']) ).toFixed(value.score_decimals);
          junTotal = Number( (junTotal / arr_count_avg['count_avg_jun']) ).toFixed(value.score_decimals);
          julTotal = Number( (julTotal / arr_count_avg['count_avg_jul']) ).toFixed(value.score_decimals);
          augTotal = Number( (augTotal / arr_count_avg['count_avg_aug']) ).toFixed(value.score_decimals);
          octTotal = Number( (octTotal / arr_count_avg['count_avg_oct']) ).toFixed(value.score_decimals);
          sepTotal = Number( (sepTotal / arr_count_avg['count_avg_sep']) ).toFixed(value.score_decimals);
          novTotal = Number( (novTotal / arr_count_avg['count_avg_nov']) ).toFixed(value.score_decimals);
          decTotal = Number( (decTotal / arr_count_avg['count_avg_dec']) ).toFixed(value.score_decimals);
          // sunTotal = Number( (sunTotal / arr_count_avg['count_avg_sun']) ).toFixed(value.score_decimals);
        } else {
          var topic_footer = 'Total';
        }
        // parseInt(row.score_Sat).toFixed( value.score_decimals ) 

        var arr_total_all = [
          topic_footer, 
          isNaN(janTotal) ?0 : Number(janTotal).toFixed(value.score_decimals),
          isNaN(febTotal) ?0 : Number(febTotal).toFixed(value.score_decimals),
          isNaN(marTotal) ?0 : Number(marTotal).toFixed(value.score_decimals),
          isNaN(aprTotal) ?0 : Number(aprTotal).toFixed(value.score_decimals),
          isNaN(mayTotal) ?0 : Number(mayTotal).toFixed(value.score_decimals),
          isNaN(junTotal) ?0 : Number(junTotal).toFixed(value.score_decimals),
          isNaN(julTotal) ?0 : Number(julTotal).toFixed(value.score_decimals),
          isNaN(augTotal) ?0 : Number(augTotal).toFixed(value.score_decimals),
          isNaN(octTotal) ?0 : Number(octTotal).toFixed(value.score_decimals),
          isNaN(sepTotal) ?0 : Number(sepTotal).toFixed(value.score_decimals),
          isNaN(novTotal) ?0 : Number(novTotal).toFixed(value.score_decimals),
          isNaN(decTotal) ?0 : Number(decTotal).toFixed(value.score_decimals),
          // isNaN(sunTotal) ?0 : Number(sunTotal).toFixed(value.score_decimals)
        ];
        for (let ii = 0; ii < 13; ii++) {
            $( api.column( ii ).footer() ).html(arr_total_all[ii]);
            if ( func_target(value.target, arr_total_all[ii], value.standard_rate) ) {
                $( api.column( ii ).footer() ).css({'background-color':'#00c292' , 'font-weight' : 'bold'});
            } else {
                $( api.column( ii ).footer() ).css({'background-color':'#ff0000' , 'font-weight' : 'bold'});
            }
        }
        $( api.column( 0 ).footer() ).css({'background-color':'#4aa8e4' , 'font-weight' : 'bold'});
        
        total_score_in_today[value.topic_id] = arr_total_all;

        // console.log('table' , total_score_in_today[value.topic_id]);

        main_gauge(value, total_score_in_today);
        trend_chart(value, arr_total_all)
      },
    });
  }
  
  function trend_chart(value, arr_total) {
    const arr_period = [
      'jan',
      'feb',
      'mar',
      'apr',
      'may',
      'jun',
      'jul',
      'aug',
      'oct',
      'sep',
      'nov',
      'dec'
      ]; // months.splice(3,2);
    arr_total.shift(); // ลบ value Total/Average ออกก่อน
    // if(value.topic_id==1){
    //   console.log(arr_total);
    // }

    if(arr_trend_chart[`trend_chart${value.topic_id}`]){ 
      // ถ้ามีชาทอันเก่าอยุ่แล้ว ให้ destroy ก่อน
      arr_trend_chart[`trend_chart${value.topic_id}`].destroy();
    }

    arr_trend_chart[`trend_chart${value.topic_id}`] = new Chart(document.getElementById(`chartjs-trend-sim4-${value.topic_id}`), {
      type: "line",
      data: {
        labels: arr_period,
        datasets: [
          {
            showLine: parseInt(value.show_line),
            label: 'trend', //PL
            type: `line`,
            fill: false,
            backgroundColor: value.line_color,
            borderColor: value.line_color,
            // backgroundColor:chart_color(Number(value.topic_id)),
            // data: arr_period.map(day=> {
            //   return getRandomInt(5,50);
            // }),
            data: arr_total,
            // lineTension: 0.4, // ความโค้งของเส้น
          }
        ],
      }, 

      options: {
        legend:{
          display: false,
        },
        responsive: true,
        title: {
          display: false,
          text: 'Trend'
        },
        chartArea: {
          backgroundColor: 'rgba(251, 85, 85, 0.4)', // color main bg
        },
        scales: {
          xAxes: [{
            scaleLabel: {
              display: false,
              labelString: 'แผนก',
              fontColor: '#000',
            },
            ticks: {
              fontColor: '#000', // สี label แกน X
            },
          }],
          yAxes: [{
            scaleLabel: {
              display: false,
              labelString: 'OE',
              fontColor: '#000',
            },
            ticks: {
              beginAtZero: true,
              min: value.min_value,
              max: value.max_value,
              fontColor: '#000', // สี label แกน Y
              stepSize: value.step_size,
              callback: function(value, index, values) {
                return value;
              }
            },
            gridLines: { // สี bg ของ chart
              drawOnChartArea: true,
              backgroundColorRepeat: true,
              backgroundColor: [
                // 'green',
                // 'green',
                // 'rgb(255,0,0, 0.9)',
                // 'rgb(255,0,0, 0.9)',
              ],
            },
          }],
        }
      }
    });

  }
  
  function main_gauge(value, data_total) {
    var guage_option = {
      title : { 
        show: false,
        triggerEvent: true,
        text: 'TEST TITLE',
        // subtext: "test sub title",
        // link:'aaaaaa.png',
        target: 'blank', // self
        textStyle: {
          fontSize: 16,
          // fontColor: '#fff000',
          rich: {
            "<style_name>": {
              // fontStyle: "italic",
              align: "center",
            }
          }
        },
        subtextStyle: { },
        left: "center",
        top: "center",
        // textAlign: 'center',
        // textVerticalAlign: 'center'
      },
      tooltip : {
        show: false,
        // formatter: "{a} <br/>{b} : {c}%"
        formatter: `{a} <br/>{b} <br/>{ {c} ${value.unit}`,

        // trigger: 'restore',
        // formatter: function (params, ticket, callback) {
        // 	console.log("formatter params ",params);
        // 	console.log("formatter ticket ",ticket);
        //   // return 'Loading';
        // }
      },
      toolbox: {
        show : false,
        feature : {
          restore : {show: true},
          saveAsImage : {show: false}
        }
      },
      series : [
        {
          name:'',
          type:'gauge',
          center: ['50%', '55%'], // ตำแหน่ง x,y
          radius: '100%', // ขนาด guage
          startAngle: 180, //lef
          endAngle: 0,
          // splitNumber: 10,

          splitLine: { // เส้นขั้นหลัก
            show: false,
            length :13, // ความยาวของเส้นหลัก (0 10 20 30)
            lineStyle: {
              color: 'auto',
              shadowColor: '#000',
              shadowBlur: 4,
            }
          },
          axisTick: { // เส้นขั้นรอง
            show: false,
            splitNumber: 10, // ระยะห่างของค่า value
            length: 10, // ความยาวเส้นรอง
            lineStyle: { // lineStyle
              color: 'auto',
              // shadowColor: '#000', // สีเงาของเส้น guage
              // shadowBlur: 5,
            }
          },
          axisLine: { // ขอบ guage
            lineStyle: {
              color: [
                [0.5, '#ff0000'], [1, '#55ce63'], // ช่วง value ของสี, สี
              ], 
              width: 15, // ความหนาของขอบ guage
            }
          },
          axisLabel: { // ตัวเลข ใน guage
            // lineHeight: 56,
            show: false,
            distance: 5,
            textStyle: {
              color: 'auto', // auto
              fontWeight: 'bolder',
              fontSize: 10,
            }
          },
          pointer : { // เข็ม
            show: true,
            length: '100%', // ความยาว
            width : 4, // ความหนา
            color: '#000',
          },
          detail : { // ค่าตัวเลขด้านล่างเกจ
            show : true,
            offsetCenter: [0, '0%'], // ตำแหน่ง x,y
            formatter:'{value}%',
            // backgroundColor: 'rgba(30,144,255,0.8)',
            // borderWidth: 1,
            // borderColor: '#fff',
            // shadowColor: '#fff',
            shadowBlur: 5,
            textStyle: { // TEXTSTYLE
              color: 'auto',
              fontWeight: 'bolder',
              fontSize: 13, // font-size 
            }
          },
          title : { // title ของ name
            show : true,
            offsetCenter: [0, '60%'], // ตำแหน่ง x,y
            textStyle: {
              color: '#000',
              fontWeight: 'bolder',
              fontSize: 14,
              // shadowColor: '#000',
              // shadowBlur: 1
            }
          },

          data:[
            {value: 50, name: 'วัดเรื่องอะไร'}
          ]
        }
      ]
    };

    // if(arr_topic_gauge[`topic_gauge${index}`]){ 
    //   // ถ้ามีชาทอันเก่าอยุ่แล้ว ให้ destroy ก่อน
    //   console.log(arr_topic_gauge[`topic_gauge${index}`]);
    //   $(`#topic_gauge${index}`).html('');
    // }
    arr_topic_gauge[`topic_gauge${value.topic_id}`] = echarts.init(document.getElementById(`topic_gauge${value.topic_id}`));
    
    // set option value guage
    var today = new Date();
    var month_number = today.getMonth() +1; //11 (dec) +1 footer topic

    if(value.total_type_value === 'avg') {
      var sum_score = Number(data_total[value.topic_id][month_number]).toFixed(1); // จำนวน getRandomInt(10,100)
    } else {
      var sum_score = Number(data_total[value.topic_id][month_number]);
    }
    // guage_option.series[0].data[0].value = sum_score.toFixed(0); //getRandomInt(10,100);
    // guage_option.series[0].detail.formatter = `{value} ${value.unit}`;
      guage_option.series[0].detail.formatter = `${sum_score} ${value.unit}`;

    if ( func_target(value.target, sum_score, value.standard_rate) ) {
      // console.log('true',_title, sum_score ,value.target, value.standard_rate);
      if(value.gauge_color1 == '#00b050' && value.gauge_color2 == '#ff0000') {
        guage_option.series[0].data[0].value = 25; //getRandomInt(10,100);
      } else {
        guage_option.series[0].data[0].value = 75; //getRandomInt(10,100);
      }
    } else {
      // console.log('false',_title, sum_score , value.target,  value.standard_rate);
      if(value.gauge_color1 == '#ff0000' && value.gauge_color2 == '#00b050') {
        guage_option.series[0].data[0].value = 25;
      } else {
        guage_option.series[0].data[0].value = 75;
      }
    }

    // เปลี่ยนสี guage ตาม เรทของ หัวข้อ sim4
    guage_option.series[0].axisLine.lineStyle.color = [[0.5, value.gauge_color1], [1, value.gauge_color2]];
    // console.log(guage_option.series[0].axisLine.lineStyle.color[0]);
    guage_option.series[0].data[0].name = `${value.topic_detail} ${value.kpi}`;

    arr_topic_gauge[`topic_gauge${value.topic_id}`].setOption(guage_option, true), $(function() {
      function resize() {
        setTimeout(function() {
          arr_topic_gauge[`topic_gauge${value.topic_id}`].resize();
        }, 100);
      }
      $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
    });

    // event เมื่อคลิก เข็ม gauge
    arr_topic_gauge[`topic_gauge${value.topic_id}`].on('click', function (params) {
      // $(`#topic_gauge${index}`).html('');
      // console.log(params.data.value);
      // guage_option.series[0].data[0].value = getRandomInt(10,100);
      // arr_topic_gauge[`topic_gauge${index}`].setOption(guage_option, true);
    });
  }

  // วันทั้งหมดใน week
  function get_days_week(){
      var today = new Date();
      var days_number = today.getDay()-1; //4 (Thu)
      var arr_day_date = [];
      var $c = 0;
      
      var find_last_week = $('#find_last_week').val();

      for (let bf = days_number; bf > 0 ; bf--) {
      var date = new Date();
      date.setDate(date.getDate() - bf -(7*find_last_week) );
      arr_day_date[$c] = moment(date).format('DD/MM/YYYY');
      $c++;
      }
      for (let af = 0 ; af < (7-days_number) ; af++) {
      var date = new Date();
      date.setDate(date.getDate() + af -(7*find_last_week) );
      arr_day_date[$c] = moment(date).format('DD/MM/YYYY');
      $c++;
      }
      return arr_day_date;
  }
  
  // modal ลงชื่อคนเข้าประชุม
  function sign_meeting(todo) {
    if (todo === 'open-modal') {
      $('#modal-sign-meeting').modal('show');
      
      $.ajax({
        type: "get",
        url: `{{ url('sim4/get_sim4_user') }}`,
        success: function (res) {
          // console.log(res.sim4_user_meeting);
          $('.department_tab').html(res.department_tab);
          $('.sim4_user_meeting').html(res.sim4_user_meeting);
          /*
            $('.check').each(function() {
              var ck = $(this).attr('data-checkbox') ? $(this).attr('data-checkbox') : 'icheckbox_minimal-red';
              var rd = $(this).attr('data-radio') ? $(this).attr('data-radio') : 'iradio_minimal-red';

              if (ck.indexOf('_line') > -1 || rd.indexOf('_line') > -1) {
                $(this).iCheck({
                  checkboxClass: ck,
                  radioClass: rd,
                  insert: '<div class="icheck_line-icon"></div>' + $(this).attr("data-label")
                });
              } else {
                $(this).iCheck({
                  checkboxClass: ck,
                  radioClass: rd
                });
              }
            });
          */
        }
      });
    } 
    else {
      // alert('อยู่ในระหว่างดำเนินการ');
      // console.log( $('#frm-sign-meeting').serialize() );
      // return false;

      $.ajax({
        type: "post",
        url: `{{ url('sim4/save_sim4_user_meeting') }}`,
        data: $('#frm-sign-meeting').serialize(),

        success: function (res) {
          // console.log(res);
          alert(res.msg);
          if(res.msg == 'บันทึกข้อมูลสำเร็จ') {
            $('#modal-sign-meeting').modal('hide');
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
          // console.log("Status: " + textStatus + "\nError: " + errorThrown);
        },
      });
    }
  }
</script>

<script>
  $(document).ready(function() {
    $("body").trigger("resize");
    $("body").addClass("mini-sidebar");
    $('.navbar-brand span').hide();
    var current = location.pathname;
    // alert(current);
    datatable_pdca();
    set_start_meeting();

    $(".select2").select2();
    $('.selectpicker').selectpicker();

    $('#showHeader').html('SIM 4 ({{ th_date_short(date("Y-m-d")) }})');

  } );
</script>
{{-- end gage --}}

{{-- PDCA datepicker --}}
<script>
    var dateNow = new Date();

    $('#plan_date').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        // timePicker: true,
        // timePicker24Hour: true,
        language: 'th',
        thaiyear: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
    });

    $('#plan_date_pdca').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        autoUpdateInput: false,
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        language: 'th',
        thaiyear: true,
        // timePicker: true,
        // timePicker24Hour: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
        },function (chosen_date) {
            $('#plan_date_pdca').val(chosen_date.format('DD/MM/YYYY'));
        }
        );
        $('#plan_date_pdca').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });

    $('#date_today').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        timePicker: true,
        timePicker24Hour: true,
        language: 'th',
        thaiyear: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
    });
    
    $('#schedule_date').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        timePicker: true,
        timePicker24Hour: true,
        language: 'th',
        thaiyear: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
    });

    $('#do_date').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        autoUpdateInput: false,
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        language: 'th',
        // timePicker: true,
        // timePicker24Hour: true,
        thaiyear: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
        },function (chosen_date) {
            $('#do_date').val(chosen_date.format('DD/MM/YYYY'));
        }
        );
        $('#do_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });

    $('#check_date').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        autoUpdateInput: false,
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        // timePicker: true,
        // timePicker24Hour: true,
        language: 'th',
        thaiyear: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
        },function (chosen_date) {
            $('#check_date').val(chosen_date.format('DD/MM/YYYY'));
        }
        );
        $('#check_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });

    $('#action_date').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        autoUpdateInput: false,
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        language: 'th',
        // timePicker: true,
        // timePicker24Hour: true,
        thaiyear: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
        },function (chosen_date) {
            $('#action_date').val(chosen_date.format('DD/MM/YYYY'));
        }
        );
        $('#action_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });

    $('#txtDate').daterangepicker({
      buttonClasses: ['btn', 'btn-sm'],
      applyClass: 'btn-success',
      cancelClass: 'btn-dark',
      singleDatePicker: true,
      todayBtn: true,
      language: 'th',
      thaiyear: true,
      locale: {
        format: 'DD/MM/YYYY',
        daysOfWeek : [
          "อา.",
          "จ.",
          "อ.",
          "พ.",
          "พฤ.",
          "ศ.",
          "ส."
        ],
        monthNames : [
          "มกราคม",
          "กุมภาพันธ์",
          "มีนาคม",
          "เมษายน",
          "พฤษภาคม",
          "มิถุนายน",
          "กรกฎาคม",
          "สิงหาคม",
          "กันยายน",
          "ตุลาคม",
          "พฤศจิกายน",
          "ธันวาคม"
        ],
        firstDay : 0
      }
    });
    
    function get_modal_sim4_PDCA(id , topic_eng ,save_date , topic_detail, score){
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ url('D-SIM/sim4/get_data_log') }}',
            data: {PDCA_id:id},
            beforeSend: function(){
                // $('.ajax-loader').css("visibility", "visible");
                $('#plan_date_pdca').val('');
                $('#do_date').val('');
                $('#check_date').val('');
                $('#action_date').val('');
                $('#root_cause_modal').val('');
                $('#problem_description_modal').val('');
                $('#solution_modal').val('');
                // $('#score_modal').val('');
                $("#a_file_name_pdca").hide();
                $("#user_id_pdca").val('');

                
            },
            success: function (data) {

                // $('#plan_date').daterangepicker('setDate','21/09/2020');
                $('#topic').html( topic_eng +' : ' +topic_detail  );
                // $('#score_modal').val(score);

                if (data[0].plan_date != null && data[0].plan_date != '' ) {  
                    $('#plan_date_pdca').val(data[0].plan_date);
                }
                if (data[0].do_date != null && data[0].do_date != '' ) {  
                    $('#do_date').val(data[0].do_date);
                }
                if (data[0].check_date != null && data[0].check_date != '' ) {  
                    $('#check_date').val(data[0].check_date);
                }
                if (data[0].action_date != null && data[0].action_date != '' ) {  
                    $('#action_date').val(data[0].action_date);
                }

                if (data[0].root_cause != null && data[0].root_cause != '' ) {  
                    $('#root_cause_modal').val(data[0].root_cause);
                }     
                if (data[0].problem_description != null && data[0].problem_description != '' ) {  
                    $('#problem_description_modal').val(data[0].problem_description);
                }     
                if (data[0].solution != null && data[0].solution != '' ) {  
                    $('#solution_modal').val(data[0].solution);
                }
                $('#id_sim4_data_log').val(id);
                $("#user_id_pdca").val(data[0].user_id);

                  $("#file_name_pdca").val(data[0].file_name );
                  if (data[0].file_name) {
                    $("#a_file_name_pdca").show();
                    $("#a_file_name_pdca").attr("href",`{{ asset('assets/sim4_file/${data[0].file_name}' ) }}`);
                  }
                  

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    }

    function save_modal_sim4_PDCA(){

      var form_data = new FormData($('#form_modal_pdca_sim4')[0]);      
      $.ajax({
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            type: 'post',
            dataType: 'JSON',
            url: '{{ url('D-SIM/sim4/save_modal_sim4_PDCA') }}',
            data: form_data,
            contentType: false,
            processData: false,
            // data: { data : '1' },
            beforeSend: function(){
            },
            success: function (data) {
              console.log(data);
              // table_pdaca_sim4.ajax.reload();
              alert('บันทึกสำเร็จ!');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
              $('#modal_pdca_sim4').modal('toggle');
              table_pdaca_sim4.ajax.reload();
            },
        });
    }
</script>

<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/sweet-alert.init.js')}}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>


{{-- datatable PDCA --}}
<script>
  function datatable_pdca(){
    table_pdaca_sim4 = $('#pdca-table').DataTable( {
      ajax: {
            url: '{{ url('D-SIM/sim4/get_table_pdca') }}',
            // data: {date_this_week:date_this_week},
            complete: function(){
                // $('.ajax-loader').css("visibility", "hidden");
            },
            error: function(){
              // table_pdaca_sim4.ajax.reload();  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            },
      },
      columns: [
          { data: 'save_date', className:'text-center' },
          { data: 'topic_eng', className:'text-center' },
          { data: 'score', className:'text-center ' },
          { data: 'problem_description', className:'text-center' },
          { data: 'root_cause' , className:'text-center' },
          { data: 'solution', className:'text-center' },
          { data: 'name', className:'text-center' },
          { data: 'plan_date', className:'text-center' },
          { data: 'do_date', className:'text-center' },
          { data: 'sim4_log_id', className:'text-center'},
      ],
      columnDefs: [
          {
            targets: 0,
            render(data,type,row){
              return data.substr(8,2)+'/'+data.substr(5,2)+'/'+data.substr(0,4);
            },
          },
          {
            targets: 1,
            render(data,type,row){
                return data + ' : ' + row.topic_detail;
            },
          },
          {
            targets: 2,
            render(data,type,row){
              return data+' '+row['unit'];
            },
          },
          {
            targets: 6,
            // render(data,type,row){
            //   return data.substr(8,2)+'/'+data.substr(5,2)+'/'+data.substr(0,4);
            // },
          },
          {
            targets: 8,
            render(data,type,row){
              var show ='<div class="btn-group">';
              var sort =  5;
              // var show ='<div class="btn-group">' + '<div class="d-none">'+data+'</div>';
              // P
              if ( row.plan_date == null ) {
                // show = show + '<span class="badge badge-danger badge-pill">P</span>';
                show = show + '<button class="btn btn-sm btn-danger">P</button>';
              } else {
                // show = show + '<span class="badge badge-success badge-pill">P</span>';
                show = show + '<button class="btn btn-sm btn-success">P</button>';
                sort = 4;
              }
              // show = show + '<i class="fa fa-arrow-right"></i>';
              // D          
              if ( row.do_date == null ) {
                show = show + '<button class="btn btn-sm btn-danger">D</button>';
              } else {
                show = show + '<button class="btn btn-sm btn-success">D</button>';
                sort = 3;
              }
              
              // C
              if ( row.check_date  == null ) {
                show = show + '<button class="btn btn-sm btn-danger">C</button>';
              } else {
                show = show + '<button class="btn btn-sm btn-success">C</button>';
                sort = 2;
              }

              // A
              if ( row.action_date  == null ) {
                show = show + '<button class="btn btn-sm btn-danger">A</button>';
              } else {
                show = show + '<button class="btn btn-sm btn-success">A</button>';
                sort = 1;
              }

              show = show + '</div>' + '<div class="d-none">'+sort+'</div>';

              return show;
            }, 
          },
          {
            targets: 9,
            render(data,type,row){
              return '<button type="button" class="btn waves-effect waves-light btn-info"\
                        alt="default" data-toggle="modal" data-target="#modal_pdca_sim4" \
                        onclick="get_modal_sim4_PDCA( `'+row.sim4_log_id+'`, `'+row.topic_eng+'` ,\
                        `'+row.save_date+'` , `'+row.topic_detail+'` , `'+row.score+'` )">\
                        <i class="mdi mdi-file-check"></i>\
                      </button>\
                      \
                      <button type="button" class="btn waves-effect waves-light btn-danger"\
                        onclick="delete_sim4_data_log( `'+row.sim4_log_id+'`,`'+row.sim4_master_id+'` )">\
                        <i class="mdi mdi-delete"></i>\
                      </button>';
            },
          },
      ],
      // "ordering": false,
      "order": [],
    });
  }

  function delete_sim4_data_log(sim4_log_id,sim4_master_id){
      if (confirm('ยืนยันการลบ')) {
          $.ajax({
            url: '{{ url('D-SIM/sim4/delete_sim4_data_log') }}',
            data: {sim4_log_id:sim4_log_id},
              type: 'delete',
              success: function(result) {
                  table_pdaca_sim4.ajax.reload();
                  refresh_opject(sim4_master_id); //fixedก่อน เพราะค่าวนเป็น index แต่save topic เป็น id
                  alert('ลบสำเร็จ');
              }
          });
      }
  }

  function send_mail(sim4_log_id,user_id){
      $('.modal-send-mail').modal('show');
      // if (confirm('ยืนยันการส่งอีเมล)) {
          $.ajax({
            url: '{{ url('send-email-sim4x') }}',
            data: {sim4_log_id:sim4_log_id, user_id:user_id},
              type: 'get',
              success: function(result) {
                  alert('ส่งอีเมล์สำเร็จ');
              }
          });
      // }
  }

  
</script>

<script>


  function sim4_modal(item){
    // console.log(item);
    $('#sim4_modal_topic').html(item.topic_eng);
    $("button[name='sim4_topic_id']").val(item.id_sim4);
    
    $("input[name='score']").TouchSpin({
        min: 0,
        max: 9999,
        stepinterval: 50,
        maxboostedstep: 10000000,
        postfix: item.unit,
    });

  }

</script>

{{-- countdown time --}}
<script src="{{ asset('assets/dist/js/jquery.plugin.js') }}"></script>
<script src="{{ asset('assets/dist/js/jquery.countdown.js') }}"></script>

<script>

  function save_modal_counter() {
    
    var time_counter = 30;
    var dt = new Date();
    var time_now = moment(dt).format('YYYY-MM-DD H:m:s');

    $.ajax({
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        type: 'post',
        dataType: 'JSON',
        url: '{{ url('D-SIM/sim4/save_modal_time_counter') }}',
        data: { time_counter:time_counter , time_now:time_now },
        beforeSend: function(){
        },
        success: function (data) {
          // console.log(data);
          set_start_meeting();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus); alert("Error: " + errorThrown);
        },
        complete: function(){
        },
    });
  }

  function set_start_meeting(){
    // $('#countdown_div').countdown('remove');
    $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ url('D-SIM/sim4/get_time_stop') }}',
            data: {},
            beforeSend: function(){
            },
            success: function (meeting_time) {
              var current_date = new Date(meeting_time.sim4_meeting_time.date_time_start_meeting);
              var minutes_counter = meeting_time.sim4_meeting_time.time_counter;
              // console.log('time strat db= ' + meeting_time.sim4_meeting_time.created_at);
              var end_date = new Date(current_date.getTime() + minutes_counter*60000);

              $('#countdown_div').countdown('option', {until: end_date}); 
              // console.log(end_date);
              $('#countdown_div').countdown({
                until: end_date,
                // description: 'เวลาประชุม',
                format: 'MS',
                compact: true, 
                padZeroes: true,
                expiryText: '<div class="over" style="color:red;">หมดเวลา</div>',
                onTick: showTextTime,
              });

              var text_ = '-';
              function showTextTime(periods) {
                var time_chk = (parseInt(periods[5])*60) + parseInt(periods[6]);
                if( time_chk > 1740 ) { // > 29 m
                  text_ = 'Safety Talk';
                }else if( time_chk > 840 ) { // > 14 m
                  text_ = 'KPI Review';
                }else if( time_chk > 600 ) { // > 10 m
                  text_ = 'Action Plan Review';
                }else if( time_chk > 300 ) { // > 5 m
                  text_ = 'Production Plan Review';
                }else if( time_chk > 0 ) {
                  text_ = 'Sharing';
                }else if( time_chk == 0 ) {
                  text_ = 'หมดเวลา';
                }

                $('#showTextTime').text(text_);
              }

              // $('#showSetWeek').html('<a type="button" alt="default" data-toggle="modal" data-target=".modal-select-week" > <i class="ti-settings"></i> </a>');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // alert("Status: " + textStatus); alert("Error: " + errorThrown);


                // set_start_meeting();  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                console.log('error fn-[set_start_meeting] ');
            },
            complete: function(){
            },
        });
  }
</script>

{{-- information sharing --}}
<script>
  function datatable_information_sharing(){
      table_information_sharing = $('#info-sharing-table').DataTable({
      ajax: {
            url: '{{ url('D-SIM/sim4/get_table_information_sharing') }}',
            complete: function(){
            },
            error: function(){
              table_pdaca_sim4.ajax.reload();
            },
      },
      columns: [
          { data: 'save_date', className:'text-center' },
          { data: 'topic', className:'text-center' },
          { data: 'description', className:'text-center' },
          { data: 'id', className:'text-center' },
      ],
      columnDefs: [
          {
            targets: 0,
            render(data,type,row){
              return data.substr(8,2)+'/'+data.substr(5,2)+'/'+data.substr(0,4);
            },
          },
          {
            targets: 3,
            render(data,type,row){
              return '<button type="button" onclick="delete_sim4_info_sharing('+data+')" class="btn waves-effect waves-light btn-danger">\
                       <i class="mdi mdi-delete"></i>\
                      </button>';
            },
          },
      ],
      // "ordering": false,
      "order": [],
    });
  }

  function swap_table(){    
    if ($('.text-swap_table').text() === 'Information sharing' ) {
      $('.text-swap_table').text('Action Plan'); //เปลี่ยนชื่อปุ่ม

      table_pdaca_sim4.destroy();
      $('#pdca-table').addClass('d-none'); // นำตาราง pdca ออก
      $('#desc_pdca').addClass('d-none');  // คำอธิบาย pdca ออก

      $('#text-pdca_infoshare').html('Information sharing <button class="btn btn-dark" onclick="modal_info_sharing(`show`)" ><i class="fa fa-plus"></i></button>'); //เปลี่ยนหัวข้อ เพิ่มปุ่ม
      $('#info-sharing-table').removeClass('d-none'); 
      datatable_information_sharing();
      table_information_sharing.ajax.reload(); // แสดงตาราง

    } else {
      $('.text-swap_table').text('Information sharing'); //เปลี่ยนชื่อปุ่ม

      table_information_sharing.destroy(); 
      $('#info-sharing-table').addClass('d-none');// นำตาราง info ออก
      
      $('#text-pdca_infoshare').html('PLAN DO CHECK ACT');  //เปลี่ยนหัวข้อ 
      $('#pdca-table').removeClass('d-none'); // แสดงตาราง pdca 
      $('#desc_pdca').removeClass('d-none');  // แสดงคำอธิบาย pdca 
      datatable_pdca();
      table_pdaca_sim4.ajax.reload(); // แสดงตาราง

    }
    console.log( $('.text-swap_table').text() );
  }

  function modal_info_sharing(even){
    if (even === 'show') {
        $('#modal_info_sharing').modal(even);
    }else if(even === 'save'){
        var form_data = new FormData($('#frm-info-sharing')[0]);
        // disabled ปุ่มบันทึกไว้ กันข้อมูลเบิ้ล
        // $('#save-info-sharing').attr('disabled', true);    
        $.ajax({
          type: 'post',
          dataType: 'JSON',
          url: `{{ url('D-SIM/sim4/save_information_sharing') }}`,
          data: form_data,
          contentType: false,
          processData: false,
          beforeSend: function(){
          },
          success: function (resp) {
            alert('บันทึกสำเร็จ!');
            table_information_sharing.ajax.reload();
            $('#modal_info_sharing').modal('hide');
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            // console.log(XMLHttpRequest.responseJSON);
          },
          complete: function(){
            
          },
        });
    }

  }

  $('#save_date_info_sharing').daterangepicker({
    buttonClasses: ['btn', 'btn-sm'],
    applyClass: 'btn-success',
    cancelClass: 'btn-dark',
    singleDatePicker: true,
    todayBtn: true,
    language: 'th',
    thaiyear: true,
    locale: {
      format: 'YYYY-MM-DD',
      daysOfWeek : [
        "อา.",
        "จ.",
        "อ.",
        "พ.",
        "พฤ.",
        "ศ.",
        "ส."
      ],
      monthNames : [
        "มกราคม",
        "กุมภาพันธ์",
        "มีนาคม",
        "เมษายน",
        "พฤษภาคม",
        "มิถุนายน",
        "กรกฎาคม",
        "สิงหาคม",
        "กันยายน",
        "ตุลาคม",
        "พฤศจิกายน",
        "ธันวาคม"
      ],
      firstDay : 0
    }
  });

  function delete_sim4_info_sharing(id){
      if (confirm('ยืนยันการลบ')) {
          $.ajax({
            url: '{{ url('D-SIM/sim4/delete_sim4_information_sharing') }}',
            data: {id:id},
              type: 'delete',
              success: function(result) {
                  table_information_sharing.ajax.reload();
                  alert('ลบสำเร็จ');
              }
          });
      }
  }
</script>
@endsection
@extends('layouts.master')
@section('title', 'SIM 3')

@section('style')
  <!-- Date picker plugins css -->
  <link href="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
  <style>
    .bgGreen{
      background-color:#00c292;
    }
    .bgBlue{
      background-color:#4aa8e4;
    }

    .tb-sim3 td:not(:first-child) {
      cursor:pointer;
    }
  </style>

  {{-- date counter --}}
  <link href="{{ asset('assets/dist/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-2 align-self-center">
    <h4 class="text-themecolor">
      SIM 3 
      ({{ th_date_short(date('Y-m-d')) }})
    </h4>
  </div>
    
  <div class="col-md-7 align-self-center" >
    <div id="countdown_div" style="width:100px; margin-left:auto;" class="text-center"></div>
  </div>
  <div class="col-md-2 align-self-center" >
    <h3 style="font-weight:bold;"><span id="showTextTime"></span></h3>
  </div>
  
 

  <div class="col-md-1 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">D-SIM</a></li>
        <li class="breadcrumb-item active">SIM 3</li>
      </ol>
    </div>
  </div>
</div>

<div class="row ">
  <div class="col-md-12">
    <div class="card-group">
      @foreach ($sim3_master as $key => $item) 
        <div class="card">
          <div class="card-header">
            <h4 class="font-weight-bold mb-0">
              <b class="text-uppercase">{{ substr($item->topic_eng, 0,1) }}</b><b class="text-lowercase">{{ substr($item->topic_eng, 1) }}</b>
              
              <div class="card-actions">
                <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <a type="button" class="" onclick="setting_sim3('open-modal', {{ $item->topic_id }})">
                  <i class="ti-settings"></i>
                </a>
                <!-- <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                <a class="btn-close" data-action="close"><i class="ti-close"></i></a> -->
              </div>
            </h4>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                {{-- <h4 class="text-center font-weight-bold mb-0">
                  {{ $item->topic_eng }}
                  <span class="d-none first_column{{$key}}"></span>
                </h4> --}}

                <div id="topic_gauge{{ $key }}" style="width:100%; height:150px;"></div>
              </div> 
            </div>

            <div class="row zoom60" >
              <div class="col-md-12" style="padding-right: 1px; padding-left: 1px;">
                <table border='1' class="table-bordered tbl-dconnect w-100" id="table_sim3_{{ $key }}">
                  <thead>
                    <tr>
                      <th class="p-0">/</th>
                      <th class="p-0">Mon</th>
                      <th class="p-0">Tue</th>
                      <th class="p-0">Wed</th>
                      <th class="p-0">Thu</th>
                      <th class="p-0">Fri</th>
                      <th class="p-0">Sat</th>
                      <th class="p-0">Sun</th>
                    </tr>
                  </thead>

                  <tbody class="tb-sim3"></tbody>

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
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-12 px-0">
                <canvas id="chartjs-trend-sim3-{{ $key }}" height="300"></canvas>
              </div>
              
              <div class="col-md-12 mb-2">
                <button type="button" onclick="refresh_opject('{{ $key }}')" class="btn btn-block btn-warning">
                  <i class="icon-refresh"></i> Refresh
                </button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- <div class="card">
      <div class="card-body">
        <h4 class="card-title d-none"></h4>
        <h6 class="card-subtitle d-none">Use default tab with class <code>nav-tabs & tabcontent-border </code></h6>
        <div class="row table-responsive-">
          @foreach ($sim3_master as $key => $item) 
            <div class="text-center col-lg-2 border border-dark rounded">
              <div class="row" style="zoom:;">
                <div class="col-md-12">
                  <h4 class="text-center font-weight-bold mb-0">
                    <span class="text-uppercase">{{ substr($item->topic_eng, 0,1) }}</span>
                    <span class="text-lowercase">{{ substr($item->topic_eng, 1) }}</span> 
                    {{ $item->topic_eng }}
                    <span class="d-none first_column{{$key}}"></span>
                  </h4>

                  <div id="topic_gauge{{ $key }}" style="width:100%; height:150px;"></div>
                </div> 
              </div>

              <div class="row zoom50" >
                <div class="col-md-12" style="padding-right: 1px; padding-left: 1px;">
                  <table border='1' class="table-bordered tbl-dconnect w-100" id="table_sim3_{{ $key }}">
                    <thead>
                      <tr>
                        <th class="p-0">/</th>
                        <th class="p-0">Mon</th>
                        <th class="p-0">Tue</th>
                        <th class="p-0">Wed</th>
                        <th class="p-0">Thu</th>
                        <th class="p-0">Fri</th>
                        <th class="p-0">Sat</th>
                        <th class="p-0">Sun</th>
                      </tr>
                    </thead>

                    <tbody class="tb-sim3"></tbody>

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
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-md-12 px-0">
                  <canvas id="chartjs-trend-sim3-{{ $key }}" height="300"></canvas>
                </div>
                
                <div class="col-md-12 mb-2">
                  <button type="button" onclick="refresh_opject('{{ $key }}')" class="btn btn-block btn-warning">
                    <i class="icon-refresh"></i> Refresh
                  </button>
                </div>
              </div>

            </div>
          @endforeach
        </div>
        
      </div>
    </div> --}}
  </div>
</div>

<!-- PDCA -->
<div class="row ">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
          <h4 class="card-title">
            <div class="row">
              <div class="col-md-5">
                PLAN DO CHECK ACT
              </div>

              <div class="col-md-7 text-right">
                <button onclick="sign_meeting('open-modal')" class="btn btn-info" title="ลงชื่อเข้าประชุม">
                  <i class="fa fa-user"></i>
                  ลงชื่อเข้าประชุม
                </button>

                <button class="btn btn-success " onclick="save_modal_counter()" title="30 นาที">
                  <i class="fa fa-clock"></i>
                  Time start
                </button> 

                {{-- <button class="tst3 btn btn-success">Success Message</button> --}}


                {{-- <button class="btn btn-warning">
                  <i class="fa fa-plus"></i>
                </button>

                <button class="btn btn-danger">
                  <i class="fa fa-plus"></i>
                </button> --}}
              </div>
            </div>
          </h4>

          <h6 class="card-subtitle"> 
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
                          <th style="width:8%; padding: px;">วันที่ลงบันทึก</th>
                          <th style="width:3%; padding: px;">แผนก</th>
                          <th style="width:7%; padding: px;">หัวข้อ</th>
                          <th style="width:10%; padding: px;">รายละเอียดของปัญหา</th>
                          <th style="width:10%; padding: px;">สาเหตุของปัญหา</th>
                          <th style="width:10%; padding: px;">การแก้ไข, วิธีการ</th>
                          <th style="width:10%; padding: px;">ผู้รับผิดชอบ</th>
                          <th style="width:8%; padding: px;">วันที่วางแผน</th>
                          {{-- <th style="width:8%; padding: px;">วันที่ทำจริง</th> --}}
                          <th style="width:12%; padding: px;">PDCA</th>
                          <th style="width:8%; padding: px;">ดำเนินการ</th>
                      </tr>
                  </thead>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- setting-sim3 -->
<div id="modal-setting-sim3" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog modal-xl">
    <form id="frm-setting-sim3">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title-">
            <i class="fa fa-user"></i>
            setting-sim3
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <div class="row">
            <input type="hidden-" name="txtTopicID">
            <div class="col-md-12 sim3-setting">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
          <button type="button" onclick="" class="btn btn-success">
            <i class="far fa-save"></i>
            บันทึก
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
                  
                  <!-- <div class="skin skin-minimal">
                    <form>
                        <div class="form-group">
                            <label>Colors</label>
                            <div class="input-group">
                                <ul class="icolors">
                                    <li></li>
                                    <li class="red active"></li>
                                    <li class="green"></li>
                                    <li class="blue"></li>
                                    <li class="orange"></li>
                                    <li class="yellow"></li>
                                    <li class="purple"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Checkbox &amp; Radio List</label>
                            <div class="input-group">
                                <ul class="icheck-list">
                                    <li>
                                        <input type="checkbox" class="check" id="minimal-checkbox-1">
                                        <label for="minimal-checkbox-1">Checkbox 1</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                  </div> -->

                  {{-- @foreach ($sim3_department as $department)
                    <div class="tab-pane {{ $department->dep_key=='PL' ?'active' :'' }}" id="tab_department{{ $department->department_id }}" role="tabpanel">
                      <div class="p-2">
                        <h3>
                          แผนก {{ $department->dep_key }}
                        </h3>

                        <!-- <div class="input-group">
                          <ul class="icheck-list"> -->
                          <div class="row">
                            @foreach ($sim3_user_meeting as $emp)
                              @if ($emp->department_id == $department->department_id)
                                <div class="col-md-6">
                                  <input type="checkbox" name="chkEmployee[]" value="{{ $emp->id }}" id="chk_emp{{ $emp->id }}"
                                    class="check" data-checkbox="icheckbox_square-blue" {{ isset($emp->user_checked) ?'checked' :'' }}>
                                  <label for="chk_emp{{ $emp->id }}">{{ $emp->name }}</label>
                                </div>
                              @endif
                            @endforeach
                          </div>
                          <!-- </ul>
                        </div> -->
                      </div>

                    </div>
                  @endforeach --}}
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

<div id="sim3_add_data_modal" class="modal fade">
  <div class="modal-dialog modal-" style="max-width:%;">
      {{-- {{ Form::open(['method' => 'post' , 'url' => 'D-SIM/sim3_data/save' , 'files' => true]) }} --}}
      <div class="modal-content">
        <form id="frm_sim3_data">
          <div class="modal-header text-center">
            <h4 class="font-weight-bold " id="sim3_modal_topic"></h4>
            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>

          <div class="modal-body">
            <div class="row mb-2">
              <div class="col-md-12 div-line" style="display:none;">
                <label for="department_id">line :</label>
                <select name="ddlLine" id="ddlLine" class="form-control">
                  <option value="" disabled selected>select line</option>
                  @foreach ($type_line as $line)
                      <option value="{{ $line->line_number }}">
                        {{ 'LINE '.$line->line_number }}
                      </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-12 div-department" style="display:none;">
                <label for="department_id">department :</label>
                <select class="form-control" name="department_id" id="department_id"  tabindex="-1">
                  <option value="">แผนกที่รายงาน</option>
                  @foreach ($sim3_department as $department)
                      <option value="{{ $department->department_id }}"><b>{{ '( '.$department->dep_key.' ) ' }}</b>{{ $department->department_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                  <label for="save_days" >วัน :</label>
                  <input type="text" class="form-control" name="save_days" id="save_days"  readonly />
              </div>
              
              <div class="col-md-4">
                  <label for="save_date" >วันที่ลงบันทึก :</label>
                  <input type="text" class="form-control" name="save_date" id="save_date"  readonly />
              </div>

              <div class="col-md-4">
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
              <div class="col-md-12">
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
                <label for="user_id" >ผู้รับผิดชอบ :</label>

                <input list="ddlUser" id="user-search" class="form-control" placeholder="รายชื่อผู้รับผิดชอบ" required>
                  <datalist id="ddlUser">
                    @foreach ($users as $user)
                      <option data-value="{{ $user->id }}" value="{{ $user->name }}"></option>
                    @endforeach
                  </datalist>

                {{-- <select class="form-control" name="user_id" id="user_id" required>
                    <option value="" disabled selected>เลือกผู้บันทึก</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select> --}}
              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              <i class="fa fa-times"></i>
              ยกเลิก
            </button>

            <input type="hidden" name="txtTopicID">

            <button type="button" value onclick="save_data_sim3()" class="btn btn-save-data-sim3 btn-success">
              <i class="far fa-save"></i>
              บันทึก
            </button>
          </div>
      </form>
      </div>
  </div>
</div>

<div id="modal_pdca_sim3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" id="form_modal_pdca_sim3">
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

                    <input class="form-control " hidden name="id_sim3_data_log" id="id_sim3_data_log" value="">

                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" onclick="save_modal_sim3_PDCA()" class="btn btn-success waves-effect waves-light">Save</button>
          </div>
      </div>
    </form>
  </div>
</div>

@endsection 

@section('script')
<!-- datepicker-->

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
  // var json = { "{{ $sim3_master }}" };
  // console.log("" );

  var table = {}; // ตัวแปร data-table
  var sim3_master = {!! json_encode($sim3_master)  !!}; // console.log(sim3_master);
  // console.log(sim3_master);
  
  // วนลูป sim3_master
  $.each(sim3_master, function (index, value) {
    $('.first_column'+index).text(value.first_column);

    var arr_day_week = get_days_week();
    // console.log( arr_day_week );//วันทั้งหมดในweek

    //table move to fn datatable_calling
    datatable_calling(index, value);

    // modal
    $(`#table_sim3_${index} tbody`).on("click", "td", function () {  //call modal add data
      
      if ($(this).index() != 0) {
          var data_record = table[`table_sim3_${index}`].row($(this).parents("tr")).data();

          var today = arr_day_week[$(this).index() -1 ];
          console.log( 
            // data_record,
            // `topic: ${value.topic_eng}\ndept: ${data_record.dept_id}\n`+
            // 'day: '+ $(`#table_sim3_${index} thead th`).eq($(this).index()).text().trim() +
            // '\nday_num : '+$(this).index()+
            // '\nvalue ของ td: '+ $(this).text()
          );

          $("input[name='score']").trigger('touchspin.destroy');
          $("input[name='score']").TouchSpin({
            min: 0,
            max: 9999,
            decimals: 1, // ตำแหน่งทศนิยม
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

          $('#sim3_modal_topic').html(value.topic_eng);
          $('#save_days').val($(`#table_sim3_${index} thead th`).eq($(this).index()).text().trim());
          $('#save_date').val(today);
          $("input[name='txtTopicID']").val(value.id_sim3);

          $('.btn-save-data-sim3').attr('onclick', `save_data_sim3(${index})`);

          $.ajax({
              type: 'get',
              // dataType: 'JSON',
              url: `{{ url('D-SIM/sim3/get_data_modal') }}`, //test
              data: {
                      sim3_topic_id: value.id_sim3,
                      department_id: data_record.dept_id ?data_record.dept_id :null,
                      line_number: data_record.line_number ?data_record.line_number :null,
                      save_date: today
                    },
              beforeSend: function(){
                  $("input[name='score']").val('');
                  $('#problem_description').val('');
                  $('#root_cause').val('');
                  $('#solution').val('');
                  // $("#user_id").val('');
                  $("#user-search").val('');
                  $("#id").val('');
                  $("#file_name").val('');
                  $("#a_file_name").hide();

                  var this_day = new Date(); // defualt วันนี้ ทุกการเปิด modal
                  this_day = moment(this_day).format('DD/MM/YYYY');
                  $("#plan_date").val(this_day);

              },
              success: function (data){ 
                if(data) {
                  $("input[name='score']").val(data.SIM3_data_log[0].score);
                  $('#problem_description').val(data.SIM3_data_log[0].problem_description);
                  $('#root_cause').val(data.SIM3_data_log[0].root_cause);
                  $('#solution').val(data.SIM3_data_log[0].solution);
                  // $("#user_id").val(data.SIM3_data_log[0].user_id);
                  var user_name = $('#ddlUser [data-value="' + data.SIM3_data_log[0].user_id + '"]').val(); 
                  $('#user-search').val(user_name)
                  $("#id").val(data.SIM3_data_log[0].id);
                  $("#file_name").val(data.SIM3_data_log[0].file_name );
                  $("#plan_date").val(data.SIM3_data_log[0].plan_date);

                  // console.log(data.SIM3_data_log[0].file_name);
                  if (data.SIM3_data_log[0].file_name) {
                    $("#a_file_name").show();
                    $("#a_file_name").attr("href",`{{ asset('assets/sim3_file/${data.SIM3_data_log[0].file_name}' ) }}`);
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

          
          $('#sim3_add_data_modal').modal('toggle');
          
      }
    });

    // วาด trend chart
    // trend_chart(index, value, arr_day_week);
  });

  // setting_sim3
  function setting_sim3(todo, topic_id) { 
    $('input[name="txtTopicID"]').val(topic_id);
    if (todo === 'open-modal') {
      $.ajax({
        type: "get",
        url: `{{ url('sim3/setting') }}`,
        data: {topic_id:topic_id},
        success: function (res) {
          // console.log(res.sim3_user_meeting);
          $('.sim3-setting').html(res.data);
        }
      });

      $('#modal-setting-sim3').modal('show');
    }
  }
  // save_data_sim3
  function save_data_sim3(index) {
    var form_data = new FormData($('#frm_sim3_data')[0]);   
    var value_search = $('#user-search').val();
    form_data.append('user_id', $('#ddlUser [value="' + value_search + '"]').data('value'));

    $.ajax({
      type: 'post',
      dataType: 'JSON',
      url: `{{ url('D-SIM/sim3_data/save') }}`,
      data: form_data,
      contentType: false,
      processData: false,
      beforeSend: function(){
      },
      success: function (res) {
        // console.log(index);
        alert(res.msg);
        $('#sim3_add_data_modal').modal('toggle');
        refresh_opject(index);
        table_pdaca_sim3.ajax.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest.responseJSON); ;
      },
      complete: function(){
      },
    });
  }

  function refresh_opject(index_op) {
    // var refresh_op_day_week = get_days_week();
    datatable_calling(index_op , sim3_master[index_op]);
    // trend_chart(index_op, sim3_master[index_op], refresh_op_day_week );
    console.log('fn-[refresh_opject]-active');
  }
  
  function datatable_calling(index , value) {
    var total_score_in_today = [];
    var arr_day_week = get_days_week();

    var arr_count_avg = { // ใช้เป็นตัวหารค่าเฉลี่ย OE ของ หัวข้อ COST
      count_avg_mon:0, count_avg_tue:0, count_avg_wed:0, count_avg_thu:0, count_avg_fri:0, count_avg_sat:0, count_avg_sun:0 
    }; 

    // table
    table[`table_sim3_${index}`] = $(`#table_sim3_${index}`).DataTable( {  //datatable
      destroy: true,
      lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
      dom: 't',
      "scrollX": false,
      orderCellsTop: true,
      fixedHeader: true,
      "bSort": false,
      "order": [],
      ajax: {
          url: '{{ url('D-SIM/sim3/get_data_table') }}',
          data: {sim3_master:value, arr_day_week:arr_day_week},
          complete: function(){
              // $('.ajax-loader').css("visibility", "hidden");
          },
          error: function(){
            console.log('reloading_datatable');
            refresh_opject(index)
            // table[`table_sim3_${index}`].ajax.reload();          
          },
      },
      columns: [
        { data: 'dept', className:'text-center p-0 bgBlue'},
        { data: 'score_Mon', className:'text-center p-0'},
        { data: 'score_Tue', className:'text-center p-0'},
        { data: 'score_Wed', className:'text-center p-0'},
        { data: 'score_Thu', className:'text-center p-0'},
        { data: 'score_Fri', className:'text-center p-0'},
        { data: 'score_Sat', className:'text-center p-0'},
        { data: 'score_Sun', className:'text-center p-0'},
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
              $(td).html( (row.score_Mon ? row.score_Mon : 0 ) );

              if ( func_target(value.target, row.score_Mon, value.standard_rate) ) {
                $(td).css({'background-color':'#CCFF99' , 'font-weight' : 'bold'}); //green
              } else {
                $(td).css({'background-color':'#FF9999' , 'font-weight' : 'bold'});
              }
            },
        },   
        {
            targets: 2,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.score_Tue ? row.score_Tue : 0 ));
              if(func_target(value.target, row.score_Tue, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },   
        {
            targets: 3,
            createdCell: function (td, celldata, row, numrow, col){
                $(td).html((row.score_Wed ? row.score_Wed : 0 ));
                
              if( func_target(value.target, row.score_Wed, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },  
        {
            targets: 4,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.score_Thu ? row.score_Thu : 0 ));

              if( func_target(value.target, row.score_Thu, value.standard_rate)){
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
              $(td).html((row.score_Fri ? row.score_Fri : 0 ));

              if( func_target(value.target, row.score_Fri, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        {
            targets: 6,
            createdCell: function (td, celldata, row, numrow, col){
              $(td).html((row.score_Sat ? row.score_Sat : 0 ));

              if( func_target(value.target, row.score_Sat, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
        {
            targets: 7,
            createdCell: function (td, celldata, row, numrow, col){
                $(td).html((row.score_Sun ? row.score_Sun : 0 ));

              if( func_target(value.target, row.score_Sun, value.standard_rate)){
                $(td).css({'background-color':'#ccff99' , 'font-weight' : 'bold'})
              }else {
                $(td).css({'background-color':'#ff9999' , 'font-weight' : 'bold'})
              }
            },
        },
      ],
      
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
        var monTotal = api
          .column( 1 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_mon']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var tueTotal = api
          .column( 2 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              // console.log( 0/0 );
              if(b > 0){
                arr_count_avg['count_avg_tue']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var wedTotal = api
          .column( 3 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_wed']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var thuTotal = api
          .column( 4 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_thu']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );
          
        var friTotal = api
          .column( 5 )
          .data()
            // .filter( function ( val, index_value ) {
            //   // return val;
            //   if(value.topic_id == 3){
            //     if( val > 0 ) {
            //       count_avg = (index_value+1);
            //       console.log(value.topic_eng, index, val, count_avg);
            //       //  console.log(intVal(val));
            //     }
            //   }
            // })
          .reduce( function (a, b, index_value) {
            if(value.total_type_value === 'avg'){
              // console.log(this.api().column(4).data()[0]);
              if(b > 0){
                arr_count_avg['count_avg_fri']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );

        var satTotal = api
          .column( 6 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_sat']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );

        var sunTotal = api
          .column( 7 )
          .data()
          .reduce( function (a, b) {
            if(value.total_type_value === 'avg'){
              if(b > 0){
                arr_count_avg['count_avg_sun']++
              }
            }
            return intVal(a) + intVal(b);
          }, 0 );

        // Update footer by showing the total with the reference of the column index 
        if(value.total_type_value === 'avg') {
          // console.log(arr_count_avg);
          var topic_footer = 'Average';
          monTotal = Number( (monTotal / arr_count_avg['count_avg_mon']) ).toFixed(1);
          tueTotal = Number( (tueTotal / arr_count_avg['count_avg_tue']) ).toFixed(1);
          wedTotal = Number( (wedTotal / arr_count_avg['count_avg_wed']) ).toFixed(1);
          thuTotal = Number( (thuTotal / arr_count_avg['count_avg_thu']) ).toFixed(1);
          friTotal = Number( (friTotal / arr_count_avg['count_avg_fri']) ).toFixed(1);
          satTotal = Number( (satTotal / arr_count_avg['count_avg_sat']) ).toFixed(1);
          sunTotal = Number( (sunTotal / arr_count_avg['count_avg_sun']) ).toFixed(1);
        } else {
          var topic_footer = 'Total';
        }

        var arr_total_all = [
          topic_footer, 
          isNaN(monTotal) ?0 :monTotal,
          isNaN(tueTotal) ?0 :tueTotal,
          isNaN(wedTotal) ?0 :wedTotal,
          isNaN(thuTotal) ?0 :thuTotal,
          isNaN(friTotal) ?0 :friTotal,
          isNaN(satTotal) ?0 :satTotal,
          isNaN(sunTotal) ?0 :sunTotal
        ];
        // console.log(arr_total_all);
        for (let ii = 0; ii < 8; ii++) {
            $( api.column( ii ).footer() ).html(arr_total_all[ii]);
            if ( func_target(value.target, arr_total_all[ii], value.standard_rate) ) {
                $( api.column( ii ).footer() ).css({'background-color':'#00c292' , 'font-weight' : 'bold'});
            } else {
                $( api.column( ii ).footer() ).css({'background-color':'#ff0000' , 'font-weight' : 'bold'});
            }
        }
        $( api.column( 0 ).footer() ).css({'background-color':'#4aa8e4' , 'font-weight' : 'bold'});
        
        total_score_in_today[index] = arr_total_all;
        // console.log('table' , total_score_in_today[index]);
        main_gauge(index, value , total_score_in_today);
        trend_chart(index, value, arr_total_all)
      },
    });
  }
  
  function trend_chart(index, value, arr_total) {
    const arr_period = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']; // months.splice(3,2);
    arr_total.shift(); // ลบ value Total/Average ออกก่อน
    // console.log(arr_total);

    if(arr_trend_chart[`trend_chart${index}`]){ 
      // ถ้ามีชาทอันเก่าอยุ่แล้ว ให้ destroy ก่อน
      arr_trend_chart[`trend_chart${index}`].destroy();
    }

    arr_trend_chart[`trend_chart${index}`] = new Chart(document.getElementById(`chartjs-trend-sim3-${index}`), {
      type: "line",
      data: {
        labels: arr_period,
        datasets: [
          {
            label: 'trend', //PL
            type: `line`,
            fill: false,
            backgroundColor:chart_color((Number(index)+1)) ,
            borderColor :chart_color((Number(index)+1)),
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
    /*
      $.ajax({
        type: 'get',
        // dataType: 'JSON',
        url: '{{ url('D-SIM/sim3/get_data_trend') }}', //test
        data: {sim3_master:value, arr_day_week:arr_day_week},
        beforeSend: function(){
        },
        success: function (trend_data) { 
          var arr_period = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
          // var depart= ['PL','PD','QFS','LGT','ENG','EHS'];
          console.log(
            // arr_period.map(day=> {
            //   return trend_data[day];
            // })
          );

          if($(`#chartjs-trend-sim3-${index}`).length) {
            // if(arr_trend_chart[`trend_chart${index}`]){ 
            //   console.log( arr_trend_chart[`trend_chart${index}`] );
            //   arr_trend_chart[`trend_chart${index}`].destroy();
            // }
            arr_trend_chart[`trend_chart${index}`] = new Chart(document.getElementById(`chartjs-trend-sim3-${index}`), {
              type: "line",
              data: {
                labels: arr_period,
                datasets: [
                  {
                    label: 'trend', //PL
                    type: `line`,
                    fill: false,
                    backgroundColor:chart_color((Number(index)+1)) ,
                    borderColor :chart_color((Number(index)+1)),
                    data: arr_period.map(day=> {
                      return trend_data[day];
                    }),
                    // data: data,
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
            // console.log( (line_chart.scales['y-axis-0'].ticksAsNumbers.length-1) );
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
          console.log("Status: " + textStatus + "\nError: " + errorThrown);
        },
        complete: function(){
        },
      }); 
    */
  }
  
  function main_gauge(index, value, data_total) {
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
    arr_topic_gauge[`topic_gauge${index}`] = echarts.init(document.getElementById(`topic_gauge${index}`));
    
    // set option value guage
    var today = new Date();
    var days_number = today.getDay(); //5 (Fri) +1แผนก
    if(value.total_type_value === 'avg') {
      var sum_score = Number(data_total[index][days_number]).toFixed(1); // จำนวน getRandomInt(10,100)
    } else {
      var sum_score = Number(data_total[index][days_number]);
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

    // เปลี่ยนสี guage ตาม เรทของ หัวข้อ sim3
    guage_option.series[0].axisLine.lineStyle.color = [[0.5, value.gauge_color1], [1, value.gauge_color2]];
    // console.log(guage_option.series[0].axisLine.lineStyle.color[0]);
    guage_option.series[0].data[0].name = `${value.topic_detail} ${value.kpi}`;

    arr_topic_gauge[`topic_gauge${index}`].setOption(guage_option, true), $(function() {
      function resize() {
        setTimeout(function() {
          arr_topic_gauge[`topic_gauge${index}`].resize();
        }, 100);
      }
      $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
    });

    // event เมื่อคลิก เข็ม gauge
    arr_topic_gauge[`topic_gauge${index}`].on('click', function (params) {
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
      for (let bf = days_number; bf > 0 ; bf--) {
      var date = new Date();
      date.setDate(date.getDate() - bf);
      arr_day_date[$c] = moment(date).format('DD/MM/YYYY');
      $c++;
      }
      for (let af = 0 ; af < (7-days_number) ; af++) {
      var date = new Date();
      date.setDate(date.getDate() + af);
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
        url: `{{ url('sim3/get_sim3_user') }}`,
        success: function (res) {
          // console.log(res.sim3_user_meeting);
          $('.department_tab').html(res.department_tab);
          $('.sim3_user_meeting').html(res.sim3_user_meeting);

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
        }
      });
    } 
    else {
      // alert('อยู่ในระหว่างดำเนินการ');
      // console.log( $('#frm-sign-meeting').serialize() );
      // return false;

      $.ajax({
        type: "post",
        url: `{{ url('sim3/save_sim3_user_meeting') }}`,
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
    set_start_meeting();
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
        timePicker: true,
        timePicker24Hour: true,
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
        timePicker: true,
        timePicker24Hour: true,
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
    
    function get_modal_sim3_PDCA(id , topic_eng ,save_date , department_name, score){
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ url('D-SIM/sim3/get_data_log') }}',
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
                $('#topic').html(department_name + ' : ' + topic_eng);
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
                $('#id_sim3_data_log').val(id);
                $("#user_id_pdca").val(data[0].user_id);

                  $("#file_name_pdca").val(data[0].file_name );
                  if (data[0].file_name) {
                    $("#a_file_name_pdca").show();
                    $("#a_file_name_pdca").attr("href",`{{ asset('assets/sim3_file/${data[0].file_name}' ) }}`);
                  }
                  

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    }

    function save_modal_sim3_PDCA(){

      var form_data = new FormData($('#form_modal_pdca_sim3')[0]);      
      $.ajax({
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            type: 'post',
            dataType: 'JSON',
            url: '{{ url('D-SIM/sim3/save_modal_sim3_PDCA') }}',
            data: form_data,
            contentType: false,
            processData: false,
            // data: { data : '1' },
            beforeSend: function(){
            },
            success: function (data) {
              console.log(data);
              // table_pdaca_sim3.ajax.reload();
              alert('บันทึกสำเร็จ!');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
              $('#modal_pdca_sim3').modal('toggle');
              table_pdaca_sim3.ajax.reload();
            },
        });
    }
</script>

<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/sweet-alert.init.js')}}"></script>
{{-- datatable PDCA --}}
<script>
  $(document).ready(function() {
    table_pdaca_sim3 = $('#pdca-table').DataTable( {
      ajax: {
            url: '{{ url('D-SIM/sim3/get_table_pdca') }}',
            // data: {date_this_week:date_this_week},
            complete: function(){
                // $('.ajax-loader').css("visibility", "hidden");
            },
            error: function(){
              table_pdaca_sim3.ajax.reload();
            },
      },
      columns: [
          { data: 'save_date', className:'text-center' },
          { data: 'department_name', className:'text-center' },
          { data: 'topic_eng', className:'text-center ' },
          { data: 'problem_description', className:'text-center' },
          { data: 'root_cause' , className:'text-center' },
          { data: 'solution', className:'text-center' },
          { data: 'name', className:'text-center' },
          { data: 'plan_date', className:'text-center' },
          { data: 'do_date', className:'text-center' },
          { data: 'sim3_log_id', className:'text-center'},
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
              if (data === '' || data === null) {
                return 'line '+row.line_num;
              } else {
                return data;
              }
            },
          },
          {
            targets: 7,
            // render(data,type,row){
            //   return data.substr(8,2)+'/'+data.substr(5,2)+'/'+data.substr(0,4);
            // },
          },
          {
            targets: 8,
            render(data,type,row){
              var show ='';
              // P
              if ( row.plan_date == null ) {
                show = show + '<span class="badge badge-danger badge-pill">P</span>';
              } else {
                show = show + '<span class="badge badge-success badge-pill">P</span>';
              }
              show = show + '<i class="fa fa-arrow-right"></i>';
              // D          
              if ( row.do_date == null ) {
                show = show + '<span class="badge badge-danger badge-pill">D</span>';
              } else {
                show = show + '<span class="badge badge-success badge-pill">D</span>';
              }
              show = show + '<i class="fa fa-arrow-right"></i>';
              // C
              if ( row.check_date  == null ) {
                show = show + '<span class="badge badge-danger badge-pill">C</span>';
              } else {
                show = show + '<span class="badge badge-success badge-pill">C</span>';
              }
              show = show + '<i class="fa fa-arrow-right"></i>';

              // A
              if ( row.action_date  == null ) {
                show = show + '<span class="badge badge-danger badge-pill">A</span>';
              } else {
                show = show + '<span class="badge badge-success badge-pill">A</span>';
              }

              return show;
            }, 
          },
          {
            targets: 9,
            render(data,type,row){
              return '<button type="button" class="btn waves-effect waves-light btn-info"\
                        alt="default" data-toggle="modal" data-target="#modal_pdca_sim3" \
                        onclick="get_modal_sim3_PDCA( `'+row.sim3_log_id+'`, `'+row.topic_eng+'` ,\
                        `'+row.save_date+'` , `'+row.department_name+'` , `'+row.score+'` )">\
                        <i class="mdi mdi-file-check"></i>\
                      </button>\
                      \
                      <button type="button" class="btn waves-effect waves-light btn-danger"\
                        onclick="delete_sim3_data_log( `'+row.sim3_log_id+'`,`'+row.sim3_topic_id+'` )">\
                        <i class="mdi mdi-delete"></i>\
                      </button>';
            },
          },
      ],
      // "ordering": false,
      "order": [],
    });
  });

  function delete_sim3_data_log(sim3_log_id,sim3_topic_id){
      if (confirm('ยืนยันการลบ')) {
          $.ajax({
            url: '{{ url('D-SIM/sim3/delete_sim3_data_log') }}',
            data: {sim3_log_id:sim3_log_id},
              type: 'delete',
              success: function(result) {
                  table_pdaca_sim3.ajax.reload();
                  refresh_opject(sim3_topic_id-1); //fixedก่อน เพราะค่าวนเป็น index แต่save topic เป็น id
                  alert('ลบสำเร็จ');
              }
          });
      }
  }


</script>

<script src="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
{{-- touchSpin --}}
<script>
  $(/*'#save_date'*/).daterangepicker({
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

  function sim3_modal(item){
    // console.log(item);
    $('#sim3_modal_topic').html(item.topic_eng);
    $("button[name='sim3_topic_id']").val(item.id_sim3);
    
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
        url: '{{ url('D-SIM/sim3/save_modal_time_counter') }}',
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
            url: '{{ url('D-SIM/sim3/get_time_stop') }}',
            data: {},
            beforeSend: function(){
            },
            success: function (meeting_time) {
              var current_date = new Date(meeting_time.sim3_meeting_time.date_time_start_meeting);
              var minutes_counter = meeting_time.sim3_meeting_time.time_counter;
              // console.log('time strat db= ' + meeting_time.sim3_meeting_time.created_at);
              var end_date = new Date(current_date.getTime() + minutes_counter*60000);

              // console.log('current_date = db' + current_date);

              // console.log('end_date (cli+30 - db)= ' + end_date);

              // var date_cli = new Date();
              // console.log('date_cli= ' + date_cli);

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

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
  }
</script>

@endsection

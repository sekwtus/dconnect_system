@extends('layouts.master')
@section('title', 'SIM 2')

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

    .tb-sim2 td:not(:first-child) {
      cursor:pointer;
    }

    .button-xxl{
        width: 120px;
        height: 120px;  
        font-size: 40px;
    }
  </style>

  {{-- date counter --}}
  <link href="{{ asset('assets/dist/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main')
<br>
<div class="row ">
  <div class="col-md-12">
    <div class="card-group">
      @foreach ($sim2_master as $key => $item) 
        <div class="card">
          <div class="card-header text-center">
            <h4 class="font-weight-bold mb-0">
              <b class="text-uppercase">
                {{ $item->topic_eng }}
              </b>
              
              {{-- <div class="card-actions">
                <a class="btn-minimize d-none" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <a type="button" class="{{ Auth::user()->id_type_user == 1 ? '' : 'd-none' }}" onclick="setting_sim2('open-modal', {{ $item->topic_id }})" title="ตั้งค่า">
                  <i class="ti-settings"></i>
                </a>
              </div> --}}
            </h4>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div id="topic_gauge{{ $item->topic_id }}" style="width:100%; height:150px;"></div>
              </div> 
            </div>

            <div class="row zoom60" >
              <div class="col-md-12" style="padding-right: 1px; padding-left: 1px;">
                <table border='1' class="table-bordered tbl-dconnect w-100" id="table_sim2_{{ $item->topic_id }}">
                  <thead>
                    <tr>
                      <th class="p-0">/</th>
                      <th class="p-0" >Mon</th>
                      <th class="p-0" >Tue</th>
                      <th class="p-0" >Wed</th>
                      <th class="p-0" >Thu</th>
                      <th class="p-0" >Fri</th>
                      <th class="p-0" >Sat</th>
                      <th class="p-0" >Sun</th>
                    </tr> 
                    

                  </thead>

                  <tbody class="tb-sim2"></tbody>

                  <tfoot>
                    <tr>
                      <td class="p-0"></td>
                      <td class="p-0" ></td>
                      <td class="p-0" ></td>
                      <td class="p-0" ></td>
                      <td class="p-0" ></td>
                      <td class="p-0" ></td>
                      <td class="p-0" ></td>
                      <td class="p-0" ></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-12 px-0">
                <canvas id="chartjs-trend-sim2-{{ $item->topic_id }}" height="300"></canvas>
              </div>
              
              {{-- <div class="col-md-12 mb-2">
                <button type="button" onclick='refresh_opject({{ $item->topic_id }})' class="btn btn-block btn-warning">
                  <i class="icon-refresh"></i> Refresh
                </button>
              </div> --}}
            </div>
          </div>

          <div class="card-footer text-center">
            <h4 class="font-weight-bold mb-0">

              <b class="text-uppercase">
                {{ $item->topic_eng }}
              </b>            
            
              <div class="card-actions">
                <a type="button" onclick='refresh_opject({{ $item->topic_id }})' title="refresh">
                  <i class="icon-refresh"></i>
                </a>

                <a class="btn-minimize d-none" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <a type="button" class="{{ Auth::user()->id_type_user == 1 ? '' : 'd-none' }}" onclick="setting_sim2('open-modal', {{ $item->topic_id }})" title="ตั้งค่า">
                  <i class="ti-settings"></i>
                </a>
              </div>

            </h4>
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
                <button class="btn btn-dark" onclick="swap_table()">
                  <i class="mdi mdi-tooltip-outline text-swap_table">Information sharing</i>
                </button>

                <button onclick="sign_meeting('open-modal')" class="btn btn-info" title="ลงชื่อเข้าประชุม">
                  <i class="fa fa-user"></i>
                  ลงชื่อเข้าประชุม
                </button>

                <button class="btn btn-success " onclick="save_modal_counter()" title="15 นาที">
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
                          <th style="width:10%; padding: px;">ดำเนินการ</th>
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

<!-- setting-sim2 -->
<div id="modal-setting-sim2" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog" style="max-width:50%;">
    <form id="frm-setting-sim2">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title- font-weight-bold">
            <i class="fa fa-setting"></i>
            Setting SIM 2
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
            <div class="col-md-6">
              <input type="hidden" name="sim2_department_id" value="{{ $sim2_department->id }}" > 
            </div>
            
          </div>
        </div>

        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
          <button type="button" onclick="setting_sim2('update')" class="btn btn-success">
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
                <!-- Tab panes -->
                <div class="tab-content pt-0 pl-0 ">
                  <div class="tab-pane active" id="tab_department1" role="tabpanel">
                    <div class="p-2"><h3> แผนก {{ $sim2_department->name }}</h3>
                      <input type="hidden" name="txt_dapartment_id" value="{{ $sim2_department->id }}">

                        <div class="row sim2_user_meeting">
                            {{-- html sim2_user_meeting from controller --}}
                        </div>

                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="modal-footer">
            <a href="{{ url($department_id.'/sim2/report_user_meeting') }}" class="btn btn-info">
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

<!-- บันทึกข้อมุล sim2 -->
<div id="sim2_add_data_modal" class="modal fade">
  <div class="modal-dialog" style="max-width:50%;">
      {{-- {{ Form::open(['method' => 'post' , 'url' => 'D-SIM/sim2_data/save' , 'files' => true]) }} --}}
      <div class="modal-content">
        <form id="frm_sim2_data" >
         
          <div class="modal-header text-center">
            <h4 class="font-weight-bold col-4 text-left" id="sim2_modal_topic"></h4>
            <h4 class="font-weight-bold col-4" id="sim2_modal_shift"></h4>
            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>

          <div class="modal-body" aria-disabled="false">
            <div class="row mb-2">
              <div class="col-md-6 div-line" style="display:none;">
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

              <div class="col-md-6">
                <label for="sim2_department">department :</label>
                <input type="text" class="form-control"  value="{{ $sim2_department->name }}" readonly />
                <input type="hidden" class="form-control" name="sim2_department" id="sim2_department" value="{{ $sim2_department->id }}" readonly />
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
            <br>


            {{-- <div class="row mb-2"> --}}
              <div class="col-md-12 row shift-a">
                    <div class="col-md-12"> 
                        <label for="score" class="col-lg-4 control-label " style="padding-left: 0px;">จำนวน :</label> 
                        <input id="score" type="text" value="0" name="score" class="col-lg-12 form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="problem_description" >รายละเอียดของปัญหา :</label>
                        <textarea type="text" class="form-control" name="problem_description" id="problem_description" ></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="root_cause" >สาเหตุของปัญหา :</label>
                        <textarea type="text" class="form-control" name="root_cause" id="root_cause" ></textarea>
                  </div>
                  <div class="col-md-12">
                      <label for="solution" >การแก้ไข, วิธีการ :</label>
                      <textarea type="text" class="form-control" name="solution" id="solution" ></textarea>
                      
                      <input class="form-control "  id="id" type="hidden" name="id" value="">
                      <input class="form-control "  id="work_shift" type="hidden" name="work_shift" value="">
                  </div>
              </div>

              {{-- <div class="col-md-12 row shift-b d-none">
                  <div class="col-md-12"> 
                      <label for="score2" class="col-lg-4 control-label " style="padding-left: 0px;">กะ B :</label> 
                      <input id="score2" type="text" value="0" name="score2" class="col-lg-12 form-control">
                  </div>
                  <div class="col-md-6">
                      <label for="problem_description" >รายละเอียดของปัญหา :</label>
                      <textarea type="text" class="form-control" name="problem_description" id="problem_description" ></textarea>
                  </div>
                  <div class="col-md-6">
                      <label for="root_cause" >สาเหตุของปัญหา :</label>
                      <textarea type="text" class="form-control" name="root_cause" id="root_cause" ></textarea>
                  </div>
                  <div class="col-md-12">
                      <label for="solution" >การแก้ไข, วิธีการ :</label>
                      <textarea type="text" class="form-control" name="solution" id="solution" ></textarea>
                      
                      <input class="form-control "  id="id" type="hidden" name="id" value="">
                  </div>
              </div> --}}
            {{-- </div> --}}


        
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
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              <i class="fa fa-times"></i>
              ยกเลิก
            </button>

            <input type="hidden" name="txtTopicID">

            <button type="button" value onclick="save_data_sim2()" class="btn btn-save-data-sim2 btn-success">
              <i class="far fa-save"></i>
              บันทึก
            </button>
          </div>
         
        </form>
      </div>
  </div>
</div>

<div id="modal_pdca_sim2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" id="form_modal_pdca_sim2">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><span id="topic" class="text-bold"> </span> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            {{-- แผนก --}}
            {{-- <input type="text" class="form-control" name="sim2_department" id="sim2_department" value="{{ $sim2_department->id }}" readonly /> --}}

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

                    <input class="form-control " hidden name="id_sim2_data_log" id="id_sim2_data_log" value="">

                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" onclick="save_modal_sim2_PDCA()" class="btn btn-success waves-effect waves-light">Save</button>
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
        <input type="hidden" class="form-control" name="sim2_department" id="sim2_department" value="{{ $sim2_department->id }}" readonly />

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

<div id="choose-work-shift" class="modal fade  choose-work-shift">
  <div class="modal-dialog" style="max-width:20%;">
    <form id="frm-select-week">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title-">
            <i class="fa fa-clock"></i>
             เลือกกะ
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body text-center">
          <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-lg btn-secondary button-xxl choose-shift" value="A" id="shiftA" ><i class="fa fa-font"></i> </button>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-lg btn-secondary button-xxl choose-shift" value="B" id="shiftB"> <i class="fa fa-bold"></i> </button>
            </div>
          </div>
        </div>

        {{-- <div class="modal-footer" > 
          <button onclick="refresh_opject('all')" data-dismiss="modal"  class="btn btn-success" type="button"> <i class="far fa-save"></i> บันทึก </button>
        </div> --}}
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
  // var json = { "{{ $sim2_master }}" };
  // console.log("" );

  var table = {}; // ตัวแปร data-table
  var sim2_master = {!! json_encode($sim2_master)  !!}; // console.log(sim2_master);
  // console.log(sim2_master);
  
  // วนลูป sim2_master
  $.each(sim2_master, function (index, value) {
    $('.first_column'+index).text(value.first_column);

    var arr_day_week = get_days_week();
    // console.log( arr_day_week );//วันทั้งหมดในweek

    //table move to fn datatable_calling
    datatable_calling(value);

    // modal
    $(`#table_sim2_${value.topic_id} tbody`).on("click", "td", function () {  //call modal add data

      $('#choose-work-shift').modal('toggle');

      var this_index = $(this).index();
      var this_parent = $(this).parent("tr");
      var shift_ = '';


      $('#shiftA, #shiftB').click(function () {
        if (this.id == 'shiftA') {
            var shift_ = 'A';
        }
        else if (this.id == 'shiftB') {
            var shift_ = 'B';
        }
        $('#choose-work-shift').modal('toggle');

        // modal sim2
        if (this_index != 0) {
            var data_record = table[`table_sim2_${value.topic_id}`].row(this_parent).data();
            // console.log(this_parent.attr('class') , data_record);

            var today = arr_day_week[this_index -1 ];
            console.log( 
              // data_record,
              // `topic: ${value.topic_eng}\ndept: ${data_record.dept_id}\n`+
              // 'day: '+ $(`#table_sim2_${index} thead th`).eq($(this).index()).text().trim() +
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

            var date = new Date();
            var h = date.getHours();
            var m = date.getMinutes();
            m=m<10?'0'+m:m;

            var sumTime = parseInt((h*100)+m);
            // console.log(sumTime);
            var work_shift = ( (759 < sumTime) && (sumTime < 2000) ? 'A' : 'B')
            // console.log(h+''+m);
            
            $("#work_shift").val(shift_);
            $('#sim2_modal_topic').html(value.topic_eng );
            $('#sim2_modal_shift').html('กะ' + shift_ + ' เวลา '+h+':'+m  );
            $('#save_days').val($(`#table_sim2_${value.topic_id} thead th`).eq(this_index).text().trim());
            $('#save_date').val(today);
            $("input[name='txtTopicID']").val(value.topic_id);

            $('.btn-save-data-sim2').attr('onclick', `save_data_sim2(${value.topic_id})`);

            var sim2_department_id = '{{ $department_id }}';
            $.ajax({
                type: 'get',
                // dataType: 'JSON',
                url: `{{ url('D-SIM/sim2/get_data_modal') }}`, //test
                data: {
                        sim2_topic_id: value.topic_id,
                        department_id: data_record.dept_id ? data_record.dept_id :null,
                        line_number: data_record.line_number ?data_record.line_number :null,
                        save_date: today , sim2_department_id : sim2_department_id , work_shift:shift_
                      },
                beforeSend: function(){
                    $("input[name='score']").val('');
                    // $("input[name='score2']").val('');
                    $('#problem_description').val('');
                    $('#root_cause').val('');
                    $('#solution').val('');
                    // $("#user_id").val('');
                    $("#ddlUser").val('');
                    $("#ddlUser").select2();

                    $("#id").val('');
                    $("#file_name").val('');
                    $("#a_file_name").hide();

                    var this_day = new Date(); // defualt วันนี้ ทุกการเปิด modal
                    this_day = moment(this_day).format('DD/MM/YYYY');
                    $("#plan_date").val(this_day);

                },
                success: function (data){ 
                  // console.log(data.SIM2_data_log);
                  if(data) {
                    $("input[name='score']").val(data.SIM2_data_log[0].score);
                    // $("input[name='score2']").val(data.SIM2_data_log[0].score2);
                    $('#problem_description').val(data.SIM2_data_log[0].problem_description);
                    $('#root_cause').val(data.SIM2_data_log[0].root_cause);
                    $('#solution').val(data.SIM2_data_log[0].solution);
                    
                    // var user_name = $('#ddlUser [data-value="' + data.SIM2_data_log[0].user_id + '"]').val(); 
                    $('#ddlUser').val(data.SIM2_data_log[0].user_id);
                    $("#ddlUser").select2();

                    $("#id").val(data.SIM2_data_log[0].id);
                    $("#file_name").val(data.SIM2_data_log[0].file_name );
                    $("#plan_date").val(data.SIM2_data_log[0].plan_date);

                    // console.log(data.SIM2_data_log[0].file_name);
                    if (data.SIM2_data_log[0].file_name) {
                      $("#a_file_name").show();
                      $("#a_file_name").attr("href",`{{ asset('assets/sim2_file/${data.SIM2_data_log[0].file_name}' ) }}`);
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
            
            $('#sim2_add_data_modal').modal('toggle');
        }
        // end modal
 
        this_index = null;
        this_parent = null;
        
      });

  
    });

    // วาด trend chart
    // trend_chart(index, value, arr_day_week);
  });

  // setting_sim2
  function setting_sim2(todo, topic_id='') { 
    if (todo === 'open-modal') {
      $('input[name="topic_id"]').val(topic_id);
      var sim2_department_id = '{{ $department_id }}';
      // alert(todo+' '+topic_id+' '+$('input[name="topic_id"]').val());
      $.ajax({
        type: "get",
        url: `{{ url('sim2/setting') }}`,
        data: {topic_id:topic_id , sim2_department_id:sim2_department_id },
        success: function (res) {
          // console.log(res.sim2_master);
          $('input[name="topic_eng"]').val(res.sim2_master.topic_eng);
          $('input[name="topic_detail"]').val(res.sim2_master.topic_detail);
          $('input[name="kpi"]').val(res.sim2_master.kpi);
          $('select[name="target"]').val(res.sim2_master.target);
          $('input[name="standard_rate"]').val(res.sim2_master.standard_rate);
          $('input[name="unit"]').val(res.sim2_master.unit);

          // color picker
          $(".colorpicker").asColorPicker();
          $('input[name="gauge_color1"]').asColorPicker('val',res.sim2_master.gauge_color1);
          $('input[name="gauge_color2"]').asColorPicker('val', res.sim2_master.gauge_color2);

          $('select[name="first_column"]').val(res.sim2_master.first_column);
          $('select[name="total_type_value"]').val(res.sim2_master.total_type_value);

          $('input[name="min_value"]').val(res.sim2_master.min_value);
          $('input[name="max_value"]').val(res.sim2_master.max_value);
          $('input[name="step_size"]').val(res.sim2_master.step_size);
          $('input[name="line_color"]').asColorPicker('val', res.sim2_master.line_color);

          $('select[name="show_line"]').val(res.sim2_master.show_line);
          $('input[name="score_decimals"]').val(res.sim2_master.score_decimals);
          
          // $('input[name="line_color"]').asColorPicker('val', res.sim2_master.line_color);

          $('#modal-setting-sim2').modal('show');
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
        url: `{{ url('sim2/setting') }}`,
        data: $('#frm-setting-sim2').serialize(),
        success: function (res) {
          console.log(res);
          alert(res.msg);
          datatable_calling(res.sim2_master);
          $('#modal-setting-sim2').modal('hide');
          // ยังไม่destroy
          $("input[name='score']").trigger('touchspin.destroy');
          // $("input[name='score2']").trigger('touchspin.destroy');
          console.log('touchspin.destroy');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON); ;
        },
      });
    }
  }

  // save_data_sim2
  function save_data_sim2(topic_id) {
    // alert($('#ddlUser').val());
    var form_data = new FormData($('#frm_sim2_data')[0]);   
    var value_search =  $('#ddlUser').val();
    form_data.append('user_id', value_search);

    for (let[name , value] of form_data) {
      console.log(name + ':' + value);      
    }

    // disabled ปุ่มบันทึกไว้ กันข้อมูลเบิ้ล
    $('.btn-save-data-sim2').attr('disabled', true);    

    $.ajax({
      type: 'post',
      dataType: 'JSON',
      url: `{{ url('D-SIM/sim2_data/save') }}`,
      data: form_data,
      contentType: false,
      processData: false,
      beforeSend: function(){
      },
      success: function (res) {
        console.log(res.databack);
        alert(res.msg);
        
        $('.btn-save-data-sim2').attr('disabled', false);

        $('#sim2_add_data_modal').modal('toggle');
        refresh_opject(topic_id);
        table_pdaca_sim2.ajax.reload();
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
      $.each(sim2_master, function (indexInArray, valueOfElement) { 
          datatable_calling(valueOfElement);
          str = str +','+ valueOfElement.topic_id;
      });
      console.log('fn-[refresh_opject-all]-topic'+str);
    } else {
      var value_sim2_master;
      $.each(sim2_master, function (indexInArray, valueOfElement) { 
        if(valueOfElement.topic_id == topic_id){
          value_sim2_master = valueOfElement;
        }
      });
        
      datatable_calling(value_sim2_master);
      console.log('fn-[refresh_opject]-active');
    }
  }
  
  function datatable_calling(value) {
    var total_score_in_today = [];
    var arr_day_week = get_days_week();
    var sim2_department_id = '{{ $department_id }}';
    var arr_count_avg = { // ใช้เป็นตัวหารค่าเฉลี่ย OE ของ หัวข้อ COST
      count_avg_mon:0, count_avg_tue:0, count_avg_wed:0, count_avg_thu:0, count_avg_fri:0, count_avg_sat:0, count_avg_sun:0 
    }; 

    // table
    table[`table_sim2_${value.topic_id}`] = $(`#table_sim2_${value.topic_id}`).DataTable( {  //datatable
      destroy: true,
      lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
      dom: 't',
      "scrollX": false,
      orderCellsTop: true,
      fixedHeader: true,
      "bSort": false,
      "order": [],
      ajax: {
          url: '{{ url('D-SIM/sim2/get_data_table') }}',
          data: {sim2_master:value, arr_day_week:arr_day_week ,sim2_department_id:sim2_department_id},
          // success: function (res) {
          //   console.log(res);
          // },
          complete: function(){

          },
          error: function(){
            console.log('reloading_datatable');
            refresh_opject(value.topic_id)
            // table[`table_sim2_${index}`].ajax.reload();          
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
            render: function (data, type, row, meta) { //
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
              $(td).html( (row.score_Mon ? parseInt(row.score_Mon).toFixed( value.score_decimals ) : 0 ) );

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
              $(td).html((row.score_Tue ? parseInt(row.score_Tue).toFixed( value.score_decimals ) : 0 ));
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
                $(td).html((row.score_Wed ? parseInt(row.score_Wed).toFixed( value.score_decimals ) : 0 ));
                
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
              $(td).html((row.score_Thu ? parseInt(row.score_Thu).toFixed( value.score_decimals ) : 0 ));

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
              $(td).html((row.score_Fri ? parseInt(row.score_Fri).toFixed( value.score_decimals ) : 0 ));

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
              $(td).html((row.score_Sat ? parseInt(row.score_Sat).toFixed( value.score_decimals ) : 0 ));

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
                $(td).html((row.score_Sun ? parseInt(row.score_Sun).toFixed( value.score_decimals ) : 0 ));

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
          monTotal = Number( (monTotal / arr_count_avg['count_avg_mon']) ).toFixed(value.score_decimals);
          tueTotal = Number( (tueTotal / arr_count_avg['count_avg_tue']) ).toFixed(value.score_decimals);
          wedTotal = Number( (wedTotal / arr_count_avg['count_avg_wed']) ).toFixed(value.score_decimals);
          thuTotal = Number( (thuTotal / arr_count_avg['count_avg_thu']) ).toFixed(value.score_decimals);
          friTotal = Number( (friTotal / arr_count_avg['count_avg_fri']) ).toFixed(value.score_decimals);
          satTotal = Number( (satTotal / arr_count_avg['count_avg_sat']) ).toFixed(value.score_decimals);
          sunTotal = Number( (sunTotal / arr_count_avg['count_avg_sun']) ).toFixed(value.score_decimals);
        } else {
          var topic_footer = 'Total';
        }

        // parseInt(row.score_Sat).toFixed( value.score_decimals ) 

        var arr_total_all = [
          topic_footer, 
          isNaN(monTotal) ?0 : Number(monTotal).toFixed(value.score_decimals),
          isNaN(tueTotal) ?0 : Number(tueTotal).toFixed(value.score_decimals),
          isNaN(wedTotal) ?0 : Number(wedTotal).toFixed(value.score_decimals),
          isNaN(thuTotal) ?0 : Number(thuTotal).toFixed(value.score_decimals),
          isNaN(friTotal) ?0 : Number(friTotal).toFixed(value.score_decimals),
          isNaN(satTotal) ?0 : Number(satTotal).toFixed(value.score_decimals),
          isNaN(sunTotal) ?0 : Number(sunTotal).toFixed(value.score_decimals)
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
        
        total_score_in_today[value.topic_id] = arr_total_all;
        // console.log('table' , total_score_in_today[index]);
        main_gauge(value, total_score_in_today);
        trend_chart(value, arr_total_all)
      },
    });
  }
  
  function trend_chart(value, arr_total) {
    const arr_period = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']; // months.splice(3,2);
    arr_total.shift(); // ลบ value Total/Average ออกก่อน
    // console.log(arr_total);

    if(arr_trend_chart[`trend_chart${value.topic_id}`]){ 
      // ถ้ามีชาทอันเก่าอยุ่แล้ว ให้ destroy ก่อน
      arr_trend_chart[`trend_chart${value.topic_id}`].destroy();
    }

    arr_trend_chart[`trend_chart${value.topic_id}`] = new Chart(document.getElementById(`chartjs-trend-sim2-${value.topic_id}`), {
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
    var days_number = today.getDay(); //5 (Fri) +1แผนก
    if(value.total_type_value === 'avg') {
      var sum_score = Number(data_total[value.topic_id][days_number]).toFixed(1); // จำนวน getRandomInt(10,100)
    } else {
      var sum_score = Number(data_total[value.topic_id][days_number]);
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

    // เปลี่ยนสี guage ตาม เรทของ หัวข้อ sim2
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
      var sim2_department_id = '{{ $department_id }}';
      
      $.ajax({
        type: "get",
        url: `{{ url('sim2/get_sim2_user') }}`,
        data:{sim2_department_id:sim2_department_id},
        success: function (res) {
          // console.log(res.sim2_user_meeting);
          $('.department_tab').html(res.department_tab);
          $('.sim2_user_meeting').html(res.sim2_user_meeting);
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
        type: "get",
        url: `{{ url('sim2/save_sim2_user_meeting') }}`,
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
    // alert(current.slice(0,-2));
    datatable_pdca();
    set_start_meeting();

    $(".select2").select2();
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
    
    function get_modal_sim2_PDCA(id , topic_eng ,save_date , department_name, score){
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ url('D-SIM/sim2/get_data_log') }}',
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
                $('#topic').html( (department_name == 'null' ? 'Line ' + data[0].line_number : department_name) + ' : ' + topic_eng);
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
                $('#id_sim2_data_log').val(id);
                $("#user_id_pdca").val(data[0].user_id);

                  $("#file_name_pdca").val(data[0].file_name );
                  if (data[0].file_name) {
                    $("#a_file_name_pdca").show();
                    $("#a_file_name_pdca").attr("href",`{{ asset('assets/sim2_file/${data[0].file_name}' ) }}`);
                  }
                  

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    }

    function save_modal_sim2_PDCA(){

      var form_data = new FormData($('#form_modal_pdca_sim2')[0]);      
      $.ajax({
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            type: 'post',
            dataType: 'JSON',
            url: '{{ url('D-SIM/sim2/save_modal_sim2_PDCA') }}',
            data: form_data,
            contentType: false,
            processData: false,
            // data: { data : '1' },
            beforeSend: function(){
            },
            success: function (data) {
              console.log(data);
              // table_pdaca_sim2.ajax.reload();
              alert('บันทึกสำเร็จ!');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
              $('#modal_pdca_sim2').modal('toggle');
              table_pdaca_sim2.ajax.reload();
            },
        });
    }
</script>

<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/sweet-alert.init.js')}}"></script>
{{-- datatable PDCA --}}
<script>
  function datatable_pdca(){
    var sim2_department_id = '{{ $department_id }}';

    table_pdaca_sim2 = $('#pdca-table').DataTable( {
      ajax: {
            url: '{{ url('D-SIM/sim2/get_table_pdca') }}',
            data: {sim2_department_id:sim2_department_id},
            complete: function(){
                // $('.ajax-loader').css("visibility", "hidden");
            },
            error: function(){
              table_pdaca_sim2.ajax.reload();
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
          { data: 'sim2_log_id', className:'text-center'},
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
                        alt="default" data-toggle="modal" data-target="#modal_pdca_sim2" \
                        onclick="get_modal_sim2_PDCA( `'+row.sim2_log_id+'`, `'+row.topic_eng+'` ,\
                        `'+row.save_date+'` , `'+row.department_name+'` , `'+row.score+'` )">\
                        <i class="mdi mdi-file-check"></i>\
                      </button>\
                      \
                      <button type="button" class="btn waves-effect waves-light btn-danger"\
                        onclick="delete_sim2_data_log( `'+row.sim2_log_id+'`,`'+row.sim2_topic_id+'` )">\
                        <i class="mdi mdi-delete"></i>\
                      </button>';
            },
          },
      ],
      // "ordering": false,
      "order": [],
    });
  }

  function delete_sim2_data_log(sim2_log_id,sim2_topic_id){
      if (confirm('ยืนยันการลบ')) {
          $.ajax({
            url: '{{ url('D-SIM/sim2/delete_sim2_data_log') }}',
            data: {sim2_log_id:sim2_log_id},
              type: 'delete',
              success: function(result) {
                  table_pdaca_sim2.ajax.reload();
                  refresh_opject(sim2_topic_id); //fixedก่อน เพราะค่าวนเป็น index แต่save topic เป็น id
                  alert('ลบสำเร็จ');
              }
          });
      }
  }
</script>

<script src="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
{{-- touchSpin --}}
<script>


  function sim2_modal(item){
    // console.log(item);
    $('#sim2_modal_topic').html(item.topic_eng);
    $("button[name='sim2_topic_id']").val(item.id_sim2);
    
    $("input[name='score']").TouchSpin({
        min: 0,
        max: 9999,
        stepinterval: 50,
        maxboostedstep: 10000000,
        postfix: item.unit,
    });
    // $("input[name='score2']").TouchSpin({
    //     min: 0,
    //     max: 9999,
    //     stepinterval: 50,
    //     maxboostedstep: 10000000,
    //     postfix: item.unit,
    // });

  }

</script>

{{-- countdown time --}}
<script src="{{ asset('assets/dist/js/jquery.plugin.js') }}"></script>
<script src="{{ asset('assets/dist/js/jquery.countdown.js') }}"></script>

<script>

  function save_modal_counter() {
    
    var time_counter = 15;
    var dt = new Date();
    var time_now = moment(dt).format('YYYY-MM-DD H:m:s');

    $.ajax({
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        type: 'post',
        dataType: 'JSON',
        url: '{{ url('D-SIM/sim2/save_modal_time_counter') }}',
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
            url: '{{ url('D-SIM/sim2/get_time_stop') }}',
            data: {},
            beforeSend: function(){
            },
            success: function (meeting_time) {
              var current_date = new Date(meeting_time.sim2_meeting_time.date_time_start_meeting);
              var minutes_counter = meeting_time.sim2_meeting_time.time_counter;
              // console.log('time strat db= ' + meeting_time.sim2_meeting_time.created_at);
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
                if( time_chk > 840 ) { // > 14 m
                  text_ = 'Safety Talk';
                }else if( time_chk > 240 ) { // > 13 m
                  text_ = 'KPI Review';
                }else if( time_chk > 120 ) { // > 10 m
                  text_ = 'Action Plan Review';
                }else if( time_chk > 60 ) { // > 1 m
                  text_ = 'Production Plan Review';
                }else if( time_chk > 0 ) {
                  text_ = 'Sharing';
                }else if( time_chk == 0 ) {
                  text_ = 'หมดเวลา';
                }

                $('#showTextTime').text(text_);
              }

              $('#showHeader').html('SIM 2  แผนก : {{ $sim2_department->name }}  ({{ th_date_short(date("Y-m-d")) }}) ');
              $('#showSetWeek').html('<a type="button" alt="default" data-toggle="modal" data-target=".modal-select-week" > <i class="ti-settings"></i> </a>');

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // alert("Status: " + textStatus); alert("Error: " + errorThrown);
                set_start_meeting();
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
    var sim2_department_id = '{{ $department_id }}';

      table_information_sharing = $('#info-sharing-table').DataTable({
      ajax: {
            url: '{{ url('D-SIM/sim2/get_table_information_sharing') }}',
            data: {sim2_department_id:sim2_department_id},
            complete: function(){
            },
            error: function(){
              table_pdaca_sim2.ajax.reload();
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
              return '<button type="button" onclick="delete_sim2_info_sharing('+data+')" class="btn waves-effect waves-light btn-danger">\
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

      table_pdaca_sim2.destroy();
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
      table_pdaca_sim2.ajax.reload(); // แสดงตาราง

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
          url: `{{ url('D-SIM/sim2/save_information_sharing') }}`,
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

  function delete_sim2_info_sharing(id){
      if (confirm('ยืนยันการลบ')) {
          $.ajax({
            url: '{{ url('D-SIM/sim2/delete_sim2_information_sharing') }}',
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

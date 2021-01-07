@extends('layouts.master')
@section('title', 'SIM 2')

@section('style')
  <!-- Date picker plugins css -->
  <link href="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">
      {{ $sim_master->topic_eng }} ({{ $view_data_user->department_name }})
    </h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">D-SIM</a></li>
        <li class="breadcrumb-item">
          <a href="{{ url('D-SIM/SIM2') }}">SIM 2</a>
        </li>
        <li class="breadcrumb-item active">{{ $sim_master->topic_eng }}</li>
      </ol>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title d-none"></h4>
        <h6 class="card-subtitle d-none">Use default tab with class <code>nav-tabs & tabcontent-border </code></h6>
        
        <div class="text-center col-md-12">
          <div id="just_gage" class="gauge" style="width:100%; height:320px;"></div>
        </div>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> 
            <a class="nav-link active" data-toggle="tab" href="#tab-morning" role="tab">
              <span class="hidden-sm-up"><i class="ti-home"></i></span>
              <span class="hidden-xs-down">กรอกข้อมูล</span>
            </a>
          </li>

          <li class="nav-item"> 
            <a class="nav-link" data-toggle="tab" href="#tab-avg" role="tab">
              <span class="hidden-sm-up"><i class="ti-user"></i></span>
              <span class="hidden-xs-down">SIM 2 / เฉลี่ย</span>
            </a>
          </li>

          <li class="nav-item"> 
            <a class="nav-link" data-toggle="tab" href="#tab-chart" role="tab">
              <span class="hidden-sm-up"><i class="ti-user"></i></span>
              <span class="hidden-xs-down">เทรนด์</span>
            </a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabcontent-border">
          <div class="tab-pane active" id="tab-morning" role="tabpanel">
            <div class="p-20 table-responsive">
              <form method="post" action="{{ url('D-SIM/SIM2/insert_information') }}">
                @csrf
                <div class="row form-group">
                  <div class="col-md-12">
                    <label>วันที่</label>
                    <div class="input-group">
                      <input id="txtDate" name="txtDate" value="" class="form-control" placeholder="วว/ดด/ปปปป" required>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="icon-calender"></i></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <div class="skin skin-line m-t-">
                      <label>ช่วงเวลา</label>
                      <div class="input-group">
                        <ul class="icheck-list w-100 p-0">
                          <li>
                            <input type="radio" name="rdoPeriod" value="กะเช้า" data-radio="iradio_line-blue" data-label="กะเช้า" class="check" checked>
                          </li>
                          <li>
                            <input type="radio" name="rdoPeriod" value="กะบ่าย" data-radio="iradio_line-blue" data-label="กะบ่าย" class="check">
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>ข้อมูล</label>
                    <input type="number" name="txtScore" class="form-control" placeholder="กรอกข้อมูล" required >
                    {{-- <div class="input-group">
                      <input type="number" name="txtMorning" class="form-control">
                      <span class="input-group-append">
                        <button type="button" onclick="" class="btn btn-sm btn-success" title="บันทึก">
                          <i class="far fa-save m-2"></i>
                        </button>
                      </span>
                    </div> --}}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button type="" onclick="" class="btn btn-block btn-success" name="sim_master_id" value="{{ $id }}" title="บันทึก">
                      <i class="far fa-save m-2"></i> บันทึก
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="tab-pane" id="tab-avg" role="tabpanel">
            <div class="p-20 table-responsive">
              <div class="row">
                <div class="col-md-12">
                  <table class="tbl-danone table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th colspan="2">จันทร์</th>
                        <th colspan="2">อังคาร</th>
                        <th colspan="2">พุธ</th>
                        <th colspan="2">พฤหัสบดี</th>
                        <th colspan="2">ศุกร์</th>
                        <th colspan="2">เสาร์</th>
                        <th colspan="2">อาทิตย์</th>
                      </tr>

                      <tr>
                        <th style="width:5%;">เช้า</th>
                        <th style="width:5%;">บ่าย</th>

                        <th style="width:5%;">เช้า</th>
                        <th style="width:5%;">บ่าย</th>

                        <th style="width:5%;">เช้า</th>
                        <th style="width:5%;">บ่าย</th>

                        <th style="width:5%;">เช้า</th>
                        <th style="width:5%;">บ่าย</th>

                        <th style="width:5%;">เช้า</th>
                        <th style="width:5%;">บ่าย</th>

                        <th style="width:5%;">เช้า</th>
                        <th style="width:5%;">บ่าย</th>

                        <th style="width:5%;">เช้า</th>
                        <th style="width:5%;">บ่าย</th>
                      </tr>
                    </thead>
    
                    <tbody class="text-center">
                      <tr>
                        <td id="จันทร์กะเช้า"></td>
                        <td id="จันทร์กะบ่าย"></td>
                        <td id="อังคารกะเช้า"></td>
                        <td id="อังคารกะบ่าย"></td>
                        <td id="พุธกะเช้า"></td>
                        <td id="พุธกะบ่าย"></td>
                        <td id="พฤหัสบดีกะเช้า"></td>
                        <td id="พฤหัสบดีกะบ่าย"></td>
                        <td id="ศุกร์กะเช้า"></td>
                        <td id="ศุกร์กะบ่าย"></td>
                        <td id="เสาร์กะเช้า"></td>
                        <td id="เสาร์กะบ่าย"></td>
                        <td id="อาทิตย์กะเช้า"></td>
                        <td id="อาทิตย์กะบ่าย"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="row m-t-15">
                <div class="col-md-12">
                  <table class="tbl-danone table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th style="width:5%;">256X</th>
                        <th style="width:5%;">256X</th>
                        <th style="width:5%;">ม.ค.</th>
                        <th style="width:5%;">ก.พ.</th>
                        <th style="width:5%;">มี.ค.</th>
                        <th style="width:5%;">เม.ย.</th>
                        <th style="width:5%;">พ.ค.</th>
                        <th style="width:5%;">มิ.ย.</th>
                        <th style="width:5%;">ก.ค.</th>
                        <th style="width:5%;">ส.ค.</th>
                        <th style="width:5%;">ก.ย.</th>
                        <th style="width:5%;">ต.ค.</th>
                        <th style="width:5%;">พ.ย.</th>
                        <th style="width:5%;">ธ.ค.</th>
                      </tr>
                    </thead>
    
                    <tbody class="text-center">
                      <tr>
                        <td> &nbsp; </td>
                        <td>รวม</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab-chart" role="tabpanel">
            <div class="p-20 table-responsive">
              <div class="row">
                <div class="col-md-12">
                  <div>
                    <canvas id="chart_day" height="150"></canvas>
                  </div>
                </div>
              </div>

              <div class="row m-t-15">
                <div class="col-md-12">

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


{{-- PDCA  --}}
<div class="col-md-12">
  <div class="card">
      <div class="card-body">
          <h4 class="card-title">PLAN DO CHECK ACT</h4>
          <h6 class="card-subtitle"> 
              <div class="row"> 
                  <div class="col-9"> Plan : อธิบายปัญหา, ใช้ก้างปลา, 5 WHY ค้นหาต้นเหตุ, อธิบายการแก้ไข, ระบุผู้รับผิดชอบและวันกำหนดวันเสร็จ <br>
                      Do : ลงมือแก้ไข Check : ทวนสอบปัญหาว่าจะไม่เกิดขึ้นซ้ำ Act : ผู้พบปัญหาทวนสอบหลังจากแก้ไขแล้วภายใน 15 วัน </div>        
                  <div class="col-3 text-right"> 
                      <button type="button" class="btn waves-effect waves-light btn-success text-right model_img img-responsive" alt="default" data-toggle="modal" data-target="#adding_modal" >เพิ่มหัวข้อ</button> 
                      </div>                          
              </div>
          </h6>
                  
              <table class="display nowrap table table-hover table-striped table-bordered dataTable" id="pdca-table" width="100%">
                  <thead>
                      <tr>
                          <th style="padding: 3px;">ลำดับ</th>
                          <th style="padding: 3px;">วันที่</th>
                          <th style="padding: 3px;">รายละเอียดของปัญหา</th>
                          <th style="padding: 3px;">สาเหตุของปัญหา</th>
                          <th style="padding: 3px;">การแก้ไข, วิธีการ</th>
                          <th style="padding: 3px;">ผู้รับผิดชอบ</th>
                          <th style="padding: 3px;">วันที่จะทำ</th>
                          <th style="padding: 3px;">วันที่ทำจริง</th>
                          <th style="padding: 3px;">PDCA</th>
                          <th style="padding: 3px;">ดำเนินการ</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php $c=1; @endphp
                      @foreach ($data_pdca as $pdca)
                      <tr>
                          <td style="padding: 3px;" >{{ $c++ }}</td>
                          <td style="padding: 3px;" >{{ $pdca->date }}</td>
                          <td style="padding: 3px;" >{{ $pdca->problem_description }}</td>
                          <td style="padding: 3px;" >{{ $pdca->root_cause }}</td>
                          <td style="padding: 3px;" >{{ $pdca->solution }}</td>
                          <td style="padding: 3px;" >{{ $pdca->name }}</td>
                          <td style="padding: 3px;" >{{ $pdca->schedule_date }}</td>
                          <td style="padding: 3px;" >{{ $pdca->execute_date }}</td>
                          <td style="padding: 3px;" >
                              {{-- p --}}
                              <span class="badge badge-success badge-pill">P</span>
                              <i class="fa fa-arrow-right"></i>

                              {{-- d --}}
                              @if (empty($pdca->do_date))
                                  <span class="badge badge-danger badge-pill">D</span>
                              @else
                                  <span class="badge badge-success badge-pill">D</span>
                              @endif
                              <i class="fa fa-arrow-right"></i>

                              {{-- c --}}
                              @if (empty($pdca->check_date))
                                  <span class="badge badge-danger badge-pill">C</span>
                              @else
                                  <span class="badge badge-success badge-pill">C</span>
                              @endif
                              <i class="fa fa-arrow-right"></i>

                              {{-- a --}}
                              @if (empty($pdca->action_date))
                              <span class="badge badge-danger badge-pill">A</span>
                              @else
                                  <span class="badge badge-success badge-pill">A</span>
                              @endif

                          </td>
                          <td style="padding: 3px;" ><button type="button" class="btn waves-effect waves-light btn-info" alt="default" data-toggle="modal" data-target="#action_modal" onclick="getDatePDCA({{ $pdca->PDCA_id }})">
                              <i class="mdi mdi-file-check"></i>
                          </button></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          
      </div>
  </div>
</div>
 
<div id="adding_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['method' => 'post' , 'url' => 'D-SIM/PDCA/save']) }}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PDCA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="date_today">วันที่ :</label>
                        <input class="form-control " placeholder="วว/ดด/ปปปป" id="date_today" type="text" name="date_today" value="" required>

                        <label for="recipient-name" >รายละเอียดของปัญหา :</label>
                        <textarea type="text" class="form-control" name="problem_description" id="problem_description" require></textarea>

                        <label for="recipient-name" >สาเหตุของปัญหา :</label>
                        <textarea type="text" class="form-control" name="root_cause" id="root_cause" require></textarea>

                        <label for="recipient-name" >การแก้ไข, วิธีการ :</label>
                        <textarea type="text" class="form-control" name="solution" id="solution" require></textarea>
                        
                        <label for="recipient-name" >ผู้รับผิดชอบ :</label>
                        <select class="form-control" name="responsible_user_id" id="responsible_user_id" require>
                            @foreach ($users as $users)
                                <option value="{{ $users->id }}">{{ $users->name }}</option>
                            @endforeach
                        </select>

                        <label for="schedule_date">วันที่จะทำ :</label>
                        <input class="form-control " placeholder="วว/ดด/ปปปป" id="schedule_date" type="text" name="schedule_date" value="" required>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" name="id_master" value="{{ $id }}" class="btn btn-success waves-effect waves-light">Save</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

<div id="action_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['method' => 'post' , 'url' => 'D-SIM/save_date']) }}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PDCA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="date_today">วันที่วางแผน PLAN :</label>
                        <input class="form-control "  id="plan_date" type="text" name="plan_date" value=""> 
                        
                        <label for="do_date">วันที่ลงมือแก้ไข DO :</label>
                        <input class="form-control "  id="do_date" type="text" name="do_date" value="">
                        
                        <label for="check_date">วันที่ตรวจสอบ CHECK :</label>
                        <input class="form-control "  id="check_date" type="text" name="check_date" value="">
                        
                        <label for="action_date">วันที่ปรับปรุงปัญหา ACTION :</label>
                        <input class="form-control "  id="action_date" type="text" name="action_date" value="">

                        <label for="recipient-name" >note :</label>
                        <textarea type="text" class="form-control" name="problem_description" id="problem_description" require></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" name="id_action_modal" id="id_action_modal" value=""  class="btn btn-success waves-effect waves-light">Save</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection 

@section('script')
<!-- datepicker เสก-->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="{{asset('/assets/dist/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/dist/js/daterangepicker.min.js')}}"></script>
<script type="">
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
</script>

{{-- {{ $sim_master->target }}  --}}

@if (\Session::has('success'))
  <script>
    alert("{!! \Session::get('success') !!}");
  </script>
@endif
<script type="">
  $(function() {
  // justgage //
    var sum_score = {!! $data_sim_info[0]->sum_score=='' ?0 :$data_sim_info[0]->sum_score !!}; // จำนวนครั้ง
    var target = "{!! $sim_master->target !!}";
    var standard_rate = "{{ $sim_master->standard_rate }}";
    // console.log(sum_score, target, standard_rate);
    var gauge_color,level_color;

    if(target === '>=') {
      if((sum_score >= standard_rate) == true){ 
        // sum_score = 1;
        gauge_color = "#ff0000"; // สี bg gage
        level_color = "#00b050"; // สี value gage
      } else { //alert(sum_score+' '+2);
        // sum_score = 0;
        gauge_color = "#ff0000";
        level_color = "#00b050";
      }
    } 

    else if(target === '==') { //alert(0);
      if((sum_score == standard_rate) == true){
        gauge_color = "#ff0000";
        level_color = "#00b050";
      } else {
        gauge_color = "#00b050";
        level_color = "#ff0000";
      } 
    } 

    else if(target === '<') {
      if((sum_score < standard_rate) == true){
        gauge_color = "#ff0000";
        level_color = "#00b050";
      } else {
        gauge_color = "#00b050";
        level_color = "#ff0000";
      }
    }

    var _title = "{{ $sim_master->topic_eng }}"; // ดึงจาก DB

    var just_gage = new JustGage({
      id: `just_gage`,
      title: _title,
      // titleFontColor: "#",
      label: "{{ th_date_short(date('Y-m-d')) }}",
      labelFontColor: "#8e8e93",
      value: sum_score.toFixed(0),
      // valueFontColor: "#",

      min: 0,
      max: 1,
      decimals: 0,
      symbol: ' เรื่อง',
      // minTxt: true,
      // maxTxt: true,
      hideMinMax: true, // ซ่อนค่า min max ของ just_gage
      // donut: true, // วงกลม
      gaugeWidthScale: 0.1,
      gaugeColor: gauge_color, // สีพื้นหลังของ justGage

      levelColors: [
        level_color
      ],
      pointer: true,
      pointerOptions: {
        toplength: -15,
        bottomlength: 10,
        bottomwidth: 12,
        color: '#8e8e93',
        stroke: '#ffffff',
        stroke_width: 3,
        stroke_linecap: 'round'
      },
      gaugeWidthScale: 0.5,
      counter: true
    });
    // console.log(just_gage, just_gage.txtMaximum);
    
    // $('#refresh_justgage').click(function (e) { 
    //   // e.preventDefault();
    //   just_gage.refresh(5);
    // });
  // justgage //

  });
</script>


{{-- PDCA --}}
<script>
    var dateNow = new Date();
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
            format: 'DD/MM/YYYY HH:mm',
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
            format: 'DD/MM/YYYY HH:mm',
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


    $('#plan_date').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        autoUpdateInput: false,
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        language: 'th',
        thaiyear: true,
        timePicker: true,
        timePicker24Hour: true,
        locale: {
            format: 'DD/MM/YYYY HH:mm',
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
            $('#plan_date').val(chosen_date.format('DD/MM/YYYY HH:mm'));
        }
        );
        $('#plan_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY HH:mm'));
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
            format: 'DD/MM/YYYY HH:mm',
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
            $('#do_date').val(chosen_date.format('DD/MM/YYYY HH:mm'));
        }
        );
        $('#do_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY HH:mm'));
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
            format: 'DD/MM/YYYY HH:mm',
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
            $('#check_date').val(chosen_date.format('DD/MM/YYYY HH:mm'));
        }
        );
        $('#check_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY HH:mm'));
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
            format: 'DD/MM/YYYY HH:mm',
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
            $('#action_date').val(chosen_date.format('DD/MM/YYYY HH:mm'));
        }
        );
        $('#action_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY HH:mm'));
    });

</script>

<script>
    function getDatePDCA(PDCA_id){
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ url('D-SIM/getPDCA_data') }}',
            data: {PDCA_id:PDCA_id},
            beforeSend: function(){
                // $('.ajax-loader').css("visibility", "visible");
                $('#plan_date').val('');
                $('#do_date').val('');
                $('#check_date').val('');
                $('#action_date').val('');
            },
            success: function (data) {
                
                if (data[0].plan_date != null) {  
                    $('#plan_date').val(data[0].plan_date);
                }
                if (data[0].do_date != null) {  
                    $('#do_date').val(data[0].do_date);
                }
                if (data[0].check_date != null) {  
                    $('#check_date').val(data[0].check_date);
                }
                if (data[0].action_date != null) {  
                    $('#action_date').val(data[0].action_date);
                }
                $('#id_action_modal').val(PDCA_id);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    }
</script>

<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/sweet-alert.init.js')}}"></script>
{{-- datatable --}}
<script>
    $(document).ready(function() {
        $('#pdca-table').DataTable( {
          "columnDefs": [
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
              { "width": "10%" },
            ]
        } );
    } );
</script>


<script>
  var sim_master_id = '{{ $id }}';

  $.ajax({
      type: 'GET',
      dataType: 'JSON',
      url: '{{ url('D-SIM/get_sim_info') }}',
      data: {sim_master_id:sim_master_id},
      beforeSend: function(){
      },
      success: function (data) {
        // console.log(data);
        data.data_sim_info.forEach(element => {
            $('#'+element.day_time_combine).html(element.score);
        });

        // var arr_day = [];
        // var arr_value = [];
        // data.data_sim_info_chart.forEach(element => {
        //   // console.log(element.day, element.score);
        //   arr_day.push(element.day);
        //   arr_value.push(element.score);
        // });
        // console.log(arr_day,arr_value);

        // เทรนด์ //
          // var areaChartCanvas = $("#chart_day").get(0).getContext("2d");
          var data_chart_day = {
            // labels: ["จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์","อาทิตย์"],
            labels: data.data_sim_info_chart.map(value => value.day),

            datasets:[{
              label:"My First Dataset",
              data: data.data_sim_info_chart.map(value => value.score),
              fill:false,
              borderColor:"rgb(75, 192, 192)",
              lineTension:0.1,
              borderWidth: 1,
              // data: arr_score_weight,
              // backgroundColor: arr_score_weight.map(value => { 
              //   return 'rgba(255, 99, 132, 0.2)';
              // }), // borderColor
              // fill: 'origin', // 0: fill to 'origin'
              // fill: '+2', // 1: fill to dataset 3
              // fill: 1, // 2: fill to dataset 1
              // fill: false, // 3: no fill
              // fill: '-2' // 4: fill to dataset 2
            }],
          };
          var options_chart_day = {
            /*
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    min: 0,
                    max: 5,
                    stepSize: 1,
                  },
                  gridLines: {
                    display: true
                  }
                }],

                xAxes: [{
                  ticks: {
                    beginAtZero: true,
                    minRotation: 90
                  },
                  gridLines: {
                    display: true
                  }
                }]
              },

              plugins: {
                filler: {
                  propagate: true
                }
              }
            */
          }

          var chart_day = new Chart(document.getElementById("chart_day"), {
            type: "line",
            data: data_chart_day,
            options: options_chart_day
          });
        // เทรนด์ //       
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        // alert("Status: " + textStatus); alert("Error: " + errorThrown);
        console.log(XMLHttpRequest);
      },
      complete: function(){
      },
  });
</script>
@endsection

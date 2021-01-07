@extends('layouts.master')

@section('title', 'Printer Monitor')

@section('style')
<link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">

<style>
        .tbl-paperless td {
            background-color:#ffffff;
        }
</style>
@endsection

@section('main')
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card">
            <div class="card-body">
                <div class="row font-18">
                    <div class="col-md-6">
                        <b>LINE:</b> {{$order_detail[0]->line_number}}
                    </div>

                    <div class="col-md-6">
                        <b>order:</b> {{ $order }}
                    </div>

                    <div class="col-md-12">
                        <b>Product Name:</b> {{$order_detail[0]->material_description}}
                    </div>
                </div>
                    
                <div class="row font-18">
                    <div class="col-md-6">
                        <div>
                            วันที่ผลิต :
                            {{ substr($order_detail[0]->scheduled_start,6,2).'/'.substr($order_detail[0]->scheduled_start,4,2).'/'.substr($order_detail[0]->scheduled_start,0,4) }}
                        </div>

                        <div>
                            เวลา :
                            {{ substr($order_detail[0]->scheduled_time,0,2).':'.substr($order_detail[0]->scheduled_time,2,2).':'.substr($order_detail[0]->scheduled_time,4,2) }}
                        </div>
                    </div>

                    {{-- <div class="col-md-2">
                        <i class="mdi mdi-arrow-right-bold"></i>
                    </div> --}}

                    <div class="col-md-6">
                        <div>
                            วันที่ผลิตเสร็จ :
                            {{ substr($order_detail[0]->scheduled_end,6,2).'/'.substr($order_detail[0]->scheduled_end,4,2).'/'.substr($order_detail[0]->scheduled_end,0,4) }}
                        </div>

                        <div>
                            เวลา:
                            {{ substr($order_detail[0]->scheduled_end_time,0,2).':'.substr($order_detail[0]->scheduled_end_time,2,2).':'.substr($order_detail[0]->scheduled_end_time,4,2) }}
                        </div>
                    </div>
                </div>

                {{-- <div class="row my-2 font-18">
                    <div class="col-md-12"> 
                        <button type="button" class="btn btn-lg btn-block btn-outline-success"> 
                            START
                        </button> 
                    </div>
                </div> --}}

                <div class="row font-18">
                    <div class="col-md-12">
                        วันที่ผลิตจริง :
                        {{ substr($order_detail[0]->basic_start_date,6,2).'/'.substr($order_detail[0]->basic_start_date,4,2).'/'.substr($order_detail[0]->basic_start_date,0,4) }}
                        เวลา :
                        {{ substr($order_detail[0]->basic_start_time,0,2).':'.substr($order_detail[0]->basic_start_time,2,2).':'.substr($order_detail[0]->basic_start_time,4,2) }}
                    </div>
                </div>
                            
                {{-- <div class="row font-18">
                    <div class="col-md-12">
                        @php
                            $day = ($order_detail[0]->scheduled_end - $order_detail[0]->scheduled_start ) * 24 ;
                            $hr = ($order_detail[0]->scheduled_end_time - $order_detail[0]->scheduled_time)/100;
                        @endphp

                        <h5 class="m-t-30">
                            <div class="row">
                                <label class="col-md-3 col-form-label"> เวลาเป้าหมายที่ใช้ในการผลิต : </label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="{{ $day+$hr }} ชม" readonly="">
                                </div>

                                <label class="col-md-3 col-form-label"> เวลาที่ใช้ในการผลิต : </label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="3:30:00 ชม" readonly="">
                                </div>
                            </div>
                            <span class="pull-right">85%</span>
                        </h5>

                        <div class="progress ">
                            <div class="progress-bar bg-info wow animated progress-animated"
                                style="width: 85%; height:26px;" role="progressbar"> 
                                <span class="sr-only"></span> 
                            </div>
                        </div>

                        <h5 class="m-t-30">
                            <div class="row">
                                <div class="col-md-3"> เป้าหมายยอดการผลิต : </div>
                                <div class="col-md-3">
                                    <input value="{{ $order_detail[0]->quantity_to_make }} {{ $order_detail[0]->unit_of_measure }}" class="form-control" readonly>
                                </div>

                                <div class="col-md-3"> จำนวนที่ผลิตได้ : </div>
                                <div class="col-md-3">
                                    <input type="text" value="0 {{ $order_detail[0]->unit_of_measure }}" class="form-control" readonly>
                                </div>
                            </div>
                            <span class="pull-right">90%</span>
                        </h5>

                        <div class="progress">
                            <div class="progress-bar bg-success wow animated progress-animated"
                                style="width: 90%; height:26px;" role="progressbar">
                                <span class="sr-only"></span> 
                            </div>
                        </div>
                    </div>
                </div> --}}

                
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered tbl-paperless">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                        เลือกเอกสารที่ต้องการลงบันทึกข้อมูล (Paperless)
                                    </th>
                                </tr>
                            </thead>
                            <!-- mixsing doc -->
                            <tbody style="background-color: white;">
                                <tr>
                                    <td class="text-center" style="width:45%;">
                                        <img src="{{ asset('assets/images/mixsing.jpg') }}" style="width:100%; height:200px;">
                                        <div>Mixing</div>
                                    </td>

                                    <td>
                                        @if(Auth::user()->id_type_branch == 4 || Auth::user()->id_type_branch == 3)
                                            <div class="row">
                                                {{-- <div class="col-12 text-left">
                                                    <a class="btn btn-lg btn-block {{ !empty($FM_PD_018_1) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-018-1/'.$order)}}">
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-1) </a>
                                                </div> --}}

                                                <div class="my-1 col-12 text-left">
                                                    @php $date_now = date("Y-m-d"); @endphp
                                                    @if ( isset($FM_PD_018_1[0]) ? ($date_now > substr($FM_PD_018_1[0]->created_at,0,10)) : true  ) {{-- วัน > วันล่าสุดที่บันทึก ex.2020-10-01 > 2020-10-01 ? --}}
                                                        <button class="btn btn-primary btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-1/0')}}/{{$order}}';" >
                                                            การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-1) 
                                                        </button>
                                                    @else
                                                        <button class="btn btn-success btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-1')}}/{{ $lastest_sheet_018_1 }}/{{$order}}';" >
                                                            การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-1) 
                                                        </button>
                                                    @endif
                                                </div>

                                                <div class="col-5 text-center">
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>

                                <!-- filling doc -->
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/filling.png') }}" style="width:100%; height:200px;">
                                        <div>Filling</div>
                                    </td>

                                    <td>
                                        @if(Auth::user()->id_type_branch == 1 || Auth::user()->id_type_branch == 3)
                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_044) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-044')}}/{{$order}}">
                                                    การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ 
                                                    <br>
                                                    (FM-PD-044)
                                                </a>
                                            </div>

                                            <div class="my-1">
                                                @if (!empty($FM_PD_037))
                                                    <button class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#modal_check_new_foil" >
                                                        บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง <br> (FM-PD-037)
                                                    </button>
                                                @else
                                                    <button class="btn btn-primary btn-block btn-lg" onclick="location.href='{{url('/FM-PD-037')}}/{{$order}}';" >
                                                        บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง <br> (FM-PD-037)
                                                    </button>
                                                @endif
                                            </div>

                                            {{-- <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_018_2) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-018-2/'.$order)}}">
                                                    การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-2)
                                                </a>
                                            </div> --}}
                                            
                                            <div class="my-1">
                                                @php $date_now = date("Y-m-d"); @endphp
                                                @if ( isset($FM_PD_018_2[0]) ? ($date_now > substr($FM_PD_018_2[0]->created_at,0,10)) : true  ) {{-- วัน > วันล่าสุดที่บันทึก ex.2020-10-01 > 2020-10-01 ? --}}
                                                    <button class="btn btn-primary btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-2/0')}}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-2)
                                                    </button>
                                                @else
                                                    <button class="btn btn-success btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-2')}}/{{ $lastest_sheet_018_2 }}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-2)
                                                    </button>
                                                @endif
                                            </div>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/p1.png') }}" style="width:100%; height:200px;">
                                        <div>PRINT 1</div>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" onclick="toggle_light1()" value="1" class="btn btn-danger btn-circle" id="btn1"></button>
                                        PRINT 1
                                    </td>
                                </tr>

                                <!-- packing doc1 (x-ray) -->
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/x-ray.png') }}" style="width:100%; height:200px;">
                                        <div>X-RAY</div>
                                    </td>
                                    
                                    <td>
                                        @if(Auth::user()->id_type_branch == 2 || Auth::user()->id_type_branch == 3)
                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_002) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-002')}}/{{$order}}">
                                                    การทดสอบการทำงานเครื่อง X-Ray <br> (FM-PD-002)
                                                </a>
                                            </div>

                                            {{-- <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_018_3) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-018-3/'.$order)}}">
                                                    การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)
                                                </a>
                                            </div> --}}

                                            <div class="my-1">
                                                @php $date_now = date("Y-m-d"); @endphp
                                                @if ( isset($FM_PD_018_3[0]) ? ($date_now > substr($FM_PD_018_3[0]->created_at,0,10)) : true  ) {{-- วัน > วันล่าสุดที่บันทึก ex.2020-10-01 > 2020-10-01 ? --}}
                                                    <button class="btn btn-primary btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-3/0')}}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)
                                                    </button>
                                                @else
                                                    <button class="btn btn-success btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-3')}}/{{ $lastest_sheet_018_3 }}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)
                                                    </button>
                                                @endif
                                            </div>

                                        @endif
                                    </td>
                                </tr>

                                <!-- packing doc2 (auto packing) -->
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/auto-packing.png') }}" style="width:100%; height:200px;">
                                        <div>Auto packing</div>
                                    </td>
                                    
                                    <td>
                                        @if(Auth::user()->id_type_branch == 3 || Auth::user()->id_type_branch == 2)
                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_034) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-034')}}/{{$order}}">
                                                    แบบฟอร์มการบันทึกการตรวจสอบ Unit Carton/Special Box
                                                    <br>
                                                    (FM-PD-034)
                                                </a>
                                            </div>

                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_131) ? 'btn-success' : 'btn-primary' }}"  href="{{url('/FM-PD-131')}}/{{$order}}">
                                                    การทดสอบกล้องตรวจสอบช้อน
                                                    (Scoop Camera) สำหรับ Auto Packing Line 
                                                    <br>
                                                    (FM-PD-131)
                                                </a>
                                            </div>

                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_130) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-130')}}/{{$order}}">
                                                    การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop) 
                                                    <br>
                                                    (FM-PD-130)
                                                </a>
                                            </div>

                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_024) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-024')}}/{{$order}}">
                                                    Verification Oprps And Ccps For Release Product Record
                                                    <br>
                                                    (FM-PD-024)
                                                </a>
                                            </div>
                                            
                                            
                                            <div class="my-1">
                                                @php $date_now = date("Y-m-d"); @endphp
                                                @if ( isset($FM_PD_018_3[0]) ? ($date_now > substr($FM_PD_018_3[0]->created_at,0,10)) : true  ) {{-- วัน > วันล่าสุดที่บันทึก ex.2020-10-01 > 2020-10-01 ? --}}
                                                    <button class="btn btn-primary btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-3/0')}}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)
                                                    </button>
                                                @else
                                                    <button class="btn btn-success btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-3')}}/{{ $lastest_sheet_018_3 }}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)
                                                    </button>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/p2.png') }}" style="width:100%; height:200px;">
                                        <div>PRINT 2</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <button type="button" onclick="toggle_light2()" value="1" class="btn btn-danger btn-circle" id="btn2"></button>
                                        PRINT 2
                                    </td>
                                </tr>

                                <!-- packing doc (box packing) -->
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/box-packing.png') }}" style="width:100%; height:200px;">
                                        <div>Box packing</div>
                                    </td>

                                    <td>
                                        @if(Auth::user()->id_type_branch == 5 || Auth::user()->id_type_branch == 3 || Auth::user()->id_type_branch == 2)
                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_002) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-002')}}/{{$order}}">
                                                    การทดสอบการทำงานเครื่อง X-Ray <br> (FM-PD-002)
                                                </a>
                                            </div>

                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_014) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-014')}}/{{$order}}">
                                                    การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code) <br> (FM-PD-014)
                                                </a>
                                            </div>

                                         
                                            <div class="my-1">
                                                @php $date_now = date("Y-m-d"); @endphp
                                                @if ( isset($FM_PD_018_3[0]) ? ($date_now > substr($FM_PD_018_3[0]->created_at,0,10)) : true  ) {{-- วัน > วันล่าสุดที่บันทึก ex.2020-10-01 > 2020-10-01 ? --}}
                                                    <button class="btn btn-primary btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-3/0')}}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)
                                                    </button>
                                                @else
                                                    <button class="btn btn-success btn-block btn-lg" onclick="location.href='{{url('/FM-PD-018-3')}}/{{ $lastest_sheet_018_3 }}/{{$order}}';" >
                                                        การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)
                                                    </button>
                                                @endif
                                            </div>

                                            <div class="my-1">
                                                <a class="btn btn-block btn-lg {{ !empty($FM_PD_004) ? 'btn-success' : 'btn-primary' }}" href="{{url('/FM-PD-004')}}/{{$order}}">
                                                    การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader) 
                                                    <br>
                                                    (FM-PD-004)
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/p3.png') }}" style="width:100%; height:200px;">
                                        <div>PRINT 3</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <button type="button" onclick="toggle_light3()" value="1" class="btn btn-danger btn-circle" id="btn3"> </button>
                                        PRINT 3
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal เลือกเอกสารเก่า หรือใหม่-->
<div class="modal fade" id="modal_check_new_foil" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"
    aria-labelledby="vcenter">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="">เอกสารบันทึกฟอยล์สำหรับบรรจุนมชนิดซอง <br>(FM-PD-037)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="{{url('/FM-PD-037-lastest')}}/{{ $sheet_number }}/{{$order}}"> <button type="button" class="btn waves-effect waves-light btn-warning" style="margin-right: 50px;" {{ $disabled_btn }}> ฟอยล์ม้วนเดิม </button> </a>
                <a href="{{url('/FM-PD-037/'.$order)}}"> <button type="button" class="btn waves-effect waves-light btn-success"> ฟอยล์ม้วนใหม่ </button> </a>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="modal_check_new_018" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"
    aria-labelledby="vcenter">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class=""> การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-1) </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="{{url('/FM-PD-018-1-lastest')}}/{{ $sheet_number018_1 }}/{{$order}}"> <button type="button" class="btn waves-effect waves-light btn-warning" style="margin-right: 50px;" {{ $disabled_btn }}> เอกสารชุดเดิม </button> </a>
                <a href="{{url('/FM-PD-018-1/0')}}/{{$order}}"> <button type="button" class="btn waves-effect waves-light btn-success"> สร้างเอกสารชุดใหม่ <br> (กรณีใช้เวลาผลิตเกินเที่ยงคืน) </button> </a>
            </div>
        </div>
    </div>
</div> --}}





@endsection

@section('script')
{{-- <script src="{{ asset('dist/js/waves.js') }}"></script> --}}
<script src="{{ asset('assets/node_modules/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery.easy-pie-chart/easy-pie-chart.init.js') }}"></script>

<script>
    @if(\Session::has('save-success'))
      alert(`{{ Session::get('save-success') }}`);
    @endif 
     
    function toggle_light1(){
        // alert(values);
        // var ids =  $(this).val();
        if ($('#btn1').hasClass('btn-danger')) {
                $('#btn1').removeClass('btn-danger').addClass('btn-success');
        } else {
                $('#btn1').removeClass('btn-success').addClass('btn-danger');
        }
    }
    function toggle_light2(){
        // alert(values);
        // var ids =  $(this).val();
        if ($('#btn2').hasClass('btn-danger')) {
                $('#btn2').removeClass('btn-danger').addClass('btn-success');
        } else {
                $('#btn2').removeClass('btn-success').addClass('btn-danger');
        }
    }
    function toggle_light3(){
        // alert(values);
        // var ids =  $(this).val();
        if ($('#btn3').hasClass('btn-danger')) {
                $('#btn3').removeClass('btn-danger').addClass('btn-success');
        } else {
                $('#btn3').removeClass('btn-success').addClass('btn-danger');
        }
    }
</script>
@endsection
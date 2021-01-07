@extends('layouts.master')

@section('title', 'Line')

@section('style')
<link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/progressbar-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">
@endsection

@section('main')
{{-- <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Line</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">D-Link</a></li>
                <li class="breadcrumb-item active">Line</li>
            </ol>
        </div>
    </div>
</div> --}}
<div class="card">
    {{-- <div class="card-header">PRINTER MONITOR</div> --}}
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xlg-12 col-xs-12">
                <div class="ribbon-wrapper card card-header">
                    <div class="row" style="font-size: 18px">
                        <div class="col-lg-6">
                            <b>LINE:</b> {{$order_detail[0]->line_number}}
                        </div>
                        <div class="col-lg-6">
                           <b>order:</b> {{ $order }}
                        </div>
                        <div class="col-lg-12">
                           <b>Product Name:</b> {{$order_detail[0]->material_description}}
                        </div>
                    </div>
                    <br>
                    <div class="ribbon-content row" style="font-size: 18px">
                        <div class="col-4">
                            วันที่ผลิต :
                            {{ substr($order_detail[0]->scheduled_start,6,2).'/'.substr($order_detail[0]->scheduled_start,4,2).'/'.substr($order_detail[0]->scheduled_start,0,4) }}
                            เวลา :
                            {{ substr($order_detail[0]->scheduled_time,0,2).':'.substr($order_detail[0]->scheduled_time,2,2).':'.substr($order_detail[0]->scheduled_time,4,2) }}
                        </div>
                        <div class="col-1">
                            <i class="mdi mdi-arrow-right-bold"></i>
                        </div>
                        <div class="col-4">
                            วันที่ผลิตเสร็จ :
                            {{ substr($order_detail[0]->scheduled_end,6,2).'/'.substr($order_detail[0]->scheduled_end,4,2).'/'.substr($order_detail[0]->scheduled_end,0,4) }}
                            เวลา:
                            {{ substr($order_detail[0]->scheduled_end_time,0,2).':'.substr($order_detail[0]->scheduled_end_time,2,2).':'.substr($order_detail[0]->scheduled_end_time,4,2) }}
                        </div>
                        <div lass="col-3 text-right"> <button type="button"
                                class="btn waves-effect waves-light btn-outline-success"> START </button> </div>

                    </div>

                    <div class="ribbon-content row" style="font-size: 18px">
                        <div class="col-4">
                            วันที่ผลิตจริง :
                            {{ substr($order_detail[0]->basic_start_date,6,2).'/'.substr($order_detail[0]->basic_start_date,4,2).'/'.substr($order_detail[0]->basic_start_date,0,4) }}
                            เวลา :
                            {{ substr($order_detail[0]->basic_start_time,0,2).':'.substr($order_detail[0]->basic_start_time,2,2).':'.substr($order_detail[0]->basic_start_time,4,2) }}

                        </div>
                        {{-- <div class="col-1">
                            <i class="mdi mdi-arrow-right-bold"></i>
                        </div> --}}
                        {{-- <div class="col-4">
                            วันที่ผลิตเสร็จจริง :
                            เวลา :
                        </div> --}}
                    </div>

                    @php
                    $day = ($order_detail[0]->scheduled_end - $order_detail[0]->scheduled_start ) * 24 ;
                    $hr = ($order_detail[0]->scheduled_end_time - $order_detail[0]->scheduled_time)/100;
                    @endphp

                    <h5 class="m-t-30">
                        <div class="row">
                            <div class="col-2"> เวลาเป้าหมายที่ใช้ในการผลิต : </div>
                            <div class="col-3"><input class="form-control" type="text" value="{{ $day+$hr }} ชม"
                                    readonly=""></div>
                            <div class="col-2"> เวลาที่ใช้ในการผลิต : </div>
                            <div class="col-3"><input class="form-control" type="text" value="3:30:00 ชม" readonly="">
                            </div>

                        </div><span class="pull-right">85%</span>
                    </h5>
                    <div class="progress ">
                        <div class="progress-bar bg-info wow animated progress-animated"
                            style="width: 85%; height:26px;" role="progressbar"> <span class="sr-only"></span> </div>
                    </div>

                    <h5 class="m-t-30">
                        <div class="row">
                            <div class="col-2"> เป้าหมายยอดการผลิต : </div>
                            <div class="col-3"><input class="form-control" type="text"
                                    value="{{ $order_detail[0]->quantity_to_make }}  {{ $order_detail[0]->unit_of_measure }}"
                                    readonly=""></div>
                            <div class="col-2"> จำนวนที่ผลิตได้ : </div>
                            <div class="col-3"><input class="form-control" type="text"
                                    value="0 {{ $order_detail[0]->unit_of_measure }}" readonly=""></div>
                        </div><span class="pull-right">90%</span>
                    </h5>
                    <div class="progress">
                        <div class="progress-bar bg-success wow animated progress-animated"
                            style="width: 90%; height:26px;" role="progressbar"> <span class="sr-only"></span> </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 ">
                <div class="chart easy-pie-chart-2" data-percent="75">
                    <span class="percent">75</span>
                    <canvas height="100" width="100"></canvas>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-12 " style="overflow-x: auto;">
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Mixsing</th>
                            <th class="text-center">Filling</th>
                            <th class="text-center" width="10%">
                                <button type="button" onclick="toggle_light1()" value="1"
                                    class="btn btn-danger btn-circle" id="btn1"> </button>
                                PRINT 1
                            </th>
                            <th class="text-center">X-RAY</th>
                            <th class="text-center">Auto packing</th>
                            <th class="text-center" width="10%">
                                <button type="button" onclick="toggle_light2()" value="1"
                                    class="btn btn-danger btn-circle" id="btn2"> </button>
                                PRINT 2
                            </th>
                            <th class="text-center">Box packing</th>
                            <th class="text-center">
                                <button type="button" onclick="toggle_light3()" value="1"
                                    class="btn btn-danger btn-circle" id="btn3"> </button>
                                PRINT 3
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="text-center">
                                    <img src="../assets/images/mixsing.jpg" width="175px" height="auto"
                                        alt="factory image">
                                    Mixsing
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <img src="../assets/images/filling.png" width="175px" height="auto"
                                        alt="factory image">
                                    Filling
                                </div>
                            </td>
                            <td>
                                <div class=" text-center">
                                    <br><img src="../assets/images/p1.png" width="30%" height="auto"
                                        alt="factory image"><br>
                                    PRINT 1
                                </div>
                            </td>
                            <td>
                                <div class=" text-center">
                                    <img src="../assets/images/x-ray.png" width="175px" height="auto"
                                        alt="factory image">
                                    X-RAY
                                </div>
                            </td>
                            <td>
                                <div class=" text-center">
                                    <img src="../assets/images/auto-packing.png" width="175px" height="auto"
                                        alt="factory image">
                                    Auto packing
                                </div>
                            </td>
                            <td>
                                <div class=" text-center">
                                    <br><img src="../assets/images/p2.png" width="30%" height="auto"
                                        alt="factory image"><br>
                                    PRINT 2
                                </div>
                            </td>
                            <td>
                                <div class=" text-center">
                                    <img src="../assets/images/box-packing.png" width="175px" height="auto"
                                        alt="factory image">
                                    Box packing
                                </div>
                            </td>
                            <td>

                                <div class=" text-center">
                                    <br><img src="../assets/images/p3.png" width="30%" height="auto"
                                        alt="factory image"><br>
                                    PRINT 3
                                </div>
                            </td>
                        </tr>

                        <tr style="font-size: 13px;">
                            <td>
                                @if(Auth::user()->id_type_branch == 1 || Auth::user()->id_type_branch == 3)
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_018_1) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-018-1/'.$order)}}">
                                            การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-1)</a>
                                    </div>
                                    <div class="col-5 text-center">
                                    </div>
                                </div>
                                @endif
                            </td>

                            <td>
                                @if(Auth::user()->id_type_branch == 1 || Auth::user()->id_type_branch == 3)
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_044) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-044')}}/{{$order}}">
                                            การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ <br>
                                            (FM-PD-044)</a>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">

                                        @if (!empty($FM_PD_037))
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_check_new_foil" >
                                            บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง <br> (FM-PD-037)
                                            </button>
                                        @else
                                            <button class="btn btn-primary btn-sm" onclick="location.href='{{url('/FM-PD-037')}}/{{$order}}';" >
                                            บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง <br> (FM-PD-037)
                                            </button>
                                        @endif

                               
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_018_2) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-018-2/'.$order)}}">
                                            การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-2)</a>
                                    </div>
                                    
                                </div>
                                @endif
                            </td>

                            <td></td>

                            <td>
                                @if(Auth::user()->id_type_branch == 2 || Auth::user()->id_type_branch == 3)
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_002) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-002')}}/{{$order}}">
                                            การทดสอบการทำงานเครื่อง X-Ray <br> (FM-PD-002)</a>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_018_3) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-018-3/'.$order)}}">
                                            การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)</a>
                                    </div>
                                </div>
                                @endif
                            </td>
                            
                            <td>
                                @if(Auth::user()->id_type_branch == 4 || Auth::user()->id_type_branch == 3 ||
                                Auth::user()->id_type_branch == 2)
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_034) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-034')}}/{{$order}}">
                                        แบบฟอร์มการบันทึกการตรวจสอบ Unit Carton/Spacial Box <br> (FM-PD-034)</a>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <button class="btn {{ !empty($FM_PD_131) ? 'btn-success' : 'btn-primary' }} btn-sm"  onclick="location.href='{{url('/FM-PD-131')}}/{{$order}}';">
                                            การทดสอบกล้องตรวจสอบช้อน
                                            (Scoop Camera) สำหรับ Auto Packing Line <br> (FM-PD-131)
                                            
                                        </button>
                                       
                                    </div>
                                   
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_130) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-130')}}/{{$order}}">
                                            การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop) <br> (FM-PD-130)</a>
                      
                                    </div>
       
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_024) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-024')}}/{{$order}}">
                                            Verification Oprps And Ccps For Release Product Record <br>
                                            (FM-PD-024)</a>
                                 
                                    </div>
                                  
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_018_3) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-018-3')}}/{{$order}}">
                                            การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)</a>
                 
                                    </div>
                                  
                                </div>
                                @endif
                            </td>
                            <td>
                                {{-- <div class=" text-center">
                                    <br><img src="../assets/images/p2.png" width="30%" height="auto" alt="factory image"><br>
                                    PRINT 2
                                </div> --}}
                            </td>
                            <td>
                                @if(Auth::user()->id_type_branch == 5 || Auth::user()->id_type_branch == 3 ||
                                Auth::user()->id_type_branch == 2)
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_002) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-002')}}/{{$order}}">
                                            การทดสอบการทำงานเครื่อง X-Ray <br> (FM-PD-002)</a>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <button class="btn {{ !empty($FM_PD_014) ? 'btn-success' : 'btn-primary' }} btn-sm"
                                                onclick="location.href='{{url('/FM-PD-014')}}/{{$order}}';">
                                            การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code) <br> (FM-PD-014)
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_018_3) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-018-3')}}/{{$order}}">
                                            การตรวจสอบความถูกต้องของการผลิต <br> (FM-PD-018-3)</a>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-12 text-left">
                                        <a class="btn {{ !empty($FM_PD_004) ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{url('/FM-PD-004')}}/{{$order}}">
                                            การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader) <br>
                                            (FM-PD-004)</a>
                                    </div>
                                </div>
                                @endif
                            </td>
                            <td>

                                {{-- <div class=" text-center">
                                    <br><img src="../assets/images/p3.png" width="30%" height="auto" alt="factory image"><br>
                                    PRINT 3
                                </div> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>


<!-- Modal ลายเซ็น operator-->
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
                <a href="#"> <button type="button" class="btn waves-effect waves-light btn-warning" style="margin-right: 50px;" {{ $disabled_btn }}> ฟอยล์ม้วนเดิม </button> </a>
                <a href="{{url('/FM-PD-037')}}/{{$order}}"> <button type="button" class="btn waves-effect waves-light btn-success"> ฟอยล์ม้วนใหม่ </button> </a>
            </div>
        </div>
    </div>
</div>

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
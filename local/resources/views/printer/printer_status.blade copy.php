@extends('layouts.master')

@section('title', 'Line')

@section('style')
<link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/progressbar-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">
@endsection

@section('main')
<div class="row page-titles">
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
</div>
<div class="card">
    {{-- <div class="card-header">PRINTER MONITOR</div> --}}
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xlg-12 col-xs-12">
                <div class="ribbon-wrapper card card-header">
                    <div class="ribbon ribbon-success" style="font-size: 18px">LINE 1 : <b> DUPRO 600G
                            &nbsp;&nbsp;&nbsp; <span style="color: #000000"> order : {{ $order }} </span> </b></div>
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
                        <div class="col-1">
                            <i class="mdi mdi-arrow-right-bold"></i>
                        </div>
                        <div class="col-4">
                            วันที่ผลิตเสร็จจริง :
                            เวลา :
                        </div>
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
            <div class="col-12 table-responsive">
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" width="15%">Mixsing</th>
                            <th class="text-center" width="15%">Filling</th>
                            <th class="text-center" width="10%">
                                <button type="button" onclick="toggle_light1()" value="1"
                                    class="btn btn-danger btn-circle" id="btn1"> </button>
                                PRINT 1
                            </th>
                            <th class="text-center" width="15%">X-RAY</th>
                            <th class="text-center" width="20%">Auto packing</th>
                            <th class="text-center" width="10%">
                                <button type="button" onclick="toggle_light2()" value="1"
                                    class="btn btn-danger btn-circle" id="btn2"> </button>
                                PRINT 2
                            </th>
                            <th class="text-center" width="15%">Box packing</th>
                            <th class="text-center" width="10%">
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
                                    <img src="../assets/images/mixsing.jpg" width="100%" height="auto"
                                        alt="factory image">
                                    Mixsing
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <img src="../assets/images/filling.png" width="100%" height="auto"
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
                                    <img src="../assets/images/x-ray.png" width="100%" height="auto"
                                        alt="factory image">
                                    X-RAY
                                </div>
                            </td>
                            <td>
                                <div class=" text-center">
                                    <img src="../assets/images/auto-packing.png" width="100%" height="auto"
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
                                    <img src="../assets/images/box-packing.png" width="100%" height="auto"
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
                                {{-- <div class="text-center">
                                    <img src="../assets/images/filling.png" width="100%" height="auto" alt="factory image">
                                    Filling
                                </div> --}}
                                <div class="row">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-018-1')}}">FM-PD-018-1</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-018-1_status']) }}
                                            @if ($FM_PD_018_1[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_018_1[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_018_1[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_018_1[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                @endif
                            </td>

                            <td>
                                @if(Auth::user()->id_type_branch == 2 || Auth::user()->id_type_branch == 3)
                                <div class="row">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-132')}}">FM-PD-132</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-132_status']) }}
                                            @if ($FM_PD_132[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_132[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_132[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_132[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-044')}}">FM-PD-044</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-044_status']) }}
                                            @if ($FM_PD_044[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_044[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_044[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_044[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-037')}}">FM-PD-037</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-037_status']) }}
                                            @if ($FM_PD_037[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_037[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_037[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_037[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-018-2')}}">FM-PD-018-2</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-018-2_status']) }}
                                            @if ($FM_PD_018_2[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_018_2[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_018_2[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_018_2[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                @endif
                            </td>
                            <td>
                            </td>
                            <td>
                                @if(Auth::user()->id_type_branch == 3 || Auth::user()->id_type_branch == 3)
                                <div class="row">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-002')}}">FM-PD-002</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-002_status']) }}
                                            @if ($FM_PD_002[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_002[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_002[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_002[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-132')}}">FM-PD-132</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-132_status']) }}
                                            @if ($FM_PD_132[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_132[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_132[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_132[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-018-3')}}">FM-PD-018-3</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-018-3_status']) }}
                                            @if ($FM_PD_018_3[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_018_3[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_018_3[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_018_3[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                @endif
                            </td>
                            <td>
                                @if(Auth::user()->id_type_branch == 4 || Auth::user()->id_type_branch == 3)
                                <div class="row">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-034')}}">FM-PD-034</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-034_status']) }}
                                            @if ($FM_PD_034[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_034[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_034[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_034[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-131')}}">FM-PD-131</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-131_status']) }}
                                            @if ($FM_PD_131[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_131[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_131[0]->Product_Order_Line}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_131[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-130')}}">FM-PD-130</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-130_status']) }}
                                            @if ($FM_PD_130[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_130[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_130[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_130[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-024')}}">FM-PD-024</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-024_status']) }}
                                            @if ($FM_PD_024[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_024[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_024[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_024[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-018-3')}}">FM-PD-018-3</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-018-3_status']) }}
                                            @if ($FM_PD_018_3[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_018_3[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_018_3[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_018_3[0]->status}}" hidden>
                                        {{ Form::close() }}
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
                                @if(Auth::user()->id_type_branch == 5 || Auth::user()->id_type_branch == 3)
                                <div class="row">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-002')}}">FM-PD-002</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-002_status']) }}
                                            @if ($FM_PD_002[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_002[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_002[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_002[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-014')}}">FM-PD-014</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-014_status']) }}
                                            @if ($FM_PD_014[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_014[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_014[0]->Product_Order_Line}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_014[0]->status}}" hidden>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-8 text-left">
                                        <a href="{{url('/FM-PD-018-3')}}">FM-PD-018-3</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        {{ Form::open(['method' => 'get' , 'url' => 'FM-PD-018-3_status']) }}
                                            @if ($FM_PD_018_3[0]->status == NULL)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-success" style="padding: initial;font-size: 12px;"> START </button>
                                            @endif
                                            @if ($FM_PD_018_3[0]->status == 1)
                                                <button type="submit" class="btn waves-effect waves-light btn-outline-danger" style="padding: inherit;font-size: 12px;"> ปิด </button>
                                            @endif
                                            <input type="text" name="production_order" value="{{$FM_PD_018_3[0]->production_order}}" hidden>
                                            <input type="text" name="status" value="{{$FM_PD_018_3[0]->status}}" hidden>
                                        {{ Form::close() }}
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
@endsection

@section('script')
{{-- <script src="{{ asset('dist/js/waves.js') }}"></script> --}}
<script src="{{ asset('assets/node_modules/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery.easy-pie-chart/easy-pie-chart.init.js') }}"></script>

<script>
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

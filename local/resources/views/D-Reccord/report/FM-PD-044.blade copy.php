@extends('layouts.master')

@section('title', 'FM-PD-044')

@section('style')

<link rel="stylesheet" href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">
<style>
    /* check box custom*/
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 18px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        /* position: absolute; */
        opacity: 0;
        /* cursor: pointer;
            height: 0;
            width: 0; */
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 30px;
        width: 30px;
        background-color: rgb(255, 255, 255);
        border: 3px solid #1e5180;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 8px;
        height: 15px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    /* check box custom*/
</style>

<link href="{{ asset('assets/dist/css/pages/form-icheck.css')}}" rel="stylesheet">
@endsection

@section('main')
<br>
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-044/update/'. $production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">
    <div class="card border-info">
        <div class="card-header bg-info">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-12">
                    <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-044 Rev.03
                        การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ</h3>
                </div>
            </div>
        </div>
        @foreach ($head as $item)
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <label> Date: &nbsp;&nbsp; {{ date_format(now(),"Y-m-d") }}</label>
                    <input class="form-control" type="hidden" id="date" name="date"
                        value="{{ date_format(now(),"Y-m-d") }}">
                </div>
                <div class="col-lg-8">
                    <label>PRODUCT NAME: {{$item->material_description}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $item->production_order }}</label>
                </div>
                <div class="col-lg-8">
                    <label>BATCH: &nbsp;&nbsp; {{ $item->batch }}</label>
                    <input type="hidden" name="batch">
                </div>
            </div>
        </div>
        @endforeach
    </div>
<<<<<<< HEAD
    <div class="table-responsive">
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th rowspan="2" width="20%" style="background-color:#e9ebeb;vertical-align:middle;"
                        class="text-center align-middle ">
                        เลขที่บาร์โค้ด<br>(Barcode no.)
                    </th>
                    <th rowspan="2" width="20%" style="background-color:#e9ebeb;vertical-align:middle;" 
                        class="text-center align-middle ">
                        ทดสอบความถี่ของ<br>(Frequency)
                    </th>
                    <th rowspan="2" width="10%" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                        class="text-center align-middle ">
                        เวลาทดสอบ<br>(Time)
                    </th>
                    <th rowspan="2" width="10%" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                        class="text-center align-middle ">
                        ชนิดของแผ่นทดสอบ<br>(Test Case)
                    </th>
                    <th rowspan="2" width="10%" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                        class="text-center align-middle ">
                        ครั้งที่
                    </th>
                    <th colspan="2" width="10%" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                        class="text-center align-middle ">
                        ผลการทดสอบ
                    </th>
                    <th rowspan="2" width="10%" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                        class="text-center align-middle ">
                        หมายเหตุ
                    </th>
                    <td rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                        class="text-center" width="22%">
                        ผู้ทดสอบและลงบันทึก<br>โดย Barcode Operator
                    </td>
                </tr>
                <tr>
                    <th style="background-color:#e9ebeb;vertical-align:middle;font-size:14px;"
                        class="text-center align-middle ">Reject
                    </th>
                    <th style="background-color:#e9ebeb;vertical-align:middle;font-size:14px;"
                        class="text-center align-middle ">No Rej.
                    </th>
                </tr>
            </thead>
            <tbody>
                
            @foreach ($FM_PD_044 as $key=>$item)
                <tr>
                    <td rowspan="6" width="20%">
                        <input type="file" id="input-file-now" class="dropify" name="Barcode_No[{{$key}}]"
                            data-default-file="{{ !empty($item->Barcode_No) ? asset('assets/FM-PD-044/'.$item->Barcode_No) : null }}" />
                    </td>
                    
                    <td rowspan="6"  class="align-middle" width="20%" style="background-color:white;">
                        
                        <div class="col-12">
                            <div class="input-group">
                                <label class="container" >ก่อนเริ่มงานแต่ละกะ
                                    <input class="custom-control-input" type="checkbox"  name="Frequency[{{$key}}]" id="Frequency1[{{$key}}]"
                                        value="ก่อนเริ่มงานแต่ละกะ" {{ (!empty($item->frequency) && $item->frequency == 'ก่อนเริ่มงานแต่ละกะ') ? 'checked' : null }} >
                                        <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <label class="container">เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์
                                    <input class="custom-control-input" type="checkbox"  name="Frequency[{{$key}}]" id="Frequency2[{{$key}}]"
                                        value="เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์"  {{ (!empty($item->frequency) && $item->frequency == 'เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์') ? 'checked' : null }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <label class="container" >เปลี่ยนขนาดของผลิตภัณฑ์
                                    <input class="custom-control-input" type="checkbox"  name="Frequency[{{$key}}]" id="Frequency3[{{$key}}]"
                                        value="เปลี่ยนขนาดของผลิตภัณฑ์" {{ (!empty($item->frequency) && $item->frequency == 'เปลี่ยนขนาดของผลิตภัณฑ์') ? 'checked' : null }} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                    </td>

                    <td rowspan="6" style="background-color:#white;vertical-align:middle;"
                        class="text-center align-middle ">
                        {{ $item->time }}
                    </td>
                    <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;"
                        class="text-center align-middle ">Barcode ผิด
                    </td>
                    <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center align-middle ">1</td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="Wrong_Barcode_Result_1[{{$key}}]" value="Reject"
                                {{ (!empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="Wrong_Barcode_Result_1[{{$key}}]" value="No_Reject"
                                {{ (!empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'No_Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;"
                        class="text-center align-middle ">
                        <textarea class="form-control" rows="8"
                            name="Wrong_Barcode_Note[{{$key}}]">{{ !empty($item->Wrong_Barcode_Note) ? $item->Wrong_Barcode_Note : null }}</textarea>
                    </td>

                    
                    <td rowspan="6" style="background-color:#eafafa;vertical-align:middle;" class="text-center">
                        @if(!empty($item->sign_operator))
                        <img src="{{ asset('/assets/images/sign/'.$item->sign_operator) }}" width="145">
                        @endif
                        {{-- <label for="">( {{  }} )</label> --}}
                    </td>


                </tr>
                <tr>
                    <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center align-middle ">2</td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="Wrong_Barcode_Result_2[{{$key}}]" value="Reject"
                                {{ (!empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="Wrong_Barcode_Result_2[{{$key}}]" value="No_Reject"
                                {{ (!empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'No_Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center align-middle ">3</td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="Wrong_Barcode_Result_3[{{$key}}]" value="Reject"
                                {{ (!empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="Wrong_Barcode_Result_3[{{$key}}]" value="No_Reject"
                                {{ (!empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'No_Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;"
                        class="text-center align-middle ">Barcode
                        ไม่มี</td>
                    <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center align-middle ">1</td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="No_Barcode_Result_1[{{$key}}]" value="Reject"
                                {{ (!empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="No_Barcode_Result_1[{{$key}}]" value="No_Reject"
                                {{ (!empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'No_Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;"
                        class="text-center align-middle ">
                        <textarea class="form-control" rows="8"
                            name="No_Barcode_Note[{{$key}}]">{{!empty($item->No_Barcode_Note) ? $item->No_Barcode_Note : null}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center align-middle ">2</td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="No_Barcode_Result_2[{{$key}}]" value="Reject"
                                {{ (!empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="No_Barcode_Result_2[{{$key}}]" value="No_Reject"
                                {{ (!empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'No_Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center align-middle ">3</td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="No_Barcode_Result_3[{{$key}}]" value="Reject"
                                {{ (!empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td style="background-color:#e9ebeb;" class="text-center align-middle">
                        <label class="container">
                            <input type="checkbox" onchange="CheckOnlyOne(this)" name="No_Barcode_Result_3[{{$key}}]" value="No_Reject"
                                {{ (!empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'No_Reject') ? 'checked' : null }}>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered table-striped ">
            <tr>
                <td colspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="16%">
                    ทวนสอบโดย<br>Leader/Supervisor
                </td>


                <td colspan="4" style="background-color:#eafafa;vertical-align:middle;" class="text-center">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="font-weight-bold">บันทึกโดย</h3>

                            <span id="sign_leader" class="d-none"></span>
                            @if(!empty($item->sign_leader))
                                <img src="{{ asset('/assets/images/sign/'.$item->sign_leader) }}" width="145">
                            @else
                                <button type="button" id="btn_sign_leader" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_leader_modal" data-input="sign_leader"
                                    {{ (Auth::user()->id_type_user != 3 || !empty($item->sign_leader)) ? 'disabled' : null }}> 
                                <i class="fas fa-signature"></i> ลายเซ็น
                                </button>
                            @endif
                            <input type="hidden" name="txt_sign_leader" id="txt_sign_leader" value="0">
                            <input type="hidden" name="Wrong_Barcode_Leader" id="Wrong_Barcode_Leader" value="{{ !empty($item->Wrong_Barcode_Leader) ? $item->Wrong_Barcode_Leader :  null }}">
                
                            <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                        </div>
                    </div>
                </td>
                
            </tr>
        </table>
    </div>

    <div class="row mt-4 text-center">
        <div class="col-lg-6 col-md-6">
            <button id="btn-save" class="btn btn-lg btn-block btn-success" onclick="return confirm('sss');">
                <i class="fa fa-save"></i> บันทึก
            </button>
        </div>

        <div class="col-lg-6 col-md-6">
            <button type="reset" class="btn btn-lg btn-block btn-danger">
                <i class="fa fa-times"></i> ยกเลิก
            </button>
        </div>
    </div>

    <div class="row text-center mt-4">
        <div class="col-lg-12 col-md-12">
            <button type="button" class="btn btn-lg btn-block btn-info" onclick="window.location.href='{{ url('report/'.$order) }}'">
                <i class="fa fa-undo"></i> ย้อนกลับ
            </button>
        </div>
    </div>
    <br>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#8e9090;color: white;" width="75%">
                    วิธีการทดสอบการทำงานของเครื่องอ่านบาร์โค้ด
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                    &nbsp;&nbsp;1. ติดแผ่นทดสอบบนฟอล์ย เพื่อให้แผ่นทดสอบผ่านเครื่องอ่านบาร์โค้ด<br>
                    &nbsp;&nbsp;2. แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#8e9090;color: white;" width="75%">
                    ความถี่ในการทดสอบ
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                    &nbsp;&nbsp;1. ก่อนเริ่มงานแต่ละกะ<br>
                    &nbsp;&nbsp;2. ทุกครั้งที่เปลี่ยนผลิตภัณฑ์<br>
                    &nbsp;&nbsp;3. ทุกครั้งที่เปลี่ยนขนาดผลิตภัณฑ์</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#8e9090;color: white;" width="75%">
                    การแก้ไข
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                    &nbsp;&nbsp;สิ่งที่ต้องทำทันที<br>
                    &nbsp;&nbsp;- หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คของผลิตภัณฑ์ที่ไม่มีบาร์โค้ดได้ครบทั้ง 3
                    ครั้ง<br>&nbsp;&nbsp;แสดงว่าเครื่องทำงานไม่ปกติ <br>
                    &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader) <br>
                    &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน (block)
                    <br>
                    &nbsp;&nbsp;- หากพบว่าเครื่องรีเจคซองผลิตภัณฑ์ที่บาร์โค้ดผิดหรือยาร์โค้ดไม่มี<br>
                    &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader) <br>
                    &nbsp;&nbsp;2. Operator
                    เคลียร์และตรวจสอบผลิตภัณฑ์ที่อยู่บนสายพานออกให้หมด<br>&nbsp;&nbsp;หากพบว่าฟอล์ยที่ใช้ไม่เป็นไปตามข้อกำหนดให้เปลี่ยนฟอล์ยม้วนใหม่ทันที่
                    <br><br>
                    &nbsp;&nbsp;จากนั้นปฏิบัติตามใน HACCP Action Plan
                </td>
            </tr>
        </tbody>
    </table>
=======

    @foreach ($FM_PD_044 as $index=>$item)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    เลขที่บาร์โค้ด (Barcode no.)
                                    <h3>({{ ($index+1) }})</h3>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="file" class="dropify" name="Barcode_No[{{$index}}]" data-height="200"
                                        data-default-file="{{ !empty($item->Barcode_No) ? asset('/assets/FM-PD-044/'. $item->Barcode_No) : null }}" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    ทดสอบความถี่ของ (Frequency)
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <label class="container">
                                        ก่อนเริ่มงานแต่ละกะ
                                        <input type="checkbox" name="frequency[{{$index}}][]"
                                            value="ก่อนเริ่มงานแต่ละกะ"
                                            {{ !empty($frequency[0][$index]) ? $frequency[0][$index] : null }}>
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">
                                        เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์
                                        <input type="checkbox" name="frequency[{{$index}}][]"
                                            value="เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์"
                                            {{ !empty($frequency[1][$index]) ? $frequency[1][$index] : null }}>
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">
                                        เปลี่ยนขนาดของผลิตภัณฑ์
                                        <input type="checkbox" name="frequency[{{$index}}][]"
                                            value="เปลี่ยนขนาดของผลิตภัณฑ์"
                                            {{ !empty($frequency[2][$index]) ? $frequency[2][$index] : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2" width="14%">
                                    เวลาทดสอบ<br>(Time)
                                </th>
                                <th rowspan="2" width="14%">
                                    ชนิดของแผ่นทดสอบ<br>(Test Case)
                                </th>
                                <th rowspan="2" width="14%">
                                    ครั้งที่
                                </th>
                                <th colspan="2" width="14%">
                                    ผลการทดสอบ
                                </th>
                                <th rowspan="2" width="14%">
                                    หมายเหตุ
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle ">
                                    Reject
                                </th>
                                <th class="text-center align-middle ">
                                    No Rej.
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td rowspan="6" class="text-center">
                                    <div class="date_now"></div>
                                    <div class="time_now"></div>
                                    <input type="hidden" name="txtTimeNow" class="time_now">
                                </td>
                                <td rowspan="3" class="text-center">
                                    Barcode ผิด
                                </td>

                                <td class="text-center">1</td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_1[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_1[{{$index}}]"
                                            value="No_Reject" onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;"
                                    class="text-center align-middle ">
                                    <textarea class="form-control" rows="8" name="Wrong_Barcode_Note[{{$index}}]"
                                        placeholder="หมายเหตุ">{{ !empty($item->Wrong_Barcode_Result_1) ? $item->Wrong_Barcode_Note : null }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color:#e9ebeb;vertical-align:middle;"
                                    class="text-center align-middle ">2</td>
                                <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_2[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_2[{{$index}}]"
                                            value="No_Reject" onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_3[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td class="text-center">
                                <td>
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_3[{{$index}}]"
                                            value="No_Reject" onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center">
                                    Barcode ไม่มี
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_1[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_1[{{$index}}]" value="No_Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;"
                                    class="text-center align-middle ">
                                    <textarea class="form-control" rows="8" name="No_Barcode_Note[{{$index}}]"
                                        placeholder="หมายเหตุ">{{ !empty($item->No_Barcode_Note) ? $item->No_Barcode_Note : null }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color:#e9ebeb;vertical-align:middle;"
                                    class="text-center align-middle ">2</td>
                                <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_2[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_2[{{$index}}]" value="No_Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color:#e9ebeb;vertical-align:middle;"
                                    class="text-center align-middle ">3</td>
                                <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_3[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="background-color:#e9ebeb;" class="text-center align-middle ">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_3[{{$index}}]" value="No_Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ลายเซ็นผู้บันทึก -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="font-weight-bold">บันทึกโดย</h3>
                    <div>
                        @if(!empty($item->sign_operator))
                        <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" alt="">
                        @endif
                    </div>
                    <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="card">
        <div class="card-body">
            <!-- ทวนสอบโดย -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="font-weight-bold">ทวนสอบโดย</h3>
                    @if(!empty($item->sign_leader))
                    <div>
                        <img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" alt="">
                    </div>
                    <input type="hidden" name="txt_sign_operator" id="txt_sign_operator"
                        value="{{!empty($item->sign_leader) ? $item->sign_leader : '0' }}">
                    @else
                    <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="0">
                    <div id="sign_operator" class="d-none"></div>

                    <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary"
                        data-toggle="modal" data-target="#sign_operator_modal">
                        <i class="fas fa-signature"></i>
                        ลายเซ็น
                    </button>
                    @endif
                    <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                </div>
            </div>

            <div class="row mt-4 text-center">
                <div class="col-lg-6 col-md-6">
                    <button id="btn-save" class="btn btn-lg btn-block btn-success">
                        <i class="fa fa-save"></i> บันทึก
                    </button>
                </div>

                <div class="col-lg-6 col-md-6">
                    <button type="reset" class="btn btn-lg btn-block btn-danger">
                        <i class="fa fa-times"></i> ยกเลิก
                    </button>
                </div>
            </div>

            <div class="row text-center mt-4">
                <div class="col-lg-12 col-md-12">
                    <button type="button" class="btn btn-lg btn-block btn-info"
                        onclick="window.location.href='{{ url('printer_monitor/'.$production_order) }}'">
                        <i class="fa fa-undo"></i> ย้อนกลับ
                    </button>
                </div>
            </div>
            <br>

            <table class="table table-bordered table-striped tbl-paperless">
                <thead>
                    <tr>
                        <th style="background-color:#8e9090;color: white;" width="75%">
                            วิธีการทดสอบการทำงานของเครื่องอ่านบาร์โค้ด
                        </th>
                        <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                            &nbsp;&nbsp;1. ติดแผ่นทดสอบบนฟอล์ย เพื่อให้แผ่นทดสอบผ่านเครื่องอ่านบาร์โค้ด<br>
                            &nbsp;&nbsp;2. แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped tbl-paperless">
                <thead>
                    <tr>
                        <th style="background-color:#8e9090;color: white;" width="75%">
                            ความถี่ในการทดสอบ
                        </th>
                        <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                            &nbsp;&nbsp;1. ก่อนเริ่มงานแต่ละกะ<br>
                            &nbsp;&nbsp;2. ทุกครั้งที่เปลี่ยนผลิตภัณฑ์<br>
                            &nbsp;&nbsp;3. ทุกครั้งที่เปลี่ยนขนาดผลิตภัณฑ์</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped tbl-paperless">
                <thead>
                    <tr>
                        <th style="background-color:#8e9090;color: white;" width="75%">
                            การแก้ไข
                        </th>
                        <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                            &nbsp;&nbsp;สิ่งที่ต้องทำทันที<br>
                            &nbsp;&nbsp;- หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คของผลิตภัณฑ์ที่ไม่มีบาร์โค้ดได้ครบทั้ง
                            3
                            ครั้ง<br>&nbsp;&nbsp;แสดงว่าเครื่องทำงานไม่ปกติ <br>
                            &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader)
                            <br>
                            &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน
                            (block)
                            <br>
                            &nbsp;&nbsp;- หากพบว่าเครื่องรีเจคซองผลิตภัณฑ์ที่บาร์โค้ดผิดหรือยาร์โค้ดไม่มี<br>
                            &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader)
                            <br>
                            &nbsp;&nbsp;2. Operator
                            เคลียร์และตรวจสอบผลิตภัณฑ์ที่อยู่บนสายพานออกให้หมด<br>&nbsp;&nbsp;หากพบว่าฟอล์ยที่ใช้ไม่เป็นไปตามข้อกำหนดให้เปลี่ยนฟอล์ยม้วนใหม่ทันที่
                            <br><br>
                            &nbsp;&nbsp;จากนั้นปฏิบัติตามใน HACCP Action Plan
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
>>>>>>> 3d7a74378b791f95a4f0bdfd49e3a996e45464e6
</div>
{{ Form::close() }}

<!-- Modal ลายเซ็น leader-->
<div class="modal fade" id="sign_leader_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true" aria-labelledby="vcenter">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="">
                    <i class="fas fa-signature fa-lg"></i>
                    กรอกรหัสผ่านเพื่อบันทึกลายเซ็น
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<<<<<<< HEAD
                <input type="password" class="form-control" name="pass_sign" id="pass_sign_leader"
                    placeholder="รหัสผ่าน" autocomplete="off">
                <input type="hidden" name="ID" id="ID">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                <button type="button" onclick="check_pass_sign('sign_leader', {{ $order }} , 'FM_PD_044_main')"
                    class="btn waves-effect waves-light btn-success">
                    บันทึก
=======
                <input type="password" class="form-control" name="pass_sign" id="pass_sign_operator"
                    placeholder="รหัสผ่าน">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="check_pass_sign('sign_operator', {{ $production_order }})"
                    class="btn btn-lg btn-block btn-success">
                    ยืนยัน
>>>>>>> 3d7a74378b791f95a4f0bdfd49e3a996e45464e6
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

@endsection
@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">

<style>
    .table-bordered,
    .table-bordered td,
    .table-bordered th {
        border: 3px solid #aaa8a8;
        font-size: 18px;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 3px solid #aaa8a8;
    }
</style>

<style>
    /* The container */
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
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
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

    .box {
        padding: 0px;
    }

    .btn{
        background-color: white;
        border-radius: 0rem;
    }
</style>

<link href="{{ asset('assets/dist/css/pages/form-icheck.css')}}" rel="stylesheet">
@endsection

@section('main')
<br>
<form action="{{ url('/FM-PD-044/store') }}" method="post">
    @csrf
<div class="col-lg-12" style="padding-left: 0px;">
    <div class="card">
        <div class="d-flex flex-row" style="background-color:#eafafa;">
            <div class="bg-info">
                <h6 class="text-white box m-b-0">
                    <a href="app-contact-detail.html"><img src="{{ asset('/assets/images/dgo.jpg')}}" width="60"></a>
                </h6>
            </div>
            <div class="align-self-center m-l-20 col-md-6 col-lg-6">
                <h3 class="m-b-0 text-info"><b style="color:black">FM-PD-044 Rev.03</b></h3>
                <h5 class="text-muted m-b-0"><b style="color:#03a9f3">การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ</b></h5>
            </div>
            <div class="p-10 col-md-5 col-lg-5 text-right">
                <button class="btn btn-outline-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-print" style="font-size:22px;width: 40px;"></i></span><br>Print</button>
                <button class="btn btn-outline-warning waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-edit" style="font-size:22px;width: 40px;"></i></span><br>Edit</button>
                <button class="btn btn-outline-danger waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-times" style="font-size:22px;width: 40px;"></i></span><br>Close</button>
                <button class="btn btn-outline-success waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-save" style="font-size:22px;width: 40px;"></i></span><br>Save</button>
                <button class="btn btn-outline-dark waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-arrow-left" style="font-size:22px;width: 40px;" aria-hidden="true"></i></span><br>Back</button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#03a9f3;color: white;font-size:15px;" colspan="8">
                    DATE : 17.26.20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    PRODUCT NAME : HI-Q1+HA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    PRODUCT ORDER LINE : 10394169&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    BATCH NO : 26.06.20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    SIZE : 600g
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="1" width="20%" style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">
                    เลขที่บาร์โค้ด<br>(Barcode no.)</td>
                <td colspan="7" width="80%"><input type="file" id="input-file-now" class="dropify" name="Barcode_No"/></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#e9ebeb;vertical-align:middle;" width="20%" class="text-center">
                    ทดสอบความถี่ของ<br>(Frequency)
                </th>
                <th width="80%" style="background-color:white;">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label class="container">ก่อนเริ่มงานแต่ละกะ
                                    <input type="radio" name="Frequency" value="ก่อนเริ่มงานแต่ละกะ">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label class="container">เปลี่ยนผลิตภัณฑ์
                                    <input type="radio" name="Frequency" value="เปลี่ยนผลิตภัณฑ์">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
    </table>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center">
                    เวลาทดสอบ<br>(Time)
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center">
                    ชนิดของแผ่นทดสอบ<br>(Test Case)
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center">
                    ครั้งที่
                </th>
                <th colspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center">
                    ผลการทดสอบ
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center">
                    ผู้ทดสอบและลงบันทึก<br>โดย Barcode Operator
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center">
                    ทดสอบโดย<br>Leader/Supervisor
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center">
                    หมายเหตุ
                </th>
            </tr>
            <tr>
                <th style="background-color:#e9ebeb;vertical-align:middle;font-size:14px;" class="text-center">Reject
                </th>
                <th style="background-color:#e9ebeb;vertical-align:middle;font-size:14px;" class="text-center">No Rej.
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="6" style="background-color:#white;vertical-align:middle;" class="text-center">
                    19/08/20<br>13:45
                    <?php
                        $date = date("Y-m-d");
                        $time = date("H:i:s");
                        $datetime = date("Y-m-d")."T".date("H:i:s");
                    ?>
                    {{-- <input type="datetime-local" value="{{ $datetime }}" id="example-datetime-local-input"> --}}
                    {{-- <input type="date" class="form-control" value="{{ $date }}">
                    <br><br>
                    <input type="time" class="form-control" value="{{ $time }}"> --}}
                </td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">Barcode ผิด
                </td>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">1</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="Wrong_Barcode_Result_1" value="Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="Wrong_Barcode_Result_1" value="No_Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">
                    <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                </td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">
                    <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                </td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">
                    <textarea class="form-control" rows="8" name="Wrong_Barcode_Note"></textarea>
                </td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">2</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="Wrong_Barcode_Result_2" value="Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="Wrong_Barcode_Result_2" value="No_Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">3</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="Wrong_Barcode_Result_3" value="Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="Wrong_Barcode_Result_3" value="No_Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">Barcode
                    ไม่มี</td>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">1</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="No_Barcode_Result_1" value="Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="No_Barcode_Result_1" value="No_Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center"><img src="{{ asset('/assets/images/sign.png')}}" width="145"></td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center"><img src="{{ asset('/assets/images/sign.png')}}" width="145"></td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">
                    <textarea class="form-control" rows="8" name="No_Barcode_Note"></textarea>
                </td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">2</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="No_Barcode_Result_2" value="Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="No_Barcode_Result_2" value="No_Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">3</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="No_Barcode_Result_3" value="Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="radio" name="No_Barcode_Result_3" value="No_Reject">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#8e9090;color: white;" width="45%">
                    วิธีการทดสอบการทำงานของเครื่องอ่านบาร์โค้ด
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="55%">
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
                <th style="background-color:#8e9090;color: white;" width="30%">
                    ความถี่ในการทดสอบ
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="70%">
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
                <th style="background-color:#8e9090;color: white;" width="30%">
                    การแก้ไข
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="70%">
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
</div>
</form>

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

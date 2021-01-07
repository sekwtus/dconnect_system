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
<div class="col-lg-12" style="padding-left: 0px;">
    <div class="card">
        <div class="d-flex flex-row" style="background-color:#eafafa;">
            <div class="bg-info">
                <h6 class="text-white box m-b-0">
                    <a href="app-contact-detail.html"><img src="{{ asset('/assets/images/dgo.jpg')}}" width="60"></a>
                </h6>
            </div>
            <div class="align-self-center m-l-20 col-md-6 col-lg-6">
                <h3 class="m-b-0 text-info"><b style="color:black">FM-PD-002 Rev.17</b></h3>
                <h5 class="text-muted m-b-0"><b style="color:#03a9f3">การทดสอบการทำงานเครื่อง X-Ray</b></h5>
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
                <td colspan="1" rowspan="4" width="20%" style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">ทดสอบความถี่ของ<br>(Frequency)</td>
                <td colspan="7" width="80%" style="background-color:white;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="container">ก่อนเริ่มงานแต่ละกะ
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="container">เปลี่ยนผลิตภัณฑ์
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7" style="background-color:white;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="container">เปลี่ยนขนาดของผลิตภัณฑ์
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="container">หลังจากที่ไลน์การผลิตหยุด 60 นาที
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7" style="background-color:white;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="container">มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="container">ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7" style="background-color:white;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="container">ทุกวันหลังสิ้นสุดการผลิต
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>


    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="12%">
                    เวลาทดสอบ<br>(Time)
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="18%">
                    ชนิดของแผ่นทดสอบ<br>(Test Case)
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="8%">
                    ครั้งที่
                </th>
                <th colspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="14%">
                    ผลการตรวจสอบ
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="22%">
                    ผู้ทดสอบและลงทุกวัน<br>โดย Barcode Operator
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="16%">
                    ทดสอบโดย<br>Leader/Supervisor
                </th>
                <th rowspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                    class="text-center" width="10%">
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
                <td rowspan="6" style="background-color:#white;vertical-align:middle;" class="text-center">XX:XX</td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">สแตนเลส 1.2 มม.<br>(Stainless 1.2 mm)
                </td>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">1</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">ลายเซ็น</td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">ลายเซ็น</td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center"></td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">2</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">3</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">โลหะ 1.2 มม.<br>(Metal 1.2 mm)</td>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">1</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">ลายเซ็น</td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center">ลายเซ็น</td>
                <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;" class="text-center"></td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">2</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">3</td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td style="background-color:#e9ebeb;" class="text-center">
                    <label class="container">
                        <input type="checkbox">
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
                    วิธีการทดสอบการทำงานของเครื่อง X-Ray
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="55%">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                    &nbsp;&nbsp;1. ใช้แผ่นทดสอบ 2 ชนิดตืดที่ถุงนม (1 แผ่น/1 ถุง) แล้ววางคว่ำแผ่นทดสอบบนสายพาน เพื่อให้ถุงนมผ่านเข้าเครื่อง X-Ray<br>
                    &nbsp;&nbsp;2. แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่อง X-Ray 3 ครั้ง รวมที่งหมด 6 ครั้ง</td>
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
                    &nbsp;&nbsp;3. ทุกครั้งที่เปลี่ยนขนาดผลิตภัณฑ์<br>
                    &nbsp;&nbsp;4. หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที<br>
                    &nbsp;&nbsp;5. มีการซ่อมแซมหรือแก้ๆไขเครื่อง X-Ray<br>
                    &nbsp;&nbsp;6. ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง<br>
                    &nbsp;&nbsp;7. ทุกวันหลังสิ้นสุดการผลิต
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#8e9090;color: white;" width="45%">
                    ขอบเขตวิกฤต (Critcal Limit)
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="55%">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                    &nbsp;&nbsp;เครื่อง X-Ray ต้องรีเจ็คฑ์แผ่นทดสอบได้ทุกแผ่นและทุกครั้ง</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#8e9090;color: white;" width="45%">
                    การแก้ไข หากขอบเขตวิกฤตเกินกว่ากำหนด
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="55%">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                    &nbsp;&nbsp;สิ่งที่ต้องทำทันที หากพบว่าเครื่อง X-Ray ไม่สามารถรีเจ๊คฑ์แผ่นทดสอบได้ครบทุกครั้ง แสดงว่าเครื่อง X-Ray มีปัญหา<br>
                    &nbsp;&nbsp;1. X-Ray Operator ห้ามปรับพารามิเตอร์ของเครื่อง X-Ray โดยเด็ดขาด แต่ให้หยุดการผลิดทันที <br>&nbsp;&nbsp;และทำการแจ้งหัวหน้างาน<br>
                    &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้แผ่นทดสอบเครื่อง X-Ray ครั้งสุดท้าย <br>&nbsp;&nbsp;และกักกัน (block) ผลิตภัณฑ์ในระบบ<br>
                    <br>&nbsp;&nbsp;จกานั้นปฏิบัติตามใน HACCP Action Plan
                </td>
            </tr>
        </tbody>
    </table>
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

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
                <h3 class="m-b-0 text-info"><b style="color:black">FM-PD-034 Rev No.12</b></h3>
                <h5 class="text-muted m-b-0"><b style="color:#03a9f3">แบบฟอร์มการบันทึกการตรวจสอบ Unit Carton/Spacial Box</b></h5>
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
        <thead>
            <tr>
                <th style="background-color:#e9ebeb;vertical-align:middle;" width="20%" class="text-center" colspan="2">กล่องยูนิตบรรจุ<br>(Unit Box)
                </th>
                <th width="80%" style="background-color:white;" colspan="6">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <label class="container">Unit Carton
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="input-group">
                                <label class="container">Spacial Box
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="8" style="background-color:#ffffff;vertical-align:middle;">
                    &nbsp;&nbsp;- ให้ถ่ายภาพใบรายละเอียดข้างกล่อง Unit Carton / Shipper Carton<br>
                    &nbsp;&nbsp;- ถ้ารายละเอียดข้างกล่อง Unit Carton / Shipper Carton แต่ละกล่องเหมือนกันให้ถ่ายแค่ใบเดียว<br>
                    &nbsp;&nbsp;- สำหรับกล่องที่ใช้ Unit Carton / Shipper Carton ไม่หมด ให้ถ่ายภาพรายละเอียดลงช่องด้สนล่างแทน
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="4" width="50%" style="background-color:#white;vertical-align:middle;" class="text-center">
                    <input type="file" id="input-file-now" class="dropify" data-height="300"/>
                </td>
                <td colspan="4" width="50%" style="background-color:#eafafa;vertical-align:middle;border-bottom: 3px solid #eafafa;" class="text-center">
                    สำหรับบันทึกภาพกล้องที่ยังใช้ช้อนไม่หมด
                </td>
            </tr>
            <tr>
                <td style="background-color:#eafafa;vertical-align:middle;border-bottom: 3px solid #eafafa;" class="text-center">
                    <input type="file" id="input-file-now" class="dropify" />
                </td>
            </tr>
            <tr>
                <td style="background-color:#eafafa;vertical-align:middle;" class="text-center">
                    หมายเหตุ : ให้ลงหมายเลข Control No. ที่ไม่ซ้ำกันเท่านั้น
                </td>
            </tr>
            <tr>
                <td colspan="8" style="background-color:#e9ebeb;vertical-align:middle;">
                    ตรวจโดย [ลายเซ็น] (ฝ่ายผลิต) Time ..................
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

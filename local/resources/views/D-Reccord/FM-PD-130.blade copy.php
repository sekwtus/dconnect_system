@extends('layouts.master')

@section('title', 'FM-PD-130')

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

    .textAlignVer{
        display:block;
        filter: flipv fliph;
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        transform: rotate(-90deg);
        position:relative;
        /* width:20px; */
        white-space:nowrap;
        /* font-size:12px; */
        margin-bottom:10px;
    }
</style>

<link href="{{ asset('assets/dist/css/pages/form-icheck.css')}}" rel="stylesheet">
@endsection

@section('main')
<br>
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-130/store/'.$order, 'files' => true]) }}
<div class="col-lg-12" style="padding-left: 0px;">
    <div class="card">
        <div class="d-flex flex-row" style="background-color:#eafafa;">
            <div class="bg-info">
                <h6 class="text-white box m-b-0">
                    <a href="app-contact-detail.html"><img src="{{ asset('/assets/images/dgo.jpg')}}" width="60"></a>
                </h6>
            </div>
            <div class="align-self-center m-l-20 col-md-6 col-lg-6">
                <h3 class="m-b-0 text-info"><b style="color:black">FM-PD-130 Rev.06</b></h3>
                <h5 class="text-muted m-b-0"><b style="color:#03a9f3">การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop)</b></h5>
            </div>
            <div class="p-10 col-md-5 col-lg-5 text-right">
                {{-- <button class="btn btn-outline-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-print" style="font-size:22px;width: 40px;"></i></span><br>Print</button>
                <button class="btn btn-outline-warning waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-edit" style="font-size:22px;width: 40px;"></i></span><br>Edit</button>
                <button class="btn btn-outline-danger waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-times" style="font-size:22px;width: 40px;"></i></span><br>Close</button>
                <button class="btn btn-outline-success waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-save" style="font-size:22px;width: 40px;"></i></span><br>Save</button>
                <button class="btn btn-outline-dark waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-arrow-left" style="font-size:22px;width: 40px;" aria-hidden="true"></i></span><br>Back</button> --}}
            </div>
        </div>
    </div>
</div>
<div class="table-responsive" style="overflow-x:auto;">
    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#03a9f3;color: white;font-size:15px;" colspan="7">
                    @foreach ($head as $item)
                        DATE : <a>{{ date_format(now(),"Y-m-d") }}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        PRODUCT NAME : {{$item->material_description}}&nbsp;&nbsp;&nbsp;&nbsp;
                        PRODUCT ORDER LINE : {{$item->production_order}}&nbsp;&nbsp;&nbsp;&nbsp;
                        BATCH NO : {{$item->batch}}&nbsp;&nbsp;&nbsp;&nbsp;
                        SIZE : 600g
                    @endforeach
                </th>
            </tr>
        </thead>
        <tbody>
            <thead>
                <tr>
                    <th style="background-color:#e9ebeb;vertical-align:middle;" class="text-center">
                        ช้อนเบอร์
                    </th>
                    <th style="background-color:white;vertical-align:middle;" class="text-center">
                        x
                    </th>
                    <th rowspan="5" style="background-color:white;vertical-align:middle;">
                        <input type="file" id="input-file-now" class="dropify" name="Pic_1"
                        data-default-file="{{ !empty($FM_PD_130_Default->Pic_1) ? asset('assets/FM-PD-130/'.$FM_PD_130_Default->Pic_1) : null }}"/>
                    </th>
                    <th rowspan="5" style="background-color:white;vertical-align:middle;">
                        <input type="file" id="input-file-now" class="dropify" name="Pic_2"
                        data-default-file="{{ !empty($FM_PD_130_Default->Pic_2) ? asset('assets/FM-PD-130/'.$FM_PD_130_Default->Pic_2) : null }}"/>
                    </th>
                    <th rowspan="5" style="background-color:white;vertical-align:middle;">
                        <input type="file" id="input-file-now" class="dropify" name="Pic_3"
                        data-default-file="{{ !empty($FM_PD_130_Default->Pic_3) ? asset('assets/FM-PD-130/'.$FM_PD_130_Default->Pic_3) : null }}"/>
                    </th>
                    <th rowspan="5" style="background-color:white;vertical-align:middle;">
                        <input type="file" id="input-file-now" class="dropify" name="Pic_4"
                        data-default-file="{{ !empty($FM_PD_130_Default->Pic_4) ? asset('assets/FM-PD-130/'.$FM_PD_130_Default->Pic_4) : null }}"/>
                    </th>
                    <th rowspan="5" style="background-color:white;vertical-align:middle;">
                        <input type="file" id="input-file-now" class="dropify" name="Pic_5"
                        data-default-file="{{ !empty($FM_PD_130_Default->Pic_5) ? asset('assets/FM-PD-130/'.$FM_PD_130_Default->Pic_5) : null }}"/>
                    </th>
                </tr>
                <tr>
                    <td rowspan="4" colspan="2" height="300" align="center" valign="bottom" style="background-color:white;">
                        <br><br><br><br>
                        <span class="textAlignVer">&nbsp;&nbsp;ถ่ายป้ายลงในตารางที่กำหนด&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </td>
                </tr>

            </thead>
            <thead>
                <tr>
                    <td colspan="2" style="background-color:white;vertical-align:middle;"class="text-center">
                        ผู้ตรวจสอบและ<br>ลงบันทึกข้อมูล
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td colspan="2" style="background-color:white;vertical-align:middle;"class="text-center">
                        ทดสอบโดย<br>Leader/Supervisor
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                    <td style="background-color:white;vertical-align:middle;"class="text-center">
                        <img src="{{ asset('/assets/images/sign.png')}}" width="145">
                    </td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td colspan="7" style="background-color:white;vertical-align:middle;">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ปัญหา</label>
                            <div class="col-10">
                                <input class="form-control" type="text" placeholder="รายละเอียด" name="Problem" value="{{ !empty($FM_PD_130_Default->Problem) ? $FM_PD_130_Default->Problem :  null }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;การแก้ปัญหา</label>
                            <div class="col-10">
                                <input class="form-control" type="text" placeholder="รายละเอียด" name="Solution" value="{{ !empty($FM_PD_130_Default->Solution) ? $FM_PD_130_Default->Solution :  null }}">
                            </div>
                        </div>
                    </td>
                </tr>
            </thead>
        </tbody>
    </table>
</div>

<br>
<div class="d-flex flex-row" style="background-color:#eafafa;">
    <div class="bg-info">
        {{-- <h6 class="text-white box m-b-0">
            <a href="app-contact-detail.html"><img src="{{ asset('/assets/images/dgo.jpg')}}" width="60"></a>
        </h6> --}}
    </div>
    <div class="align-self-center m-l-20 col-md-6 col-lg-6">
        {{-- <h3 class="m-b-0 text-info"><b style="color:black">FM-PD-130 Rev.06</b></h3>
        <h5 class="text-muted m-b-0"><b style="color:#03a9f3">การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop)</b></h5> --}}
    </div>
    <div class="p-10 col-md-5 col-lg-5 text-right">
        {{-- <button class="btn btn-outline-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-print" style="font-size:22px;width: 40px;"></i></span><br>Print</button>
        <button class="btn btn-outline-warning waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-edit" style="font-size:22px;width: 40px;"></i></span><br>Edit</button>
        <button class="btn btn-outline-danger waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-times" style="font-size:22px;width: 40px;"></i></span><br>Close</button> --}}
        @if(empty($FM_PD_130_Default))
        <button class="btn btn-outline-success waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-save" style="font-size:22px;width: 40px;"></i></span><br>Save</button>
        @endif
        <button class="btn btn-outline-dark waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-arrow-left" style="font-size:22px;width: 40px;" aria-hidden="true"></i></span><br>Back</button>
    </div>
</div><br>

<div class="table-responsive">
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
                    &nbsp;&nbsp;ทุกกล่อง</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th style="background-color:#8e9090;color: white;" width="30%">
                    วิธีการตรวจสอบช้อน
                </th>
                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="70%">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                    &nbsp;&nbsp;1. เปิดกล่องที่ใส่ช้อน<br>
                    &nbsp;&nbsp;2. ตรวจสอบเบอร์ช้อนที่อยู่ในกล่องและป้ายโค้ดของบรรจุภัณฑ์ว่าถูกต้องและตรงกัน <br>
                    &nbsp;&nbsp;3. ตรวจสอบเบอร์ช้อนว่าถูกต้องกับผลิตภัณฑ์ที่ผลิต <br>
                    &nbsp;&nbsp;4. บันทึกข้อมูลและติดป้ายโค้ดของบรรจุภัณฑ์ลงในแบบฟอร์ม <br>
                    &nbsp;&nbsp;5. สำหรับกล่องที่ยังใช้ช้อนไม่หมด ให้คัดลอกข้อมูลจากป้ายเดิมแล้วเขียนลงบนป้ายใหม่เพื่อติดบนถุง<br> &nbsp;&nbsp;หรือกล่องช้อนก่อนส่งกลับคืน
                </td>
            </tr>
        </tbody>
    </table>
</div>
{{ Form::close() }}

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

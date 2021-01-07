@extends('layouts.master')

@section('title', 'FM-PD-018')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css') }}">
<style>
    .table-bordered,
    .table-bordered td,
    .table-bordered th {
        border: 3px solid #0f0e0e;
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
</style>
@endsection

@section('main')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="fa fa-history" aria-hidden="true"></i> DRecord</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">DReacord</li>
                <li class="breadcrumb-item">Product Line</li>
                <li class="breadcrumb-item">Product Line1</li>
                <li class="breadcrumb-item active">FM-PD-018 Rev No.35</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-1 col-lg-1 text-center">
                        <a href="app-contact-detail.html">
                            <img src="{{ asset('/assets/images/dgo.jpg') }}" width="150" alt="user"
                                class="img-fluid"></a>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <h3 class="box-title m-b-0" style="font-size: 18pt;">FM-PD-018 Rev No.35</h3>
                        <h4 style="font-size: 16pt;">การตรวจสอบความถูกต้องของการผลิต</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 text-right">
                        <button class="btn btn-info" disabled>
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-warning" disabled>
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger" disabled>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-success">
                            <i class="fa fa-save" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-dark">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-footer text-white bg-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Date:</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="date" id="date" name="date"
                                    value="{{ date_format(now(),"Y-m-d") }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label">PRODUCT NAME: </label>
                            <label for="" class="col-sm-7 col-form-label">Hi-Q1+HA </label>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label">PRODUCT ORDER LINE: </label>
                            <label for="" class="col-sm-7 col-form-label">10394169 </label>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label">BATCH: </label>
                            <label for="" class="col-sm-7 col-form-label">26.06.20 </label>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label">SIZE: </label>
                            <label for="" class="col-sm-7 col-form-label">600g</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="font-size: 14pt;">
                <div class="row">
                    <div class="col-md-12 py-2 bg-success text-white">
                        <p class="h6 mb-0 font-weight-bold" style="font-size: 18pt;">การตรวจสอบ RAW MATERIAL จาก
                            WAREHOUSE</p>
                    </div>
                    <div class="col-md-12">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">ชนิดของนมที่ส่ง</p>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">1.</label>
                            <div class="col-sm-11">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">2.</label>
                            <div class="col-sm-11">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">3.</label>
                            <div class="col-sm-11">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">4.</label>
                            <div class="col-sm-11">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="container">ใช้นมชนิดเดิมผลิตต่อ
                                        <input type="radio" name="type_milk">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for=""
                                        style="font-size: 14pt;">ใช้นมชนิดเดิมผลิตต่อ</label>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="container">เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย
                                        <input type="radio" name="type_milk">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">RM.Code</p>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">หมายเลข RM</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">เบอร์ไซเฟอร์</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">หมายเลข RM</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">เบอร์ไซเฟอร์</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">หมายเลข RM</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">เบอร์ไซเฟอร์</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">หมายเลข RM</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">เบอร์ไซเฟอร์</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                        (พนักงานถอดถุงนม)
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 my-2 bg-success text-white">
                        <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">Process Flow (รายละเอียดการผลิต)
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="my-2 font-weight-bold" style="font-size: 16pt;">เบลนเดอร์ที่ใช้</p>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="container">เบลนเดอร์ 1 (Prebiotic)
                                        <input type="radio" name="blender" id="blender1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">
                                        เบลนเดอร์ 1 (Prebiotic)
                                    </label>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="container">เบลนเดอร์ 2 (Prebiotic)
                                        <input type="radio" name="blender" id="blender2">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">
                                        เบลนเดอร์ 2 (Prebiotic)
                                    </label>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="container">เเบลนเดอร์ 1 และ สไมล์ (Synbiotic)
                                        <input type="radio" name="blender" id="blender3">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">
                                        เบลนเดอร์ 1 และ สไมล์ (Synbiotic)
                                    </label>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="container">ไอเอฟ เซกรีแคร์ (IF Segrecare)
                                        <input type="radio" name="blender" id="blender4">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">
                                        ไอเอฟ เซกรีแคร์ (IF Segrecare)
                                    </label>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="my-2 font-weight-bold" style="font-size: 16pt;">เครื่องบรรจุที่ใช้</p>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="container">Filling line 1
                                        <input type="checkbox" name="line1" id="line1" onclick="this.checked = false;">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">Filling line 1</label>
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="container">Filling line 4
                                        <input type="checkbox" name="line4" id="line4" onclick="this.checked = false;">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">Filling line 4</label>
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="container">Filling line 2
                                        <input type="checkbox" name="line2" id="line2" onclick="this.checked = false;">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">Filling line 2</label>
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="container">Filling line 5
                                        <input type="checkbox" name="line5" id="line5" onclick="this.checked = false;">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">Filling line 5</label>
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="container">Filling line 3
                                        <input type="checkbox" name="line3" id="line3" onclick="this.checked = false;">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">Filling line 3</label>
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="container">Filling line 6
                                        <input type="checkbox" name="line6" id="line6" onclick="this.checked = false;">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">Filling line 6</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                        (พนักงานเทนม)
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">หมายเลขสูตรการผลิต</p>
                        <div class="col-md-6">
                            <input class="form-control" type="text">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="my-2 font-weight-bold" style="font-size: 16pt;">Ribbon ที่ใช้</p>
                                    <div class="custom-control custom-checkbox checkbox-info">
                                        <input type="checkbox" class="custom-control-input" id="">
                                        <label class="custom-control-label" for="">Ribbon อาร์ตเวิร์ค</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox checkbox-info">
                                        <input type="checkbox" class="custom-control-input" id="">
                                        <label class="custom-control-label" for="">Ribbon คอมม่อน</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <p class="my-2 font-weight-bold" style="font-size: 16pt;">บันทึกการเปลี่ยนผลิตภัณฑ์
                                    </p>
                                    <div class="custom-control custom-checkbox checkbox-info">
                                        <input type="checkbox" class="custom-control-input" id="">
                                        <label class="custom-control-label" for="">
                                            เดินผลิตภัณฑ์ตัวแรกของสัปดาห์
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox checkbox-info">
                                        <input type="checkbox" class="custom-control-input" id="">
                                        <label class="custom-control-label" for="">
                                            ไม่มีการเปลี่ยนสูตรผลิตภัณฑ์
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox checkbox-info">
                                        <input type="checkbox" class="custom-control-input" id="">
                                        <label class="custom-control-label" for="">
                                            มีการเปลี่ยนสูตรผลิตภัณฑ์
                                        </label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="" id="">
                                                    <label class="form-check-label" for="">
                                                        ไม่มีนมตกค้างใน Blender/Hopper
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="">
                                                    <label class="form-check-label" for="">
                                                        ไม่มีนมตกค้างใน Seperator/Vibrator sieve
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="" id="">
                                                    <label class="form-check-label" for="">
                                                        ไม่มีนมตกค้างในเครื่องบรรจุ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">ตรวจสอบความถูกต้องของ Foil</p>
                        <div class="col-md-12">
                            <p class="my-2 font-weight-bold text-center
                            " style="font-size: 16pt;">ถ่ายตัวอย่างซองที่มี Art Work</p>
                        </div>
                        <div class="col-md-12">
                            <div class="card text-left">
                                <div class="card-body">
                                    <div class="row border border-dark">
                                        <div class="col-md-8">
                                            <p class="text-center">(ตัวอย่าง แบบที่1)</p>
                                            <p class="text-center">IFFO/P&BF</p>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">Product</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">MFG</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">EXP</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">แบชผลิต</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">Prodcut Order</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            กรณีเป็นการเช็คช้อนในกล่องนม
                                        </div>
                                        <div class="col-md-4 align-self-center">
                                            <input type="file" id="" class="dropify" data-default-file="" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="row border border-dark">
                                        <div class="col-md-8">
                                            <p>(ตัวอย่าง แบบที่2)</p>
                                            <p>GUM Product</p>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">Product</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">MFG</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">EXP</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">แบชผลิต</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">Prodcut Order</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="" id="">
                                                </div>
                                            </div>
                                            กรณีผลิตช้อนใส่ในกล่องนม
                                        </div>
                                        <div class="col-md-4 align-self-center">
                                            <input type="file" id="" class="dropify" data-default-file="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="file" id="" class="dropify" data-default-file="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">แบชผลิตภัณฑ์</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="" id="">
                            </div>

                            <label for="" class="col-sm-2 col-form-label">Line</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        ความถูกต้องของการพิมพ์
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="">
                            <label class="custom-control-label" for="">ชื่อผลิตภัณฑ์</label>
                        </div>
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="">
                            <label class="custom-control-label" for="">เวลา</label>
                        </div>
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="">
                            <label class="custom-control-label" for="">วันที่ผลิต</label>
                        </div>
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="">
                            <label class="custom-control-label" for="">วันหมดอายุ</label>
                        </div>
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="">
                            <label class="custom-control-label" for="">แบช</label>
                        </div>
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="">
                            <label class="custom-control-label" for="">ออเดอร์/ไลน์</label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 my-2 bg-success text-white">
                        <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">Process Flow (รายละเอียดการผลิต)
                        </p>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-7">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ผลิตภัณฑ์</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ขนาด</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                                <label for="" class="col-sm-2 col-form-label">กรัม</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2 text-right">
                            บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                            (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                        </div>
                        <div class="col-md-12 mt-2 text-right">
                            ตรวจสอบโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                            (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 bg-success text-white">
                        <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">รายละเอียดของ Unit Carton / Special
                            box / แบชข้างซอง Pouch
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row mt-2">
                            <label for="" class="col-sm-3 col-form-label">PM Code/เลขก้น Unit</label>
                            <label for="" class="col-sm-1 col-form-label">PM</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">วันผลิต</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="date" name="" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">วันหมดอายุ</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="date" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Time</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="time" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Material Number</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="time" name="" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Product Order/Line</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="time" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">แบช</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="date" name="" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 mb-2">
                                <select class="form-control">
                                    <option>A</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="" id="" value="option1">
                                    <label class="form-check-label" for="">
                                        ไม่มีนมตกค้างใน Blender/Hopper
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                                (พนักงานบรรจุกล่องยูนิต)
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="" id="" value="option1">
                                            <label class="form-check-label" for="">
                                                ไม่ใช้ช้อน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="" id="" value="option1">
                                            <label class="form-check-label" for="">
                                                ใช้ช้อนเบอร์เดิม
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="" id="" value="option1">
                                            <label class="form-check-label" for="">
                                                เคลียร์ช้อนที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-2 py-2 text-white bg-success">
                                <div class="row">
                                    <div class="col-md-2">
                                        ช้อนเบอร์
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="spoon" id="spoon1"
                                                value="spoon1" checked>
                                            <label class="form-check-label" for="spoon1">
                                                1
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="spoon" id="spoon2"
                                                value="spoon2">
                                            <label class="form-check-label" for="spoon2">
                                                2
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="spoon" id="spoon3"
                                                value="spoon3">
                                            <label class="form-check-label" for="spoon3">
                                                3
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="spoon" id="spoon4"
                                                value="spoon4">
                                            <label class="form-check-label" for="spoon4">
                                                4
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="spoon" id="spoon5"
                                                value="option1">
                                            <label class="form-check-label" for="spoon5">
                                                5
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="bg-danger" id="img-spoon-1">
                                            <img src="" alt="" style="width: 100%; height:100%;">
                                        </div>
                                        <div class="bg-primary hide" id="img-spoon-2">
                                            <img src="" alt="" style="width: 100%; height:100%;">
                                        </div>
                                        <div class="bg-info hide" id="img-spoon-3">
                                            <img src="" alt="" style="width: 100%; height:100%;">
                                        </div>
                                        <div class="bg-success hide" id="img-spoon-4">
                                            <img src="" alt="" style="width: 100%; height:100%;">
                                        </div>
                                        <div class="bg-warning hide" id="img-spoon-5">
                                            <img src="" alt="" style="width: 100%; height:100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" id="" class="dropify" data-default-file="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-2 col-md-12">
                                <label for="" class="col-sm-3 col-form-label">Customer Item Code/รหัสชิ้นงาน</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="date" name="" id="">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                                (พนักงานบรรจุกล่องยูนิต)
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="" id="" value="option1">
                                <label class="form-check-label" for="">
                                    เคลียร์ Unit/Special Box ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-white py-2 my-2 bg-success">
                                <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">รายละเอียดของ Unit Carton /
                                    Special box / แบชข้างซอง
                                    Pouch</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">PM Code/เลขก้น Unit</label>
                                        <label for="" class="col-sm-1 col-form-label">PM</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Material Code</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Material Code</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Product Hierarehy</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Time</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="time" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Batch Number</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">EXP.</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Product Order/Line</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="date" name="" id="">
                                        </div>
                                        <div class="col-sm-5">
                                            <select class="form-control">
                                                <option>A</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ตัวอย่างการพิมพ์</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right my-2">
                                    บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                                    (พนักงานเก็บลงกล่อง)
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-7 col-form-label">ตัวอย่างการพิมพ์</label>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id=""
                                                    value="option1">
                                                <label class="form-check-label" for="">
                                                    ไทย
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id=""
                                                    value="option1">
                                                <label class="form-check-label" for="">
                                                    ส่งออก
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right my-2">
                                    บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                                    (พนักงาน Operator packing)
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right my-2">
                                Approved By <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                                PD.Line leader/Supervisor/IRF Time ......
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">รหัสผ่าน</label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                        placeholder="ยืนยันรหัสผ่านเพื่อบันทึกลายเซ็น">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>

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

<script>
    $('#blender1').click( function() {
        $('#line1').prop('checked', true);
        $('#line2').prop('checked', true);
        $('#line3').prop('checked', false);
        $('#line4').prop('checked', false);
        $('#line5').prop('checked', false);
        $('#line6').prop('checked', false);
    });

    $('#blender2').click( function() {
        $('#line1').prop('checked', false);
        $('#line2').prop('checked', false);
        $('#line3').prop('checked', true);
        $('#line4').prop('checked', true);
        $('#line5').prop('checked', false);
        $('#line6').prop('checked', false);
    });

    $('#blender3').click( function() {
        $('#line1').prop('checked', true);
        $('#line2').prop('checked', true);
        $('#line3').prop('checked', false);
        $('#line4').prop('checked', false);
        $('#line5').prop('checked', false);
        $('#line6').prop('checked', false);
    });

    $('#blender4').click( function() {
        $('#line1').prop('checked', false);
        $('#line2').prop('checked', false);
        $('#line3').prop('checked', false);
        $('#line4').prop('checked', false);
        $('#line5').prop('checked', true);
        $('#line6').prop('checked', true);
    });
</script>

<script>
    $('#spoon1').click( function() {
        $('#img-spoon-1').show();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').hide();
    });

    $('#spoon2').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').show();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').hide();
    });

    $('#spoon3').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').show();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').hide();
    });

    $('#spoon4').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').show();
        $('#img-spoon-5').hide();
    });

    $('#spoon5').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').show();
    });
</script>
@endsection

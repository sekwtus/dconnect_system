@extends('layouts.master')

@section('title', 'FM-PD-018-3')

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
<form action="{{ url('/FM-PD-018-3/update/'. $id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($FM_PD_018_3 as $item)
    <div class="col-md-12 mt-2">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-018 Rev No.35
                            การตรวจสอบความถูกต้องของการผลิต</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label> Date: &nbsp;&nbsp; {{ date_format(now(),"Y-m-d") }}</label>
                        <input class="form-control" type="hidden" id="date" name="date"
                            value="{{ date_format(now(),"Y-m-d") }}">
                    </div>
                    <div class="col-lg-8">
                        <label>PRODUCT NAME: {{ $item->material_description }}</label>
                        <input type="hidden" name="product_name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $item->production_order }}</label>
                        <input type="hidden" name="production_order" value="{{ $item->production_order }}">
                    </div>
                    <div class="col-lg-8">
                        <label>BATCH: &nbsp;&nbsp; {{ $item->batch }}</label>
                        <input type="hidden" name="batch">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 bg-success text-white">
                        <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">รายละเอียดของ Unit Carton /
                            Special
                            box / แบชข้างซอง Pouch
                        </p>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="pm_code">PM</span>
                            </div>
                            <input class="form-control" type="text" name="pm_code" id="pm_code"
                                value="{{ !empty($FM_PD_018_3_Default->pm_code) ? $FM_PD_018_3_Default->pm_code :  null }}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <input type="file" id="material_no" name="material_no" class="dropify"
                            data-default-file="{{ !empty($FM_PD_018_3_Default->material_no) ? asset('assets/FM-PD-018/'.$FM_PD_018_3_Default->material_no) : null }}" />
                    </div>
                    {{-- <div class="col-md-12">
                            <div class="input-group mb-3">
                                <label for="pm_code" class="col-sm-3 col-form-label">PM Code/เลขก้น Unit</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="pm_code">PM</span>
                                </div>
                                <input class="form-control" type="text" name="pm_code" id="pm_code"
                                    value="{{ !empty($FM_PD_018_3_Default->pm_code) ? $FM_PD_018_3_Default->pm_code :  null }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">วันผลิต</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="date" name="date" id="date"
                            value="{{ !empty($FM_PD_018_3_Default->date) ? date('Y-m-d', strtotime($FM_PD_018_3_Default->date)) :  null }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exp_date" class="col-sm-3 col-form-label">วันหมดอายุ</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="date" name="exp_date" id="exp_date"
                            value="{{ !empty($FM_PD_018_3_Default->exp_date) ? date('Y-m-d', strtotime($FM_PD_018_3_Default->exp_date)) :  null }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="time" class="col-sm-3 col-form-label">Time</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="time" name="time" id="time"
                            value="{{ !empty($FM_PD_018_3_Default->time) ? $FM_PD_018_3_Default->time :  null }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Material Number</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="material_no" id="material_no"
                            value="{{ !empty($FM_PD_018_3_Default->material_no) ? $FM_PD_018_3_Default->material_no :  null }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="material_no" class="col-sm-3 col-form-label">Product Order/Line</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="product_order" id="product_order"
                            value="{{ $item->production_order }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="batch" class="col-sm-3 col-form-label">แบช</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="batch" id="batch"
                            value="{{ !empty($FM_PD_018_3_Default->batch) ? $FM_PD_018_3_Default->batch :  null }}">
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="container" style="font-size: 12pt;">เคลียร์ Unit/Special Box
                            ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                            <input class="form-check-input" type="checkbox" name="no_milk_left_in" id="no_milk_left_in"
                                {{ (!empty($FM_PD_018_3_Default->no_milk_left_in) && $FM_PD_018_3_Default->no_milk_left_in == 'on') ? 'checked' : null  }}>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-12 text-right">
                        บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modelId" data-input="save_by_packing_unit">กดเพื่อบันทึกลายเซ็น</button>
                        (พนักงานบรรจุกล่องยูนิต)
                    </div>
                    <input type="hidden" name="save_by_packing_unit" id="save_by_packing_unit"
                        value="{{ !empty($FM_PD_018_3_Default->save_by_packing_unit) ? $FM_PD_018_3_Default->save_by_packing_unit :  null }}">
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="spoon_type" id="spoon_type1"
                                        value="1"
                                        {{ (!empty($FM_PD_018_3_Default->spoon_type) && $FM_PD_018_3_Default->spoon_type == '1') ? 'checked' : null  }}>
                                    <label class="form-check-label" for="spoon_type1">
                                        ไม่ใช้ช้อน
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="spoon_type" id="spoon_type2"
                                        value="2">
                                    <label class="form-check-label" for="spoon_type2"
                                        {{ (!empty($FM_PD_018_3_Default->spoon_type) && $FM_PD_018_3_Default->spoon_type == '2') ? 'checked' : null  }}>
                                        ใช้ช้อนเบอร์เดิม
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="spoon_type" id="spoon_type3"
                                        value="3">
                                    <label class="form-check-label" for="spoon_type3"
                                        {{ (!empty($FM_PD_018_3_Default->spoon_type) && $FM_PD_018_3_Default->spoon_type == '3') ? 'checked' : null  }}>
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
                                    <input class="form-check-input" type="radio" name="spoon_size" id="spoon_size1"
                                        value="1"
                                        {{ (empty($FM_PD_018_3_Default->spoon_size) || $FM_PD_018_3_Default->spoon_size == '1') ? 'checked' : null  }}>
                                    <label class="form-check-label" for="spoon_size1">
                                        1
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="spoon_size" id="spoon_size2"
                                        value="2"
                                        {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '2') ? 'checked' : null  }}>
                                    <label class="form-check-label" for="spoon_size2">
                                        2
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="spoon_size" id="spoon_size3"
                                        value="3">
                                    <label class="form-check-label" for="spoon_size3"
                                        {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '3') ? 'checked' : null  }}>
                                        3
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="spoon_size" id="spoon_size4"
                                        value="4"
                                        {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '4') ? 'checked' : null  }}>
                                    <label class="form-check-label" for="spoon_size4">
                                        4
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="spoon_size" id="spoon_size5"
                                        value="5"
                                        {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '5') ? 'checked' : null  }}>
                                    <label class="form-check-label" for="spoon_size5">
                                        5
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bg-danger  {{ (empty($FM_PD_018_3_Default->spoon_size) || $FM_PD_018_3_Default->spoon_size == '1') ? null : 'hide'  }}"
                                    id="img-spoon-1">
                                    <img src="{{ asset('/assets/images/users/1.jpg') }}" alt=""
                                        style="width: 100%; height:100%;">
                                </div>
                                <div class="bg-primary  {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '2') ? null : 'hide'  }}"
                                    id="img-spoon-2">
                                    <img src="{{ asset('/assets/images/users/2.jpg') }}" alt=""
                                        style="width: 100%; height:100%;">
                                </div>
                                <div class="bg-info  {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '3') ? null : 'hide'  }}"
                                    id="img-spoon-3">
                                    <img src="{{ asset('/assets/images/users/3.jpg') }}" alt=""
                                        style="width: 100%; height:100%;">
                                </div>
                                <div class="bg-success  {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '4') ? null : 'hide'  }}"
                                    id="img-spoon-4">
                                    <img src="{{ asset('/assets/images/users/4.jpg') }}" alt=""
                                        style="width: 100%; height:100%;">
                                </div>
                                <div class="bg-warning  {{ (!empty($FM_PD_018_3_Default->spoon_size) && $FM_PD_018_3_Default->spoon_size == '5') ? null : 'hide'  }}"
                                    id="img-spoon-5">
                                    <img src="{{ asset('/assets/images/users/5.jpg') }}" alt=""
                                        style="width: 100%; height:100%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="file" id="spoon_file" name="spoon_file" class="dropify"
                                    data-default-file="{{ !empty($FM_PD_018_3_Default->spoon_file) ? asset('assets/FM-PD-018/'.$FM_PD_018_3_Default->spoon_file) : null }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12 pt-4">
                        <div class="row">
                            <label for="customer_item_code" class="col-md-5 col-form-label">Customer Item
                                Code/รหัสชิ้นงาน</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" name="customer_item_code"
                                    id="customer_item_code"
                                    value="{{ !empty($FM_PD_018_3_Default->customer_item_code) ? $FM_PD_018_3_Default->customer_item_code :  null }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modelId" data-input="save_by_packing_unit2">กดเพื่อบันทึกลายเซ็น</button>
                        (พนักงานบรรจุกล่องยูนิต)
                    </div>
                    <input type="hidden" name="save_by_packing_unit2" id="save_by_packing_unit2"
                        value="{{ !empty($FM_PD_018_3_Default->save_by_packing_unit2) ? $FM_PD_018_3_Default->save_by_packing_unit2 :  null }}">
                    <div class="form-check">
                        <label class="container" style="font-size: 12pt;">เคลียร์ Shipper
                            ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                            <input class="form-check-input" type="checkbox" name="clear_unit_special_box"
                                id="clear_unit_special_box"
                                {{ (!empty($FM_PD_018_3_Default->clear_unit_special_box) && $FM_PD_018_3_Default->clear_unit_special_box == 'on') ? 'checked' : null  }}>
                            <span class="checkmark"></span>
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
                        <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">รายละเอียดของ Shipper
                            Carton</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <label for="pm_code_2" class="col-sm-3 col-form-label">PM Code/เลขก้น Unit</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="pm_code_2">PM</span>
                                    </div>
                                    <input class="form-control" type="text" name="pm_code_2" id="pm_code_2"
                                        value="{{ !empty($FM_PD_018_3_Default->pm_code_2) ? $FM_PD_018_3_Default->pm_code_2 :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="material_code" class="col-sm-3 col-form-label">Material
                                    Code</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="material_code" id="material_code"
                                        value="{{ !empty($FM_PD_018_3_Default->material_code) ? $FM_PD_018_3_Default->material_code :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="product_hierarehy" class="col-sm-3 col-form-label">Product
                                    Hierarehy</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="product_hierarehy"
                                        id="product_hierarehy"
                                        value="{{ !empty($FM_PD_018_3_Default->product_hierarehy) ? $FM_PD_018_3_Default->product_hierarehy :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="time_2" class="col-sm-3 col-form-label">Time</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="time" name="time_2" id="time_2"
                                        value="{{ !empty($FM_PD_018_3_Default->time_2) ? $FM_PD_018_3_Default->time_2 :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="batch_no" class="col-sm-3 col-form-label">Batch Number</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="batch_no" id="batch_no"
                                        value="{{ !empty($FM_PD_018_3_Default->batch_no) ? $FM_PD_018_3_Default->batch_no :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="exp" class="col-sm-3 col-form-label">EXP.</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="exp" id="exp"
                                        value="{{ !empty($FM_PD_018_3_Default->exp) ? $FM_PD_018_3_Default->exp :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="product_line" class="col-sm-3 col-form-label">Product
                                    Order/Line</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="product_line" id="product_line"
                                        value="{{ !empty($FM_PD_018_3_Default->product_line) ? $FM_PD_018_3_Default->product_line :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="example_print" class="col-sm-3 col-form-label">ตัวอย่างการพิมพ์</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="example_print" id="example_print"
                                        value="{{ !empty($FM_PD_018_3_Default->example_print) ? $FM_PD_018_3_Default->example_print :  null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="glue" class="col-sm-3 col-form-label">กาวที่ใช้ในการผลิต</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="glue" id="glue1" value="1"
                                            {{ (!empty($FM_PD_018_3_Default->glue) && $FM_PD_018_3_Default->glue == '1') ? 'checked' : null  }}>
                                        <label class="form-check-label" for="glue1">
                                            ไทย
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="glue" id="glue2" value="2"
                                            {{ (!empty($FM_PD_018_3_Default->glue) && $FM_PD_018_3_Default->glue == '2') ? 'checked' : null  }}>
                                        <label class="form-check-label" for="glue2">
                                            ส่งออก
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right my-2">
                            บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modelId" data-input="save_by_box_staff">กดเพื่อบันทึกลายเซ็น</button>
                            (พนักงานเก็บลงกล่อง)
                        </div>
                        <input type="hidden" name="save_by_box_staff" id="save_by_box_staff"
                            value="{{ !empty($FM_PD_018_3_Default->save_by_box_staff) ? $FM_PD_018_3_Default->save_by_box_staff :  null }}">

                        <div class="col-md-12 text-right my-2">
                            บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modelId"
                                data-input="save_by_opoerator_packing">กดเพื่อบันทึกลายเซ็น</button>
                            (พนักงาน Operator packing)
                        </div>
                        <input type="hidden" name="save_by_opoerator_packing" id="save_by_opoerator_packing"
                            value="{{ !empty($FM_PD_018_3_Default->save_by_opoerator_packing) ? $FM_PD_018_3_Default->save_by_opoerator_packing :  null }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-right my-2">
                        Approved By <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modelId" data-input="verify_by">กดเพื่อบันทึกลายเซ็น</button>
                        PD.Line leader/Supervisor/IRF Time ......
                    </div>
                    <input type="hidden" name="verify_by" id="verify_by"
                        value="{{ !empty($FM_PD_018_3_Default->verify_by) ? $FM_PD_018_3_Default->verify_by :  null }}">
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12 text-right">
                        <button class="btn  btn-danger btn-lg " onclick="window.history.back();">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-lg btn-warning mx-1">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</form>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">บันทึกลายเซ็น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pass">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="pass" id="pass"
                        placeholder="ยืนยันรหัสผ่านเพื่อบันทึกลายเซ็น">
                    <input type="hidden" name="ID" id="ID">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal_save_pass">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>

<script>
    $('#modal_save_pass').on('click', function(e) {
        $('#'+$('#ID').val()).val($('#pass').val());
        $('#ID').val('');
        $('#pass').val('');
        $('#modelId').modal('hide')
    });
</script>

<script>
    //triggered when modal is about to be shown
    $('#modelId').on('show.bs.modal', function(e) {

        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('input');

        //populate the textbox
        $('input[name="pass"]').val($('#'+bookId).val());
        $(e.currentTarget).find('input[name="ID"]').val(bookId);
        // $('#'+bookId).find('input[name="pass"]').val(bookId);
    });
</script>

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
    $('#spoon_size1').click( function() {
        $('#img-spoon-1').show();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').hide();
    });

    $('#spoon_size2').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').show();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').hide();
    });

    $('#spoon_size3').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').show();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').hide();
    });

    $('#spoon_size4').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').show();
        $('#img-spoon-5').hide();
    });

    $('#spoon_size5').click( function() {
        $('#img-spoon-1').hide();
        $('#img-spoon-2').hide();
        $('#img-spoon-3').hide();
        $('#img-spoon-4').hide();
        $('#img-spoon-5').show();
    });
</script>
@endsection
@extends('layouts.master')

@section('title', 'FM-PD-018-1')

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
        font-size: 14px;
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

<form action="{{ url('/FM-PD-018-1/update/'.$id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($FM_PD_018_1 as $item)
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
                    <div class="col-md-4">
                        <label> Date: &nbsp;&nbsp; {{ date_format(now(),"Y-m-d") }}</label>
                        <input class="form-control" type="hidden" id="date" name="date"
                            value="{{ date_format(now(),"Y-m-d") }}">
                    </div>
                    <div class="col-md-8">
                        <label>PRODUCT NAME: {{ $item->material_description }}</label>
                        <input type="hidden" name="product_name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $item->production_order }}</label>
                        <input type="hidden" name="production_order" value="{{ $item->production_order }}">
                    </div>
                    <div class="col-md-6">
                        <label>BATCH: &nbsp;&nbsp; {{ $item->batch }}</label>
                        <input type="hidden" name="batch">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 py-2 bg-success text-white">
                        <p class="h3 box-title m-b-0" style="font-size: 15pt;">การตรวจสอบ RAW MATERIAL จาก WAREHOUSE</p>
                    </div>
                    <div class="col-md-12">
                        <p class="h5">ชนิดของนมที่ส่ง</p>
                    </div>
                    <div class="col-md-6">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">1.</span>
                            </div>
                            <input class="form-control" type="text" name="type_milk1" id="type_milk1"
                                value="{{ !empty($FM_PD_018_1_Default->type_milk1) ? $FM_PD_018_1_Default->type_milk1 :  null }}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">2.</span>
                            </div>
                            <input class="form-control" type="text" name="type_milk2" id="type_milk2"
                                value="{{ !empty($FM_PD_018_1_Default->type_milk2) ? $FM_PD_018_1_Default->type_milk2 :  null }}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">3.</span>
                            </div>
                            <input class="form-control" type="text" name="type_milk3" id="type_milk3"
                                value="{{ !empty($FM_PD_018_1_Default->type_milk3) ? $FM_PD_018_1_Default->type_milk3 :  null }}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">4.</span>
                            </div>
                            <input class="form-control" type="text" name="type_milk4" id="type_milk4"
                                value="{{ !empty($FM_PD_018_1_Default->type_milk4) ? $FM_PD_018_1_Default->type_milk4 :  null }}">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="clear_milk" id="clear_milk1"
                                        value="on"
                                        {{ (!empty($FM_PD_018_1_Default->clear_milk) && $FM_PD_018_1_Default->clear_milk == 'on') ? 'checked' : null  }}>
                                    <label class="custom-control-label" for="clear_milk1">
                                        ใช้นมชนิดเดิมผลิตต่อ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="clear_milk" id="clear_milk2"
                                        value="off"
                                        {{ (!empty($FM_PD_018_1_Default->clear_milk) && $FM_PD_018_1_Default->clear_milk == 'off') ? 'checked' : null }}>
                                    <label class="custom-control-label" for="clear_milk2">
                                        เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">RM.Code</p>
                    </div>

                    <div class="col-md-6">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">เบอร์ไซเฟอร์</p>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="rm_code1" id="rm_code1"
                                value="{{ !empty($FM_PD_018_1_Default->rm_code1) ? $FM_PD_018_1_Default->rm_code1 :  null }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="no_fiber1" id="no_fiber1"
                                value="{{ !empty($FM_PD_018_1_Default->no_fiber1) ? $FM_PD_018_1_Default->no_fiber1 :  null }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="rm_code2" id="rm_code2"
                                value="{{ !empty($FM_PD_018_1_Default->rm_code2) ? $FM_PD_018_1_Default->rm_code2 :  null }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="no_fiber2" id="no_fiber2"
                                value="{{ !empty($FM_PD_018_1_Default->no_fiber2) ? $FM_PD_018_1_Default->no_fiber2 :  null }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="rm_code3" id="rm_code3"
                                value="{{ !empty($FM_PD_018_1_Default->rm_code3) ? $FM_PD_018_1_Default->rm_code3 :  null }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="no_fiber3" id="no_fiber3"
                                value="{{ !empty($FM_PD_018_1_Default->no_fiber3) ? $FM_PD_018_1_Default->no_fiber3 :  null }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="rm_code4" id="rm_code4"
                                value="{{ !empty($FM_PD_018_1_Default->rm_code4) ? $FM_PD_018_1_Default->rm_code4 :  null }}">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="mdi mdi-border-color"></i></span>
                            </div>
                            <input class="form-control" type="text" name="no_fiber4" id="no_fiber4"
                                value="{{ !empty($FM_PD_018_1_Default->no_fiber4) ? $FM_PD_018_1_Default->no_fiber4 :  null }}">
                        </div>
                    </div>


                    <div class="col-md-12 text-right">
                        บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modelId" data-input="save_by_remove_bag">กดเพื่อบันทึกลายเซ็น</button>
                        (พนักงานถอดถุงนม)
                    </div>
                    <input type="hidden" name="save_by_remove_bag" id="save_by_remove_bag"
                        value="{{ !empty($FM_PD_018_1_Default->save_by_remove_bag) ? $FM_PD_018_1_Default->save_by_remove_bag :  null }}">
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 my-2 bg-success text-white">
                        <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">Process Flow
                            (รายละเอียดการผลิต)
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="my-2 font-weight-bold" style="font-size: 16pt;">เบลนเดอร์ที่ใช้</p>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="blender" id="blender1"
                                        value="1"
                                        {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '1') ? 'checked' : null }}>
                                    <label class="custom-control-label" for="blender1">
                                        เบลนเดอร์ 1 (Prebiotic)
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
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="blender" id="blender2"
                                        value="2"
                                        {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '2') ? 'checked' : null }}>
                                    <label class="custom-control-label" for="blender2">
                                        เบลนเดอร์ 2 (Prebiotic)
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
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="blender" id="blender3"
                                        value="3"
                                        {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '3') ? 'checked' : null }}>
                                    <label class="custom-control-label" for="blender3">
                                        เเบลนเดอร์ 1 และ สไมล์ (Synbiotic)
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
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="blender" id="blender4"
                                        value="4"
                                        {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '4') ? 'checked' : null }}>
                                    <label class="custom-control-label" for="blender4">
                                        ไอเอฟ เซกรีแคร์ (IF Segrecare)
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
                                        <input type="checkbox" name="filling1" id="line1" onclick="return false;"
                                            {{ (!empty($FM_PD_018_1_Default->filling1) && $FM_PD_018_1_Default->filling1 == 'on') ? 'checked' : null }}>
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
                                        <input type="checkbox" name="filling4" id="line4" onclick="return false;"
                                            {{ (!empty($FM_PD_018_1_Default->filling4) && $FM_PD_018_1_Default->filling4 == 'on') ? 'checked' : null }}>
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
                                        <input type="checkbox" name="filling2" id="line2" onclick="return false;"
                                            {{ (!empty($FM_PD_018_1_Default->filling2) && $FM_PD_018_1_Default->filling2 == 'on') ? 'checked' : null }}>
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
                                        <input type="checkbox" name="filling5" id="line5" onclick="return false;"
                                            {{ (!empty($FM_PD_018_1_Default->filling5) && $FM_PD_018_1_Default->filling5 == 'on') ? 'checked' : null }}>
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
                                        <input type="checkbox" name="filling3" id="line3" onclick="return false;"
                                            {{ (!empty($FM_PD_018_1_Default->filling3) && $FM_PD_018_1_Default->filling3 == 'on') ? 'checked' : null }}>
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
                                        <input type="checkbox" name="filling6" id="line6" onclick="return false;"
                                            {{ (!empty($FM_PD_018_1_Default->filling6) && $FM_PD_018_1_Default->filling6 == 'on') ? 'checked' : null }}>
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
                            data-target="#modelId" data-input="save_by_poue_milk">กดเพื่อบันทึกลายเซ็น</button>
                        (พนักงานเทนม)
                    </div>
                    <input type="hidden" name="save_by_poue_milk" id="save_by_poue_milk"
                        value="{{ !empty($FM_PD_018_1_Default->save_by_poue_milk) ? $FM_PD_018_1_Default->save_by_poue_milk :  null }}">
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12 text-right">
                        {{-- <button class="btn btn-info" disabled>
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-warning" disabled>
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button> --}}
                        <button class="btn btn-danger btn-lg " type="button" onclick="window.history.back();">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-lg btn-warning mx-1">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                        {{-- <button class="btn btn-dark">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </button> --}}
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
@endsection
@extends('layouts.master')

@section('title', 'FM-PD-018-2')

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
<form action="{{ url('/FM-PD-018-2/update/'. $id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($FM_PD_018_2 as $item)
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
                    <div class="col-md-12">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">หมายเลขสูตรการผลิต</p>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="no_formula" id="no_formula"
                                value="{{ $item->material_number }}">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="my-2 font-weight-bold" style="font-size: 16pt;">
                                                Ribbon ที่ใช้
                                            </p>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="ribbon1"
                                                    name="ribbon" value="1"
                                                    {{ (!empty($FM_PD_018_2_Default->ribbon) && $FM_PD_018_2_Default->ribbon == '1') ? 'checked' : null  }}>
                                                <label class="custom-control-label" for="ribbon1">
                                                    Ribbon อาร์ตเวิร์ค
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="ribbon2"
                                                    name="ribbon" value="2"
                                                    {{ (!empty($FM_PD_018_2_Default->ribbon) && $FM_PD_018_2_Default->ribbon == '2') ? 'checked' : null  }}>
                                                <label class="custom-control-label" for="ribbon2">
                                                    Ribbon คอมม่อน
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="my-2 font-weight-bold" style="font-size: 16pt;">
                                                บันทึกการเปลี่ยนผลิตภัณฑ์
                                            </p>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio"
                                                    id="product_change_log1" name="product_change_log"
                                                    onclick="changeProduct(this.value)" value="1"
                                                    {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '1') ? 'checked' : null  }}>
                                                <label class="custom-control-label" for="product_change_log1">
                                                    เดินผลิตภัณฑ์ตัวแรกของสัปดาห์
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio"
                                                    id="product_change_log2" name="product_change_log"
                                                    onclick="changeProduct(this.value)" value="2"
                                                    {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '2') ? 'checked' : null  }}>
                                                <label class="custom-control-label" for="product_change_log2">
                                                    ไม่มีการเปลี่ยนสูตรผลิตภัณฑ์
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio"
                                                    id="product_change_log3" name="product_change_log"
                                                    onclick="changeProduct(this.value)" value="3"
                                                    {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '3') ? 'checked' : null  }}>
                                                <label class="custom-control-label" for="product_change_log3">
                                                    มีการเปลี่ยนสูตรผลิตภัณฑ์
                                                </label>
                                            </div>
                                            <div class="row pl-4">
                                                <div class="col-md-12" style="font-size: 16pt;">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '3') ? null : 'disabled'  }}
                                                            name="sub_producct_change_log" id="sub_producct_change_log1"
                                                            value="1"
                                                            {{ (!empty($FM_PD_018_2_Default->sub_producct_change_log) && $FM_PD_018_2_Default->sub_producct_change_log == '1') ? 'checked' : null  }}>
                                                        <label class="custom-control-label" for="sub_producct_change_log1" style="font-size: 12pt;">
                                                            ไม่มีนมตกค้างใน Blender/Hopper
                                                        </label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '3') ? null : 'disabled'  }}
                                                            name="sub_producct_change_log" id="sub_producct_change_log2"
                                                            value="2"
                                                            {{ (!empty($FM_PD_018_2_Default->sub_producct_change_log) && $FM_PD_018_2_Default->sub_producct_change_log == '2') ? 'checked' : null  }}>
                                                        <label class="custom-control-label" for="sub_producct_change_log2" style="font-size: 12pt;">
                                                            ไม่มีนมตกค้างใน Seperator/Vibrator sieve
                                                        </label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '3') ? null : 'disabled'  }}
                                                            name="sub_producct_change_log" id="sub_producct_change_log3"
                                                            value="3"
                                                            {{ (!empty($FM_PD_018_2_Default->sub_producct_change_log) && $FM_PD_018_2_Default->sub_producct_change_log == '3') ? 'checked' : null  }}>
                                                        <label class="custom-control-label" for="sub_producct_change_log3" style="font-size: 12pt;">
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
                    </div>
                    <div class="col-md-12">
                        <p class="my-2 font-weight-bold" style="font-size: 16pt;">ตรวจสอบความถูกต้องของ Foil</p>
                        <div class="col-md-12">
                            <p class="my-2 text-center" style="font-size: 16pt;">ถ่ายตัวอย่างซองที่มี Art Work</p>
                        </div>
                        <div class="col-md-12">
                            <div class="card text-left">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-center">(ตัวอย่าง แบบที่1)</h5>
                                                    <p class="text-center">IFFO/P&BF</p>
                                                </div>
                                                <div class="col-md-12 align-self-center">
                                                    <input type="file" id="art_work_pic1" name="art_work_pic1"
                                                        class="dropify"
                                                        data-default-file="{{ !empty($FM_PD_018_2_art_work_Default->pic1) ? asset('assets/FM-PD-018/artwork/'.$FM_PD_018_2_art_work_Default->pic1) : null }}" />
                                                </div>
                                                กรณีเป็นการเช็คช้อนในกล่องนม
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-center">(ตัวอย่าง แบบที่2)</h5>
                                                    <p class="text-center">GUM PRODUCT</p>
                                                </div>
                                                <div class="col-md-12 align-self-center">
                                                    <input type="file" id="art_work_pic2" name="art_work_pic2"
                                                        class="dropify"
                                                        data-default-file="{{ !empty($FM_PD_018_2_art_work_Default->pic2) ? asset('assets/FM-PD-018/artwork/'.$FM_PD_018_2_art_work_Default->pic2) : null }}" />
                                                    กรณีผลิตช้อนใส่ในกล่องนม
                                                </div>
                                            </div>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">แบชผลิตภัณฑ์</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="product_batch" id="product_batch"
                                    value="{{ !empty($FM_PD_018_2_Default->product_batch) ? $FM_PD_018_2_Default->product_batch :  null }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 align-self-center text-center">
                                <input type="file" id="file" name="file" class="dropify"
                                    data-default-file="{{!empty($FM_PD_018_2_Default->file) ? asset('assets/FM-PD-018/'.$FM_PD_018_2_Default->file) : null}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>ความถูกต้องของการพิมพ์</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <label class="container">ชื่อผลิตภัณฑ์
                                        <input type="checkbox" class="custom-control-input" id="product_name"
                                            name="product_name"
                                            {{ (!empty($FM_PD_018_2_Default->product_name) && $FM_PD_018_2_Default->product_name == 'on') ? 'checked' : null  }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <label class="container">เวลา
                                        <input type="checkbox" class="custom-control-input" id="time" name="time"
                                            {{ (!empty($FM_PD_018_2_Default->time) && $FM_PD_018_2_Default->time == 'on') ? 'checked' : null  }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <label class="container">วันที่ผลิต
                                        <input type="checkbox" class="custom-control-input" id="product_date"
                                            name="product_date"
                                            {{ (!empty($FM_PD_018_2_Default->product_date) && $FM_PD_018_2_Default->product_date == 'on') ? 'checked' : null  }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <label class="container">วันหมดอายุ
                                        <input type="checkbox" class="custom-control-input" id="exp_date"
                                            name="exp_date"
                                            {{ (!empty($FM_PD_018_2_Default->exp_date) && $FM_PD_018_2_Default->exp_date == 'on') ? 'checked' : null  }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <label class="container">แบช
                                        <input type="checkbox" class="custom-control-input" id="batch" name="batch"
                                            {{ (!empty($FM_PD_018_2_Default->batch) && $FM_PD_018_2_Default->batch == 'on') ? 'checked' : null  }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <label class="container">ออเดอร์/ไลน์
                                        <input type="checkbox" class="custom-control-input" id="order" name="order"
                                            {{ (!empty($FM_PD_018_2_Default->order) && $FM_PD_018_2_Default->order == 'on') ? 'checked' : null  }}>
                                        <span class="checkmark"></span>
                                    </label>
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

                <div class="row">
                    <div class="col-md-12 my-2 bg-success text-white">
                        <p class="h6 my-2 font-weight-bold" style="font-size: 18pt;">
                            ข้อมูลผลิตภัณฑ์เดิมที่แพ็คก่อนหน้านี้
                        </p>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ผลิตภัณฑ์</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="product" id="product"
                                        value="{{ !empty($FM_PD_018_2_Default->product) ? $FM_PD_018_2_Default->product : null  }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2 text-right">
                            บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modelId" data-input="save_by">กดเพื่อบันทึกลายเซ็น</button>
                            (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                        </div>
                        <input type="hidden" name="save_by" id="save_by"
                            value="{{ !empty($FM_PD_018_2_Default->save_by) ? $FM_PD_018_2_Default->save_by :  null }}">

                        <div class="col-md-12 mt-2 text-right">
                            ตรวจสอบโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modelId" data-input="verify_by">กดเพื่อบันทึกลายเซ็น</button>
                            (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                        </div>
                        <input type="hidden" name="verify_by" id="verify_by"
                            value="{{ !empty($FM_PD_018_2_Default->verify_by) ? $FM_PD_018_2_Default->verify_by :  null }}">
                    </div>
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
    function changeProduct(value) {
        if(value != 3) {
            $('input[name="sub_producct_change_log"]').attr('disabled', true);
        } else {
            $('input[name="sub_producct_change_log"]').attr('disabled', false);
        }
    }
</script>
@endsection
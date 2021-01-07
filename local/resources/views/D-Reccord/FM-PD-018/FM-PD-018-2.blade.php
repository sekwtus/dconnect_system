@extends('layouts.master')

@section('title', 'FM-PD-018-2')

@section('style')

@endsection

@section('main')
<form action="{{ url('/FM-PD-018-2/save/'.$sheet.'/'. $production_order) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($FM_PD_018_2 as $item)
    <div class="row mt-3">
        <div class="col-md-12 px-0">
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
                            {{-- <p class="my-2 font-weight-bold" style="font-size: 12pt;">หมายเลขสูตรการผลิต</p>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="no_formula" id="no_formula"
                                    value="$item->material_number">
                            </div> --}}
                            <h4 class="font-weight-bold">
                                <u>Ribbon ที่ใช้</u>
                            </h4>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="container">
                                    &nbsp;&nbsp;Ribbon อาร์ตเวิร์ค
                                    <input type="radio" name="ribbon" value="1"{{ (!empty($FM_PD_018_2_Default->ribbon) && $FM_PD_018_2_Default->ribbon == '1') ? 'checked' : null }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="container">
                                    &nbsp;&nbsp;Ribbon คอมม่อน
                                    <input type="radio" name="ribbon" value="2" {{ (!empty($FM_PD_018_2_Default->ribbon) && $FM_PD_018_2_Default->ribbon=='2') ?'checked':null }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4 class="font-weight-bold">
                                <u>บันทึกการเปลี่ยนผลิตภัณฑ์</u>
                            </h4>

                            <div class="input-group">
                                <label class="container">
                                    &nbsp;&nbsp;เดินผลิตภัณฑ์ตัวแรกของสัปดาห์
                                    <input type="radio"
                                        id="product_change_log1" name="product_change_log"
                                        onclick="changeProduct(this.value)" value="1"
                                        {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log=='1') ?'checked':null }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="input-group">
                                <label class="container">
                                    &nbsp;&nbsp;มีการเปลี่ยนสูตรผลิตภัณฑ์
                                    <input type="radio" name="product_change_log" value="2"
                                        onclick="changeProduct(this.value)"
                                        {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log=='2') ?'checked':null }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="input-group">
                                <label class="container">
                                    &nbsp;&nbsp;ไม่มีการเปลี่ยนสูตรผลิตภัณฑ์
                                    <input type="radio" name="product_change_log" value="3" 
                                        onclick="changeProduct(this.value)"
                                        {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log=='3') ?'checked':null }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            
                            <div class="row pl-4 sub_product_change_log 
                                {{-- @if (!empty($FM_PD_018_2_Default->product_change_log))
                                    @if($FM_PD_018_2_Default->product_change_log!='3')
                                        {{ 'd-none' }}
                                    @endif
                                @endif --}}
                                ">
                                
                                <div class="col-md-12">
                                    @php
                                        $arr_sub_product_change_log = !empty($FM_PD_018_2_Default->product_change_log) ?explode(',', $FM_PD_018_2_Default->sub_product_change_log) :array();
                                    @endphp

                                    <div class="input-group">
                                        <label class="container">
                                            &nbsp;&nbsp;ไม่มีนมตกค้างใน Blender/Hopper 
                                            {{-- {{ $FM_PD_018_2_Default->product_change_log }} --}}
                                            <input type="checkbox"
                                                {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log!='3') ?'disabled' :'' }}
                                                name="sub_product_change_log[]"
                                                value="1"
                                                {{ (!empty($FM_PD_018_2_Default->sub_product_change_log) && (string)in_array('1', $arr_sub_product_change_log)) ?'checked' :null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="input-group">
                                        <label class="container">
                                            &nbsp;&nbsp;ไม่มีนมตกค้างใน Seperator/Vibrator sieve
                                            <input type="checkbox"
                                                {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log!='3') ?'disabled' :'' }}
                                                name="sub_product_change_log[]"
                                                value="2"
                                                {{ (!empty($FM_PD_018_2_Default->sub_product_change_log) && (string)in_array('2', $arr_sub_product_change_log)) ?'checked' :null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="input-group">
                                        <label class="container">
                                            &nbsp;&nbsp;ไม่มีนมตกค้างในเครื่องบรรจุ
                                            <input type="checkbox"
                                                {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log!='3') ?'disabled' :'' }}
                                                name="sub_product_change_log[]"
                                                value="3"
                                                {{ (!empty($FM_PD_018_2_Default->sub_product_change_log) && (string)in_array('3', $arr_sub_product_change_log)) ?'checked' :null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="my-2 font-weight-bold" style="font-size: 12pt;">
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
                                                    <input class="custom-control-input" type="radio"
                                                        {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '3') ? null : 'disabled'  }}
                                                        name="sub_product_change_log" id="sub_product_change_log1"
                                                        value="1"
                                                        {{ (!empty($FM_PD_018_2_Default->sub_product_change_log) && $FM_PD_018_2_Default->sub_product_change_log == '1') ? 'checked' : null  }}>
                                                    <label class="custom-control-label"
                                                        for="sub_product_change_log1" style="font-size: 12pt;">
                                                        ไม่มีนมตกค้างใน Blender/Hopper
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio"
                                                        {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '3') ? null : 'disabled'  }}
                                                        name="sub_product_change_log" id="sub_product_change_log2"
                                                        value="2"
                                                        {{ (!empty($FM_PD_018_2_Default->sub_product_change_log) && $FM_PD_018_2_Default->sub_product_change_log == '2') ? 'checked' : null  }}>
                                                    <label class="custom-control-label"
                                                        for="sub_product_change_log2" style="font-size: 12pt;">
                                                        ไม่มีนมตกค้างใน Seperator/Vibrator sieve
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio"
                                                        {{ (!empty($FM_PD_018_2_Default->product_change_log) && $FM_PD_018_2_Default->product_change_log == '3') ? null : 'disabled'  }}
                                                        name="sub_product_change_log" id="sub_product_change_log3"
                                                        value="3"
                                                        {{ (!empty($FM_PD_018_2_Default->sub_product_change_log) && $FM_PD_018_2_Default->sub_product_change_log == '3') ? 'checked' : null  }}>
                                                    <label class="custom-control-label"
                                                        for="sub_product_change_log3" style="font-size: 12pt;">
                                                        ไม่มีนมตกค้างในเครื่องบรรจุ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="row mt-4">

                        <div class="col-md-12">
                            <h4 class="font-weight-bold">
                                <u>ตรวจสอบความถูกต้องของ Foil</u>
                            </h4>

                            <p class="mt-2 text-center">
                                ถ่ายรูปตัวอย่างซองที่มี Art Work (กรณีที่มี Art Work)
                            </p>
                            
                            <div class="row">
                                <!--
                                    <div class="col-md-12">
                                        <h5 class="text-center" style="font-size: 10pt;">(ตัวอย่าง แบบที่1)
                                        </h5>
                                        <p class="text-center" style="font-size: 10pt;">IFFO/P&BF</p>
                                    </div> 
                                    กรณีเป็นการเช็คช้อนในกล่องนม
                                -->
                                <div class="col-md-12 text-center">
                                    <input type="file" id="art_work_pic1" name="art_work_pic1" class="dropify" data-height="200"
                                        data-default-file="{{ !empty($FM_PD_018_2_art_work_Default->pic1) ? asset('assets/FM-PD-018/artwork/'.$FM_PD_018_2_art_work_Default->pic1) : null }}" />
                                </div>
                                
                                {{-- <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-center" style="font-size: 10pt;">(ตัวอย่าง แบบที่2)
                                            </h5>
                                            <p class="text-center" style="font-size: 10pt;">GUM PRODUCT</p>
                                        </div>
                                        <div class="col-md-12 align-self-center">
                                            <input type="file" id="art_work_pic2" name="art_work_pic2"
                                                class="dropify"
                                                data-default-file="{{ !empty($FM_PD_018_2_art_work_Default->pic2) ? asset('assets/FM-PD-018/artwork/'.$FM_PD_018_2_art_work_Default->pic2) : null }}" />
                                            กรณีผลิตช้อนใส่ในกล่องนม
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="col-md-12">
                            {{-- <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">แบชผลิตภัณฑ์</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="product_batch" id="product_batch"
                                        value="{{ !empty($FM_PD_018_2_Default->product_batch) ? $FM_PD_018_2_Default->product_batch :  null }}">
                                </div>
                            </div> --}}
                            <p class="my-2 text-center" style="font-size: 12pt;">แบชผลิตภัณฑ์</p>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <input type="file" id="file" name="file" class="dropify" data-height="200" {{ empty($FM_PD_018_2_Default->file) ?'required' :'' }}
                                    data-default-file="{{!empty($FM_PD_018_2_Default->file) ? asset('assets/FM-PD-018/'.$FM_PD_018_2_Default->file) : null}}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <h4 class="font-weight-bold">
                                <u>ความถูกต้องของการพิมพ์</u>
                            </h4>

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
                    
                    <div class="row mt-4">
                        {{-- <div class="col-md-12 my-2 bg-success text-white">
                            <p class="h6 my-2 font-weight-bold" style="font-size: 14pt;">
                                ข้อมูลผลิตภัณฑ์เดิมที่แพ็คก่อนหน้านี้
                            </p>
                        </div> --}}

                        <div class="col-md-12">
                            <h4 class="font-weight-bold">
                                <u>ข้อมูลผลิตภัณฑ์เดิมที่แพ็คก่อนหน้านี้</u>
                            </h4>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ผลิตภัณฑ์</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="product" id="product"
                                        value="{{ !empty($FM_PD_018_2_Default->product) ? $FM_PD_018_2_Default->product : null  }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <h4 class="font-weight-bold">
                                <u>บันทึกโดย</u>
                            </h4>

                            <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="{{ !empty($FM_PD_018_2_Default->save_by) ?$FM_PD_018_2_Default->save_by :'' }}">
                            <div id="sign_operator" class="{{ !empty($FM_PD_018_2_Default->save_by) ?'' :'d-none' }}">
                                <img src="{{ !empty($FM_PD_018_2_Default->save_by) ?asset('/assets/images/sign/'.$FM_PD_018_2_Default->save_by) :'' }}"
                                        width="145">
                                <br> ( {{ isset($FM_PD_018_2_Default->save_by_name)? $FM_PD_018_2_Default->save_by_name : null }} ) <br>

                            </div>
                            
                            @if(empty($FM_PD_018_2_Default->save_by))
                                <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal"
                                    {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_018_2_Default->save_by)) ? 'disabled' : null }}>
                                    <i class="fas fa-signature"></i>
                                    กดเพื่อบันทึกลายเซ็น
                                </button> 
                            @endif
                            (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <h4 class="font-weight-bold">
                                <u>ตรวจสอบโดย</u>
                            </h4>
                            
                            <input type="hidden" name="txt_sign_operator1" id="txt_sign_operator1" value="{{ !empty($FM_PD_018_2_Default->verify_by) ?$FM_PD_018_2_Default->verify_by :'' }}">
                            <div id="sign_operator1" class="{{ !empty($FM_PD_018_2_Default->verify_by) ?'' :'d-none' }}">
                                <img src="{{ !empty($FM_PD_018_2_Default->verify_by) ?asset('/assets/images/sign/'.$FM_PD_018_2_Default->verify_by) :'' }}"
                                        width="145">
                                <br> ( {{ isset($FM_PD_018_2_Default->verify_by_name)? $FM_PD_018_2_Default->verify_by_name : null }} ) <br>

                            </div>
                            
                            @if(empty($FM_PD_018_2_Default->verify_by))
                                <button type="button" id="btn_sign_operator1" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator1_modal"
                                    data-input="save_by_remove_bag"
                                    {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_018_2_Default->verify_by)) ? 'disabled' : null }}>
                                    <i class="fas fa-signature"></i>
                                    กดเพื่อบันทึกลายเซ็น
                                </button> 
                            @endif
                            (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                        </div>
                        {{-- <input type="hidden" name="verify_by" id="verify_by"
                            value="{{ !empty($FM_PD_018_2_Default->verify_by) ? $FM_PD_018_2_Default->verify_by :  null }}"> --}}
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>

                    <div class="row text-center">
                        @if (empty($FM_PD_018_2_Default) || $FM_PD_018_2_Default->save_by==null || $FM_PD_018_2_Default->verify_by==null)
                            <div class="col-lg-6 col-md-6">
                                <button id="btn-save" class="btn btn-lg btn-block btn-success btn-check">
                                    <i class="fa fa-save"></i> บันทึก
                                </button>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <button type="reset" class="btn btn-lg btn-block btn-danger">
                                    <i class="fa fa-times"></i> ยกเลิก
                                </button>
                            </div>
                        @endif

                        <div class="col-lg-12 col-md-12 mt-4">
                            <button type="button" class="btn btn-lg btn-block btn-info" onclick="window.location.href='{{ url('printer_monitor/'.$production_order) }}'">
                                <i class="fa fa-undo"></i> ย้อนกลับ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</form>

<!-- Modal ลายเซ็น operator บันทึก -->
<div class="modal fade" id="sign_operator_modal" tabindex="-1" role="dialog" aria-hidden="true"
    aria-labelledby="vcenter">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="">กรอกรหัสผ่านเพื่อบันทึกลายเซ็น</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="password" class="form-control" name="pass_sign" id="pass_sign_operator" placeholder="รหัสผ่าน">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="check_pass_sign('sign_operator', {{ $production_order }})" class="btn btn-lg btn-block btn-success">
                   บันทึก
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ลายเซ็น operator ตรวจสอบ -->
<div class="modal fade" id="sign_operator1_modal" tabindex="-1" role="dialog" aria-hidden="true"
    aria-labelledby="vcenter">
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
                <input type="password" class="form-control" name="pass_sign" id="pass_sign_operator1" placeholder="รหัสผ่าน">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="check_pass_sign('sign_operator1', {{ $production_order }})" class="btn btn-lg btn-block btn-success">
                   บันทึก
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>

<script>
    $('.btn-check').click(function (e) { 
        // e.preventDefault();
        var submit;
        if(!$("#product_name").is(':checked')) {
            alert('กรุณาตรวจสอบความถูกต้องของชื่อผลิตภัณฑ์');
            return false;
        } 
        else if(!$("#time").is(':checked')){
            alert('กรุณาตรวจสอบความถูกต้องของเวลา');
            return false;
        } 
        else if(!$("#product_date").is(':checked')){
            alert('กรุณาตรวจสอบความถูกต้องของวันที่ผลิต');
            return false;
        }
        else if(!$("#exp_date").is(':checked')){
            alert('กรุณาตรวจสอบความถูกต้องของวันหมดอายุ');
            return false;
        }
        else if(!$("#batch").is(':checked')){
            alert('กรุณาตรวจสอบความถูกต้องของแบช');
            return false;
        }
        else if(!$("#order").is(':checked')){
            alert('กรุณาตรวจสอบความถูกต้องของออเดอร์/ไลน์');
            return false;
        } 

        // console.log(submit); 
        // return submit;
    });
    function changeProduct(value) {
        if(value != 3) {
            // $('.sub_product_change_log').hide();
            $('input[name="sub_product_change_log"]').attr('disabled', true);
        } else {
            // $('.sub_product_change_log').show();
            $('input[name="sub_product_change_log"]').attr('disabled', false);
        }
    }

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
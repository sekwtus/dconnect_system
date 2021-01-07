@extends('layouts.master')

@section('title', 'FM-PD-018')

@section('style')

@endsection

@section('main')
<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/FM-PD-018/update/'.$production_order) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a target="_blank" href="{{url('/FM-PD-018/print/'.$production_order)}}">
                            <button type="button" class="btn btn-primary btn-lg btn-block">
                                <i class="fa fa-print fa-lg"></i> พิมพ์ 
                            </button>
                        </a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        @foreach ($order_sheet_1 as $I => $count_sheets)
                        <table class="tbl-paperless">
                            
                            <tr>
                                <th style="width:%;">
                                    ชื่อผลิตภัณฑ์ 
                                    {{ $head[0]->material_description }}
                                </th>

                                <th style="width:50%;">
                                    วันที่
                                    {{ th_date_scheduled_start($head[0]->scheduled_start) }}

                                    <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $head[0]->production_order }}</label>
                                    <label>BATCH: &nbsp;&nbsp; {{ $head[0]->batch }}</label>
                                </th>
                            </tr>

                            <!-- 018-1 mixing -->
                            <tr>
                                <td class="align-top">
                                    <u>การตรวจสอบ RAW MATERIAL จาก WHEREHOUSE</u>
                                    <input type="hidden" name="order018-1" value="{{ empty($FM_PD_018_1[$I]->order) ? '0' : $FM_PD_018_1[$I]->order }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="container">
                                                ใช้นมชนิดเดิมผลิตต่อ
                                                <input type="radio" name="clear_milk[{{ $I }}]" value="on"
                                                    {{ (!empty($FM_PD_018_1[$I]->clear_milk) && $FM_PD_018_1[$I]->clear_milk == 'on') ?'checked' :null }}>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container">
                                                เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย
                                                <input type="radio" name="clear_milk[{{ $I }}]" value="off"
                                                    {{ (!empty($FM_PD_018_1[$I]->clear_milk) && $FM_PD_018_1[$I]->clear_milk == 'off') ?'checked' :null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <span>ชนิดของนมที่ส่ง</span>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">1.</span>
                                                </div>
                                                <input name="type_milk1[{{ $I }}]" class="form-control form-control-sm"
                                                    placeholder="กรอกชนิดของนมที่ส่ง"
                                                    value="{{ !empty($FM_PD_018_1[$I]->type_milk1) ?$FM_PD_018_1[$I]->type_milk1 :null }}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">2.</span>
                                                </div>
                                                <input name="type_milk2[{{ $I }}]" class="form-control form-control-sm"
                                                    placeholder="กรอกชนิดของนมที่ส่ง"
                                                    value="{{ !empty($FM_PD_018_1[$I]->type_milk2) ?$FM_PD_018_1[$I]->type_milk2 :null }}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">2.</span>
                                                </div>
                                                <input name="type_milk3[{{ $I }}]" class="form-control form-control-sm"
                                                    placeholder="กรอกชนิดของนมที่ส่ง"
                                                    value="{{ !empty($FM_PD_018_1[$I]->type_milk3) ?$FM_PD_018_1[$I]->type_milk3 :null }}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">4.</span>
                                                </div>
                                                <input name="type_milk4[{{ $I }}]" class="form-control form-control-sm"
                                                    placeholder="กรอกชนิดของนมที่ส่ง"
                                                    value="{{ !empty($FM_PD_018_1[$I]->type_milk4) ?$FM_PD_018_1[$I]->type_milk4 :null }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <span>RM. Code</span>

                                            <table>
                                                <tr>
                                                    <td class="text-center">หมายเลข RM</td>
                                                    <td class="text-center">เบอร์ไซเฟอร์</td>
                                                </tr>

                                                <tr>
                                                    <td class="">
                                                        <div class="input-group input-group-sm mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="rm_code1[{{ $I }}]" id="rm_code1"
                                                                class="form-control form-control-sm form-control form-control-sm-lg"
                                                                placeholder="กรอก RM. Code"
                                                                value="{{ !empty($FM_PD_018_1[$I]->rm_code1) ?$FM_PD_018_1[$I]->rm_code1 :null }}">
                                                        </div>

                                                        <div class="input-group input-group-sm mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="rm_code2[{{ $I }}]" id="rm_code2"
                                                                class="form-control form-control-sm form-control form-control-sm-lg"
                                                                placeholder="กรอก RM. Code"
                                                                value="{{ !empty($FM_PD_018_1[$I]->rm_code2) ?$FM_PD_018_1[$I]->rm_code2 :null }}">
                                                        </div>

                                                        <div class="input-group input-group-sm mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="rm_code3[{{ $I }}]" id="rm_code3"
                                                                class="form-control form-control-sm form-control form-control-sm-lg"
                                                                placeholder="กรอก RM Code"
                                                                value="{{ !empty($FM_PD_018_1[$I]->rm_code3) ? $FM_PD_018_1[$I]->rm_code3 :  null }}">
                                                        </div>

                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="rm_code4[{{ $I }}]" id="rm_code4"
                                                                class="form-control form-control-sm"
                                                                placeholder="กรอก RM Code"
                                                                value="{{ !empty($FM_PD_018_1[$I]->rm_code4) ?$FM_PD_018_1[$I]->rm_code4 :null }}">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="input-group input-group-sm mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="no_fiber1[{{ $I }}]" class="form-control form-control-sm"
                                                                placeholder="กรอกเบอร์ไซเฟอร์"
                                                                value="{{ !empty($FM_PD_018_1[$I]->no_fiber1) ? $FM_PD_018_1[$I]->no_fiber1 :  null }}">
                                                        </div>

                                                        <div class="input-group input-group-sm mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="no_fiber2[{{ $I }}]" class="form-control form-control-sm"
                                                                placeholder="กรอกเบอร์ไซเฟอร์"
                                                                value="{{ !empty($FM_PD_018_1[$I]->no_fiber2) ?$FM_PD_018_1[$I]->no_fiber2 :null }}">
                                                        </div>

                                                        <div class="input-group input-group-sm mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="no_fiber3[{{ $I }}]" class="form-control form-control-sm"
                                                                placeholder="กรอกเบอร์ไซเฟอร์"
                                                                value="{{ !empty($FM_PD_018_1[$I]->no_fiber3) ?$FM_PD_018_1[$I]->no_fiber3 :null }}">
                                                        </div>

                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="mdi mdi-border-color"></i></span>
                                                            </div>
                                                            <input name="no_fiber4[{{ $I }}]" class="form-control form-control-sm"
                                                                placeholder="กรอกเบอร์ไซเฟอร์"
                                                                value="{{ !empty($FM_PD_018_1[$I]->no_fiber4) ?$FM_PD_018_1[$I]->no_fiber4 :null }}">
                                                        </div>
                                                    </td>
                                                </tr>


                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class=" col-md-12 text-center">
                                            บันทึกโดย
                                            @if(!empty($FM_PD_018_1[$I]->save_by_remove_bag))
                                                <div>
                                                    <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_1[$I]->save_by_remove_bag) }}"
                                                        width="145">
                                                <br> ( {{ $FM_PD_018_1[$I]->remove_bag_name }} ) <br>
                                                </div>
                                            @endif
                                            <div>(พนักงานถอดถุงนม mixing)</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="align-top">
                                    <u>Process Flow (รายละเอียดการผลิต)</u>

                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <span>หมายเลขสูตรการผลิต</span>
                                            <input type="" name="no_formula[{{ $I }}]" class="form-control form-control-sm"
                                                placeholder="หมายเลขสูตรการผลิต"
                                                value="{{ !empty($FM_PD_018_1[$I]->no_formula) ?$FM_PD_018_1[$I]->no_formula :null }}">
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <table class="tbl-paperless">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center" style="width:50%;">
                                                            เบลนเดอร์ที่ใช้
                                                        </td>
                                                        <td class="text-center" style="width:50%;">
                                                            เครื่องบรรจุที่ใช้
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label class="container">
                                                                เบลนเดอร์ 1 (Prebiotic)
                                                                <input type="radio" name="blender[{{ $I }}]" id="blender1"
                                                                    value="1"
                                                                    {{ (!empty($FM_PD_018_1[$I]->blender) && $FM_PD_018_1[$I]->blender == '1') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                เบลนเดอร์ 2 (Prebiotic)
                                                                <input type="radio" name="blender[{{ $I }}]" id="blender2"
                                                                    value="2"
                                                                    {{ (!empty($FM_PD_018_1[$I]->blender) && $FM_PD_018_1[$I]->blender == '2') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                เเบลนเดอร์ 1 และ สไมล์ (Synbiotic)
                                                                <input type="radio" name="blender[{{ $I }}]" id="blender3"
                                                                    value="3"
                                                                    {{ (!empty($FM_PD_018_1[$I]->blender) && $FM_PD_018_1[$I]->blender == '3') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                ไอเอฟ เซกรีแคร์ (IF Segrecare)
                                                                <input type="radio" name="blender[{{ $I }}]" id="blender4"
                                                                    value="4"
                                                                    {{ (!empty($FM_PD_018_1[$I]->blender) && $FM_PD_018_1[$I]->blender == '4') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>

                                                        <td>
                                                            <label class="container">
                                                                Filling line 1
                                                                <input type="checkbox" name="filling1[{{ $I }}]" id="line1"
                                                                    onclick="return false;"
                                                                    {{ (!empty($FM_PD_018_1[$I]->filling1) && $FM_PD_018_1[$I]->filling1 == 'on') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                Filling line 2
                                                                <input type="checkbox" name="filling2[{{ $I }}]" id="line2"
                                                                    onclick="return false;"
                                                                    {{ (!empty($FM_PD_018_1[$I]->filling2) && $FM_PD_018_1[$I]->filling2 == 'on') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                Filling line 3
                                                                <input type="checkbox" name="filling3[{{ $I }}]" id="line3"
                                                                    onclick="return false;"
                                                                    {{ (!empty($FM_PD_018_1[$I]->filling3) && $FM_PD_018_1[$I]->filling3 == 'on') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                Filling line 4
                                                                <input type="checkbox" name="filling4[{{ $I }}]" id="line4"
                                                                    onclick="return false;"
                                                                    {{ (!empty($FM_PD_018_1[$I]->filling4) && $FM_PD_018_1[$I]->filling4 == 'on') ?'checked' : null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                Filling line 5
                                                                <input type="checkbox" name="filling5[{{ $I }}]" id="line5"
                                                                    onclick="return false;"
                                                                    {{ (!empty($FM_PD_018_1[$I]->filling5) && $FM_PD_018_1[$I]->filling5 == 'on') ?'checked' : null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                Filling line 6
                                                                <input type="checkbox" name="filling6[{{ $I }}]" id="line6"
                                                                    onclick="return false;"
                                                                    {{ (!empty($FM_PD_018_1[$I]->filling6) && $FM_PD_018_1[$I]->filling6 == 'on') ?'checked' : null }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12 text-center">
                                            บันทึกโดย
                                            @if(!empty($FM_PD_018_1[$I]->save_by_poue_milk))
                                            <div class=" align-self-end">
                                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_1[$I]->save_by_poue_milk) }}"
                                                    width="145">
                                            </div>
                                            <br> ( {{ $FM_PD_018_1[$I]->poue_milk_name }} ) <br>
                                            @endif

                                            <div class="">(พนักงานเทนม mixing)</div>
                                            {{-- <span class="align-text-bottom">text-bottom</span> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        <!-- 018-2 filling -->
                            <tr>
                                
                                <td style="vertical-align: top;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <u>Ribbon ที่ใช้</u>
                                            <input type="hidden" name="order018-2" value="{{ empty($FM_PD_018_2[$I]->order_sheet) ? '0' : $FM_PD_018_2[$I]->order_sheet }}">

                                            <label class="container">
                                                Ribbon อาร์ตเวิร์ค
                                                <input type="radio" name="ribbon[{{ $I }}]" value="1"
                                                    {{ (!empty($FM_PD_018_2[$I]->ribbon) && $FM_PD_018_2[$I]->ribbon == '1') ? 'checked' : null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container">
                                                Ribbon คอมม่อน
                                                <input type="radio" name="ribbon[{{ $I }}]" value="2"
                                                    {{ (!empty($FM_PD_018_2[$I]->ribbon) && $FM_PD_018_2[$I]->ribbon=='2') ?'checked':null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <u>บันทึกการเปลี่ยนผลิตภัณฑ์</u>

                                            <label class="container">
                                                &nbsp;&nbsp;เดินผลิตภัณฑ์ตัวแรกของสัปดาห์
                                                <input type="radio" id="product_change_log1" name="product_change_log[{{ $I }}]"
                                                    onclick="changeProduct(this.value)" value="1"
                                                    {{ (!empty($FM_PD_018_2[$I]->product_change_log) && $FM_PD_018_2[$I]->product_change_log=='1') ?'checked':null }}>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container">
                                                &nbsp;&nbsp;มีการเปลี่ยนสูตรผลิตภัณฑ์
                                                <input type="radio" name="product_change_log[{{ $I }}]" value="2"
                                                    onclick="changeProduct(this.value)"
                                                    {{ (!empty($FM_PD_018_2[$I]->product_change_log) && $FM_PD_018_2[$I]->product_change_log=='2') ?'checked':null }}>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container">
                                                &nbsp;&nbsp;ไม่มีการเปลี่ยนสูตรผลิตภัณฑ์
                                                <input type="radio" name="product_change_log[{{ $I }}]" value="3"
                                                    onclick="changeProduct(this.value)"
                                                    {{ (!empty($FM_PD_018_2[$I]->product_change_log) && $FM_PD_018_2[$I]->product_change_log=='3') ?'checked':null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row pl-4 sub_product_change_log">
                                        <div class="col-md-12">
                                            @php
                                            $arr_sub_product_change_log = !empty($FM_PD_018_2[$I]->product_change_log)
                                            ?explode(',', $FM_PD_018_2[$I]->sub_product_change_log) :array();
                                            @endphp

                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;&nbsp;ไม่มีนมตกค้างใน Blender/Hopper
                                                    {{-- {{ $FM_PD_018_2[$I]->product_change_log }} --}}
                                                    <input type="checkbox"
                                                        {{ (!empty($FM_PD_018_2[$I]->product_change_log) && $FM_PD_018_2[$I]->product_change_log!='3') ?'' :'' }}
                                                        name="sub_product_change_log[{{ $I }}][]" value="1"
                                                        {{ (!empty($FM_PD_018_2[$I]->sub_product_change_log) && (string)in_array('1', $arr_sub_product_change_log)) ?'checked' :null }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;&nbsp;ไม่มีนมตกค้างใน Seperator/Vibrator sieve
                                                    <input type="checkbox"
                                                        {{ (!empty($FM_PD_018_2[$I]->product_change_log) && $FM_PD_018_2[$I]->product_change_log!='3') ?'' :'' }}
                                                        name="sub_product_change_log[{{ $I }}][]" value="2"
                                                        {{ (!empty($FM_PD_018_2[$I]->sub_product_change_log) && (string)in_array('2', $arr_sub_product_change_log)) ?'checked' :null }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;&nbsp;ไม่มีนมตกค้างในเครื่องบรรจุ
                                                    <input type="checkbox"
                                                        {{ (!empty($FM_PD_018_2[$I]->product_change_log) && $FM_PD_018_2[$I]->product_change_log!='3') ?'' :'' }}
                                                        name="sub_product_change_log[{{ $I }}][]" value="3"
                                                        {{ (!empty($FM_PD_018_2[$I]->sub_product_change_log) && (string)in_array('3', $arr_sub_product_change_log)) ?'checked' :null }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <u>ตรวจสอบความถูกต้องของ Foil</u>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="text-center">รูป Art Work (กรณีที่มี Art Work)</div>
                                            <input type="file" name="art_work_pic1[{{ $I }}]" class="dropify" data-height="200"
                                                data-default-file="{{ !empty($FM_PD_018_2_art_work_Default[$I]->pic1) ? asset('assets/FM-PD-018/artwork/'.$FM_PD_018_2_art_work_Default[$I]->pic1) : null }}" />
                                        </div>

                                        <div class="col-md-6">
                                            <div class="text-center">รูปแบชผลิตภัณฑ์</div>
                                            <input type="file" id="file" name="file[{{ $I }}]" class="dropify" data-height="200"
                                                {{-- {{ empty($FM_PD_018_2[$I]->file) ?'required' :'' }} --}}
                                                data-default-file="{{!empty($FM_PD_018_2[$I]->file) ? asset('assets/FM-PD-018/'.$FM_PD_018_2[$I]->file) : null}}" />
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            {{-- <div class="text-center">ความถูกต้องของการพิมพ์</div> --}}
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="text-center">ความถูกต้องของการพิมพ์</td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label class="container">
                                                                ชื่อผลิตภัณฑ์
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="product_name" name="product_name[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_2[$I]->product_name) && $FM_PD_018_2[$I]->product_name == 'on') ? 'checked' : null  }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                วันที่ผลิต
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="product_date" name="product_date[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_2[$I]->product_date) && $FM_PD_018_2[$I]->product_date == 'on') ? 'checked' : null  }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                แบช
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="batch" name="batch[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_2[$I]->batch) && $FM_PD_018_2[$I]->batch == 'on') ? 'checked' : null  }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>

                                                        <td>
                                                            <label class="container">
                                                                เวลา
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="time" name="time[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_2[$I]->time) && $FM_PD_018_2[$I]->time == 'on') ? 'checked' : null  }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                วันหมดอายุ
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="exp_date" name="exp_date[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_2[$I]->exp_date) && $FM_PD_018_2[$I]->exp_date == 'on') ? 'checked' : null  }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                ออเดอร์/ไลน์
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="order" name="order[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_2[$I]->order) && $FM_PD_018_2[$I]->order == 'on') ? 'checked' : null  }}>
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
                                            <span>ข้อมูลผลิตภัณฑ์เดิมที่แพ็คก่อนหน้านี้</span>
                                            <input class="form-control" type="text" name="product[{{ $I }}]"
                                                placeholder="ชื่อผลิตภัณฑ์"
                                                value="{{ !empty($FM_PD_018_2[$I]->product) ? $FM_PD_018_2[$I]->product : null  }}">
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-6 text-center">
                                            บันทึกโดย
                                            @if (!empty($FM_PD_018_2[$I]->save_by))
                                            <div>
                                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_2[$I]->save_by) }}"
                                                    style="width:145px;">
                                            </div>
                                            <br> ( {{ $FM_PD_018_2[$I]->save_by_name }} ) <br>

                                            @endif

                                            <div>(filling)</div>
                                        </div>

                                        <div class="col-md-6 text-center">
                                            ตรวจสอบโดย
                                            @if (!empty($FM_PD_018_2[$I]->verify_by))
                                            <div>
                                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_2[$I]->verify_by) }}"
                                                    style="width:145px;">
                                            </div>
                                        <br> ( {{ $FM_PD_018_2[$I]->verify_by_name }} ) <br>

                                            @endif

                                            <div>(filling)</div>
                                        </div>
                                    </div>
                                </td>

                        <!-- 018-3 packing -->
                                <td style="vertical-align: top;">
                                    <!-- รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="tbl-paperless">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="text-center">
                                                            รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch
                                                            <input type="hidden" name="order018-3" value="{{ empty($FM_PD_018_3[$I]->order) ? '0' : $FM_PD_018_3[$I]->order }}">

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-right" style="width: 30%;">PM Code</td>
                                                        <td>
                                                            <input type="text" name="pm_code_unit_carton[{{ $I }}]"
                                                                class="form-control form-control-sm"
                                                                placeholder="PM Code (Unit Carton/Special box/แบชข้างซอง Pouch)"
                                                                value="{{ !empty($pm_code_unit_carton) ?$pm_code_unit_carton->sap_code : (!empty($FM_PD_018_3[$I]->pm_code_unit_carton) ?$FM_PD_018_3[$I]->pm_code_unit_carton :'') }}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-right">
                                                            <div class="font-weight-normal-">วันผลิต</div>
                                                            <div class="font-weight-normal-">วันหมดอายุ</div>
                                                            <div class="font-weight-normal-">ควรบริโภคก่อน</div>
                                                            <div class="font-weight-normal-">Meterial Number</div>
                                                            <div class="font-weight-normal-">Product Order/Line</div>
                                                        </td>

                                                        <td>
                                                            <input type="file" name="material_no[{{ $I }}]" class="dropify"
                                                                data-height="200"
                                                                data-default-file="{{ !empty($FM_PD_018_3[$I]->material_no) ?asset('assets/FM-PD-018/'.$FM_PD_018_3[$I]->material_no) :null }}" />
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" class="">
                                                            <label class="container">
                                                                เคลียร์ Unit/Special Box
                                                                ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                                <input type="checkbox" name="no_milk_left_in[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_3[$I]->no_milk_left_in) && $FM_PD_018_3[$I]->no_milk_left_in == 'on') ?'checked' :null  }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- ช้อน -->
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <table class="tbl-paperless">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="text-center">
                                                            ช้อน
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-right" style="width:20%;">
                                                            ช้อน
                                                        </td>

                                                        <td class="text-" style="">
                                                            <label class="container">
                                                                &nbsp;ไม่ใช้ช้อน
                                                                <input type="checkbox" name="spoon_type[{{ $I }}]" value="1"
                                                                    onchange="CheckOnlyOne(this)"
                                                                    {{ (!empty($FM_PD_018_3[$I]->spoon_type) && $FM_PD_018_3[$I]->spoon_type == '1') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                &nbsp;ใช้ช้อนเบอร์เดิม
                                                                <input type="checkbox" name="spoon_type[{{ $I }}]" value="2"
                                                                    onchange="CheckOnlyOne(this)"
                                                                    {{ (!empty($FM_PD_018_3[$I]->spoon_type) && $FM_PD_018_3[$I]->spoon_type == '2') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                &nbsp;เคลียร์ช้อนที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                                <input type="checkbox" name="spoon_type[{{ $I }}]" value="3"
                                                                    onchange="CheckOnlyOne(this)"
                                                                    {{ (!empty($FM_PD_018_3[$I]->spoon_type) && $FM_PD_018_3[$I]->spoon_type == '3') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-right">
                                                            ช้อนเบอร์
                                                        </td>

                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label class="container">
                                                                        1
                                                                        <input type="checkbox" name="spoon_size[{{ $I }}]"
                                                                            value="1" onchange="CheckOnlyOne(this)"
                                                                            {{ (!empty($FM_PD_018_3[$I]->spoon_size) && $FM_PD_018_3[$I]->spoon_size == '1') ?'checked' :null }}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label class="container">
                                                                        2
                                                                        <input type="checkbox" name="spoon_size[{{ $I }}]"
                                                                            value="2" onchange="CheckOnlyOne(this)"
                                                                            {{ (!empty($FM_PD_018_3[$I]->spoon_size) && $FM_PD_018_3[$I]->spoon_size == '2') ?'checked' :null }}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label class="container">
                                                                        3
                                                                        <input type="checkbox" name="spoon_size[{{ $I }}]"
                                                                            value="3" onchange="CheckOnlyOne(this)"
                                                                            {{ (!empty($FM_PD_018_3[$I]->spoon_size) && $FM_PD_018_3[$I]->spoon_size == '3') ?'checked' :null }}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label class="container">
                                                                        4
                                                                        <input type="checkbox" name="spoon_size[{{ $I }}]"
                                                                            value="4" onchange="CheckOnlyOne(this)"
                                                                            {{ (!empty($FM_PD_018_3[$I]->spoon_size) && $FM_PD_018_3[$I]->spoon_size == '4') ?'checked' :null }}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label class="container">
                                                                        5
                                                                        <input type="checkbox" name="spoon_size[{{ $I }}]"
                                                                            value="5" onchange="CheckOnlyOne(this)"
                                                                            {{ (!empty($FM_PD_018_3[$I]->spoon_size) && $FM_PD_018_3[$I]->spoon_size == '5') ?'checked' :null }}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td class="text-right">
                                                            ถ่ายรูปช้อน
                                                        </td>

                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img src="{{ asset('/assets/images/scoop/'.$scoop_number.'.jpg') }}"
                                                                        alt="ตัวอย่างรูปช้อน"
                                                                        style="width: 100%; height:210px;">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <input type="file" id="spoon_file" name="spoon_file[{{ $I }}]"
                                                                        class="dropify" data-height="200"
                                                                        data-default-file="{{ !empty($FM_PD_018_3[$I]->spoon_file) ? asset('assets/FM-PD-018/'.$FM_PD_018_3[$I]->spoon_file) : null }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-right">PM CODE</td>

                                                        <td colspan="" class="">
                                                            <input type="text" name="pm_code_scoop[{{ $I }}]"
                                                                class="form-control form-control-sm"
                                                                placeholder="PM Code (ช้อน)"
                                                                value="{{ !empty($pm_code_scoop) ?$pm_code_scoop->item_scoop :(!empty($FM_PD_018_3[$I]->pm_code_scoop) ?$FM_PD_018_3[$I]->pm_code_scoop :'') }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- รายละเอียดของ Shipper Carton -->
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <table class="tbl-paperless">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="text-center">
                                                            รายละเอียดของ Shipper Carton
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" class="text-">
                                                            <label class="container">
                                                                เคลียร์ Shipper
                                                                ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                                <input type="checkbox" name="clear_unit_special_box[{{ $I }}]"
                                                                    {{ (!empty($FM_PD_018_3[$I]->clear_unit_special_box) && $FM_PD_018_3[$I]->clear_unit_special_box == 'on') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    PM Code/เลขก้น Unit
                                                                    <input type="text" name="pm_code_shipper_carton[{{ $I }}]"
                                                                        placeholder="PM Code"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ !empty($pm_code_shipper_carton) ?$pm_code_shipper_carton->sap_code : (!empty($FM_PD_018_3[$I]) ?$FM_PD_018_3[$I]->pm_code_shipper_carton :'') }}">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    Material Code
                                                                    <input type="text" name="material_code[{{ $I }}]"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ !empty($FM_PD_018_3[$I]->material_code) ?$FM_PD_018_3[$I]->material_code :null }}">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    Product Hierarehy
                                                                    <input type="text" name="product_hierarehy[{{ $I }}]"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ !empty($FM_PD_018_3[$I]->product_hierarehy) ?$FM_PD_018_3[$I]->product_hierarehy :null }}">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    Time
                                                                    @if (!empty($FM_PD_018_3[$I]->time_shipper_carton))
                                                                    <input
                                                                        value="{{ $FM_PD_018_3[$I]->time_shipper_carton }}"
                                                                        class="form-control form-control-sm" readonly>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    Batch Number
                                                                    <input type="text" name="batch_no[{{ $I }}]"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ !empty($FM_PD_018_3[$I]->batch_no) ?$FM_PD_018_3[$I]->batch_no :null }}">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    EXP.
                                                                    <input type="" name="exp[{{ $I }}]"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ !empty($FM_PD_018_3[$I]->exp) ?$FM_PD_018_3[$I]->exp :null }}">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-md-4">
                                                                    BBD.
                                                                    <input type="" name="bbd[{{ $I }}]"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ !empty($FM_PD_018_3[$I]->bbd) ?$FM_PD_018_3[$I]->bbd :null }}">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    Product Order
                                                                    <input type="" name="production_order" 
                                                                    class="form-control form-control-sm"
                                                                    value="{{ !empty($FM_PD_018_3[$I]->production_order) ? $FM_PD_018_3[$I]->production_order : '' }}">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    Line
                                                                    <input type="" name="product_line[{{ $I }}]" 
                                                                    class="form-control form-control-sm"
                                                                    value="{{ !empty($FM_PD_018_3[$I]->product_line) ? $FM_PD_018_3[$I]->product_line : '' }}">
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- กาวที่ใช้ในการผลิต -->
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <table class="tbl-paperless">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            กาวที่ใช้ในการผลิต
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label class="container">
                                                                &nbsp;ไทย
                                                                <input type="radio" name="glue[{{ $I }}]" value="1"
                                                                    {{ (!empty($FM_PD_018_3[$I]->glue) && $FM_PD_018_3[$I]->glue == '1') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="container">
                                                                &nbsp;ส่งออก
                                                                <input type="radio" name="glue[{{ $I }}]" value="2"
                                                                    {{ (!empty($FM_PD_018_3[$I]->glue) && $FM_PD_018_3[$I]->glue == '2') ?'checked' :null }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12 text-center">
                                            <h3 class="font-weight-bold">บันทึกโดย</h3>

                                            @if (!empty($FM_PD_018_3[$I]->sign_operator))
                                            <div>
                                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_3[$I]->sign_operator) }}"
                                                    width="145">
                                            </div>
                                            <br> ( {{ $FM_PD_018_3[$I]->operator_name }} ) <br>

                                            @endif 
                                            <div>(พนักงาน Operator packing)</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </table>
                        <hr style=" border-top: 1px dashed red;">
                        @endforeach


                        <table class="tbl-paperless">
                            @if (!$order_sheet_1)
                            <tr>
                                <th style="width:%;">
                                    ชื่อผลิตภัณฑ์ 
                                    {{ $head[0]->material_description }}
                                </th>

                                <th style="width:50%;">
                                    วันที่
                                    {{ th_date_scheduled_start($head[0]->scheduled_start) }}

                                    <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $head[0]->production_order }}</label>
                                    <label>BATCH: &nbsp;&nbsp; {{ $head[0]->batch }}</label>
                                </th>
                            </tr>   
                            @endif
                          
                            <tr>
                                <td colspan="2">
                                    <!-- ลายเซ็นผู้บันทึก -->
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h3 class="font-weight-bold">ทวนสอบโดย</h3>

                                            <input type="hidden" name="txt_sign_leader" id="txt_sign_leader"
                                                value="{{ isset($FM_PD_018_1[0]->sign_leader) ?$FM_PD_018_1[0]->sign_leader :'0' }}">
                                            <div id="sign_leader" class="{{ !empty($FM_PD_018_1[0]->sign_leader) ?'' :'d-none' }}">
                                                <img src="{{ !empty($FM_PD_018_1[0]->sign_leader) ?asset('/assets/images/sign/'.$FM_PD_018_1[0]->sign_leader) :'' }}"
                                                    width="145">
                                                <br> ( {{ isset($FM_PD_018_1[0]->leader_name)? $FM_PD_018_1[0]->leader_name : null }} ) <br>

                                            </div>

                                            @if(empty($FM_PD_018_1[0]->sign_leader))
                                            <button type="button" id="btn_sign_leader"
                                                class="btn btn-lg btn-block btn-primary" data-toggle="modal"
                                                data-target="#sign_leader_modal">
                                                <i class="fas fa-signature"></i>
                                                ลายเซ็น
                                            </button>
                                            
                                            @endif

                                            <div>(PD.Line leader/Supervisor/IRF)</div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- ปุ่มแก้ไข -->
                <div class="row text-center mt-4">
                    <div class="col-lg-6 col-md-6">
                        <button id="btn-edit" class="btn btn-lg btn-block btn-warning">
                            <i class="fa fa-save"></i> บันทึก & เปลี่ยนแปลง
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
                            onclick="window.location.href='{{ url('report/'.$production_order) }}'">
                            <i class="fa fa-undo"></i> ย้อนกลับ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal ลายเซ็น leader บันทึก -->
<div class="modal fade" id="sign_leader_modal" role="dialog">
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
                <input type="password" class="form-control" name="pass_sign" id="pass_sign_leader"
                    placeholder="รหัสผ่าน">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_018')"
                    class="btn btn-lg btn-block btn-success">
                    ยืนยัน
                </button>
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
    function changeProduct(value) {
        if(value != 3) {
            $('input[name="sub_producct_change_log"]').attr('disabled', true);
        } else {
            $('input[name="sub_producct_change_log"]').attr('disabled', false);
        }
    }
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
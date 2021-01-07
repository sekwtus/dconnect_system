@extends('layouts.master')

@section('title', 'FM-PD-018-1')

@section('style')

@endsection

@section('main')

<form action="{{ url('/FM-PD-018-1/save/'.$sheet.'/'.$production_order) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($FM_PD_018_1 as $item)
        <div class="row mt-3">
            <div class="col-md-12 px-0">
                <div class="card border-info">
                    <div class="card-header bg-info">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-12">
                                <h3 class="box-title m-b-0" style="font-size: 15pt;">
                                    FM-PD-018 Rev No.35
                                    การตรวจสอบความถูกต้องของการผลิต
                                </h3>
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $item->production_order }}</label>
                            </div>
                            <div class="col-lg-6">
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
                                <table class="table table-bordered table-striped tbl-paperless">
                                    <thead class="text-center">
                                        <tr>
                                            <th colspan="2">การตรวจสอบ RAW MATERIAL จาก WAREHOUSE</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td rowspan="" class="text-right" style="width: 30%;">
                                                ชนิดของนมที่ส่ง
                                            </td>

                                            <td class="">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">1.</span>
                                                    </div>
                                                    <input name="type_milk1" class="form-control form-control-lg" placeholder="กรอกชนิดของนม"
                                                        value="{{ !empty($FM_PD_018_1_Default->type_milk1) ?$FM_PD_018_1_Default->type_milk1 :null }}">
                                                </div>
                        
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">2.</span>
                                                    </div>
                                                    <input name="type_milk2" class="form-control form-control-lg" placeholder="กรอกชนิดของนม"
                                                        value="{{ !empty($FM_PD_018_1_Default->type_milk2) ?$FM_PD_018_1_Default->type_milk2 :null }}">
                                                </div>
                        
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">3.</span>
                                                    </div>
                                                    <input class="form-control form-control-lg" type="text" name="type_milk3" placeholder="กรอกชนิดของนม"
                                                        value="{{ !empty($FM_PD_018_1_Default->type_milk3) ?$FM_PD_018_1_Default->type_milk3 :null }}">
                                                </div>
                        
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">4.</span>
                                                    </div>
                                                    <input class="form-control form-control-lg" type="text" name="type_milk4" placeholder="กรอกชนิดของนม"
                                                        value="{{ !empty($FM_PD_018_1_Default->type_milk4) ?$FM_PD_018_1_Default->type_milk4 :null }}">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="">
                                                <label class="container">
                                                    ใช้นมชนิดเดิมผลิตต่อ
                                                    <input type="radio" name="clear_milk" id="clear_milk1" value="on"
                                                        {{ (!empty($FM_PD_018_1_Default->clear_milk) && $FM_PD_018_1_Default->clear_milk == 'on') ?'checked' :null }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container">
                                                    เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย
                                                    <input type="radio" name="clear_milk" id="clear_milk1" value="off"
                                                        {{ (!empty($FM_PD_018_1_Default->clear_milk) && $FM_PD_018_1_Default->clear_milk == 'off') ?'checked' :null }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                                {{-- 
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" type="radio" name="clear_milk" id="clear_milk1"
                                                                    value="on"
                                                                    {{ (!empty($FM_PD_018_1_Default->clear_milk) && $FM_PD_018_1_Default->clear_milk == 'on') ?'checked' :null }}>
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
                                                --}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td rowspan="" class="text-right" style="width: 20%;">
                                                RM.Code
                                            </td>

                                            <td class="">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">1.</span>
                                                    </div>
                                                    <input name="rm_code1" id="rm_code1" class="form-control form-control-lg" placeholder="กรอก RM. Code"
                                                        value="{{ !empty($FM_PD_018_1_Default->rm_code1) ?$FM_PD_018_1_Default->rm_code1 :null }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">2.</span>
                                                    </div>
                                                    <input name="rm_code2" id="rm_code2" class="form-control form-control-lg" placeholder="กรอก RM. Code"
                                                        value="{{ !empty($FM_PD_018_1_Default->rm_code2) ?$FM_PD_018_1_Default->rm_code2 :null }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">3.</span>
                                                    </div>
                                                    <input name="rm_code3" id="rm_code3" class="form-control form-control-lg" placeholder="กรอก RM Code"
                                                        value="{{ !empty($FM_PD_018_1_Default->rm_code3) ? $FM_PD_018_1_Default->rm_code3 :  null }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">4.</span>
                                                    </div>
                                                    <input name="rm_code4" id="rm_code4" class="form-control form-control-lg" placeholder="กรอก RM Code"
                                                        value="{{ !empty($FM_PD_018_1_Default->rm_code4) ? $FM_PD_018_1_Default->rm_code4 :  null }}">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td rowspan="" class="text-right" style="width: 20%;">
                                                เบอร์ไซเฟอร์
                                            </td>

                                            <td class="cifer"> 
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">1.</span>
                                                    </div>
                                                    <input name="no_fiber1" id="no_fiber1" class="form-control form-control-lg" placeholder="กรอกเบอร์ไซเฟอร์"
                                                        value="{{ !empty($FM_PD_018_1_Default->no_fiber1) ? $FM_PD_018_1_Default->no_fiber1 :  null }}">
                                                </div>
                                                
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">2.</span>
                                                    </div>
                                                    <input name="no_fiber2" id="no_fiber2" class="form-control form-control-lg" placeholder="กรอกเบอร์ไซเฟอร์"
                                                        value="{{ !empty($FM_PD_018_1_Default->no_fiber2) ? $FM_PD_018_1_Default->no_fiber2 :  null }}">
                                                </div>
                                                
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">3.</span>
                                                    </div>
                                                    <input name="no_fiber3" id="no_fiber3" class="form-control form-control-lg" placeholder="กรอกเบอร์ไซเฟอร์"
                                                        value="{{ !empty($FM_PD_018_1_Default->no_fiber3) ? $FM_PD_018_1_Default->no_fiber3 :  null }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">4.</span>
                                                    </div>
                                                    <input name="no_fiber4" id="no_fiber4" class="form-control form-control-lg" placeholder="กรอกเบอร์ไซเฟอร์"
                                                        value="{{ !empty($FM_PD_018_1_Default->no_fiber4) ? $FM_PD_018_1_Default->no_fiber4 :  null }}">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ลายเซ็น พนักงานถอดถุงนม -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="font-weight-bold text-center">
                                    บันทึกโดย
                                </h4>
                                
                                <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="{{ !empty($FM_PD_018_1_Default->save_by_remove_bag) ?$FM_PD_018_1_Default->save_by_remove_bag :'' }}">
                                <span id="sign_operator" class="{{ !empty($FM_PD_018_1_Default->save_by_remove_bag) ?'' :'d-none' }}">
                                    <img src="{{ !empty($FM_PD_018_1_Default->save_by_remove_bag) ?asset('/assets/images/sign/'.$FM_PD_018_1_Default->save_by_remove_bag) :'' }}"
                                            width="145" >
                                    <br> ( {{ isset($FM_PD_018_1_Default->remove_bag_name)? $FM_PD_018_1_Default->remove_bag_name : null }} ) <br>
                                </span>
                                
                                @if(empty($FM_PD_018_1_Default->save_by_remove_bag))
                                    <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal"
                                        data-input="save_by_remove_bag"
                                        {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_018_1_Default->save_by_remove_bag)) ? 'disabled' : null }}>กดเพื่อบันทึกลายเซ็น</button> 
                                @endif

                                <h4 class="font-weight-bold text-center">
                                    (พนักงานถอดถุงนม)
                                </h4>
                                
                            </div>
                            {{-- <input type="hidden" name="save_by_remove_bag" id="save_by_remove_bag"
                                value="{{ !empty($FM_PD_018_1_Default->save_by_remove_bag) ? $FM_PD_018_1_Default->save_by_remove_bag :  null }}"> --}}
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped tbl-paperless">
                                    <thead class="text-center">
                                        <tr>
                                            <th colspan="2">Process Flow (รายละเอียดการผลิต)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="text-right" style="width: 20%;">
                                                หมายเลขสูตรการผลิต
                                            </td>

                                            <td class="">
                                                <input type="" name="no_formula" class="form-control form-control-lg" placeholder="หมายเลขสูตรการผลิต"
                                                    value="{{ !empty($FM_PD_018_1_Default->no_formula) ?$FM_PD_018_1_Default->no_formula :null }}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-right" style="">
                                                เบลนเดอร์ที่ใช้/เครื่องบรรจุที่ใช้
                                            </td>

                                            <td>
                                                <div class="row">
                                                    <div class="col-md-7 text-left-">
                                                        <label class="container">
                                                            เบลนเดอร์ 1 (Prebiotic)
                                                            <input type="radio" name="blender" id="blender1"
                                                                value="1"
                                                                {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '1') ? 'checked' : null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        
                                                        <label class="container">
                                                            เบลนเดอร์ 2 (Prebiotic)
                                                            <input type="radio" name="blender" id="blender2"
                                                                value="2"
                                                                {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '2') ? 'checked' : null }}>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="container">
                                                            เเบลนเดอร์ 1 และ สไมล์ (Synbiotic)
                                                            <input type="radio" name="blender" id="blender3"
                                                                value="3"
                                                                {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '3') ? 'checked' : null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        
                                                        <label class="container">
                                                            ไอเอฟ เซกรีแคร์ (IF Segrecare)
                                                            <input type="radio" name="blender" id="blender4"
                                                                value="4"
                                                                {{ (!empty($FM_PD_018_1_Default->blender) && $FM_PD_018_1_Default->blender == '4') ? 'checked' : null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-5 text-left-">
                                                        <label class="container">
                                                            Filling line 1
                                                            <input type="checkbox" name="filling1" id="line1" onclick="return false;"
                                                                {{ (!empty($FM_PD_018_1_Default->filling1) && $FM_PD_018_1_Default->filling1 == 'on') ?'checked' :null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        
                                                        <label class="container">
                                                            Filling line 2
                                                            <input type="checkbox" name="filling2" id="line2" onclick="return false;"
                                                                {{ (!empty($FM_PD_018_1_Default->filling2) && $FM_PD_018_1_Default->filling2 == 'on') ?'checked' :null }}>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="container">
                                                            Filling line 3
                                                            <input type="checkbox" name="filling3" id="line3" onclick="return false;"
                                                                {{ (!empty($FM_PD_018_1_Default->filling3) && $FM_PD_018_1_Default->filling3 == 'on') ?'checked' :null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        
                                                        <label class="container">
                                                            Filling line 4
                                                            <input type="checkbox" name="filling4" id="line4" onclick="return false;"
                                                                {{ (!empty($FM_PD_018_1_Default->filling4) && $FM_PD_018_1_Default->filling4 == 'on') ?'checked' : null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                                    
                                                        <label class="container">
                                                            Filling line 5
                                                            <input type="checkbox" name="filling5" id="line5" onclick="return false;"
                                                                {{ (!empty($FM_PD_018_1_Default->filling5) && $FM_PD_018_1_Default->filling5 == 'on') ?'checked' : null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        
                                                        <label class="container">
                                                            Filling line 6
                                                            <input type="checkbox" name="filling6" id="line6" onclick="return false;"
                                                                {{ (!empty($FM_PD_018_1_Default->filling6) && $FM_PD_018_1_Default->filling6 == 'on') ?'checked' : null }}>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- ลายเซ็น พนักงานเทนม -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="font-weight-bold text-center">
                                    บันทึกโดย
                                </h4>

                                <input type="hidden" name="txt_sign_operator1" id="txt_sign_operator1" value="{{ !empty($FM_PD_018_1_Default->save_by_poue_milk) ?$FM_PD_018_1_Default->save_by_poue_milk :'' }}">
                                <span id="sign_operator1" class="{{ !empty($FM_PD_018_1_Default->save_by_poue_milk) ?'' :'d-none' }}">
                                    <img src="{{ !empty($FM_PD_018_1_Default->save_by_poue_milk) ?asset('/assets/images/sign/'.$FM_PD_018_1_Default->save_by_poue_milk) :'' }}"
                                            width="145">
                                            <br> ( {{ isset($FM_PD_018_1_Default->poue_milk_name)? $FM_PD_018_1_Default->poue_milk_name : null }} ) <br>

                                </span>
                                
                                @if(empty($FM_PD_018_1_Default->save_by_poue_milk))
                                    <button type="button" id="btn_sign_operator1" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator1_modal"
                                        data-input="save_by_remove_bag"
                                        {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_018_1_Default->save_by_poue_milk)) ? 'disabled' : null }}>กดเพื่อบันทึกลายเซ็น</button> 
                                @endif

                                <h4 class="font-weight-bold text-center">
                                    <u>(พนักงานเทนม)</u>
                                </h4>
                                
                            </div>
                        </div>
                        
                        @if (empty($FM_PD_018_2_Default) || $FM_PD_018_2_Default->save_by==null || $FM_PD_018_2_Default->verify_by==null)
                            <div class="row text-center mt-4">
                                <div class="col-lg-6 col-md-6">
                                    <button id="" class="btn btn-lg btn-block btn-success btn-check">
                                        <i class="fa fa-save"></i> บันทึก
                                    </button>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <button type="reset" class="btn btn-lg btn-block btn-danger">
                                        <i class="fa fa-times"></i> ยกเลิก
                                    </button>
                                </div>
                            </div>
                        @endif

                        <div class="row text-center mt-4">
                            <div class="col-lg-12 col-md-12">
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

<!-- Modal ลายเซ็น operator พนง.ถอดถุงนม -->
<div class="modal fade" id="sign_operator_modal" tabindex="-1" role="dialog" aria-hidden="true"
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
                <input type="password" class="form-control" name="pass_sign" id="pass_sign_operator" placeholder="รหัสผ่าน">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="check_pass_sign('sign_operator', {{ $production_order }})" class="btn btn-lg btn-block btn-success">
                   ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ลายเซ็น operator พนง.เทนม -->
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
@endsection
@extends('layouts.master')

@section('title', 'FM-PD-018-3')

@section('style')

@endsection

@section('main')
<form action="{{ url('/FM-PD-018-3/save/'.$sheet.'/'. $production_order) }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <div class="row mt-3">
        <div class="col-md-12 px-0">

            @foreach ($head as $item)
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
                            <input type="hidden" id="date" name="date"
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
            @endforeach

            <div class="card">
                <div class="card-body">
                    <!-- รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped tbl-paperless">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">
                                            รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch
                                            {{-- onclick='{{ !empty($pm_code_unit_carton) ? 'return false' :'set_time(this,`time_roll1`)' }}' --}}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-right" style="width: 30%;">PM Code</td>
                                        <td>
                                            <input type="text" name="pm_code_unit_carton" class="form-control form-control-lg" placeholder="PM Code (Unit Carton/Special box/แบชข้างซอง Pouch)"
                                                value="{{ !empty($pm_code_unit_carton) ?$pm_code_unit_carton->sap_code : (!empty($FM_PD_018_3) ?$FM_PD_018_3->pm_code_unit_carton :'') }}">
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
                                            <input type="file" name="material_no" class="dropify"
                                                data-height="200"
                                                data-default-file="{{ !empty($FM_PD_018_3->material_no) ? asset('assets/FM-PD-018/'.$FM_PD_018_3->material_no) : null }}" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="">
                                            <label class="container">
                                                เคลียร์ Unit/Special Box
                                                ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                <input type="checkbox" name="no_milk_left_in"
                                                {{ (!empty($FM_PD_018_3->no_milk_left_in) && $FM_PD_018_3->no_milk_left_in == 'on') ? 'checked' : null  }}>
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
                            <table class="table table-bordered table-striped tbl-paperless">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">
                                            ช้อน
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-right" style="width:20%;">
                                            ช้อน
                                        </td>

                                        <td class="text-" style="">
                                            <label class="container">
                                                &nbsp;ไม่ใช้ช้อน
                                                <input type="checkbox" name="spoon_type" value="1" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_type) && $FM_PD_018_3->spoon_type == '1') ?'checked' :null }}>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container">
                                                &nbsp;ใช้ช้อนเบอร์เดิม
                                                <input type="checkbox" name="spoon_type" value="2" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_type) && $FM_PD_018_3->spoon_type == '2') ?'checked' :null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                            
                                            <label class="container">
                                                &nbsp;เคลียร์ช้อนที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                <input type="checkbox" name="spoon_type" value="3" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_type) && $FM_PD_018_3->spoon_type == '3') ?'checked' :null }}>
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
                                                        &nbsp;1
                                                        <input type="checkbox" name="spoon_size" value="1" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_size) && $FM_PD_018_3->spoon_size == '1') ?'checked' :null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <label class="container">
                                                        &nbsp;2
                                                        <input type="checkbox" name="spoon_size" value="2" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_size) && $FM_PD_018_3->spoon_size == '2') ?'checked' :null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
            
                                                <div class="col-md-2">
                                                    <label class="container">
                                                        &nbsp;3
                                                        <input type="checkbox" name="spoon_size" value="3" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_size) && $FM_PD_018_3->spoon_size == '3') ?'checked' :null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
            
                                                <div class="col-md-2">
                                                    <label class="container">
                                                        &nbsp;4
                                                        <input type="checkbox" name="spoon_size" value="4" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_size) && $FM_PD_018_3->spoon_size == '4') ?'checked' :null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
            
                                                <div class="col-md-2">
                                                    <label class="container">
                                                        &nbsp;5
                                                        <input type="checkbox" name="spoon_size" value="5" onchange="CheckOnlyOne(this)" {{ (!empty($FM_PD_018_3->spoon_size) && $FM_PD_018_3->spoon_size == '5') ?'checked' :null }}>
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
                                                    <img src="{{ asset('/assets/images/scoop/'.$scoop_number.'.jpg') }}" alt="ตัวอย่างรูปช้อน" style="width: 100%; height:210px;">
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="file" id="spoon_file" name="spoon_file" class="dropify"
                                                        data-height="200"
                                                        data-default-file="{{ !empty($FM_PD_018_3->spoon_file) ? asset('assets/FM-PD-018/'.$FM_PD_018_3->spoon_file) : null }}" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">PM CODE</td>

                                        <td colspan="" class="">
                                            {{-- <input type="text" name="pm_code_scoop"
                                                class="form-control form-control-lg" placeholder="PM Code (ช้อน)"
                                                value="{{ !empty($FM_PD_018_3->pm_code_scoop) ?$FM_PD_018_3->pm_code_scoop :null }}"> --}}
                                            
                                            {{-- !empty($FM_PD_018_3) ?$FM_PD_018_3->pm_code_scoop --}}
                                            <input type="text" name="pm_code_scoop"
                                                class="form-control form-control-lg" placeholder="PM Code (ช้อน)"
                                                value="{{ !empty($pm_code_scoop) ?$pm_code_scoop->item_scoop :(!empty($FM_PD_018_3) ?$FM_PD_018_3->pm_code_scoop :'') }}">                                                            
                                    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- รายละเอียดของ Shipper Carton -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped tbl-paperless">
                                <thead class="text-center">
                                    <tr>
                                        <th colspan="2">
                                            รายละเอียดของ Shipper Carton
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="2" class="text-">
                                            <label class="container">
                                                เคลียร์ Shipper
                                                ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                <input type="checkbox" name="clear_unit_special_box"
                                                    {{ (!empty($FM_PD_018_3->clear_unit_special_box) && $FM_PD_018_3->clear_unit_special_box == 'on') ?'checked' :null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right" style="width: 30%;">
                                            PM Code/เลขก้น Unit
                                        </td>

                                        <td>
                                            <input type="text" name="pm_code_shipper_carton" placeholder="PM Code"
                                                class="form-control form-control-lg"
                                                value="{{ !empty($pm_code_shipper_carton) ?$pm_code_shipper_carton->sap_code : (!empty($FM_PD_018_3) ?$FM_PD_018_3->pm_code_shipper_carton :'') }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">
                                            Material Code
                                        </td>
                                        <td class="text-">
                                            <input type="text" name="material_code" class="form-control form-control-lg"
                                                value="{{  !empty($FM_PD_018_3->material_code) ?$FM_PD_018_3->material_code : (!empty($head[0]->material_number) ? $head[0]->material_number : '') }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">
                                            Product Hierarehy
                                        </td>
                                        <td class="text-">
                                            <input type="text" name="product_hierarehy" class="form-control form-control-lg"
                                                value="{{ !empty($FM_PD_018_3->product_hierarehy) ?$FM_PD_018_3->product_hierarehy :null }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">
                                            Time
                                        </td>
                                        <td class="text-">
                                            @if (!empty($FM_PD_018_3->time_shipper_carton))
                                                <input value="{{ $FM_PD_018_3->time_shipper_carton }}" class="form-control form-control-lg" >
                                            @else
                                                <div class="time_now"></div>
                                            @endif
                                            <input type="hidden" name="time_shipper_carton" class="time_now">

                                            </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">
                                            Batch Number
                                        </td>
                                        <td class="text-">
                                            <input type="text" name="batch_no" class="form-control form-control-lg" 
                                            value="{{ !empty($FM_PD_018_3->batch_no) ?$FM_PD_018_3->batch_no : (!empty($head[0]->batch) ? $head[0]->batch : '') }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">
                                            EXP.
                                        </td>
                                        <td class="text-">
                                            <input type="" name="exp" class="form-control form-control-lg"
                                                value="{{ !empty($FM_PD_018_3->exp) ?$FM_PD_018_3->exp :  
                                                (!empty($head[0]->expiry_date) ?  substr($head[0]->expiry_date,6,2).'.'.substr($head[0]->expiry_date,4,2).'.'.substr($head[0]->expiry_date,0,4)  : '')  }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">
                                            BBD.
                                        </td>
                                        <td class="text-">
                                            <input type="" name="bbd" class="form-control form-control-lg"
                                                value="{{ !empty($FM_PD_018_3->bbd) ?$FM_PD_018_3->bbd :null }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right">
                                            Product Order
                                        </td>
                                        <td class="text-">
                                            <input type="text" name="production_order" class="form-control form-control-lg col-5"
                                                value="{{ !empty($FM_PD_018_3->production_order) ? $FM_PD_018_3->production_order  : (!empty($head[0]->production_order) ? $head[0]->production_order : '') }}">
                                                
                                            Line 
                                            <input type="text" name="product_line" class="form-control form-control-lg col-5"
                                                value="{{ !empty($FM_PD_018_3->product_line) ? $FM_PD_018_3->product_line  : (!empty($head[0]->line_number) ? $head[0]->line_number : '') }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- กาวที่ใช้ในการผลิต -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped tbl-paperless">
                                <thead class="text-center">
                                    <tr>
                                        <th>
                                            กาวที่ใช้ในการผลิต
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="container">
                                                &nbsp;ไทย
                                                <input type="radio" name="glue" value="1" {{ (!empty($FM_PD_018_3->glue) && $FM_PD_018_3->glue == '1') ?'checked' :null }}>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container">
                                                &nbsp;ส่งออก
                                                <input type="radio" name="glue" value="2" {{ (!empty($FM_PD_018_3->glue) && $FM_PD_018_3->glue == '2') ?'checked' :null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ลายเซ็นผู้บันทึก -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="font-weight-bold">บันทึกโดย</h3>

                            <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="{{ !empty($FM_PD_018_3->sign_operator) ?$FM_PD_018_3->sign_operator :'0' }}">
                            <div id="sign_operator" class="{{ !empty($FM_PD_018_3->sign_operator) ?'' :'d-none' }}">
                                <img src="{{ !empty($FM_PD_018_3->sign_operator) ?asset('/assets/images/sign/'.$FM_PD_018_3->sign_operator) :'' }}"
                                width="145">
                                <br> ( {{ isset($FM_PD_018_3->operator_name)? $FM_PD_018_3->operator_name : null }} ) <br>

                            </div>
                                
                            @if(empty($FM_PD_018_3->sign_operator))
                                <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal">
                                    <i class="fas fa-signature"></i>
                                    ลายเซ็น
                                </button>
                            @endif
                            <h3 class="font-weight-bold">(พนักงาน Operator packing)</h3>

                            <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                        </div>

                    </div>

                    @if(empty($FM_PD_018_3))
                        <div class="row text-center mt-4">
                            <div class="col-lg-6 col-md-6">
                                <button id="btn-save" class="btn btn-lg btn-block btn-success">
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
  
</form>

<!-- Modal ลายเซ็น operator บันทึก -->
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
                <input type="password" class="form-control form-control-lg" name="pass_sign" id="pass_sign_operator" placeholder="รหัสผ่าน">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="check_pass_sign('sign_operator', {{ $production_order }})" class="btn btn-lg btn-block btn-success">
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
    // $('#spoon_size1').click( function() {
    //     $('#img-spoon-1').show();
    //     $('#img-spoon-2').hide();
    //     $('#img-spoon-3').hide();
    //     $('#img-spoon-4').hide();
    //     $('#img-spoon-5').hide();
    // });

    // $('#spoon_size2').click( function() {
    //     $('#img-spoon-1').hide();
    //     $('#img-spoon-2').show();
    //     $('#img-spoon-3').hide();
    //     $('#img-spoon-4').hide();
    //     $('#img-spoon-5').hide();
    // });

    // $('#spoon_size3').click( function() {
    //     $('#img-spoon-1').hide();
    //     $('#img-spoon-2').hide();
    //     $('#img-spoon-3').show();
    //     $('#img-spoon-4').hide();
    //     $('#img-spoon-5').hide();
    // });

    // $('#spoon_size4').click( function() {
    //     $('#img-spoon-1').hide();
    //     $('#img-spoon-2').hide();
    //     $('#img-spoon-3').hide();
    //     $('#img-spoon-4').show();
    //     $('#img-spoon-5').hide();
    // });

    // $('#spoon_size5').click( function() {
    //     $('#img-spoon-1').hide();
    //     $('#img-spoon-2').hide();
    //     $('#img-spoon-3').hide();
    //     $('#img-spoon-4').hide();
    //     $('#img-spoon-5').show();
    // });
</script>
@endsection
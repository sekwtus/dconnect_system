@extends('layouts.master')

@section('title', 'FM-PD-024')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-024/store/'.$production_order, 'files' => true]) }}
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-024 Rev.04
                            Verification Oprps And Ccps For Release Product Record</h3>
                    </div>
                </div>
            </div>
            @foreach ($head as $item)
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label> Date: &nbsp;&nbsp; {{ date_format(now(),"Y-m-d") }}</label>
                        <input class="form-control" type="hidden" id="date" name="date"
                            value="{{ date_format(now(),"Y-m-d") }}">
                    </div>
                    <div class="col-lg-8">
                        <label>PRODUCT NAME: {{$item->material_description}}</label>
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
            @endforeach
        </div>

        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless">
                            <thead class="text-center">
                                <tr>
                                    <th colspan="2">
                                        รายละเอียดของ Unit Carton / Specail box
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-right" style="width: 30%">
                                        PM. Code
                                    </td>
                                    <td>
                                        <input type="" name="pm_code_unit_carton" class="form-control form-control-lg" placeholder="PM Code (Unit Carton/Specail box)"
                                            value="{{ !empty($pm_code_unit_carton) ?$pm_code_unit_carton->sap_code :null }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <div class="font-weight-normal-">วันผลิต</div>
                                        <div class="font-weight-normal-">วันหมดอายุ</div>
                                        <div class="font-weight-normal-">Meterial Number</div>
                                        <div class="font-weight-normal-">Batch</div>
                                        <div class="font-weight-normal-">Product Order/Line</div>
                                    </td>

                                    <td>
                                        <input type="file" class="dropify" name="Detail_Unit_Carton"
                                            data-height="200" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

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
                                    <td class="text-right" style="width: 20%;">
                                        PM Code
                                    </td>
                                    <td>
                                        <input type="" name="pm_code_shipper_carton" class="form-control form-control-lg" placeholder="PM Code (Shipper Carton)"
                                            value="{{ !empty($pm_code_shipper_carton) ?$pm_code_shipper_carton->sap_code :null }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless">
                            <thead class="text-center">
                                <tr>
                                    <th colspan="2">
                                        ช้อน
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="text-right">
                                        ช้อนเบอร์
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;1
                                                        <input type="checkbox" name="spoon_size" value="1" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;2
                                                        <input type="checkbox" name="spoon_size" value="2" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;3
                                                        <input type="checkbox" name="spoon_size" value="3" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;4
                                                        <input type="checkbox" name="spoon_size" value="4" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;5
                                                        <input type="checkbox" name="spoon_size" value="5" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" width="20%" class="text-center">
                                        PM. Code
                                    </td>
                                    <td colspan="7" style="background-color:white;vertical-align:middle;">
                                        <input type="" name="pm_code_scoop" class="form-control form-control-lg" placeholder="PM Code (ช้อน)"
                                            value="{{ !empty($pm_code_scoop) ?$pm_code_scoop->item_scoop :null }}">
                                    </td>
                                </tr>
                                <input type="hidden" name="Date" id="Date" value="{{ date_format(now(),"Y-m-d") }}">
                                <input type="hidden" name="Time" id="Time" value="{{ date("H:i:s") }}">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ลายเซ็นผู้บันทึก -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-weight-bold">บันทึกโดย</h3>
            
                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="0">
                        <div id="sign_operator" class="d-none"></div>
                        
                        <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal">
                            <i class="fas fa-signature"></i>
                            ลายเซ็น
                        </button>

                        <h3 class="font-weight-bold"> 
                            (พนักงานเสริฟกล่อง Unitในไลน์)
                        </h3>
            
                        <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                    </div>
                </div>

                <div class="row text-center mt-4">
                    <div class="col-lg-6 col-md-6">
                        <button type="button" id="btn-save" class="btn btn-lg btn-block btn-success">
                            <i class="fa fa-save"></i> บันทึก
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
                        <button type="button" class="btn btn-lg btn-block btn-info" onclick="window.location.href='{{ url('printer_monitor/'.$production_order) }}'">
                            <i class="fa fa-undo"></i> ย้อนกลับ
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{ Form::close() }}

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


    $('input[name="pm_code_unit_carton"] , input[name="pm_code_shipper_carton"] , input[name="pm_code_scoop"]').keyup(function (e) { 
        // console.log(44);
         $(this).val( $(this).val().toUpperCase() );

    });

    // checkbox แบบเลิอกได้อันเดียว ติ๊กออกได้
    $('input[name="spoon_size"]').on('change', function() {
        $('input[name="spoon_size"]').not(this).prop('checked', false);
    });

</script>


@endsection
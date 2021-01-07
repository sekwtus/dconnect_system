@extends('layouts.master')

@section('title', 'FM-PD-034')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-034/store/'.$production_order, 'files' => true]) }}
    
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-034 Rev No.12
                            แบบฟอร์มการบันทึกการตรวจสอบ Unit Carton/Special Box</h3>
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
                <!--  -->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless">
                            <tbody>
                                <tr>
                                    <th class="text-center" style="width:15%;">
                                        กล่องยูนิตบรรจุ<br>(Unit Box)
                                    </th>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">Unit Carton
                                                        <input type="radio" name="Unit_Box" value="Unit Carton" required
                                                            {{ (!empty($FM_PD_034->Unit_Box) && $FM_PD_034->Unit_Box == 'Unit Carton') ? 'checked' : null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">Special Box
                                                        <input type="radio" name="Unit_Box" value="Spacial Box" required
                                                            {{ (!empty($FM_PD_034->Unit_Box) && $FM_PD_034->Unit_Box == 'Spacial Box') ? 'checked' : null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Lot No./Batch No.
                                    </th>
                                    <td>
                                        <input type="" name="Batch_No" class="form-control form-control-lg"
                                            value="{{ !empty($FM_PD_034->Batch_No) ?$FM_PD_034->Batch_No :null }}"
                                            placeholder="กรุณากรอก" required>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        PM Code
                                    </th>
                                    <td>
                                        <input type="text" name="PM_Code" class="form-control form-control-lg"
                                            placeholder="PM Code"
                                            value="{{ !empty($pm_code) ? $pm_code->sap_code : (!empty($FM_PD_034->PM_Code) ? $FM_PD_034->PM_Code : null) }}">
                                            
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="background-color:#ffffff;vertical-align:middle;">
                                        &nbsp;&nbsp;- ให้ถ่ายภาพใบรายละเอียดข้างกล่อง Unit Carton / Shipper Carton<br>
                                        &nbsp;&nbsp;- ถ้ารายละเอียดข้างกล่อง Unit Carton / Shipper Carton
                                        แต่ละกล่องเหมือนกันให้ถ่ายแค่ใบเดียว<br>
                                        &nbsp;&nbsp;- สำหรับกล่องที่ใช้ Unit Carton / Shipper Carton ไม่หมด
                                        ให้ถ่ายภาพรายละเอียดลงช่องด้สนล่างแทน
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="" colspan="2" width="50%" style="background-color:#white;vertical-align:middle;" class="text-center">
                                        <input type="file" id="input-file-now" class="dropify" name="Pic_1" required
                                            data-height="200"
                                            data-default-file="{{ !empty($FM_PD_034->Pic_1) ? asset('assets/FM-PD-034/'.$FM_PD_034->Pic_1) : null }}" />
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
            
                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="{{ !empty($FM_PD_034->sign_operator) ?$FM_PD_034->sign_operator :'0' }}">
                        <div id="sign_operator" class="{{ !empty($FM_PD_034->sign_operator) ?'' :'d-none' }}">
                            <img src="{{ !empty($FM_PD_034->sign_operator) ? asset('assets/images/sign/'.$FM_PD_034->sign_operator) :'' }}" width="145">
                            <br> <b>( {{ isset($FM_PD_034->leader_name) ? $FM_PD_034->leader_name : null }} )</b><br>
                        </div>
                            
                        @if(empty($FM_PD_034->sign_operator))
                            <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal">
                                <i class="fas fa-signature"></i>
                                ลายเซ็น
                            </button>
                        @endif

                        <h3 class="font-weight-bold">
                            (ฝ่ายผลิต)
                            &nbsp;
                            @if(!empty($FM_PD_034))
                                วันที่ {{ th_date_time_slash($FM_PD_034->created_at) }} 
                            @endif
                        </h3>
            
                        <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                    </div>
            
                </div>
        
                @if(empty($FM_PD_034))
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
{{ Form::close() }}

<!-- Modal ลายเซ็น operator-->
<div class="modal fade" id="sign_operator_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"
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
                   บันทึก
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>

<script>
    $('input[name="Batch_No"]').keyup(function (e) { 
        // console.log(44);
         $(this).val( $(this).val().toUpperCase() );

    });

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
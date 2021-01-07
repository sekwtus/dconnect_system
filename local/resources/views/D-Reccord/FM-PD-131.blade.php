@extends('layouts.master')

@section('title', 'FM-PD-131')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-131/store/'.$production_order, 'files' => true]) }}
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-131 Rev.05
                            การทดสอบกล้องตรวจสอบช้อน (Scoop Camera) สำหรับ</h3>
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
                                    <th>ทดสอบความถี่ของ (Frequency)</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <label class="container">ก่อนเริ่มงานแต่ละกะ
                                                        <input type="checkbox" name="frequency[]" value="ก่อนเริ่มงานแต่ละกะ">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <label class="container">เปลี่ยนผลิตภัณฑ์
                                                        <input type="checkbox" name="frequency[]" value="เปลี่ยนผลิตภัณฑ์">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
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
                                    <th rowspan="2" style="width20%;">
                                        เวลาทดสอบ<br>(Time)
                                    </th>
                                    <th rowspan="2" style="width: %;">
                                        ทดสอบ
                                    </th>
                                    <th rowspan="2" style="width: %;">
                                        ครั้งที่
                                    </th>
                                    <th colspan="2" style="width: %;">
                                        ผลการทดสอบตรวจ
                                    </th>
                                    <th rowspan="2" style="width: %;">
                                        หมายเหตุ
                                    </th>
                                </tr>
                
                                <tr>
                                    <th style="font-size:14px;">
                                        Reject
                                    </th>
                                    <th style="font-size:14px;">
                                        No Rej.
                                    </th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <tr>
                                    <td rowspan="6" class="text-center">
                                        <div class="date_now"></div>
                                        <div class="time_now"></div>
                                        <input type="hidden" name="txtTimeNow" class="time_now">
                                    </td>
                                    <input type="hidden" name="Date" id="Date" value="{{ date_format(now(),"Y-m-d") }}">
                                </tr>
                                <tr>
                                    <td rowspan="3" class="text-center">
                                        ไม่มีช้อน
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_1" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_1" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td rowspan="3" class="text-center">
                                        <textarea class="form-control" rows="8" name="Note" placeholder="หมายเหตุ"></textarea>
                
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_2" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_2" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_3" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_3" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                
                                {{-- <tr>
                                    <td colspan="2" style="background-color:#e9ebeb;vertical-align:middle;font-size:16px;"
                                        class="text-center" width="22%">
                                        ผู้ทดสอบและลงบันทึก<br>โดย Barcode Operator
                                    </td>
                    
                                    <td colspan="4" style="background-color:#eafafa;vertical-align:middle;" class="text-center"> 
                                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="0">
                                        <div id="sign_operator" class="d-none"></div>
                                        
                                        <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal" data-input="Stainless_Operator_1"
                                            @if (Auth::user()->id_type_user!=2 || !empty($FM_PD_002[0]->Stainless_Operator_1))
                                                {{ 'disabled' }}
                                            @endif>
                                            <i class="fas fa-signature"></i>
                                            ลายเซ็น
                                        </button>
                    
                                        <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                                    </td>
                                </tr> --}}
                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                    </div>
                </div>

                <!-- ลายเซ็นผู้บันทึก -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-weight-bold">บันทึกโดย</h3>
            
                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="0">
                        <div id="sign_operator" class="d-none"></div>
                        
                        <button type="button" id="btn_sign_operator" data-keyboard="false" data-backdrop="static" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal">
                            <i class="fas fa-signature"></i>
                            ลายเซ็น
                        </button>
            
                        {{-- <h3 class="font-weight-bold">
                        </h3> --}}
            
                        <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                    </div>
                </div>
            
                <div class="row text-center mt-4">
                    <div class="col-lg-6 col-md-6">
                        <button type="button" id="btn-save"  onclick="" class="btn btn-lg btn-block btn-success">
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
                <br>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    วิธีการทดสอบกล้องตรวจสอบช้อน
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;1. ผู้ดูแลกล้องตรวจสอบช้อน ทดลองไม่ใส่ช้อนจำนวน 3 ครั้ง<br>
                                    &nbsp;&nbsp;2. บันทึกข้อมูลการตรวจสอบการทำงานของกล้องทุกครั้ง<br>
                                    &nbsp;&nbsp;3. หากพบว่ากล้องไม่สามารถตรวจสอบและรีเจ็คท์ถุงนมที่ไม่มีช้อนครบทั้ง 3 ครั้ง
                                    ให้ดูที่ช่องการแก้ไข</td>
                            </tr>
                        </tbody>
                    </table>
            
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    ความถี่ในการทดสอบ
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;1. ก่อนเริ่มงานแต่ละกะ<br>
                                    &nbsp;&nbsp;2. ทุกครั้งที่เปลี่ยนผลิตภัณฑ์<br>
            
                            </tr>
                        </tbody>
                    </table>
            
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    การแก้ไข
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;สิ่งที่ต้องทำทันที<br>
                                    &nbsp;&nbsp;- หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คของผลิตภัณฑ์ที่ไม่มีช้อนได้ครบทั้ง 3
                                    ครั้ง<br>&nbsp;&nbsp;แสดงว่ากล้องเสีย <br>
                                    &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader) <br>
                                    &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน
                                    (block)
                                    <br>
            
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
</script>

{{-- <script>
    function check_pass_sign(id_pic){
        var user_type_str = id_pic;
        var pass_sign = $('#pass_'+user_type_str).val();
        var sign_photo = '{{ Auth::user()->sign_photo }}';

        $.ajax({
            type: 'post',
            // dataType: 'JSON',
            url: '{{ url('check_pass_sign') }}',
            data: {pass_sign : pass_sign},
            beforeSend: function(){
            },
            success: function (pic_sign) {
                if (pic_sign) {
                    // alert(user_type_str);
                    // var flagsUrl = '{{ URL::asset('/images/flags/') }}';
                    $('#'+user_type_str).html('<img src="{{ asset('/assets/images/sign/') }}/'+sign_photo+'" width="145">');
                    $('#'+user_type_str+'_modal').modal('toggle');
                } else {
                    alert('รหัสผ่านไม่ถูกต้อง');
                    $('#'+user_type_str+'_modal').modal('toggle');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    }
</script> --}}
@endsection
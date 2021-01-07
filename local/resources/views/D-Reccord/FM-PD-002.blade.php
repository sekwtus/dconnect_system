@extends('layouts.master')

@section('title', 'FM-PD-002')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-002/store/'.$production_order, 'files' => true]) }}
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-002 Rev.17
                            การทดสอบการทำงานเครื่อง X-Ray</h3>
                    </div>
                </div>
            </div>
            @foreach ($head as $item)
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label> Date: &nbsp;&nbsp; {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.substr($item->scheduled_start,0,4) }} </label>
                        <input class="form-control" type="hidden" id="date" name="date"
                            value="{{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.substr($item->scheduled_start,0,4) }} ">
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
                <!-- รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch -->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless">
                            <thead>
                                <tr>
                                    <td style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;" class="text-center">
                                        ทดสอบความถี่ของ(Frequency)
                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container" style=" padding-right:0px;">
                                                        ก่อนเริ่มงานแต่ละกะ
                                                        <input type="checkbox" name="Frequency[]" value="ก่อนเริ่มงานแต่ละกะ">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container" style=" padding-right: 0px; ">
                                                        เปลี่ยนผลิตภัณฑ์
                                                        <input type="checkbox" name="Frequency[]" value="เปลี่ยนผลิตภัณฑ์">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container" style=" padding-right: 0px; ">
                                                        เปลี่ยนขนาดของผลิตภัณฑ์
                                                        <input type="checkbox" name="Frequency[]" value="เปลี่ยนขนาดของผลิตภัณฑ์">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container" style=" padding-right: 0px; ">
                                                        หลังจากที่ไลน์การผลิตหยุด 60 นาที
                                                        <input type="checkbox" name="Frequency[]" value="หลังจากที่ไลน์การผลิตหยุด 60 นาที">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container" style=" padding-right: 0px; ">
                                                        มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray
                                                        <input type="checkbox" name="Frequency[]" value="มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container" style=" padding-right: 0px; ">
                                                        ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง
                                                        <input type="checkbox" name="Frequency[]" value="ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container" style=" padding-right: 0px; ">
                                                        ทุกวันหลังสิ้นสุดการผลิต
                                                        <input type="checkbox" name="Frequency[]" value="ทุกวันหลังสิ้นสุดการผลิต">
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
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" width="20%">
                                        เวลาทดสอบ<br>(Time)
                                    </th>
                                    <th rowspan="2" class="text-center" width="32%">
                                        ชนิดของแผ่นทดสอบ<br>(Test Case)
                                    </th>
                                    <th rowspan="2" class="text-center" width="8%">
                                        ครั้งที่
                                    </th>
                                    <th colspan="2" class="text-center" width="20%">
                                        ผลการตรวจสอบ
                                    </th>
                
                                    <th rowspan="2" class="text-center" width="20%">
                                        หมายเหตุ
                                    </th>
                                </tr>
                                <tr>
                                    <th style="font-size:14px;" class="text-center">
                                        Reject
                                    </th>
                                    <th style="font-size:14px;" class="text-center">
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
                
                                    <td rowspan="3" class="text-center">สแตนเลส
                                        1.2 มม.<br>(Stainless 1.2 mm)
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Stainless_Result_1" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Stainless_Result_1" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                
                                    <td rowspan="3" class="text-center">
                                        <textarea class="form-control" rows="8" name="Stainless_Note" placeholder="หมายเหตุ"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Stainless_Result_2" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Stainless_Result_2" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Stainless_Result_3" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Stainless_Result_3" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="text-center">
                                        โลหะ 1.2 มม.<br>(Metal 1.2 mm)
                                    </td>

                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Metal_Result_1" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Metal_Result_1" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                
                                    <td rowspan="3" class="text-center">
                                        <textarea class="form-control" rows="8" name="Metal_Note" placeholder="หมายเหตุ"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Metal_Result_2" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Metal_Result_2" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Metal_Result_3" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Metal_Result_3" value="No_Reject" onchange="CheckOnlyOne(this)">
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
            
                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="0">
                        <div id="sign_operator" class="d-none"></div>
                        
                        <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#sign_operator_modal">
                            <i class="fas fa-signature"></i>
                            ลายเซ็น
                        </button>
            
                        <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                    </div>
                </div>

                <div class="row mt-4 text-center">
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
                <br>
            
                <div class="table-responsive">
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    วิธีการทดสอบการทำงานของเครื่อง X-Ray
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;1. ใช้แผ่นทดสอบ 2 ชนิดตืดที่ถุงนม (1 แผ่น/1 ถุง) แล้ววางคว่ำแผ่นทดสอบบนสายพาน
                                    เพื่อให้ถุงนมผ่านเข้าเครื่อง X-Ray<br>
                                    &nbsp;&nbsp;2. แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่อง X-Ray 3 ครั้ง รวมที่งหมด 6 ครั้ง</td>
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
                                    &nbsp;&nbsp;3. ทุกครั้งที่เปลี่ยนขนาดผลิตภัณฑ์<br>
                                    &nbsp;&nbsp;4. หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที<br>
                                    &nbsp;&nbsp;5. มีการซ่อมแซมหรือแก้ๆไขเครื่อง X-Ray<br>
                                    &nbsp;&nbsp;6. ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง<br>
                                    &nbsp;&nbsp;7. ทุกวันหลังสิ้นสุดการผลิต
                                </td>
                            </tr>
                        </tbody>
                    </table>
            
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    ขอบเขตวิกฤต (Critcal Limit)
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;เครื่อง X-Ray ต้องรีเจ็คฑ์แผ่นทดสอบได้ทุกแผ่นและทุกครั้ง</td>
                            </tr>
                        </tbody>
                    </table>
            
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    การแก้ไข หากขอบเขตวิกฤตเกินกว่ากำหนด
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;สิ่งที่ต้องทำทันที หากพบว่าเครื่อง X-Ray ไม่สามารถรีเจ๊คฑ์แผ่นทดสอบได้ครบทุกครั้ง
                                    แสดงว่าเครื่อง X-Ray มีปัญหา<br>
                                    &nbsp;&nbsp;1. X-Ray Operator ห้ามปรับพารามิเตอร์ของเครื่อง X-Ray โดยเด็ดขาด
                                    แต่ให้หยุดการผลิดทันที <br>&nbsp;&nbsp;และทำการแจ้งหัวหน้างาน<br>
                                    &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้แผ่นทดสอบเครื่อง X-Ray ครั้งสุดท้าย
                                    <br>&nbsp;&nbsp;และกักกัน (block) ผลิตภัณฑ์ในระบบ<br>
                                    <br>&nbsp;&nbsp;จกานั้นปฏิบัติตามใน HACCP Action Plan
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
                <input type="password" name="pass_sign" id="pass_sign_operator" class="form-control form-control-lg" placeholder="รหัสผ่าน">
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
@endsection

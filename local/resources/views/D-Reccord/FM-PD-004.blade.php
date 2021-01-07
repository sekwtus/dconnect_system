@extends('layouts.master')

@section('title', 'FM-PD-004')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-004/store/'.$production_order, 'files' => true]) }}
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-004 Rev.13
                            การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader)</h3>
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
                                    <th>
                                        เลขที่บาร์โค้ด (Barcode no.)
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <input type="file"  class="dropify" name="bracode_no" data-height="200" required>
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
                                    <th>
                                        ทดสอบตามความถี่ของ (Frequency)
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-left">
                                        <label class="container">
                                            <h6>ก่อนเริ่มงานแต่ละกะ</h6>
                                            <input type="checkbox" name="frequency[]" value="ก่อนเริ่มงานแต่ละกะ" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">
                                            <h6>เปลี่ยนผลิตภัณฑ์</h6>
                                            <input type="checkbox" name="frequency[]" value="เปลี่ยนผลิตภัณฑ์" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">
                                            <h6>เปลี่ยนขนาดของผลิตภัณฑ์</h6>
                                            <input type="checkbox" name="frequency[]" value="เปลี่ยนขนาดของผลิตภัณฑ์" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">
                                            <h6>หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที</h6>
                                            <input type="checkbox" name="frequency[]" value="หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">
                                            <h6>มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด</h6>
                                            <input type="checkbox" name="frequency[]" value="มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">
                                            <h6>ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง</h6>
                                            <input type="checkbox" name="frequency[]" value="ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">
                                            <h6>ทุกวันหลังสิ้นสุดการผลิต</h6>
                                            <input type="checkbox" name="frequency[]" value="ทุกวันหลังสิ้นสุดการผลิต" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class=" mt-4">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless">
                            <thead class="text-center">

                                <tr>
                                    <th rowspan="2">
                                        เวลาทดสอบ <br>(Time)
                                    </th>
                                    <th rowspan="2">
                                        ชนิดของกล่อง<br>ทดสอบบาร์โค้ด <br>(Test box)
                                    </th>
                                    <th rowspan="2">
                                        ครั้งที่
                                    </th>
                                    <th colspan="2">
                                        ผลการตรวจสอบ
                                    </th>
                                    <th rowspan="2">
                                        หมายเหตุ
                                    </th>
                                </tr>
                                <tr>
                                    <th style="font-size:14px;">
                                        Reject
                                    </th>
                                    <th style="font-size:14px;">No
                                        Rej.
                                    </th>
                                </tr>

                                @php
                                $time_now = date_format(now(),"H:i:s");
                                @endphp
                            </thead>
                                
                            <tbody>
                                <tr>
                                    <td rowspan="6"class="text-center">
                                            <div class="date_now"></div>
                                            <div class="time_now"></div>
                                            <input type="hidden" name="time" class="time_now">
                                        <input type="hidden" name="Date" id="Date" value="{{ date_format(now(),"Y-m-d") }}">
                                    </td>
                                    <td rowspan="3"class="text-center">
                                        Barcode ผิด
                                    </td>

                                    <td class="text-center">1
                                    </td>

                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_1" value="Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_1" value="No_Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td rowspan="3" class="text-center">
                                        <textarea class="form-control" rows="8" placeholder="หมายเหตุ" name="Wrong_Barcode_Note"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">2</td>

                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_2" value="Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_2" value="No_Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">3</td>

                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_3" value="Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_3" value="No_Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="text-center">Barcode
                                        ไม่มี<br>
                                    </td>
                                    <td class="text-center">1</td>

                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_1" value="Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_1" value="No_Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td rowspan="3" class="text-center">
                                        <textarea class="form-control" rows="8" name="No_Barcode_Note" placeholder="หมายเหตุ"></textarea>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="text-center">2</td>

                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_2" value="Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_2" value="No_Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="text-center">3</td>

                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_3" value="Reject"  onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_3" value="No_Reject"  onchange="CheckOnlyOne(this)">
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

                        {{-- <h3 class="font-weight-bold"> 
                            (พนักงานเสริฟกล่อง Unitในไลน์)
                        </h3> --}}
            
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
                <br>
            
                <div class="table-responsive">
                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    วิธีการทดสอบการทำงานของเครื่องอ่านบาร์โค้ด
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;1. 
                                    1. วางกล่องทดสอบบนสายพาน เพื่อให้กล่องทดสอบผ่านเครื่องอ่านบาร์โค้ด
                                    <br>
                                    &nbsp;&nbsp;2. กล่องทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-striped ">
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

                    <table class="table table-bordered table-striped ">
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
                                    &nbsp;&nbsp;

                                    เครื่องอ่านบาร์โค้ด สามารถรีเจคท์กล่องที่บาร์โค้ดผิด, บาร์โค้ดไม่มี หรือบาร์โค้ดไม่ชัดได้ทุกกล่องและทุกครั้ง</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-striped ">
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
                                    &nbsp;&nbsp;
                                    สิ่งที่ต้องทำทันที หากพบว่าเครื่องอ่านบาร์โค้ดไม่สามารถรีเจ็คท์กล่องทดสอบได้ครบทุกครั้ง แสดงว่าเครื่องอ่านบาร์โค้ดเสีย<br>
                                    &nbsp;&nbsp;1. Barcode Operator ห้ามปรับพารามิเตอร์ของเครื่องอ่านบาร์โค้ดโดยเด็ดขาด แต่ให้หยุดการผลิตทันที
                                    <br>&nbsp;&nbsp;และทำการแจ้งหัวหน้างาน<br>
                                    &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้กล่องทดสอบเครื่องอ่านบาร์โค้ดครั้งสุดท้าย 
                                    <br>&nbsp;&nbsp;และกักกัน (block) ผลิตภัณฑ์ในระบบ  จากนั้นปฏิบัติตามใน HACCP Action Plan
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
</script>
@endsection
@extends('layouts.master')

@section('title', 'FM-PD-044')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-044/store/'. $production_order, 'files' => true]) }}
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-044 Rev.03
                            การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ</h3>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $item->production_order }}</label>
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
                                        <input type="file" class="dropify" name="Barcode_No" data-height="200" required/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless">
                            <thead class="text-center">
                                <tr>
                                    <th>
                                        ทดสอบความถี่ของ (Frequency)
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <label class="container">
                                            ก่อนเริ่มงานแต่ละกะ
                                            <input type="checkbox" name="frequency[]" value="ก่อนเริ่มงานแต่ละกะ">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="container">
                                            เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์
                                            <input type="checkbox" name="frequency[]" value="เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์">
                                            <span class="checkmark"></span>
                                        </label>
                                        
                                        <label class="container">
                                            เปลี่ยนขนาดของผลิตภัณฑ์
                                            <input type="checkbox" name="frequency[]" value="เปลี่ยนขนาดของผลิตภัณฑ์">
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
                        <table class="table table-bordered table-striped tbl-paperless">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2" width="14%">
                                        เวลาทดสอบ<br>(Time)
                                    </th>
                                    <th rowspan="2" width="14%">
                                        ชนิดของแผ่นทดสอบ<br>(Test Case)
                                    </th>
                                    <th rowspan="2" width="14%">
                                        ครั้งที่
                                    </th>
                                    <th colspan="2" width="14%">
                                        ผลการทดสอบ
                                    </th>
                                    <th rowspan="2" width="14%">
                                        หมายเหตุ
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle ">
                                        Reject
                                    </th>
                                    <th class="text-center align-middle ">
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
                                    <td rowspan="3" class="text-center">
                                        Barcode ผิด
                                    </td>

                                    <td class="text-center">1</td>
                                    <td>
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_1" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_1" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>

                                    <td rowspan="3" style="background-color:#eafafa;vertical-align:middle;"
                                        class="text-center align-middle ">
                                        <textarea class="form-control" rows="8" name="Wrong_Barcode_Note" placeholder="หมายเหตุ"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle ">2</td>
                                    <td class="text-center align-middle ">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_2" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_2" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_3" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td class="text-center">
                                    <td>
                                        <label class="container">
                                            <input type="checkbox" name="Wrong_Barcode_Result_3" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td rowspan="3" class="text-center">
                                        Barcode ไม่มี
                                    </td>

                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_1" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_1" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td rowspan="3" class="text-center align-middle ">
                                        <textarea class="form-control" rows="8" name="No_Barcode_Note" placeholder="หมายเหตุ"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle ">2</td>
                                    <td class="text-center align-middle ">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_2" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center align-middle ">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_2" value="No_Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle ">3</td>
                                    <td class="text-center align-middle ">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_3" value="Reject" onchange="CheckOnlyOne(this)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center align-middle ">
                                        <label class="container">
                                            <input type="checkbox" name="No_Barcode_Result_3" value="No_Reject" onchange="CheckOnlyOne(this)">
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

                <table class="table table-bordered table-striped tbl-paperless">
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
                                &nbsp;&nbsp;1. ติดแผ่นทดสอบบนฟอล์ย เพื่อให้แผ่นทดสอบผ่านเครื่องอ่านบาร์โค้ด<br>
                                &nbsp;&nbsp;2. แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง</td>
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
                                &nbsp;&nbsp;3. ทุกครั้งที่เปลี่ยนขนาดผลิตภัณฑ์</td>
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
                                &nbsp;&nbsp;- หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คของผลิตภัณฑ์ที่ไม่มีบาร์โค้ดได้ครบทั้ง 3
                                ครั้ง<br>&nbsp;&nbsp;แสดงว่าเครื่องทำงานไม่ปกติ <br>
                                &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader) <br>
                                &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน (block)
                                <br>
                                &nbsp;&nbsp;- หากพบว่าเครื่องรีเจคซองผลิตภัณฑ์ที่บาร์โค้ดผิดหรือยาร์โค้ดไม่มี<br>
                                &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader) <br>
                                &nbsp;&nbsp;2. Operator
                                เคลียร์และตรวจสอบผลิตภัณฑ์ที่อยู่บนสายพานออกให้หมด<br>&nbsp;&nbsp;หากพบว่าฟอล์ยที่ใช้ไม่เป็นไปตามข้อกำหนดให้เปลี่ยนฟอล์ยม้วนใหม่ทันที่
                                <br><br>
                                &nbsp;&nbsp;จากนั้นปฏิบัติตามใน HACCP Action Plan
                            </td>
                        </tr>
                    </tbody>
                </table>
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

@endsection
@extends('layouts.master')

@section('title', 'FM-PD-130')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-130/store/'.$production_order, 'files' => true]) }}
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-130 Rev.06
                            การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop)</h3>
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
                        <table class="table table-bordered table-striped ">
                            <tbody>
                                <thead>
                                    <tr>
                                        <td class="text-center">
                                            ช้อนเบอร์
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="container">&nbsp;&nbsp;1
                                                        <input type="checkbox" name="Spoon" value="1" onchange="CheckOnlyOne(this)"
                                                            {{ (!empty($FM_PD_130[0]->Spoon) && $FM_PD_130[0]->Spoon == '1') ? 'checked' : null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="container">&nbsp;&nbsp;2
                                                        <input type="checkbox" name="Spoon" value="2" onchange="CheckOnlyOne(this)"
                                                            {{ (!empty($FM_PD_130[0]->Spoon) && $FM_PD_130[0]->Spoon == '2') ? 'checked' : null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="container">&nbsp;&nbsp;3
                                                        <input type="checkbox" name="Spoon" value="3" onchange="CheckOnlyOne(this)"
                                                            {{ (!empty($FM_PD_130[0]->Spoon) && $FM_PD_130[0]->Spoon == '3') ? 'checked' : null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="container">&nbsp;&nbsp;4
                                                        <input type="checkbox" name="Spoon" value="4" onchange="CheckOnlyOne(this)"
                                                            {{ (!empty($FM_PD_130[0]->Spoon) && $FM_PD_130[0]->Spoon == '4') ? 'checked' : null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="container">&nbsp;&nbsp;5
                                                        <input type="checkbox" name="Spoon" value="5" onchange="CheckOnlyOne(this)"
                                                            {{ (!empty($FM_PD_130[0]->Spoon) && $FM_PD_130[0]->Spoon == '5') ? 'checked' : null }}>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="col-md-9">
                                                    <img src="{{ asset('/assets/images/scoop/'.$scoop_number.'.jpg') }}" alt="ตัวอย่างรูปช้อน" style="width: 100%; height:200px;">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                            ถ่ายป้ายลงใน<br>ตารางที่กำหนด
                                        </td>
                                        <th style="background-color:white;vertical-align:middle;">
                                            <input type="file" class="dropify" name="Pic_1"
                                                data-height="200"
                                                data-default-file="{{ !empty($FM_PD_130[0]->Pic_1) ? asset('assets/FM-PD-130/'.$FM_PD_130[0]->Pic_1) : null }}" />
                                        </th>
                                    </tr>

                                </thead>
                        
                                <thead>

                                    <td align="center">
                                        ปัญหา
                                    </td>
                                    <th>
                                        <input class="form-control" type="text" placeholder="รายละเอียด" name="Problem"
                                            value="{{ !empty($FM_PD_130[0]->Problem) ? $FM_PD_130[0]->Problem :  null }}">
                                    </th>
                                </thead>

                                <thead>

                                    <td align="center">
                                        การแก้ปัญหา
                                    </td>
                                    <th>
                                        <input class="form-control" type="text" placeholder="รายละเอียด" name="Solution"
                                            value="{{ !empty($FM_PD_130[0]->Solution) ? $FM_PD_130[0]->Solution :  null }}">
                                    </th>
                                </thead>
                                

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
            
                        {{-- <h3 class="font-weight-bold">
                        </h3> --}}
            
                        <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                    </div>
                </div>

                <div class="row text-center mt-4">
                    <div class="col-lg-6 col-md-6">
                        <button type="button" id="btn-save"  class="btn btn-lg btn-block btn-success">
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
                                    ความถี่ในการทดสอบ
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;ทุกกล่อง</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th style="background-color:#8e9090;color: white;" width="75%">
                                    วิธีการตรวจสอบช้อน
                                </th>
                                <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                    &nbsp;&nbsp;1. เปิดกล่องที่ใส่ช้อน<br>
                                    &nbsp;&nbsp;2. ตรวจสอบเบอร์ช้อนที่อยู่ในกล่องและป้ายโค้ดของบรรจุภัณฑ์ว่าถูกต้องและตรงกัน <br>
                                    &nbsp;&nbsp;3. ตรวจสอบเบอร์ช้อนว่าถูกต้องกับผลิตภัณฑ์ที่ผลิต <br>
                                    &nbsp;&nbsp;4. บันทึกข้อมูลและติดป้ายโค้ดของบรรจุภัณฑ์ลงในแบบฟอร์ม <br>
                                    &nbsp;&nbsp;5. สำหรับกล่องที่ยังใช้ช้อนไม่หมด
                                    ให้คัดลอกข้อมูลจากป้ายเดิมแล้วเขียนลงบนป้ายใหม่เพื่อติดบนถุง<br>
                                    &nbsp;&nbsp;หรือกล่องช้อนก่อนส่งกลับคืน
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

{{-- <script>
    $('#modal_save_pass').on('click', function(e) {
        var sign_photo = '{{ Auth::user()->sign_photo }}';
        var pass_sign = $('#pass').val();
        var field = $('#ID').val();
        $.ajax({
            type: 'post',
            url: '{{ url('check_pass_sign') }}',
            data: {
                    pass_sign:pass_sign,
                    field: field,
                    pr_order:{{$production_order}},
                    table_document:'FM_PD_130_main'
                },
            beforeSend: function(){
            },
            success: function (pic_sign) {
                if (pic_sign) {
                    alert('บันทึกลายเซ็นสำเร็จ');
                    $('#'+$('#ID').val()).val(sign_photo);
                    $("button[data-input='" + $('#ID').val() +"']").parent().append('<img src="{{ asset('/assets/images/sign/') }}/'+sign_photo+'" width="145">');
                    $("button[data-input='" + $('#ID').val() +"']").remove();
                    // .replace()
                    $('#ID').val('');
                    $('#pass').val('');
                    $('#modelId').modal('hide');
                } else {
                    alert('รหัสผ่านไม่ถูกต้อง');
                    $('#pass').val('');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    });
</script> --}}

<script>
    //triggered when modal is about to be shown
    $('#modelId').on('show.bs.modal', function(e) {

        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('input');

        //populate the textbox
        $('input[name="pass"]').val($('#'+bookId).val());
        $(e.currentTarget).find('input[name="ID"]').val(bookId);
        // $('#'+bookId).find('input[name="pass"]').val(bookId);
    });
</script>

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
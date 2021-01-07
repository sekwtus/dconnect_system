@extends('layouts.master')

@section('title', 'FM-PD-130')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-130/update/'.$production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a target="_blank" href="{{url('/FM-PD-130/print/'.$production_order)}}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-print fa-lg"></i> พิมพ์
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <table class="tbl-paperless">
                        <thead>
                            @foreach ($head as $item)
                            <tr>
                                <th colspan="3" class="text-center">
                                    FM-PD-130 Rev.06 การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop)
                                </th>
                                <th colspan="1" class="text-center">
                                    LINE : {{$item->line_number}}
                                </th>
                            </tr>


                            <tr>
                                <th class="text-center">
                                    วันที่ :
                                    {{ th_date_scheduled_start($head[0]->scheduled_start) }}
                                </th>
                                <th class="text-center">
                                    PRODUCT ORDER : {{ $item->production_order }}
                                </th>
                                <th class="text-center">
                                    ผลิตภัณฑ์ : {{$item->material_description}}
                                </th>
                                <th class="text-center">
                                    BATCH: {{ $item->batch }}
                                </th>
                            </tr>

                            <tr>
                                <td class="text-center" width="18%">
                                    ช้อนเบอร์
                                </td>
                                <td class="text-center" width="35%">
                                    ป้าย
                                </td>
                                <td class="text-center" width="27%">
                                    ปัญหา / การแก้ปัญหา
                                </td>
                                <td class="text-center" width="20%">
                                    บันทึกโดย
                                </td>
                            </tr>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach ($FM_PD_130_main as $index=>$item)
                            <input type="hidden" name="ID[{{ $index }}]" value="{{ $item->id }}" />

                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <label class="container">&nbsp;&nbsp;1
                                            <input type="radio" name="Spoon[{{$index}}]" value="1"
                                                {{ (!empty($item->Spoon) && $item->Spoon == '1') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">&nbsp;&nbsp;2
                                            <input type="radio" name="Spoon[{{$index}}]" value="2"
                                                {{ (!empty($item->Spoon) && $item->Spoon == '2') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">&nbsp;&nbsp;3
                                            <input type="radio" name="Spoon[{{$index}}]" value="3"
                                                {{ (!empty($item->Spoon) && $item->Spoon == '3') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">&nbsp;&nbsp;4
                                            <input type="radio" name="Spoon[{{$index}}]" value="4"
                                                {{ (!empty($item->Spoon) && $item->Spoon == '4') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">&nbsp;&nbsp;5
                                            <input type="radio" name="Spoon[{{$index}}]" value="5"
                                                {{ (!empty($item->Spoon) && $item->Spoon == '5') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <input type="file" class="dropify" name="Pic_1[{{$index}}]" data-height="200"
                                        data-default-file="{{ !empty($item->Pic_1) ? asset('assets/FM-PD-130/'.$item->Pic_1) : null }}" />
                                </td>
                                <td>
                                    ปัญหา
                                    <textarea class="form-control" rows="3" name="Problem[{{$index}}]"
                                        placeholder="ปัญหา"> {{ !empty($item->Problem) ? $item->Problem :  null }} </textarea>
                                    การแก้ปัญหา
                                    <textarea class="form-control" rows="3" name="Solution[{{$index}}]"
                                        placeholder="การแก้ปัญหา"> {{ !empty($item->Solution) ? $item->Solution :  null }} </textarea>
                                </td>
                                <td class="text-center">
                                    @if(!empty($item->sign_operator))
                                        <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" alt=""
                                            width="145">
                                            <br> ( {{ isset($item->operator_name)? $item->operator_name : null }} ) <br>
                                            {{ $item->Time }}
                                    @endif
                                    <div>
                                        
                                        <br>
                                        <button type="button" onclick="delete_record({{ $item->id }}, 'FM_PD_130_main')" class="btn btn-danger" title="ลบข้อมูล">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <!-- ทวนสอบโดย -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="font-weight-bold">ทวนสอบโดย</h3>
                    @if(!empty($item->sign_leader))
                    <div>
                        <img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" alt="">
                        <br> <b>( {{ isset($item->leader_name) ? $item->leader_name : null }} )</b>

                    </div>
                    <input type="hidden" name="txt_sign_leader" id="txt_sign_leader"
                        value="{{!empty($item->sign_leader) ? $item->sign_leader : '0' }}">
                    @else
                    <input type="hidden" name="txt_sign_leader" id="txt_sign_leader" value="0">
                    <div id="sign_leader" class="d-none"></div>

                    <button type="button" id="btn_sign_leader" class="btn btn-lg btn-block btn-primary"
                        data-toggle="modal" data-target="#sign_leader_modal">
                        <i class="fas fa-signature"></i>
                        ลายเซ็น
                    </button>
                    @endif
                    <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-lg-6 col-md-6">
                    <button id="btn-save" class="btn btn-lg btn-block btn-warning">
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
                                &nbsp;&nbsp;2. ตรวจสอบเบอร์ช้อนที่อยู่ในกล่องและป้ายโค้ดของบรรจุภัณฑ์ว่าถูกต้องและตรงกัน
                                <br>
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
{{ Form::close() }}

<!-- Modal ลายเซ็น sign_leader-->
<div class="modal fade" id="sign_leader_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true" aria-labelledby="vcenter">
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
                <button type="button"
                    onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_130_main')  "
                    class="btn btn-lg btn-block btn-success">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

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
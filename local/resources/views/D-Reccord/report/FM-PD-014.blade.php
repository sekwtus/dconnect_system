@extends('layouts.master')

@section('title', 'FM-PD-014')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-014/update/'.$production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a target="_blank" href="{{url('/FM-PD-014/print/'.$production_order)}}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-print fa-lg"></i> พิมพ์
                        </button>
                    </a>
                </div>
            </div>

            <div id="print-area" class="row">
                <div class="col-md-12">
                    <table class="tbl-paperless">
                        <thead class="text-center">
                            <tr>
                                <th colspan="7">
                                    FM-PD-014 Rev.02 การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code)
                                </th>

                                <th>
                                    LINE : {{ $head[0]->line_number }}
                                </th>

                                <th>
                                    Batch Code
                                </th>
                            </tr>

                            <tr>
                                <th>
                                    Date:
                                    {{ substr($head[0]->scheduled_start,6,2).'/'.substr($head[0]->scheduled_start,4,2).'/'.(substr($head[0]->scheduled_start,0,4)+543) }}
                                </th>

                                <th colspan="5">
                                    PRODUCT NAME:
                                    {{$head[0]->material_description}}
                                </th>

                                <th colspan="3">
                                    BATCH: {{ $head[0]->batch }}
                                </th>
                            </tr>

                            <tr>
                                <th class="align-middle" rowspan="2">
                                    รายละเอียดของ Unit Carton / Special Box
                                </th>
                                <th class="align-middle" rowspan="2">
                                    ทดสอบความถี่ของ (Frequency)
                                </th>
                                <th class="align-middle" rowspan="2">
                                    เวลาทดสอบ<br>(Time)
                                </th>
                                <th class="align-middle" rowspan="2">
                                    ชนิดของกล่อง<br>ทดสอบแบช
                                </th>
                                <th class="align-middle" rowspan="2">
                                    ครั้งที่
                                </th>
                                <th class="align-middle" colspan="2">
                                    ผลการทดสอบ
                                </th>
                                <th class="align-middle" rowspan="2">
                                    หมายเหตุ
                                </th>
                                <th class="align-middle" rowspan="2">
                                    บันทึกโดย
                                </th>
                            </tr>

                            <tr>
                                <th class="align-middle" style="font-size:14px;">
                                    Reject
                                </th>
                                <th class="align-middle" style="font-size:14px;">
                                    No Rej.
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($FM_PD_014 as $index=>$item)
                            <tr>
                                <td rowspan="3">
                                    <input type="hidden" name="txtID[{{$index}}]" value="{{ $item->id }}">
                                    <input type="file" name="unit_carton[{{$index}}]" class="dropify" data-height="200"
                                        data-default-file="{{ !empty($item->unit_carton) ? asset('assets/FM-PD-014/'.$item->unit_carton) : null }}">
                                </td>

                                <td rowspan="3">
                                    <label class="container">ก่อนเริ่มงานแต่ละกะ
                                        <input type="checkbox" name="frequency[{{$index}}][]"
                                            value="ก่อนเริ่มงานแต่ละกะ"
                                            {{ (!empty($frequency[0][$index])) ? $frequency[0][$index] : null }}>
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">เปลี่ยนผลิตภัณฑ์
                                        <input type="checkbox" name="frequency[{{$index}}][]" value="เปลี่ยนผลิตภัณฑ์"
                                            {{ (!empty($frequency[1][$index])) ? $frequency[1][$index] : null }}>
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">เปลี่ยนขนาดของผลิตภัณฑ์
                                        <input type="checkbox" name="frequency[{{$index}}][]"
                                            value="เปลี่ยนขนาดของผลิตภัณฑ์"
                                            {{ (!empty($frequency[2][$index])) ? $frequency[2][$index] : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td rowspan="3" class="text-center">
                                    {{ $item->time }}
                                </td>

                                <td rowspan="3" class="text-center">
                                    ไม่มีแบช
                                </td>

                                <td class="text-center">1</td>

                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)" name="Result_1[{{$index}}]"
                                            value="Reject"
                                            {{ (!empty($item->Result_1) && $item->Result_1 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)" name="Result_1[{{$index}}]"
                                            value="No_Reject"
                                            {{ (!empty($item->Result_1) && $item->Result_1 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td rowspan="3" class="text-center">
                                    <textarea class="form-control" rows="8" name="note[{{$index}}]"
                                        placeholder="หมายเหตุ">{{ (!empty($item->note)) ?$item->note :null }}</textarea>
                                </td>

                                <td rowspan="3" class="text-center">
                                    @if(!empty($item->sign_operator))
                                        <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}"
                                            style="width:145px; height:px;">
                                            <br> ( {{ isset($item->operator_name)? $item->operator_name : null }} ) <br>
                                    @endif

                                    <div>
                                        <button type="button" onclick="delete_record({{ $item->id }}, 'FM_PD_014_main')" class="btn btn-danger" title="ลบข้อมูล">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">2</td>
                                <td style="" class="text-center">
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)" name="Result_2[{{$index}}]"
                                            value="Reject"
                                            {{ (!empty($item->Result_2) && $item->Result_2 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="" class="text-center">
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)" name="Result_2[{{$index}}]"
                                            value="No_Reject"
                                            {{ (!empty($item->Result_2) && $item->Result_2 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">3</td>
                                <td style="" class=" text-center">
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)" name="Result_3[{{$index}}]"
                                            value="Reject"
                                            {{ (!empty($item->Result_3) && $item->Result_3 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="" class="text-center">
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)" name="Result_3[{{$index}}]"
                                            value="No_Reject"
                                            {{ (!empty($item->Result_3) && $item->Result_3 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ทวนสอบโดย -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="font-weight-bold">ทวนสอบโดย</h3>

                    <input type="hidden" name="txt_sign_leader" id="txt_sign_leader" value="0">
                    <span id="sign_leader" class="{{ !empty($FM_PD_014[0]->sign_leader) ?'' :'d-none' }}">
                        <img src="{{ !empty($FM_PD_014[0]->sign_leader) ?asset('assets/images/sign/'.$FM_PD_014[0]->sign_leader) :'' }}"
                            style="width:145px; height:50px;">
                            
                        <br> <b>( {{ isset($FM_PD_014[0]->leader_name) ? $FM_PD_014[0]->leader_name : null }} )</b>
                        {{-- {{ 'ชื่อ leader.' }} --}}
                    </span>

                    @if(empty($FM_PD_014[0]->sign_leader))
                    <button type="button" id="btn_sign_leader" class="btn btn-lg btn-block btn-primary"
                        data-toggle="modal" data-target="#sign_leader_modal">
                        <i class="fas fa-signature"></i>
                        ลายเซ็น
                    </button>
                    @endif
                </div>
            </div>

            <div class="row mt-4 text-center">
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
                <table class="table table-bordered table-striped tbl-paperless">
                    <thead>
                        <tr>
                            <th style="background-color:#8e9090;color: white;" width="75%">
                                วิธีการทดสอบการทำงานของเครืองอ่านบาร์โค้ด
                            </th>
                            <th style="background-color:#ffffff;border-bottom: 3px solid #ffffff;" width="25%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color:#ffffff;vertical-align:middle;" colspan="2">
                                &nbsp;&nbsp;1. วางกล่องทดสอบที่ไม่มีแบชบนสายพาน<br>
                                &nbsp;&nbsp;2. กล่องทดสอบต้องผ่านเข้าเครื่องแบชโค๊ด 3 ครั้ง</td>
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
                                &nbsp;&nbsp;สิ่งที่ต้องทำทันที
                                หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คท์กล่องที่ไม่มีแบชได้ครบทั้ง 3 ครั้ง
                                แสดงว่าเครื่องทำงานไม่ปกติ<br>
                                &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน <br>
                                &nbsp;&nbsp;(Shift Supervisor/Leader) <br>
                                &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย
                                และกักกัน
                                (block)
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
{{ Form::close() }}
<!-- Modal ลายเซ็น leader บันทึก -->
<div class="modal fade" id="sign_leader_modal" role="dialog">
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
                    onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_014_main')"
                    class="btn btn-lg btn-block btn-success">
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
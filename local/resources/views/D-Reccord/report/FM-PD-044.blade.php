@extends('layouts.master')

@section('title', 'FM-PD-044')

@section('style')

@endsection

@section('main') 

{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-044/update/'. $production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">

    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a target="_blank" href="{{url('/FM-PD-044/print/'.$production_order)}}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-print fa-lg"></i> พิมพ์
                        </button>
                    </a>
                </div>
            </div>

            <div id="print-area" class="row">
                <div class="col-md-12">
                    <table class="table table-bordered tbl-paperless">
                        <thead class="text-center">

                            @foreach ($head as $item)
                            <tr>
                                <th colspan="7" class="text-center align-middle">FM-PD-044 
                                    Rev.03 
                                    การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ
                                </th>
                                <th colspan="2" class="text-center align-middle">
                                    LINE : {{$item->line_number}}
                                </th>
                            </tr>

                            <tr>
                                <th colspan="1" class="text-center align-middle">
                                    วันที่ :
                                    {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                                </th>
                                <th colspan="3" class="text-center align-middle">
                                    PRODUCT ORDER : {{ $item->production_order }}
                                </th>
                                <th colspan="3" class="text-center align-middle">
                                    ผลิตภัณฑ์ : {{$item->material_description}}
                                </th>
                                <th colspan="2" class="text-center align-middle">
                                    BATCH: {{ $item->batch }}
                                </th>
                            </tr>
                            @endforeach


                            <tr>
                                <td rowspan="2" width="%"  class="align-middle">
                                    เลขที่บาร์โค้ด<br>(Barcode no.)
                                </td>
                                <td rowspan="2" width="%" class="align-middle">
                                    ทดสอบความถี่ของ<br>(Frequency)
                                </td>
                                <td rowspan="2" width="%" class="align-middle">
                                    เวลาทดสอบ<br>(Time)
                                </td>
                                <td rowspan="2" width="%" class="align-middle">
                                    ชนิดของแผ่นทดสอบ<br>(Test Case)
                                </td>
                                <td rowspan="2" width="%" class="align-middle">
                                    ครั้งที่
                                </td>
                                <td colspan="2" width="%" class="align-middle">
                                    ผลการทดสอบ
                                </td>
                                <td rowspan="2" width="%" class="align-middle">
                                    หมายเหตุ
                                </td>
                                <td rowspan="2" class="align-middle">
                                    บันทึกโดย
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size:14px;" class="text-center align-middle ">Reject
                                </td>
                                <td style="font-size:14px;" class="text-center align-middle">No Rej.
                                </td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($FM_PD_044 as $i=>$item)
                            <tr>
                                <td rowspan="6" width="20%">
                                    <input type="hidden" name="txtID[{{$i}}]" value="{{ $item->id }}">

                                    <input type="file" id="input-file-now" class="dropify" name="Barcode_No[{{$i}}]"
                                        date-height="200"
                                        data-default-file="{{ !empty($item->Barcode_No) ? asset('assets/FM-PD-044/'.$item->Barcode_No) : null }}" />
                                </td>

                                <td rowspan="6" width="%">

                                    @php
                                        $arr_frequency = explode(',',$item->frequency);
                                    @endphp

                                    <label class="container">
                                        ก่อนเริ่มงานแต่ละกะ
                                        <input class="custom-control-input" type="checkbox" name="frequency[{{$i}}][]"
                                            value="ก่อนเริ่มงานแต่ละกะ"
                                            {{ in_array('ก่อนเริ่มงานแต่ละกะ',$arr_frequency) ?'checked' :null }}>
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์
                                        <input class="custom-control-input" type="checkbox" name="frequency[{{$i}}][]"
                                            value="เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์"
                                            {{ in_array('เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์',$arr_frequency) ?'checked' :null }}>
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="container">เปลี่ยนขนาดของผลิตภัณฑ์
                                        <input class="custom-control-input" type="checkbox" name="frequency[{{$i}}][]"
                                            value="เปลี่ยนขนาดของผลิตภัณฑ์"
                                            {{ in_array('เปลี่ยนขนาดของผลิตภัณฑ์',$arr_frequency) ?'checked' :null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td rowspan="6" class="text-center">
                                    {{ date_format(date_create($item->time), 'H:i') }}
                                    {{-- {{ date_format(now(),"Y-m-d H:i") }} --}}
                                </td>
                                <td rowspan="3" class="text-center">
                                    Barcode ผิด
                                </td>

                                <td class="text-center">1</td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="Wrong_Barcode_Result_1[{{$i}}]" value="Reject"
                                            {{ (!empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="Wrong_Barcode_Result_1[{{$i}}]" value="No_Reject"
                                            {{ (!empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td rowspan="3">
                                    <textarea class="form-control" rows="8"
                                        name="Wrong_Barcode_Note[{{$i}}]">{{ !empty($item->Wrong_Barcode_Note) ? $item->Wrong_Barcode_Note : null }}</textarea>
                                </td>


                                <td rowspan="6" class="text-center">
                                    @if(!empty($item->sign_operator))
                                    <img src="{{ asset('/assets/images/sign/'.$item->sign_operator) }}" width="145">
                                    
                                    <br> ( {{ isset($item->operator_name)? $item->operator_name : null }} ) <br>
                                    @endif
                                        <br>
                                        <br>
                                        <button type="button" onclick="delete_record({{ $item->id }}, 'FM_PD_044_main')" class="btn btn-danger" title="ลบข้อมูล">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </b>                                
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">2</td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="Wrong_Barcode_Result_2[{{$i}}]" value="Reject"
                                            {{ (!empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="Wrong_Barcode_Result_2[{{$i}}]" value="No_Reject"
                                            {{ (!empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">3</td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="Wrong_Barcode_Result_3[{{$i}}]" value="Reject"
                                            {{ (!empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="Wrong_Barcode_Result_3[{{$i}}]" value="No_Reject"
                                            {{ (!empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center">
                                    Barcode ไม่มี
                                </td>
                                <td class="text-center align-middle ">1</td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="No_Barcode_Result_1[{{$i}}]" value="Reject"
                                            {{ (!empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="No_Barcode_Result_1[{{$i}}]" value="No_Reject"
                                            {{ (!empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td rowspan="3">
                                    <textarea class="form-control" rows="8"
                                        name="No_Barcode_Note[{{$i}}]">{{!empty($item->No_Barcode_Note) ? $item->No_Barcode_Note : null}}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center align-middle ">2</td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="No_Barcode_Result_2[{{$i}}]" value="Reject"
                                            {{ (!empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="No_Barcode_Result_2[{{$i}}]" value="No_Reject"
                                            {{ (!empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'No_Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">3</td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="No_Barcode_Result_3[{{$i}}]" value="Reject"
                                            {{ (!empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'Reject') ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="container">
                                        <input type="checkbox" onchange="CheckOnlyOne(this)"
                                            name="No_Barcode_Result_3[{{$i}}]" value="No_Reject"
                                            {{ (!empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'No_Reject') ? 'checked' : null }}>
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
                    <span id="sign_leader" class="{{ !empty($FM_PD_044[0]->sign_leader) ?'' :'d-none' }}">
                        <img src="{{ !empty($FM_PD_044[0]->sign_leader) ?asset('assets/images/sign/'.$FM_PD_044[0]->sign_leader) :'' }}"
                            style="width:145px; height:50px;">
                        <br> <b>( {{ isset($FM_PD_044[0]->leader_name) ? $FM_PD_044[0]->leader_name : null }} )</b>
                        {{-- {{ 'ชื่อ leader.' }} --}}
                    </span>

                    @if(empty($FM_PD_044[0]->sign_leader))
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
                            &nbsp;&nbsp;2. แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง
                        </td>
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
                            &nbsp;&nbsp;- หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คของผลิตภัณฑ์ที่ไม่มีบาร์โค้ดได้ครบทั้ง
                            3
                            ครั้ง<br>&nbsp;&nbsp;แสดงว่าเครื่องทำงานไม่ปกติ <br>
                            &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader)
                            <br>
                            &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน
                            (block)
                            <br>
                            &nbsp;&nbsp;- หากพบว่าเครื่องรีเจคซองผลิตภัณฑ์ที่บาร์โค้ดผิดหรือยาร์โค้ดไม่มี<br>
                            &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader)
                            <br>
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
                    onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_044_main')"
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
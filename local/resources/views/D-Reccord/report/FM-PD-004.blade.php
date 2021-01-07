@extends('layouts.master')

@section('title', 'FM-PD-004')

@section('style')

@endsection

@section('main')
<br>
{{ Form::open(['method' => 'POST' , 'url' => '/FM-PD-004/update/'.$production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a target="_blank" href="{{url('/FM-PD-004/print/'.$production_order)}}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-print fa-lg"></i> พิมพ์
                        </button>
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table table-bordered tbl-paperless">
                        <thead>

                            @foreach ($head as $item)
                            <tr>
                                <th colspan="5" class="text-center align-middle">FM-PD-004
                                    Rev.13
                                    การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader)
                                </th>
                                <th colspan="2" class="text-center align-middle">
                                    LINE : {{$item->line_number}}
                                </th>
                                <th colspan="2" class="text-center align-middle">
                                    CCP 3
                                </th>
                            </tr>


                            <tr>
                                <th colspan="2" class="text-center align-middle">
                                    วันที่ :
                                    {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                                </th>
                                <th colspan="2" class="text-center align-middle">
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
                                <td rowspan="2" width="25%" class="text-center align-middle">
                                    เลขที่บาร์โค้ด (Barcode no.)
                                </td>
                                <td rowspan="2" width="20%" style=" vertical-align:middle" class="text-center">
                                    ทดสอบความถี่ของ(Frequency)
                                </td>
                                <td rowspan="2" width="5%" class="text-center" style="vertical-align: middle;">
                                    เวลาทดสอบ<br>(Time)
                                </td>
                                <td rowspan="2" class="text-center" width="10%" style="vertical-align: middle;">
                                    ชนิดของกล่อง<br>ทดสอบบาร์โค้ด
                                </td>
                                <td rowspan="2" class="text-center" width="5%" style="vertical-align: middle;">
                                    ครั้งที่
                                </td>
                                <td colspan="2" class="text-center" width="10%" style="vertical-align: middle;">
                                    ผลการตรวจสอบ
                                </td>

                                <td rowspan="2" class="text-center" width="15%" style="vertical-align: middle;">
                                    หมายเหตุ
                                </td>
                                <td rowspan="2" class="text-center" width="10%" style="vertical-align: middle;">
                                    บันทึกโดย
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:14px;" class="text-center">
                                    Reject
                                </td>
                                <td style="font-size:14px;" class="text-center">
                                    No Rej.
                                </td>
                            </tr>
                        </thead>

                        @foreach ($FM_PD_004_main as $index=>$item)
                        <input type="hidden" name="ID[{{ $index }}]" value="{{ $item->id }}" />

                        <tbody>
                            <tr>
                                <td rowspan="6">
                                    <input type="file" class="dropify" name="bracode_no[{{$index}}]" data-height="200"
                                        data-default-file="{{ !empty($item->bracode_no) ? asset('/assets/FM-PD-004/'.$item->bracode_no) : null }}">
                                </td>
                                <td rowspan="6">
                                    <div class="input-group">
                                        <label class="container" style=" padding-right: 0px; ">
                                            ก่อนเริ่มงานแต่ละกะ
                                            <input type="checkbox" name="Frequency[{{$index}}][]"
                                                value="ก่อนเริ่มงานแต่ละกะ"
                                                {{ !empty($frequency[0][$index]) ? $frequency[0][$index] : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="input-group">
                                        <label class="container" style=" padding-right: 0px; ">
                                            เปลี่ยนผลิตภัณฑ์
                                            <input type="checkbox" name="Frequency[{{$index}}][]"
                                                value="เปลี่ยนผลิตภัณฑ์"
                                                {{ !empty($frequency[1][$index]) ? $frequency[1][$index] : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="input-group">
                                        <label class="container" style=" padding-right: 0px; ">
                                            เปลี่ยนขนาดของผลิตภัณฑ์
                                            <input type="checkbox" name="Frequency[{{$index}}][]"
                                                value="เปลี่ยนขนาดของผลิตภัณฑ์"
                                                {{ !empty($frequency[2][$index]) ? $frequency[2][$index] : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="input-group">
                                        <label class="container" style=" padding-right: 0px; ">
                                            หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที
                                            <input type="checkbox" name="Frequency[{{$index}}][]"
                                                value="หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที"
                                                {{ !empty($frequency[3][$index]) ? $frequency[3][$index] : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="input-group">
                                        <label class="container" style=" padding-right: 0px; ">
                                            มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด
                                            <input type="checkbox" name="Frequency[{{$index}}][]"
                                                value="มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด"
                                                {{ !empty($frequency[4][$index]) ? $frequency[4][$index] : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="input-group">
                                        <label class="container" style=" padding-right: 0px; ">
                                            ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง
                                            <input type="checkbox" name="Frequency[{{$index}}][]"
                                                value="ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง"
                                                {{ !empty($frequency[5][$index]) ? $frequency[5][$index] : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="input-group">
                                        <label class="container" style=" padding-right: 0px; ">
                                            ทุกวันหลังสิ้นสุดการผลิต
                                            <input type="checkbox" name="Frequency[{{$index}}][]"
                                                value="ทุกวันหลังสิ้นสุดการผลิต"
                                                {{ !empty($frequency[6][$index]) ? $frequency[6][$index] : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </td>
                                <td rowspan="6" class="text-center align-middle">
                                    {{ $item->time }} น.
                                </td>

                                <td rowspan="3" class="text-center">Barcode ผิด
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_1[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_1[{{$index}}]"
                                            value="No_Reject" onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td rowspan="3" class="text-center">
                                    <textarea class="form-control" rows="8" name="Wrong_Barcode_Note[{{$index}}]"
                                        placeholder="หมายเหตุ">{{ !empty($item->Wrong_Barcode_Note) ? $item->Wrong_Barcode_Note : null }}</textarea>
                                </td>

                                {{-- s --}}
                                <td rowspan="6" class="text-center">
                                    @if(!empty($item->sign_operator))
                                        <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" alt=""
                                        width="145">
                                        <br> ( {{ isset($item->operator_name)? $item->operator_name : null }} ) <br>
                                    @endif
                                    
                                    <div>
                                    
                                        <br>
                                        <button type="button" onclick="delete_record({{ $item->id }}, 'FM_PD_004_main')" class="btn btn-danger" title="ลบข้อมูล">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_2[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_2[{{$index}}]"
                                            value="No_Reject" onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_3[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="Wrong_Barcode_Result_3[{{$index}}]"
                                            value="No_Reject" onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3" class="text-center">Barcode ไม่มี
                                </td>

                                <td class="text-center">1</td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_1[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_1[{{$index}}]" value="No_Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td rowspan="3" class="text-center">
                                    <textarea class="form-control" rows="8" name="No_Barcode_Note[{{$index}}]"
                                        placeholder="หมายเหตุ">{{ !empty($item->No_Barcode_Note)  ? $item->No_Barcode_Note : null }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>

                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_2[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_2[{{$index}}]" value="No_Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_3[{{$index}}]" value="Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="container">
                                        <input type="checkbox" name="No_Barcode_Result_3[{{$index}}]" value="No_Reject"
                                            onchange="CheckOnlyOne(this)"
                                            {{ !empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach

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
                        <img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" alt="" width="145">
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
                        onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_004_main')  "
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
@extends('layouts.master')

@section('title', 'FM-PD-131')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-131/update/'.$production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">

    {{-- <div class="card border-info">
        <div class="card-header bg-info text-white">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-12">
                    <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-131 Rev.05
                        การทดสอบกล้องตรวจสอบช้อน (Scoop Camera) สำหรับ</h3>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <label>
                        Date: &nbsp;&nbsp; 
                        {{ substr($head[0]->scheduled_start,6,2).'/'.substr($head[0]->scheduled_start,4,2).'/'.(substr($head[0]->scheduled_start,0,4)+543) }}
                    </label>
                </div>
                <div class="col-lg-8">
                    <label>PRODUCT NAME: {{$head[0]->material_description}}</label>
                    <input type="hidden" name="product_name">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $head[0]->production_order }}</label>
                </div>
                <div class="col-lg-8">
                    <label>BATCH: &nbsp;&nbsp; {{ $head[0]->batch }}</label>
                    <input type="hidden" name="batch">
                </div>
            </div>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a target="_blank" href="{{url('/FM-PD-131/print/'.$production_order)}}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-print fa-lg"></i> พิมพ์
                    </button>
                    </a>
                </div>
            </div>

            <div id="print-area" class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead class="text-center">
                            
                            @foreach ($head as $item)
                            <tr>
                                <th colspan="7">
                                    FM-PD-131 Rev.05 การทดสอบกล้องตรวจสอบช้อน (Scoop camera) สำหรับ Auto Packing line
                                </th>

                                <th>
                                    LINE : {{ $item->line_number }}
                                </th>
                            </tr>

                            <tr>
                                <th colspan="1" class="text-center align-middle">
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
                                <td rowspan="2">
                                    ทดสอบความถี่ของ<br>(Frequency)
                                </td>
                                <td rowspan="2" style="width20%;">
                                    เวลาทดสอบ<br>(Time)
                                </td>
                                <td rowspan="2" class="align-middle" style="width: %;">
                                    ทดสอบ
                                </td>
                                <td rowspan="2" class="align-middle" style="width: %;">
                                    ครั้งที่
                                </td>
                                <td colspan="2" class="align-middle" style="width: %;">
                                    ผลการทดสอบ
                                </td>
                                <td rowspan="2" style="width: %;">
                                    หมายเหตุ
                                </td>

                                <td rowspan="2" class="align-middle">
                                    บันทึกโดย
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size:14px;">
                                    Reject
                                </td>
                                <td style="font-size:14px;">
                                    No Rej.
                                </td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($FM_PD_131 as $index=>$item)
                                <tr>
                                    <td rowspan="3" class="">
                                        <input type="hidden" name="txtID[{{$index}}]" value="{{ $item->id }}">

                                        @php
                                            $arr_frequency = explode(',',$item->Frequency);
                                        @endphp
                                        
                                        <label class="container">
                                            ก่อนเริ่มงานแต่ละกะ
                                            <input type="checkbox" name="frequency[{{$index}}][]"
                                                value="ก่อนเริ่มงานแต่ละกะ"
                                                {{ in_array('ก่อนเริ่มงานแต่ละกะ',$arr_frequency) ?'checked' :null }}>
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="container">
                                            เปลี่ยนผลิตภัณฑ์
                                            <input type="checkbox" name="frequency[{{$index}}][]"
                                                value="เปลี่ยนผลิตภัณฑ์"
                                                {{ in_array('เปลี่ยนผลิตภัณฑ์',$arr_frequency) ?'checked' :null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>

                                    <td rowspan="3" class="text-center">
                                        {{ $item->Time }}
                                    </td>
                                    
                                    <td rowspan="3" class="text-center">
                                        ไม่มีช้อน
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_1[{{$index}}]" value="Reject"
                                                onchange="CheckOnlyOne(this)"
                                                {{ (!empty($item->Result_1) && $item->Result_1 == 'Reject') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_1[{{$index}}]" value="No_Reject"
                                                onchange="CheckOnlyOne(this)"
                                                {{ (!empty($item->Result_1) && $item->Result_1 == 'No_Reject') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td rowspan="3" class="text-center">
                                        <textarea class="form-control" rows="8" name="note[{{$index}}]"
                                            placeholder="หมายเหตุ">{{ !empty($item->Note) ? $item->Note : null }}</textarea>

                                    </td>

                                    <td rowspan="3" class="text-center">
                                        @if(!empty($item->sign_operator))
                                            <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" style="width:145px; height:px;">
                                            <br> <b>( {{ isset($item->operator_name) ? $item->operator_name : null }} )</b>
                                        @endif

                                        <div>

                                            <button type="button" onclick="delete_record({{ $item->id }}, 'FM_PD_131_main')" class="btn btn-danger" title="ลบข้อมูล">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_2[{{$index}}]" value="Reject"
                                                onchange="CheckOnlyOne(this)"
                                                {{ (!empty($item->Result_2) && $item->Result_2 == 'Reject') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_2[{{$index}}]" value="No_Reject"
                                                onchange="CheckOnlyOne(this)"
                                                {{ (!empty($item->Result_2) && $item->Result_2 == 'No_Reject') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_3[{{$index}}]" value="Reject"
                                                onchange="CheckOnlyOne(this)"
                                                {{ (!empty($item->Result_3) && $item->Result_3 == 'Reject') ? 'checked' : null }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            <input type="checkbox" name="Result_3[{{$index}}]" value="No_Reject"
                                                onchange="CheckOnlyOne(this)"
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
                    <span id="sign_leader" class="{{ !empty($FM_PD_131[0]->sign_leader) ?'' :'d-none' }}">
                        <img src="{{ !empty($FM_PD_131[0]->sign_leader) ?asset('assets/images/sign/'.$FM_PD_131[0]->sign_leader) :'' }}"
                            style="width:145px; height:50px;">
                            <br> <b>( {{ isset($FM_PD_131[0]->leader_name) ? $FM_PD_131[0]->leader_name : null }} )</b>
                        {{-- {{ 'ชื่อ leader.' }} --}}
                    </span>

                    @if(empty($FM_PD_131[0]->sign_leader))
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
                                &nbsp;&nbsp;- หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คของผลิตภัณฑ์ที่ไม่มีช้อนได้ครบทั้ง
                                3
                                ครั้ง<br>&nbsp;&nbsp;แสดงว่ากล้องเสีย <br>
                                &nbsp;&nbsp;1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift
                                Supervisor/Leader) <br>
                                &nbsp;&nbsp;2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย
                                และกักกัน
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
                <button type="button" onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_131_main')"
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
@extends('layouts.master')

@section('title', 'FM-PD-034')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-034/update/'.$production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">
    
    {{-- <div class="card border-info">
        <div class="card-header bg-info text-white">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-12">
                    <h3 class="box-title m-b-0" style="font-size: 15pt;">
                        FM-PD-034 Rev No.12
                        แบบฟอร์มการบันทึกการตรวจสอบ Unit Carton/Speacial Box
                    </h3>
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
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $head[0]->production_order }}</label>
                </div>
                <div class="col-lg-8">
                    <label>BATCH: &nbsp;&nbsp; {{ $head[0]->batch }}</label>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a target="_blank" href="{{url('/FM-PD-034/print/'.$production_order)}}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-print fa-lg"></i> พิมพ์
                        </button>
                    </a>
                </div>
            </div>

            <div id="print-area" class="row">
                <div class="col-md-12">
                    <table class="tbl-paperless table-">
                        <thead class="text-center">
                            
                            @foreach ($head as $item)

                            <tr>
                                <th  colspan="3" >
                                    FM-PD-034 Rev No.12 แบบฟอร์มการบันทึกการตรวจสอบ Unit Carton/Speacial Box
                                </th>

                                <th  >
                                    LINE : {{ $item->line_number }}
                                </th>
                            </tr>

                            <tr>
                                <th  class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    วันที่ :
                                    {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                                </th>
                                <th class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    PRODUCT ORDER : {{ $item->production_order }}
                                </th>
                                <th  class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    ผลิตภัณฑ์ : {{$item->material_description}}
                                </th>
                                <th   class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    BATCH: {{ $item->batch }}
                                </th>
                            </tr>
                            
                            @endforeach

                        </thead>

                        <tbody>
                            <tr style="font-size: pt;">
                                <td colspan="2">
                                    ผลิตภัณฑ์ {{ $head[0]->material_description }}
                                    เลขที่ผลิต {{ $head[0]->production_order }}
                                </td>

                                <td colspan="2" class="text-right" style="width:%;">
                                    <!-- <span style="border:#000 1px solid; padding:2px; float:right; position:absolute; right:0.35cm;"> -->
                                    FM-PD-034 Rev No.12
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            {{-- <input type="hidden" name="ID" value="{{ $FM_PD_034->ID }}"> --}}
                                            <!-- <span class="style-radio">&#9899;</span> -->
                                            <label class="col-form-label">- กล่องยูนิตบรรจุ (Unit Box)</label>

                                            <div class="mt-1" style="text-indent: em;">
                                                <!-- <label>
                                                <span class="style-check-box">&#11036;</span> 
                                                <span>Unit Carton</span>
                                                </label> -->
                                                <label class="container">
                                                    Unit Carton
                                                    <input type="radio" name="Unit_Box" value="Unit Carton"
                                                        {{ (!empty($FM_PD_034->Unit_Box) && $FM_PD_034->Unit_Box == 'Unit Carton') ?'checked' :null }}>
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="container">
                                                    Special Box
                                                    <input type="radio" name="Unit_Box" value="Spacial Box"
                                                        {{ (!empty($FM_PD_034->Unit_Box) && $FM_PD_034->Unit_Box == 'Spacial Box') ?'checked' :null }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label">- Lot No./Batch No.</label>
                                            &nbsp;
                                            <input name="Batch_No" class="form-control form-control-lg"
                                                value="{{ !empty($FM_PD_034->Batch_No) ?$FM_PD_034->Batch_No :null }}"
                                                placeholder="Lot No./Batch No.">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-form-label">- PM Code</label>
                                            &nbsp;
                                            <input type="text" name="PM_Code" class="form-control form-control-lg"
                                                value="{{ !empty($pm_code) ?$pm_code->sap_code : (!empty($FM_PD_034->PM_Code) ?$FM_PD_034->PM_Code :null) }}"
                                                placeholder="PM Code">

                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" class="align-top border-bottom-0">
                                    <div>
                                        วิธีปฏิบัติ :
                                    </div>

                                    <div style="text-indent: 3em;">
                                        <div>
                                            - ให้ดึงใบรายละเอียดข้างกล่อง Unit Carton / Shipper Carton มาติด
                                        </div>

                                        <div>
                                            - ถ้ารายละเอียดข้างกล่อง Unit Carton / Shipper Carton
                                            แต่ละกล่องเหมือนกันให้ดึงมาติดแค่ใบเดียว
                                        </div>

                                        <div>
                                            - สำหรับกล่องที่ใช้ Unit Carton / Shipper Carton ไม่หมด ไม่ต้องดึงใบมาติด
                                            ให้บันทึกรายละเอียดลงบรรทัดด้านล่างแทน
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" style="height:300px;">
                                    <input type="file" id="input-file-now" class="dropify" name="Pic_1"
                                        data-height="200"
                                        data-default-file="{{ !empty($FM_PD_034->Pic_1) ?asset('assets/FM-PD-034/'.$FM_PD_034->Pic_1) :null }}" />
                                </td>
                            </tr>

                            <!-- <tr>
                                <th class="border-top-0 border-right-0">
                                สำหรับบันทึกกล่องที่ยังใช้ช้อนไม่หมด ..........
                                </th>

                                
                                <th class="text-center border-top-0 border-left-0">
                                หมายเหตุ:ให้ลงหมายเลข Control No. ที่ไม่ซ้ำกันเท่านั้น
                                </th>
                            </tr> -->

                            <tr>
                                <td class="font-weight-bold" colspan="4">
                                    บันทึกโดยโดยฝ่ายผลิต
                                    <img src="{{ !empty($FM_PD_034->sign_operator) ?asset('assets/images/sign/'.$FM_PD_034->sign_operator) :'' }}"
                                        style="width:145px; height:50px;"> <b>( {{ isset($FM_PD_034->leader_name) ? $FM_PD_034->leader_name : null }} )</b>
                                    
                                    {{-- {{ 'ชื่อ พนง.' }} --}}

                                    @if (isset($FM_PD_034))
                                        วันที่ {{ th_date_time_slash($FM_PD_034->created_at) }} 
                                    
                                        <button type="button" onclick="delete_record({{ $FM_PD_034->id }}, 'FM_PD_034_main')" class="btn btn-danger" title="ลบข้อมูล">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ปุ่มแก้ไข -->
            <div class="row text-center mt-4">
                <div class="col-lg-6 col-md-6">
                    <button id="btn-edit" class="btn btn-lg btn-block btn-warning">
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
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>

<script>
    $('input[name="Batch_No"]').keyup(function (e) { 
        // console.log(44);
         $(this).val( $(this).val().toUpperCase() );
    });

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
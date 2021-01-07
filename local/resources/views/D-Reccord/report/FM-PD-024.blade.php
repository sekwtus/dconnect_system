@extends('layouts.master')

@section('title', 'FM-PD-024')

@section('style')

@endsection

@section('main')
{{ Form::open(['method' => 'POST' , 'url' => 'FM-PD-024/update/'.$production_order, 'files' => true]) }}
<div class="col-md-12 mt-2">

    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a target="_blank" href="{{url('/FM-PD-024/print/'.$production_order)}}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-print fa-lg"></i> พิมพ์
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped tbl-paperless">
                        <thead class="text-center">

                            
                            @foreach ($head as $item)

                            <tr>
                                <th colspan="7">
                                    FM-PD-024 Rev.04 Verification Oprps And Ccps For Release Product Record
                                </th>

                                <th colspan="2">
                                    LINE : {{ $item->line_number }}
                                </th>
                            </tr>

                            <tr>
                                <th colspan="2" class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    วันที่ :
                                    {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                                </th>
                                <th colspan="2" class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    PRODUCT ORDER : {{ $item->production_order }}
                                </th>
                                <th colspan="3" class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    ผลิตภัณฑ์ : {{$item->material_description}}
                                </th>
                                <th colspan="2" class="text-center"
                                    style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                    BATCH: {{ $item->batch }}
                                </th>
                            </tr>
                            
                            @endforeach

                            <tr>
                                <td colspan="2" class="align-middle">
                                    รายละเอียดของ Unit Carton / Specail box
                                </td>
                                <td colspan="2" class="align-middle">
                                    รายละเอียดของ Shipper Carton
                                </td>
                                <td colspan="4" class="align-middle">
                                    ช้อน
                                </td>
                                <td>
                                    บันทึกโดย
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($FM_PD_024_Default as $index=>$item)
                            <input type="hidden" name="ID[{{ $index }}]" value="{{ $item->id }}" />
                            <tr>
                                <td class="text-right">
                                    PM. Code
                                </td>
                                <td>
                                    <input name="pm_code_unit_carton[{{$index}}]" class="form-control form-control-lg"
                                        placeholder="PM Code (Unit Carton/Specail box)"
                                        value="{{ !empty($item->pm_code_unit_carton) ? $item->pm_code_unit_carton :null }}">
                                </td>
                                <td class="text-right" rowspan="2">
                                    PM Code
                                </td>
                                <td rowspan="2">
                                    <input type="" name="pm_code_shipper_carton[{{$index}}]"
                                        class="form-control form-control-lg" placeholder="PM Code (Shipper Carton)"
                                        value="{{ !empty($item->pm_code_shipper_carton) ? $item->pm_code_shipper_carton :null }}">

                                </td>
                                <td class="text-right" style="width: 10%;">PM. Code</td>
                                <td colspan="3">
                                    <input type="" name="pm_code_scoop[{{$index}}]" class="form-control form-control-lg"
                                        placeholder="PM Code (ช้อน)"
                                        value="{{ !empty($item->pm_code_scoop) ? $item->pm_code_scoop :null }}">
                                        
                                </td>
                                <td rowspan="2" class="text-center">
                                    @if(!empty($item->sign_operator))
                                        <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" style="width:145px; height:px;">
                                        <br> ( {{ isset($item->operator_name)? $item->operator_name : null }} )
                                    @endif

                                    <br>
                                    <button type="button" onclick="delete_record({{ $item->id }}, 'FM_PD_024_main')" class="btn btn-danger" title="ลบข้อมูล">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <div class="font-weight-normal-">วันผลิต</div>
                                    <div class="font-weight-normal-">วันหมดอายุ</div>
                                    <div class="font-weight-normal-">Meterial Number</div>
                                    <div class="font-weight-normal-">Batch</div>
                                    <div class="font-weight-normal-">Product Order/Line</div>
                                </td>

                                <td>
                                    <input type="file" class="dropify" name="Detail_Unit_Carton[{{$index}}]"
                                        data-height="200"
                                        data-default-file="{{ !empty($item->Detail_Unit_Carton) ? asset('assets/FM-PD-024/'.$item->Detail_Unit_Carton) : null }}" />
                                </td>

                                <td>ช้อนเบอร์</td>
                                <td colspan="3">
                                    <div class="row text-center">
                                        <div class="col-md-2">1</div>
                                        <div class="col-md-2">2</div>
                                        <div class="col-md-2">3</div>
                                        <div class="col-md-2">4</div>
                                        <div class="col-md-2">5</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;
                                                    <input type="checkbox" name="spoon_size[{{$index}}]" value="1"
                                                        {{ !empty($item->spoon_size) && $item->spoon_size == '1' ? 'checked' : null }} onchange="CheckOnlyOne(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;
                                                    <input type="checkbox" name="spoon_size[{{$index}}]" value="2"
                                                        {{ !empty($item->spoon_size) && $item->spoon_size == '2' ? 'checked' : null }} onchange="CheckOnlyOne(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;
                                                    <input type="checkbox" name="spoon_size[{{$index}}]" value="3"
                                                        {{ !empty($item->spoon_size) && $item->spoon_size == '3' ? 'checked' : null }} onchange="CheckOnlyOne(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;
                                                    <input type="checkbox" name="spoon_size[{{$index}}]" value="4"
                                                        {{ !empty($item->spoon_size) && $item->spoon_size == '4' ? 'checked' : null }} onchange="CheckOnlyOne(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <label class="container">
                                                    &nbsp;
                                                    <input type="checkbox" name="spoon_size[{{$index}}]" value="5"
                                                        {{ !empty($item->spoon_size) && $item->spoon_size == '5' ? 'checked' : null }} onchange="CheckOnlyOne(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <input type="hidden" name="Date" id="Date" value="{{ date_format(now(),"Y-m-d") }}">
                            <input type="hidden" name="Time" id="Time" value="{{ date("H:i:s") }}">
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ทวนสอบโดย -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="font-weight-bold">ทวนสอบโดย</h3>
                    @if(!empty($item->sign_leader))
                        <div>
                            <img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" alt="">
                            <br> <b>( {{ isset($item->leader_name) ? $item->leader_name : null }} )</b>
                        </div>
                    @else
                    <div id="sign_leader" class="d-none"></div>

                    <button type="button" id="btn_sign_leader" class="btn btn-lg btn-block btn-primary"
                        data-toggle="modal" data-target="#sign_leader_modal">
                        <i class="fas fa-signature"></i>
                        ลายเซ็น
                    </button>
                    @endif
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
                    onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_024_main')"
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


    $('input[name="pm_code_unit_carton"] , input[name="pm_code_shipper_carton"] , input[name="pm_code_scoop"]').keyup(function (e) { 
        // console.log(44);
         $(this).val( $(this).val().toUpperCase() );

    });

    // checkbox แบบเลิอกได้อันเดียว ติ๊กออกได้
    $('input[name="spoon_size"]').on('change', function() {
        $('input[name="spoon_size"]').not(this).prop('checked', false);
    });

</script>


@endsection
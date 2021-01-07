@extends('layouts.master')

@section('title', 'FM-PD-037')

@section('style')

@endsection

@section('main')
<form method="POST" action="{{ url('/FM-PD-037/update/'.$production_order. '/' ) }}" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a target="_blank" href="{{url('/FM-PD-037/print/'.$production_order)}}">
                            <button type="button" class="btn btn-primary btn-lg btn-block">
                                <i class="fa fa-print fa-lg"></i> พิมพ์
                            </button>
                        </a>
                    </div>
                </div>
                <table class="table table-bordered tbl-paperless">
                    <thead>
                        @foreach ($head as $item)
                        <tr>
                            <th colspan="5" class="text-center align-middle">
                                FM-PD-037 Rev No.03 บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง
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
                            <th colspan="2" class="text-center align-middle">
                                PRODUCT ORDER : {{ $item->production_order }}
                            </th>
                            <th colspan="2" class="text-center align-middle">
                                ผลิตภัณฑ์ : {{$item->material_description}}
                            </th>
                            <th colspan="2" class="text-center align-middle">
                                BATCH: {{ $item->batch }}
                            </th>
                        </tr>
                        @endforeach

                        <tr>
                            <td width="15%" class="text-center align-middle">
                                Tag ม้วนฟอยล์
                            </td>
                            <td width="10%" class="text-center align-middle">
                                เวลาที่เปลี่ยนม้วน
                            </td>
                            <td width="10%" class="text-center align-middle">
                                ความถูกต้องของ Foil
                            </td>
                            <td class="text-center align-middle" width="18%">
                                รอยต่อที่ 1
                            </td>
                            <td class="text-center align-middle" width="18%">
                                รอยต่อที่ 2
                            </td>
                            <td class="text-center align-middle" width="18%">
                                รอยต่อที่ 3
                            </td>
                            <td class="text-center" width="10%" style="vertical-align: middle;">
                                บันทึกโดย
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($FM_PD_037_mains as $index => $FM_PD_037_main)
                        <input type="hidden" name="txtID[{{$index}}]" value="{{ $FM_PD_037_main->id }}">
                        <tr>
                            <td>
                                <input type="file" id="tag_foil" class="dropify" name="tag_foil[{{ $index }}]"
                                    data-default-file="{{ !empty($FM_PD_037_main->tag_foil) ? asset('/assets/FM-PD-037/'.$FM_PD_037_main->tag_foil) : null }}" />
                            </td>
                            <td class="text-center">
                                {{ !empty($FM_PD_037_main->time_roll) ? $FM_PD_037_main->time_roll : null }}
                                <input class="form-control" type="hidden" name="time_roll[{{$index}}]" value="{{ $FM_PD_037_main->time_roll }}" id="time_roll" readonly>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="container">common foil
                                                <input type="checkbox" name="type_foil[{{ $index }}]" value="1" onchange="CheckOnlyOne(this)"
                                                    {{ !empty($FM_PD_037_main->type_foil) && $FM_PD_037_main->type_foil == 1 ? 'checked' : null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="container">Art work
                                                <input type="checkbox" name="type_foil[{{ $index }}]" value="2" onchange="CheckOnlyOne(this)"
                                                    {{ !empty($FM_PD_037_main->type_foil) && $FM_PD_037_main->type_foil == 2 ? 'checked' : null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">PM</span>
                                    </div>
                                    <input type="text" class="form-control" name="number_foil[{{ $index }}]" {{ empty($FM_PD_037_main->number_foil) ? ' value=  ' : 'value='.$FM_PD_037_main->number_foil.' readonly' }} >
                                </div>

                                <hr>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="container">ถูกต้อง
                                                <input type="checkbox" name="correct_foil[{{ $index }}]" value="1" onchange="CheckOnlyOne(this)"
                                                    {{ !empty($FM_PD_037_main->correct_foil) && $FM_PD_037_main->correct_foil == 1 ? 'checked' : null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="container">ไม่ถูกต้อง
                                                <input type="checkbox" name="correct_foil[{{ $index }}]" value="2" onchange="CheckOnlyOne(this)"
                                                    {{ !empty($FM_PD_037_main->correct_foil) && $FM_PD_037_main->correct_foil == 2 ? 'checked' : null }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <label for="time_roll1" class="col-md-12 col-form-label"> เวลา </label>
                                    <div class="col-md-12">
                                        <input class="form-control" min="00:00" max="24:00" type="time" id="time_roll1"
                                            name="time_roll1[{{ $index }}]"
                                            value="{{ !empty($FM_PD_037_main->time_roll1) ? $FM_PD_037_main->time_roll1 :  null }}">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">ถูกต้อง
                                                        @if ( $FM_PD_037_main->correct1 == 'correct' )
                                                        <input type="checkbox" id="correct1" name="correct1[{{ $index }}]"
                                                            value="correct"  onchange="CheckOnlyOne(this)" checked>
                                                        @else
                                                        <input type="checkbox" id="correct1" name="correct1[{{ $index }}]"
                                                            value="correct"  onchange="CheckOnlyOne(this)">
                                                        @endif
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">ไม่ถูกต้อง
                                                        @if ( $FM_PD_037_main->correct1 == 'incorrect' )
                                                        <input type="checkbox" id="correct1" name="correct1[{{ $index }}]"
                                                            value="incorrect"  onchange="CheckOnlyOne(this)" checked>
                                                        @else
                                                        <input type="checkbox" id="correct1" name="correct1[{{ $index }}]"
                                                            value="incorrect"  onchange="CheckOnlyOne(this)">
                                                        @endif
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="page-group[0][note]"
                                                class="col-sm-12 col-form-label">หมายเหตุ</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="note1[{{ $index }}]" id="note1"
                                                    rows="3">{{ !empty($FM_PD_037_main->note1) ? $FM_PD_037_main->note1 :  null }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <label for="time_roll2" class="col-md-12 col-form-label"> เวลา </label>
                                    <div class="col-md-12">
                                        <input class="form-control" min="00:00" max="24:00" type="time" id="time_roll2"
                                            name="time_roll2[{{ $index }}]"
                                            value="{{ !empty($FM_PD_037_main->time_roll2) ? $FM_PD_037_main->time_roll2 :  null }}">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">ถูกต้อง
                                                        @if ( $FM_PD_037_main->correct2 == 'correct' )
                                                        <input type="checkbox" id="correct2" name="correct2[{{ $index }}]"
                                                            value="correct"  onchange="CheckOnlyOne(this)" checked>
                                                        @else
                                                        <input type="checkbox" id="correct2" name="correct2[{{ $index }}]"
                                                            value="correct"  onchange="CheckOnlyOne(this)">
                                                        @endif
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">ไม่ถูกต้อง
                                                        @if ( $FM_PD_037_main->correct2 == 'incorrect' )
                                                        <input type="checkbox" id="correct2" name="correct2[{{ $index }}]"
                                                            value="incorrect"  onchange="CheckOnlyOne(this)" checked>
                                                        @else
                                                        <input type="checkbox" id="correct2" name="correct2[{{ $index }}]"
                                                            value="incorrect"  onchange="CheckOnlyOne(this)">
                                                        @endif
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="page-group[0][note]"
                                                class="col-sm-12 col-form-label">หมายเหตุ</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="note2[{{ $index }}]" id="note2"
                                                    rows="3">{{ !empty($FM_PD_037_main->note2) ? $FM_PD_037_main->note2 :  null }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <label for="time_roll3" class="col-md-12 col-form-label"> เวลา </label>
                                    <div class="col-md-12">
                                        <input class="form-control" min="00:00" max="24:00" type="time" id="time_roll3"
                                            name="time_roll3[{{ $index }}]"
                                            value="{{ !empty($FM_PD_037_main->time_roll3) ? $FM_PD_037_main->time_roll3 :  null }}">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">ถูกต้อง
                                                        @if ( $FM_PD_037_main->correct3 == 'correct' )
                                                        <input type="checkbox" id="correct3" name="correct3[{{ $index }}]"
                                                            value="correct"  onchange="CheckOnlyOne(this)" checked>
                                                        @else
                                                        <input type="checkbox" id="correct3" name="correct3[{{ $index }}]"
                                                            value="correct" onchange="CheckOnlyOne(this)">
                                                        @endif
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="container">ไม่ถูกต้อง
                                                        @if ( $FM_PD_037_main->correct3 == 'incorrect' )
                                                        <input type="checkbox" id="correct3" name="correct3[{{ $index }}]"
                                                            value="incorrect" onchange="CheckOnlyOne(this)" checked>
                                                        @else
                                                        <input type="checkbox" id="correct3" name="correct3[{{ $index }}]"
                                                            value="incorrect" onchange="CheckOnlyOne(this)">
                                                        @endif
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="page-group[0][note]"
                                                class="col-sm-12 col-form-label">หมายเหตุ</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="note3[{{ $index }}]" id="note3"
                                                    rows="3">{{ !empty($FM_PD_037_main->note3) ? $FM_PD_037_main->note3 :  null }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @if(!empty($FM_PD_037_main->sign_operator))
                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_037_main->sign_operator) }}" width="145">
                                <br> ( {{ isset($FM_PD_037_main->operator_name) ? $FM_PD_037_main->operator_name : null }} )
                                @endif
                                <b>
                                    {{-- {{ auth::user()->name }} --}}
                                    <br>
                                    <br>
                                    <button type="button" onclick="delete_record({{ $FM_PD_037_main->id }}, 'FM_PD_037_main')" class="btn btn-danger" title="ลบข้อมูล">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </b>                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ทวนสอบโดย -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-weight-bold">ทวนสอบโดย</h3>
                        @if(!empty($FM_PD_037_main->sign_leader))
                        <div>
                            <img src="{{asset('/assets/images/sign/'.$FM_PD_037_main->sign_leader)}}" alt="">
                        <br><b>( {{ $FM_PD_037_main->leader_name }} )</b>
                        </div>
                        <input type="hidden" name="txt_sign_leader" id="txt_sign_leader"
                            value="{{!empty($FM_PD_037_main->sign_leader) ? $FM_PD_037_main->sign_leader : '0' }}">
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

            </div>
        </div>
    </div>
</form>


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
                    onclick="check_pass_sign('sign_leader', {{ $production_order }}, 'FM_PD_037_main')  "
                    class="btn btn-lg btn-block btn-success">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('/assets/node_modules/repeater/main.js') }}"></script>
{{-- <script src="{{ asset('/assets/dist/js/pages/customize.js') }}"></script> --}}

<script>
    function droptify() {
    // Basic
    $(".dropify").dropify();
  
    // Translated
    $(".dropify-fr").dropify({
      messages: {
        default: "Glissez-déposez un fichier ici ou cliquez",
        replace: "Glissez-déposez un fichier ou cliquez pour remplacer",
        remove: "Supprimer",
        error: "Désolé, le fichier trop volumineux",
      },
    });
  
    // Used events
    var drEvent = $("#input-file-events").dropify();
  
    drEvent.on("dropify.beforeClear", function (event, element) {
      return confirm(
        'Do you really want to delete "' + element.file.name + '" ?'
      );
    });
  
    drEvent.on("dropify.afterClear", function (event, element) {
      alert("File deleted");
    });
  
    drEvent.on("dropify.errors", function (event, element) {
      console.log("Has Errors");
    });
  
    var drDestroy = $("#input-file-to-destroy").dropify();
    drDestroy = drDestroy.data("dropify");
    $("#toggleDropify").on("click", function (e) {
      e.preventDefault();
      if (drDestroy.isDropified()) {
        drDestroy.destroy();
      } else {
        drDestroy.init();
      }
    });
  }
  
  function repeater(index) {
    "use strict";
    window.id = 1;
  
    $(".repeater123").repeater({
      defaultValues: {
        id: window.id,
      },
      show: function () {
        window.id++;
        var count;
        $.each($(".seam"), function (index, value) {
          count = index + 1;
          $(value).html("รอยต่อที่ " + count);
        });
  
        var params = [this];
        $(this)
          .find("label[for]")
          .each(function (index, element) {
            var currentRepeater = params[0];
            var originalFieldId = $(element).attr("for");
            var newField = $(currentRepeater).find(
              "input[id='" + originalFieldId + "']"
            );
  
            if ($(newField).attr("type") == "file") {
              $(newField).dropify();
            }
            if ($(newField).length > 0) {
              var newFieldName = $(newField).attr("name");
              var newFieldID = $(newField).attr("id");
              $(currentRepeater)
                .find("label[for='" + originalFieldId + "']")
                .attr("for", newFieldName);
            }
          }, params);
  
        $(this).slideDown();
  
        $(this).show();
      },
      hide: function (deleteElement) {
        if (confirm("Are you sure you want to delete this element?")) {
          window.id--;
          $(this).slideUp(deleteElement);
        }
  
        setTimeout(function () {
          $.each($(".seam"), function (index, value) {
            var count = index + 1;
            $(value).html("รอยต่อที่ " + count);
          });
        }, 500);
      },
      ready: function (setIndexes) {
        $.each($(".seam"), function (index1, value) {
          $(
            "input[name*='page-group-default[" + index1 + "][note]"
          ).dropify();
        });
      },
      ready: function (setIndexes) {
        $.each($(".seam"), function (index1, value) {
          $(
            "input[name*='page-group-default[" + index1 + "][note]"
          ).dropify();
        });
  
        $.each($(".seam"), function (index1, value) {
          $(
            "input[name*='page-group[" + index1 + "][note]"
          ).dropify();
        });
      },
    });
    $("input[name*='page-group-default[" + index + "][note]").dropify();
  }
</script>

<script>
    $(document).ready(function () {
        droptify();
        repeater(0);
    });
</script>

<script>
    $('#modal_save_pass').on('click', function(e) {
        var sign_photo = '{{ Auth::user()->sign_photo }}';
        var pass_sign = $('#pass').val();
        $.ajax({
            type: 'post',
            url: '{{ url('check_pass_sign') }}',
            data: {pass_sign : pass_sign},
            beforeSend: function(){
            },
            success: function (pic_sign) {
                if (pic_sign) {
                    // alert(user_type_str);
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
</script>

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
@endsection
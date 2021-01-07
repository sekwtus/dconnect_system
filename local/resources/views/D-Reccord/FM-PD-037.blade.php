@extends('layouts.master')

@section('title', 'FM-PD-037')

@section('style')

@endsection

@section('main')
<form method="POST" action="{{ url('/FM-PD-037/store/'.$order) }}" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3" style="font-size: 14pt;">
        <div class="col-md-12 px-0">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-12">
                            <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-037 Rev No.03
                                บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($head as $item)
                        <div class="col-lg-4">
                            <label> Date: &nbsp;&nbsp; {{ date_format(now(),"Y-m-d") }}</label>
                            <input type="hidden" id="date" name="date" value="{{ date_format(now(),"Y-m-d") }}">
                        </div>
                        <div class="col-lg-8">
                            <label>PRODUCT NAME: {{ $item->material_description }}</label>
                            <input type="hidden" name="product_name" value="{{ $item->material_description }}">
                        </div>
                        <div class="col-lg-4">
                            <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $item->production_order }}</label>
                            <input type="hidden" name="production_order" value="{{ $item->production_order }}">
                        </div>
                        <div class="col-lg-8">
                            <label>BATCH: &nbsp;&nbsp; {{ $item->batch }}</label>
                            <input type="hidden" name="batch" value="{{ $item->batch }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="container">Common Foil
                                    <input type="checkbox" name="type_foil" value="1" onchange="CheckOnlyOne(this)">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="container">Art Work
                                    <input type="checkbox" name="type_foil" value="2" onchange="CheckOnlyOne(this)">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">PM</span>
                                </div>
                                <input type="text" class="form-control" id="number_foil" name="number_foil" {{ empty($pm_foil) ? ' value= ' : 'value='.$pm_foil.' readonly' }} >
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="page" name="page" value="1">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    Tag ม้วนฟอยล์
                                </div>
                                <div class="col-md-12">
                                    <input type="file" id="tag_foil" class="dropify" name="tag_foil" data-height="200"
                                        data-default-file="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="time_roll" class="col-sm-12 col-form-label">เวลาที่เปลี่ยนม้วน</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="time" name="time_roll" value="{{ date('H:i') }}" id="time_roll" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number_pack" class="col-sm-12 col-form-label">จำนวนซองที่ผลิตได้</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="number" name="number_pack" id="number_pack"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="correct_foil" class="col-sm-12 col-form-label">
                                    ความถูกต้องของ Foil
                                </label>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="container">ถูกต้อง
                                                    <input type="checkbox" name="correct_foil" value="1"  onchange="CheckOnlyOne(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="container">ไม่ถูกต้อง
                                                    <input type="checkbox" name="correct_foil" value="2"  onchange="CheckOnlyOne(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="machine_pack" class="col-sm-12 col-form-label">เครื่องบรรจุที่</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="machine_pack" name="machine_pack" value="{{ !empty($head[0]->line_number) ? $head[0]->line_number : '' }}"
                                    {{ !empty($head[0]->line_number) ? 'readonly' : '' }}>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="number_seam" class="col-sm-12 col-form-label">จำนวนรอยต่อ</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" name="number_seam" id="number_seam"  value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='repeater123'>
                        <div class="data-repeater-list" data-repeater-list="page-group">
                            <div data-repeater-item>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 my-2 py-2 text-white bg-success">
                                            <label class="mb- seam">รอยต่อที่ 1</label>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="time_roll1" class="col-md-12 col-form-label"> เวลา </label>
                                                <div class="col-md-4">
                                                    <input class="form-control"  min="00:00" max="24:00" type="time" id="time_roll1" name="time_roll1" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <label class="container">ถูกต้อง
                                                                    <input type="checkbox" id="correct1"  name="correct1" value="correct" onclick="set_time(this,'time_roll1')"  onchange="CheckOnlyOne(this)">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <label class="container">ไม่ถูกต้อง
                                                                    <input type="checkbox" id="correct1"  name="correct1" value="incorrect" onclick="set_time(this,'time_roll1')"  onchange="CheckOnlyOne(this)">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="page-group[0][note]"
                                                    class="col-sm-12 col-form-label">หมายเหตุ</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" name="note1" id="note1" rows="3" ></textarea> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='repeater123'>
                        <div class="data-repeater-list" data-repeater-list="page-group">
                            <div data-repeater-item>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 my-2 py-2 text-white bg-success">
                                            <label class="mb- seam">รอยต่อที่ 2</label>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="time_roll2" class="col-md-12 col-form-label"> เวลา </label>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="time" id="time_roll2" name="time_roll2"  value="" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <label class="container">ถูกต้อง
                                                                    <input type="checkbox" id="correct2"  name="correct2" value="correct" onclick="set_time(this,'time_roll2')"  onchange="CheckOnlyOne(this)">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <label class="container">ไม่ถูกต้อง
                                                                    <input type="checkbox" id="correct2"  name="correct2" value="incorrect" onclick="set_time(this,'time_roll2')"  onchange="CheckOnlyOne(this)">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="page-group[0][note]"
                                                    class="col-sm-12 col-form-label">หมายเหตุ</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" name="note2" id="note2" rows="3" ></textarea> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class='repeater123'>
                        <div class="data-repeater-list" data-repeater-list="page-group">
                            <div data-repeater-item>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 my-2 py-2 text-white bg-success">
                                            <label class="mb- seam">รอยต่อที่ 3</label>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="time_roll1" class="col-md-12 col-form-label"> เวลา </label>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="time" id="time_roll3" name="time_roll3"  value="" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <label class="container">ถูกต้อง
                                                                    <input type="checkbox" id="correct3"  name="correct3" value="correct" onclick="set_time(this,'time_roll3')"  onchange="CheckOnlyOne(this)">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <label class="container">ไม่ถูกต้อง
                                                                    <input type="checkbox" id="correct3"  name="correct3" value="incorrect" onclick="set_time(this,'time_roll3')"   onchange="CheckOnlyOne(this)">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="page-group[0][note]"
                                                    class="col-sm-12 col-form-label">หมายเหตุ</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" name="note3" id="note3" rows="3" ></textarea> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            {{-- ลายเซ็น --}}
                            <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="0">
                            <div id="sign_operator" class="d-none"></div>
                                
                            <button type="button" id="btn_sign_operator" data-toggle="modal" data-target="#sign_operator_modal" class="btn btn-lg btn-block btn-primary"> 
                                ลายเซ็น
                            </button>

                            <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b>
                        </div>
                    </div>
                    {{-- <div class="row mt-4">
                        <div class="col-md-12 text-right">
                            ตรวจโดย <div><button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modelId" data-input="leader"
                                    {{ (Auth::user()->id_type_user != 3 ) ? 'disabled' : null }}>กดเพื่อบันทึกลายเซ็น</button>
                            </div>
                            (Line Leader/Supervisor)
                        </div>
                        <input type="hidden" name="leader" id="leader" value="">
                    </div> --}}

                    <div class="row text-center">
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
    
                        <div class="col-lg-12 col-md-12 mt-4">
                            <button type="button" class="btn btn-lg btn-block btn-info" onclick="window.location.href='{{ url('printer_monitor/'.$order) }}'">
                                <i class="fa fa-undo"></i> ย้อนกลับ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal ลายเซ็น operator-->
<div class="modal fade" id="sign_operator_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"
    aria-labelledby="vcenter">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="">กรอกรหัสผ่านเพื่อบันทึกลายเซ็น</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="password" class="form-control form-control-lg" name="pass_sign" id="pass_sign_operator" placeholder="รหัสผ่าน"
                    autocomplete="off">
                <input type="hidden" name="ID" id="ID">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="check_pass_sign('sign_operator', {{ $order }})" class="btn btn-lg btn-block btn-success">
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
    $(document).ready(function () {
        droptify();
        repeater(0);
    });
</script>

<script>
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
                    pr_order:{{$order}},
                    table_document:'FM_PD_037_main'
                },
            beforeSend: function(){
            },
            success: function (pic_sign) {
                console.log(pic_sign);
                if (pic_sign) {
                    // alert(user_type_str);
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
  
    $(".repeater123x").repeater({
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
          $.each($(".seam" + index), function (index, value) {
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


  function set_time(that , id_time){
      if( $("input[name='"+that.name+"']:checked").val()  == 'correct' ||  $("input[name='"+that.name+"']:checked").val()  == 'incorrect'  ){
        var time_now = "{{ date('H:i') }}";
        $('#'+id_time).val(time_now);
      }else{
        $('#'+id_time).val('');
      }
  }

  $('#btn-save').click( function (e){
    var number_foil = '';

    var correct1 = $("input[name='correct1']:checked").val();
    var correct2 = $("input[name='correct2']:checked").val();
    var correct3 = $("input[name='correct3']:checked").val();

    if ( correct1 == 'incorrect' ) {
        number_foil =  number_foil + 'รอยต่อ 1   ';
    }
    if ( correct2 == 'incorrect' ) {
        number_foil =  number_foil + 'รอยต่อ 2   ';
    }
    if ( correct3 == 'incorrect' ) {
        number_foil =  number_foil + 'รอยต่อ 3   ';
    }
    
    if (number_foil != '') {
        alert('กรุณาตรวจสอบ '+ number_foil);
        return false;
    } else {
        return true;
    }

  })
</script>

@endsection
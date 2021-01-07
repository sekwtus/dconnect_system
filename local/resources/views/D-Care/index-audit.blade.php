@extends('layouts.master')
@section('title', "D-Care : $template_header->layout_name")

@section('style')
  <style type="media">
    
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">
      Template Name :
      {{ $template_header->name }}</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">D-Care</a>
        </li>
        <li class="breadcrumb-item active">Audit</li>
      </ol>
    </div>
  </div>
</div>

<form id="frm-insert">
  <div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">

        <div class="card-header bg-info">
          <h4 class="m-b-0 text-white">
            {{ $template_header->name }}
          </h4>
        </div>

        <div class="card-body">
          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                Auditor Name <span class="text-danger">*</span>
              </label>

              <input type="hidden" name="txt_layout_id" value="{{ $template_header->layout_id }}">
              <input type="hidden" name="txt_header_id" value="{{ $template_header->id }}">

              <input name="txt_auditor_name" value="{{ Auth::user()->name }}" class="form-control"> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-6">
              <label class="mb-0">
                Small Group <span class="text-danger">*</span>
              </label>

              <select name="ddl_small_group" class="form-control custom-select" style="width:100%; height:56px;">
                @foreach ($d_care_small_group as $small_group)
                  <option value="{{ $small_group->id }}">
                    {{ $small_group->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="mb-0">
                Area <span class="text-danger">*</span>
              </label>

              <select name="ddl_area" class="form-control custom-select" style="width:100%; height:56px;">
                @foreach ($d_care_area as $area)
                  <option value="{{ $area->id }}">
                    {{ $area->name }}
                  </option>
                @endforeach
              </select> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-12">
              <div class="alert alert-warning mb-0">
                <b class="mb-0">
                  Description : {{ $template_header->description }}

                  {{ $template_header->operator_description }}
                  {{ $template_header->criteria_score }}
                </b>
              </div>
            </div>
          </div>

          @foreach ($template_detail as $num_detail=>$detail)
            {!! $num_detail > 0 ?'<hr class="border border-danger">' :'' !!}
            <div class="row">
              <div class="col-md-8">
                <label class="mb-0">
                  {{ ($num_detail+1) }}.
                  {{ $detail->requirement }}
                </label>

                <input type="hidden" name="txt_detail_id[]" value="{{ $detail->id }}">

                <input name="txt_comment[]" class="form-control" placeholder="Comment">
              </div>

              <div class="col-md-4">
                <label class="mb-0">Score</label>

                <input type="number" name="txt_score[]" min="1" max="100" class="form-control txt_score" placeholder="Score">
              </div>

              <div class="col-md-12 m-t-10">
                <label class="mb-0">file</label>

                <input type="file" name="file[]"  class="dropify" accept="image/*" data-height="100">
              </div>
            </div>
          @endforeach
          
          <hr class="border border-danger">
          <div class="row">

            <div class="col-md-4 offset-8">
              <label class="mb-0">
                Sum Score

                (PASS : {{ $template_header->operator .' '. $template_header->criteria_score }})
              </label>

              <div class="input-group col-xs-12">
                <input name="txt_sum_score" class="form-control" placeholder="Sum Score" readonly>
  
                <span class="input-group-append">
                  <div id="div-fail" class="input-group-text bg-danger text-white">
                    <i class="fa fa-times m-r-5"></i>
                    <b>Fail</b>
                  </div>
                </span>
              </div>
            </div>
          </div>
        </div>
  
        <div class="card-footer text-center">
          <button type="button" onclick="insert_d_care_data()" class="btn btn-success">
            <i class="far fa-save"></i>
            บันทึก
          </button>
          
          <button type="button" onclick="reset_form('frm-insert')" class="btn btn-danger">
            <i class="fa fa-times"></i>
            ยกเลิก
          </button>
          
          <a href="{{ url('d-care') }}" class="btn btn-info">
            <i class="fa fa-undo"></i>
            ย้อนกลับ
          </a>
        </div>

      </div>
    </div>
  </div>
</form>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function () {
    set_select2(`select[name="ddl_area"]`, `empty`);
    set_select2(`select[name="ddl_small_group"]`, `empty`);
    set_dropify(`.dropify`);
    //set_touchspin
    // set_touchspin(`txt_score`, `1`);
  });

// sum_score
  $(`.txt_score`).on(`keyup change`, function(e) {
    // alert(4)
    let txt_score = $(`.txt_score`);
    let operator = `{!! $template_header->operator !!}`;
    let criteria_score = `{!! $template_header->criteria_score !!}`;
    let sum_score = ``;

    var div_pass = `<div id="div-pass" class="input-group-text bg-success text-white">
      <i class="fa fa-check m-r-5"></i>
      <b>Pass</b>
    </div>`;

    var div_fail = `<div id="div-fail" class="input-group-text bg-danger text-white">
      <i class="fa fa-times m-r-5"></i>
      <b>Fail</b>
    </div>`;

    $(txt_score).each(function (index, element) {
      // console.log($(element).val());
      if( $(element).val() != '') {
        sum_score = Number(sum_score) + Number($(element).val());
      }
    });

    $(`input[name="txt_sum_score"]`).val(sum_score);
    
    if(sum_score == '') {
      $(`input[name="txt_sum_score"]`).next().html(div_fail);
      return false;
    }

    var condition = eval(`${sum_score} ${operator} ${criteria_score}`);
    // func_target(operator, sum_score,criteria_score)
    if(condition) {
      // console.log(condition);
      $(`input[name="txt_sum_score"]`).next().html(div_pass);
    } else {
      $(`input[name="txt_sum_score"]`).next().html(div_fail);
    }
  });

  // insert
  function insert_d_care_data() {
    let form_data = new FormData($('#frm-insert')[0]);
    // form_data.append('kpi_type_id', kpi_type_id);

    // for(let [name, value] of form_data) {
    //   if(name=='file_requirement[]'){
    //     console.log(name, !value.name? '55' :value.name);
    //   } else {
    //     console.log(`${name} = ${value}`);
    //   }
    // }
    // return false;
    
    $.ajax({
      type: `post`,
      url: `{{ url('insert-d-care-data') }}`,
      data: form_data,
      dataType:'JSON',
      contentType: false,
      processData: false,
      success: function (res) {
        console.log(res);
        alert(res.msg);

        location.href = `{{ url('report/d-care?template_id='.$template_header->id) }}`;
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
      },
    });
  }

  // reset_form
  function reset_form(form_id) {
    document.getElementById(`${form_id}`).reset();
    set_select2(`ddl_area`, `empty`);
  }
</script>
@endsection
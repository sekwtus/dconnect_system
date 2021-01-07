@extends('layouts.master')
@section('title', "D-Care : $d_care_report->layout_name")

@section('style')
  <style type="media">
    
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">
      Template Name :
      {{ $d_care_report->template_name }}</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">D-Care</a>
        </li>
        <li class="breadcrumb-item active">Gemba</li>
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
            Edit {{ $d_care_report->template_name }}
          </h4>
        </div>

        <div class="card-body">
          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                Auditor Name
              </label>

              <input type="hidden" name="txt_id" value="{{ $d_care_report->id }}">
              <input type="hidden" name="txt_layout_id" value="{{ $d_care_report->layout_id }}">

              <input name="txt_auditor_name" value="{{ $d_care_report->auditor_name }}" class="form-control"> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-6">
              <label class="mb-0">
                Small Group
              </label>

              <input name="txt_small_group" value="{{ $d_care_report->small_group }}" class="form-control" disabled> 
            </div>

            <div class="col-md-6">
              <label class="mb-0">
                Area
              </label>

              <select name="ddl_area" class="form-control" style="width:100%; height:px;">
                @foreach ($d_care_area as $area)
                  <option value="{{ $area->id }}" {{ $area->id==$d_care_report->area_id ?'selected' :'' }}>
                    {{ $area->name }}
                  </option>
                @endforeach
              </select> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-6">
              <label class="mb-0">
                Action
              </label>

              <input name="txt_action" value="{{ $d_care_report->action }}" class="form-control"> 
            </div>

            <div class="col-md-6">
              <label class="mb-0">
                Status PDCA
              </label>

              <div class="align-self-center">
                <div class="custom-control custom-checkbox d-inline-block mr-sm-2">
                  <input type="checkbox" name="chk_status_p" value="{{ $d_care_report->status_p ?$d_care_report->status_p :'on' }}" id="status_p" class="custom-control-input" {{ $d_care_report->status_p ?'checked' :'' }}>
                  <label for="status_p" class="custom-control-label">P</label>
                </div>

                <div class="custom-control custom-checkbox d-inline-block mr-sm-2">
                  <input type="checkbox" name="chk_status_d" value="{{ $d_care_report->status_d ?$d_care_report->status_d :'on' }}" id="status_d" class="custom-control-input" {{ $d_care_report->status_d ?'checked' :'' }}>
                  <label for="status_d" class="custom-control-label">D</label>
                </div>

                <div class="custom-control custom-checkbox d-inline-block mr-sm-2">
                  <input type="checkbox" name="chk_status_c" value="{{ $d_care_report->status_c ?$d_care_report->status_c :'on' }}" id="status_c" class="custom-control-input" {{ $d_care_report->status_c ?'checked' :'' }}>
                  <label for="status_c" class="custom-control-label">C</label>
                </div>
                
                <div class="custom-control custom-checkbox d-inline-block mr-sm-2">
                  <input type="checkbox" name="chk_status_a" value="{{ $d_care_report->status_a ?$d_care_report->status_a :'on' }}" id="status_a" class="custom-control-input" {{ $d_care_report->status_a ?'checked' :'' }}>
                  <label for="status_a" class="custom-control-label">A</label>
                </div>
              </div>

            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-12">
              <div class="alert alert-warning mb-0">
                <label class="mb-0">
                  Description : {{ $d_care_report->description }}
                </label>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                <label class="mb-0">
                  {{ $d_care_report->requirement }}
                </label>

                <input name="txt_comment" value="{{ $d_care_report->comment }}" class="form-control" placeholder="Comment">
              </div>

              <div class="col-md-12 m-t-10">
                <label class="mb-0">file</label>
                <input type="file" name="file" data-default-file="{{ asset('assets/d-care/'.$d_care_report->file)  }}" class="dropify" accept="image/*" data-height="100">
              </div>
          </div>
        
        </div>
  
        <div class="card-footer text-center">
          <button type="button" onclick="update_d_care_data()" class="btn btn-warning">
            <i class="far fa-edit"></i>
            แก้ไข
          </button>
          
          <button type="button" onclick="reset_form('frm-insert')" class="btn btn-danger">
            <i class="fa fa-times"></i>
            ยกเลิก
          </button>
          
          <a href="{{ url('report/d-care?template_id='.$d_care_report->header_id) }}" class="btn btn-info">
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
    // set_select2
    set_select2(`select[name="ddl_area"]`, `{{ isset($d_care_report->area_id) ?$d_care_report->area_id :'empty' }}`);
    set_dropify(`.dropify`);
  });

  // insert
  function update_d_care_data() {
    let template_id = `{{ $d_care_report->header_id }}`;
    let form_data = new FormData($(`#frm-insert`)[0]);
    // form_data.append('kpi_type_id', kpi_type_id);

    for(let [name, value] of form_data) {
      console.log(`${name} = ${value}`);
    }
    
    $.ajax({
      type: `post`,
      url: `{{ url('update-d-care-data') }}`,
      data: form_data,
      dataType:'JSON',
      contentType: false,
      processData: false,
      success: function (res) {
        console.log(res);
        alert(res.msg);

        location.href = `{{ url('report/d-care?template_id=${template_id}') }}`;
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
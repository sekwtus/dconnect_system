@extends('layouts.master')
@section('title', 'Dcare : Edit Template')

@section('style')
  <link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">

  <style type="media">
    
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">Edit Template</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">D-Care</a>
        </li>
        <li class="breadcrumb-item active">Edit Template</li>
      </ol>
    </div>
  </div>
</div>

<form id="frm-edit-template">
  <div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">

        <div class="card-header bg-info">
          <h4 class="m-b-0 text-white">
            Template Header
          </h4>
        </div>

        <div class="card-body">
        
          <div class="row m-b-10">
            <div class="col-md-4">
              <label class="mb-0">
                Layout <span class="text-danger">*</span>
              </label>

              <input type="hidden" name="txt_id" value="{{ $template_header->id }}">

              <select name="ddl_layout" class="form-control custom-select" style="width:100%; height:36px;">
                @foreach ($d_care_layout as $layout)
                  <option value="{{ $layout->id }}" {{ $layout->id==$template_header->layout_id ?'selected' :'' }}>
                    {{ $layout->name }}
                  </option>
                @endforeach
              </select> 
            </div>

            <div class="col-md-4">
              <label class="mb-0">
                Function <span class="text-danger">*</span>
              </label>

              <select name="ddl_function" class="form-control custom-select" style="width:100%; height:36px;">
                @foreach ($d_care_function as $function)
                  <option value="{{ $function->id }}" {{ $function->id==$template_header->function_id ?'selected' :'' }}>
                    {{ $function->name }}
                  </option>
                @endforeach
              </select> 
            </div>

            <div class="col-md-4">
              <label class="mb-0">
                Name <span class="text-danger">*</span>
              </label>

              <input name="txt_name" value="{{ $template_header->name }}" maxlength="90" class="form-control" placeholder=""> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-4">
              <label class="mb-0">
                Version <span class="text-danger">*</span>
              </label>

              <div class="">
                <input name="txt_version" value="{{ $template_header->version }}" placeholder="x.x" data-bts-button-down-class="" data-bts-button-up-class="">
              </div>
            </div>

            <div class="col-md-4">
              <label class="mb-0">
                Effective Date <span class="text-danger">*</span>
              </label>

              <div class="input-group">
                <input type="hidden" name="test_date" value="{{-- $template_header->effective_date --}}">

                <input name="txt_date" class="form-control" placeholder="dd/mm/yyyy">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="icon-calender"></i></span>
                </div>
              </div>
             </div>

             <div class="col-md-4">
               <label class="mb-0">
                 Create by
               </label>
 
               <input name="txt_create_by" value="{{ $template_header->create_by }}" class="form-control" placeholder=""> 
             </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-4">
              <label class="mb-0">Description</label>
              <textarea name="txt_description" class="form-control" placeholder="Description">{{ $template_header->description }}</textarea>
            </div>

            @if ($template_header->layout_id == 2) <!-- For Audit-->
              <div class="col-md-4">
                <label class="mb-0">Criteria Score</label>
                
                <input name="txt_criteria_score" value="{{ $template_header->criteria_score }}" min="1" max="100" class="form-control" placeholder="">
              </div>

              <div class="col-md-4">
                <label class="mb-0">
                  Operator <span class="text-danger">*</span>
                </label>

                <select name="ddl_operator" class="form-control" style="width:100%; height:36px;">
                  @foreach ($master_operator as $operator)
                    <option value="{{ $operator->operator }}" {{ $operator->operator==$template_header->operator ?'selected' :'' }}>
                      {{ $operator->description }}
                      ({{ $operator->operator }})
                    </option>
                  @endforeach
                </select> 
              </div>
            @endif
          </div>

          <div class="row m-b-10">
            <div class="col-md-4">
              <label class="mb-0">
                Status <span class="text-danger">*</span>
              </label>

              <select name="ddl_status" class="form-control">
                @foreach ($d_care_status as $status)
                  <option value="{{ $status->id }}" {{ $status->id==$template_header->status ?'selected' :'' }}>
                    {{ $status->name }}
                  </option>
                @endforeach
              </select> 
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">

        <div class="card-header bg-info">
          <h4 class="m-b-0 text-white">
            Template Detail
          </h4>
        </div>
  
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <button type="button" onclick="add_requirement();" class="waves-effect waves-light btn btn-block btn-outline-success">
                <i class="fas fa-plus-circle"></i> Requirement
              </button>
            </div>
          </div>

          <div class="row">
            <div id="div-requirement" class="col-md-12">
              @foreach ($template_detail as $num_detail=>$detail)
                <div class="row mt-3 row-requirement">
                  <div class="col-md-12 align-self-center">
                    <label class="mb-0">Requirement</label>
            
                    <div class="input-group col-xs-12">
                      <input name="txt_requirement[{{ $detail->id }}]" value="{{ $detail->requirement }}" class="form-control txt_requirement" placeholder="Requirement">
                    
                      <span class="input-group-append">
                        <button type="button" class="btn btn-info btn-copy" title="คัดลอก">
                          <i class="far fa-copy m-0"></i>
                        </button>
            
                        <button type="button" detail_id="{{ $detail->id }}" class="btn btn-danger btn-remove" title="ลบข้อมูล">
                          <i class="far fa-trash-alt m-0"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>

        </div>

        <div class="card-footer text-center">
          <button type="button" onclick="update_d_care()" class="btn btn-warning">
            <i class="far fa-edit"></i>
            แก้ไข
          </button>
          
          <button type="button" onclick="reset_form('frm-edit-template')" class="btn btn-danger">
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
    // set_select2
    set_select2(`ddl_function`);
    //set_touchspin
    set_touchspin(`txt_version`);
    //set_datepicker
    set_datepicker(`txt_date`, new Date('{{ $template_header->effective_date }}'));
    // set_dropify(`[]`);
    // $('#div-requirement .row-requirement').last().css('border', '1px solid #000')
  });

  // add_requirement
  function add_requirement() {
    let row_req = $(`#div-requirement .row-requirement`).length;
    row_req++;

    let obj_to = document.getElementById(`div-requirement`);

    let div_input = document.createElement(`div`);
    div_input.setAttribute(`class`, `row mt-3 row-requirement`);

    div_input.innerHTML = `
      <div class="col-md-12 align-self-center">
        <label class="mb-0">Requirement</label>

        <div class="input-group col-xs-12">
          <input name="txt_requirement[new${row_req}]" class="form-control txt_requirement" placeholder="Requirement">
        
          <span class="input-group-append">
            <button type="button" class="btn btn-info btn-copy" title="คัดลอก">
              <i class="far fa-copy m-0"></i>
            </button>

            <button type="button" class="btn btn-danger btn-remove" title="ลบข้อมูล">
              <i class="far fa-trash-alt m-0"></i>
            </button>
          </span>
        </div>
      </div>
    `;

    obj_to.appendChild(div_input);
  }

  // copy_requirement
  $(`#div-requirement`).on(`click`, `.btn-copy`, function(e) {
    // console.log( $(this).closest(`.row-requirement`));
    let row_req = $(`#div-requirement .row-requirement`).length;
    row_req++;

    $(this).closest(`.row-requirement`).clone().appendTo( $('#div-requirement') );

    let row_requirement_last = $('#div-requirement .row-requirement').last();
    row_requirement_last.find('.txt_requirement').attr(`name`, `txt_requirement[new${row_req}]`);
    row_requirement_last.find('.btn-remove').removeAttr('detail_id');
  });

  // remove_requirement
  $(`#div-requirement`).on(`click`, `.btn-remove`, function(e) {
    let detail_id = $(this).attr('detail_id');
    // console.log(detail_id);
    if(typeof detail_id != 'undefined') {
      if (confirm(`ต้องการลบ Requirement หรือไม่ ?`)) {
        $.ajax({
          type: `post`,
          url: `{{ url('delete-d-care-detail') }}`,
          data: { detail_id: detail_id },
          success: function (res) {
            console.log(res);
            alert(res.msg);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
          },
        });
      } else {
        return false;
      }
    }

    $(this).closest(`.row-requirement`).remove();
  });

  // updat
  function update_d_care() {
    let form_data = new FormData($('#frm-edit-template')[0]);
    
    $.ajax({
      type: `post`,
      url: `{{ url('update-d-care') }}`,
      data: form_data,
      dataType:'JSON',
      contentType: false,
      processData: false,
      success: function (res) {
        console.log(res);

        if(res.validate > 0){
          alert(res.msg.join( "\n"));
        }
        else {
          alert(res.msg);
          location.href = `{{ url('d-care') }}`;
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
      },
    });
  }

  // reset_form
  function reset_form(form_id) {
    $(`#${form_id}`)[0].reset();
    // $(`#div-requirement`).empty();
    set_select2(`ddl_function`);
    set_datepicker(`txt_date`, new Date('{{ $template_header->effective_date }}'));
  }
</script>
@endsection
@extends('layouts.master')
@section('title', 'Dcare : Create Template')

@section('style')
  <link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">

  <style type="media">
    
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">Create Template</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">D-Care</a>
        </li>
        <li class="breadcrumb-item active">Create Template</li>
      </ol>
    </div>
  </div>
</div>

<form id="frm-insert-template">
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

              <select name="ddl_layout" class="form-control">
                <option disabled selected>-- กรุณาเลือก --</option>
                @foreach ($d_care_layout as $layout)
                  <option value="{{ $layout->id }}" {{ $layout->id==$layout_id ?'selected' :'' }}>
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
                  <option value="{{ $function->id }}">
                    {{ $function->name }}
                  </option>
                @endforeach
              </select> 
            </div>

            <div class="col-md-4">
              <label class="mb-0">
                Name <span class="text-danger">*</span>
              </label>

              <input name="txt_name" maxlength="90" class="form-control" placeholder="Name"> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-4">
              <label class="mb-0">
                Version <span class="text-danger">*</span>
              </label>

              <div class="">
                <input name="txt_version" value="1" placeholder="x.x" data-bts-button-down-class="" data-bts-button-up-class="">
              </div>
            </div>

            <div class="col-md-4">
              <label class="mb-0">
                Effective Date
              </label>

              <div class="input-group">
                <input type="hidden" name="test_date">
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
 
               <input name="txt_create_by" value="{{ Auth::user()->name }}" class="form-control" placeholder=""> 
             </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-4">
              <label class="mb-0">Description</label>
              <textarea name="txt_description" class="form-control" placeholder="Description"></textarea>
            </div>
            
            @if ($layout_id == 2) <!-- For Audit-->
              <div class="col-md-4">
                <label class="mb-0">Criteria Score</label>
                
                <input name="txt_criteria_score" min="1" max="100" class="form-control" placeholder="">
              </div>

              <div class="col-md-4">
                <label class="mb-0">
                  Operator <span class="text-danger">*</span>
                </label>
  
                <select name="ddl_coperator" class="form-control" style="width:100%; height:36px;">
                  @foreach ($master_operator as $operator)
                    <option value="{{ $operator->operator }}">
                      {{ $operator->description }}
                      ({{ $operator->operator }})
                    </option>
                  @endforeach
                </select> 
              </div>
            @endif
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
  
            </div>
          </div>
  
        </div>
  
        <div class="card-footer text-center">
          <button type="button" onclick="insert_d_care()" class="btn btn-success">
            <i class="far fa-save"></i>
            บันทึก
          </button>
          
          <button type="button" onclick="reset_form('frm-insert-template')" class="btn btn-danger">
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
<!-- <div class="row">
  <div class="col-md-12">
    <div class="ribbon-wrapper card">
      <div class="ribbon ribbon-bookmark ribbon-default">Template dafsgshdjjdjfygul;ojliuyjtrgtykuih;lhy</div>

      <p class="ribbon-content">
        Duis mollis, est non commodo luctus, nisi erat porttitor ligula
      </p>
    </div>
  </div>
</div> -->
@endsection

@section('script')
<script type="text/javascript">

  $(document).ready(function () {
    // set_select2
    set_select2(`ddl_function`, `empty`);
    //set_touchspin
    set_touchspin(`txt_version`);
    //set_datepicker
    set_datepicker(`txt_date`);
    // set_dropify(`[]`);
  });

  // add_requirement
  function add_requirement() {
    let index_req = $(`#div-requirement .row-requirement`).length;
    index_req++;
    let obj_to = document.getElementById(`div-requirement`);

    let div_input = document.createElement(`div`);
    div_input.setAttribute(`class`, `row mt-3 row-requirement`);

    div_input.innerHTML = `
      <div class="col-md-12 align-self-center">
        <label class="mb-0">Requirement</label>

        <div class="input-group col-xs-12">
          <input name="txt_requirement[]" class="form-control" placeholder="Requirement${index_req}" required>
        
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
    // console.log( $(`.input[name="file_requirement[]"]`).val() );
    $(this).closest(`.row-requirement`).clone().appendTo($('#div-requirement'));
  });

  // remove_requirement
  $(`#div-requirement`).on(`click`, `.btn-remove`, function(e) {
    $(this).closest(`.row-requirement`).remove();
  });

  // insert
  function insert_d_care() {
    let row_requirement = $(`#div-requirement .row-requirement`).length;
    let form_data = new FormData($('#frm-insert-template')[0]);
    // form_data.append('kpi_type_id', kpi_type_id);

    // for(let [name, value] of form_data) {
    //   if(name=='file_requirement[]'){
    //     console.log(name, !value.name? '55' :value.name);
    //   } else {
    //     console.log(`${name} = ${value}`);
    //   }
    // }

    if(row_requirement < 1) {
      alert('กรุณาเพิ่ม Requirement');
      return false;
    }
    
    $.ajax({
      type: `post`,
      url: `{{ url('insert-d-care') }}`,
      data: form_data,
      dataType:'JSON',
      contentType: false,
      processData: false,
      success: function (res) {
        console.log(res);

        if(res.validate > 0){
          alert(res.msg.join("\n"));
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
    document.getElementById(`${form_id}`).reset(); // $(`#${form_id})[0].reset();
    // $(`#div-requirement`).empty();
    set_select2(`ddl_function`, `empty`);
    set_datepicker(`txt_date`, new Date());
    // $(`input[name="txt_date"]`).datepicker('setDate', new Date);
  }
</script>
@endsection
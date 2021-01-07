@extends('layouts.master')
@section('title', 'ตั้งค่า D-Know')


@section('style')

@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">
      ตั้งค่า D-Know
    </h4>
  </div>
  
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('d-know') }}">D-know</a>
        </li>
      </ol>

      <a href="{{ url('setting/category/d-know') }}" class="btn btn-info d-none d-lg-block m-l-15">
        <i class="fa fa-plus-circle"></i>
        Create Category
      </a>

      <a href="#" data-toggle="modal" data-target="#modal-insert-d-know" class="btn btn-info d-none d-lg-block m-l-15">
        <i class="fa fa-plus-circle"></i>
        Create New
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 px-0">
      <div class="card">
          <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab" role="tablist">
              @foreach ($d_know_category as $category )
                <li class="nav-item">
                  <a class="nav-link {{ $category->id==1 ?'active' :'' }}" onclick="get_data_table({{ $category->id }})" data-toggle="tab" href="#tab-category{{ $category->id }}" role="tab">
                    <span class="hidden-sm-up">
                      <i class="ti-home"></i>
                    </span>
  
                    <span class="hidden-xs-down">
                      {{ $category->name }}
                    </span>
                  </a>
                </li>
              @endforeach
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              @foreach ($d_know_category as $category)
                <div class="tab-pane {{ $category->id==1 ?'active' :'' }}" id="tab-category{{ $category->id }}" role="tabpanel">
                  
                  <table id="tbl-d-know{{ $category->id }}" class="tbl-dconnect table-bordered table-striped">
                    <thead class="text-center">
                      <tr>
                        <th class="w-5">ลำดับ</th>
                        <th class="w-50">ชื่อ</th>
                        <th class="w-">ประเภท</th>
                        <th class="w-15">ดำเนินการ</th>
                      </tr>
                    </thead>

                    <tbody>

                    </tbody>
                  </table>
                </div>
              @endforeach
            </div>
              
          </div>
      </div>
  </div>
</div>

<!-- insert-d-know -->
<div id="modal-insert-d-know" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog" style="max-width:50%;">
    <form id="frm-insert-d-know">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title- font-weight-bold">
            <i class="fas fa-plus-circle"></i>
            เพิ่มข้อมูล D-Know
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">

          <h4 class="box-title font-weight-bold">หมวดหมู่/ประเภท</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-10">
            <div class="col-md-6">
              <label class="mb-0">
                หมวดหมู่ <span class="text-danger">*</span>
              </label>

              <select name="ddl_category" class="form-control">
                <option disabled selected>-- เลือกหมวดหมู่ --</option>
                @foreach ($d_know_category as $category)
                  <option value="{{ $category->id }}">
                    {{ $category->name }}
                  </option>
                @endforeach
              </select> 
            </div>

            <div class="col-md-6">
              <label class="mb-0">
                ประเภท <span class="text-danger">*</span>
              </label>

              <select name="ddl_type" class="form-control">
                <option disabled selected>-- เลือกประเภท --</option>
                @foreach ($d_know_type as $type)
                  <option value="{{ $type->id }}">
                    {{ $type->name_th }}
                  </option>
                @endforeach
              </select> 
            </div>
          </div>

          <h4 class="box-title font-weight-bold">D-Know</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-10">
            <div class="col-md-6">
              <label class="mb-0">
                ชื่อ <span class="text-danger">*</span>
              </label>

              <input type="text" name="txt_name" class="form-control" placeholder="ชื่อ"> 
            </div>
            <div class="col-md-6">
              <label class="mb-0">รายละเอียด</label>
              <input type="text" name="txt_detail" class="form-control" placeholder="รายละเอียด"> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                ลิงค์แบบทดสอบ <span class="text-danger">*</span>
              </label>

              <input type="url" name="txt_url_examination" class="form-control" placeholder="url">
              <span class="help-block">
                <small>
                  {{-- {{ url('url', ['type/555','cat/666']) }} --}}
                </small>
              </span>
            </div>
          </div>

          <h4 class="box-title font-weight-bold">แนบไฟล์</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">
                ไฟล์ <span class="text-danger">*</span>
              </label>

              <input type="file" name="file_d_know"accept="application/*,video/*" style="visibility: hidden; position:absolute;" class="file-upload-default">
              
              <div class="input-group col-xs-12">
                <input type="text" value="" class="form-control file-upload-info" placeholder="แนบไฟล์" disabled>
                <span class="input-group-append" >
                  {{-- <a id="a_file_name_pdca" href="" target="_blank" class="btn btn-outline-success " title="">
                    <i class="fa fa-file-pdf"></i>
                  </a> --}}

                  <button type="button" class="file-upload-browse btn btn-outline-primary" title="แนบไฟล์">
                    <i class="fa fa-paperclip"></i>
                  </button>
                </span>
              </div>
            </div>

            <div class="col-md-6">
              <label class="mb-0">
                รูป (สำหรับไฟล์ประเภทวิดีโอ)
              </label>

              <input type="file" name="image_video" accept="image/*" style="visibility: hidden; position:absolute;" class="file-upload-default">
              
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" placeholder="แนบรูป" disabled>
                <span class="input-group-append">
                  <button type="button" class="file-upload-browse btn btn-outline-primary" title="แนบไฟล์">
                    <i class="fa fa-paperclip"></i>
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-danger" data-dismiss="">
            <i class="fas fa-quidditch"></i>
            ล้าง
          </button>

          <button type="button" onclick="save_d_know('insert')" class="btn btn-success">
            <i class="far fa-save"></i>
            บันทึก
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- edit-d-know -->
<div id="modal-edit-d-know" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog" style="max-width:50%;">
    <form id="frm-edit-d-know">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title- font-weight-bold">
            <i class="fas fa-plus-circle"></i>
            แก้ไขข้อมูล D-Know
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="txt_id">

          <h4 class="box-title font-weight-bold">หมวดหมู่/ประเภท</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-10">
            <div class="col-md-6">
              <label class="mb-0">
                หมวดหมู่ <span class="text-danger">*</span>
              </label>

              <select name="ddl_category" class="form-control">
                <option disabled selected>-- เลือกหมวดหมู่ --</option>
                @foreach ($d_know_category as $category)
                  <option value="{{ $category->id }}">
                    {{ $category->name }}
                  </option>
                @endforeach
              </select> 
            </div>

            <div class="col-md-6">
              <label class="mb-0">
                ประเภท <span class="text-danger">*</span>
              </label>

              <select name="ddl_type" class="form-control">
                <option disabled selected>-- เลือกประเภท --</option>
                @foreach ($d_know_type as $type)
                  <option value="{{ $type->id }}">
                    {{ $type->name_th }}
                  </option>
                @endforeach
              </select> 
            </div>
          </div>

          <h4 class="box-title font-weight-bold">D-Know</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-10">
            <div class="col-md-6">
              <label class="mb-0">
                ชื่อ <span class="text-danger">*</span>
              </label>

              <input type="text" name="txt_name" class="form-control" placeholder="ชื่อ"> 
            </div>
            <div class="col-md-6">
              <label class="mb-0">รายละเอียด</label>
              <input type="text" name="txt_detail" class="form-control" placeholder="รายละเอียด"> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                ลิงค์แบบทดสอบ <span class="text-danger">*</span>
              </label>

              <input type="url" name="txt_url_examination" class="form-control" placeholder="url">
              <span class="help-block">
                <small>
                  {{-- {{ url('url', ['type/555','cat/666']) }} --}}
                </small>
              </span>
            </div>
          </div>

          <h4 class="box-title font-weight-bold">แนบไฟล์</h4>
          <hr class="m-t-0 m-b-10">
          <div class="row m-b-5">
            <div class="col-md-6">
              <label class="mb-0">
                ไฟล์ <span class="text-danger">*</span>
              </label>

              <input type="file" name="file_d_know" accept="application/*,video/*" style="visibility: hidden; position:absolute;" class="file-upload-default">
              
              <div class="input-group col-xs-12">
                <input type="text" name="txt_file_name" class="form-control file-upload-info" placeholder="แนบไฟล์" disabled>
                <span class="input-group-append" >
                  {{-- <a id="a_file_name_pdca" href="" target="_blank" class="btn btn-outline-success " title="">
                    <i class="fa fa-file-pdf"></i>
                  </a> --}}

                  <button type="button" class="file-upload-browse btn btn-outline-primary" title="แนบไฟล์">
                    <i class="fa fa-paperclip"></i>
                  </button>
                </span>
              </div>
            </div>

            <div class="col-md-6">
              <label class="mb-0">
                รูป (สำหรับไฟล์ประเภทวิดีโอ)
              </label>

              <input type="file" name="image_video" accept="image/*" style="visibility: hidden; position:absolute;" class="file-upload-default">
              
              <div class="input-group col-xs-12">
                <input type="text" name="txt_image_video" class="form-control file-upload-info" placeholder="แนบรูป" disabled>
                <span class="input-group-append">
                  <button type="button" class="file-upload-browse btn btn-outline-primary" title="แนบไฟล์">
                    <i class="fa fa-paperclip"></i>
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-danger" data-dismiss="">
            <i class="fas fa-quidditch"></i>
            ล้าง
          </button>

          <button type="button" onclick="save_d_know('edit')" class="btn btn-warning">
            <i class="far fa-save"></i>
            บันทึก
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script type="">
  var d_know_category = {!! json_encode($d_know_category) !!};
  var table_d_know = {};

  $( document ).ready(function() {
    // console.log('doc-ready');
    // get_data_table(1);

    $.each(d_know_category, function (index, value) { 
      let category_id = value.id;

      get_data_table(category_id);

      // edit_d_know
      $(`#tbl-d-know${category_id}`).on(`click`, `.btn-edit`, function () {
        let d_know = table_d_know[`table_d_know${category_id}`].row( $(this).parents(`tr`) ).data();
        console.log(d_know);

        $('#frm-edit-d-know input[name="txt_id"]').val(d_know.id);
        $('#frm-edit-d-know select[name="ddl_category"]').val(d_know.category_id);
        $('#frm-edit-d-know select[name="ddl_type"]').val(d_know.type_id);

        $('#frm-edit-d-know input[name="txt_name"]').val(d_know.name);
        $('#frm-edit-d-know input[name="txt_detail"]').val(d_know.detail);
        $('#frm-edit-d-know input[name="txt_url_examination"]').val(d_know.url_examination);

        
        $('#frm-edit-d-know input[name="txt_file_name"]').val(d_know.file);
        $('#frm-edit-d-know input[name="txt_image_video"]').val(d_know.image_video);
        
        $('#modal-edit-d-know').modal('show');
      });

      // delete_d_know
      $(`#tbl-d-know${category_id}`).on(`click`, `.btn-delete`, function () {
        let d_know = table_d_know[`table_d_know${category_id}`].row( $(this).parents(`tr`) ).data();
        // console.log(d_know);
        
        if(confirm(`ต้องการลบข้อมูลหรือไม่ ?${d_know.id}`)) {
          $.ajax({
            type: `post`,
            url: `{{ url('setting/delete/d-know') }}`,
            data: { d_know_id:d_know.id },
            // dataType: `dataType`,
            success: function (res) {
              console.log(res);
              alert(res.msg);

              table_d_know[`table_d_know${category_id}`].ajax.reload();
            }
          });
        }
      });
    });

    // file-upload
    $('.file-upload-browse').on('click', function() {
      var file = $(this).parent().parent().parent().find('.file-upload-default');
      file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

  });

  function get_data_table(category_id) {
    // console.log(category_id);
    table_d_know[`table_d_know${category_id}`] = $(`#tbl-d-know${category_id}`).DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      // ordering: true,
      order: [], //[ 1, false ]
      iDisplayLength: 10,
      aLengthMenu: [
        [10, 20, 50, -1], 
        [10, 20, 50, 'ทั้งหมด']
      ], 
      language: {
        // search: "" 
      },

      ajax: {
        type: `GET`,
        url: `{{ url('setting/get-d-know') }}`,
        data: function (d) {
          // console.log(d);
          d.category_id = category_id; // d.year = $('select[name=ddlYear]').val();
        },
      },
      columns: [
        { data:'id', className:'text-center', searchable:false, orderable:false },
        { data:'name' },
        { data:'type_name' },
        { data:'id', className:'text-center', searchable:false, orderable:false },
      ],
      columnDefs: [
        { 
          targets: 0,

          render: function (data, type, row, meta) {
            // console.log(meta);
            return (meta.row + meta.settings._iDisplayStart + 1);
          } 
        },

        {
          targets: -1,

          render: function (data, type, row, meta) {
            //url('setting/${data}/d-know')
            return `
              <button type="button" class="btn btn-sm btn-warning btn-edit" title="แก้ไขข้อมูล">
                <i class="fa fa-edit m-0"></i>
              </button>
              <button type="button" onclick="" class="btn btn-sm btn-danger btn-delete" title="ลบข้อมูล">
                <i class="fa fa-trash-alt"></i>
              </button>
            `;
          }
        }
      ],
    });
  }

  // insert / update
  function save_d_know(type) {
    if(type === 'insert') {
      let form_data = new FormData($('#frm-insert-d-know')[0]);
      let category_id = $('select[name="ddl_category"]').val();
      // form_data.append('kpi_type_id', kpi_type_id);
      // console.log(table_d_know,[`table_d_know${category_id}`],category_id);

      for(let [name, value] of form_data) {
        // console.log(`${name} = ${value}`);
        console.log(value);
      }
      // return false;
      
      $.ajax({
        type: `post`,
        url: `{{ url('setting/insert-d-know') }}`,
        data: form_data,
        dataType:'JSON',
        contentType: false,
        processData: false,
        success: function (res) {
          console.log(res);

          if(res.validate > 0){
            alert(res.msg.join( "\n"));

          } else {
            alert(res.msg);
            
            document.getElementById("frm-insert-d-know").reset(); // $('#frm-insert-d-know')[0].reset();

            if(table_d_know[`table_d_know${category_id}`]){
              table_d_know[`table_d_know${category_id}`].ajax.reload();
            }

            $('#modal-insert-d-know').modal('hide');
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
        },
      });
    }
    else if(type === 'edit') {
      let form_data = new FormData($('#frm-edit-d-know')[0]);
      let category_id = $('#frm-edit-d-know select[name="ddl_category"]').val();
      
      $.ajax({
        type: `post`,
        url: `{{ url('setting/update-d-know') }}`,
        data: form_data,
        dataType:'JSON',
        contentType: false,
        processData: false,
        success: function (res) {
          console.log(res);

          if(res.validate > 0){
            alert(res.msg.join( "\n"));

          } else {
            alert(res.msg);
            
            document.getElementById("frm-edit-d-know").reset(); // $('#frm-insert-d-know')[0].reset();

            if(table_d_know[`table_d_know${category_id}`]){
              table_d_know[`table_d_know${category_id}`].ajax.reload();
            }

            $('#modal-edit-d-know').modal('hide');
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
        },
      });
    }
  }
</script>
@endsection

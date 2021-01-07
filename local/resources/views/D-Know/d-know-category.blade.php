@extends('layouts.master')
@section('title', 'ตั้งค่า D-Know')


@section('style')

@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">
      ตั้งค่า D-Know Category
    </h4>
  </div>
  
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('d-know') }}">D-know Category</a>
        </li>
      </ol>

      <a href="#" data-toggle="modal" data-target="#modal-insert-category" class="btn btn-info d-none d-lg-block m-l-15">
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
            {{-- <button id="img1">img1</button>
            <button id="img2">img2</button>
            <button id="destroy">destroy</button>
            <input type="file" name="image" class="" accept="image/*" data-height="200"> --}}

            <table id="tbl-d-know-category" class="tbl-dconnect table-bordered table-striped">
              <thead class="text-center">
                <tr>
                  <th class="w-5">ลำดับ</th>
                  <th class="w-20">รูปภาพ</th>
                  <th class="w-40">ชื่อ</th>
                  <th class="w-">รายละเอียด</th>
                  <th class="w-15">ดำเนินการ</th>
                </tr>
              </thead>

              <tbody>

              </tbody>
            </table>
              
          </div>
      </div>
  </div>
</div>

<!-- insert-d-know-category -->
<div id="modal-insert-category" class="modal fade bs-example-modal-lg-">
  <div class="modal-dialog" style="max-width:50%;">
    <form id="frm-insert-category">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title- font-weight-bold">
            <i class="fas fa-plus-circle"></i>
            เพิ่มข้อมูล D-Know Category
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          
          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                ชื่อหมวดหมู่ <span class="text-danger">*</span>
              </label>

              <input type="text" name="txt_name" class="form-control" placeholder="ชื่อหมวดหมู่"> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                รายละเอียด <span class="text-danger">*</span>
              </label>

              <textarea name="txt_description" class="form-control" placeholder="รายละเอียด"></textarea>
            </div>
          </div>

          <div class="row m-b-5">
            <div class="col-md-12">
              <label class="mb-0">
                รูปภาพ <span class="text-danger">*</span>
              </label>

              <input type="file" name="file_image" class="dropify" accept="image/*" data-height="200">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-danger" data-dismiss="">
            <i class="fas fa-quidditch"></i>
            ล้าง
          </button>

          <button type="button" onclick="save_category('insert')" class="btn btn-success">
            <i class="far fa-save"></i>
            บันทึก
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- edit-d-know-category -->
<div id="modal-edit-category" class="modal fade">
  <div class="modal-dialog" style="max-width:50%;">
    <form id="frm-edit-category">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title- font-weight-bold">
            <i class="fas fa-plus-circle"></i>
            แก้ไขข้อมูล D-Know Category
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                ชื่อหมวดหมู่ <span class="text-danger">*</span>
              </label>

              <input type="hidden" name="txt_id"> 
              <input type="text" name="txt_name" class="form-control" placeholder="ชื่อหมวดหมู่"> 
            </div>
          </div>

          <div class="row m-b-10">
            <div class="col-md-12">
              <label class="mb-0">
                รายละเอียด <span class="text-danger">*</span>
              </label>

              <textarea name="txt_description" class="form-control" placeholder="รายละเอียด"></textarea>
            </div>
          </div>

          <div class="row m-b-5">
            <div class="col-md-12">
              <label class="mb-0">
                รูปภาพ <span class="text-danger">*</span>
              </label>
              <div id="clear_dropify">
                <input type="file" name="file_image" class="dropify" accept="image/*" data-height="200">
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-danger" data-dismiss="">
            <i class="fas fa-quidditch"></i>
            ล้าง
          </button>

          <button type="button" onclick="save_category('edit')" class="btn btn-warning">
            <i class="far fa-edit"></i>
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
  var table_d_know_category;
  $( document ).ready(function() {
    set_dropify(`.dropify`);
    // console.log('doc-ready');
    // get_data_table(1);
    get_data_table();
  });
  
  //test
  var dropify_;
  $('#img1').click(function (e) { 
    // $(`input[name="image"]`).data('dropify').clearElement();

    
    if(dropify_){
      console.log('has');
      $(`input[name="image"]`).dropify()
      .data('dropify')
      .clearElement();
    }

    dropify_ = $(`input[name="image"]`).dropify({
      defaultFile: `{{ url('assets/d-know/category/damaway.gif') }}`,
      messages: {
          default: 'ลากไฟล์มาวาง หรือคลิกที่นี่',
          replace: "Drag and drop or click to replace",
          remove: 'ลบ',
          error: "Ooops, มีบางอย่างผิดพลาด",
      },
      error: {
        fileSize: 'The file size is too big ( value max).',
        minWidth: 'The image width is too small ( value px min).',
        maxWidth: 'ความกว้างของรูปภาพ is too big (@{{ value } px max).',
        minHeight: 'ความสูงของรูปภาพ is too small (value px min).',
        maxHeight: 'ความสูงของรูปภาพ is too big (value px max).',
        imageFormat: 'The image format is not allowed (value เท่านั้น).',
        fileExtension: 'ไฟล์ is not allowed (@{value} เท่านั้น).',
      },
    });
  });

  
  $('#destroy').click(function (e) {
    $(`input[name="image"]`).dropify()
    .data('dropify')
    .clearElement();
  });
  //test*/

  function get_data_table() {
    table_d_know_category = $(`#tbl-d-know-category`).DataTable({
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
        url: `{{ url('setting/get-d-know-category') }}`,
        data: function (d) {
          // console.log(d);
        },
      },
      columns: [
        { data:'id', className:'text-center', searchable:false, orderable:false },
        { data:'image', className:'text-center' },
        { data:'name' },
        { data:'description' },
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
          targets: 1,

          render: function (data, type, row, meta) {
            return `
              <div class="row lightGallery img-report">
                <a href="{{ asset('assets/d-know/category/${data}') }}" class="image-tile col-sm-12 mx-auto mb-0" >
                
                  <img src="{{ asset('assets/d-know/category/${data}') }}" style="width:; height:50px;">
                </a>
              </div>
            `;
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

      initComplete: function(settings, json) {
        // console.log(settings, json);
        // alert($(`.img-report`).length);
        set_light_gallery(`.img-report`);
      }
    });
  }

  // edit_d_know
  $(`#tbl-d-know-category`).on(`click`, `.btn-edit`, function () {
    // alert('อยู่ระหว่างดำเนินการ'); return false;
    let category = table_d_know_category.row( $(this).parents(`tr`) ).data();
    // console.log(category);

    $('#frm-edit-category input[name="txt_id"]').val(category.id);

    $('#frm-edit-category input[name="txt_name"]').val(category.name);
    $('#frm-edit-category textarea[name="txt_description"]').val(category.description);

    $('#clear_dropify').html('');
    $('#clear_dropify').html('<input type="file" name="file_image" class="dropify" accept="image/*" data-height="200">');
    // $('#frm-edit-category input[name="file_image"]').attr(`data-default-file`, `{{ asset('assets/d-know/category/${category.image}') }}`);
    set_dropify(`#frm-edit-category input[name="file_image"]`, `{{ asset('assets/d-know/category/${category.image}') }}`);

    $('#modal-edit-category').modal('show');
  });
  
  // delete_d_know
  $(`#tbl-d-know-category`).on(`click`, `.btn-delete`, function () {
    alert('อยู่ระหว่างดำเนินการ'); return false;
    let category = table_d_know_category.row( $(this).parents(`tr`) ).data();
    console.log(category);
    
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

  function save_category(type) {
    if(type === 'insert') {
      let form_data = new FormData($('#frm-insert-category')[0]);

      // for(let [name, value] of form_data) {
      //   console.log(`${name} = ${value}`);
      //   // console.log(value);
      // }
      // return false;
      
      $.ajax({
        type: `post`,
        url: `{{ url('setting/insert-d-know-category') }}`,
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
            document.getElementById("frm-insert-category").reset(); // $('#frm-insert-d-know')[0].reset();
            
            if(table_d_know_category){
              table_d_know_category.ajax.reload();
            }

            $('#modal-insert-category').modal('hide');
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
        },
      });
    }

    else if(type === 'edit') {
      let form_data = new FormData($('#frm-edit-category')[0]);

      for(let [name, value] of form_data) {
        console.log(`${name} = ${value}`);
        // console.log(value);
      }
      // return false;
      
      $.ajax({
        type: `post`,
        url: `{{ url('setting/update-d-know-category') }}`,
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

            if(table_d_know_category){
              table_d_know_category.ajax.reload();
            }

            $('#modal-edit-category').modal('hide');
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

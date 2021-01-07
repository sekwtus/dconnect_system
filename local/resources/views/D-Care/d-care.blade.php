@extends('layouts.master')
@section('title', 'D-Care')

@section('style')
  <style type="media">
    
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">D-Care</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">D-Care</li>
      </ol>

      <a href="#" data-toggle="modal" data-target="#modal-insert-d-care" class="btn btn- btn-info d-none d-lg-block m-l-15">
        <i class="fa fa-plus-circle"></i>
        Create New
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <!-- Nav tabs -->
        @php
          $arr_type_d_care = [
            [
              'id'=>1,
              'name'=>'active'
            ],
            [
              'id'=>2,
              'name'=>'archived'
            ]
          ];

          $d_care_type = json_encode($arr_type_d_care);
          $d_care_type = json_decode($d_care_type); //return $employee;
        @endphp

            
        
        <ul class="nav nav-tabs customtab" role="tablist">
          
          @foreach ($d_care_status as $status)
            <li class="nav-item">
              <a class="nav-link{{ $status->id=='1' ?' active' :'' }}" onclick="get_data_table('{{ $status->id }}')" data-toggle="tab" href="#tab-d-care-{{ $status->id }}" role="tab">
                <span class="hidden-sm-up">
                  <i class="ti-home"></i>
                </span>

                <span class="hidden-xs-down">
                  {{ $status->name }}
                </span>
              </a>
            </li>
          @endforeach
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          @foreach ($d_care_status as $status)
            <div class="tab-pane{{ $status->id=='1' ?' active' :'' }}" id="tab-d-care-{{ $status->id }}" role="tabpanel">
              <table id="tbl-d-care-{{ $status->id }}" class="tbl-dconnect table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th class="w-20">Function</th>
                    <th class="w-20">Name</th>
                    <th class="w-10">Version</th>
                    <th class="w-15">Date</th>
                    <th class="w-15">Create by</th>
                    <th class="w-20">Action</th>
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

<!-- insert-d-care -->
<div id="modal-insert-d-care" class="modal fade bs-example-modal-lg">
  <div class="modal-dialog modal-sm" style="max-width:%;">
    <form id="frm-insert-d-care">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title- font-weight-bold">
            <i class="fas fa-plus-circle"></i>
            Select Layout
          </h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          
          <div class="row m-b-">
            @foreach ($d_care_layout as $layout)
              <div class="col-md-12 m-t-10">
                <a href="{{ url('create/d-care?layout_id='.$layout->id) }}" class="btn btn-lg btn-block btn-success">
                  <i class="far fa-save"></i>
                  {{ $layout->name }}
                </a>
              </div>
            @endforeach
          </div>
        </div>

        <div class="modal-footer">

        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  var d_care_status = {!! json_encode($d_care_status) !!};
  var table_d_care = {};

  $(document).ready(function () {
    // set_select2
    set_select2(`ddl_function`, `empty`);
    set_select2(`ddl_layout`, `empty`);
    //set_touchspin
    set_touchspin(`txt_version`);
    //set_datepicker
    set_datepicker(`txt_date`);

    get_data_table(1);
  });

  $.each(d_care_status, function (index, value) {
    let status = value.id;
    let status_name = value.name;

    if(status == 1) {
      // share - status template active
      $(`#tbl-d-care-1`).on(`click`, `.btn-share`, function () {
        let template_header = table_d_care[`table_d_care_${status}`].row( $(this).parents(`tr`) ).data();
        // alert(`อยู่หน้า Active เพื่อSharing Check List : Link หรือสร้าง QR Code ${status}:${status_name}`);
        alert('อยู่ระหว่างดำเนินการ');
      });
    }
    else {
      // restore - status template archived
      $(`#tbl-d-care-2`).on(`click`, `.btn-restore`, function () {
        let template_header = table_d_care[`table_d_care_${status}`].row( $(this).parents(`tr`) ).data();
        // console.log(template_header);
        if (confirm('ต้องการ Restore Template หรือไม่ ?')) {
          $.ajax({
            type: `post`,
            url: `{{ url('delete-d-care') }}`,
            data: { template: template_header, restore: true },
            
            success: function (res) {
              console.log(res);
              alert(res.msg);

              if(table_d_care[`table_d_care_${status}`]){
                table_d_care[`table_d_care_${status}`].ajax.reload();
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
            },
          });
        }
      });
    }

    // edit
    $(`#tbl-d-care-${status}`).on(`click`, `.btn-edit`, function () {
      let gemba = table_d_care[`table_d_care_${status}`].row( $(this).parents(`tr`) ).data();
      // alert(`เลือกเพื่อแก้ไข Template (Slide7) ${status}:${status_name}`);
      // if (confirm(`ต้องการแก้ไข Template หรือไม่ ?`)) {
      // }
    });

    // delete ลบ Template or เก็บ Template
    $(`#tbl-d-care-${status}`).on(`click`, `.btn-delete`, function () {
      let template_header = table_d_care[`table_d_care_${status}`].row( $(this).parents(`tr`) ).data();
      // console.log(template_header);
      if (confirm(`ต้องการ${status==1 ?'เก็บ Template' :'ลบ Template'} หรือไม่ ?`)) {
        $.ajax({
          type: `post`,
          url: `{{ url('delete-d-care') }}`,
          data: { template: template_header },
          
          success: function (res) {
            console.log(res);
            alert(res.msg);

            if(table_d_care[`table_d_care_${status}`]){
              table_d_care[`table_d_care_${status}`].ajax.reload();
            }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
          },
        });
      }
      // if(status_name == `active`) {
      //   alert(`หน้า Active เลือกเพื่อลบไปอยู่ Archived${status}:${status_name}`);
      // } else {
      //   alert(`หน้า Archived เพื่อลบ Template/Report${status}:${status_name}`);
      // }
    });
  });
  
  function get_data_table(status) {
    // console.log(status);
    table_d_care[`table_d_care_${status}`] = $(`#tbl-d-care-${status}`).DataTable({
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
        // search: '',
      },
      
      ajax: {
        type: `GET`,
        url: `{{ url('get-d-care') }}`,
        data: function (d) {
          // console.log(d);
          d.status = status;
        },
      },
      columns: [
        { data:'function_name' },
        { data:'template_name' },
        { data:'version', className:'text-center'},
        { data:'effective_date', className:'text-center' },
        { data:'create_by' },
        { data:'id', className:'text-center', searchable:false, orderable:false },
      ],
      columnDefs: [
        // { 
        //   targets: 0,
        //   render: function (data, type, row, meta) {
        //     return (meta.row + meta.settings._iDisplayStart + 1);
        //   } 
        // },

        {
          targets: -1,

          render: function (data, type, row, meta) {
            if(status == 1) {
              // status template active
              icon = `far fa-share-square`;
              button = `btn-share`;
              
              button_insert_data = `<a href="{{ url('index/d-care?template_id=${data}') }}" onclick="return confirm('ต้องการใช้ Template นี้ หรือไม่ ?')" class="btn btn-sm btn-primary" title="">
                <i class="fa fa-pen m-0"></i>
              </a>`;

            } else {
              // status template archived
              icon = 'fa fa-undo';
              button = 'btn-restore';
              button_insert_data = ``;
            }
            // console.log(status);
            return `<div>${row.layout_name} ${row.user_name}</div>
              ${button_insert_data}

              <a href="{{ url('report/d-care?template_id=${data}') }}" class="btn btn-sm btn-info btn-report" title="">
                <i class="far fa-file-alt m-0"></i>
              </a>

              <button type="button" class="btn btn-sm btn-success ${button}" title="">
                <i class="far ${icon} m-0"></i>
              </button>

              <a href="{{ url('edit/d-care?template_id=${data}') }}" onclick="return confirm('ต้องการแก้ไข Template หรือไม่ ?')" class="btn btn-sm btn-warning btn-edit" title="แก้ไขข้อมูล">
                <i class="far fa-edit m-0"></i>
              </a>

              <button type="button" onclick="" class="btn btn-sm btn-danger btn-delete" title="ลบข้อมูล">
                <i class="far fa-trash-alt m-0"></i>
              </button>
            `;
          }
        }
      ],
      
    });
  }
</script>
@endsection
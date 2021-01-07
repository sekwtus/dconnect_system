@extends('layouts.master')
@section('title', 'D-Care : Report')

@section('style')
  <style type="media">
    
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold"> {{ $d_care_layout->name }} Report</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">D-Care</a>
        </li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">
          {{ $template_header->name }}
        </h4>
      </div>

      <div class="card-body">
        <a href="{{ url('chart/d-care?template_id='.$template_header->id) }}" id="btn-chart" onclick="chart()" class="btn btn-secondary">
          <i class="fa fa-chart"></i>
          Chart
        </a>

        <table id="tbl-d-care-report" class="tbl-dconnect table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th class="w-10">Date</th>
              <th class="w-10">Small Group</th>
              <th class="w-5">Area</th>
              <th class="w-">Requirement</th>
              <th class="w-15">Comment</th>
              <th class="w-15">Finding</th>
              <th class="w-10">Actions</th>
              <th class="w-15">Auditor Name</th>
              <th class="w-15">Status</th>
            </tr>
          </thead>

          <tbody>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  var table_d_care_report;
  $(document).ready(function () {
    get_data_table();
  });

  // delete ลบ 
  $(`#tbl-d-care-report`).on(`click`, `.btn-delete`, function () {
    let d_care_report = table_d_care_report.row( $(this).parents(`tr`) ).data();
    // console.log(template_header);
    // alert('อยู่ระหว่างดำเนินการ'); return false;

    if (confirm(`ต้องการลบข้อมูลหรือไม่ ?`)) {
      $.ajax({
        type: `post`,
        url: `{{ url('delete-d-care-data') }}`,
        data: { d_care_report: d_care_report },
        
        success: function (res) {
          console.log(res);
          alert(res.msg);
          
          table_d_care_report.ajax.reload();
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
  
  function get_data_table() {
    // console.log(status);
    table_d_care_report = $(`#tbl-d-care-report`).DataTable({
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
        url: `{{ url('get-d-care-report') }}`,
        data: function (d) {
          // console.log(d);
          d.header_id = `{{ $template_header->id }}`;
        },
      },
      columns: [
        { data:'create_date', className:'text-center' },
        { data:'small_group_name' },
        { data:'area_name' },
        { data:'requirement' },
        { data:'comment', className:'text-center', orderable:false },
        { data:'file', className:'text-center', orderable:false },
        { data:'action', className:'text-center', orderable:false },
        { data:'auditor_name' },
        { data:'id', className:'text-center', searchable:false, orderable:false },
      ],
      columnDefs: [
        {
          targets: 5,
          render: function (data, type, row, meta) {
           
            // console.log(status);
            return `
              <div class="row lightGallery img-report">
                <a href="{{ asset('assets/d-care/${data}') }}" class="image-tile col-sm-12 mx-auto mb-0" >
                
                  <img src="{{ asset('assets/d-care/${data}') }}" style="width:; height:100px;">
                </a>
              </div>
            `;
          }
        },

        {
          targets: -1,
          render: function (data, type, row, meta) {

            if(row.status_p) {
              var button_p = 'btn-success';
            } else {
              var button_p = 'btn-danger';
            }

            if(row.status_d) {
              var button_d = 'btn-success';
            } else {
              var button_d = 'btn-danger';
            }

            if(row.status_c) {
              var button_c = 'btn-success';
            } else {
              var button_c = 'btn-danger';
            }

            if(row.status_a) {
              var button_a = 'btn-success';
            } else {
              var button_a = 'btn-danger';
            }

            return `
              <div class="btn-group">
                <button class="btn btn-sm ${button_p}">P</button>
                <button class="btn btn-sm ${button_d}">D</button>
                <button class="btn btn-sm ${button_c}">C</button>
                <button class="btn btn-sm ${button_a}">A</button>
              </div>

              <div class="m-t-10">
                <a href="{!! url('index/d-care?template_id=${row.header_id}&report_id=${row.id}') !!}" onclick="return confirm('ต้องการแก้ไขข้อมูลหรือไม่ ?')" class="btn btn-sm btn-warning btn-edit" title="แก้ไขข้อมูล">
                  <i class="far fa-edit m-0"></i>
                </a>

                <button type="button" onclick="alert('อยู่ระหว่างดำเนินการ')" class="btn btn-sm btn-success" title="">
                  <i class="fa fa-share-square m-0"></i>
                </button>

                <button type="button" class="btn btn-sm btn-danger btn-delete" title="">
                  <i class="far fa-trash-alt m-0"></i>
                </button>
              </div>
            `;
          }
        }
      ],

      initComplete: function(settings, json) {
        console.log(settings, json);
        // alert($(`.img-report`).length);
        set_light_gallery(`.img-report`);
      }
      
    });

    table_d_care_report.on( 'search.dt', function () {
      console.log( 'search: '+table_d_care_report.search() );
      $(`#btn-chart`).attr(`onclick`, `chart('${table_d_care_report.search()}')`);
    });
  }

  function chart(param=null) {
    if(param!=null && param!=''){
      alert( `{!! url('chart/d-care?query_string=${param}') !!}` );
    }
    // else if(param=='') {
    //   alert( `{!! url('chart/d-care') !!}` );
    // }
    else {
      alert( `{!! url('chart/d-care') !!}` );
    }
  }
</script>
@endsection
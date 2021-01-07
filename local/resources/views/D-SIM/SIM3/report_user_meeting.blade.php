@extends('layouts.master')
@section('title', 'Order')

@section('title', 'D-Link')

@section('style')
@endsection

@section('main')
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card">
            <div class="card-body">
                <div class="row"> 
                    <div class="col-md-4">
                        <h4 class="card-title">SIM 3</h4>
                        <h6 class="card-subtitle">รายงานผู้เข้าร่วมประชุมประจำวัน</h6>
                    </div>
                    
                    <div class="col-md-5"></div>

                    <div class="col-md-2">
                        <input class="form-control input-daterange-datepicker" type="text" id="date_today" name="date_today" style="padding: 0px; height: 30px;"/>
                    </div>

                    <div class="col-md-1">
                        <input type="button" class="btn btn-success" value="ค้นหา" id="date_specify" onclick="date_specify()">
                    </div>
                </div>
                
                <table class="tbl-dconnect table-bordered table-striped" id="order_table">
                    <thead class="text-center">
                        <tr>
                            <th width="25%">ชื่อ</th>
                            <th width="25%">แผนก</th>
                            <th width="25%">สถานะ</th>
                            <th width="25%">วัน เวลาที่บันทึก</th>
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
<script>
    $( document ).ready(function() {
        date_specify();
    });

    function date_specify(){
        var date_spec = $('#date_today').val();
        // $('.ajax-loader').css("visibility", "visible");
        datatable(date_spec);
    }
</script>


<script>
    function datatable(date_spec){
        var table =  $('#order_table').DataTable( {
            destroy: true,
            lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
            // dom: 'lBfrtip',
            "scrollX": false,
            orderCellsTop: true,
            fixedHeader: true,
            // processing: true,
            // serverSide: true,
            ajax: {
                url: '{{ url('/sim3/report_user_meeting/getAjax') }}',
                data: {date_spec:date_spec},
                complete: function(){
                    // $('.ajax-loader').css("visibility", "hidden");
                },
                error: function(){
                    // $('.ajax-loader').css("visibility", "hidden");
                },
            },
            columns: [
                { data: 'name', className:'text-center' },
                { data: 'department_name', className:'text-center ' },
                { data: 'save_date', className:'text-center' },
                { data: 'created_at',className:'text-center' },
            ],
            columnDefs: [
                {
                    targets: 0,
                },

                {
                    targets: 1,
                },

                {
                    targets: 2,render(data){
                        if (data) {
                            return '<i class="fa fa-check" style="color:#008040;"> </i>';
                        } else {
                            return '<i class="fa fa-times" style="color:#ff6666;"> </i>';
                        }
                    }
                },

                {
                    targets: 3,
                },
               
            ],
            "order": [],
        });
        // table.on( 'order.dt search.dt', function () {
        //     table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //         cell.innerHTML = i+1;
        //     } );
        // } ).draw();
    }

</script>

{{-- daterange --}}
<script type="text/javascript" src="{{asset('/assets/dist/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/dist/js/daterangepicker.min.js')}}"></script>
<script>
    $('#date_today').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        singleDatePicker: true,
        todayBtn: true,
        // timePicker: true,
        // timePicker24Hour: true,
        language: 'th',
        thaiyear: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek : [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                        ],
            monthNames : [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                        ],
            firstDay : 0
        }
    });
</script>

@endsection

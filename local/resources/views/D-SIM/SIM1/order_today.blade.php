@extends('layouts.master')
@section('title', 'Order')

@section('title', 'D-Link')

@section('style')
    <link href="assets/node_modules/css-chart/css-chart.css" rel="stylesheet">
@endsection

@section('main')
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card">
            <div class="card-body">
                <div class="row"> 
                    <div class="col-md-4">
                        <h4 class="card-title">Order Today</h4>
                        <h6 class="card-subtitle">แสดง Order วันนี้ในแต่ละไลน์ผลิต</h6>
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
                            <th width="15%">action</th>
                            <th width="5%">LINE</th>
                            <th width="%">Production order</th>
                            <th width="%">description</th>
                            <th width="%">quantity</th>
                            <th width="%">เวลากำหนดเริ่ม</th>
                            <th width="%">เวลาเริ่ม</th>
                            <th width="%">เวลาเสร็จ</th>
                            <th width="%">batch</th>
                            <th width="%">expire</th>
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
                url: '{{ url('/order_today/getAjax') }}',
                data: {date_spec:date_spec},
                complete: function(){
                    // $('.ajax-loader').css("visibility", "hidden");
                },
                error: function(){
                    // $('.ajax-loader').css("visibility", "hidden");
                },
            },
            columns: [
                { data: 'production_order', className:'text-center' },
                { data: 'line_number', className:'text-center ' },
                { data: 'production_order', className:'text-center' },
                { data: 'material_description' },
                { data: 'quantity_to_make', className:'text-right' },
                { data: 'basic_start_date', className:'text-center' },
                { data: 'scheduled_start', className:'text-center' },
                { data: 'scheduled_end', className:'text-center' },
                { data: 'batch', className:'text-center'},
                { data: 'expiry_date', className:'text-center' },
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    orderable: false,
                    render(data,type,row){
                        // (line ${row['line_number']})
                        // if ('{{ Auth::user()->id_type_user }}' == 3 ) {
                        //     return `<a href="{{ url('D-SIM/SIM1/report') }}" class="btn btn-outline-info font-weight-bold">
                        //             REPORT
                        //         </a>`;
                        // }else if('{{ Auth::user()->id_type_user }}' == 1 ){
                        //     return `<a href="{{ url('D-SIM/SIM1/report') }}" class="btn btn-outline-info font-weight-bold">
                        //             REPORT
                        //         </a>
                        //         <a href="{{ url('D-SIM/SIM1/order/${data}') }}" class="btn btn-outline-success font-weight-bold" title="เลือกเอกสาร">
                        //             บันทึกเวลาสูญเสีย
                        //         </a>`;

                        // } else {
                            return `<a href="{{ url('D-SIM/SIM1/order/${data}') }}" class="btn btn-outline-success font-weight-bold" title="เลือกเอกสาร">
                                    บันทึกเวลาสูญเสีย
                                </a>`;
                        // }
                      
                    }
                },

                {
                    targets: 1,
                    render(data,type,row){
                        return `<b class="font-weight-bold">${data}</b>`;
                    }
                },

                {
                    targets: 2,
                    render(data,type,row){
                        return `<b class="font-weight-bold">${data}</b>`;
                    }
                },

                {
                    targets: 4,
                    render(data,type,row){
                        return data +' '+row['unit_of_measure'];
                    }
                },
                {
                    targets: 5,
                    render(data,type,row){
                        var time = row['basic_start_time'];
                        return data.substr(6,2) + '/' + data.substr(4,2) + '/' + data.substr(0,4) + '   ' + 
                        time.substr(0,2) + ':' + time.substr(2,2) + ':' + time.substr(4,2) ;
                    }
                },
                {
                    targets: 6,
                    render(data,type,row){
                        var time = row['scheduled_time'];
                        return data.substr(6,2) + '/' + data.substr(4,2) + '/' + data.substr(0,4) + '   ' + 
                        time.substr(0,2) + ':' + time.substr(2,2) + ':' + time.substr(4,2) ;
                    }
                },
                {
                    targets: 7,
                    render(data,type,row){
                        var time = row['scheduled_end_time'];
                        return data.substr(6,2) + '/' + data.substr(4,2) + '/' + data.substr(0,4) + '   ' + 
                        time.substr(0,2) + ':' + time.substr(2,2) + ':' + time.substr(4,2) ;
                    }
                },
                
                {
                    "targets": 8,
                    render(data,type,row){
                        // var time = row['scheduled_end_time'];
                        return data;
                    }
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

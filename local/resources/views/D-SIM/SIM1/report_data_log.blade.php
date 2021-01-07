@extends('layouts.master')
@section('title', 'Order')

@section('title', 'D-Link')

@section('style')
    {{-- <link href="assets/node_modules/css-chart/css-chart.css" rel="stylesheet"> --}}
@endsection

@section('main')
<div class="row mt-3">
    <div class="col-md-12 px-0">
        <div class="card">
            <div class="card-body">
                <div class="row"> 
                    <div class="col-md-4">
                        <h4 class="card-title">รายงานเวลาสูญเสียจากการบรรจุ</h4>
                        {{-- <h6 class="card-subtitle">แสดง Order วันนี้ในแต่ละไลน์ผลิต</h6> --}}
                    </div>
                    
                    <div class="col-md-3"></div>

                    <div class="input-group col-md-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">line</span>
                        </div>
                        <select class="select2 form-control custom-select" id="line_number" name="line" style="width: 100%; height:36px;">
                            <option value="0">ALL</option>
                          @foreach ($line as $line_)
                            <option value="{{ $line_->line_number }}">{{ $line_->line_number }}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="input-group col-md-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">วันที่</span>
                        </div>
                        <input class="form-control input-daterange-datepicker text-center" type="text" id="date_today" name="date_today" style="padding: 0px; height: 30px;"/>
                    </div>

                    <div class="col-md-1">
                        <input type="button" class="btn btn-success" value="ค้นหา" id="date_specify" onclick="date_specify()">
                    </div>
                </div><br>

            <div id="chart_div">
                <canvas id="chart1" height="50"></canvas>
            </div>
                
                <table class="tbl-dconnect table-bordered table-striped" id="order_table">
                    <thead class="text-center">
                        <tr>
                            <th width="15%">production order</th>
                            <th width="5%">LINE</th>
                            <th width="5%">แผนก</th>
                            <th width="%">หัวข้อ</th>
                            <th width="%">สาเหตุ</th>
                            <th width="%">คำอธิบาย</th>
                            <th width="10%">ช่วงเวลา</th>
                            <th width="10%">เวลาสูญเสีย (นาที)</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="text-right">Total:</th>
                            <th></th>
                        </tr>
                    </tfoot>
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
        $('#chart_div').html('<canvas id="chart1" height="50"></canvas>');
        var date_spec = $('#date_today').val();
        var line_number = $('#line_number').val();
        
        // $('.ajax-loader').css("visibility", "visible");
        datatable(date_spec,line_number);
        getChart(date_spec,line_number);
    }
</script>

<script>
    function datatable(date_spec,line_number){
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
                url: '{{ url('/D-SIM/SIM1/get_sim1_data_log') }}',
                data: {date_spec:date_spec,line_number:line_number},
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
                { data: 'type_branch', className:'text-center' },
                { data: 'topic' , className:'text-center'},
                { data: 'detail', className:'text-center' },
                { data: 'description', className:'text-center' },
                { data: 'period', className:'text-center' },
                { data: 'lose_time', className:'text-center' },
            ],
            columnDefs: [
                

            ],
            "order": [],
            fnInitComplete: function ( row, data, start, end, display ) {
                var api = this.api(), data;
    
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
    
                // Total over all pages
                // total = api
                //     .column( 4 )
                //     .data()
                //     .reduce( function (a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0 );
    
                // Total over this page
                pageTotal = api
                    .column( 7, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
    
                // Update footer
                $( api.column( 7 ).footer() ).html(pageTotal);
            },
            
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

<script>
    function getChart(date_spec,line_number){
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ url('/D-SIM/SIM1/get_data_chart') }}',
            data: {date_spec:date_spec,line_number:line_number},
            beforeSend: function(){
            },
            success: function (data) {
                var chart_data_sim1 =  new Chart(document.getElementById("chart1"),{
                        "type":"line",
                        "data":{"labels":data[0],
                        "datasets":[{
                                        "label":"",
                                        "data":data[1],
                                        "fill":false,
                                        "borderColor":'#ec717a',
                                        "lineTension":0.1
                                    }]
                        },
                        "options": {
                            legend:{
                            display: false,
                            },
                            responsive: true,
                            title: {
                            display: false,
                            text: 'Trend'
                            },
                            chartArea: {
                            backgroundColor: 'rgba(251, 85, 85, 0.4)', // color main bg
                            },
                            scales: {
                            xAxes: [{
                                scaleLabel: {
                                display: false,
                                labelString: 'แผนก',
                                fontColor: '#000',
                                },
                                ticks: {
                                fontColor: '#000', // สี label แกน X
                                },
                            }],
                            yAxes: [{
                                scaleLabel: {
                                display: false,
                                labelString: 'OE',
                                fontColor: '#000',
                                },
                                ticks: {
                                beginAtZero: true,
                                // min: value.min_value,
                                // max: value.max_value,
                                fontColor: '#000', // สี label แกน Y
                                // stepSize: value.step_size,
                            
                                },
                                gridLines: { // สี bg ของ chart
                                drawOnChartArea: true,
                                backgroundColorRepeat: true,
                                backgroundColor: [
                                    // 'green',
                                    // 'green',
                                    // 'rgb(255,0,0, 0.9)',
                                    // 'rgb(255,0,0, 0.9)',
                                ],
                                },
                            }],
                            }
                        },
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });


    
    }
</script>

@endsection

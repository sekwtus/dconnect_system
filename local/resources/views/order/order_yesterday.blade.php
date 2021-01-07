@extends('layouts.master')
@section('title', 'Order')

@section('title', 'D-Link')

@section('style')
    <link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/pages/progressbar-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">

@endsection

@section('main')
{{-- <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">D-Link</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">D-Link</a></li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </div>
    </div>
</div> --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Order Yesterday</h4>
            <h6 class="card-subtitle">แสดง Order เมื่อวานในแต่ละไลน์ผลิต</h6>
            <div class="table-responsive">
                <table class="table table-striped" id="order_table">
                    <thead>
                        <tr>
                            <th>Production order</th>
                            <th>Order type</th>
                            <th>unit of measure</th>
                            {{-- <th>Resource</th>
                            <th>operation number</th> --}}
                            <th width="10%">quantity</th>
                            <th width="10%">เวลากำหนดเริ่ม</th>
                            <th width="10%">เวลาเริ่ม</th>
                            <th width="10%">เวลาเสร็จ</th>
                            <th width="10%">batch</th>
                            <th width="7%">expire</th>
                            <th width="5%">status</th>
                            <th width="10%">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_order as $order)
                        <tr>
                            <td>{{ $order->production_order }}</td>
                            <td>{{ $order->order_type }}</td>
                            <td>{{ $order->unit_of_measure }}</td>
                            {{-- <td>{{ $order->resource }}</td>
                            <td>{{ $order->operation_number }}</td> --}}
                            <td>{{ $order->quantity_to_make }}  {{ $order->unit_of_measure }}</td>
                            <td>
                                {{ substr($order->basic_start_date,6,2).'/'.substr($order->basic_start_date,4,2).'/'.substr($order->basic_start_date,0,4) }}
                                {{ substr($order->basic_start_time,0,2).':'.substr($order->basic_start_time,2,2).':'.substr($order->basic_start_time,4,2) }}
                            </td>
                            <td>
                                {{ substr($order->scheduled_start,6,2).'/'.substr($order->scheduled_start,4,2).'/'.substr($order->scheduled_start,0,4) }}
                                {{ substr($order->scheduled_time,0,2).':'.substr($order->scheduled_time,2,2).':'.substr($order->scheduled_time,4,2) }}
                            </td>
                            <td>
                                {{ substr($order->scheduled_end,6,2).'/'.substr($order->scheduled_end,4,2).'/'.substr($order->scheduled_end,0,4) }}
                                {{ substr($order->scheduled_end_time,0,2).':'.substr($order->scheduled_end_time,2,2).':'.substr($order->scheduled_end_time,4,2) }}
                            </td>
                            <td>{{ $order->batch }}</td>
                            <td>
                                {{ substr($order->expiry_date,6,2).'/'.substr($order->expiry_date,4,2).'/'.substr($order->expiry_date,0,4) }}
                            </td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="printer_monitor/{{ $order->production_order }}" >
                                    <button type="button" class="btn waves-effect waves-light btn-outline-success">
                                        &nbsp;&nbsp;&nbsp;LINE&nbsp;&nbsp;&nbsp;
                                    </button>
                                </a>
                                <a href="report/{{ $order->production_order }}">
                                    <button type="button" class="btn waves-effect waves-light btn-outline-info">
                                        REPORT
                                    </button>
                                </a>
                            </td>

                            {{-- <td class="text-nowrap">
                                <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#order_table').DataTable( {
        } );
    } );
</script>

<script>
    // var table = $('#order_table').DataTable({
    //         destroy: true,
    //         dom: 'lfrtip',
    //         // buttons: [
    //         //     'print'
    //         // ],
    //         lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
    //         "scrollX": false,
    //         orderCellsTop: true,
    //         fixedHeader: true,
    //         rowReorder: true,
    //         // processing: true,
    //         // serverSide: true,
    //         "order": [],
    //     });
</script>
@endsection

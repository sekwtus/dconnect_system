@extends('layouts.master')

@section('style')
<link href="{{ asset('assets/dist/css/pages/float-chart.css')}}" rel="stylesheet">
@endsection

@section('main')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Flot Chart</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Flot Chart</li>
                </ol>
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Real Chart</h4>
                    <div class="demo-container" style="height:400px;">
                        <div id="placeholder" class="flot-chart-content"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Line Chart</h4>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-line-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pie Chart</h4>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-pie-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Moving Line Chart Example</h4>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-line-chart-moving"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar Chart</h4>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales Bar Chart</h4>
                    <div class="flot-chart">
                        <div class="sales-bars-chart" style="height: 320px;"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
@endsection

@section('script')

    <script src="{{ asset('assets/node_modules/flot/excanvas.js')}}"></script>
    <script src="{{ asset('assets/node_modules/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('assets/node_modules/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('assets/node_modules/flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('assets/node_modules/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('assets/node_modules/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ asset('assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('dist/js/pages/flot-data.js')}}"></script>
@endsection

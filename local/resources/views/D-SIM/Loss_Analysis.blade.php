@extends('layouts.master')



@section('main')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Loss Analisys</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Line Overview</a></li>
                <li class="breadcrumb-item active">Status</li>
            </ol>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
              <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Speed zone</h4>
                        <div id="radar-chart" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
              <!-- column -->
             <!-- column -->
             <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Planned Down Time</h4>
                        <div id="doughnut-chart" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->


        </div>



    </div>
</div>



{{-- <script src="../assets/node_modules/echarts/echarts-all.js"></script>
<script src="../assets/node_modules/echarts/echarts-init.js"></script> --}}
<script src="../../../../assets/node_modules/echarts/echarts-all.js"></script>
<script src="../../../../assets/node_modules/echarts/echarts-init.js"></script>
@endsection



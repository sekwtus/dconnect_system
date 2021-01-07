@extends('layouts.master')

@section('style')
<link href="{{asset('dist/css/style.min.css') }}" rel="stylesheet">
@endsection

@section('main')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">DReacord</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">OE</a></li>
                <li class="breadcrumb-item active">DReacord</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <a href="#">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-1 col-lg-1 text-center">
                            <a href="app-contact-detail.html">
                                <img src="{{ asset('/assets/images/users/1.jpg') }}" width="150" alt="user"
                                    class="img-fluid"></a>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <h3 class="box-title m-b-0">PRODUCTION LINE 1</h3>
                            <h4>Runing...</h4>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="ma-0" id="chart" style="width:100%; height:220px;"></div>
                                </div>

                                <div class="col-md-4 col-lg-4">
                                    <div class="ma-0" id="chart2" style="width:100%; height:220px;"></div>
                                </div>

                                <div class="col-md-4 col-lg-4 pa-0">
                                    <div class="ma-0" id="chart3" style="width:100%; height:220px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-white bg-info">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            DATE: 27.26.20
                        </div>
                        <div class="col-lg-2 col-md-2">
                            PRODUCT NAME: Hi-Q1+HA
                        </div>
                        <div class="col-lg-4 col-md-4 text-center">
                            PRODUCT ORDER LINE: 10394169
                        </div>
                        <div class="col-lg-2 col-md-2 text-right">
                            BATCH: 26.06.20
                        </div>
                        <div class="col-lg-2 col-md-2 text-right">
                            SIZE: 600g
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
@endsection

@section('script')

<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="{{ asset('assets/node_modules/echarts/echarts-all.js') }}"></script>

<script>
    var mychart = document.getElementById('chart');
    gChart = echarts.init(mychart);
    var option = {
        tooltip : {
            formatter: "{a} <br/>{b} : {c}%"
        },
        toolbox: {
            show : true,
            feature : {
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },

        series : [
            {
                name:'Speed',
                type:'gauge',
                detail : {formatter:'{value}%'},
                data:[{value: 50}],
                axisLine: {
                    lineStyle: {
                        color: [[0.2, '#55ce63'],[0.8, '#009efb'],[1, '#f62d51']], 
                        
                    }
                },
                
            }
        ]
    };
    //Add this to have the data changed every two seconds
    setInterval(function () {
        option.series[0].data[0].value = (Math.random() * 100).toFixed(2) - 0;
        gChart.setOption(option, true);
    },2000);

    // use configuration item and data specified to show chart
    gChart.setOption(option, true), $(function() {
        function resize() {
            setTimeout(function() {
                gChart.resize()
            }, 100)
        }
        $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
    });
</script>

<script>
    var mychart2 = document.getElementById('chart2');
    gChart2 = echarts.init(mychart2);
    var option2 = {
        tooltip : {
            formatter: "{a} <br/>{b} : {c}%"
        },
        toolbox: {
            show : true,
            feature : {
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },

        series : [
            {
                name:'Speed',
                type:'gauge',
                detail : {formatter:'{value}%'},
                data:[{value: 50}],
                axisLine: {
                    lineStyle: {
                        color: [[0.2, '#55ce63'],[0.8, '#009efb'],[1, '#f62d51']], 
                        
                    }
                },
                
            }
        ]
    };
    //Add this to have the data changed every two seconds
    setInterval(function () {
        option2.series[0].data[0].value = (Math.random() * 100).toFixed(2) - 0;
        gChart2.setOption(option2, true);
    },2000);

    gChart2.setOption(option2, true), $(function() {
        function resize() {
            setTimeout(function() {
                gChart2.resize()
            }, 100)
        }
        $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
    });
</script>

<script>
    var mychart3 = document.getElementById('chart3');
    gChart3 = echarts.init(mychart3);
    var option3 = {
        tooltip : {
            formatter: "{a} <br/>{b} : {c}%"
        },
        toolbox: {
            show : false,
            feature : {
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        series : [
            {
                name:'Market',
                type:'gauge',
                splitNumber: 5,       
                axisLine: {            
                    lineStyle: {
                        color: [
                            [0.2, '#55ce63'],
                            [0.8, '#009efb'],
                            [1, '#f62d51']
                        ], 
                        width: 2
                    }
                },
                axisTick: {            
                    splitNumber: 10,
                    length :10,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                axisLabel: {
                    width: 20,
                    textStyle: {
                        color: 'auto',
                    }
                },
                splitLine: {
                    show: true,
                    length :20,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                pointer : {
                    width : 3
                },
                title : {
                    show : true,
                    offsetCenter: [0, '-40%'],
                    textStyle: {
                        fontWeight: 'bolder'
                    }
                },
                detail : {
                    formatter:'{value}%',
                    textStyle: {
                        color: 'auto',
                        fontWeight: 'bolder',
                        fontSize: 15
                    }
                },
                data:[{value: 50}]
            }
        ]
    };
    //Add this to have the data changed every two seconds
    setInterval(function () {
        option3.series[0].data[0].value = (Math.random() * 100).toFixed(2) - 0;
        gChart3.setOption(option3, true);
    },2000);

    gChart3.setOption(option3, true), $(function() {
        function resize() {
            setTimeout(function() {
                gChart3.resize()
            }, 100)
        }
        $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
    });
</script>
@endsection
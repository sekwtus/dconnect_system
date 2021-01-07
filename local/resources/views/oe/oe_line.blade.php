@extends('layouts.master')
@section('title', 'OE LINE')

@section('style')

@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">OE LINE {{ $line }}</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">OE</a></li>
        <li class="breadcrumb-item active">LINE {{ $line }}</li>
      </ol>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3 stretch-card px-0">
    <div class="card card-border" style="background-color:#1b1b1b;"> 
      <div class="card-body">

        <div id="gauge_oe" style="width:100%; height:200px;"></div>

      </div>
    </div>
  </div>
          
  <div class="col-md-9 stretch-card">
    <div class="card card-border"> 
      <div class="card-body">
      
        <div class="row">
          <div class="col-md-2 px-0">
            <img src="{{ asset('assets/images/filling.png') }}" style="width:120px; height:70px;">
            FILLING
          </div>

          <div class="col-md-2 px-0">
            <img src="{{ asset('assets/images/p1.png') }}" style="width:100px; height:50px;">
          </div>

          <div class="col-md-2 px-0">
            <img src="{{ asset('assets/images/x-ray.png') }}" style="width:120px; height:70px;">
            X-RAY
          </div>

          <div class="col-md-2 px-0">
            <img src="{{ asset('assets/images/auto-packing.png') }}" style="width:120px; height:70px;">
            AUTO PACKING
          </div>

          <div class="col-md-2 px-0">
            <img src="{{ asset('assets/images/p2.png') }}" style="width:100px; height:50px;">
            <img src="{{ asset('assets/images/p2.png') }}" style="width:100px; height:50px;">
          </div>

          <div class="col-md-2 px-0">
            <img src="{{ asset('assets/images/box-packing.png') }}" style="width:120px; height:70px;">
            BOX PACKING
          </div>
        </div>
      
        <div class="row">
          <div class="col-md-12">
            <table style="width:100%;" border="1">
              <tbody>
                <tr>
                  <td style="width:20%;">
                    GOOD
                  </td>

                  <td style="width:70%;">
                    <div class="progress m-t-" style="background-color:#ddd">
                      <div class="progress-bar progress-bar-striped" style="background-color:#55ce63; width:50%; height:15px;" role="progressbar">
                        50%
                      </div>
                    </div>
                  </td>

                  <td>
                    แสดงจำนวน
                  </td>
                </tr>

                <tr>
                  <td>
                    LOST
                  </td>

                  <td>
                    <div class="progress" style="background-color:#ddd">
                      <div class="progress-bar progress-bar-striped" style="background-color:#ff0000; width:30%; height:15px;" role="progressbar">
                        30%
                      </div>
                    </div>
                  </td>

                  <td>
                    แสดงจำนวน
                  </td>
                </tr>

                <tr>
                  <td>
                    DOWN TIME (minute)
                  </td>

                  <td>
                    <div class="progress" style="background-color:#ddd">
                      <div class="progress-bar progress-bar-striped" style="background-color:#ff0; width:20%; height:15px;" role="progressbar">
                        20%
                      </div>
                    </div>
                  </td>

                  <td>
                    แสดงจำนวน
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row">  
  <div class="col-md-6 stretch-card">
    <div class="card card-border">
      <div class="card-body">
        
      </div>
    </div>
  </div>

  <div class="col-md-6 stretch-card">
    <div class="card card-border">
      <div class="card-body">
        <h4 class="card-title">
          Bar Chart (chartjs)
          <!-- <button id="btnDestroy">btnDestroy</button> -->
        </h4>
        <div>
          <canvas id="bar_chart" style="height:;"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- echart JS -->
<script src="{{ asset('assets/node_modules/echarts/echarts-all.js') }}"></script>
<!-- <script src="{{ asset('assets/node_modules/echarts/echarts-init.js') }}"></script> -->
<script type="text/javascript">
  //-- start guage chart --//
    // guage_option
    var guage_option = {
      title : { 
        // left: "center",
        // top: "center",
        // textAlign: 'center',
        textVerticalAlign: 'center',
        // text: "Title",
        textStyle: {
          fontSize: 16,
          // fontColor: '#fff000',
        },
        subtext: "Sub Title",
        subtextStyle: { },
      },
      tooltip : {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show : true,
        // showTitle: false, // hide the default text so they don't overlap each other
        feature : {
          // restore : {show: true}, // ปุ่ม reload ข้อมูล
          // saveAsImage : {show: true, type:'jpeg', title:'บันทึกรูปภาพ'}, // ปุ่ม save ภาพ type:'jpeg' 'png' 
        }
      },
      width: "100%",
      // height: "500px",

      series : [{
        // name:'',
        type:'gauge',
        axisLine: {
          lineStyle: { // lineStyle
            color: [
              [0.5, '#ff0000'],[0.8, '#ffaf00'],[1, '#55ce63'], // ช่วง value ของสี, สี
            ], 
            width: 3, // ความหนาของขอบ guage
          }
        },
        axisTick: {
          splitNumber: 10, // ระยะห่างของค่า value
          length: 7, // ความยาวเส้นรอง
          lineStyle: { // lineStyle
            color: 'auto'
          }
        },
        axisLabel: {
          // lineHeight: 56,
          distance: 1,
          textStyle: {
            color: 'auto', // สีของตัวเลข ใน guage, auto
            fontWeight: 'bolder',
            fontSize: 10,
          }
        },
        splitLine: { 
          show: true,
          length :10, // ความยาวของเส้นหลัก (0 10 20 30)
          lineStyle: {
            color: 'auto'
          }
        },
        pointer : {
          length: 50, // ความยาวของเข็ม
          width : 2, // ความหนาของเข็ม
        },
        // title : {
        //   show : true,
        //   offsetCenter: [0, '-40%'],       // x, y，单位px
        //   textStyle: { // 其余属性默认使用全局文本样式，详见TEXTSTYLE
        //     fontWeight: 'bolder',
        //     fontSize: 50, // font-size title
        //   }
        // },
        detail : {
          formatter:'{value}%',
          textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            color: 'auto',
            fontWeight: 'bolder',
            fontSize: 20, // font-size 
          }
        },
        
        data: [
          { value: 0, name: '' }
        ]
      }]
    };

    // ข้อมูลหลังบ้าน
    var oe_line = {!! json_encode($oe_line) !!};
    // console.log(oee_data);
    
    // วาด guage oe_line
    var gauge_oe = echarts.init(document.getElementById(`gauge_oe`));
    // console.log(gauge_oe.dom);
    // value gauge_oe
    guage_option.series[0].data[0].value = 90;
    guage_option.title.text = 'OE';
    gauge_oe.setOption(guage_option, true), $(function() {
      function resize() {
        setTimeout(function() {
          gauge_oe.resize();
        }, 100);
      }
      $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
    });

    var gauge_pe = echarts.init(document.getElementById(`gauge_pe`));
    // value gauge_pe
    guage_option.series[0].data[0].value = 60;
    guage_option.title.text = 'PE';
    gauge_pe.setOption(guage_option, true), $(function() {
      function resize() {
        setTimeout(function() {
          gauge_pe.resize();
        }, 100);
      }
      $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
    });

    var gauge_ou = echarts.init(document.getElementById(`gauge_ou`));
    // value gauge_ou
    guage_option.series[0].data[0].value = 30;
    guage_option.title.text = 'OU';
    gauge_ou.setOption(guage_option, true), $(function() {
      function resize() {
        setTimeout(function() {
          gauge_ou.resize();
        }, 100);
      }
      $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
    });
    // console.log(arr_test);
    
    /*
      // สุ่ม ค่า value
      clearInterval(timeTicket);
      var timeTicket = setInterval(function (){
        guage_option.series[0].data[0].value = (Math.random()*100).toFixed(2) - 0;
        gauge_chart.setOption(guage_option,true);
      },2000)
    
      var arr_ = [];                                       

      for (let i=1; i<=4; i++) {
        var gauge_chart = echarts.init(document.getElementById('gauge_chart'+i));
        if(i==1){
          guage_option.series[0].data[0].value = 25.5;
        } else if(i==2){
          guage_option.series[0].data[0].value = 45.5;
        } else if(i==3){
          guage_option.series[0].data[0].value = 85.5;
        } else if(i==4){
          guage_option.series[0].data[0].value = 95.5;
        }
        // gauge_chart.setOption(guage_option, true), $(function() {
        //   function resize() {
        //     setTimeout(function() {
        //       gauge_chart.resize()
        //     }, 100);
        //   }
        //   $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
        // });
        
        if(i==1){
          arr_.push(gauge_chart);
        }
      }
      console.log(arr_);
    */
  //-- end guage chart --//
</script>

<!-- Chart JS -->
<script src="{{ asset('assets/node_modules/Chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">
  $(function () {
    //-- strat bar chart --//
      var labels_ = ["LINE 1","LINE 2","LINE 3","LINE 4","LINE 5","LINE 6"];
      var data_ = [11,12,13,14,15,16];

      var bar_chart = new Chart(document.getElementById("bar_chart"), {
        type: "bar",
        data: {
          labels: labels_,
          datasets: [{
            label: "My First Dataset",
            data: data_,
            fill: false,
            backgroundColor:["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)","rgba(0, 211, 35, 0.2)"],
            borderColor:["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)"],
            borderWidth: 1
          }]
        },

        options: {
          scales: {
            yAxes:[{
              ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 10,
                format: function(d) {
					        return d +"%";
                }
              }
            }],
          }
        }
      });
    //-- end bar chart --//

    /*
      var line_chart = new Chart(document.getElementById("chartjs-trend-oe-all"), {
        type: "line",
        data: {"labels":["January","February","March","April","May","June","July"],
          datasets: [{
            "label":"My First Dataset",
            "data":[65,59,80,81,56,55,40],
            "fill":false,
            "borderColor":"rgb(75, 192, 192)",
            "lineTension":0.1
          }]
        }, 
        options: {

        }
      });
    */

    // test destroy bar chart //
    $('#btnDestroy').click(function (e) { 
      e.preventDefault();
      bar_chart.destroy();
    });

  });
</script>
@endsection
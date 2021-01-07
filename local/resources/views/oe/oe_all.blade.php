@extends('layouts.master')
@section('title', 'OE')

@section('style')

@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">OE OVERVIEW</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">OE</a></li>
        <li class="breadcrumb-item active">OVERVIEW</li>
      </ol>
    </div>
  </div>
</div>

<!-- <div class="row el-element-overlay">
  <div class="col-md-4">
    <div class="card">
      <div class="el-card-item">
          <div class="el-card-avatar el-overlay-1">
            <img src="{{ asset('assets/images/test-dumex.png') }}">

            <div class="el-overlay">
              <ul class="el-info">
                <li>
                  <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('assets/images/test-dumex.png') }}">
                    <i class="icon-magnifier"></i>
                  </a>
                </li>
                
                <li>
                  <a class="btn default btn-outline" href="javascript:void(0);">
                      <i class="icon-link"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="el-card-content">
            <h4 class="box-title">Genelia Deshmukh</h4>
            <small>Managing Director</small>
            <br/>
          </div>
      </div>
    </div>
  </div>
</div> -->

<div class="row">
  {{-- <div class="col-md-12">
    <div class="gauge_test" style="width:100%; height:200px;"></div>
  </div> --}}
  @foreach ($type_line as $line)
    <div class="col-md-4 stretch-card">
      <div class="card card-border" style="background-color:#1b1b1b;"> 
        <div class="card-body">
          <div class="row el-element-overlay">
            {{-- <div class="col-md-3 text-center">
              <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1 mb-0">
                      <img src="{{ asset('assets/images/test-dumex.png') }}" style="width:; height:70px;">
          
                      <div class="el-overlay">
                        <ul class="el-info">
                          <li>
                            <a class="btn btn-sm btn-outline-info image-popup-vertical-fit" href="{{ asset('assets/images/test-dumex.png') }}">
                              <i class="icon-magnifier"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
          
                    <div class="el-card-content">
                      <h4 class="box-title">Genelia Deshmukh</h4>
                      <small id="material_description{{ $line->line_number }}"></small>
                    </div>
                </div>
              </div>
            </div> --}}
            <div class="col-md-12 border-dark px-0">
              <div id="gauge_oe_line{{ $line->line_number }}" class="gauge_oe_line{{ $line->line_number }}" style="width:100%; height:200px;"></div>
            </div>
          </div>
          
          {{-- <div class="row">
            <div class="col-md-12">
              <b id="label_quantity{{ $line->line_number }}">TEST</b>
            </div>
          </div> --}}
            
          <div class="row">
            <div class="col-md-3 text-center">
              @php
                if(($line->line_number%2) == 0){
                  $light = 'light-green.png';
                  $qty_green = '75%';
                } else {
                  $light = 'light-red.png';
                  $qty_green = '55%';
                }
              @endphp
              <div class="mb-2">
                <img src="{{ asset("assets/images/oe/$light") }}" style="width:40px; height:40px;">
              </div>
            </div>

            <div class="col-md-9 px-0">
              <div id="progress_quantity{{ $line->line_number }}" class="progress m-t-" style="background-color:#ddd">
                <div class="progress-bar progress-bar-striped" style="background-color:#55ce63; height:15px;" role="progressbar" 
                  data-toggle="tooltip" data-placement="top" title="">
                </div>
              </div>

              <div id="progress_lost{{ $line->line_number }}" class="progress mt-2" style="background-color:#ddd" title="">
                <div class="progress-bar progress-bar-striped" style="background-color:#ff0000; width:40%; height:15px;" role="progressbar">
                  40% (0/0)
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  @endforeach
</div>

{{-- <div class="row">
  @foreach ($oe_all as $oe)
    <div class="col-md-3 stretch-card">
      <div class="card">
        <div class="card-body text-center">
          <div class="">
            <img src="{{ asset('assets/images/test-dumex.png') }}" class="img-thumbnail">
          </div>
          
          <h3 class="mt-2">
            <span class="badge badge-pill badge-dark">
              {{ $oe->product_name }}
            </span>
          </h3>
        </div>
      </div>
    </div>

    <div class="col-md-9 stretch-card">
      <div class="card">
        <div class="card-body">
          <!-- Production1 -->
          <!-- <h4 class="card-title">Market Rates</h4> -->
          <div class="row">
            <div class="col-md-3 text-center">
              <div id="gauge_oee{{ $oe->id_production }}" style="width:100%; height:200px;"></div>

              <h3 class="">
                <span class="badge badge-pill badge-dark text-uppercase">
                  oee
                  <span class="text_oee{{ $oe->id_production }}">
                    {{ $oe->oee }}
                  </span>
                  %
                </span>
              </h3>
            </div>
            
            <div class="col-md-3 text-center">
              <div id="gauge_availability{{ $oe->id_production }}" style="width:100%; height:200px;"></div>

              <h3 class="">
                <span class="badge badge-pill badge-dark text-uppercase">
                  availability
                  <span class="text_availability{{ $oe->id_production }}">
                    {{ $oe->availability }}
                  </span>
                  %
                </span>
              </h3>
            </div>
            
            <div class="col-md-3 text-center">
              <div id="gauge_pe{{ $oe->id_production }}" style="width:100%; height:200px;"></div>

              <h3 class="">
                <span class="badge badge-pill badge-dark text-uppercase">
                  pe
                  <span class="text_pe{{ $oe->id_production }}">
                    {{ $oe->pe }}
                  </span>
                  %
                </span>
              </h3>
            </div>
            
            <div class="col-md-3 text-center">
              <div id="gauge_qr{{ $oe->id_production }}" style="width:100%; height:200px;"></div>

              <h3 class="">
                <span class="badge badge-pill badge-dark text-uppercase">
                  qr 
                  <span class="text_qr{{ $oe->id_production }}">
                    {{ $oe->qr }}
                  </span>
                  %
                </span>
              </h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 text-center">
              <h3 class="mt-2">
                <a  class="btn btn-icons btn-rounded" style="background-color: rgb(85, 206, 99, 1);">&nbsp;</a>
              </h3>
              <h3 class="mt-2">
                <a  class="btn btn-icons btn-rounded" style="background-color:rgb(255, 175, 0, 0.5);"></a>
              </h3>
              <h3 class="mt-2">
                <a  class="btn btn-icons btn-rounded" style="background-color:rgb(255, 0, 0, 0.5);"></a>
              </h3>
            </div>

            <div class="col-md-9">
              @php
                $percent_qty_now = ($oe->qty_now / $oe->qty_total) * 100;
                $percent_qty_total = 100 - (($oe->qty_now / $oe->qty_total) * 100);
              @endphp

              <h5 class="m-t-30">
                QTY 1 : {{ $oe->qty_now }}
                <span class="pull-right">
                  {{ number_format($percent_qty_now, 2) }}%
                </span>
              </h5>
              <div class="progress">
                <div class="progress-bar wow animated progress-animated" style="width:{{ number_format($percent_qty_now, 2) }}%; height:6px; background-color:#ff0000;" role="progressbar">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>

              <h5 class="m-t-30">
                QTY 2 : {{ $oe->qty_total }}
                <span class="pull-right">
                  {{ number_format($percent_qty_total, 2) }}%
                </span>
              </h5>
              <div class="progress">
                <div class="progress-bar wow animated progress-animated" style="width: {{ number_format($percent_qty_total, 2) }}%; height:6px; background-color:#55ce63;" role="progressbar">
                </div>
              </div>

              <!--
                <h4 class="card-title">
                  QTY
                  <a class="get-code" data-toggle="collapse" href="#pgr2" aria-expanded="true">
                    <i class="fa fa-code" title="Get Code" data-toggle="tooltip"></i>
                  </a>
                </h4>

                <div class="collapse m-t-15" id="pgr2"> 
                  <pre class="line-numbers language-javascript">
                    <code>&lt;div class="progress"&gt;<br/>&lt;div class="progress-bar bg-success" role="progressbar" style="width: 75%;height:15px;" role="progressbar""&gt; 75% &lt;/div&gt;<br/>&lt;/div&gt;</code>
                  </pre>
                </div>
                <div class="progress m-t-20">
                  <div class="progress-bar bg-danger" style="width: {{ number_format($percent_qty_now, 2) }}%; height:15px;" role="progressbar">
                    {{ number_format($percent_qty_now, 2) }}%
                  </div>
                </div>

                <div class="progress m-t-20">
                  <div class="progress-bar bg-success" style="width: {{ number_format($percent_qty_total, 2) }}%; height:15px;" role="progressbar">
                    {{ number_format($percent_qty_total, 2) }}%
                  </div>
                </div>
              -->
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div> --}}

<div class="row zoom90-">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Trend (chartjs)</h4>
        <div>
          <canvas id="chartjs-trend-oe-all" height="150"></canvas>
        </div>
        
        <div id="echarts-trend-oe-all" style="width:100%; height:500px;"></div>

        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- echart JS -->
<script type="text/javascript">
  //-- start guage chart --//
    // guage_option
    var guage_option = { 
      backgroundColor: '#1b1b1b',
      title : { 
        text: 'title',
        subtext: "% OE / OU",
        // link:'aaaaaa.png',
        target: 'blank', // self
        textStyle: {
          color: '#fff',
          fontSize: 15,
          rich: {
            "<style_name>": {
              fontStyle: "italic",
              // align: "center"
            }
          }
        },
        subtextStyle: { },
        left: "center",
        // top: "center",
        // textAlign: 'center',
        // textVerticalAlign: 'center'
      },
      tooltip : {
        formatter: "{a}<br/>{b} : {c}%"
        // formatter: "{a} : {b} : {c}%"
      },
      toolbox: {
        show : false,
        // showTitle: false, // hide the default text so they don't overlap each other
        feature : {
          // mark: {show: true},
          restore : {show: true}, // ปุ่ม reload ข้อมูล
          saveAsImage : {show: true, type:'jpeg', title:'บันทึกรูปภาพ'}, // ปุ่ม save ภาพ type:'jpeg' 'png' 
        }
      },
      width: "100%",
      // height: "500px",
      series : [ // data ของ gauge
        {
          name: 'oe',
          type: 'gauge',
          radius: '55%', // ขนาด guage
          center: ['25%', '60%'], // ตำแหน่ง x,y
          // splitNumber: 10,
          splitLine: { // เส้นขั้นหลัก
            show: true,
            length :13, // ความยาวของเส้นหลัก (0 10 20 30)
            lineStyle: {
              color: 'auto',
              shadowColor: '#fff',
              shadowBlur: 4,
            }
          },
          axisTick: { // เส้นขั้นรอง
            splitNumber: 10, // ระยะห่างของค่า value
            length: 10, // ความยาวเส้นรอง
            lineStyle: { // lineStyle
              color: 'auto',
              // shadowColor: '#fff', // สีเงาของเส้น guage
              // shadowBlur: 2,
            }
          },
          axisLine: {
            lineStyle: { // lineStyle
              color: [
                [0.5, '#ff0000'], [0.8, '#ff0'], [1, '#44ff06'], // ช่วง value ของสี, สี
              ], 
              width: 5, // ความหนาของขอบ guage
              shadowColor: '#fff',
              shadowBlur: 5
            }
          },
          axisLabel: { // ตัวเลข ใน guage
            // lineHeight: 56,
            show: false,
            distance: 1,
            textStyle: {
              color: 'auto', // สีของตัวเลข ใน guage, auto
              fontWeight: 'bolder',
              fontSize: 10,
            }
          },
          pointer : { // เข็ม
            length: 50, // ความยาว
            width : 4, // ความหนา
          },
          detail : { // ตัวหนังสือด้านล่างเกจ
            formatter:'{value}%',
            // backgroundColor: 'rgba(30,144,255,0.8)',
            // borderWidth: 1,
            // borderColor: '#fff',
            // shadowColor: '#fff',
            shadowBlur: 5,
            // offsetCenter: [0, '20%'],
            textStyle: { // TEXTSTYLE
              color: 'auto',
              fontWeight: 'bolder',
              fontSize: 20, // font-size 
            }
          },
          title : { // title ของ name
            show : true,
            offsetCenter: [0, '-30%'], // x, y
            textStyle: {
              color: 'auto',
              fontWeight: 'bolder',
              fontSize: 12,
              shadowColor: '#000',
              shadowBlur: 1
            }
          },
          data: [
            {
              value: 0, 
              name:'OE',
              icon: '',
              textStyle: {
                color: 'red'
              } 
            }
          ]
        },

        {
          name: 'ou',
          type: 'gauge',
          radius: '55%',
          center: ['75%', '60%'], // ตำแหน่ง
          min: 0,
          max: 100,
          // startAngle: 150,
          // endAngle: 25,
          splitNumber: 10, // ระยะห่างของค่า value 
          splitLine: { // เส้นหลัก
            show: true,
            length :13, // ความยาวของเส้นหลัก (0 10 20 30)
            lineStyle: {
              color: 'auto',
              shadowColor: '#000',
              shadowBlur: 4,
            }
          },
          axisTick: { // เส้นขั้นรอง
            splitNumber: 10, // ระยะห่างของค่า value
            length: 10, // ความยาวเส้นรอง
            lineStyle: {
              color: 'auto',
            }
          },
          axisLine: {
            lineStyle: { // lineStyle
              color: [
                [0.5, '#ff0000'], [0.8, '#ff0'], [1, '#44ff06'], // ช่วง value ของสี, สี
              ], 
              width: 5, // ความหนาของขอบ guage
              shadowColor: '#fff',
              shadowBlur: 5
            }
          },
          axisLabel: {
            show: false,
            // lineHeight: 56,
            distance: 1,
            textStyle: {
              color: 'auto', // สีของตัวเลข ใน guage, auto
              fontWeight: 'bolder',
              fontSize: 10,
            }
          },
          pointer : {
            length: 50, // ความยาวของเข็ม
            width : 3, // ความหนาของเข็ม
          },
          detail : { // ตัวหนังสือด้านล่างเกจ
            formatter:'{value}%',
            // backgroundColor: 'rgba(30,144,255,0.8)',
            // borderWidth: 1,
            // borderColor: '#fff',
            // shadowColor: '#fff',
            shadowBlur: 5,
            // offsetCenter: [0, '20%'],
            textStyle: { // TEXTSTYLE
              color: 'auto',
              fontWeight: 'bolder',
              fontSize: 20, // font-size 
            }
          },
          title : { // title ของ name
            show : true,
            offsetCenter: [0, '-30%'], // x, y
            textStyle: {
              color: 'auto',
              fontWeight: 'bolder',
              fontSize: 12,
              shadowColor: '#000',
              shadowBlur: 1
            }
          },
          data: [
            {value: 1.5, name: 'OU'}
          ]
        },
      ]
    };

    // ข้อมูลหลังบ้าน
    var type_line = {!! json_encode($type_line) !!};
    // console.log(type_line);
    
    // วาด guage oe_all
    var gauge = {};
    $.each(type_line, function (index, line) {
      var _line = line.line_number;
      gauge_oe(_line);
    });

    function gauge_oe(_line){
      gauge[`gauge_oe_line${_line}`] = echarts.init(document.getElementsByClassName(`gauge_oe_line${_line}`)[0]);
      // gauge[`gauge_oe${line.line_number}`] = echarts.init(document.getElementById(`gauge_oe_line${line}`));
      
      $.ajax({
        type: "get",
        url: `{{ url('oe/${_line}/get_oe_data') }}`,
        // data: ,
        success: function (res) {
          var line_number = res.oe_data.line_number;
          var production_order = res.oe_data.production_order;
          var material_description = res.oe_data.material_description;
          var value_oe = Number(res.oe_data.line_number)+10; //getRandomInt(10,100); //res.oe_data.value_oe; //; 
          var value_ou = Number(res.oe_data.line_number)+20;
          if(res.oe_data.line_number == 1){
            var value_oe = 25;
            var value_ou = 25;
          }
          if(res.oe_data.line_number == 2){
            var value_oe = 75;
            var value_ou = 75;
          }
          if(res.oe_data.line_number == 3){
            var value_oe = 90;
            var value_ou = 100;
          }


          var quantity_min = Number(res.oe_data.quantity_min).toFixed(0);
          var quantity_max = Number(res.oe_data.quantity_max).toFixed(0);
          var quantity_now = Number(res.oe_data.quantity_now).toFixed(0);
          var quantity_to_make = Number(res.oe_data.quantity_to_make).toFixed(0);

          console.log(
            // _line, 
            res.oe_data,
            // value_oe,
            // quantity_min, quantity_max,
            // quantity_now, quantity_to_make,
            // `${percent_per_quantity(quantity_now, quantity_to_make)}`
          );

          guage_option.title.text = `LINE ${line_number} PRODUCTION ORDER ${production_order}`;
          guage_option.title.subtext = `${material_description}`;
          guage_option.title.link = `{{ url('${line_number}/oe') }}`;
          guage_option.series[0].data[0].value = value_oe;
          guage_option.series[1].data[0].value = value_ou;
      
          // console.log(gauge[`gauge_oe_line${line}`].dom);
          gauge[`gauge_oe_line${line_number}`].setOption(guage_option, true), $(function() {
            function resize() {
              setTimeout(function() {
                gauge[`gauge_oe_line${line_number}`].resize();
              }, 100);
            }
            $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
          });

          // $(`#material_description${line_number}`)
          //   .attr('title',res.oe_data.material_description)
          //   .text(res.oe_data.material_description.substr(0,9));

          // $(`#progress_quantity${line_number}`)
          //   .attr({
          //     // 'data-toggle':'tooltip',
          //     // 'data-placement':'top',
          //     'title':`${percent_per_quantity(quantity_now, quantity_to_make)}% ${quantity_now}/${quantity_to_make}`
          //   });
          // $(`#progress_quantity${line_number} .progress-bar`)
          //   .css({ 'width': `${percent_per_quantity(quantity_now, quantity_to_make)}%` })
          //   .text(`${percent_per_quantity(quantity_now, quantity_to_make)}% ${quantity_now}/${quantity_to_make}`);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON);
          // gauge_oe(_line);
        },
        timeout: 5000,
      });

      // ดึงข้อมุลใหม่ มาวาด guage 
      /*
      var time_ = 10000;
      clearInterval(timeTicket);
      var timeTicket = setInterval(function() {
        guage_option.series[0].data[0].value = getRandomInt(10,100);
        gauge[`gauge_oe_line${_line}`].setOption(guage_option,true);
        
        $.ajax({
          type: "GET",
          url: `{{ url('oe/${_line}/get_oe_data') }}`,
          data: "",
          dataType: "",
          success: function (response) {
            // console.log(response.oee_data);
            $.each(response.oe_all, function( i, val_ ) {
              // arr_performance[index].refresh(val.performance);
              guage_option.series[0].data[0].value = val_.oee;
              gauge_oee.setOption(guage_option,true);
              $('.text_oee'+val_.id_production).text(val_.oee);
            });
          }
        });
        
      }, time_); // 300000 ดึง data ใหม่ทุก 5 นาทั
      */
    }
  //-- end guage chart --//
</script>

<!-- Chart JS -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.7/chartjs-plugin-annotation.js"></script> --}}
<script type="text/javascript">
  $(function () {
    var arr_period = [];
    var arr_value = [];
    for (time=1; time<=24; time++) {
      var hour = new String(time);
      if(hour.length == 1) {
        hour = '0'+hour;
      }
      // console.log(hour);
      arr_period.push(`${hour}:00`);
    }

    for (line=1; line<=6; line++) {
      hidden_line = false;
      if(/*line%2==0 */ line!=1){
        hidden_line = true;
      }
      arr_value.push({
        label: `LINE ${line}`,
        type: `line`,
        pointRadius: arr_period.map(value => 5 ), // ขนาดจุดบนเส้น
        fill: false, // สีพื้นภายในเส้น
        // pointBackgroundColor: 'rgba(0, 0, 0, 1)', // สีจุด
        borderColor: chart_color(line),
        backgroundColor:chart_color(line),
        data: arr_period.map(value => getRandomInt(10,99) ), //Math.random()*100).toFixed(2)
        lineTension: 0.4, // ความโค้งของเส้น
        hidden: hidden_line, // ซ่อน line
      });
    }
    // console.log(
    //   arr_period.map( value=>JSON.parse(`{ x:${value}, y:${getRandomInt(10,99)} }`) )
    // );
    
    // // config สี ให้ area ใน chart
    /*Chart.pluginService.register({
			beforeDraw: function (chart, easing) {
        //     // if (chart.config.options.chartArea && chart.config.options.chartArea.backgroundColor) {
        //     //   var ctx = chart.chart.ctx;
        //     //   var chartArea = chart.chartArea;

        //     //   ctx.save();
        //     //   ctx.fillStyle = chart.config.options.chartArea.backgroundColor;
        //     //   // ctx.fillStyle = 'red';
        //     //   ctx.fillRect(chartArea.left, chartArea.top, chartArea.right - chartArea.left, chartArea.bottom - chartArea.top);
        //     //   ctx.restore();
        //     // }
				if (chart.config.options.chartArea && chart.config.options.chartArea.backgroundColor) {
					var helpers = Chart.helpers;
					var ctx = chart.chart.ctx;
					var chartArea = chart.chartArea;

          var columnCount = chart.data.datasets[0].data.length; //
          // var rowCount = chart.data.datasets[0].data.length; //
          // var rowCount = line_chart.scales['y-axis-0'].ticksAsNumbers.length;
          var width = chartArea.right - chartArea.left; //
          // var height = chartArea.bottom - chartArea.top; //
          var height = (chartArea.bottom - chartArea.top) / 2;
          // console.log(line_chart.scales['y-axis-0'].ticksAsNumbers.length);

					var columnWidth = width/columnCount; //
					// var rowWidth = width/rowCount;

					ctx.save(); //
					ctx.fillStyle = chart.config.options.chartArea.backgroundColor; //
          // console.log(columnWidth); //

          var startPoint = chartArea.left; // 
          while (startPoint < chartArea.right) { //
          	ctx.fillRect(startPoint, chartArea.top, columnWidth, height);
            startPoint += columnWidth * 2;
          }
          // while (startPoint < chartArea.bottom) {
          // 	ctx.fillRect(startPoint, chartArea.top, rowWidth, height);
          //   // startPoint += rowWidth * 2; //
          //   startPoint += rowWidth * 2; //
          // }
					ctx.restore();
				}
			}
		}); */
    var line_chart = new Chart(document.getElementById("chartjs-trend-oe-all"), {
      type: `line`,
      data: {
        labels: arr_period,
        datasets: arr_value,
      }, 

      options: {
        chartArea: { // config สี ให้ area ใน chart
          backgroundColor: 'green', // color main bg
        },
        // responsive: true,
        // title: {
        //   display: false,
        //   text: 'ไตเติ้ล'
        // },
        pointBackgroundColor:'red',
        scales: {
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'ช่วงเวลา',
              fontColor: '#000',
            },
            ticks: {
              fontColor: '#000', // สี label แกน X
            },
          }],
          yAxes: [{
            scaleLabel: {
              display: true,
              labelString: '% OE',
              fontColor: '#000',
            },
            ticks: {
              beginAtZero: true,
              min: 0,
              max: 100,
              fontColor: '#000', // สี label แกน Y
              stepSize: 10,
              callback: function(value, index, values) {
                return value + "%";
              }
            },
						gridLines: { // สี bg ของ chart
              drawOnChartArea: true,
              // backgroundColorRepeat: true,
              backgroundColor: [
                'green',
                'green',
                'green',
                'green',
                'green',
                'rgb(255,0,0, 0.9)',
                'rgb(255,0,0, 0.9)',
                'rgb(255,0,0, 0.9)',
                'rgb(255,0,0, 0.9)',
                'rgb(255,0,0, 0.9)',
              ],
            },
          }],
        },
        /* annotation: {
          // events: ["click"],
          annotations: [       
            {
              drawTime: "beforeDatasetsDraw",
              type: "box",
              xScaleID: "x-axis-1",
              yScaleID: "y-axis-1",
              // xMin: 15,
              // xMax: 45,
              yMin: 50,
              yMax: 100,
              value: 50,
              backgroundColor: "rgba(0, 128, 0, 0.8)",
              // borderColor: "rgba(128, 255, 0, 0.5)",
              // borderWidth: 6ม
            },
            {
              drawTime: "afterDatasetsDraw",
              type: 'line',
              mode: 'horizontal',
              scaleID: 'y-axis-1',
              value: 100,
              borderColor: 'rgba(0, 0, 0, 0)',
              borderWidth: 0,
              label: {
                fontStyle: 'normal',
                fontSize: 18,
                fontColor: 'white',
                backgroundColor: 'rgba(0, 0, 0, 0)',
                content: "Danger - Do not operate in this area",
                enabled: true
              }
            },
          ]
        } */
      }
    });
    // console.log( (line_chart.scales['y-axis-0'].ticksAsNumbers.length-1) );
    
    //-- line e-chart --// 
      var arr_line_color = [];
      var arr_value_test = [];
      for (let line=1; line<=6; line++) { 
        arr_line_color.push(chart_color(line));
        arr_value_test.push({
          // smooth: true, // ความโค้ง
          name: `LINE ${line}`,
          type:'line',
          color:['red'],
          // fillColor: chart_color(line),
          data:arr_period.map(value => getRandomInt(20,90) ),
          markPoint : {
            symbol: 'pin',
            // symbolSize: 500,
            data : [
              {type : 'max', name: 'Max'},
              {type : 'min', name: 'Min'}
            ]
          },       
          markLine : {
            // silent: false,
            symbolSize: 2, //
            data : [
              {type:'average', name:'Average'},
              // {type : 'max', name: 'Max'},
              // {type : 'min', name: 'Min'},
              [
                {
                  symbol: 'none',
                  x: '90%',
                  yAxis: 'max'
                }, 
                {
                  symbol: 'circle',
                  label: {
                      position: 'start',
                      formatter: '最大值'
                  },
                  type: 'max',
                  name: '最高点'
                }
              ]
            ]
          },
          itemStyle: {
            normal: {
              lineStyle: {
                color: chart_color(line),
                shadowColor : 'rgba(0,0,0,0.3)',
                shadowBlur: 10,
                shadowOffsetX: 8,
                shadowOffsetY: 8 
              }
            }
          }, 
          areaStyle: {
            color: chart_color(line),
            opacity: 1,
          },
        });
      }
      // console.log(arr_value_test);
      var mytempChart = echarts.init(document.getElementById("echarts-trend-oe-all"));
      var app = {};
      var option = null;
      option = {
        tooltip : {
          show: true,
          trigger: 'axis', // แสดง ค่า,grid ของทุกเส้น,
          axisPointer: {
            type: 'line', // shadow cross line
            lineStyle: {
              color:'auto' // สีของเส้น hover
            },
          }
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle',
          data: arr_value_test.map(value => value.name), // ['line 1','line 2'],
        },
        toolbox: {
          show: true,
          feature: {
            magicType : {show: true, type: ['line', 'bar']},
            // restore : {show: true},
            // saveAsImage : {show: true}
          }
        },
        color: arr_line_color, // ["red", "blue"],
        calculable: true,

        grid:{
          show: false,
          // backgroundColor: 'green', // สีพื้นหลังของ area
        },
        xAxis: [ // แกน X
          {
            type: 'category',
            boundaryGap: false,
            data: arr_period, //['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
            axisLabel: {
              formatter: '{value}',
            },
            axisLine: {
              lineStyle: {
                color: '#ddd', // สีเส้นหลัก ของแกน X
              }
            },
            splitLine: {
              lineStyle: {
                color: '#ddd', // สี grid ของแกน X
              }
            },
            // splitArea: {  
            //   areaStyle: {
            //     color: 'red',
            //   }
            // }
          }
        ],
        yAxis: [ // แกน Y
          {
            type: 'value',
            splitNumber: 10, // ระยะห่างของค่า
            axisLabel: {
              formatter: '{value} %'
            },
            axisLine: {
              lineStyle: {
                color: '#ddd', // สีเส้นหลัก ของแกน Y
              }
            },
            splitLine: {
              lineStyle: {
                color: '#ddd', // สี grid ของแกน Y
              }
            },
          },
        ],
        // visualMap: {
        //   min: 0,
        //   max: 100,
        //   calculable: true,
        //   realtime: false,
        //   inRange: {
        //     color: ["#313695", "#4575b4", "#74add1", "#abd9e9", "#e0f3f8", "#ffffbf", "#fee090", "#fdae61", "#f46d43", "#d73027", "#a50026"]
        //   },
        //   textStyle: {}
        // },

        series: arr_value_test,
        /*
          [
            {
              name:'LINE 1',
              type:'line',
              color:['#000'],
              data:[11, 11, 15, 13, 12, 13, 10],
              markPoint : {
                data : [
                  {type : 'max', name: 'Max'},
                  {type : 'min', name: 'Min'}
                ]
              },
              itemStyle: {
                normal: {
                    lineStyle: {
                        color: '#ff0',
                        shadowColor : 'rgba(0,0,0,0.3)',
                        shadowBlur: 10,
                        shadowOffsetX: 8,
                        shadowOffsetY: 8 
                    }
                }
              },        
              markLine : {
                  data : [
                      {type : 'average', name: 'Average'}
                  ]
              }
            },
            {
                name:'LINE 2',
                type:'line',
                data:[1, -2, 2, 5, 3, 2, 0],
                markPoint : {
                    data : [
                        // {name : 'Week minimum', value : -2, xAxis: 1, yAxis: -1.5}
                        {type : 'max', name: 'Max'},
                        {type : 'min', name: 'Min'}
                    ]
                },
                itemStyle: {
                    normal: {
                        lineStyle: {
                            shadowColor : 'rgba(0,0,0,0.3)',
                            shadowBlur: 10,
                            shadowOffsetX: 8,
                            shadowOffsetY: 8 
                        }
                    }
                }, 
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            }
          ]
        */
      };
  
      if (option && typeof option === "object") {
        mytempChart.setOption(option, true), $(function() {
          function resize() {
            setTimeout(function() {
              mytempChart.resize()
            }, 100)
          }
          $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
        });
      }
    //-- line e-chart --//  

    //-- canvas js --//
      // console.log(new String('01'+':00'));
      var arr_canvas_data = [];
      for (line=1; line<=6; line++) {
        var obj = {x:'01:00', y:getRandomInt(10,99)}
        arr_canvas_data.push({
          type: 'stepLine',  
          dataPoints: arr_period.map(value=> obj),
          // [ 
          //   // { x: new Date(2008,02), y: 41.00 },
          //   // { x: new Date(2008,03), y: 42.50 },
          // ]

          // x: new String('0'+line+':00'), y:getRandomInt(10,99)
          // // label: `LINE ${line}`,
        });
      }
      // console.log(arr_canvas_data[0]);
      var chart= new CanvasJS.Chart("chartContainer", {
        title:{
          text: "MultiSeries StepLine Chart"
        },
        toolTip: {
          shared: true
        },
        axisX: {
          lineThickness: 2
        },
        axisY: {
          minimum: 0,
          maximum: 100,
          suffix: ' %',
          interval: 10, // ระยะห่างของค่า
          includeZero: true,
          // labelFontColor: "#C24642",
          // lineColor: "#C24642",
          stripLines: [
            {
              // startValue: 50,
              // endValue: 0,           
              // color: "red",
            },
            {
              // startValue:51,
              // endValue:100,                
              // color:"green",
              // label : "Label 1",
              // labelFontColor: "red",
            }
          ]
        },

        data: [
          {
            type: "spline", // stepLine
            lineColor: 'blue', // สีเส้น
            markerColor: 'blue', // สีจุด
            markerSize: 10, // ขนาดจุด
            dataPoints: [
              { x: new Date(2008,02), y: 100.00 }, // ,indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" 
              { x: new Date(2008,03), y: 14.50 }, // ,indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross"
              { x: new Date(2008,04), y: 14.00 },
              { x: new Date(2008,05), y: 60.50 },
              { x: new Date(2008,06), y: 14.75 },
              { x: new Date(2008,07), y: 55.30 },
              { x: new Date(2008,08), y: 15.80 },
              { x: new Date(2008,09), y: 49.50 }
            ]
          },
          {
            type: "spline",
            lineColor: 'orange',  
            dataPoints: [
              { x: new Date(2008,02), y: 41.00 },
              { x: new Date(2008,03), y: 42.50 },
              { x: new Date(2008,04), y: 41.00 },
              { x: new Date(2008,05), y: 45.30 },
              { x: new Date(2008,06), y: 50.55 },
              { x: new Date(2008,07), y: 45.00 },
              { x: new Date(2008,08), y: 60.70 },
              { x: new Date(2008,09), y: 100.00 }
            ]
          }
        ]
      });

      /*var chart = new CanvasJS.Chart("chartContainer_", {
        title: {
          text: "test Stripline with start & end value"
        },
        axisX: {
          // crosshair: {   
          //   enabled: true,
          //   valueFormatString: "####"
          // },
          valueFormatString: "H:mm",
          interval: 1,
          intervalType: "hour"
        }, 
        axisY: {
          minimum: 0,
          maximum: 100,
          stripLines: [
            {
              startValue: 50,
              endValue: 0,           
              color: "red",
            },
            {
              startValue:51,
              endValue:100,                
              color:"green",
              // label : "Label 1",
              // labelFontColor: "red",
            }
          ]
        },
        data: [
          {
            type: "spline",          
            dataPoints: 
            [
              { x: new Date(2017, 01, 01, 01,20,00), y: 32},
              { x: new Date(2017, 01, 01, 02,10,40), y: 29},
              { x: new Date(2017, 01, 01, 03,15,40), y: 32},
              { x: new Date(2017, 01, 01, 04,29,40), y: 26},
              { x: new Date(2017, 01, 01, 05,29,40), y: 26},
            ]
          }
        ]        
      });*/

      chart.render();
    //-- --//
  });
</script>
@endsection
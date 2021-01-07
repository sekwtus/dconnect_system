<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')}}">
  <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">

  <!-- Color picker plugins css -->
  <link href="{{ asset('assets/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css') }}" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet">
  <title>title</title>
</head>

{{-- @if(Auth::user()->id_type_user != 2)
<body class="skin-blue fixed-layout">
@else --}}

<body class="p-5">

  <div class="row">
    <div class="col-md-2 offset-5 border border-dark rounded">
      <div class="text-center">
      </div>

      <div id="topic_gauge_test" style="width:100%; height:170px"></div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <?php //echo( substr(shell_exec ("ipconfig/all"),66,30) )
  
        // PHP code to get the MAC address of Client 
        $MAC = exec('getmac'); 
          
        // Storing 'getmac' value in $MAC 
        $MAC = strtok($MAC, ' '); 
          
        // Updating $MAC value using strtok function,  
        // strtok is used to split the string into tokens 
        // split character of strtok is defined as a space 
        // because getmac returns transport name after 
        // MAC address    
        echo "MAC address of client is: $MAC"; 
 
      ?>
    </div>

    <div class="col-md-6">
      <div class="example">
        <h5 class="box-title">Simple mode</h5>
        <p class="text-muted m-b-20">just add class <code>.colorpicker</code></p>
        <input type="text" class="colorpicker form-control" value="#7ab2fa" /> 
      </div>
    </div> 
  </div>

</body>

<!-- master -->
<script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/waves.js') }}"></script>
<script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/custom.js') }}"></script>

<!-- Color Picker Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/jquery-asColor/dist/jquery-asColor.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>

<script>
  // color picker

  $(".colorpicker").asColorPicker();
</script>

<!-- e chart -->
<script src="{{ asset('assets/node_modules/echarts/echarts-all.js') }}"></script>
<script type="">
  var guage_option_test = {
    title : { 
      show: false,
      text: 'title sim 3',
      subtext: "% OE",
      // link:'aaaaaa.png',
      target: 'blank', // self
      textStyle: {
        fontSize: 16,
        // fontColor: '#fff000',
        rich: {
          "<style_name>": {
            // fontStyle: "italic",
            // align: "center"
          }
        }
      },
      subtextStyle: { },
      left: "center",
      top: "center",
      // textAlign: 'center',
      // textVerticalAlign: 'center'
    },
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
        center: ['50%', '55%'], // ตำแหน่ง x,y
        radius: '100%', // ขนาด guage
        startAngle: 180, //lef
        endAngle: 0,
        // splitNumber: 10,

        splitLine: { // เส้นขั้นหลัก
          show: false,
          length :13, // ความยาวของเส้นหลัก (0 10 20 30)
          lineStyle: {
            color: 'auto',
            shadowColor: '#000',
            shadowBlur: 4,
          }
        },
        axisTick: { // เส้นขั้นรอง
          show: false,
          splitNumber: 10, // ระยะห่างของค่า value
          length: 10, // ความยาวเส้นรอง
          lineStyle: { // lineStyle
            color: 'auto',
            // shadowColor: '#000', // สีเงาของเส้น guage
            // shadowBlur: 5,
          }
        },
        axisLine: { // ขอบ guage
          lineStyle: {
            color: [
              [0.5, '#ff0000'], [1, '#55ce63'], // ช่วง value ของสี, สี
            ], 
            width: 15, // ความหนาของขอบ guage
          }
        },
        axisLabel: { // ตัวเลข ใน guage
          // lineHeight: 56,
          show: false,
          distance: 5,
          textStyle: {
            color: 'auto', // auto
            fontWeight: 'bolder',
            fontSize: 10,
          }
        },
        pointer : { // เข็ม
          length: 65, // ความยาว
          width : 4, // ความหนา
          color: '#000',
        },
        detail : { // ค่าตัวเลขด้านล่างเกจ
          show : true,
          offsetCenter: [0, '5%'], // ตำแหน่ง x,y
          formatter:'{value}%',
          // backgroundColor: 'rgba(30,144,255,0.8)',
          // borderWidth: 1,
          // borderColor: '#fff',
          // shadowColor: '#fff',
          shadowBlur: 5,
          textStyle: { // TEXTSTYLE
            color: 'auto',
            fontWeight: 'bolder',
            fontSize: 13, // font-size 
          }
        },
        title : { // title ของ name
          show : true,
          offsetCenter: [0, '60%'], // ตำแหน่ง x,y
          textStyle: {
            color: '#000',
            fontWeight: 'bolder',
            fontSize: 14,
            // shadowColor: '#000',
            // shadowBlur: 1
          }
        },

        data:[
          {value: 50, name: 'topic_detail\nมากกว่าหรือเท่ากับ 80'}
        ]
      }
    ]
  }

  topic_gauge_test = echarts.init(document.getElementById(`topic_gauge_test`));

  topic_gauge_test.setOption(guage_option_test, true), $(function() {
    function resize() {
      setTimeout(function() {
        topic_gauge_test.resize();
      }, 100);
    }
    $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
  });
</script>

</html>
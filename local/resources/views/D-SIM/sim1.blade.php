@extends('layouts.master')
@section('title', 'SIM 1')

@section('style')
<link href="{{ asset('assets/dist/css/pages/float-chart.css')}}" rel="stylesheet">
@endsection

@section('main')
<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sample Form with the Icons</h4>
            <h5 class="card-subtitle">made with bootstrap elements</h5>
            <form class="form pt-3">
                <div class="form-group">
                    <label>User Name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon11">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon22">
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon33">
                    </div>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon4">
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="checkbox10" value="check">
                        <label class="custom-control-label" for="checkbox10">Remember Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button type="submit" class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- echart JS -->
<script src="{{ asset('assets/node_modules/echarts/echarts-all.js') }}"></script>


<!--Morris JavaScript -->
<script src="{{ asset('assets/node_modules/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('assets/node_modules/morrisjs/morris.js') }}"></script>
<script type="text/javascript">
  var product_line_chart = Morris.Area({
    element: 'product_line_chart',
    data: [{
      period: '2010',
      line1: 50,
      line2: 80,
      line3: 20
    }, {
      period: '2011',
      line1: 130,
      line2: 100,
      line3: 80
    }, {
      period: '2012',
      line1: 80,
      line2: 60,
      line3: 70
    }, {
      period: '2013',
      line1: 70,
      line2: 200,
      line3: 140
    }, {
      period: '2014',
      line1: 180,
      line2: 150,
      line3: 140
    }],
    xkey: 'period',
    ykeys: ['line1', 'line2', 'line3'],
    labels: ['line1', 'line2', 'line3'],
    pointSize: 3,
    fillOpacity: 0,
    pointStrokeColors:['#55ce63', '#009efb', '#2f3d4a'],
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    lineWidth: 3,
    hideHover: 'auto',
    lineColors: ['#55ce63', '#009efb', '#2f3d4a'],
    resize: true
  });
</script>

<!-- Chart JS -->
<script src="{{ asset('assets/node_modules/Chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">
  $(function () {
    //-- strat bar chart --//
      var labels_ = ["product1","product2","product3","product4","product5","product6","product7","product8"];
      var data_ = [65,59,80,81,56,55,40,30];

      var bar_chart = new Chart(document.getElementById("bar_chart"), {
        "type": "bar",
        "data": {
          "labels": labels_,
          "datasets": [{
            "label": "My First Dataset",
            "data": data_,
            "fill": false,
            "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)","rgba(0, 211, 35, 0.2)"],
            "borderColor":["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)",,"rgba(0, 211, 35, 1)"],
            "borderWidth": 1
          }]
        },

        "options": {
          "scales": {
            "yAxes":[{
              "ticks": {
                "beginAtZero":true
              }
            }]
          }
        }
      });
    //-- end bar chart --//

    // test destroy bar chart //
    $('#btnDestroy').click(function (e) { 
      e.preventDefault();
      bar_chart.destroy();
    });

  });
</script>
@endsection
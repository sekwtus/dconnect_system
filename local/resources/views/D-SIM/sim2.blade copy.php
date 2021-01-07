

<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">SIM 2</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">D-SIM</a></li>
        <li class="breadcrumb-item active">SIM 2</li>
      </ol>
    </div>
  </div>
</div>
<div class="row">
  
  {{-- <h4 class="card-title">Angle offset and arc</h4> --}}
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12 text-center">
          <input data-plugin="knob" data-width="250" data-height="250" data-min="-100" data-fgColor="#f62d51" data-displayPrevious=true data-angleOffset=-125 data-angleArc=250 value="56" />
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Product line Chart</h4>
        <ul class="list-inline text-right">
          <li>
            <h5><i class="fa fa-circle m-r-5 text-inverse"></i>line1</h5>
          </li>
          <li>
            <h5><i class="fa fa-circle m-r-5 text-info"></i>line2</h5>
          </li>
          <li>
            <h5><i class="fa fa-circle m-r-5 text-success"></i>line3</h5>
          </li>
        </ul>
        
        <div id="product_line_chart" height="150"></div>
      </div>
    </div>
  </div>

  <div class="col-md-6 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">
          Bar Chart 
          <!-- <button id="btnDestroy">btnDestroy</button> -->
        </h4>
        <div>
          <canvas id="bar_chart" height="150"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!--jquery knob -->
<script src="{{ asset('assets/node_modules/knob/jquery.knob.js') }}"></script>
<script type="text/javascript">
$(function() {
  $('[data-plugin="knob"]').knob();
});
</script>

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
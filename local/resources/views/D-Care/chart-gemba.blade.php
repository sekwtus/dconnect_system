@extends('layouts.master')
@section('title', 'D-Care : Gemba Chart')

@section('style')
  <style type="media">
    
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">{{ $d_care_layout->name }} Chart</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">D-Care</a>
        </li>
        <li class="breadcrumb-item active">Chart</li>
      </ol>
    </div>
  </div>
</div>

<div class="row"> 

  <div class="col-md-6 stretch-card">
    <div class="card">
      <div class="card-body">
        
        <div class="row row-bar">
          <div class="col-md-6">
            <label class="mb-0">Bar Chart Title</label>
  
            <input value="Bar" class="txt_title form-control" placeholder="Chart Title">
          </div>
  
          <div class="col-md-6">
            <label class="mb-0">Date</label>

            {{-- <div class="input-daterange input-group" id="date-range">
                <input type="text" class="form-control" name="start" />
                <div class="input-group-append">
                    <span class="input-group-text bg-info b-0 text-white">TO</span>
                </div>
                <input type="text" class="form-control" name="end" />
            </div> --}}

            <div class="input-group">
              <input id="txt_bar_date" class="txt_date form-control">

              <span class="input-group-append">
                <span class="input-group-text">
                  <span class="ti-calendar"></span>
                </span>

                <button id="btn-bar-chart" onclick="draw_chart('bar', this)" class="btn btn-success">OK</button>
              </span>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-6 stretch-card">
    <div class="card">
      <div class="card-body">

        <div class="row row-pie">
          <div class="col-md-6">
            <label class="mb-0" style="color:;">Pie Chart Title</label>

            <input value="Pie" class="txt_title form-control" placeholder="Chart Title">
          </div>
  
          <div class="col-md-6">
            <label class="mb-0">Date</label>

            <div class="input-group">
              <input id="txt_pie_date" class="txt_date form-control">

              <span class="input-group-append">
                <span class="input-group-text">
                  <span class="ti-calendar"></span>
                </span>

                <button id="btn-pie-chart" onclick="draw_chart('pie', this)" class="btn btn-success">OK</button>
              </span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>

<div class="row"> 

  <div class="col-md-6 stretch-card">
    <div class="card">
      <div class="card-body">
        
        <canvas id="bar-chart" height="0"></canvas>

      </div>
    </div>
  </div>
      
  <div class="col-md-6 stretch-card">
    <div class="card">
      <div class="card-body">
        <canvas id="pie-chart" height=""></canvas>
      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
<script type="text/javascript">

// var arr_d_care_area= {!! json_encode($d_care_area) !!};
  $(document).ready(function () {
    set_daterange('#txt_bar_date');
    set_daterange('#txt_pie_date');

    draw_chart('bar');
    draw_chart('pie');
  });
    
  function score_color(type,score) {
    if(type == 'bg_graph') {
      var transperent = '0.2';
    } else if(type == 'bg_map') {
      var transperent = '0.6';
    } else if(type == 'bd') {
      var transperent = '1';
    }
    
    if(score >= 5) {
      return `rgba(0, 211, 35, ${transperent})`;
      // return `rgba(0, 128, 0, ${transperent})`;
    } else if(score >= 4) {
      return `rgba(187, 255, 0, ${transperent})`;
      // return `rgba(0, 255, 0, ${transperent})`;
    } else if(score >= 3) {
      return `rgba(255, 255, 0, ${transperent})`;
    } else if(score >= 2) {
      return `rgba(255, 157, 0, ${transperent})`;
      // return `rgba(255, 140, 0, ${transperent})`;
    } else {
      return `rgba(255, 0, 0, ${transperent})`;
    } 
  }

  function draw_chart(type_chart, that=null) {

    var title;
    var date_start;
    var date_end;

    if(that != null) {
      title = $(that).parents(`.row-${type_chart}`).find('.txt_title').val();

      let txt_date_range = $(that).parents(`.row-${type_chart}`).find('.txt_date');
      date_start = date_range[txt_date_range.attr('id')].data('daterangepicker').startDate.format('YYYY-MM-DD');
      date_end = date_range[txt_date_range.attr('id')].data('daterangepicker').endDate.format('YYYY-MM-DD');
    }

    if(typeof title === 'undefined'){
      if(type_chart == 'bar') {
        title = 'Finding Report by Area';
      }
      else if(type_chart == 'pie') {
        title = 'Actions Status in all Area';
      }
    }

    // date_start = moment(day_range).format('DD/MM/YYYY'); // moment(day_range).add(7,'d').format('DD/MM/YYYY');
    var obj_data = {
      type_chart:type_chart,
      date_start:date_start,
      date_end:date_end
    };
    
    console.log(
      // that,
      title,
      // txt_date_range.attr('id'),
      obj_data,
    );
    // return false;

    var arr_label;
    // bar chart
    if(type_chart == 'bar') {
      arr_label = {!! json_encode($d_care_area) !!};

      $.ajax({
        type: `get`,
        url: `{{ url('get-gemba-chart') }}`,
        data: obj_data,
        
        success: function (res) {
          // console.log('bar', res);
          // return false;
          let value = {
            type_chart: type_chart,
            title_text: title,
            min_value: '0',
            max_value: '100',
            step_size: 10,
            bg_color: arr_label.map(val=> {
              return val.color_chart;
            }),
            labels: res.chart_data.map(area=> {
              return area.area_name;
            }),
            data: res.chart_data.map(count=> {
              return count.count_comment;
            }),
          };

          bar_chart(value);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
        },
      });
    }

    // pie chart
    else if(type_chart == 'pie') {
      
      arr_label = {!! json_encode($master_pdca) !!};

      $.ajax({
        type: `get`,
        url: `{{ url('get-gemba-chart') }}`,
        data: obj_data,
        
        success: function (res) {
          console.log(
            // 'pie',
            // res,
          );
          // return false;

          let value = {
            type_chart: type_chart,
            title_text: title,
            min_value: '0',
            max_value: '100',
            step_size: 10,
            bg_color: arr_label.map(val=> {
              return val.color_chart;
            }),
            labels: arr_label.map(val=> {
              let pdca = val.description.split(',');
              return pdca[0];
            }),
            data: arr_label.map(val=> {
              if(val.status == 'p') {
                return res.chart_data.p;
              }
              if(val.status == 'd') {
                return res.chart_data.d;
              }
              if(val.status == 'c') {
                return res.chart_data.c;
              }
              if(val.status == 'a') {
                return res.chart_data.a;
              }
            }),
          };

          pie_chart(value);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
        },
      });
    }
  }
  
  var arr_bar_chart = {};
  function bar_chart(value) {
    // const arr_period = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']; // months.splice(3,2);
    // arr_total.shift(); // ลบ value Total/Average ออกก่อน
    // console.log('bar', value);
    // return false;

    if(arr_bar_chart[`bar_chart`]) { 
      // ถ้ามีชาทอันเก่าอยุ่แล้ว ให้ destroy ก่อน
      arr_bar_chart[`bar_chart`].destroy();
    }

    arr_bar_chart[`bar_chart`] = new Chart(document.getElementById(`bar-chart`), {
      type: `bar`,
      data: {
        labels: value.labels,
        datasets: [
          {
            // showLine: parseInt(value.show_line),
            label: 'Count',
            // type: `bar`,
            fill: false,
            backgroundColor: value.bg_color,
            borderColor: value.labels.map(val=> {
              return '#000';
            }),
            borderWidth: 1,
            // data: arr_period.map(day=> {
            //   return getRandomInt(5,50);
            // }),
            data: value.data,
            // lineTension: 0.4, // ความโค้งของเส้น
          }
        ],
      }, 

      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend:{
          display: false,
        },
        title: {
          display: true,
          text: value.title_text
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
              min: value.min_value,
              max: value.max_value,
              fontColor: '#000', // สี label แกน Y
              stepSize: value.step_size,
              callback: function(value, index, values) {
                return value;
              }
            },
          }],
        }
      }
    });
    arr_bar_chart[`bar_chart`].canvas.parentNode.style.height = '300px';
  }
  
  var arr_pie_chart = {};
  function pie_chart(value) {
    // console.log('pie', value);
    // return false;

    if(arr_pie_chart[`pie_chart`]) {
      arr_pie_chart[`pie_chart`].destroy();
    }

    arr_pie_chart[`pie_chart`] = new Chart(document.getElementById(`pie-chart`), {
      type: `pie`,
      data: {
        labels: value.labels,
        datasets: [
          {
            fill: false,
            backgroundColor: value.bg_color,
            data: value.data,
          }
        ],
      }, 

      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend:{
          display: true,
        },
        title: {
          display: true,
          text: value.title_text
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItems, data) {
              // console.log(tooltipItems,data);
              return data.labels[tooltipItems.index] +': ' +data.datasets[0].data[tooltipItems.index]+ ' %';
            }
          }
        },
        /*
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
                stepSize: value.step_size,
                callback: function(value, index, values) {
                  return value;
                }
              },
            }],
          }
        */
      }
    })
  }
</script>
@endsection
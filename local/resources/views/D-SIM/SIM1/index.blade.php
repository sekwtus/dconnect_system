@extends('layouts.master')
@section('title', 'SIM 1')

@section('style')
<style>
    select optgroup{
    background:#000;
    color:#fff;
    font-style:normal;
    font-weight:bold;
    font-size:70px;
    }
</style>


  <!-- sweet alerts CSS -->
  <link href="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
  
  {{-- date counter --}}
  <link href="{{ asset('assets/dist/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('main')

@if(session()->has('message'))
    <script type="text/javascript">
        alert(" {{ session()->get('message') }} ");
    </script>
@endif

<div class="row">
  


    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-body">
            {{-- <h4 class="card-title text-center" >เวลา : <span class="time_now"></span> </h4> --}}
            <h5 class="card-subtitle row">
              <div class="col-sm-4">แบช : {{ isset($order_detail) ? $order_detail[0]->batch : '' }}</div>
              <div class="col-sm-4">Order : {{ $order }}</div>
              <div class="col-sm-4">เวลาเริ่ม / เวลาจบ :{{ isset($order_detail) ? ' '.
                substr($order_detail[0]->scheduled_time,0,2).':'.substr($order_detail[0]->scheduled_time,2,2).':'.substr($order_detail[0]->scheduled_time,4,2)
                . ' - ' .
                substr($order_detail[0]->scheduled_end_time,0,2).':'.substr($order_detail[0]->scheduled_end_time,2,2).':'.substr($order_detail[0]->scheduled_end_time,4,2)
                : '' }}
              </div>
              <div class="col-sm-4">Output TAM (ซอง) : </div>
              <div class="col-sm-4">Output FG (ซอง) : </div>
              <div class="col-sm-4">%OE : </div>
            </h5>
        </div>
      </div>
    </div>

    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center">เวลาที่สูญเสียจากการบรรจุ</h4>
            {{-- <h5 class="card-subtitle row">
              <div class="col-sm-4">กะ : </div>
              <div class="col-sm-4">Line Leader : </div>
              <div class="col-sm-4">Operator : </div>
              <div class="col-sm-4">อุณหภูมิ (C) : </div>
              <div class="col-sm-4">ความชื้น (%RH) : </div>
              <div class="col-sm-4">Pressure Differnce (Pa) : </div>
            </h5> --}}
            <div class="row text-center">
              <div class="col-sm-4"></div>
              <div class="col-sm-4 btn-start-stop" >
                <button class="btn btn-info col-12" onclick="set_time_start()"> START </button>
              </div>

            </div>
            <br>
            <div class="row text-center">
                <h2 class="col-12 time_nows" style="font-weight:bold;"></h2>
            </div>


        </div>
      </div>
    </div>

    <div class="col-md-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">เวลาที่สูญเสียจากสาเหตุไม่ปกติ (Unexpected Stoppage)</h4>
            {{-- <h5 class="card-subtitle">made with bootstrap elements</h5> --}}
            {{ Form::open(['method' => 'post' , 'url' => 'D-SIM/SIM1/send_lose_case']) }}

            {{-- <form class="form pt-3" id="frm-lose-case"> --}}

                <div class="row">
                  
                    <div class="form-group col-6">
                      <label for="department" >แผนก :</label>
                         <input type="text" name="department" class="form-control" value="{{ $branch_user->type_branch }}" readonly>
                         <input type="hidden" name="department_id" class="form-control" value="{{ $branch_user->id }}" readonly>
                         <input type="hidden" name="production_order" class="form-control" value="{{ $order }}" readonly>
                    </div>

                    <div class="form-group col-6">
                      <label for="line" >Line :</label>
                      <input type="text" name="line" class="form-control" value="{{ isset($order_detail) ? $order_detail[0]->line_number : '' }}" readonly>
                        {{-- <select class="select2 form-control custom-select" id="" name="line" style="width: 100%; height:36px;">
                          <option value=""></option>
                          @foreach ($line_master as $line)
                            <option value="{{ $line->id }}">{{ $line->line_number }}</option>
                          @endforeach
                        </select> --}}
                    </div>

                    <div class="form-group col-8">
                      <label for="ddlUser" >สาเหตุที่ไม่ปกติ :</label>
                          <select class="select2 form-control" id="" name="lose_case_id" style="width: 100%; height:36px; font-size:70px;">
                              <option value=""></option>
                            @foreach ($group_topic as $group_)
                              <optgroup style="font-size: 20px;" label="{{ $group_->topic }} {{-- $group_->branch_id --}}">
                                @foreach ($lose_cases as $lose_case)
                                    @if ( $lose_case->topic_id == $group_->topic_id )
                                        <option value="{{ $lose_case->id_lose_case }}">{{ $lose_case->detail }}</option>
                                    @endif
                                @endforeach
                            @endforeach
                          </select>
                    </div>

                    <div class="form-group col-4">
                      <label for="ddlUser" >ช่วงเวลาที่เกิดเหตุ :</label>
                          <select class="select2 form-control custom-select" id="" name="time_period" style="width: 100%; height:36px;">
                            @foreach ($period_time as $period)
                            <option value="{{ $period->id }}">{{ $period->period }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <div class="form-group col-12">
                  <label for="description" >คำอธิบายประกอบ :</label>
                      <textarea class="form-control" name="description" id="" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>เวลาที่สูญเสีย :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                        </div>
                        <input type="text" name="lose_time" id="lose_time" value="" class="form-control" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text">นาที</span>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-success mr-2">บันทึก</button>
                </div>
                {{-- <button type="" class="btn btn-dark">Cancel</button> --}}
            {{-- </form> --}}
            {{ form::close() }}
        </div>
    </div>
  </div>




</div>
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/sweet-alert.init.js') }}"></script>

{{-- countdown time --}}
<script src="{{ asset('assets/dist/js/jquery.plugin.js') }}"></script>
<script src="{{ asset('assets/dist/js/jquery.countdown.js') }}"></script>

<script>
  $(document).ready(function() {
    $(".select2").select2();
    // alert_startStop({title:'test'});
    var get_time = '{{ $time_start }}';
    if (get_time) {
      alert_startStop(get_time);
    }
  } );
</script>

<script>
  function set_time_start(){
    var dt = new Date();
    var time_now = moment(dt).format('YYYY-MM-DD H:m:s');

      $.ajax({
        type: 'GET',
            dataType: 'JSON',
            url: '{{ url('D-SIM/SIM1/set_time_start') }}',
            data: {order:'{{ $order }}',time_now:time_now},
            beforeSend: function(){
            },
            success: function (data) {
              console.log(data.msg);
              alert_startStop(data.time);
            },  
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function(){
            },
      });
  }
  var count_time;
  function alert_startStop(time) {
      $('.btn-start-stop').html('<button class="img-fluid model_img btn btn-danger col-12"  onclick="set_time_stop()"  > STOP </button>');

      var dt = new Date();
      var time_now = moment(dt).format('YYYY-MM-DD H:m:s');
      // var dt2 = new Date(time);
      // var time_now2 = moment(dt2).format('YYYY-MM-DD H:m:s');


      var startTime = moment(time, "YYYY-MM-DD H:m:s");
      var endTime = moment(time_now, "YYYY-MM-DD H:m:s");
      // calculate total duration
      var duration = moment.duration(endTime.diff(startTime));
      var hours = parseInt(duration.asHours());
      var minutes = parseInt(duration.asMinutes())%60;
      var seconds = parseInt(duration.asSeconds())%(60*60);

      var h = hours;
      var m = minutes;
      var s = seconds - (minutes * 60);

      var ss,mm = '';
      // console.log('start ' +time_now2);
      // console.log('stop ' +time_now);

      count_time = setInterval(function(){
          s++;
          if (s === 60) {
            s = 0;
            m++;
          } 
          if(m === 60){
            m = 0;
            h++;
          }
          // console.log(s / 10);
          if (s / 10 < 1) {
              ss = '0'+s;
          }else  ss = s;

          if (m / 10 < 1) {
              mm = '0'+m;
          }else  mm = m;

          // $('.time_nows').html(h +':'+ mm +':'+ ss).val(h +':'+ m);
          $('.time_nows').html(h +':'+ mm +':'+ ss);
      },1000);
  }

  function set_time_stop(){
    clearInterval(count_time);

    var dt = new Date();
    var time_now = moment(dt).format('YYYY-MM-DD H:m:s');

      $.ajax({
        type: 'GET',
            dataType: 'JSON',
            url: '{{ url('D-SIM/SIM1/set_time_stop') }}',
            data: {order:'{{ $order }}',time_now:time_now},
            beforeSend: function(){
            },
            success: function (data) {
              console.log(data.msg);
              $('.btn-start-stop').html('<button class="img-fluid model_img btn btn-info col-12"  onclick="set_time_start()"  > START </button>');

              var startTime = moment(data.time_start, "YYYY-MM-DD H:m:s");
              var endTime = moment(data.time_stop, "YYYY-MM-DD H:m:s");

              var duration = moment.duration(endTime.diff(startTime));
              var hours = parseInt(duration.asHours());
              var minutes = parseInt(duration.asMinutes())%60;
              var seconds = parseInt(duration.asSeconds())%(60*60);

              var time_lose = parseInt( (hours*60) + minutes );
              alert(time_lose);

              console.log((hours*60));
              console.log(minutes);

              $('#lose_time').val(time_lose);
            },  
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function(){
            },
      });
  }


</script>

@endsection
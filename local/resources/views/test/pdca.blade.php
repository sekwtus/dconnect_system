@extends('layouts.master')
@section('title', 'SIM2 PDCA')
@section('style')
<link href="{{ asset('assets/dist/css/pages/ribbon-page.css')}}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/progressbar-page.css')}}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css')}}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/css-chart/css-chart.css')}}" rel="stylesheet">

<link href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

{{-- voice record --}}
@endsection

@section('main')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">PLAN DO CHECK ACT</h4>
            <h6 class="card-subtitle"> 
                <div class="row"> 
                    <div class="col-9"> Plan : อธิบายปัญหา, ใช้ก้างปลา, 5 WHY ค้นหาต้นเหตุ, อธิบายการแก้ไข, ระบุผู้รับผิดชอบและวันกำหนดวันเสร็จ <br>
                        Do : ลงมือแก้ไข Check : ทวนสอบปัญหาว่าจะไม่เกิดขึ้นซ้ำ Act : ผู้พบปัญหาทวนสอบหลังจากแก้ไขแล้วภายใน 15 วัน </div>        
                    <div class="col-3 text-right"> 
                        <button type="button" class="btn waves-effect waves-light btn-success text-right model_img img-responsive" alt="default" data-toggle="modal" data-target="#adding_modal" >เพิ่มหัวข้อ</button> 
                        </div>                          
                </div>
            </h6>

                <input class="form-control"  id="note-textarea" placeholder="" rows="6" autofocus />
                <button class="btn btn-success" id="start-record-btn" title="Start Recording">Start</button>
                <button class="btn btn-success" id="pause-record-btn" title="Pause Recording">Pause</button>
                <button class="btn btn-success" id="save-note-btn" title="Save Note">Save</button>   
            
            <div class="table-responsive">
                <table class="table table-striped" id="order_table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วันที่</th>
                            <th>รายละเอียดของปัญหา</th>
                            <th>สาเหตุของปัญหา</th>
                            <th>การแก้ไข, วิธีการ</th>
                            <th>ผู้รับผิดชอบ</th>
                            <th>วันที่จะทำ</th>
                            <th>วันที่ทำจริง</th>
                            <th>PDCA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1x</td>
                            <td>x</td>
                            <td>x</td>
                            <td>x</td>
                            <td>x</td>
                            <td>x</td>
                            <td>x</td>
                            <td>x</td>
                            <td>x</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="adding_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['method' => 'post' , 'url' => '/knowledge/add_topic']) }}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ฐานความรู้</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">หัวข้อ :</label>
                        <input type="text" class="form-control" name="topic" id="recipient-name" require>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">รายละเอียด :</label>
                        <textarea class="form-control" id="message-text" name="detail" require></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light">Save</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@endsection
@section('script')
{{-- voice record --}}
<script src="{{asset('/assets/dist/js/jquery.min.js')}}"></script>
<script src="{{ asset('dist/voice_convert_to_text/script.js')}}"></script>


<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/sweet-alert.init.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#order_table').DataTable( {
        } );
    } );
</script>
@endsection
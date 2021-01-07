@extends('layouts.master')

@section('title', 'D-Link')

@section('style')
    <link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/pages/progressbar-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">

@endsection

@section('main')
    <div class="card col-md-12">
        <div class="card-body">
            <h4 class="card-title">Order</h4>
            <div class="row">
                <div class="col-4 text-left">
                    <h6 class="card-subtitle">แสดง Order ในแต่ละไลน์ผลิต</h6>
                </div>
                <div class="col-4">
                </div>
                <div class="col-4 text-right">
                    <button type="button" class="btn waves-effect waves-light btn-info text-right model_img img-responsive" alt="default" data-toggle="modal" data-target="#adding_modal" ><i class="fa fa-plus"></i></button> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable no-footer" id="order_table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>แผนก</th>
                            <th>หัวข้อ</th>
                            <th>เป้าหมาย</th>
                            <th>ขนาด</th>
                            <th>หน่วย</th>
                            <th>ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count=1;
                        @endphp
                        @foreach ($data_sim_master as $sim_master )
                            <tr>
                                <th>{{ $count++ }}</th>
                                <th>{{ $sim_master->department }}</th>
                                <th>{{ $sim_master->topic_eng }}</th>
                                <th>{{ $sim_master->target }}</th>
                                <th>{{ $sim_master->standard_rate }}</th>
                                <th>{{ $sim_master->unit }}</th>
                                <th><button type="button" class="btn waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></th>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="adding_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(['method' => 'post' , 'url' => '/setting/add_sim_topic']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">เพิ่มหัวข้อ SIM </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">แผนก :</label>
                            <select name="department" id="department" required class="form-control " >
                                <option value=""></option>
                                @foreach ($department as $depart)
                                    <option value="{{ $depart->department_id }}">{{ $depart->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">หัวข้อ :</label>
                            <select name="sim_standard" id="sim_standard" required class="form-control " >
                                <option value=""></option>
                                @foreach ($sim_standard as $sim_s)
                                    <option value="{{ $sim_s->topic_id }}">{{ $sim_s->topic_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">เป้าหมาย :</label>
                            <select name="target" id="target" required class="form-control " >
                                <option value=""></option>
                                <option value="<"><</option>
                                <option value=">">></option>
                                <option value="<="><=</option>
                                <option value=">=">>=</option>
                                <option value="==">=</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="message-text" class="control-label">ขนาด :</label>
                                    <input type="number" class="form-control" name="standard_rate" id="standard_rate" require>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="message-text" class="control-label">หน่วย :</label>
                                    <input type="text" class="form-control" name="unit" id="unit" require>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>


@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#order_table').DataTable( {
        } );
    } );
</script>
@endsection

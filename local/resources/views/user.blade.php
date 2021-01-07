@extends('layouts.master')

@section('title', 'User')

@section('style')
<link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/progressbar-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">

@endsection

@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="card-subtitle">แสดง user ทั้งหมดในระบบ</h6>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-right">
                        <a href="user/add" target="_blank"><button type="button" class="btn btn-info"><i
                                    class="fa fa-plus-circle"></i> New User </button></a>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped" id="user_table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td style="vertical-align:middle;">{{ $user->username }}</td>
                                <td style="vertical-align:middle;">{{ $user->name }}</td>
                                <td style="vertical-align:middle;">{{ $user->email }}</td>
                                <td style="vertical-align:middle;">{{ $user->phone }}</td>
                                <td style="vertical-align:middle;">
                                    <a href="user/{{ $user->id }}" target="_blank">
                                        <button type="button" class="btn btn-success">Detail </button>&nbsp;&nbsp;
                                        {{-- <button type="button" class="btn btn-danger">Delete </button> --}}
                                    </a>
                                </td>

                                {{-- <td class="text-nowrap">
                                <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#user_table').DataTable( {
        } );
    } );
</script>

<script>
    // var table = $('#user_table').DataTable({
    //         destroy: true,
    //         dom: 'lfrtip',
    //         // buttons: [
    //         //     'print'
    //         // ],
    //         lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
    //         "scrollX": false,
    //         orderCellsTop: true,
    //         fixedHeader: true,
    //         rowReorder: true,
    //         // processing: true,
    //         // serverSide: true,
    //         "order": [],
    //     });
</script>
@endsection
@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endsection

@section('main')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Setting User</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Setting</a></li>
                <li class="breadcrumb-item active">Setting User</li>
            </ol>
            <button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal"
                data-target="#add_user"><i class="fa fa-plus-circle"></i>
                Create New</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <!-- table responsive -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List User</h4>
                {{-- <h6 class="card-subtitle">Data table example</h6> --}}
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Employee Code</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Position</th>
                                <th>E-mail</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" id="add_user" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ url('settings/user') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usernmae" class="control-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee_code" class="control-label">Employee Code:</label>
                                <input type="text" class="form-control" id="employee_code" name="employee_code"
                                    placeholder="Employee Code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="control-label">First name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="control-label">Last name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position:</label>
                                <select class="form-control custom-select" id="position" name="position">
                                    <option value="" selected hidden>--Select Position--</option>
                                    @foreach ($position as $item)
                                    <option value="{{ $item->Code_Position }}">{{ $item->Name_Position }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail:</label>
                                <input type="text" class="form-control email-inputmask" id="email" name="email"
                                    placeholder="E-mail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number" class="control-label">Phone Number:</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="control-label">Address:</label>
                                <input type="text" class="form-control" id="address" placeholder="Address"
                                    name="address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type user:</label>
                                <select class="form-control custom-select" id="type_user" name="type_user">
                                    <option value="" selected hidden>--Select Type User--</option>
                                    @foreach ($type_user as $item)
                                    <option value="{{ $item->id  }}">{{ $item->type_user }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect text-left">
                        Save
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" id="edit_user" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form_edit" action="{{ url('settings/user') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usernmae" class="control-label">Username:</label>
                                <input type="text" class="form-control" id="usernmae_edit" name="username"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee_code" class="control-label">Employee Code:</label>
                                <input type="text" class="form-control" id="employee_code_edit" name="employee_code"
                                    placeholder="Employee Code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="control-label">First name:</label>
                                <input type="text" class="form-control" id="first_name_edit" name="first_name"
                                    placeholder="First name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="control-label">Last name:</label>
                                <input type="text" class="form-control" id="last_name_edit" name="last_name"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position:</label>
                                <select class="form-control custom-select" id="position_edit" name="position">
                                    <option value="" selected hidden>--Select Position--</option>
                                    @foreach ($position as $item)
                                    <option value="{{ $item->Code_Position }}">{{ $item->Name_Position }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail:</label>
                                <input type="email" class="form-control email-inputmask" id="email_edit" name="email"
                                    placeholder="E-mail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number" class="control-label">Phone Number:</label>
                                <input type="tel" class="form-control" id="phone_number_edit" name="phone_number"
                                    placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="control-label">Address:</label>
                                <input type="text" class="form-control" id="address_edit" name="address"
                                    placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_user" class="control-label">Type user:</label>
                                <select class="form-control custom-select" id="type_user_edit" name="type_user">
                                    <option value="" selected hidden>--Select Type User--</option>
                                    @foreach ($type_user as $item)
                                    <option value="{{ $item->id  }}">{{ $item->type_user }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect text-left">
                        Save
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" id="del_user" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Delete User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form_del" action="{{ url('settings/user') }}" method="POST">
                @csrf
                <div class="modal-body text-center">
                    <h3>Are you sure?</h3>
                    <h4>You won't be able to revert this!</h4>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" value="Delete" class="btn btn-info waves-effect text-left">
                        Delete
                    </button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection

@section('script')
<!-- This is data table -->
<script src="{{ asset('/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('/assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('/assets/node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('/dist/js/pages/mask.init.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="{{asset('/assets/dist/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/dist/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('/assets/dist/js/jszip.min.js')}}"></script>
<script src="{{asset('/assets/dist/js/pdfmake.min.js')}}"></script>
<script src="{{asset('/assets/dist/js/vfs_fonts.js')}}"></script>
<script src="{{asset('/assets/dist/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/assets/dist/js/buttons.print.min.js')}}"></script>
<!-- end - This is for export functionality only -->

<script>
    $(function () {
        // responsive table
        var table = $('#config-table').DataTable({
            processing: true,
            'language':{ 
                "loadingRecords": "&nbsp;",
                "processing": "Loading..."
            },
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 0, 'asc' ]],
            responsive: true,
            ajax: {
                url: 'user/ajax',
                contentType: "application/json",
                type: "GET",
            },
            columns: [
                { data: 'id', name: 'id', searchable: false},
                { data: 'username', name: 'username' },
                { data: 'Employee_Code', name: 'Employee_Code' },
                { data: 'FirstName', name: 'FirstName' },
                { data: 'LastName', name: 'LastName' },
                { data: 'Name_Position', name: 'Name_Position' },
                { data: 'email', name: 'email' },
                { data: 'Phone_number', name: 'Phone_number' },
                { data: 'Address', name: 'Address' },
                { data: 'type_user', name: 'type_user' },
                {}
            ],
            columnDefs: [
                {
                    "targets": 0,
                    "className": "text-center",
                },
                {
                    "targets": 1,
                },
                {
                    "targets": 2,
                },
                {
                    "targets": 3,
                },
                {
                    "targets": 4,
                },
                {
                    "targets": 5,
                },
                {
                    "targets": 6,
                },
                {
                    "targets": 7,
                },
                {
                    "targets": 8,
                },
                {
                    "targets": 9,
                },
                {
                    "targets": 10,
                    render: function(data, type, row, meta)
                    {
                        return "\
                            <input type='hidden' name='_method' value='delete'>\
                            <button class='btn waves-effect waves-light btn-warning btn-xs' data-toggle='modal' data-target='#edit_user' data-value="+meta.row+" id='button_edit'>\
                                <i class='fa fa-pencil' aria-hidden='true'></i>\
                            </button>\
                            <button class='btn waves-effect waves-light btn-danger btn-xs' data-toggle='modal' data-target='#del_user' data-value="+meta.row+" id='button_del'>\
                                <i class='fa fa-trash' aria-hidden='true'></i>\
                            </button>";
                        
                    }
                },
            ],
        });
        // <form methods='post' action='settings/user/"+row.username+"'>\
        //     @csrf\
        //     @method('PUT')\
        // </form>
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();

        $('#config-table tbody').on('click', '#button_edit', function (e) {
            var data = table.row($(this).data("value")).data();
            $('#usernmae_edit').val(data.username);
            $('#employee_code_edit').val(data.Employee_Code);
            $('#first_name_edit').val(data.FirstName);
            $('#last_name_edit').val(data.LastName);
            $('#position_edit').val(data.Code_Position);
            $('#email_edit').val(data.email);
            $('#phone_number_edit').val(data.Phone_number);
            $('#address_edit').val(data.Address);
            $('#type_user_edit').val(data.id_type_user);
            $('#form_edit').attr('action', "{{ url('settings/user') }}/"+data.username+"");
        } );

        $('#config-table tbody').on('click', '#button_del', function (e) {
            var data = table.row($(this).data("value")).data();
            $('#form_del').attr('action', "{{ url('settings/user') }}/"+data.username+"");
        } );
    });
</script>
@endsection
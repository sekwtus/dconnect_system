@extends('layouts.master')

@section('title', 'Add User')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection

@section('main')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Add User</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Setting</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active">Add User</li>
            </ol>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        {{ Form::open(['method' => 'POST' , 'url' => 'user/add/save', 'files' => true, 'class' => 'form-horizontal form-material']) }}
        <div class="form-group">
            <label class="col-md-12">Username</label>
            <div class="col-md-12">
                <input type="text" placeholder="ชื่อผู้ใช้" class="form-control form-control-line" name="username">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Full Name</label>
            <div class="col-md-12">
                <input type="text" placeholder="ชือ - สกุล" class="form-control form-control-line" name="name">
            </div>
        </div>
        <div class="form-group">
            <label for="example-email" class="col-md-12">Email</label>
            <div class="col-md-12">
                <input type="email" placeholder="อีเมล" class="form-control form-control-line" name="email"
                    id="example-email">
            </div>
        </div>
        <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="รหัสผ่าน"  class="form-control form-control-line" name="password">
                    </div>
                </div>
        <div class="form-group">
            <label class="col-md-12">Phone No</label>
            <div class="col-md-12">
                <input type="text" placeholder="เบอร์โทร" class="form-control form-control-line" name="phone">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12">Address</label>
            <div class="col-md-12">
                <input type="text" placeholder="ที่อยู่" class="form-control form-control-line" name="address">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12">Type User</label>
            <div class="col-md-12">
                <select class="form-control custom-select" id="type_user" name="type_user" onchange="eventtypeuser(this.value)">
                    <option value="" selected hidden>--Select Type User--</option>
                    @foreach ($type_user as $out_type_user)
                    <option value="{{ $out_type_user->id  }}">{{ $out_type_user->type_user }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group hide" id="type_branch">
            <label class="col-md-12">Type Branch</label>
            <div class="col-md-12">
                <select class="form-control custom-select" id="type_branch" name="type_branch">
                    <option value="" selected hidden>--Select Type Branch--</option>
                    @foreach ($type_branch as $out_type_branch)
                    <option value="{{ $out_type_branch->id  }}">{{ $out_type_branch->type_branch }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group hide" id="type_line">
            <label class="col-md-12">Line</label>
            <div class="col-md-12">
                <select class="form-control custom-select" id="type_line" name="type_line">
                    <option value="" selected hidden>--Select Line--</option>
                    @foreach ($type_line as $out_type_line)
                    <option value="{{ $out_type_line->id  }}">{{ $out_type_line->type_line }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12">Picture Profile</label>
            <div class="col-md-12">
                <input type="file" id="input-file-now" class="dropify" name="pic_profile"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12">Signature</label>
            <div class="col-md-12">
                <input type="file" id="input-file-now" class="dropify" name="signature"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success" type="submit">Add User</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>

<script>
    function eventtypeuser(type){
    if(type=='2'){
        $('#type_branch').show();
        $('#type_line').show();
    }else{
        $('#type_branch').hide();
        $('#type_branch').val(null);
        $('#type_line').hide();
        $('#type_line').val(null);
    }
  }

    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
@endsection

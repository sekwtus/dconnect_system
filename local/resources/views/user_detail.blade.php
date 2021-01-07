@extends('layouts.master')

@section('title', 'Detail User')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection

@section('main')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Detail User</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Setting</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active">Detail User</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                @foreach ($users as $out_users)
                <div class="card-body">
                    <center class="m-t-10">
                        @if($out_users->pic_profile != NULL)
                        <img src="{{ asset('/assets/profile'.'/'. $out_users->pic_profile)}}" class="img-circle" width="150" />
                        @else
                        <img src="{{ asset('/assets/images/user.jpg')}}" class="img-circle" width="150" />
                        @endif
                        <h4 class="card-title m-t-10">{{ $out_users->name }}</h4>
                        <h6 class="card-subtitle">
                            @foreach ($type_user as $out_type_user)
                                @if($out_type_user->id == $out_users->id_type_user)
                                {{ $out_type_user->type_user }}
                                @endif
                            @endforeach
                        </h6>
                        {{-- <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div> --}}
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>{{ $out_users->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                    <h6>{{ $out_users->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                    <h6>{{ $out_users->address }}</h6>
                    {{-- <div class="map-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div> <small class="text-muted p-t-30 db">Social Profile</small>
                    <br/>
                    <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> --}}
                </div>
                @endforeach
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--second tab-->
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            @foreach ($users as $out_users)
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">{{ $out_users->name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">{{ $out_users->phone }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ $out_users->email }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">Thai</p>
                                </div>
                            </div>
                            @endforeach
                            <hr>
                            {{-- <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> --}}
                            <h4 class="font-medium m-t-30">Skill Set</h4>
                            <hr>
                            <h5 class="m-t-30">Skill 1 <span class="pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">Skill 2 <span class="pull-right">90%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">Skill 3 <span class="pull-right">50%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">Skill 4 <span class="pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card-body">
                            {{ Form::open(['method' => 'POST' , 'url' => 'user/detail/save', 'files' => true, 'class' => 'form-horizontal form-material']) }}
                            @foreach ($users as $out_users)
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="ชือ - สกุล" class="form-control form-control-line" name="name" value="{{ $out_users->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="อีเมล" class="form-control form-control-line" name="email" id="example-email" value="{{ $out_users->email }}">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line">
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="เบอร์โทร" class="form-control form-control-line" name="phone" value="{{ $out_users->phone }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="ที่อยู่" class="form-control form-control-line" name="address" value="{{ $out_users->address }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Type User</label>
                                    <div class="col-md-12">
                                        <select class="form-control custom-select" id="type_user" name="type_user" onchange="eventtypeuser(this.value)">
                                            <option value="{{ $out_users->id_type_user  }}">{{ $out_users->type_user }}</option>
                                            @foreach ($type_user as $out_type_user)
                                                @if($out_users->id_type_user != $out_type_user->id)
                                                    <option value="{{ $out_type_user->id  }}">{{ $out_type_user->type_user }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group hide" id="type_branch">
                                    <label class="col-md-12">Type Branch</label>
                                    <div class="col-md-12">
                                        <select class="form-control custom-select" id="type_branch" name="type_branch">
                                            @if($out_users->id_type_branch != '3')
                                            <option value="{{ $out_users->id_type_branch  }}">{{ $out_users->type_branch }}</option>
                                            @endif
                                            @foreach ($type_branch as $out_type_branch)
                                                @if($out_users->id_type_branch != $out_type_branch->id)
                                                    <option value="{{ $out_type_branch->id  }}">{{ $out_type_branch->type_branch }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group hide" id="type_line">
                                    <label class="col-md-12">Line</label>
                                    <div class="col-md-12">
                                        <select class="form-control custom-select" id="type_line" name="type_line">
                                            <option value="{{ $out_users->id_type_line  }}">{{ $out_users->type_line }}</option>
                                            @foreach ($type_line as $out_type_line)
                                                @if($out_users->id_type_line != $out_type_line->id)
                                                    <option value="{{ $out_type_line->id  }}">{{ $out_type_line->type_line }}</option>
                                                @endif
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
                                {{-- <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <input type="hidden" name="id" value="{{ $out_users->id }}">

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Update User</button>
                                    </div>
                                </div>
                                @endforeach
                                {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
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

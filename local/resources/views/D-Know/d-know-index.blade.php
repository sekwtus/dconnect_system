@extends('layouts.master')
@section('title', 'D-Know')

@section('style')
  <style>
  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">
      {{ $d_know_category[0]->name }}
    </h4>
  </div>
  
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('d-know') }}">D-Know</a></li>
        <li class="breadcrumb-item active">
          {{ $d_know_category[0]->name }}
        </li>
      </ol>

      {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> --}}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    
    @foreach ($d_know_type as $type)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            {{ $type->name_th }}
          </h5>

          <div class="row{{ $type->name=='video' ?' el-element-overlay' :'' }}">
            @foreach ($d_know_all as $num_d_know=>$d_know)
              @if ($d_know->type_id == $type->id)

                @if ($type->name == 'video')
                  <div class="col-lg-3 col-md-6">
                    <div class="el-card-item">
                      <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset('assets/d-know/image/'.$d_know->image_video) }}" alt="" style="width:100%; height:120px;">
                        <span class="vd-time badge badge-danger badge-pill">
                          {{-- 03:30 --}}
                        </span>

                        <div class="el-overlay">
                          <ul class="el-info">
                            <li>
                              <a class="img-circle font-20" href="{{ url('video/d-know?video_id='.$d_know->id) }}" target="_blank">
                                <i class="ti-control-play"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      
                      <div class="el-card-content text-left">
                        <h5 class="card-title m-b-0">
                          {{ $d_know->name }}
                        </h5>

                        <small class="text-muted">{{ $d_know->detail }}</small>
                        
                        <div>
                          <b class="text-danger">แบบทดสอบ :</b> 

                          <a href="{{ $d_know->url_examination }}" class="" target="_blank">
                            {{ $d_know->url_examination }}
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="col-md-12 m-b-10">
                    {{-- <a href="{{ asset('assets/d-know/file/'.$d_know->file) }}" class="btn btn- btn-block btn-rounded btn-outline-info" target="_blank">
                      {{ $d_know->name }}
                    </a> --}}

                    <div class="btn-group d-flex">
                      <a href="{{ asset('assets/d-know/file/'.$d_know->file) }}" class="w-60 btn btn-rounded btn-outline-info" target="_blank">
                        {{ $d_know->name }}
                      </a>

                      <a href="{{ $d_know->url_examination }}" class="w-40 btn btn-rounded btn-outline-danger" target="_blank">
                        แบบทดสอบ : {{ $d_know->url_examination }}
                      </a>
                    </div>
                  </div>
                        
                  {{-- <div class="col-md-6 m-b-10">
                    <a href="{{ $d_know->url_examination }}" class="btn btn- btn-block btn-rounded btn-outline-danger" target="_blank">
                      แบบทดสอบ : {{ $d_know->url_examination }}
                    </a>
                  </div> --}}
                @endif

              @endif
            @endforeach
          </div>

          
              {{-- @foreach ($d_know as $d_know)
                <div class="col-md-2">
                  <a href="{{ url('d-know?category_id='.$d_know->id) }}">
                    {{ $d_know->name }}
                  </a>
                </div>
              @endforeach --}}
              {{-- @foreach ($d_know_video as $video)
                <div class="col-lg-3 col-md-6">
                    <div class="el-card-item">
                      <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset('assets/d-know/video/'.$video->image) }}" alt="">
                        <span class="vd-time badge badge-danger badge-pill">
                          03:30
                        </span>

                          <div class="el-overlay">
                            <ul class="el-info">
                                <li>
                                  <a class="img-circle font-20" href="{{ url('video/d-know?video_id='.$video->id) }}" target="_blank">
                                    <i class="ti-control-play"></i>
                                  </a>
                                </li>
                            </ul>
                          </div>
                      </div>
                      
                      <div class="el-card-content text-left">
                        <h5 class="card-title m-b-0">
                          {{ $video->name }}
                        </h5>

                        <small class="text-muted">{{ $video->detail }}</small>
                      </div>
                    </div>
                </div>
              @endforeach --}}
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection 

@section('script')
<script>
  @if (\Session::has('success'))
    alert("{!! \Session::get('success') !!}");
  @endif
</script>
@endsection

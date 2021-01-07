@extends('layouts.master')
@section('title', 'D-Know')

@section('style')
  <style>

  </style>
@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor font-weight-bold">D-Know</h4>
  </div>

  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('d-know') }}">
            D-Know
          </a>
        </li>

        <li class="breadcrumb-item">
          <a href="{{ url('d-know?category_id='.$d_know_category[0]->id) }}">
            {{ $d_know_category[0]->name }}
          </a>
        </li>
      
        <li class="breadcrumb-item active">Video</li>
      </ol>
    </div>
  </div>
  
  {{-- <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('d-know') }}">D-Know</a></li>

        <li class="breadcrumb-item active">
          {{ $d_know_category[0]->name }}
        </li>
      </ol>

    </div>
  </div> --}}
</div>

<div class="row">
  <!-- column -->
  <div class="col-lg-12">
      <div class="card">
          <div class="card-body">     
            <div class="">
              <video style="width:100%; height:500px;" class="mvdplayer" poster="" controls autoplay>
                <source src="{{ asset('assets/d-know/file/'.$video->file) }}" type="video/mp4">
                <!-- <source src="" type="video/ogg"> -->
                Your browser does not support HTML video.
              </video>
            </div>

              <!-- <div id="jp_container_1" class="mvdplayer">
                <div class="jp-type-single" style="position: relative;">
                    <div id="jplayer_1" class="jp-jplayer jp-video"></div>

                    <div class="jp-video-play hidden-xs">
                        <a class="fa fa-5x text-white fa-play-circle-o"></a>
                    </div>

                    <div class="jp-gui">
                        <div class="jp-play-bar play-progress"></div>
                        <div class="jp-interface">
                            <div class="jp-controls">
                                <div class="p-l">
                                    <a class="jp-play"><i class="fa fa-play fa-2x"></i></a>
                                    <a class="jp-pause"><i class="fa fa-pause fa-2x"></i></a>
                                </div>
                                <div class="hidden-xs">
                                    <a class="jp-mute m-l-20" title="mute"><i class="fa fa-volume-up fa-2x"></i></a>
                                    <a class="jp-unmute m-l-20" title="unmute"><i class="fa fa-volume-off fa-2x"></i></a>
                                </div>
                                <div class="hidden-xs jp-volume">
                                    <div class="jp-volume-bar bg-muted m-l-20">
                                        <div class="jp-volume-bar-value bg-red"></div>
                                    </div>
                                </div>
                                <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                        <div class="jp-current-time current-time text-white"></div>
                                        <div class="jp-duration duration text-white"></div>
                                        <div class="jp-title text-white">
                                            <ul>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a class="jp-full-screen" title="full screen"><i class="fa fa-expand fa-2x"></i></a>
                                    <a class="jp-restore-screen" title="restore screen"><i class="fa fa-compress fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jp-no-solution hide">
                        <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                    </div>
                </div>
              </div> -->

            <h3 class="card-title m-t-10">
              {{ $video->name }}
            </h3>
            <p>
              {{ $video->detail }}
            </p>
                        
            <div>
              <strong class="text-danger">แบบทดสอบ :</strong> 

              <a href="{{ $video->url_examination }}" class="" target="_blank">
                {{ $video->url_examination }}
              </a>
            </div>
          </div>

          <hr class="m-b-0 m-t-0">

          <!--<div class="card-body">
              <div class="row">
                  <div class="col-md-8">
                      <ul class="list-inline m-b-0">
                          <li><i class="fa fa-calendar"></i> Oct. 07, 2017</li>
                          <li><a href="JavaScript:void(0)" class="link"><i class="fa fa-share-alt"></i>  Share</a></li>
                          <li><i class="fa fa-thumbs-up"></i> 4356</li>
                          <li><i class="fa fa-thumbs-down"></i> 123</li>
                      </ul>
                  </div>
                  <div class="col-md-4 text-right">
                      <span class="ml-auto vd-view">10,267 views</span>
                  </div>
              </div>
          </div>-->
      </div>
  </div>
</div>
@endsection 

@section('script')
<script>
    
</script>
@endsection

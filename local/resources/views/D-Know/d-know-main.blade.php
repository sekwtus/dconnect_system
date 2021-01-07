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
        <li class="breadcrumb-itema active"><a href="javascript:void(0)">D-Know</a></li>
      </ol>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">เลือกหมวดหมู่</h4>
        <div id="image-popups-" class="row">
          @foreach ($d_know_category as $category)
            <div class="col-md-4 text-center m-t-20">
              <a href="{{ url('d-know?category_id='.$category->id) }}" title="{{ $category->name }}">
                <img src="{{ asset('assets/d-know/category/'.$category->image) }}" class="img-responsive img-thumbnail img-fluid"  style="width:100%; height:160px;">
                
                {{-- {{ $category->name }} --}}
              </a>
            </div>
          @endforeach
        </div>

        {{-- <div class="row m-t-5">
          @foreach ($d_know_category as $category)
            <div class="col-md-12 text-center">
              <a href="{{ url('d-know?category_id='.$category->id) }}" class="btn btn-lg btn-block btn-rounded btn-info" title="{{ $category->name }}">
                <i class="{{ $category->fa_icon }}"></i>

                {{ $category->name }}
              </a>
            </div>
          @endforeach
        </div> --}}

      </div>
    </div>
  </div>
</div>
@endsection 

@section('script')
<script>
  
</script>
@endsection

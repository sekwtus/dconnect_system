@extends('layouts.master')
@section('title', 'SIM 2')

@section('style')

@endsection

@section('main')
<div class="row page-titles">
  <div class="col-md-6 align-self-center">
    <h4 class="text-themecolor">
      SIM 2 {{-- $view_data_user->department_name --}}
    </h4>
  </div>

  <div class="col-md-6 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">D-SIM</a></li>
        <li class="breadcrumb-item active">SIM 2</li>
      </ol>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
      <div class="card-body">
        @foreach ($sim2_department as $department)
        <a href="{{ url("D-SIM/SIM2/".$department->id) }}" class="btn btn-lg btn-block btn-outline-success text-uppercase"> {{ $department->name }} </a>
            
        @endforeach
        
      </div>
    </div>
  </div>
</div>
@endsection 

@section('script')
<script type="">
  
</script>
@endsection

@extends('layouts.master')
@section('title', 'Report')

@section('style')
<link href="{{ asset('assets/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/progressbar-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/easy-pie-chart.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">

@endsection

@section('main')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Report</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">D-Link</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Order</a></li>
                <li class="breadcrumb-item active">Report</li>
            </ol>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Report ของ Order : {{ $order }}</h4>
        <h6 class="card-subtitle">แสดงเอกสารทั้งหมด</h6>
        <div class="table-responsive">
            <?php
                    $docs = array(
                    // "FM-PD-018-1"
                    "FM-PD-018"
                    // , "FM-PD-132"
                    , "FM-PD-044"
                    , "FM-PD-037"
                    // , "FM-PD-018-2"
                    , "FM-PD-002"
                    // , "FM-PD-018-3"
                    , "FM-PD-034"
                    , "FM-PD-131"
                    , "FM-PD-130"
                    , "FM-PD-024"
                    , "FM-PD-014"
                    , "FM-PD-004"
                    ); 

                    $docs_detail = array(
                    // "การตรวจสอบความถูกต้องของการผลิต"
                    "การตรวจสอบความถูกต้องของการผลิต"
                    // , "Verification Oprps And Ccps For Release Product Record"
                    , "การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ"
                    , "บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง"
                    // , "การตรวจสอบความถูกต้องของการผลิต"
                    , "การทดสอบการทำงานเครื่อง X-Ray"
                    // , "การตรวจสอบความถูกต้องของการผลิต"
                    , "แบบฟอร์มการบันทึกการตรวจสอบ Unit Carton/Special Box"
                    , "การทดสอบกล้องตรวจสอบช้อน (Scoop Camera) สำหรับ Auto Packing Line"
                    , "การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop)"
                    , "Verification Oprps And Ccps For Release Product Record"
                    , "การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code)"
                    , "การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader)"
                    ); 
                ?>
            <table class="table table-striped" id="order_table">
                <thead>
                    <tr>
                        <th width="10%">id</th>
                        <th width="20%">code</th>
                        <th width="50%">name</th>
                        <th width="20%">action</th>
                </thead>
                <tbody>
                    <?php 
                        $count = 1; 
                        $num = 0; 
                    ?>
                    @foreach ($docs as $out_docs)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $out_docs }}</td>
                        <td>{{ $docs_detail[$num] }}</td>
                        <td>
                            {{-- @if($out_docs == 'FM-PD-014')
                            @foreach ($FM_PD_014 as $item)
                            <a href="{{ url('/') }}/{{$out_docs}}/report/{{$order}}/{{ $item->order }}">
                                <button type="button" class="btn waves-effect waves-light btn-outline-info">
                                    {{ $item->order }}
                                </button>
                            </a>
                            @endforeach --}}
                            {{-- @elseif($out_docs == 'FM-PD-131')
                            @foreach ($FM_PD_131 as $item)
                            <a href="{{ url('/') }}/{{$out_docs}}/report/{{$order}}/{{ $item->order }}">
                                <button type="button" class="btn waves-effect waves-light btn-outline-info">
                                    {{ $item->order }}
                                </button>
                            </a>
                            @endforeach --}}
                            {{-- @elseif($out_docs == 'FM-PD-037')
                            @foreach ($FM_PD_037 as $item)
                            <a href="{{ url('/') }}/{{$out_docs}}/report/{{$order}}/{{ $item->order }}">
                                <button type="button" class="btn waves-effect waves-light btn-outline-info">
                                    {{ $item->order }}
                                </button>
                            </a>
                            @endforeach --}}
                            {{-- @else --}}
                            <a href="{{ url('/') }}/{{$out_docs}}/report/{{$order}}">
                                <button type="button" class="btn waves-effect waves-light btn-outline-success">
                                    DETAIL
                                </button>
                            </a>
                            {{-- @endif --}}
                        </td>
                    </tr>
                    <?php 
                            $count = $count+1; 
                            $num = $num+1; 
                        ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    @if(\Session::has('edit-success'))
      alert(`{{ Session::get('edit-success') }}`);
    @endif 

    $(document).ready(function() {
        $('#order_table').DataTable( {
        } );
    } );
</script>

@endsection
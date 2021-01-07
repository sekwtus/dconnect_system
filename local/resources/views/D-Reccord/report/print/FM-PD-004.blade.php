@extends('layouts.master-print')

@section('title', 'FM-PD-004')

@section('style')

@endsection



@section('main')
    {{-- {!! $FM_PD_004_main[0] !!} --}}
    <div class="row">
        <div class="col-md-12 p-0" id="print-area">
            <table class="tbl-paperless">
                <thead>
                    <tr>
                        <th colspan="8" class="text-center">
                            <h5 class="font-weight-bold mb-0">
                                การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader)
                            </h5>
                        </th>
                        <th class="text-center">
                            <h5 class="font-weight-bold mb-0">CCP3</h5>
                        </th>
                    </tr>

                    @foreach ($head as $item)
                        <tr>
                            <th class="text-center">
                                LINE : {{$item->line_number}}
                                ผลิตภัณฑ์ : {{$item->material_description}}
                            </th>

                            <th colspan="7" class="text-center">
                                PRODUCT ORDER : {{ $item->production_order }}
                                BATCH: {{ $item->batch }}
                            
                                BATCH: {{ $item->batch }}
                            </th>

                            <th class="text-center">
                                {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                            </th>
                        </tr>
                    @endforeach

                    <tr>
                        <th rowspan="2" style="width:25%;" class="text-center">
                            เลขที่บาร์โค้ด<br>(Barcode no.)
                        </th>
                        <th rowspan="2" style="width:20%;" class="text-center">
                            ทดสอบความถี่ของ<br>(Frequency)
                        </th>
                        <th rowspan="2" style="width:5%;" class="text-center">
                            เวลาทดสอบ<br>(Time)
                        </th>
                        <th rowspan="2" style="width:10%;" class="text-center">
                            ชนิดของกล่อง<br>ทดสอบบาร์โค้ด
                        </th>
                        <th rowspan="2" style="width:5%;" class="text-center">
                            ครั้งที่
                        </th>
                        <th colspan="2" style="width:10%;" class="text-center">
                            ผลการตรวจสอบ
                        </th>

                        <th rowspan="2" style="width:15%;" class="text-center">
                            หมายเหตุ
                        </th>
                        <th rowspan="2" style="width:10%;" class="text-center">
                            บันทึกโดย
                        </th>
                    </tr>

                    <tr>
                        <th class="text-center">
                            Reject
                        </th>
                        <th class="text-center">
                            No Rej.
                        </th>
                    </tr>
                </thead>
                
                <tbody class="tbody-paperless">
                    @foreach ($FM_PD_004_main as $index=>$item)
                        <tr>
                            <td rowspan="6" style="width:30%;" class="text-center">
                                <img style="height: 80px;" src="{{ !empty($item->bracode_no) ?asset('/assets/FM-PD-004/'.$item->bracode_no) :null }}">
                            </td>

                            <td rowspan="6" style="vertical-align:;">
                                <div class="">
                                    <span class="style-check-box">
                                        {{-- &#9744; --}}
                                        {!! 
                                            !empty($frequency[0][$index])
                                            ?'&#9745;' :'&#9744;' 
                                        !!}
                                    </span> 
                                    ก่อนเริ่มงานแต่ละกะ
                                </div>
                                
                                <div>
                                    <span class="style-check-box">
                                        {!! 
                                            !empty($frequency[1][$index])
                                            ?'&#9745;' :'&#9744;' 
                                        !!}
                                    </span>
                                    เปลี่ยนผลิตภัณฑ์
                                </div>

                                <div>
                                    <span class="style-check-box">
                                        {!! 
                                            !empty($frequency[2][$index])
                                            ?'&#9745;' :'&#9744;'
                                        !!}
                                    </span>
                                    เปลี่ยนขนาดของผลิตภัณฑ์
                                </div>

                                <div>
                                    <span class="style-check-box">
                                        {!! 
                                            !empty($frequency[3][$index])
                                            ?'&#9745;' :'&#9744;'
                                        !!}
                                    </span>
                                    หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที
                                </div>

                                <div>
                                    <span class="style-check-box">
                                        {!! 
                                            !empty($frequency[4][$index])
                                            ?'&#9745;' :'&#9744;'
                                        !!}
                                    </span>
                                    มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด
                                </div>

                                <div>
                                    <span class="style-check-box">
                                        {!! 
                                            !empty($frequency[5][$index])
                                            ?'&#9745;' :'&#9744;'
                                        !!}
                                    </span>
                                    ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง
                                </div>

                                <div>
                                    <span class="style-check-box">
                                    {!! 
                                        !empty($frequency[6][$index])
                                        ?'&#9745;' :'&#9744;'
                                    !!}
                                    </span>
                                    ทุกวันหลังสิ้นสุดการผลิต
                                </div>
                            </td>

                            <td rowspan="6" class="text-center">
                                {{ $item->time }} น.
                            </td>

                            <td rowspan="3" class="text-center">
                                Barcode ผิด
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">
                                {!!
                                    !empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                            <td class="text-center">
                                {!!
                                    !empty($item->Wrong_Barcode_Result_1) && $item->Wrong_Barcode_Result_1 == 'No_Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>

                            <td rowspan="3" style="width:15%; vertical-align:top;">
                                {{-- <span style="word-wrap: break-word;"> --}}
                                    {{ !empty($item->Wrong_Barcode_Note) ? $item->Wrong_Barcode_Note : null }}
                                {{-- </span> --}}
                            </td>

                            {{-- s --}}
                            <td rowspan="6" class="text-center">
                                <div>
                                    @if(!empty($item->sign_operator))
                                    <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" alt=""
                                        width="45">
                                    @endif
                                </div>
                                <b>
                                    {{-- {{ auth::user()->name }} --}}
                                    <br> (ผู้ทดสอบและลงบันทึก)
                                </b>
                            </td>

                        </tr>

                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">
                                {!!
                                    !empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                            <td class="text-center">
                                {!!
                                    !empty($item->Wrong_Barcode_Result_2) && $item->Wrong_Barcode_Result_2 == 'No_Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-center">
                                {!!
                                    !empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                            <td class="text-center">
                                {!!
                                    !empty($item->Wrong_Barcode_Result_3) && $item->Wrong_Barcode_Result_3 == 'No_Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="text-center">Barcode ไม่มี
                            </td>

                            <td class="text-center">1</td>
                            <td class="text-center">
                                {!! 
                                    !empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                            <td class="text-center">
                                {!! 
                                    !empty($item->No_Barcode_Result_1) && $item->No_Barcode_Result_1 == 'No_Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>

                            <td rowspan="3" style="vertical-align: top;">
                                <span style="word-wrap: break-word;">
                                    {{ !empty($item->No_Barcode_Note)  ? $item->No_Barcode_Note : null }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">2</td>

                            <td class="text-center">
                                {!! !empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                            <td class="text-center">
                                {!! 
                                    !empty($item->No_Barcode_Result_2) && $item->No_Barcode_Result_2 == 'No_Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-center">
                                {!! 
                                    !empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                            <td class="text-center">
                                {!! 
                                    !empty($item->No_Barcode_Result_3) && $item->No_Barcode_Result_3 == 'No_Reject'
                                    ?'&#10004;' :null 
                                !!}
                            </td>
                        </tr> 
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="9" class="text-center">
                            ทวนสอบโดย 

                            @if(!empty($item->sign_leader))
                                <div>
                                    <img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" style="width:100px; height:auto;">
                                </div>
                                (ชื่อ)
                            @else
                                ..........
                            @endif
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
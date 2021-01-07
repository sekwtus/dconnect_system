<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <style type="text/css">
        .fa {
            display: inline;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 1;
            font-family: FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>

    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('/assets/fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('/assets/fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('/assets/fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('/assets/fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'fontawesome3';
            src: url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .fa3 {
            display: inline-block;
            font: normal normal normal 14px/1 fontawesome3;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: "THSarabunNew";
            font-size: 12px;
        }

        table,
        th,
        td {
            font-family: 'THSarabunNew';
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            font-family: 'THSarabunNew';
            /* padding: 2px; */
            padding-left: 2px;
            text-align: left;
        }

        body {
            font-family: 'THSarabunNew';
        }

        /* start star admin */
        .stretch-card {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            -webkit-box-pack: stretch;
            -ms-flex-pack: stretch;
            justify-content: stretch;
        }

        .stretch-card>.card {
            width: 100%;
            min-width: 100%;
        }

        .grid-margin {
            margin-bottom: 0px;
        }

        .btn.btn-icons,
        a.btn-icons {
            width: 40px;
            height: 40px;
            padding: 0px;
            text-align: center;
            vertical-align: middle;
        }

        /* end star admin */

        .style-check-box,
        .style-radio {
            font-size: 5px !important;
            vertical-align: middle;
        }

        /*---------- input ----------*/
        input[type=number]::-webkit-inner-spin-button {
            display: none;
            /* -webkit-appearance: none; */
        }

        /* table paperless -*/
        .tbl-paperless th,
        .tbl-paperless td {
            border: 1px solid black !important;
            line-height: 1.35;
        }

        .tbl-paperless th {
            border: 1px solid black;
            background-color: #e9ebeb;
            vertical-align: middle;
            font-size: 12px;
        }

        .tbl-paperless td {
            border: 1px solid black;
            vertical-align: middle;
            font-size: 12px;
        }

        /* table paperless -*/


        /* ตาราง ฟอร์มเอกสาร */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .tbl-danone {
            width: 100%;
            border-collapse: collapse;
        }

        .tbl-danone th,
        .tbl-danone td {
            padding: 0px;
            /* border: 1px solid black; */
        }

        .tbl-danone thead>tr>th {
            border: ;
            background: #4aa8e4;
            color: #fff;
            vertical-align: middle;
            font-size: 12px;
            line-height: 1.35;
            /* padding: 18px 15px; */
        }

        .tbl-danone td {
            /* vertical-align: top; */
            font-size: 12px;
            line-height: 1.35;
            /* padding: .45rem; */
        }

        .page-break {
            page-break-after: always;
        }

        .text-center {
            text-align: center;
        }

        .align-middle {
            vertical-align: middle;
        }

        input[type=checkbox] {
            /* Double-sized Checkboxes */
            -ms-transform: scale(0.2);
            /* IE */
            -moz-transform: scale(0.2);
            /* FF */
            -webkit-transform: scale(0.2);
            /* Safari and Chrome */
            -o-transform: scale(0.2);
            /* Opera */
            transform: scale(0.2);
            padding: 0px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <table class="table table-bordered tbl-paperless" style="table-layout:fixed;">
                            <thead>
                                @foreach ($head as $item)
                                <tr>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle;">FM-PD-002
                                        Rev.17 <br>
                                        การทดสอบการทำงานเครื่อง X-Ray
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle;">
                                        LINE : {{$item->line_number}}
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle;">
                                        PRODUCT ORDER : {{ $item->production_order }}
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle;">
                                        CCP 2
                                    </th>
                                    <th colspan="2" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle;">
                                        วันที่ :
                                        {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle;">
                                        ผลิตภัณฑ์ : {{$item->material_description}}
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle;">
                                        BATCH: {{ $item->batch }}
                                    </th>
                                </tr>
                                @endforeach

                                <tr style="font-weight: bold;font-size: 10px;">
                                    <td rowspan="2" width="20%"
                                        style="text-align: center;vertical-align:middle;font-size: 10px;"
                                        class="text-center">
                                        ทดสอบความถี่ของ(Frequency)
                                    </td>
                                    <td rowspan="2" width="5%" class="text-center"
                                        style="text-align: center;vertical-align: middle;font-size: 10px;">
                                        เวลาทดสอบ<br>(Time)
                                    </td>
                                    <td rowspan="2" class="text-center" width="20%"
                                        style="text-align: center;vertical-align: middle;font-size: 10px;">
                                        ชนิดของแผ่นทดสอบ<br>(Test Case)
                                    </td>
                                    <td rowspan="2" class="text-center" width="3%"
                                        style="text-align: center;vertical-align: middle;font-size: 10px;">
                                        ครั้งที่
                                    </td>
                                    <td colspan="2" class="text-center" width="10%"
                                        style="text-align: center;vertical-align: middle;font-size: 10px;">
                                        ผลการตรวจสอบ
                                    </td>

                                    <td rowspan="2" class="text-center" width="27%"
                                        style="text-align: center;vertical-align: middle;font-size: 10px;">
                                        หมายเหตุ
                                    </td>
                                    <td rowspan="2" class="text-center" width="15%"
                                        style="text-align: center;vertical-align: middle;font-size: 10px;">
                                        บันทึกโดย
                                    </td>
                                </tr>
                                <tr style="font-weight: bold;font-size: 10px;">
                                    <td style="text-align: center;font-size: 10px;" class="text-center">
                                        Reject
                                    </td>
                                    <td style="text-align: center;font-size: 10px;" class="text-center">
                                        No Rej.
                                    </td>
                                </tr>
                            </thead>

                            @foreach ($FM_PD_002_main as $index=>$item)
                            <input type="hidden" name="ID[{{ $index }}]" value="{{ $item->ID }}" />

                            <tbody>
                                <tr style="font-size: 12px;">
                                    <td rowspan="6" style="vertical-align: top;font-size: 12px;">
                                        <div>
                                            <label class="container" style=" padding-right: 0px; ">
                                                {!! !empty($frequency[0][$index]) && $frequency[0][$index] == 'checked'
                                                ? '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 12px;"></i>' !!}
                                                ก่อนเริ่มงานแต่ละกะ
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            {!! !empty($frequency[1][$index]) && $frequency[1][$index] == 'checked'
                                            ? '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>' : '<i
                                                class="fa fa-square-o" style="font-size: 12px;"></i>' !!}
                                            <label class="container">
                                                เปลี่ยนผลิตภัณฑ์
                                            </label>
                                        </div>

                                        <div class="input-group">
                                            <label class="container" style=" padding-right: 0px; ">
                                                {!! !empty($frequency[2][$index]) && $frequency[2][$index] == 'checked'
                                                ? '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 12px;"></i>' !!}
                                                เปลี่ยนขนาดของผลิตภัณฑ์
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            <label class="container" style=" padding-right: 0px; ">
                                                {!! !empty($frequency[3][$index]) && $frequency[3][$index] == 'checked'
                                                ? '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 12px;"></i>' !!}
                                                หลังจากที่ไลน์การผลิตหยุด 60 นาที
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="input-group">
                                            <label class="container" style=" padding-right: 0px; ">
                                                {!! !empty($frequency[4][$index]) && $frequency[4][$index] == 'checked'
                                                ? '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 12px;"></i>' !!}
                                                มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            <label class="container" style=" padding-right: 0px; ">
                                                {!! !empty($frequency[5][$index]) && $frequency[5][$index] == 'checked'
                                                ? '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 12px;"></i>' !!}
                                                ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="input-group">
                                            <label class="container" style=" padding-right: 0px; ">
                                                {!! !empty($frequency[6][$index]) && $frequency[6][$index] == 'checked'
                                                ? '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 12px;"></i>' !!}
                                                ทุกวันหลังสิ้นสุดการผลิต
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td rowspan="6"
                                        style="text-align: center;background-color:#white;vertical-align:middle;font-size: 12px;"
                                        class="text-center align-middle ">
                                        {{ $item->Time }} น.
                                    </td>

                                    <td rowspan="3" style="text-align: center;font-size: 12px;" class="text-center">
                                        สแตนเลส
                                        1.2 มม.<br>(Stainless 1.2 mm)
                                    </td>
                                    <td style="text-align: center;" class="text-center">1</td>
                                    <td style="text-align: center;" class="text-center">
                                        {!!
                                        !empty($item->Stainless_Result_1) && $item->Stainless_Result_1 ==
                                        'Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                    <td style="text-align: center;" class="text-center">
                                        {!!
                                        !empty($item->Stainless_Result_1) && $item->Stainless_Result_1 ==
                                        'No_Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>

                                    <td rowspan="3" class="align-top" style="text-align: left;vertical-align:top;">
                                        <span style="word-wrap: break-word;">
                                            {{ !empty($item->Stainless_Note) ? $item->Stainless_Note : null }}
                                        </span>
                                    </td>

                                    <!-- s -->
                                    <td class="text-center" rowspan="6">
                                        <div>
                                            @if(!empty($item->sign_operator))
                                            <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" alt=""
                                                width="80">
                                            <br><b>( {{ isset($item->operator_name)? $item->operator_name : null }}
                                                )</b>
                                            @endif
                                        </div>
                                        <!-- {{ auth::user()->name }} -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;" class="text-center">2</td>
                                    <td style="text-align: center;" class="text-center">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Stainless_Result_2[{{$index}}]" value="Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Stainless_Result_2) && $item->Stainless_Result_2 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Stainless_Result_2) && $item->Stainless_Result_2 == 'Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                    <td style="text-align: center;" class="text-center">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Stainless_Result_2[{{$index}}]"
                                        value="No_Reject" onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Stainless_Result_2) && $item->Stainless_Result_2 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Stainless_Result_2) && $item->Stainless_Result_2 ==
                                        'No_Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;" class="text-center">3</td>
                                    <td style="text-align: center;" class="text-center">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Stainless_Result_3[{{$index}}]" value="Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Stainless_Result_3) && $item->Stainless_Result_3 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Stainless_Result_3) && $item->Stainless_Result_3 == 'Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                    <td style="text-align: center;" class="text-center">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Stainless_Result_3[{{$index}}]"
                                        value="No_Reject" onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Stainless_Result_3) && $item->Stainless_Result_3 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Stainless_Result_3) && $item->Stainless_Result_3 ==
                                        'No_Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="3" style="text-align: center;font-size: 12px;" class="text-center">
                                        โลหะ 1.2 มม.<br>(Metal 1.2 mm)
                                    </td>

                                    <td style="text-align: center;" class="text-center">1</td>
                                    <td style="text-align: center;" class="text-center">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Metal_Result_1[{{$index}}]" value="Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Metal_Result_1) && $item->Metal_Result_1 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Metal_Result_1) && $item->Metal_Result_1 == 'Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                    <td style="text-align: center;" class="text-center">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Metal_Result_1[{{$index}}]" value="No_Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Metal_Result_1) && $item->Metal_Result_1 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Metal_Result_1) && $item->Metal_Result_1 == 'No_Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>

                                    <td rowspan="3" class="align-top" style="text-align: left;vertical-align:top;">
                                        <span style="word-wrap: break-word;">
                                            {{ !empty($item->Metal_Note)  ? $item->Metal_Note : null }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;" class="text-center">2</td>

                                    <td class="text-center" style="text-align: center;">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Metal_Result_2[{{$index}}]" value="Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Metal_Result_2) && $item->Metal_Result_2 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Metal_Result_2) && $item->Metal_Result_2 == 'Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                    <td class="text-center" style="text-align: center;">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Metal_Result_2[{{$index}}]" value="No_Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Metal_Result_2) && $item->Metal_Result_2 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Metal_Result_2) && $item->Metal_Result_2 == 'No_Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;" class="text-center">3</td>
                                    <td class="text-center" style="text-align: center;">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Metal_Result_3[{{$index}}]" value="Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Metal_Result_3) && $item->Metal_Result_3 == 'Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Metal_Result_3) && $item->Metal_Result_3 == 'Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                    <td class="text-center" style="text-align: center;">
                                        {{-- <label class="container">
                                            <input type="checkbox" name="Metal_Result_3[{{$index}}]" value="No_Reject"
                                        onchange="CheckOnlyOne(this)"
                                        {{ !empty($item->Metal_Result_3) && $item->Metal_Result_3 == 'No_Reject' ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                        </label> --}}
                                        {!!
                                        !empty($item->Metal_Result_3) && $item->Metal_Result_3 == 'No_Reject'
                                        ? '<i class="fa fa-check text-center" style="font-size: 12px;"></i>' :
                                        null !!}
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- ทวนสอบโดย -->
        <div class="row">
            <div class="col-md-12" style="text-align: right;">
                <span class="font-weight-bold" style="font-size: 16px;">ทวนสอบโดย</span>
                @if(!empty($item->sign_leader))
                {{-- <div> --}}
                &nbsp;<img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" alt="" height="25">&nbsp;
                <b>( {{ isset($item->leader_name) ? $item->leader_name : null }} )</b>
                {{-- </div> --}}
                <input type="hidden" name="txt_sign_leader" id="txt_sign_leader"
                    value="{{!empty($item->sign_leader) ? $item->sign_leader : '0' }}">
                @else
                <input type="hidden" name="txt_sign_leader" id="txt_sign_leader" value="0">
                <div id="sign_leader" class="d-none"></div>
                @endif
                {{-- <b style="color:red;font-size: 16px;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b> --}}
            </div>
        </div>
    </div>
</body>

</html>
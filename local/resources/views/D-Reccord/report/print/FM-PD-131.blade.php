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
            font-size: 14px;
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
            padding: 3px;
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
            padding: 3px;
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
            font-size: 14px;
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
            padding: 3px;
            /* border: 1px solid black; */
        }

        .tbl-danone thead>tr>th {
            border: ;
            background: #4aa8e4;
            color: #fff;
            vertical-align: middle;
            font-size: 14px;
            line-height: 1.35;
            /* padding: 114px 15px; */
        }

        .tbl-danone td {
            /* vertical-align: top; */
            font-size: 14px;
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
            padding: 3px;
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
                <div id="print-area" class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless">
                            <thead class="text-center">
                                @foreach ($head as $item)
                                <tr>
                                    <th colspan="2" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        การทดสอบกล้องตรวจสอบช้อน (Scoop Camera) <br> สำหรับ Auto Packing line
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        วันที่ :
                                        {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                                    </th>
                                    <th class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        LINE : {{$item->line_number}}
                                    </th>
                                    <th colspan="2" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        PRODUCT ORDER : {{ $item->production_order }}
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        ผลิตภัณฑ์ : {{$item->material_description}}
                                    </th>
                                    <th class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        BATCH: {{ $item->batch }}
                                    </th>
                                </tr>

                                <tr>
                                    <td width="25%" class="text-center" rowspan="2">
                                        ทดสอบความถี่ของ<br>(Frequency)
                                    </td>
                                    <td width="5%" class="text-center" rowspan="2">
                                        เวลาทดสอบ<br>(Time)
                                    </td>
                                    <td width="10%" class="text-center" rowspan="2" class="align-middle">
                                        ทดสอบ
                                    </td>
                                    <td width="5%" class="text-center" rowspan="2" class="align-middle">
                                        ครั้งที่
                                    </td>
                                    <td width="15%" class="text-center" colspan="2" class="align-middle">
                                        ผลการทดสอบ
                                    </td>
                                    <td width="30%" class="text-center" rowspan="2">
                                        หมายเหตุ
                                    </td>

                                    <td width="15%" class="text-center" rowspan="2" class="align-middle">
                                        บันทึกโดย
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        Reject
                                    </td>
                                    <td class="text-center">
                                        No Rej.
                                    </td>
                                </tr>
                                @endforeach
                            </thead>

                            <tbody>
                                @foreach ($FM_PD_131 as $index=>$item)
                                <tr>
                                    <td rowspan="3" style="vertical-align: top;">
                                        <input type="hidden" name="txtID[{{$index}}]" value="{{ $item->ID }}">

                                        @php
                                        $arr_frequency = explode(',',$item->Frequency);
                                        @endphp
                                        <div>
                                            <label class="container">
                                                {!! in_array('ก่อนเริ่มงานแต่ละกะ',$arr_frequency)
                                                ? '<i class="fa fa-check-square-o" style="font-size: 14px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 14px;"></i>' !!}
                                                ก่อนเริ่มงานแต่ละกะ
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="container">
                                                {!! in_array('เปลี่ยนผลิตภัณฑ์',$arr_frequency)
                                                ? '<i class="fa fa-check-square-o" style="font-size: 14px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 14px;"></i>' !!}
                                                เปลี่ยนผลิตภัณฑ์
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td rowspan="3" class="text-center">
                                        {{ $item->Time }}
                                    </td>

                                    <td rowspan="3" class="text-center">
                                        ไม่มีช้อน
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <label class="container">
                                            {!!
                                            (!empty($item->Result_1) && $item->Result_1 == 'Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}

                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            {!!
                                            (!empty($item->Result_1) && $item->Result_1 == 'No_Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                    <td rowspan="3" style="vertical-align: top;">
                                        <span style="word-wrap: break-word;">
                                            {{ !empty($item->Note) ? $item->Note : null }}
                                        </span>
                                    </td>

                                    <td rowspan="3" class="text-center">
                                        @if(!empty($item->sign_operator))
                                        <div>
                                            <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}"
                                                height="25">
                                        </div>
                                        <b>( {{ isset($item->operator_name) ? $item->operator_name : null }} )</b>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">
                                        <label class="container">
                                            {!!
                                            (!empty($item->Result_2) && $item->Result_2 == 'Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="container">
                                            {!!
                                            (!empty($item->Result_2) && $item->Result_2 == 'No_Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center" style="vertical-align: top;">3</td>
                                    <td class="text-center" style="vertical-align: top;">
                                        <label class="container">
                                            {!!
                                            (!empty($item->Result_3) && $item->Result_3 == 'Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                    <td class="text-center" style="vertical-align: top;">
                                        <label class="container">
                                            {!!
                                            (!empty($item->Result_3) && $item->Result_3 == 'No_Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <!-- ทวนสอบโดย -->
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <span class="font-weight-bold">ทวนสอบโดย</span>

                        <input type="hidden" name="txt_sign_leader" id="txt_sign_leader" value="0">
                        <span id="sign_leader" class="{{ !empty($FM_PD_131[0]->sign_leader) ?'' :'d-none' }}">
                            <img src="{{ !empty($FM_PD_131[0]->sign_leader) ?asset('assets/images/sign/'.$FM_PD_131[0]->sign_leader) :'' }}"
                                height="25">
                            <b>( {{ isset($FM_PD_131[0]->leader_name) ? $FM_PD_131[0]->leader_name : null }} )</b>
                            {{-- {{ 'ชื่อ leader.' }} --}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
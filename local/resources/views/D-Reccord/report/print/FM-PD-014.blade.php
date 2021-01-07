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
            padding: 0px;
            /* border: 1px solid black; */
        }

        .tbl-danone thead>tr>th {
            border: ;
            background: #4aa8e4;
            color: #fff;
            vertical-align: middle;
            font-size: 14px;
            line-height: 1.35;
            /* padding: 18px 15px; */
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
                <div id="print-area" class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="1">
                                        การทดสอบการทำงานของเครื่องตรวจสอบแบช <br> (Batch Code)
                                    </th>

                                    <th class="text-center">
                                        PRODUCT NAME:
                                        {{$head[0]->material_description}}
                                    </th>

                                    <th class="text-center">
                                        Batch Code
                                    </th>
                                    <th class="text-center" colspan="2">
                                        LINE : {{ $head[0]->line_number }}
                                    </th>

                                    <th class="text-center" colspan="3">
                                        Date:
                                        {{ substr($head[0]->scheduled_start,6,2).'/'.substr($head[0]->scheduled_start,4,2).'/'.(substr($head[0]->scheduled_start,0,4)+543) }}
                                    </th>

                                    <th class="text-center">
                                        BATCH: {{ $head[0]->batch }}
                                    </th>
                                </tr>

                                <tr>
                                    <td class="align-middle text-center" width="25%" rowspan="2">
                                        รายละเอียดของ Unit Carton / Special Box
                                    </td>
                                    <td class="align-middle text-center" width="25%" rowspan="2">
                                        ทดสอบความถี่ของ <br> (Frequency)
                                    </td>
                                    <td class="align-middle text-center" width="5%" rowspan="2">
                                        เวลาทดสอบ<br>(Time)
                                    </td>
                                    <td class="align-middle text-center" width="5%" rowspan="2">
                                        ชนิดของกล่อง<br>ทดสอบแบช
                                    </td>
                                    <td class="align-middle text-center" width="3%" rowspan="2">
                                        ครั้งที่
                                    </td>
                                    <td class="align-middle text-center" width="8%" colspan="2">
                                        ผลการทดสอบ
                                    </td>
                                    <td class="align-middle text-center" width="12%" rowspan="2">
                                        หมายเหตุ
                                    </td>
                                    <td class="align-middle text-center" width="12%" rowspan="2">
                                        บันทึกโดย
                                    </td>
                                </tr>

                                <tr>
                                    <td class="align-middle text-center">
                                        Reject
                                    </td>
                                    <td class="align-middle text-center">
                                        No Rej.
                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($FM_PD_014 as $index=>$item)
                                <tr>
                                    <td rowspan="3" class="text-center">
                                        <img style="height:80px;"
                                            src="{{ !empty($item->unit_carton) ? asset('assets/FM-PD-014/'.$item->unit_carton) : null }}"
                                            alt="">
                                    </td>

                                    <td rowspan="3" style="vertical-align: top;">
                                        <div class="input-group">
                                            <label class="container">
                                                {!! (!empty($frequency[0][$index]))
                                                ? '<i class="fa fa-check-square-o" style="font-size: 14px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 14px;"></i>' !!}
                                                ก่อนเริ่มงานแต่ละกะ
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            <label class="container">
                                                {!! (!empty($frequency[1][$index]))
                                                ? '<i class="fa fa-check-square-o" style="font-size: 14px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 14px;"></i>' !!}
                                                เปลี่ยนผลิตภัณฑ์
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            <label class="container">
                                                {!! (!empty($frequency[2][$index]))
                                                ? '<i class="fa fa-check-square-o" style="font-size: 14px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 14px;"></i>' !!}
                                                เปลี่ยนขนาดของผลิตภัณฑ์
                                            </label>
                                        </div>
                                    </td>

                                    <td rowspan="3" class="text-center">
                                        {{ $item->time }}
                                    </td>

                                    <td rowspan="3" class="text-center">
                                        ไม่มีแบช
                                    </td>

                                    <td class="text-center">1</td>

                                    <td class="text-center">
                                        <label class="container">
                                            {!! (!empty($item->Result_1) && $item->Result_1 == 'Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>

                                    <td class="text-center">
                                        <label class="container">
                                            {!! (!empty($item->Result_1) && $item->Result_1 == 'No_Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>

                                    <td rowspan="3" style="vertical-align: top;">
                                        <span style="word-wrap: break-word;">
                                            {{ (!empty($item->note)) ?$item->note :null }}
                                        </span>
                                    </td>

                                    <td rowspan="3" class="text-center">
                                        @if(!empty($item->sign_operator))
                                        <div>
                                            <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}"
                                                width="45">
                                            <br> ( {{ isset($item->operator_name)? $item->operator_name : null }} )
                                        </div>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">2</td>
                                    <td style="" class="text-center">
                                        <label class="container">
                                            {!! (!empty($item->Result_2) && $item->Result_2 == 'Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                    <td style="" class="text-center">
                                        <label class="container">
                                            {!! (!empty($item->Result_2) && $item->Result_2 == 'No_Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">3</td>
                                    <td style="" class=" text-center">
                                        <label class="container">
                                            {!! (!empty($item->Result_3) && $item->Result_3 == 'Reject')
                                            ? '<i class="fa fa-check" style="font-size: 14px;"></i>' : null !!}
                                        </label>
                                    </td>
                                    <td style="" class="text-center">
                                        <label class="container">
                                            {!! (!empty($item->Result_3) && $item->Result_3 == 'No_Reject')
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
                        <span id="sign_leader" class="{{ !empty($FM_PD_014[0]->sign_leader) ?'' :'d-none' }}">
                            <img src="{{ !empty($FM_PD_014[0]->sign_leader) ?asset('assets/images/sign/'.$FM_PD_014[0]->sign_leader) :'' }}"
                                height="25">
                            <b>( {{ isset($FM_PD_014[0]->leader_name) ? $FM_PD_014[0]->leader_name : null }} )</b>
                            {{-- {{ 'ชื่อ leader.' }} --}}
                        </span>

                        @if(empty($FM_PD_014[0]->sign_leader))
                        <button type="button" id="btn_sign_leader" class="btn btn-lg btn-block btn-primary"
                            data-toggle="modal" data-target="#sign_leader_modal">
                            <i class="fas fa-signature"></i>
                            ลายเซ็น
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
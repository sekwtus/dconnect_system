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
            padding: 0px;
            text-align: center;
            vertical-align: middle;
        }

        /* end star admin */

        .style-check-box,
        .style-radio {
            font-size: 14px !important;
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
            padding: 5px;
            /* border: 1px solid black; */
        }

        .tbl-danone thead>tr>th {
            background: #4aa8e4;
            color: #fff;
            vertical-align: middle;
            font-size: 14px;
            line-height: 1.35;
            /* padding: 114px 114px; */
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

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered tbl-paperless" style="width: 100%;">
                    <thead>
                        @foreach ($head as $item)
                        <tr>
                            <th width="30%" class="text-center" style="background-color:#e9ebeb;vertical-align:middle;">
                                FM-PD-037 Rev No.03 บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง
                            </th>
                            <th width="10%" class="text-center" style="background-color:#e9ebeb;vertical-align:middle;">
                                LINE : {{$item->line_number}}
                            </th>
                            <th width="15%" class="text-center" style="background-color:#e9ebeb;vertical-align:middle;">
                                PRODUCT ORDER : {{ $item->production_order }}
                            </th>
                            <th width="10%" class="text-center" style="background-color:#e9ebeb;vertical-align:middle;">
                                วันที่ :
                                {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                            </th>
                            <th width="20%" colspan="2" class="text-center"
                                style="background-color:#e9ebeb;vertical-align:middle;">
                                ผลิตภัณฑ์ : {{$item->material_description}}
                            </th>
                            <th width="15%" class="text-center" style="background-color:#e9ebeb;vertical-align:middle;">
                                BATCH: {{ $item->batch }}
                            </th>
                        </tr>
                        @endforeach

                        <tr>
                            <td style=" vertical-align:middle" class="text-center">
                                Tag ม้วนฟอยล์
                            </td>
                            <td style=" vertical-align:middle" class="text-center">
                                เวลาที่เปลี่ยนม้วน
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                ความถูกต้องของ Foil
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                รอยต่อที่ 1
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                รอยต่อที่ 2
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                รอยต่อที่ 3
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                บันทึกโดย
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($FM_PD_037_mains as $index => $FM_PD_037_main)
                        <tr>
                            <td class="text-center">
                                <img src="{{ !empty($FM_PD_037_main->tag_foil) ? asset('/assets/FM-PD-037/'.$FM_PD_037_main->tag_foil) : null }}"
                                    alt="" style="height: 100px;">
                            </td>
                            <td class="text-center">
                                {{ !empty($FM_PD_037_main->time_roll) ? $FM_PD_037_main->time_roll : null }}
                            </td>
                            <td style="vertical-align: top;">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="container">
                                                {!! !empty($FM_PD_037_main->correct_foil) &&
                                                $FM_PD_037_main->correct_foil == 1
                                                ?
                                                '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>'
                                                :
                                                '<i class="fa fa-square-o" style="font-size: 12px;"></i>' !!} ถูกต้อง
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-top">
                                        <div class="input-group">
                                            <label class="container">
                                                {!! !empty($FM_PD_037_main->correct_foil) &&
                                                $FM_PD_037_main->correct_foil == 2
                                                ?
                                                '<i class="fa fa-check-square-o" style="font-size: 12px;"></i>'
                                                :
                                                '<i class="fa fa-square-o" style="font-size: 12px;"></i>' !!} ไม่ถูกต้อง
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align: top;">
                                <div class="form-group row">
                                    <label for="time_roll1" class="col-md-12 col-form-label">เวลา:
                                        {{ !empty($FM_PD_037_main->time_roll1) ? $FM_PD_037_main->time_roll1 :  null }}
                                    </label>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <label class="container">
                                                        @if ( $FM_PD_037_main->correct1 == 'correct' )
                                                        <i class="fa fa-check-square-o" style="font-size: 12px;"></i>
                                                        @else
                                                        <i class="fa fa-square-o" style="font-size: 12px;"></i>
                                                        @endif
                                                        ถูกต้อง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <label class="container">
                                                        @if ( $FM_PD_037_main->correct1 == 'incorrect' )
                                                        <i class="fa fa-check-square-o" style="font-size: 12px;"></i>
                                                        @else
                                                        <i class="fa fa-square-o" style="font-size: 12px;"></i>
                                                        @endif
                                                        ไม่ถูกต้อง
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="page-group[0][note]" class="col-sm-12 col-form-label">หมายเหตุ:
                                            </label>
                                            <span style="word-wrap: break-word;">
                                                {{ !empty($FM_PD_037_main->note1) ? $FM_PD_037_main->note1 :  null }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <label for="time_roll2" class="col-md-12 col-form-label">เวลา:
                                        {{ !empty($FM_PD_037_main->time_roll2) ? $FM_PD_037_main->time_roll2 :  null }}
                                    </label>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <label class="container">
                                                        @if ( $FM_PD_037_main->correct2 == 'correct' )
                                                        <i class="fa fa-check-square-o" style="font-size: 12px;"></i>
                                                        @else
                                                        <i class="fa fa-square-o" style="font-size: 12px;"></i>
                                                        @endif
                                                        ถูกต้อง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <label class="container">
                                                        @if ( $FM_PD_037_main->correct2 == 'incorrect' )
                                                        <i class="fa fa-check-square-o" style="font-size: 12px;"></i>
                                                        @else
                                                        <i class="fa fa-square-o" style="font-size: 12px;"></i>
                                                        @endif
                                                        ไม่ถูกต้อง
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="page-group[0][note]" class="col-sm-12 col-form-label">หมายเหตุ:
                                            </label>
                                            <span style="word-wrap: break-word;">
                                                {{ !empty($FM_PD_037_main->note2) ? $FM_PD_037_main->note2 :  null }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <label for="time_roll3" class="col-md-12 col-form-label"> เวลา:
                                        {{ !empty($FM_PD_037_main->time_roll3) ? $FM_PD_037_main->time_roll3 :  null }}
                                    </label>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <label class="container">
                                                        @if ( $FM_PD_037_main->correct3 == 'correct' )
                                                        <i class="fa fa-check-square-o" style="font-size: 12px;"></i>
                                                        @else
                                                        <i class="fa fa-square-o" style="font-size: 12px;"></i>
                                                        @endif
                                                        ถูกต้อง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <label class="container">
                                                        @if ( $FM_PD_037_main->correct3 == 'incorrect' )
                                                        <i class="fa fa-check-square-o" style="font-size: 12px;"></i>
                                                        @else
                                                        <i class="fa fa-square-o" style="font-size: 12px;"></i>
                                                        @endif
                                                        ไม่ถูกต้อง
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="page-group[0][note]" class="col-sm-12 col-form-label">หมายเหตุ:
                                            </label>
                                            <span style="word-wrap: break-word;">
                                                {{ !empty($FM_PD_037_main->note3) ? $FM_PD_037_main->note3 :  null }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div>
                                    <img src="{{ asset('assets/images/sign/'.$FM_PD_037_main->operator_sign) }}"
                                        width="45">
                                </div>
                                (
                                {{ isset($FM_PD_037_main->operator_name) ? $FM_PD_037_main->operator_name : null }}
                                )
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <!-- ทวนสอบโดย -->
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <span class="font-weight-bold">ทวนสอบโดย</span>
                        @if(!empty($FM_PD_037_main->sign_leader))
                        {{-- <div> --}}
                        <img src="{{asset('/assets/images/sign/'.$FM_PD_037_main->sign_leader)}}" alt="" height="25">
                        {{-- </div> --}}
                        <b>( {{ $FM_PD_037_main->leader_name }} )</b>
                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator"
                            value="{{!empty($FM_PD_037_main->sign_leader) ? $FM_PD_037_main->sign_leader : '0' }}">
                        @else
                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator" value="0">
                        <div id="sign_operator" class="d-none"></div>

                        <button type="button" id="btn_sign_operator" class="btn btn-lg btn-block btn-primary"
                            data-toggle="modal" data-target="#sign_operator_modal">
                            <i class="fas fa-signature"></i>
                            ลายเซ็น
                        </button>
                        @endif
                        {{-- <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
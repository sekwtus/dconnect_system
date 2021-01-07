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
            padding: 0px;
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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered  ">
                            <thead>
                                @foreach ($head as $item)
                                <tr>
                                    <th colspan="3" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        FM-PD-130 Rev.06 การตรวจสอบความถูกต้องของเบอร์ช้อน (scoop)
                                    </th>
                                    <th colspan="1" class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        LINE : {{$item->line_number}}
                                    </th>
                                </tr>


                                <tr>
                                    <th class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        วันที่ :
                                        {{ substr($item->scheduled_start,6,2).'/'.substr($item->scheduled_start,4,2).'/'.(substr($item->scheduled_start,0,4)+543) }}
                                    </th>
                                    <th class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        PRODUCT ORDER : {{ $item->production_order }}
                                    </th>
                                    <th class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        ผลิตภัณฑ์ : {{$item->material_description}}
                                    </th>
                                    <th class="text-center"
                                        style="background-color:#e9ebeb;vertical-align:middle; padding: 5px;">
                                        BATCH: {{ $item->batch }}
                                    </th>
                                </tr>

                                <tr>
                                    <td class="text-center" width="10%">
                                        ช้อนเบอร์
                                    </td>
                                    <td class="text-center" width="35%">
                                        ป้าย
                                    </td>
                                    <td class="text-center" width="35%">
                                        ปัญหา / การแก้ปัญหา
                                    </td>
                                    <td class="text-center" width="20%">
                                        บันทึกโดย
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                            <tbody>
                                @foreach ($FM_PD_130_main as $index=>$item)
                                {{-- <input type="hidden" name="ID[{{ $index }}]" value="{{ $item->ID }}" /> --}}
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <label class="container">&nbsp;&nbsp;
                                                {!! (!empty($item->Spoon) && $item->Spoon == '1')
                                                ? '<i class="fa fa-check-square-o" style="font-size: 8px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 8px;"></i>' !!} 1
                                            </label>
                                        </div>
                                        <div>
                                            <label class="container">&nbsp;&nbsp;
                                                {!! (!empty($item->Spoon) && $item->Spoon == '2')
                                                ? '<i class="fa fa-check-square-o" style="font-size: 8px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 8px;"></i>' !!} 2
                                            </label>
                                        </div>
                                        <div>
                                            <label class="container">&nbsp;&nbsp;
                                                {!! (!empty($item->Spoon) && $item->Spoon == '3')
                                                ? '<i class="fa fa-check-square-o" style="font-size: 8px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 8px;"></i>' !!} 3
                                            </label>
                                        </div>
                                        <div>
                                            <label class="container">&nbsp;&nbsp;
                                                {!! (!empty($item->Spoon) && $item->Spoon == '4')
                                                ? '<i class="fa fa-check-square-o" style="font-size: 8px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 8px;"></i>' !!} 4
                                            </label>
                                        </div>
                                        <div>
                                            <label class="container">&nbsp;&nbsp;
                                                {!! (!empty($item->Spoon) && $item->Spoon == '5')
                                                ? '<i class="fa fa-check-square-o" style="font-size: 8px;"></i>' : '<i
                                                    class="fa fa-square-o" style="font-size: 8px;"></i>' !!} 5
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ !empty($item->Pic_1) ? asset('assets/FM-PD-130/'.$item->Pic_1) : null }}"
                                            alt="" height="85">
                                    </td>
                                    <td style="vertical-align: top;">
                                        <div>
                                            <span style="word-wrap: break-word;">
                                                ปัญหา:
                                                {{ !empty($item->Problem) ? $item->Problem :  null }}
                                            </span>
                                        </div>
                                        <br>
                                        <div>
                                            <span style="word-wrap: break-word;">
                                                การแก้ปัญหา:
                                                {{ !empty($item->Solution) ? $item->Solution :  null }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if(!empty($item->sign_operator))
                                        <div>
                                            <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}" alt=""
                                                height="25">
                                        </div>
                                        @endif
                                        ( {{ isset($item->operator_name)? $item->operator_name : null }} )
                                        <br>
                                        ผู้บันทึกข้อมูล <br>
                                        {{ $item->Time }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ทวนสอบโดย -->
        <br>
        <div class="row">
            <div class="col-md-12" style="text-align: right;">
                <span class="font-weight-bold">ทวนสอบโดย</span>
                @if(!empty($item->sign_leader))
                {{-- <div> --}}
                <img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" alt="" height="25">
                {{-- </div> --}}
                <b>( {{ isset($item->leader_name) ? $item->leader_name : null }} )</b>
                <input type="hidden" name="txt_sign_leader" id="txt_sign_leader"
                    value="{{!empty($item->sign_leader) ? $item->sign_leader : '0' }}">
                @endif
                {{-- <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b> --}}
            </div>
        </div>
    </div>
</body>

</html>
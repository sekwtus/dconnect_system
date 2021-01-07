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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped tbl-paperless" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">
                                        Date:
                                        {{ substr($head[0]->scheduled_start,6,2).'/'.substr($head[0]->scheduled_start,4,2).'/'.(substr($head[0]->scheduled_start,0,4)+543) }}
                                    </th>

                                    <th class="text-center align-middle">
                                        Verification Oprps And Ccps <br> For Release Product Record
                                    </th>

                                    <th class="text-center align-middle" colspan="2">
                                        PRODUCT NAME:
                                        {{$head[0]->material_description}}
                                    </th>

                                    <th class="text-center align-middle" colspan="1">
                                        Batch Code
                                    </th>

                                    <th class="text-center align-middle" colspan="1">
                                        LINE : {{ $head[0]->line_number }}
                                    </th>

                                    <th class="text-center align-middle">
                                        BATCH: {{ $head[0]->batch }}
                                    </th>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle" colspan="2">
                                        รายละเอียดของ <br> Unit Carton / Specail box
                                    </td>
                                    <td class="text-center align-middle" colspan="2">
                                        รายละเอียดของ Shipper Carton
                                    </td>
                                    <td class="text-center align-middle" colspan="2">
                                        ช้อน
                                    </td>
                                    <td class="text-center">
                                        บันทึกโดย
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($FM_PD_024_Default as $index=>$item)
                                <tr>
                                    <td class="text-right" width="10%">
                                        PM. Code
                                    </td>
                                    <td width="35%">
                                        {{ !empty($item->pm_code_unit_carton) ? $item->pm_code_unit_carton :null }}
                                    </td>
                                    <td class="text-right" width="7%" rowspan="2">
                                        PM Code
                                    </td>
                                    <td rowspan="2" width="25%">
                                        {{ !empty($item->pm_code_shipper_carton) ? $item->pm_code_shipper_carton :null }}
                                    </td>
                                    <td class="text-right" width="7%">PM. Code</td>
                                    <td width="5%" style="background-color:white;vertical-align:middle;">
                                        {{ !empty($item->pm_code_scoop) ? $item->pm_code_scoop :null }}
                                    </td>
                                    <td rowspan="2" class="text-center">
                                        @if(!empty($item->sign_operator))
                                        <div class="text-center">
                                            <img src="{{asset('/assets/images/sign/'.$item->sign_operator)}}"
                                                style="height:45px;">
                                        </div>
                                        <br> ( {{ isset($item->operator_name)? $item->operator_name : null }} )
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <div class="font-weight-normal-">วันผลิต</div>
                                        <div class="font-weight-normal-">วันหมดอายุ</div>
                                        <div class="font-weight-normal-">Meterial Number</div>
                                        <div class="font-weight-normal-">Batch</div>
                                        <div class="font-weight-normal-">Product Order/Line</div>
                                    </td>

                                    <td class="text-center">
                                        <img src="{{ !empty($item->Detail_Unit_Carton) ? asset('assets/FM-PD-024/'.$item->Detail_Unit_Carton) : null }}"
                                            alt="" height="100">
                                    </td>
                                    <td>ช้อนเบอร์</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! !empty($item->spoon_size) &&
                                                $item->spoon_size == '1'
                                                ? '<i class="fa fa-check-square-o" style="font-size: 14px;"></i>' :
                                                '<i class="fa fa-square-o" style="font-size: 14px;"></i>' !!} 1
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!
                                                        !empty($item->spoon_size) && $item->spoon_size == '2'
                                                        ? '<i class="fa fa-check-square-o"
                                                            style="font-size: 14px;"></i>' : '<i class="fa fa-square-o"
                                                            style="font-size: 14px;"></i>' !!} 2
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!
                                                        !empty($item->spoon_size) && $item->spoon_size == '3'
                                                        ? '<i class="fa fa-check-square-o"
                                                            style="font-size: 14px;"></i>' : '<i class="fa fa-square-o"
                                                            style="font-size: 14px;"></i>' !!} 3
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!
                                                        !empty($item->spoon_size) && $item->spoon_size == '4'
                                                        ? '<i class="fa fa-check-square-o"
                                                            style="font-size: 14px;"></i>' : '<i class="fa fa-square-o"
                                                            style="font-size: 14px;"></i>' !!} 4
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <label class="container">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!
                                                        !empty($item->spoon_size) && $item->spoon_size == '5'
                                                        ? '<i class="fa fa-check-square-o"
                                                            style="font-size: 14px;"></i>' : '<i class="fa fa-square-o"
                                                            style="font-size: 14px;"></i>' !!} 5
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
                        @if(!empty($item->sign_leader))
                        {{-- <div> --}}
                        <img src="{{asset('/assets/images/sign/'.$item->sign_leader)}}" alt="" height="25">
                        <b>( {{ isset($item->leader_name) ? $item->leader_name : null }} )</b>
                        {{-- </div> --}}
                        <input type="hidden" name="txt_sign_operator" id="txt_sign_operator"
                            value="{{!empty($item->sign_leader) ? $item->sign_leader : '0' }}">
                        @endif
                        {{-- <b style="color:red;">* กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล</b> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
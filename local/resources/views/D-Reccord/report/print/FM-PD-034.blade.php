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
            font-size: 16px;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
                /*font-size : 16px;*/
            }
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
            padding: 5px;
            text-align: left;
        }

        body {
            font-family: 'THSarabunNew';
        }
    </style>

    <style media="screen">
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
            margin-bottom: 25px;
        }

        .btn.btn-icons,
        a.btn-icons {
            width: 40px;
            height: 40px;
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        /* end star admin */

        .style-check-box,
        .style-radio {
            font-size: 15pt !important;
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
            padding: 5px;
            line-height: 1.35;
        }

        .tbl-paperless th {
            border: 1px solid black;
            background-color: #e9ebeb;
            vertical-align: middle;
            font-size: 16pt;
            font-weight: 700 !important;
        }

        .tbl-paperless td {
            border: 1px solid black;
            vertical-align: middle;
            font-size: 14pt;
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
            border: ;
            background: #4aa8e4;
            color: #fff;
            vertical-align: middle;
            font-size: 0.875rem;
            line-height: 1.35;
            /* padding: 18px 15px; */
        }

        .tbl-danone td {
            /* vertical-align: top; */
            font-size: 0.850rem;
            line-height: 1.35;
            /* padding: .45rem; */
        }
    </style>
    <style>
        .page-break {
            page-break-after: always;
        }

        .text-center {
            text-align: center;
        }

        .align-middle {
            vertical-align: middle;
        }

        .align-top {
            vertical-align: top;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div id="print-area" class="row">
                    <div class="col-md-12">
                        <table class="tbl-paperless table-">
                            <thead class="text-center">
                                <tr>
                                    <th colspan="2" style="vertical-align: middle;">
                                        แบบฟอร์มบันทึกการตรวจสอบ Unit Carton / Special Box
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr style="font-size: pt;">
                                    <td colspan="">
                                        ผลิตภัณฑ์ {{ $head[0]->material_description }}
                                        เลขที่ผลิต {{ $head[0]->production_order }}
                                    </td>

                                    <td class="text-right" style="width:%;">
                                        FM-PD-034 Rev No.12
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">- กล่องยูนิตบรรจุ (Unit Box)</label>

                                                <div class="mt-1" style="text-indent: em;">
                                                    <label class="container">
                                                        {!! (!empty($FM_PD_034->Unit_Box) && $FM_PD_034->Unit_Box ==
                                                        'Unit Carton')
                                                        ? '<i class="fa fa-check-square-o"
                                                            style="font-size: 14px;"></i>' : '<i class="fa fa-square-o"
                                                            style="font-size: 14px;"></i>' !!}
                                                        Unit Carton
                                                    </label>

                                                    <label class="container">
                                                        {!! (!empty($FM_PD_034->Unit_Box) && $FM_PD_034->Unit_Box ==
                                                        'Spacial Box')
                                                        ? '<i class="fa fa-check-square-o"
                                                            style="font-size: 14px;"></i>' : '<i class="fa fa-square-o"
                                                            style="font-size: 14px;"></i>' !!}
                                                        Special Box
                                                    </label>
                                                </div>


                                                <label class="col-form-label">- Lot No./Batch No.: </label>
                                                {{ !empty($FM_PD_034->Batch_No) ?$FM_PD_034->Batch_No :null }}

                                                <label class="col-form-label">- PM Code: </label>
                                                {{ !empty($pm_code) ?$pm_code->sap_code : (!empty($FM_PD_034->PM_Code) ?$FM_PD_034->PM_Code :null) }}
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="align-top border-bottom-0">
                                        <div>
                                            วิธีปฏิบัติ :
                                        </div>

                                        <div style="text-indent: 3em;">
                                            <div>
                                                - ให้ดึงใบรายละเอียดข้างกล่อง Unit Carton / Shipper Carton มาติด
                                            </div>

                                            <div>
                                                - ถ้ารายละเอียดข้างกล่อง Unit Carton / Shipper Carton
                                                แต่ละกล่องเหมือนกันให้ดึงมาติดแค่ใบเดียว
                                            </div>

                                            <div>
                                                - สำหรับกล่องที่ใช้ Unit Carton / Shipper Carton ไม่หมด
                                                ไม่ต้องดึงใบมาติด ให้บันทึกรายละเอียดลงบรรทัดด้านล่างแทน
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-center">
                                        <img style="height: 200px;"
                                            src="{{ !empty($FM_PD_034->Pic_1) ?asset('assets/FM-PD-034/'.$FM_PD_034->Pic_1) :null }}"
                                            alt="">
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold" colspan="2">
                                        ตรวจโดยฝ่ายผลิต
                                        <span id="sign_operator"
                                            class="{{ !empty($FM_PD_034->sign_operator) ?'' :'d-none' }}">
                                            <img src="{{ !empty($FM_PD_034->sign_operator) ?asset('assets/images/sign/'.$FM_PD_034->sign_operator) :'' }}"
                                                style="width:145px; height:50px;"><b>(
                                                {{ isset($FM_PD_034->leader_name) ? $FM_PD_034->leader_name : null }}
                                                )</b>
                                        </span>

                                        @if (isset($FM_PD_034))
                                        วันที่ {{ th_date_time_slash($FM_PD_034->created_at) }}
                                        @endif
                                        {{-- วันที่ {{ th_date_slash($FM_PD_034->created_at) }} --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
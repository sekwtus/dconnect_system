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
            font-size: 6px;
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
            font-size: 6px;
        }

        /* table paperless -*/


        /* ตาราง ฟอร์มเอกสาร */
        table {
            width: 100%;
            border-collapse: collapse;
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
    <div class="row mb-2">
        <div class="col-md-12">
            <table class="tbl-paperless">
                <tr>
                    <th style="width:%;">
                        ชื่อผลิตภัณฑ์
                        {{ $head[0]->material_description }}
                    </th>
                    <th style="width:50%;">
                        วันที่
                        {{ th_date_scheduled_start($head[0]->scheduled_start) }}
                        <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $head[0]->production_order }}</label>
                        <label>BATCH: &nbsp;&nbsp; {{ $head[0]->batch }}</label>
                    </th>
                </tr>

                <!-- 018-1 mixing -->
                <tr>
                    <td class="align-top">
                        &nbsp;<u>การตรวจสอบ RAW MATERIAL จาก WHEREHOUSE</u>
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    &nbsp;<label class="container">
                                        {!! (!empty($FM_PD_018_1->clear_milk) && $FM_PD_018_1->clear_milk == 'on') ? '<i
                                            class="fa fa-check-square-o" style="font-size: 6px;"></i>' : '<i
                                            class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                        ใช้นมชนิดเดิมผลิตต่อ
                                    </label>
                                    &nbsp;
                                    &nbsp;<label class="container">
                                        {!! (!empty($FM_PD_018_1->clear_milk) && $FM_PD_018_1->clear_milk == 'off') ?
                                        '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>' : '<i
                                            class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                        เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                &nbsp;<span>ชนิดของนมที่ส่ง</span>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1.
                                            {{ !empty($FM_PD_018_1->type_milk1) ?$FM_PD_018_1->type_milk1 :null }}</span>
                                        &nbsp;
                                        <span class="input-group-text">2.
                                            {{ !empty($FM_PD_018_1->type_milk2) ?$FM_PD_018_1->type_milk2 :null }}</span>
                                        &nbsp;
                                        <span class="input-group-text">3.
                                            {{ !empty($FM_PD_018_1->type_milk3) ?$FM_PD_018_1->type_milk3 :null }}</span>
                                        &nbsp;
                                        <span class="input-group-text">4.
                                            {{ !empty($FM_PD_018_1->type_milk4) ?$FM_PD_018_1->type_milk4 :null }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                &nbsp;<span>RM. Code</span>
                                <table>
                                    <tr>
                                        <td class="text-center" width="50%">หมายเลข RM</td>
                                        <td class="text-center" width="50%">เบอร์ไซเฟอร์</td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <div class="input-group input-group-sm mb-2">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->rm_code1) ?$FM_PD_018_1->rm_code1 :null }}
                                                </span>
                                            </div>

                                            <div class="input-group input-group-sm mb-2">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->rm_code2) ?$FM_PD_018_1->rm_code2 :null }}
                                                </span>
                                            </div>

                                            <div class="input-group input-group-sm mb-2">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->rm_code3) ? $FM_PD_018_1->rm_code3 :  null }}
                                                </span>
                                            </div>

                                            <div class="input-group input-group-sm">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->rm_code4) ?$FM_PD_018_1->rm_code4 :null }}
                                                </span>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="input-group input-group-sm mb-2">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->no_fiber1) ? $FM_PD_018_1->no_fiber1 :  null }}
                                                </span>
                                            </div>

                                            <div class="input-group input-group-sm mb-2">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->no_fiber2) ?$FM_PD_018_1->no_fiber2 :null }}
                                                </span>
                                            </div>

                                            <div class="input-group input-group-sm mb-2">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->no_fiber3) ?$FM_PD_018_1->no_fiber3 :null }}
                                                </span>
                                            </div>

                                            <div class="input-group input-group-sm">
                                                <span style="word-wrap: break-word;">
                                                    &nbsp;{{ !empty($FM_PD_018_1->no_fiber4) ?$FM_PD_018_1->no_fiber4 :null }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <br>
                            <div class=" col-md-12 text-center">
                                บันทึกโดย
                                @if(!empty($FM_PD_018_1->save_by_remove_bag))
                                {{-- <div> --}}
                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_1->save_by_remove_bag) }}"
                                    width="45">
                                {{-- </div> --}}
                                @endif
                                {{-- <div> --}}
                                {{-- </div> --}}
                                {{-- <div> --}}
                                (พนักงานถอดถุงนม mixing)
                                {{-- </div> --}}
                                @if(!empty($FM_PD_018_1->save_by_remove_bag))
                                <br> ( {{ $FM_PD_018_1->remove_bag_name }} ) <br>
                                @endif
                            </div>
                        </div>
                    </td>

                    <td class="align-top" style="vertical-align: top;">
                        <u>Process Flow (รายละเอียดการผลิต)</u>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <span>หมายเลขสูตรการผลิต
                                    {{ !empty($FM_PD_018_1->no_formula) ?$FM_PD_018_1->no_formula :null }}</span>
                            </div>

                            <table class="tbl-paperless">
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="width:50%;">
                                            เบลนเดอร์ที่ใช้
                                        </td>
                                        <td class="text-center" style="width:50%;">
                                            เครื่องบรรจุที่ใช้
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="vertical-align: top;">
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->blender) && $FM_PD_018_1->blender ==
                                                    '1')
                                                    ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    เบลนเดอร์ 1 (Prebiotic)
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->blender) && $FM_PD_018_1->blender ==
                                                    '2')
                                                    ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    เบลนเดอร์ 2 (Prebiotic)
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->blender) && $FM_PD_018_1->blender ==
                                                    '3')
                                                    ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    เเบลนเดอร์ 1 และ สไมล์ (Synbiotic)
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->blender) && $FM_PD_018_1->blender ==
                                                    '4')
                                                    ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    ไอเอฟ เซกรีแคร์ (IF Segrecare)
                                                </label>
                                            </div>
                                        </td>

                                        <td style="vertical-align: top;">
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->filling1) && $FM_PD_018_1->filling1
                                                    ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    Filling line 1
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->filling2) && $FM_PD_018_1->filling2
                                                    ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    Filling line 2
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->filling3) && $FM_PD_018_1->filling3
                                                    ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    Filling line 3
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->filling4) && $FM_PD_018_1->filling4
                                                    ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    Filling line 4
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->filling5) && $FM_PD_018_1->filling5
                                                    ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    Filling line 5
                                                </label>
                                            </div>
                                            <div>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_1->filling6) && $FM_PD_018_1->filling6
                                                    ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                                    Filling line 6
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-2">
                            <br>
                            <div class="col-md-12 text-center">
                                บันทึกโดย
                                @if(!empty($FM_PD_018_1->save_by_poue_milk))
                                {{-- <div class=" align-self-end"> --}}
                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_1->save_by_poue_milk) }}"
                                    width="45">
                                {{-- </div> --}}
                                @endif
                                {{-- <div> --}}
                                {{-- </div> --}}
                                {{-- <div class=""> --}}
                                (พนักงานเทนม mixing)
                                {{-- </div> --}}
                                {{-- <span class="align-text-bottom">text-bottom</span> --}}
                                @if(!empty($FM_PD_018_1->save_by_poue_milk))
                                <br> ( {{ $FM_PD_018_1->poue_milk_name }} ) <br>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <!-- 018-2 filling -->
                    <td style="vertical-align: top;">
                        <div class="row">
                            <div class="col-md-5">
                                &nbsp;<u>Ribbon ที่ใช้</u>
                                <label class="container">
                                    &nbsp;&nbsp;{!! (!empty($FM_PD_018_2->ribbon) && $FM_PD_018_2->ribbon == '1') ?
                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                    :
                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                    Ribbon อาร์ตเวิร์ค
                                </label>
                                <label class="container">
                                    &nbsp;&nbsp;{!! (!empty($FM_PD_018_2->ribbon) && $FM_PD_018_2->ribbon=='2') ?
                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                    :
                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                    Ribbon คอมม่อน
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                &nbsp;<u>บันทึกการเปลี่ยนผลิตภัณฑ์</u>
                                <div>
                                    <div>
                                        <label class="container">
                                            &nbsp;&nbsp;&nbsp;&nbsp;{!! (!empty($FM_PD_018_2->product_change_log) &&
                                            $FM_PD_018_2->product_change_log=='1') ?
                                            '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                            :
                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>' !!}
                                            เดินผลิตภัณฑ์ตัวแรกของสัปดาห์
                                        </label>
                                    </div>
                                    <div>
                                        <label class="container">
                                            &nbsp;&nbsp;&nbsp; {!! (!empty($FM_PD_018_2->product_change_log) &&
                                            $FM_PD_018_2->product_change_log=='2') ?
                                            '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                            :
                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                            !!}
                                            มีการเปลี่ยนสูตรผลิตภัณฑ์
                                        </label>
                                    </div>
                                    <div>
                                        <label class="container">
                                            &nbsp;&nbsp;&nbsp; {!! (!empty($FM_PD_018_2->product_change_log) &&
                                            $FM_PD_018_2->product_change_log=='3') ?
                                            '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                            :
                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                            !!} ไม่มีการเปลี่ยนสูตรผลิตภัณฑ์
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pl-4 sub_product_change_log">
                            <div class="col-md-12">
                                @php
                                $arr_sub_product_change_log = !empty($FM_PD_018_2->product_change_log) ?explode(',',
                                $FM_PD_018_2->sub_product_change_log) :array();
                                @endphp

                                <div class="input-group">
                                    <label class="container">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {!! (!empty($FM_PD_018_2->sub_product_change_log) &&
                                        (string)in_array('1', $arr_sub_product_change_log)) ?
                                        '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                        :
                                        '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                        !!} ไม่มีนมตกค้างใน Blender/Hopper
                                    </label>
                                </div>

                                <div class="input-group">
                                    <label class="container">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {!! (!empty($FM_PD_018_2->sub_product_change_log) &&
                                        (string)in_array('2', $arr_sub_product_change_log)) ?
                                        '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                        :
                                        '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                        !!} ไม่มีนมตกค้างใน Seperator/Vibrator sieve
                                    </label>
                                </div>

                                <div class="input-group">
                                    <label class="container">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {!! (!empty($FM_PD_018_2->sub_product_change_log) &&
                                        (string)in_array('3', $arr_sub_product_change_log)) ?
                                        '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                        :
                                        '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                        !!} ไม่มีนมตกค้างในเครื่องบรรจุ
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                &nbsp;<u>ตรวจสอบความถูกต้องของ Foil</u>
                            </div>

                            <div class="col-md-6 text-center">
                                <div class="text-center">รูป Art Work (กรณีที่มี Art Work)</div>
                                <img src="{{ !empty($FM_PD_018_2_art_work_Default->pic1) ? asset('assets/FM-PD-018/artwork/'.$FM_PD_018_2_art_work_Default->pic1) : null }}"
                                    alt="" height="25">
                            </div>

                            <div class="col-md-6 text-center">
                                <div class="text-center">รูปแบชผลิตภัณฑ์</div>
                                <img src="{{!empty($FM_PD_018_2->file) ? asset('assets/FM-PD-018/'.$FM_PD_018_2->file) : null}}"
                                    alt="" height="25">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                {{-- <div class="text-center">ความถูกต้องของการพิมพ์</div> --}}
                                <table class="">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-center">ความถูกต้องของการพิมพ์</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_2->product_name) &&
                                                    $FM_PD_018_2->product_name == 'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} ชื่อผลิตภัณฑ์
                                                </label>

                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_2->product_date) &&
                                                    $FM_PD_018_2->product_date == 'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} วันที่ผลิต
                                                </label>

                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_2->batch) && $FM_PD_018_2->batch ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} แบช
                                                </label>
                                            </td>

                                            <td>
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_2->time) && $FM_PD_018_2->time == 'on')
                                                    ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} เวลา
                                                </label>

                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_2->exp_date) && $FM_PD_018_2->exp_date
                                                    ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} วันหมดอายุ
                                                </label>

                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_2->order) && $FM_PD_018_2->order ==
                                                    'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} ออเดอร์/ไลน์
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                &nbsp;<span>ข้อมูลผลิตภัณฑ์เดิมที่แพ็คก่อนหน้านี้
                                    {{ !empty($FM_PD_018_2->product) ? $FM_PD_018_2->product : null  }}</span>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <br>
                            <div class="col-md-6 text-center">
                                บันทึกโดย
                                @if (!empty($FM_PD_018_2->save_by))
                                {{-- <div> --}}
                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_2->save_by) }}" width="45">
                                {{-- </div> --}}
                                @endif
                                {{-- <div> --}}
                                {{-- </div> --}}
                                {{-- <div> --}}
                                (filling)
                                {{-- </div> --}}
                                @if (!empty($FM_PD_018_2->save_by))
                                <br> ( {{ $FM_PD_018_2->save_by_name }} ) <br>
                                @endif
                            </div>

                            <div class="col-md-6 text-center">
                                ตรวจสอบโดย
                                @if (!empty($FM_PD_018_2->verify_by))
                                {{-- <div> --}}
                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_2->verify_by) }}" width="45">
                                {{-- </div> --}}
                                @endif
                                {{-- <div> --}}
                                {{-- </div> --}}
                                {{-- <div> --}}
                                (filling)
                                {{-- </div> --}}
                                @if (!empty($FM_PD_018_2->verify_by))
                                <br> ( {{ $FM_PD_018_2->verify_by_name }} ) <br>
                                @endif
                            </div>
                        </div>
                    </td>

                    <!-- 018-3 packing -->
                    <td style="vertical-align: top;">
                        <!-- รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch -->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tbl-paperless">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-right" style="width: 30%;">&nbsp;PM Code</td>
                                            <td>
                                                &nbsp;{{ !empty($pm_code_unit_carton) ?$pm_code_unit_carton->sap_code : (!empty($FM_PD_018_3) ?$FM_PD_018_3->pm_code_unit_carton :'') }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-right">
                                                <div class="font-weight-normal-">&nbsp;วันผลิต</div>
                                                <div class="font-weight-normal-">&nbsp;วันหมดอายุ</div>
                                                <div class="font-weight-normal-">&nbsp;ควรบริโภคก่อน</div>
                                                <div class="font-weight-normal-">&nbsp;Meterial Number</div>
                                                <div class="font-weight-normal-">&nbsp;Product Order/Line</div>
                                            </td>

                                            <td class="text-center">
                                                <img src="{{ !empty($FM_PD_018_3->material_no) ?asset('assets/FM-PD-018/'.$FM_PD_018_3->material_no) :null }}"
                                                    alt="" height="45">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="">
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_3->no_milk_left_in) &&
                                                    $FM_PD_018_3->no_milk_left_in == 'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} เคลียร์ Unit/Special Box
                                                    ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- ช้อน -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <table class="tbl-paperless">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                &nbsp;ช้อน
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-right" style="width:20%;">
                                                &nbsp;ช้อน
                                            </td>

                                            <td class="text-" style="">
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_3->spoon_type) &&
                                                    $FM_PD_018_3->spoon_type == '1') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} ไม่ใช้ช้อน
                                                </label>

                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_3->spoon_type) &&
                                                    $FM_PD_018_3->spoon_type == '2') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} ใช้ช้อนเบอร์เดิม
                                                </label>

                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_3->spoon_type) &&
                                                    $FM_PD_018_3->spoon_type == '3') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} เคลียร์ช้อนที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-right">
                                                &nbsp;ช้อนเบอร์
                                            </td>

                                            <td>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="container">
                                                            &nbsp;{!! (!empty($FM_PD_018_3->spoon_size) &&
                                                            $FM_PD_018_3->spoon_size == '1') ?
                                                            '<i class="fa fa-check-square-o"
                                                                style="font-size: 6px;"></i>'
                                                            :
                                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                            !!} 1
                                                        </label>
                                                        &nbsp;
                                                        <label class="container">
                                                            &nbsp;{!! (!empty($FM_PD_018_3->spoon_size) &&
                                                            $FM_PD_018_3->spoon_size == '2') ?
                                                            '<i class="fa fa-check-square-o"
                                                                style="font-size: 6px;"></i>'
                                                            :
                                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                            !!} 2
                                                        </label>
                                                        &nbsp;
                                                        <label class="container">
                                                            &nbsp;{!! (!empty($FM_PD_018_3->spoon_size) &&
                                                            $FM_PD_018_3->spoon_size == '3') ?
                                                            '<i class="fa fa-check-square-o"
                                                                style="font-size: 6px;"></i>'
                                                            :
                                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                            !!} 3
                                                        </label>
                                                        &nbsp;
                                                        <label class="container">
                                                            &nbsp;{!! (!empty($FM_PD_018_3->spoon_size) &&
                                                            $FM_PD_018_3->spoon_size == '4') ?
                                                            '<i class="fa fa-check-square-o"
                                                                style="font-size: 6px;"></i>'
                                                            :
                                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                            !!} 4
                                                        </label>
                                                        &nbsp;
                                                        <label class="container">
                                                            &nbsp;{!! (!empty($FM_PD_018_3->spoon_size) &&
                                                            $FM_PD_018_3->spoon_size == '5') ?
                                                            '<i class="fa fa-check-square-o"
                                                                style="font-size: 6px;"></i>'
                                                            :
                                                            '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                            !!} 5
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="text-right">
                                                &nbsp;ถ่ายรูปช้อน
                                            </td>

                                            <td class="text-center">
                                                <img style="display: block"
                                                    src="{{ asset('/assets/images/scoop/'.$scoop_number.'.jpg') }}"
                                                    alt="">

                                                <img src="{{ !empty($FM_PD_018_3->spoon_file) ? asset('assets/FM-PD-018/'.$FM_PD_018_3->spoon_file) : null }}"
                                                    alt="" height="45">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-right">&nbsp;PM CODE</td>

                                            <td colspan="" class="">
                                                &nbsp;{{ !empty($pm_code_scoop) ?$pm_code_scoop->item_scoop :(!empty($FM_PD_018_3) ?$FM_PD_018_3->pm_code_scoop :'') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- รายละเอียดของ Shipper Carton -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <table class="tbl-paperless">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                รายละเอียดของ Shipper Carton
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="text-">
                                                <label class="container">
                                                    &nbsp;{!! (!empty($FM_PD_018_3->clear_unit_special_box) &&
                                                    $FM_PD_018_3->clear_unit_special_box == 'on') ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} เคลียร์ Shipper
                                                    ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="row">
                                                    <div class="column">
                                                        &nbsp;PM Code/เลขก้น Unit :
                                                        {{ !empty($pm_code_shipper_carton) ?$pm_code_shipper_carton->sap_code : (!empty($FM_PD_018_3) ?$FM_PD_018_3->pm_code_shipper_carton :'') }}
                                                    </div>
                                                    <div class="column">
                                                        &nbsp;Material Code :
                                                        {{ !empty($FM_PD_018_3->material_code) ?$FM_PD_018_3->material_code :null }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        &nbsp;Product Hierarehy :
                                                        {{ !empty($FM_PD_018_3->product_hierarehy) ?$FM_PD_018_3->product_hierarehy :null }}
                                                    </div>
                                                    <div class="column">
                                                        &nbsp;Time :
                                                        @if (!empty($FM_PD_018_3->time_shipper_carton))
                                                        {{ $FM_PD_018_3->time_shipper_carton }}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        &nbsp;Batch Number :
                                                        {{ !empty($FM_PD_018_3->batch_no) ?$FM_PD_018_3->batch_no :null }}
                                                    </div>
                                                    <div class="column">
                                                        &nbsp;EXP. :
                                                        {{ !empty($FM_PD_018_3->product_line) ?$FM_PD_018_3->product_line :null }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        &nbsp;BBD. :
                                                        {{ !empty($FM_PD_018_3->bbd) ?$FM_PD_018_3->bbd :null }}
                                                    </div>
                                                    <div class="colum">
                                                        &nbsp;Product Order/Line :
                                                        {{ !empty($FM_PD_018_3->product_line) ?$FM_PD_018_3->product_line :null }}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- กาวที่ใช้ในการผลิต -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <table class="tbl-paperless">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                กาวที่ใช้ในการผลิต
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="container">
                                                    &nbsp; {!! (!empty($FM_PD_018_3->glue) && $FM_PD_018_3->glue == '1')
                                                    ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} ไทย
                                                </label>

                                                <label class="container">
                                                    &nbsp; {!! (!empty($FM_PD_018_3->glue) && $FM_PD_018_3->glue == '2')
                                                    ?
                                                    '<i class="fa fa-check-square-o" style="font-size: 6px;"></i>'
                                                    :
                                                    '<i class="fa fa-square-o" style="font-size: 6px;"></i>'
                                                    !!} ส่งออก
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <br>
                            <div class="col-md-12 text-center">
                                <span class="font-weight-bold">บันทึกโดย</span>

                                @if (!empty($FM_PD_018_3->sign_operator))
                                <img src="{{ asset('/assets/images/sign/'.$FM_PD_018_3->sign_operator) }}" width="45">
                                ( {{ $FM_PD_018_3->operator_name }} ) <br>
                                @endif
                                (พนักงาน Operator packing)
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <!-- ลายเซ็นผู้บันทึก -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span class="font-weight-bold">ทวนสอบโดย</span>
                                <br>
                                <br>
                                {{-- <div id="sign_leader" class="{{ !empty($FM_PD_018_3->sign_leader) ?'' :'d-none' }}">
                                --}}
                                <img src="{{ !empty($FM_PD_018_3->sign_leader) ?asset('/assets/images/sign/'.$FM_PD_018_3->sign_leader) :'' }}"
                                    width="45">
                                <br> ( {{ isset($FM_PD_018_3->leader_name)? $FM_PD_018_3->leader_name : null }} )
                                {{-- </div> --}}
                                <div>(PD.Line leader/Supervisor/IRF)</div>
                            </div>

                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
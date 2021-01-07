@extends('layouts.master')

@section('main')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">DRecord</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tabs</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                New</button>
        </div>
    </div>
</div>

<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Nav Pills Tabs</h4> --}}
                <ul class="nav nav-pills m-t-30 m-b-30">
                    <li class="nav-item" style="width:25%;text-align:center;"> <a href="#navpills-1"
                            class="nav-link active" data-toggle="tab" aria-expanded="false">FILLING</a> </li>
                    <li class="nav-item" style="width:25%;text-align:center;"> <a href="#navpills-2" class="nav-link"
                            data-toggle="tab" aria-expanded="false">X-RAY</a> </li>
                    <li class="nav-item" style="width:25%;text-align:center;"> <a href="#navpills-3" class="nav-link"
                            data-toggle="tab" aria-expanded="false">AUTO PACKING</a> </li>
                    <li class="nav-item" style="width:25%;text-align:center;"> <a href="#navpills-4" class="nav-link"
                            data-toggle="tab" aria-expanded="true">BOX PACKING</a> </li>
                </ul>
                <div class="tab-content br-n pn">
                    {{-- 1 --}}
                    <div id="navpills-1" class="tab-pane active">
                        <ul class="nav nav-pills m-t-30 m-b-30">
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#FILLING-1"
                                    class="nav-link active" data-toggle="tab" aria-expanded="false">FM-PD-018 Rev NO.35
                                    (1)</a> </li>
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#FILLING-2"
                                    class="nav-link" data-toggle="tab" aria-expanded="false">FM-PD-132 Rev.11 (1)</a>
                            </li>
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#FILLING-3"
                                    class="nav-link" data-toggle="tab" aria-expanded="false">FM-PD-037 Rev No.03</a>
                            </li>
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#FILLING-4"
                                    class="nav-link" data-toggle="tab" aria-expanded="true">FM-PD-044 Rev.03 (1)</a>
                            </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="FILLING-1" class="tab-pane active">

                            </div>
                            <div id="FILLING-2" class="tab-pane">
                                <div id="document-0" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h5 class="mb-0">
                                                            <b>
                                                                Verification OPRPs and CCPs for Release Product Record
                                                            </b>
                                                        </h5>
                                                    </td>
                                                </tr>

                                                <tr class="text-center">
                                                    <th rowspan="2" style="width:%;">
                                                        DATE
                                                    </th>

                                                    <th rowspan="2" colspan="2">
                                                        PRODUCTION DETAIL
                                                    </th>

                                                    <th style="width:%;">
                                                        CCP/OPRP
                                                    </th>

                                                    <th colspan="2">
                                                        RESULT
                                                    </th>

                                                    <th style="width:%;">
                                                        CHECKED BY
                                                    </th>

                                                    <th style="width:%;">
                                                        REMARK
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td rowspan="10">
                                                        {{-- {{ th_date_short(date("Y-m-d")) }} --}}
                                                    </td>

                                                    <td rowspan="4" style="width:10%;">
                                                        PRODUCT NAME
                                                    </td>

                                                    <td rowspan="4" style="width:10%;" class="text-center">
                                                        <!-- PRODUCT NAME -->
                                                    </td>

                                                    <!-- start 1 -->
                                                    <td class="text-center" rowspan="2">
                                                        <div>OPRP 1</div>
                                                        <div>Bigbag</div>
                                                    </td>

                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        ส่วนผสมตรงตามสูตรการผลิต 100%
                                                    </td>
                                                    <td rowspan="2" class="text-center">

                                                    </td>
                                                    <td rowspan="2" class="text-center">

                                                    </td>
                                                    <!-- end 1 -->
                                                </tr>

                                                <tr>
                                                    <td class="text-center">
                                                    </td>

                                                    <td>
                                                        ส่วนผสมไม่ตรงตามสูตรการผลิต
                                                    </td>
                                                </tr>

                                                <!-- start 1 -->
                                                <tr>
                                                    <td rowspan="2" style="width:%;" class="text-center">
                                                        <div>OPRP 2</div>
                                                        <div>Magnet</div>
                                                    </td>

                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        เศษผงโลหะที่ปนมากับนม < 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ < 0.6 PPM </td> <td
                                                            class="text-center" rowspan="2">
                                                            <!-- CHECKED BY -->
                                                    </td>
                                                    <td class="text-center" rowspan="2">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        เศษผงโลหะที่ปนมากับนม > 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ > 0.6 PPM
                                                    </td>
                                                </tr>
                                                <!-- end 1 -->

                                                <!-- start 2 -->
                                                <tr>
                                                    <td rowspan="2" class="text-center">
                                                        PRODUCTION ORDER.LINE
                                                    </td>

                                                    <td rowspan="2" class="text-center">
                                                        <!-- PRODUCTION ORDER.LINE -->
                                                    </td>

                                                    <td class="text-center" rowspan="2">
                                                        <div>CCP 1</div>
                                                        <div>Vibratory sieve</div>
                                                    </td>

                                                    <td style="width:5%;" class="text-center"></td>
                                                    <td>
                                                        ตะแกรงอยู่ในสภาพสมบูรณ์ ไม่ขาดชำรุด และขนาดของช่องตะแกรงยังคงเหมือนเดิม
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- CHECKED BY -->
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        เศษผงโลหะที่ปนมากับนม < 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ < 0.6 PPM </td>
                                                            </tr> <!-- end 2 -->

                                                            <!-- start 3 -->
                                                <tr>
                                                    <td rowspan="2" class="text-center">
                                                        BATCH NO.
                                                    </td>

                                                    <td rowspan="2" class="text-center">
                                                        <!-- BATCH NO. -->
                                                    </td>

                                                    <td class="text-center" rowspan="2">
                                                        <div>CCP 2</div>
                                                        <div>X-Ray</div>
                                                    </td>

                                                    <td style="width:5%;" class="text-center"></td>
                                                    <td>
                                                        X-Ray reject แผ่นทดสอบสแตนเลสขนาด 1.2 มม.และโลหะขนาด 1.2 มม.
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- CHECKED BY -->
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        X-Rayไม่ reject แผ่นทดสอบสแตนเลสขนาด 1.2 มม.และโลหะขนาด 1.2 มม.
                                                    </td>
                                                </tr>
                                                <!-- end 3 -->

                                                <!-- start 4 -->
                                                <tr>
                                                    <td rowspan="2" class="text-center">
                                                        SIZE
                                                    </td>

                                                    <td rowspan="2" class="text-center">

                                                    </td>

                                                    <td class="text-center" rowspan="2">
                                                        <div>CCP 3 A หรือ B</div>
                                                        <div>Barcode Reader</div>
                                                    </td>

                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        Barcode reader reject บาร์โค้ดผิด, บาร์โค้ดไม่มี
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- CHECKED BY -->
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        Barcode reader ไม่ reject บาร์โค้ดผิด, บาร์โค้ดไม่มี
                                                    </td>
                                                </tr>
                                                <!-- end 4 -->
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="10">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                วิธีการบันทึก : ทำเครื่องหมายถูก ( / ) ลงในช่อง ของ Result
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                FM-PD-132 Rev.11 Effective date 01 / 04 / 2020
                                                            </div>

                                                            <div class="col-md-6 text-right">
                                                                Verified by : Sumate S. (Production Manager/Assistant Production Manager)
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div id="FILLING-3" class="tab-pane">
                                <div id="document-2" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <tr class="text-center" style="font-size: 14pt;">
                                                <td style="width:20%;">
                                                    <span>
                                                        DUMEX LTD. (Thailand)
                                                    </span>
                                                </td>

                                                <td colspan="4" style="width:50%;">
                                                    <h4 class="mb-0">
                                                        บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง
                                                    </h4>
                                                </td>

                                                <td colspan="2" style="width:30%;">
                                                    <span>
                                                        FM-PD-37 Rev No.03 Eff.Date.06/12/16
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr style="font-size: 14pt;">
                                                <td colspan="7">
                                                    ฟอยล์สำหรับบรรจุนมชนิดซอง

                                                    <span>
                                                        ชื่อผลิตภัณฑ์
                                                        ..........
                                                    </span>

                                                    <span>
                                                        ขนาด
                                                        ..........
                                                        กรัม
                                                    </span>

                                                    <span>
                                                        แบท
                                                        ..........
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr style="font-size: 14pt; background-color: #ffff80;">
                                                <td colspan="7" style="border-bottom: ;">
                                                    checkbox || textbox
                                                    ComminFoil

                                                    checkbox || textbox
                                                    Art Work

                                                    textbox อันเล็กๆ
                                                </td>
                                            </tr>

                                            <tr style="font-size: 14pt;" class="text-center">
                                                <th style="width: 25%;">Tag ม้วนฟอยล์</th>
                                                <th style="width: 10%;">เวลาที่เปลี่ยนม้วน</th>
                                                <th style="width: 10%; background-color: #ffff80;">ความถูกต้องของ Foil</th>
                                                <th style="width: 10%;">เครื่องบรรจุที่</th>
                                                <th style="width: 15%;">รอยต่อที่ 1</th>
                                                <th style="width: 15%;">รอยต่อที่ 2</th>
                                                <th style="width: 15%;">รอยต่อที่ 3</th>
                                            </tr>

                                            @for ($i=1; $i<=4; $i++) <tr>
                                                <td rowspan="2"></td>

                                                <td class="align-bottom">
                                                    เวลา ....................
                                                </td>

                                                <td rowspan="2" style="background-color: #ffff80;">
                                                    <div>
                                                        <span class="style-check-box">&#11036;</span>
                                                        ถูกต้อง
                                                    </div>

                                                    <div>
                                                        <span class="style-check-box">&#11036;</span>
                                                        ไม่ถูกต้อง
                                                    </div>
                                                </td>

                                                <td style="height: 130px;"></td>

                                                <td rowspan="2" class="align-top">
                                                    <div>เวลา</div>

                                                    <div class="mt-4">
                                                        <!-- &#10066; -->
                                                        <span class="style-check-box">&#11036;</span>
                                                        ถูกต้อง

                                                        <span class="style-check-box">&#11036;</span>
                                                        ไม่ถูกต้อง
                                                    </div>

                                                    <div class="mt-4">หมายเหตุ</div>
                                                </td>

                                                <td rowspan="2" class="align-top">
                                                    <div>เวลา</div>

                                                    <div class="mt-4">
                                                        <span class="style-check-box">&#11036;</span>
                                                        ถูกต้อง

                                                        <span class="style-check-box">&#11036;</span>
                                                        ไม่ถูกต้อง
                                                    </div>

                                                    <div class="mt-4">หมายเหตุ</div>
                                                </td>

                                                <td rowspan="2" class="align-top">
                                                    <div>เวลา</div>

                                                    <div class="mt-4">
                                                        <span class="style-check-box">&#11036;</span>
                                                        ถูกต้อง

                                                        <span class="style-check-box">&#11036;</span>
                                                        ไม่ถูกต้อง
                                                    </div>

                                                    <div class="mt-4">หมายเหตุ</div>
                                                </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        จำนวนซองที่ผลิตได้
                                                        ........................................
                                                    </td>

                                                    <td class="align-top">
                                                        <div>โดย</div>
                                                    </td>
                                                </tr>
                                                @endfor
                                        </table>

                                        <div>
                                            ตรวจโดย Line Leader/Supervisor __________ วันที่ __________
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="FILLING-4" class="tab-pane">
                                <div id="document-9" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <td colspan="12">
                                                        <h4 class="text-center mb-0">
                                                            <b>การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ (Bacode Reader at
                                                                Filling machine)</b>
                                                        </h4>
                                                    </td>

                                                    <th rowspan="2">
                                                        Bacode Reader
                                                        at Filling machine
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <td colspan="12">
                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 1</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 2</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 3</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 4</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 5</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 6</span>
                                                        </b>

                                                        <span
                                                            style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:6cm;">
                                                            FM-PD-004 Rev.13 No.12 Date 26/10/15
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="text-center">
                                                    <th rowspan="2">
                                                        วันที่
                                                        (Date)
                                                    </th>

                                                    <th rowspan="2">
                                                        ผลิตภัณฑ์
                                                        (Product)
                                                    </th>

                                                    <th rowspan="2">
                                                        แบช
                                                        (Batch)
                                                    </th>

                                                    <th rowspan="2">
                                                        เลขที่บาร์โค้ด
                                                        (Barcode no.)
                                                    </th>

                                                    <th rowspan="2">
                                                        ทดสอบตามความถี่ของ
                                                        (Frequency)
                                                    </th>

                                                    <th rowspan="2">
                                                        เวลาทดสอบ
                                                        (Time)
                                                    </th>

                                                    <th rowspan="2">
                                                        ชนิดของกล่องทดสอบบาร์โค้ด
                                                        (Test Box)
                                                    </th>

                                                    <th rowspan="2">ครั้งที่</th>

                                                    <th colspan="2">ผลการตรวจสอบ</th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ผู้ทดสอบและลงบันทึก
                                                        โดย Bacode Operator
                                                    </th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ทดสอบโดย
                                                        Leader / Supervisor
                                                    </th>

                                                    <th rowspan="2" style="width:15%;">หมายเหตุ</th>
                                                </tr>

                                                <tr>
                                                    <th>Reject</th>
                                                    <th>No Rej.</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for ($i=1; $i<=4; $i++) <tr>
                                                    <td rowspan="6">
                                                        {{-- {{ th_date_short(date("Y-m-$i")) }} --}}
                                                    </td>

                                                    <td rowspan="6"></td>

                                                    <td rowspan="6"></td>

                                                    <td rowspan="6" class="text-center align-top">
                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <br> 8 851359
                                                        </div>
                                                    </td>

                                                    <td rowspan="6">
                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            ก่อนเริ่มงานแต่ละกะ
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            เปลี่ยนผลิตภัณฑ์
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            เปลี่ยนขนาดของผลิตภัณฑ์
                                                        </div>
                                                    </td>

                                                    <td rowspan="3" class="text-center">
                                                        <!-- Time -->
                                                    </td>

                                                    <td rowspan="3" class="text-center">
                                                        <!-- Barcode ผิด -->
                                                    </td>


                                                    <td class="text-center">1</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>

                                                    <td rowspan="6" class="">

                                                    </td>

                                                    <td rowspan="6">

                                                    </td>

                                                    <td rowspan="3" class="text-center">

                                                    </td>

                                                    {{-- <td rowspan="3">
                                                  ทดสอบหมายเหตุ
                                                </td> --}}
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td rowspan="3" class="text-center">
                                                            <!-- Time2 -->
                                                        </td>

                                                        <td rowspan="3" class="text-center">
                                                            <!--Barcode ไม่มี -->
                                                        </td>

                                                        <td class="text-center">1</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>

                                                        <td rowspan="3" class="text-center">
                                                            <!-- หมายเหตุ 2 -->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    @endfor
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                วิธีการทดสอบการทำงานของเครืองอ่านบาร์โค้ด
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                วางกล่องทดสอติดแผ่นฟิล์มลงบนฟอล์ย เพื่อแผ่นทดสอบผ่านเครื่องอ่านบาร์โค้ด
                                                            </li>
                                                            <li>
                                                                แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง
                                                            </li>
                                                        </ol>
                                                    </td>

                                                    <td colspan="6" rowspan="2" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                การแก้ไข หากขอบเขตวิกฤตเกินกว่ากำหนด
                                                            </b>
                                                        </div>

                                                        <div>
                                                            สิ่งที่ต้องทำทันที
                                                            หากพบว่าเครื่องอ่านบาร์โค้ดไม่สามารถรีเจ็คท์กล่องทดสอบได้ครบทุกครั้ง
                                                            แสดงว่าเครื่องอ่านบาร์โค้ดเสีย
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                Barcode Operator ห้ามปรับพารามิเตอร์ของเครื่องอ่านบาร์โค้ดโดยเด็ดขาด
                                                                แต่ให้หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน
                                                            </li>
                                                            <li>
                                                                PD and QFS
                                                                คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้กล่องทดสอบเครื่องอ่านบาร์โค้ดครั้งสุดท้าย
                                                                และกักกัน (block)
                                                                ผลิตภัณฑ์ในระบบ จากนั้นปฏิบัติตามใน HACCP Action Plan
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                ความถี่ในการทดสอบ
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                ก่อนเริ่มงานแต่ละกะ
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนผลิตภัณฑ์
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนขนาดของผลิตภัณฑ์
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 2 --}}
                    <div id="navpills-2" class="tab-pane">
                        <ul class="nav nav-pills m-t-30 m-b-30">
                            <li class="nav-item" style="width:33%;text-align:center;"> <a href="#XRAY-1"
                                    class="nav-link active" data-toggle="tab" aria-expanded="false">FM-PD-018 Rev NO.35
                                    (2)</a> </li>
                            <li class="nav-item" style="width:33%;text-align:center;"> <a href="#XRAY-2"
                                    class="nav-link" data-toggle="tab" aria-expanded="false">FM-PD-132 Rev.11 (2)</a>
                            </li>
                            <li class="nav-item" style="width:33%;text-align:center;"> <a href="#XRAY-3"
                                    class="nav-link" data-toggle="tab" aria-expanded="true">FM-PD-002 Rev.17</a>
                            </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="XRAY-1" class="tab-pane active">

                            </div>
                            <div id="XRAY-2" class="tab-pane">
                                <div id="document-0" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h5 class="mb-0">
                                                            <b>
                                                                Verification OPRPs and CCPs for Release Product Record
                                                            </b>
                                                        </h5>
                                                    </td>
                                                </tr>

                                                <tr class="text-center">
                                                    <th rowspan="2" style="width:%;">
                                                        DATE
                                                    </th>

                                                    <th rowspan="2" colspan="2">
                                                        PRODUCTION DETAIL
                                                    </th>

                                                    <th style="width:%;">
                                                        CCP/OPRP
                                                    </th>

                                                    <th colspan="2">
                                                        RESULT
                                                    </th>

                                                    <th style="width:%;">
                                                        CHECKED BY
                                                    </th>

                                                    <th style="width:%;">
                                                        REMARK
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td rowspan="10">
                                                        {{-- {{ th_date_short(date("Y-m-d")) }} --}}
                                                    </td>

                                                    <td rowspan="4" style="width:10%;">
                                                        PRODUCT NAME
                                                    </td>

                                                    <td rowspan="4" style="width:10%;" class="text-center">
                                                        <!-- PRODUCT NAME -->
                                                    </td>

                                                    <!-- start 1 -->
                                                    <td class="text-center" rowspan="2">
                                                        <div>OPRP 1</div>
                                                        <div>Bigbag</div>
                                                    </td>

                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        ส่วนผสมตรงตามสูตรการผลิต 100%
                                                    </td>
                                                    <td rowspan="2" class="text-center">

                                                    </td>
                                                    <td rowspan="2" class="text-center">

                                                    </td>
                                                    <!-- end 1 -->
                                                </tr>

                                                <tr>
                                                    <td class="text-center">
                                                    </td>

                                                    <td>
                                                        ส่วนผสมไม่ตรงตามสูตรการผลิต
                                                    </td>
                                                </tr>

                                                <!-- start 1 -->
                                                <tr>
                                                    <td rowspan="2" style="width:%;" class="text-center">
                                                        <div>OPRP 2</div>
                                                        <div>Magnet</div>
                                                    </td>

                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        เศษผงโลหะที่ปนมากับนม < 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ < 0.6 PPM </td> <td
                                                            class="text-center" rowspan="2">
                                                            <!-- CHECKED BY -->
                                                    </td>
                                                    <td class="text-center" rowspan="2">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        เศษผงโลหะที่ปนมากับนม > 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ > 0.6 PPM
                                                    </td>
                                                </tr>
                                                <!-- end 1 -->

                                                <!-- start 2 -->
                                                <tr>
                                                    <td rowspan="2" class="text-center">
                                                        PRODUCTION ORDER.LINE
                                                    </td>

                                                    <td rowspan="2" class="text-center">
                                                        <!-- PRODUCTION ORDER.LINE -->
                                                    </td>

                                                    <td class="text-center" rowspan="2">
                                                        <div>CCP 1</div>
                                                        <div>Vibratory sieve</div>
                                                    </td>

                                                    <td style="width:5%;" class="text-center"></td>
                                                    <td>
                                                        ตะแกรงอยู่ในสภาพสมบูรณ์ ไม่ขาดชำรุด และขนาดของช่องตะแกรงยังคงเหมือนเดิม
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- CHECKED BY -->
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        เศษผงโลหะที่ปนมากับนม < 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ < 0.6 PPM </td>
                                                            </tr> <!-- end 2 -->

                                                            <!-- start 3 -->
                                                <tr>
                                                    <td rowspan="2" class="text-center">
                                                        BATCH NO.
                                                    </td>

                                                    <td rowspan="2" class="text-center">
                                                        <!-- BATCH NO. -->
                                                    </td>

                                                    <td class="text-center" rowspan="2">
                                                        <div>CCP 2</div>
                                                        <div>X-Ray</div>
                                                    </td>

                                                    <td style="width:5%;" class="text-center"></td>
                                                    <td>
                                                        X-Ray reject แผ่นทดสอบสแตนเลสขนาด 1.2 มม.และโลหะขนาด 1.2 มม.
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- CHECKED BY -->
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        X-Rayไม่ reject แผ่นทดสอบสแตนเลสขนาด 1.2 มม.และโลหะขนาด 1.2 มม.
                                                    </td>
                                                </tr>
                                                <!-- end 3 -->

                                                <!-- start 4 -->
                                                <tr>
                                                    <td rowspan="2" class="text-center">
                                                        SIZE
                                                    </td>

                                                    <td rowspan="2" class="text-center">

                                                    </td>

                                                    <td class="text-center" rowspan="2">
                                                        <div>CCP 3 A หรือ B</div>
                                                        <div>Barcode Reader</div>
                                                    </td>

                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        Barcode reader reject บาร์โค้ดผิด, บาร์โค้ดไม่มี
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- CHECKED BY -->
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <!-- REMARK -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:3%;" class="text-center"></td>
                                                    <td>
                                                        Barcode reader ไม่ reject บาร์โค้ดผิด, บาร์โค้ดไม่มี
                                                    </td>
                                                </tr>
                                                <!-- end 4 -->
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="10">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                วิธีการบันทึก : ทำเครื่องหมายถูก ( / ) ลงในช่อง ของ Result
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                FM-PD-132 Rev.11 Effective date 01 / 04 / 2020
                                                            </div>

                                                            <div class="col-md-6 text-right">
                                                                Verified by : Sumate S. (Production Manager/Assistant Production Manager)
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div id="XRAY-3" class="tab-pane">
                                <div id="document-7" class="row mt-3">
                                    <div class="col-md-12">
                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <td colspan="11">
                                                        <h4 class="text-center mb-0">
                                                            <b>การทดสอบการทำงานของเครื่อง X-Ray </b>
                                                        </h4>
                                                    </td>

                                                    <th rowspan="2">
                                                        CCP 2
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <td colspan="11">
                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 1</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 2</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 3</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 4</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 5</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 6</span>
                                                        </b>

                                                        <span
                                                            style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:6cm;">
                                                            FM-PD-004 Rev.13 No.12 Date 26/10/15
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="text-center">
                                                    <th rowspan="2">
                                                        วันที่
                                                        (Date)
                                                    </th>

                                                    <th rowspan="2">
                                                        ผลิตภัณฑ์
                                                        (Product)
                                                    </th>

                                                    <th rowspan="2">
                                                        แบช
                                                        (Batch)
                                                    </th>

                                                    <th rowspan="2">
                                                        ทดสอบตามความถี่ของ
                                                        (Frequency)
                                                    </th>

                                                    <th rowspan="2">
                                                        เวลาทดสอบ
                                                        (Time)
                                                    </th>

                                                    <th rowspan="2">
                                                        ชนิดของแผ่นทดสอบ
                                                        (Test Card)
                                                    </th>

                                                    <th rowspan="2">ครั้งที่</th>

                                                    <th colspan="2">ผลการตรวจสอบ</th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ผู้ทดสอบและลงบันทึก
                                                        (X-Ray Operator)
                                                    </th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ทดสอบโดย
                                                        Leader / Supervisor
                                                    </th>

                                                    <th rowspan="2" style="width:15%;">หมายเหตุ</th>
                                                </tr>

                                                <tr>
                                                    <th>Reject</th>
                                                    <th>No Rej.</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for ($i=1; $i<=4; $i++) <tr>
                                                    <td rowspan="6">
                                                        {{-- {{ th_date_short(date("Y-m-$i")) }} --}}
                                                    </td>

                                                    <td rowspan="6"></td>

                                                    <td rowspan="6"></td>

                                                    <td rowspan="6">
                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            ก่อนเริ่มงานแต่ละกะ
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            เปลี่ยนผลิตภัณฑ์
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            เปลี่ยนขนาดของผลิตภัณฑ์
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            หลังจากที่ไลน์การผลิตหยุดมากกว่า 60 นาที
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            ทุกวันหลังสิ้นสุดการผลิต
                                                        </div>
                                                    </td>

                                                    <td rowspan="3" class="text-center">

                                                    </td>

                                                    <td rowspan="3" class="text-center">
                                                        <div>
                                                            สแตนเลส 1.2 มม.
                                                        </div>

                                                        <div>
                                                            (Stainless 1.2 mm)
                                                        </div>
                                                    </td>


                                                    <td class="text-center">1</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>

                                                    <td rowspan="6" class="">

                                                    </td>

                                                    <td rowspan="6">

                                                    </td>

                                                    <td rowspan="3" class="text-center">

                                                    </td>

                                                    {{-- <td rowspan="3">
                                          ทดสอบหมายเหตุ
                                        </td> --}}
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td rowspan="3" class="text-center">
                                                            <!-- Time2 -->
                                                        </td>

                                                        <td rowspan="3" class="text-center">
                                                            <!-- ชนิดของแผ่นทดสอบ -->
                                                            <div>
                                                                โลหะ 1.2 มม.
                                                            </div>

                                                            <div>
                                                                (Metal 1.2 mm)
                                                            </div>
                                                        </td>

                                                        <td class="text-center">1</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>

                                                        <td rowspan="3" class="text-center">
                                                            <!-- หมายเหตุ 2 -->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    @endfor
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="7" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                วิธีการทดสอบการทำงานของเครือง X-Ray
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                ใช้แผ่นทดสอบ 2 ชนิดติดที่ถุงนม (1 แผ่น/1 ถุง) แล้ววางคว่ำแผ่นทดสอบบนสายพาน
                                                                เพื่อให้ถุงนมผ่านเข้าเครื่อง X-Ray
                                                            </li>
                                                            <li>
                                                                แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่อง X-Ray 3 ครั้ง รวมทั้งหมด 6 ครั้ง
                                                            </li>
                                                        </ol>
                                                    </td>

                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                ขอบเขตวิกฤต (Critical limit)
                                                            </b>
                                                        </div>

                                                        <div>
                                                            เครื่อง X-Ray ต้องรีเจ็คท์แผ่นทดสอบได้ทุกแผ่นและทุกครั้ง
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="7" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                ความถี่ในการทดสอบ
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                ก่อนเริ่มงานแต่ละกะ
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนผลิตภัณฑ์
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนขนาดของผลิตภัณฑ์
                                                            </li>
                                                            <li>
                                                                หลังจากที่ไลน์การผลิตหยุดมากกว่า 60 นาที
                                                            </li>
                                                            <li>
                                                                มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray
                                                            </li>
                                                            <li>
                                                                ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง
                                                            </li>
                                                            <li>
                                                                ทุกวันหลังสิ้นสุดการผลิต
                                                            </li>
                                                        </ol>
                                                    </td>

                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                การแก้ไข หากขอบเขตวิกฤตเกินกว่ากำหนด
                                                            </b>
                                                        </div>

                                                        <div>
                                                            สิ่งที่ต้องทำทันที หากพบว่าเครื่อง X-ray ไม่สามารถรีเจ็คท์แผ่นทดสอบได้ครบทุกครั้ง
                                                            แสดงว่าเครื่อง X-Ray มีปัญหา
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                X-Ray Operator ห้ามปรับพารามิเตอร์ของเครื่อง X-Ray โดยเด็ดขาด
                                                                แต่ให้หยุดการผลิตทันที
                                                                และทำการแจ้งหัวหน้างาน
                                                            </li>
                                                            <li>
                                                                PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้แผ่นทดสอบเครื่อง X-Ray ครั้งสุดท้าย
                                                                และกักกัน (block) ผลิตภัณฑ์ในระบบ
                                                                จากนั้นปฏิบัติตามใน HACCP action plan
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 3 --}}
                    <div id="navpills-3" class="tab-pane">
                        <ul class="nav nav-pills m-t-30 m-b-30">
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#AUTOPACKING-1"
                                    class="nav-link active" data-toggle="tab" aria-expanded="false">FM-PD-034 Rev NO.12
                                    (1)</a> </li>
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#AUTOPACKING-2"
                                    class="nav-link" data-toggle="tab" aria-expanded="false">FM-PD-130 Rev.06</a>
                            </li>
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#AUTOPACKING-3"
                                    class="nav-link" data-toggle="tab" aria-expanded="false">FM-PD-131 Rev No.05</a>
                            </li>
                            <li class="nav-item" style="width:25%;text-align:center;"> <a href="#AUTOPACKING-4"
                                    class="nav-link" data-toggle="tab" aria-expanded="true">FM-PD-024 Rev.04</a>
                            </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="AUTOPACKING-1" class="tab-pane active">
                                <div id="document-" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <tr class="text-center" style="font-size: 14pt;">
                                                <th colspan="2">
                                                    <h4 class="mb-0">
                                                        แบบฟอร์มบันทึกการตรวจสอบ Unit Carton / Special Box
                                                    </h4>
                                                </th>
                                            </tr>

                                            <tr style="font-size: 14pt;">
                                                <td colspan="2">
                                                    ผลิตภัณฑ์
                                                    ขนาด .......... กรัม
                                                    เลขที่ผลิต ..........

                                                    <span
                                                        style="border:#000 1px solid; padding:2px; float:right; position:absolute; right:0.35cm;">
                                                        FM-PD-034 Rev No.12 Date 26/10/15
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr style="font-size: pt;">
                                                <td colspan="2">
                                                    <div>
                                                        <span class="style-radio">&#9899;</span>
                                                        <b>กล่องยูนิตบรรจุ (Unit Box)</b>
                                                    </div>

                                                    <div style="text-indent: 5em;">
                                                        <label>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Unit Carton</span>
                                                        </label>

                                                        <label>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Special Box</span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr style="font-size: pt;">
                                                <td colspan="2" style="height: 500px;" class="align-top border-bottom-0">
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
                                                            - สำหรับกล่องที่ใช้ Unit Carton / Shipper Carton ไม่หมด ไม่ต้องดึงใบมาติด
                                                            ให้บันทึกรายละเอียดลงบรรทัดด้านล่างแทน
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="border-top-0 border-right-0">
                                                    สำหรับบันทึกกล่องที่ยังใช้ช้อนไม่หมด ..........
                                                </th>


                                                <th class="text-center border-top-0 border-left-0">
                                                    หมายเหตุ:ให้ลงหมายเลข Control No. ที่ไม่ซ้ำกันเท่านั้น
                                                </th>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ตรวจโดยฝ่ายผลิต ..........

                                                    วันที่ ..........
                                                </td>


                                                <td></td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div id="AUTOPACKING-2" class="tab-pane">
                                <div id="document-4" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <th colspan="7" class="text-center">
                                                        <span
                                                            style="border: #000 1px solid; padding: 2px; float: right; position: absolute; right: 0.35cm;">
                                                            FM-PD-130 Rev.06 Date 30/07/2019
                                                        </span>

                                                        <h5 class="text-center mb-0">
                                                            <b>การตรวจสอบความถูกต้องของเบอร์ช้อน (Scoop)</b>
                                                        </h5>
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th colspan="7" style="width:%;">
                                                        ผลิตภัณฑ์..........
                                                        ขนาด..........กรัม
                                                        วันที่ผลิต..........
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th colspan="7" style="width:%;">
                                                        <b class="mr-4">ไลน์การบรรจุ</b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Line 1</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Line 2</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Line 3</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Line 4</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Line 5</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>Line 6</span>
                                                        </b>
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th colspan="7" style="width:%;">
                                                        <b class="mr-4">ช้อนเบอร์</b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>1</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>2</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>3</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>4</span>
                                                        </b>

                                                        <b>
                                                            <span class="style-check-box">&#11036;</span>
                                                            <span>5</span>
                                                        </b>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <!-- ดึงป้ายมาติด -->
                                                <tr>
                                                    <td style="width:20%; height:500px;">
                                                        ดึงป้ายมาติด
                                                    </td>

                                                    <td style="width:10%;">1</td>
                                                    <td style="width:10%;">2</td>
                                                    <td style="width:10%;">3</td>
                                                    <td style="width:10%;">4</td>
                                                    <td style="width:10%;">5</td>
                                                    <td style="width:30%;">6</td>
                                                </tr>

                                                <!-- ผู้ตรวจสอบและลงบันทึกข้อมูล -->
                                                <tr>
                                                    <td>
                                                        ผู้ตรวจสอบและลงบันทึกข้อมูล
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <!-- ทดสอบโดย Leader/Supervisor -->
                                                <tr>
                                                    <td>
                                                        ทดสอบโดย Leader/Supervisor
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <!-- -->
                                                <tr>
                                                    <td colspan="7">
                                                        <div>
                                                            ปัญหา..........
                                                        </div>

                                                        <div>
                                                            การแก้ไข..........
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tfoot>

                                                <tr>
                                                    <td colspan="11">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <b class="border border-dark">ความถี่ในการทดสอบ</b>
                                                                </div>
                                                                <ol>
                                                                    <li>
                                                                        ทุกกล่อง
                                                                    </li>
                                                                </ol>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div>
                                                                    <b class="border border-dark">วิธีการตรวจสอบช้อน</b>
                                                                </div>
                                                                <ol>
                                                                    <li>
                                                                        เปิดกล่องที่ใส่ช้อน
                                                                    </li>
                                                                    <li>
                                                                        ตรวจสอบเบอร์ช้อนที่อยู่ในกล่องและป้ายโค้ดของบรรจุภัณฑ์ว่าถูกต้องและตรงกัน
                                                                    </li>
                                                                    <li>
                                                                        ตรวจสอบเบอร์ช้อนว่าถูกต้องกับผลิตภัณฑ์ที่ผลิต
                                                                    </li>
                                                                    <li>
                                                                        บันทึกข้อมูลและติดป้ายโค้ดของบรรจุภัณฑ์ลงในแบบฟอร์ม
                                                                    </li>
                                                                    <li>
                                                                        สำหรับกล่องที่ยังใช้ช้อนไม่หมด
                                                                        ให้คัดลอกข้อมูลจากป้ายเดิมแล้วเขียนลงบนป้ายใหม่เพื่อติดบนถุงหรือกล่องช้อนก่อนส่งกลับคืน
                                                                    </li>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div id="AUTOPACKING-3" class="tab-pane">
                                <div id="document-10" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <td colspan="12">
                                                        <span
                                                            style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:0.35cm;">
                                                            FM-PD-131 Rev No.12 Date 26/10/15
                                                        </span>

                                                        <h4 class="mb-0">
                                                            <b>การทดสอบกล้องตรวจสอบช้อน (Scoop camera) สำหรับ Auto Packing line</b>
                                                        </h4>
                                                    </td>
                                                </tr>

                                                <tr class="text-center">
                                                    <th rowspan="2">
                                                        วันที่
                                                        (Date)
                                                    </th>

                                                    <th rowspan="2">
                                                        ผลิตภัณฑ์
                                                        (Product)
                                                    </th>

                                                    <th rowspan="2">
                                                        แบช
                                                        (Batch)
                                                    </th>

                                                    <th rowspan="2">
                                                        ทดสอบตามความถี่ของ
                                                        (Frequency)
                                                    </th>

                                                    <th rowspan="2">ทดสอบ</th>
                                                    <th rowspan="2">ครั้งที่</th>

                                                    <th colspan="2">ผลการตรวจสอบ</th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ผู้ทดสอบ
                                                        Operator
                                                    </th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ทดสอบโดย
                                                        Leader / Supervisor
                                                    </th>

                                                    <th rowspan="2" style="width:15%;">หมายเหตุ</th>
                                                </tr>

                                                <tr>
                                                    <th>Reject</th>
                                                    <th>No Rej.</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for ($i=1; $i<=4; $i++) <tr>
                                                    <td rowspan="3">
                                                        {{-- {{ th_date_short(date("Y-m-$i")) }} --}}
                                                    </td>

                                                    <td rowspan="3"></td>
                                                    <td rowspan="3"></td>

                                                    <td rowspan="3">
                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;] ก่อนเริ่มงานแต่ละกะ
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;] เปลี่ยนผลิตภัณฑ์
                                                        </div>
                                                    </td>

                                                    <td rowspan="3" class="text-center">
                                                        ไม่ใส่ช้อน
                                                    </td>

                                                    <td class="text-center">1</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>

                                                    <td rowspan="3" class="">
                                                        ผู้ทดสอบ
                                                    </td>

                                                    <td rowspan="3">
                                                        ทดสอบโดย
                                                    </td>

                                                    <td rowspan="3">
                                                        ทดสอบหมายเหตุ
                                                    </td>
                                                    </tr>

                                                    <tr class="text-center">
                                                        <td>2</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr class="text-center">
                                                        <td>3</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @endfor

                                                    <tr>
                                                        <td colspan="11">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <b class="border border-dark">ความถี่ในการทดสอบ</b>
                                                                    </div>
                                                                    <ol>
                                                                        <li>
                                                                            ก่อนเริ่มงานแต่ละกะ
                                                                        </li>
                                                                        <li>
                                                                            ทุกครั้งที่เปลี่ยนผลิตภัณฑ์
                                                                        </li>
                                                                    </ol>

                                                                    <div>
                                                                        <b class="border border-dark">การแก้ไข</b>
                                                                    </div>
                                                                    <ol>
                                                                        <li>
                                                                            ผู้ดูแลกล้องตรวจสอบช้อน ทดลองไม่ใส่ช้อนจำนวน 3 ครั้ง
                                                                        </li>
                                                                        <li>
                                                                            บันทึกข้อมูลการตรวจสอบการทำงานของกล้องทุกครั้ง
                                                                        </li>
                                                                        <li>
                                                                            หากพบว่ากล้องไม่สามารถตรวจสอบและรีเจ็คท์ถุงนมที่ไม่มีช้อนได้ครบทั้ง
                                                                            3
                                                                            ครั้ง ให้ดูที่ช่องการแก้ไข
                                                                        </li>
                                                                    </ol>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <b class="border border-dark">การแก้ไข</b>
                                                                    </div>

                                                                    <div>
                                                                        สิ่งที่ต้องทำทันที
                                                                        หากพบว่ากล้องไม่สามารถตรวจสอบและรีเจ็คท์ถุงนมที่ไม่มีช้อนได้ครบทั้ง 3
                                                                        ครั้งแล้ว แสดงว่ากล้องเสีย
                                                                    </div>
                                                                    <ol>
                                                                        <li>Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift
                                                                            Supervisor/Leader)</li>
                                                                        <li>PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบกล้องครั้งสุดท้าย
                                                                            และกักกัน (block)</li>
                                                                    </ol>
                                                                    </>
                                                                </div>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div id="AUTOPACKING-4" class="tab-pane">
                                <div id="document-3" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="text-center">
                                                        <span
                                                            style="border: #000 1px solid; padding: 2px; float: right; position: absolute; right: 0.35cm;">
                                                            FM-PD-024 Rev No.04 Date 05/11/2019
                                                        </span>

                                                        <h5 class="text-center mb-0">
                                                            การตรวจสอบความถูกต้องของบรรจุภัณฑ์ที่นำมาใช้ในการผลิต
                                                        </h5>
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th colspan="" style="width:50%;">
                                                        ผลิตภัณฑ์..........
                                                        ขนาด..........
                                                        กรัม..........
                                                        วันที่ ..........
                                                    </th>

                                                    <th colspan="" style="width:50%;" class="text-center">
                                                        การตรวจสอบ Batch & PM CODE ของบรรจุภัณฑ์ที่นำมาใช้งานทุก 1 ชั่วโมง
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for ($i=1; $i<=3; $i++) <tr>
                                                    <td>
                                                        <!-- start รายละเอียดของ Unit Carton / Special box -->
                                                        <table class="" border="1">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:20%;" class="text-center">เวลา</th>
                                                                    <th colspan="23" class="text-center">รายละเอียดของ Unit Carton / Special box
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <!-- PM. Code -->
                                                                <tr>
                                                                    <td class="text-center"></td>

                                                                    <td>PM. Code</td>
                                                                    <td class="text-center">P</td>
                                                                    <td class="text-center">M</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- วันที่ผลิต -->
                                                                <tr>
                                                                    <td rowspan="10" class="text-center"></td>

                                                                    <td>วันที่ผลิต</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td colspan="2" class="text-center">Time</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"> : </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- วันหมดอายุ / ควรบริโภคก่อน -->
                                                                <tr>
                                                                    <td>วันหมดอายุ / ควรบริโภคก่อน</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray; " class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- Material Number -->
                                                                <tr>
                                                                    <td>Material Number</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray; " class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>

                                                                    <td colspan="2" class="text-center">Batch</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"> • </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                </tr>

                                                                <!-- Product Order/Line -->
                                                                <tr>
                                                                    <td>Product Order/Line</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td colspan="24" class="text-center">รายละเอียดของ Shipper Carton</td>
                                                                </tr>
                                                                <!-- PM. Code -->
                                                                <tr>
                                                                    <td>PM. Code</td>
                                                                    <td class="text-center">P</td>
                                                                    <td class="text-center">M</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- ช้อนเบอร์ -->
                                                                <tr>
                                                                    <td>ช้อนเบอร์</td>
                                                                    <td colspan="23" class="text-center"></td>
                                                                </tr>

                                                                <!-- PM. Code -->
                                                                <tr>
                                                                    <td>PM. Code</td>
                                                                    <td class="text-center">P</td>
                                                                    <td class="text-center">M</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- บันทึก ตรวจสอบโดย -->
                                                                <tr>
                                                                    <td colspan="24">
                                                                        บันทึก/ตรวจสอบโดย.......... (พนักงานเสิร์ฟกล่อง Unit ในไลน์)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- end รายละเอียดของ Unit Carton / Special box -->
                                                    </td>

                                                    <td>
                                                        <!-- start รายละเอียดของ Unit Carton / Special box -->
                                                        <table class="" border="1">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:20%;" class="text-center">เวลา</th>
                                                                    <th colspan="23" class="text-center">รายละเอียดของ Unit Carton / Special box
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <!-- PM. Code -->
                                                                <tr>
                                                                    <td class="text-center"></td>

                                                                    <td>PM. Code</td>
                                                                    <td class="text-center">P</td>
                                                                    <td class="text-center">M</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- วันที่ผลิต -->
                                                                <tr>
                                                                    <td rowspan="10" class="text-center"></td>

                                                                    <td>วันที่ผลิต</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td colspan="2" class="text-center">Time</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"> : </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- วันหมดอายุ / ควรบริโภคก่อน -->
                                                                <tr>
                                                                    <td>วันหมดอายุ / ควรบริโภคก่อน</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray; " class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- Material Number -->
                                                                <tr>
                                                                    <td>Material Number</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray; " class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>

                                                                    <td colspan="2" class="text-center">Batch</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"> • </td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"> • </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                </tr>

                                                                <!-- Product Order/Line -->
                                                                <tr>
                                                                    <td>Product Order/Line</td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td class="text-center"> • </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td colspan="24" class="text-center">รายละเอียดของ Shipper Carton</td>
                                                                </tr>
                                                                <!-- PM. Code -->
                                                                <tr>
                                                                    <td>PM. Code</td>
                                                                    <td class="text-center">P</td>
                                                                    <td class="text-center">M</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- ช้อนเบอร์ -->
                                                                <tr>
                                                                    <td>ช้อนเบอร์</td>
                                                                    <td colspan="23" class="text-center"></td>
                                                                </tr>

                                                                <!-- PM. Code -->
                                                                <tr>
                                                                    <td>PM. Code</td>
                                                                    <td class="text-center">P</td>
                                                                    <td class="text-center">M</td>

                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>

                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                    <td style="background:gray;" class="text-center"></td>
                                                                </tr>

                                                                <!-- บันทึก ตรวจสอบโดย -->
                                                                <tr>
                                                                    <td colspan="24">
                                                                        บันทึก/ตรวจสอบโดย.......... (พนักงานเสิร์ฟกล่อง Unit ในไลน์)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- end รายละเอียดของ Unit Carton / Special box -->
                                                    </td>
                                                    </tr>
                                                    @endfor
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        Approve By ..........
                                                        Time ..........
                                                        (PD.Line leader/Supervisor)
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 4 --}}
                    <div id="navpills-4" class="tab-pane">
                        <ul class="nav nav-pills m-t-30 m-b-30">
                            <li class="nav-item" style="width:50%;text-align:center;"> <a href="#BOXPACKING-1"
                                    class="nav-link active" data-toggle="tab" aria-expanded="false">FM-PD-014 Rev.02
                                    (2)</a> </li>
                            <li class="nav-item" style="width:50%;text-align:center;"> <a href="#BOXPACKING-2"
                                    class="nav-link" data-toggle="tab" aria-expanded="true">FM-PD-044 Rev.03 (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="BOXPACKING-1" class="tab-pane active">
                                <div id="document-8" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <td colspan="11">

                                                        <h4 class="text-center mb-0">
                                                            <b>การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code)</b>
                                                        </h4>
                                                    </td>

                                                    <th rowspan="2" class="text-center">
                                                        Batch Code
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <td colspan="11">
                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 1</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 2</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 3</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 4</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 5</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 6</span>
                                                        </b>

                                                        <span
                                                            style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:0.35cm;">
                                                            FM-PD-014 Rev.02 Effective 30/07/2919
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="text-center">
                                                    <th rowspan="2">
                                                        วันที่
                                                        (Date)
                                                    </th>

                                                    <th rowspan="2">
                                                        ผลิตภัณฑ์
                                                        (Product)
                                                    </th>

                                                    <th rowspan="2">
                                                        รายละเอียดของ Unit Carton / Special box
                                                    </th>

                                                    <th rowspan="2">
                                                        ทดสอบตามความถี่ของ
                                                        (Frequency)
                                                    </th>

                                                    <th rowspan="2">
                                                        เวลาทดสอบ
                                                        (Time)
                                                    </th>

                                                    <th rowspan="2">
                                                        ชนิดของกล่องทดสอบแบช
                                                        (Test Box)
                                                    </th>

                                                    <th rowspan="2">ครั้งที่</th>

                                                    <th colspan="2">ผลการตรวจสอบ</th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ผู้ทดสอบและลงบันทึก
                                                        โดย Bacode Operator
                                                    </th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ทดสอบโดย
                                                        Leader / Supervisor
                                                    </th>

                                                    <th rowspan="2" style="width:15%;">หมายเหตุ</th>
                                                </tr>

                                                <tr>
                                                    <th>Reject</th>
                                                    <th>No Rej.</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for ($i=1; $i<=4; $i++) <tr>
                                                    <td rowspan="3">
                                                        {{-- {{ th_date_short(date("Y-m-$i")) }} --}}
                                                    </td>

                                                    <td rowspan="3"></td>
                                                    <td rowspan="3"></td>

                                                    <td rowspan="3">
                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;] ก่อนเริ่มงานแต่ละกะ
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;] เปลี่ยนผลิตภัณฑ์
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;] เปลี่ยนขนาดของผลิตภัณฑ์
                                                        </div>
                                                    </td>

                                                    <td rowspan="3"></td>

                                                    <td rowspan="3" class="text-center">
                                                        ไม่มีแบช
                                                    </td>

                                                    <td class="text-center">1</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>

                                                    <td rowspan="3" class="">
                                                        <!-- ผู้ทดสอบ -->
                                                    </td>

                                                    <td rowspan="3">
                                                        <!-- ทดสอบโดย -->
                                                    </td>

                                                    <td rowspan="3">
                                                        <!-- ทดสอบหมายเหตุ -->
                                                    </td>
                                                    </tr>

                                                    <tr class="text-center">
                                                        <td>2</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr class="text-center">
                                                        <td>3</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @endfor
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                วิธีการทดสอบการทำงานของเครืองอ่านบาร์โค้ด
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                วางกล่องทดสอบที่ไม่มีแบชบนสายพาน เพื่อให้กล่องทดสอบผ่านเครื่องแบชโค๊ด
                                                            </li>
                                                            <li>
                                                                กล่องทดสอบต้องผ่านเข้าเครื่องแบชโค๊ด 3 ครั้ง
                                                            </li>
                                                        </ol>
                                                    </td>

                                                    <td colspan="6" rowspan="2" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                การแก้ไข
                                                            </b>
                                                        </div>

                                                        <div>
                                                            สิ่งที่ต้องทำทันที
                                                            หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คท์กล่องที่ไม่มีแบชได้ครบทั้ง
                                                            3 ครั้ง แสดงว่าเครื่องทำงานไม่ปกติ
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader)
                                                            </li>
                                                            <li>
                                                                PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน
                                                                (block)
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                ความถี่ในการทดสอบ
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                ก่อนเริ่มงานแต่ละกะ
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนผลิตภัณฑ์
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนขนาดของผลิตภัณฑ์
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div id="BOXPACKING-2" class="tab-pane">
                                <div id="document-9" class="row mt-3">
                                    <div class="col-md-12">

                                        <table class="tbl-">
                                            <thead>
                                                <tr>
                                                    <td colspan="12">
                                                        <h4 class="text-center mb-0">
                                                            <b>การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ (Bacode Reader at
                                                                Filling machine)</b>
                                                        </h4>
                                                    </td>

                                                    <th rowspan="2">
                                                        Bacode Reader
                                                        at Filling machine
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <td colspan="12">
                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 1</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 2</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 3</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 4</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 5</span>
                                                        </b>

                                                        <b>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <span>line 6</span>
                                                        </b>

                                                        <span
                                                            style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:6cm;">
                                                            FM-PD-004 Rev.13 No.12 Date 26/10/15
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="text-center">
                                                    <th rowspan="2">
                                                        วันที่
                                                        (Date)
                                                    </th>

                                                    <th rowspan="2">
                                                        ผลิตภัณฑ์
                                                        (Product)
                                                    </th>

                                                    <th rowspan="2">
                                                        แบช
                                                        (Batch)
                                                    </th>

                                                    <th rowspan="2">
                                                        เลขที่บาร์โค้ด
                                                        (Barcode no.)
                                                    </th>

                                                    <th rowspan="2">
                                                        ทดสอบตามความถี่ของ
                                                        (Frequency)
                                                    </th>

                                                    <th rowspan="2">
                                                        เวลาทดสอบ
                                                        (Time)
                                                    </th>

                                                    <th rowspan="2">
                                                        ชนิดของกล่องทดสอบบาร์โค้ด
                                                        (Test Box)
                                                    </th>

                                                    <th rowspan="2">ครั้งที่</th>

                                                    <th colspan="2">ผลการตรวจสอบ</th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ผู้ทดสอบและลงบันทึก
                                                        โดย Bacode Operator
                                                    </th>

                                                    <th rowspan="2" style="width:10%;">
                                                        ทดสอบโดย
                                                        Leader / Supervisor
                                                    </th>

                                                    <th rowspan="2" style="width:15%;">หมายเหตุ</th>
                                                </tr>

                                                <tr>
                                                    <th>Reject</th>
                                                    <th>No Rej.</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for ($i=1; $i<=4; $i++) <tr>
                                                    <td rowspan="6">
                                                        {{-- {{ th_date_short(date("Y-m-$i")) }} --}}
                                                    </td>

                                                    <td rowspan="6"></td>

                                                    <td rowspan="6"></td>

                                                    <td rowspan="6" class="text-center align-top">
                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            <br> 8 851359
                                                        </div>
                                                    </td>

                                                    <td rowspan="6">
                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            ก่อนเริ่มงานแต่ละกะ
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            เปลี่ยนผลิตภัณฑ์
                                                        </div>

                                                        <div>
                                                            [&nbsp;&nbsp;&nbsp;]
                                                            เปลี่ยนขนาดของผลิตภัณฑ์
                                                        </div>
                                                    </td>

                                                    <td rowspan="3" class="text-center">
                                                        <!-- Time -->
                                                    </td>

                                                    <td rowspan="3" class="text-center">
                                                        <!-- Barcode ผิด -->
                                                    </td>


                                                    <td class="text-center">1</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>

                                                    <td rowspan="6" class="">

                                                    </td>

                                                    <td rowspan="6">

                                                    </td>

                                                    <td rowspan="3" class="text-center">

                                                    </td>

                                                    {{-- <td rowspan="3">
                                                  ทดสอบหมายเหตุ
                                                </td> --}}
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td rowspan="3" class="text-center">
                                                            <!-- Time2 -->
                                                        </td>

                                                        <td rowspan="3" class="text-center">
                                                            <!--Barcode ไม่มี -->
                                                        </td>

                                                        <td class="text-center">1</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>

                                                        <td rowspan="3" class="text-center">
                                                            <!-- หมายเหตุ 2 -->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    @endfor
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                วิธีการทดสอบการทำงานของเครืองอ่านบาร์โค้ด
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                วางกล่องทดสอติดแผ่นฟิล์มลงบนฟอล์ย เพื่อแผ่นทดสอบผ่านเครื่องอ่านบาร์โค้ด
                                                            </li>
                                                            <li>
                                                                แผ่นทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง
                                                            </li>
                                                        </ol>
                                                    </td>

                                                    <td colspan="6" rowspan="2" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                การแก้ไข หากขอบเขตวิกฤตเกินกว่ากำหนด
                                                            </b>
                                                        </div>

                                                        <div>
                                                            สิ่งที่ต้องทำทันที
                                                            หากพบว่าเครื่องอ่านบาร์โค้ดไม่สามารถรีเจ็คท์กล่องทดสอบได้ครบทุกครั้ง
                                                            แสดงว่าเครื่องอ่านบาร์โค้ดเสีย
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                Barcode Operator ห้ามปรับพารามิเตอร์ของเครื่องอ่านบาร์โค้ดโดยเด็ดขาด
                                                                แต่ให้หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน
                                                            </li>
                                                            <li>
                                                                PD and QFS
                                                                คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้กล่องทดสอบเครื่องอ่านบาร์โค้ดครั้งสุดท้าย
                                                                และกักกัน (block)
                                                                ผลิตภัณฑ์ในระบบ จากนั้นปฏิบัติตามใน HACCP Action Plan
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="align-top">
                                                        <div>
                                                            <b class="border border-dark">
                                                                ความถี่ในการทดสอบ
                                                            </b>
                                                        </div>
                                                        <ol>
                                                            <li>
                                                                ก่อนเริ่มงานแต่ละกะ
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนผลิตภัณฑ์
                                                            </li>
                                                            <li>
                                                                ทุกครั้งที่เปลี่ยนขนาดของผลิตภัณฑ์
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

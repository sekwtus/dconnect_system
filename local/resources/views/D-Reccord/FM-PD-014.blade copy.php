@extends('layouts.master')

@section('main')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="fa fa-history" aria-hidden="true"></i> DRecord</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">DReacord</li>
                <li class="breadcrumb-item">Product Line</li>
                <li class="breadcrumb-item">Product Line1</li>
                <li class="breadcrumb-item active">FM-PD-014 Rev.02</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-1 col-lg-1 text-center">
                        <a href="app-contact-detail.html">
                            <img src="{{ asset('/assets/images/users/1.jpg') }}" width="150" alt="user"
                                class="img-fluid"></a>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <h3 class="box-title m-b-0">FM-PD-014 Rev.02</h3>
                        <h4>การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code)</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 text-right">
                        <button class="btn btn-info" disabled>
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-warning" disabled>
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger" disabled>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-success">
                            <i class="fa fa-save"></i>
                        </button>
                        <button class="btn btn-dark">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="row mt-3 py-1 " style="background-color: #03a9f3!important; color: #fff!important; font-weight: 500; font-size: 12pt;">
                        <div class="col-md-2 text-center">
                            DATE : 27.26.20
                        </div>
                        <div class="col-md-3 text-center">
                            PRODUCT NAME : Hi-Q1+H
                        </div>
                        <div class="col-md-3 text-center">
                            PRODUCT ORDER LINE : 103941169
                        </div>
                        <div class="col-md-2 text-center">
                            BATCH NO : 26.06.20
                        </div>
                        <div class="col-md-2 text-center">
                            SIZE : 600g
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-4 text-center" style="border-style: solid; background-color: darkgray;">
                        รายละเอียดของ<br>Unit Carton / specail box
                    </div>
                    <div class="col-md-8 text-left" style="border-style: solid;">
                        <button class="btn btn-danger" disabled style="width: 150px; height: 150px;">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="row py-1">
                    <div class="col-md-3 text-center" style="border-style: solid; background-color: darkgray;">
                        ทดสอบตามความถี่ของ<br>(Frequency)
                    </div>
                    <div class="col-md-9 text-left" style="border-style: solid;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">ก่อนเริ่มงานแต่ละกะ</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">เปลี่ยนผลิตภัณฑ์</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">เปลี่ยนขนาดของผลิตภัณฑ์</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-1">
                    <div class="col-lg-12 col-md-12 ">
                        <table class="table table-bordered">
                            <thead class=" text-center ">
                                <tr>
                                    <th rowspan="2">
                                        เวลาทดสอบ<br>(Time)
                                    </th>
                                    <th rowspan="2">
                                        ชนิดของกล่อง<br>ทดสอบแบช
                                    </th>
                                    <th rowspan="2">
                                        ครั้งที่
                                    </th>
                                    <th colspan="2">
                                        ผลการตรวจสอบ
                                    </th>
                                    <th  rowspan="2">
                                        ผู้ทดสอบและลงบันทึก <br> โดย Barcode Operator
                                    </th>
                                    <th rowspan="2">
                                        ทดสอบโดย<br>Leader/Supervisor
                                    </th>
                                    <th rowspan="2">
                                        หมายเหตุ
                                    </th>
                                </tr>
                                <tr>
                                    <th>Reject</th>
                                    <th>No Rej.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" rowspan="4">
                                        XX:XX
                                    </td>
                                    <td class="text-center" rowspan="4">
                                        (Test Box) <br> ไม่มีแบช
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">1</th>
                                    <th class="text-center"><div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                    <th class="text-center"><div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                    <td class="text-center" rowspan="4">
                                        <a href="app-contact-detail.html">
                                            <img src="{{ asset('/assets/images/users/s.jpg') }}" width="150" alt="user"
                                                class="img-fluid"></a>
                                    </td>
                                    <td class="text-center" rowspan="4">
                                        <a href="app-contact-detail.html">
                                            <img src="{{ asset('/assets/images/users/s.jpg') }}" width="150" alt="user"
                                                class="img-fluid"></a>
                                    </td>
                                    <td class="text-center" rowspan="4">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">2</th>
                                    <th class="text-center"><div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                    <th class="text-center"><div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center">3</th>
                                    <th class="text-center"><div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                    <th class="text-center"><div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input  " id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-left" style="border-style: solid;">
                        <a style="background-color: darkgray;">วิธีการทดสอบการทำงานของเครืองอ่านบาร์โค้ด</a> <br>
                        1. วางกล่องทดสอบที่ไม่มีแบชบนสายพาน <br>
                        2. กล่องทดสอบต้องผ่านเข้าเครื่องแบชโค๊ด 3 ครั้ง
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-left" style="border-style: solid;">
                        <a style="background-color: darkgray;">ความถี่ในการทดสอบ</a> <br>
                        1. ก่อนเริ่มงานแต่ละกะ <br>
                        2. ทุกครั้งที่เปลี่ยนผลิตภัณฑ์ <br>
                        3. ทุกครั้งที่เปลี่ยนขนาดของผลิตภัณฑ์
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-left" style="border-style: solid;">
                        <a style="background-color: darkgray;">การแก้ไข</a> <br>
                        สิ่งที่ต้องทำทันที หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คท์กล่องที่ไม่มีแบชได้ครบทั้ง 3 ครั้ง แสดงว่าเครื่องทำงานไม่ปกติ <br>
                        1. Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน <br>
                        (Shift Supervisor/Leader) <br>
                        2. PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน (block)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code)
            </div>

            <div class="col-md-6 text-right">
                <button onclick="PrintDocument('document-8')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                </button>
            </div>
        </div>

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
                                <!-- {{ th_date_short(date("Y-m-$i")) }} -->
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
</div> --}}
@endsection

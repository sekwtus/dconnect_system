<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    .tbl- {
      width: 100%;
      border-collapse: collapse;
    }
    .tbl- th, .tbl- td {
      padding: 5px;
      border: 1px solid black;
    }
    
    .style-check-box, .style-radio {
      font-size: 15pt !important; 
      vertical-align: middle;
    }
  </style>
</head>


<body>
  <div class="row"> 
    <div class="col-md-8">
      <h2 class="form-inline">
        แบบฟอมร์เอกสาร Paperless
      </h2>
    </div>
    

    <div class="col-md-4 text-right">
      {{-- <a href="{{ url('/create') }}" class="btn btn-lg btn-success">
        <i class="fa fa-plus"></i> เพิ่มข้อมูล
      </a> --}}
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

          <!-- แท็บเลือกฟอร์มเอกสาร -->
          <ul class="nav nav-tabs tab-solid tab-solid-danger" role="tablist">
            <li class="nav-item">
              <a class="nav-link" id="doc-0" data-toggle="tab" href="#tab-doc-0" role="tab" aria-controls="tab-doc-0" aria-selected="false">
                doc-0
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-1" data-toggle="tab" href="#tab-doc-1" role="tab" aria-controls="tab-doc-1" aria-selected="false">
                doc-1
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-2" data-toggle="tab" href="#tab-doc-2" role="tab" aria-controls="tab-doc-2" aria-selected="false">
                doc-2
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-3" data-toggle="tab" href="#tab-doc-3" role="tab" aria-controls="tab-doc-3" aria-selected="false">
                doc-3
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-4" data-toggle="tab" href="#tab-doc-4" role="tab" aria-controls="tab-doc-4" aria-selected="false">
                doc-4
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-5" data-toggle="tab" href="#tab-doc-5" role="tab" aria-controls="tab-doc-5" aria-selected="false">
                doc-5
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-6" data-toggle="tab" href="#tab-doc-6" role="tab" aria-controls="tab-doc-6" aria-selected="false">
                doc-6
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-7" data-toggle="tab" href="#tab-doc-7" role="tab" aria-controls="tab-doc-7" aria-selected="false">
                doc-7
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" id="doc-8" data-toggle="tab" href="#tab-doc-8" role="tab" aria-controls="tab-doc-8" aria-selected="true">
                doc-8
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-9" data-toggle="tab" href="#tab-doc-9" role="tab" aria-controls="tab-doc-9" aria-selected="false">
                doc-9
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="doc-10" data-toggle="tab" href="#tab-doc-10" role="tab" aria-controls="tab-doc-9" aria-selected="false">
                doc-10
              </a>
            </li>
          </ul>
          
          <div class="tab-content tab-content-solid">
            <!-- 0 Verification OPRPs and CCPs for Release Product Record FM-PD-132 Rev.11 -->
            <div class="tab-pane fade" id="tab-doc-0" role="tabpanel" aria-labelledby="doc-0">
              <div class="row">
                <div class="col-md-6">
                  FM-PD-132 Rev.11
                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-0')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

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
                          {{ th_date_short(date("Y-m-d")) }}
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

                        <td style="width:3%;" class="text-center" ></td>
                        <td>
                          เศษผงโลหะที่ปนมากับนม < 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ < 0.6 PPM
                        </td>
                        <td class="text-center" rowspan="2">
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
                        <td rowspan="2" class="text-center"><!-- CHECKED BY --></td>
                        <td rowspan="2" class="text-center">
                          <!-- REMARK -->
                        </td>
                      </tr>

                      <tr>
                        <td style="width:3%;" class="text-center" ></td>
                        <td>
                          เศษผงโลหะที่ปนมากับนม < 0.02 PPM หรือผลิตภัณฑ์ที่มีส่วนผสมของผงโกโก้ < 0.6 PPM
                        </td>
                      </tr>
                      <!-- end 2 -->
                        
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
                              วิธีการบันทึก :  ทำเครื่องหมายถูก ( / ) ลงในช่อง  ของ Result
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              FM-PD-132  Rev.11  Effective date 01 / 04 / 2020
                            </div>
                            
                            <div class="col-md-6 text-right">
                              Verified by :     Sumate S.        (Production Manager/Assistant Production Manager)
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>

                </div>
              </div>
            </div>

            <!-- 1 การตรวจสอบความถูกต้องของการผลิต 01 FM-PD-018 Rev No.35 -->
            <div class="tab-pane fade" id="tab-doc-1" role="tabpanel" aria-labelledby="doc-1">
              <div class="row">
                <div class="col-md-6">
                  01 FM-PD-018 Rev No.35
                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-1')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

              <div id="document-1" class="row mt-3">
                <div class="col-md-12">
                  <span style="border: #000 1px solid; padding: 2px; float: right; position: absolute; right: 0.35cm;">
                    FM-PD-018 Rev No. 35 Eff. Date 11/11/2019
                  </span>

                  <h4 class="text-center">
                    การตรวจสอบความถูกต้องของการผลิต
                  </h4>
                </div>

                <div class="col-md-12">
                  <table class="tbl-" style="font-size: 10pt;">
                    <tr>
                      <th style="width:50%;">
                        <div class="form-inline">
                          <span class="mr-2">
                            ชื่อผลิตภัณฑ์
                            {{ '................................................................................' }}
                          </span>
                        </div>
                      </th>

                      <th style="width:50%;">
                        วันที่ {{ th_date_short(date('Y-m-d')) }}
                      </th>
                    </tr>

                    <tr>
                      <!-- ส่วนที่ 1 -->
                      <td style="vertical-align: top;">
                        <div class="row">
                          <div class="col-md-12">
                            <u>การตรวจสอบ RAW MATERIAL จาก WHEREHOUSE</u>
                            
                            <label class="ml-2">
                              <span class="style-radio">&#9898;</span> 
                              ใช้นมชนิดเดิมผลิตต่อ
                              
                              <span class="style-radio">&#9899;</span> 
                              เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย
                            </label>

                            <!-- <div class="icheck-square">
                              <input type="radio" name="rdoTypeMilk" value="ใช้นมชนิดเดิมผลิตต่อ" checked>
                              <label>ใช้นมชนิดเดิมผลิตต่อ</label>
                            </div>

                            <div class="icheck-square">
                              <input type="radio" name="rdoTypeMilk" value="เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย">
                              <label>เคลียร์นมชนิดก่อนหน้าออกเรียบร้อย</label>
                            </div> -->
                          </div>

                          <div class="col-md-12">
                            <span>ชนิดของนมที่ส่ง</span>
                            <span>1..............................</span>
                            <span>2..............................</span>
                            <span>3..............................</span>
                            <span>4..............................</span>
                            
                            {{-- <div class="form-inline mt-1">
                              <span class="mr-2">1.</span>
                              <input name="txtTypeMilk1" class="form-control form-control-sm">
                            </div> --}}

                            <div>
                              <span>RM. Code</span>

                              <table>
                                @for ($i=1; $i<=4; $i++)
                                  <tr>
                                    <td style="width: 15%;" class="text-right border-0">หมายเลข RM</td>
                                    <td style="width: 5%;"></td>
                                    <td style="width: 5%;"></td>
                                    <td style="width: 5%;"></td>
                                    <td style="width: 5%;"></td>
                                    <td style="width: 5%;"></td>
                                    <td style="width: 5%;"></td>

                                    <td style="width: %;" class="border-0">
                                      เบอร์ไซเฟอร์ ..............................
                                    </td>
                                  </tr>
                                @endfor
                              </table>

                              <div class="mt-2">
                                บันทึกโดย
                                {{ '................................................................................' }}
                                (พนักงานถอดถุงนม)
                              </div>
                            </div>
                          </div>

                        </div>
                      </td>

                      <!-- ส่วนที่ 2 -->
                      <td style="vertical-align: top;">
                        <div class="row">
                          <div class="col-md-12 mb-1">
                            <u>Process Flow (รายละเอียดการผลิต)</u>
                          </div>

                          <div class="col-md-6">
                            <span  style="background-color: #16c60c;">
                              เบลนเดอร์ที่ใช้
                            </span>

                            {{-- <div class="icheck-square">
                              <input type="checkbox" name="chkBlender[]" value="เบลนเดอร์ 1 (Prebiotic)">
                              <label>เบลนเดอร์ 1 (Prebiotic)</label>
                            </div> --}}
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>เบลนเดอร์ 1 (Prebiotic)</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>เบลนเดอร์ 2 (Prebiotic)</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>เบลนเดอร์ 1 และ สไมล์(Synbiotic)</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>ไอเอฟ เซกรีแคร์ (IF Segrecare)</span>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <span style="background-color: #16c60c;">
                              เครื่องบรรจุที่ใช้
                            </span>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>Filling line 1</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>Filling line 2</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>Filling line 3</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>Filling line 4</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>Filling line 5</span>
                            </div>
                            
                            <div class="">
                              <span class="style-check-box">&#11036;</span> 
                              <span>Filling line 6</span>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="mt-2">
                              บันทึกโดย
                              {{ '..................................................' }}
                              (พนักงานเทนม)
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <!-- ส่วนที่ 3 -->
                      <td style="vertical-align: top;">
                        <div class="row">
                          <div class="col-md-5">
                            <div id="">
                              <u>หมายเลขสูตรการผลิต</u>

                              <table>
                                <tr>
                                  <td style="width: 5%;">&nbsp;</td>
                                  <td style="width: 5%;"></td>
                                  <td style="width: 5%;"></td>
                                  <td style="width: 5%;"></td>
                                  <td style="width: 5%;"></td>
                                  <td style="width: 5%;"></td>
                                  <td style="width: 5%;"></td>
                                  <td style="width: 5%;"></td>
                                </tr>
                              </table>
                            </div>

                            <div id="">
                              <u>Ribbon ที่ใช้</u>

                              <div>
                                <label>
                                  <!--
                                    <span class="style-check-box">&#9744;</span> 
                                    <span class="style-check-box">&#9745;</span>
                                  -->

                                  <span class="style-check-box">&#11036;</span> 
                                  <!-- 
                                    <span class="style-check-box">&#129001;</span>
                                    <span class="style-check-box">&#128997;</span>
                                  -->
                                  <span>Ribbon อาร์ตเวิร์ค</span>
                                </label>

                                <label>
                                  <span class="style-check-box">&#11035;</span> 
                                  <span>Ribbon คอมม่อน</span>
                                </label>
                              </div>
                            </div>

                            <div id="" class="mt-5">
                              <u>บันทึกการเปลี่ยนผลิตภัณฑ์</u>

                              <div>
                                <div>
                                  <span class="style-check-box">&#11036;</span> 
                                  <span>เดินผลิตภัณฑ์ตัวแรกของสัปดาห์</span>
                                </div>
                                
                                <div>
                                  <span class="style-check-box">&#11036;</span> 
                                  <span>ไม่มีการเปลี่ยนสูตรผลิตภัณฑ์</span>
                                </div>

                                <div id="">
                                  <span class="style-check-box">&#11035;</span> 
                                  <span>มีการเปลี่ยนสูตรผลิตภัณฑ์</span>
                                  
                                  <div id="" class="pl-4">
                                    <div>
                                      <span class="style-radio">&#9899;</span> 
                                      ไม่มีนมตกค้างใน Blender/Hopper
                                    </div>

                                    <div>
                                      <span class="style-radio">&#9898;</span> 
                                      ไม่มีนมตกค้างใน Seperator/Vibrator sieve
                                    </div>

                                    <div>
                                      <span class="style-radio">&#9898;</span> 
                                      ไม่มีนมตกค้างในเครื่องบรรจุ
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-7">
                            <div id="">
                              <span>ตรวจสอบความถูกต้องของ Foil</span>

                              <div class="p-0 ">
                                <table>
                                  <tr>
                                    <td colspan="" class="text-center border-bottom-0">ติดตัวอย่างซองที่มี Art Work</td>
                                  </tr>

                                  <tr>
                                    <td class="border-top-0">

                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="border border-dark p-1">
                                            <div class="text-center">
                                              (ตัวอย่าง แบบที่ 1)
                                              <br>
                                              IFFO / P& BF
                                            </div>

                                            <div>
                                              Product ....................
                                              <br>
                                              MFG ....................
                                              <br>
                                              EXP ....................
                                              <br>
                                              แบชผลิต ....................
                                              <br>
                                              Production Order ....................
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="border border-dark p-1">
                                            <div class="text-center">
                                              (ตัวอย่าง แบบที่ 2)
                                              <br>
                                              GUM Product
                                            </div>

                                            <div>
                                              Product ....................
                                              <br>
                                              MFG ....................
                                              <br>
                                              EXP ....................
                                              <br>
                                              แบชผลิต ....................
                                              <br>
                                              Production Order ....................
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </div>

                              <div class="p-0 border border-dark">
                                <table>
                                  <tr>
                                    <td class="border-0">ตัวอย่างการพิมพ์ข้างซอง</td>
                                    <td class="border-0">ความถูกต้องของการพิมพ์</td>
                                    <td class="border-0"></td>
                                  </tr>

                                  <tr>
                                    <td class="text-center border-0">
                                      แบชผลิต..............................
                                    </td>

                                    <td class="border-0">ชื่อผลิตภัณฑ์</td>
                                    <td></td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="border-0"></td>
                                    <td class="border-0">เวลา</td>
                                    <td style="width: 10%;"></td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="border-0"></td>
                                    <td class="border-0">วันผลิต</td>
                                    <td style="width: 10%;"></td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="border-0"></td>
                                    <td class="border-0">วันหมดอายุ</td>
                                    <td style="width: 10%;"></td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="border-0"></td>
                                    <td class="border-0">แบช</td>
                                    <td style="width: 10%;"></td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="border-0"></td>
                                    <td class="border-0">ออเดอร์/ไลน์</td>
                                    <td style="width: 10%;"></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="mb-5">
                              <table style="width: 85%;" class="mr-0 ml-auto">
                                <tr>
                                  <td class="border-0"></td>

                                  <td style="width: 5%;" class="text-center border-0">Y</td>
                                  <td style="width: 5%;" class="text-center border-0">Y</td>
                                  <td style="width: 5%;" class="text-center border-0">Y</td>
                                  <td style="width: 5%;" class="text-center border-0">Y</td>
                                  <td style="width: 5%;" class="border-0"></td>
                                  <td style="width: 5%;" class="text-center border-0">M</td>
                                  <td style="width: 5%;" class="text-center border-0">M</td>
                                  <td style="width: 5%;" class="border-0"></td>
                                  <td style="width: 5%;" class="text-center border-0">D</td>
                                  <td style="width: 5%;" class="text-center border-0">D</td>
                                  <td style="width: 5%;" class="border-0"></td>

                                  <td colspan="2" class="text-center border-0">
                                    Line
                                  </td>
                                </tr>

                                <tr>
                                  <td class="text-right border-0">แบชผลิตภัณฑ์</td>

                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center border-0">•</td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center border-0">•</td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center border-0">•</td>
                                  <td style="width: 5%;" class="text-center"></td>
                                  <td style="width: 5%;" class="text-center"></td>
                                </tr>
                              </table>
                            </div>

                            <p class="text-center">
                              <u>ข้อมูลผลิตภัณฑ์เดิมที่แพ็คก่อนหน้านี้</u>
                            </p>

                            <p>
                              ผลิตภัณฑ์................................................................................
                              ขนาด..............................กรัม
                            </p>
                            
                            <p>
                              บันทึกโดย................................................................................
                              (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                            </p>
                            
                            <p>
                              ตรวจสอบโดย................................................................................
                              (พนักงาน Operator Filling ประจำเครื่องบรรจุ)
                            </p>
                          </div>
                        </div>
                      </td>

                      <!-- ส่วนที่ 4 -->
                      <td style="vertical-align: top;">
                        <div id="">
                          <table>
                            <tr>
                              <td colspan="19" style="background-color: #16c60c;" class="text-center">
                                รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch
                              </td>
                            </tr>

                            <tr>
                              <td colspan="2">PM Code/เลขก้น Unit</td>

                              <td class="text-center">
                                P
                              </td>

                              <td class="text-center">
                                M
                              </td>

                              @for ($i=1; $i<=15; $i++)
                                <td></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>วันผลิต</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>วันหมดอายุ</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr>

                            <tr>
                              <td>ควรบริโภคก่อน</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>Material Number</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>Product Order/Line</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td colspan="19">&nbsp;</td>
                            </tr>
                          </table>

                          <div>
                            <!--  
                              <span class="style-radio">&#8858;</span>
                              <span class="style-radio">&#10687;</span> 
                              <span class="style-radio">&#11097;</span> 
                              <span class="style-radio">&#9711;</span> 

                              <span class="style-radio">&#128280;</span>
                              <span class="style-radio">&#128992;</span> 
                            -->

                            <span class="style-radio">&#9898;</span> 
                            <!-- <span class="style-check-box" style="">&#9899;</span> -->
                            เคลียร์ Unit/Special Box ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                          </div>

                          <div style="background-color: #ffff80;">
                            บันทึกโดย
                            {{ '................................................................................' }}
                            (พนักงานบรรจุกล่องยูนิต)
                          </div>
                        </div>

                        <div id="" class="mt-2">
                          <div>
                            ใช้ช้อน

                            <span class="style-radio">&#9898;</span> 
                            ใช้ช้อนเบอร์เดิม

                            <span class="style-radio">&#9899;</span> 
                            เคลียร์ช้อนที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                          </div>

                          <table>
                            <tr>
                              <td colspan="16" style="background-color: #16c60c;" class="text-center">
                                ช้อนเบอร์ 
                                
                                <span class="style-radio">&#9898;</span> 
                                1 
                                
                                <span class="style-radio">&#9899;</span> 
                                2
                                
                                <span class="style-radio">&#128309;</span> 
                                3
  
                                <span class="style-radio">&#128994;</span> 
                                4 
                                
                                <span class="style-radio">&#128308;</span>
                                5
                              </td>
                            </tr> 

                            <tr>
                              <td>Customer Item/รหัสชิ้นงาน</td>
                              @for ($i=1; $i<=15; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 
                          </table>

                          <div style="background-color: #ffff80;">
                            บันทึกโดย
                            {{ '................................................................................' }}
                            (พนักงานบรรจุกล่องยูนิต)
                          </div>
                        </div>

                        <div id="" class="mt-2">
                          <div>
                            <span class="style-check-box" style="">&#9898;</span> 
                            <!-- <span class="style-check-box" style="">&#9899;</span> -->
                            เคลียร์ Shipper ที่ไม่เกี่ยวข้องออกจากไลน์ผลิตเรียบร้อย
                          </div>

                          <table>
                            <tr>
                              <td colspan="19" style="background-color: #16c60c;" class="text-center">
                                รายละเอียดของ Unit Carton / Special box / แบชข้างซอง Pouch
                              </td>
                            </tr>

                            <tr>
                              <td>PM Code</td>

                              <td class="text-center">
                                P
                              </td>

                              <td class="text-center">
                                M
                              </td>

                              @for ($i=1; $i<=16; $i++)
                                <td></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>Material Code</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>Product Hiererchy</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr>

                            <tr>
                              <td>Time</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>Batch Number</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td>EXP.</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr>

                            <tr>
                              <td>BBD.</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr>  

                            <tr>
                              <td>Product Order/Line</td>
                              @for ($i=1; $i<=18; $i++)
                                <td style="width: 4%;"></td>
                              @endfor
                            </tr> 

                            <tr>
                              <td colspan="19">
                                ตัวอย่างการพิมพ์ Time 16.00  Batch 2021.05.04  BBD. 04.05.2021  หรือ  EXP. 04.052021
                              </td>
                            </tr>
                          </table>
                  
                          <div style="background-color: #ffff80;">
                            บันทึกโดย
                            {{ '................................................................................' }}
                            (พนักงานเก็บลงกล่อง)
                          </div> 
          
                          <div>
                            กาวที่ใช้ในการผลิต
                            
                            <span class="style-check-box" style="">&#9898;</span> 
                            ไทย
          
                            <span class="style-check-box" style="">&#9899;</span>
                            ส่งออก
                          </div>
                          
                          <div style="background-color: #ffff80;">
                            บันทึกโดย
                            {{ '................................................................................' }}
                            (พนักงาน Operator Packing)
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <th colspan="2">
                        Approve By ......................................................................
                        PD.Line leader/Supervisor/IRF  Time ........................................
                      </th>
                    </tr>
                  </table>
                </div>
                
              </div>
            </div>

            <!-- 2 บันทึกฟอยล์สำหรับบรรจุนมชนิดซอง 02 FM-PD-037 Rev.04  -->
            <div class="tab-pane fade" id="tab-doc-2" role="tabpanel" aria-labelledby="doc-2">
              <div class="row">
                <div class="col-md-6">
                  02 FM-PD-037 Rev.04 
                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-2')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

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

                    @for ($i=1; $i<=4; $i++)
                      <tr>
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

            <!-- 3 การตรวจสอบความถูกต้องของบรรจุภัณฑ์ที่นำมาใช้ในการผลิต 03 FM-PD-024 Design -->
            <div class="tab-pane fade" id="tab-doc-3" role="tabpanel" aria-labelledby="doc-3">
              <div class="row">
                <div class="col-md-6">
                  03 FM-PD-024 Design
                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-3')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

              <div id="document-3" class="row mt-3">
                <div class="col-md-12">

                  <table class="tbl-">
                    <thead>
                      <tr>
                        <th colspan="2" class="text-center">
                          <span style="border: #000 1px solid; padding: 2px; float: right; position: absolute; right: 0.35cm;">
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
                      @for ($i=1; $i<=3; $i++)
                      <tr>
                        <td>
                          <!-- start รายละเอียดของ Unit Carton / Special box -->
                          <table class="" border="1">
                            <thead>
                              <tr>
                                <th style="width:20%;" class="text-center">เวลา</th>
                                <th colspan="23" class="text-center">รายละเอียดของ Unit Carton / Special box</th>
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
                                
                                <td style="background:gray; "class="text-center"></td>
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

                                <td style="background:gray; "class="text-center"></td>
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
                                <th colspan="23" class="text-center">รายละเอียดของ Unit Carton / Special box</th>
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
                                
                                <td style="background:gray; "class="text-center"></td>
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

                                <td style="background:gray; "class="text-center"></td>
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
            
            <!-- 4 การตรวจสอบความถูกต้องของเบอร์ช้อน (sccoop) 04 FM-PD-130 Rev.06 -->
            <div class="tab-pane fade" id="tab-doc-4" role="tabpanel" aria-labelledby="doc-4"> 
              <div class="row">
                <div class="col-md-6">
                  04 FM-PD-130 Rev.06
                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-4')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

              <div id="document-4" class="row mt-3">
                <div class="col-md-12">

                  <table class="tbl-">
                    <thead>
                      <tr>
                        <th colspan="7" class="text-center">
                          <span style="border: #000 1px solid; padding: 2px; float: right; position: absolute; right: 0.35cm;">
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
                                  สำหรับกล่องที่ยังใช้ช้อนไม่หมด ให้คัดลอกข้อมูลจากป้ายเดิมแล้วเขียนลงบนป้ายใหม่เพื่อติดบนถุงหรือกล่องช้อนก่อนส่งกลับคืน
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

            <!-- 5 แบบฟอร์มบันทึกการตรวจสอบ Unit Carton / Special Box 05 FM-PD-034 Rev No.12 -->
            <div class="tab-pane fade" id="tab-doc-5" role="tabpanel" aria-labelledby="doc-5"> 
              <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-5')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

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
                        
                        <span style="border:#000 1px solid; padding:2px; float:right; position:absolute; right:0.35cm;">
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
                            - ถ้ารายละเอียดข้างกล่อง Unit Carton / Shipper Carton แต่ละกล่องเหมือนกันให้ดึงมาติดแค่ใบเดียว
                          </div>

                          <div>
                            - สำหรับกล่องที่ใช้ Unit Carton / Shipper Carton ไม่หมด ไม่ต้องดึงใบมาติด ให้บันทึกรายละเอียดลงบรรทัดด้านล่างแทน
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
              {{-- <div class="row">
                <div class="col-md-12">
                  <img class="img-fluid w-100 rounded" src="{{ asset('img/paper.jpg') }}" alt="Sample Image"> 
                </div>
              </div> --}}
            </div>

            <!-- 6 การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader) 06 FM-PD-004 Rev.13 -->
            <div class="tab-pane fade" id="tab-doc-6" role="tabpanel" aria-labelledby="doc-6">
              <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-6')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

              <div id="document-6" class="row mt-3">
                <div class="col-md-12">

                  <table class="tbl-">
                    <thead>
                      <tr>
                        <td colspan="12">
                          <h4 class="text-center mb-0">
                            <b>การทดสอบการทำงานของเครื่องอ่านบาร์โค้ด (Barcode Reader)</b>
                          </h4>
                        </td>

                        <th rowspan="2">
                          CCP 3B
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

                          <span style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:6cm;">
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
                      @for ($i=1; $i<=4; $i++)
                        <tr>
                          <td rowspan="6">
                            {{ th_date_short(date("Y-m-$i")) }}
                          </td>

                          <td rowspan="6"></td>

                          <td rowspan="6"></td>

                          <td rowspan="6" class="text-center">
                            <div>
                              [&nbsp;&nbsp;&nbsp;] ไทย 
                              <br> 8 851359
                            </div>

                            <div>
                              [&nbsp;&nbsp;&nbsp;] ส่งออก
                              <br> 8 990057
                            </div>

                            <div>
                              [&nbsp;&nbsp;&nbsp;] ส่งออก
                              <br> 9 556098
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

                            <div>
                              [&nbsp;&nbsp;&nbsp;]
                              หลังจากที่ไลน์การผลิตหยุดมากกว่า 60 นาที
                            </div>

                            <div>
                              [&nbsp;&nbsp;&nbsp;]
                              มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด
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
                            หมายเหตุ 2
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
                              วิธีการทดสอบการทำงานของเครืองอ่านบาร์โค้ด
                            </b>
                          </div>
                          <ol>
                            <li>
                              วางกล่องทดสอบบนสายพาน เพื่อให้กล่องทดสอบผ่านเครื่องอ่านบาร์โค้ด
                            </li>
                            <li>
                              กล่องทดสอบแต่ละชนิดต้องผ่านเข้าเครื่องอ่านบาร์โค้ด 3 ครั้ง รวมทั้งหมด 6 ครั้ง
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
                            เครื่องอ่านบาร์โค้ด สามารถรีเจคท์
                            <u>กล่องที่บาร์โค้ดผิด, บาร์โค้ดไม่มี หรือบาร์โค้ดไม่ชัด</u>
                            ได้ทุกกล่องและทุกครั้ง
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
                              มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด
                            </li>
                            <li>
                              ทุกๆการผลิตต่อเนื่อง 8  ชั่วโมง
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
                            สิ่งที่ต้องทำทันที หากพบว่าเครื่องอ่านบาร์โค้ดไม่สามารถรีเจ็คท์กล่องทดสอบได้ครบทุกครั้ง แสดงว่าเครื่องอ่านบาร์โค้ดเสีย
                          </div>
                          <ol>
                            <li>
                              Barcode Operator ห้ามปรับพารามิเตอร์ของเครื่องอ่านบาร์โค้ดโดยเด็ดขาด แต่ให้หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน
                            </li>
                            <li>
                              PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้กล่องทดสอบเครื่องอ่านบาร์โค้ดครั้งสุดท้าย และกักกัน (block) 
                              ผลิตภัณฑ์ในระบบ จากนั้นปฏิบัติตามใน HACCP Action Plan
                            </li>
                          </ol>
                        </td>
                      </tr>
                    </tfoot>
                  </table>

                </div>
              </div>
            </div>

            <!-- 7 การทดสอบการทำงานของเครื่อง X-Ray 07 FM-PD-002 Rev.17 -->
            <div class="tab-pane fade" id="tab-doc-7" role="tabpanel" aria-labelledby="doc-7">
              <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-7')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

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

                          <span style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:6cm;">
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
                      @for ($i=1; $i<=4; $i++)
                        <tr>
                          <td rowspan="6">
                            {{ th_date_short(date("Y-m-$i")) }}
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
                              ใช้แผ่นทดสอบ 2 ชนิดติดที่ถุงนม (1 แผ่น/1 ถุง) แล้ววางคว่ำแผ่นทดสอบบนสายพาน เพื่อให้ถุงนมผ่านเข้าเครื่อง X-Ray 
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
                              ทุกๆการผลิตต่อเนื่อง 8  ชั่วโมง
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
                            สิ่งที่ต้องทำทันที หากพบว่าเครื่อง X-ray ไม่สามารถรีเจ็คท์แผ่นทดสอบได้ครบทุกครั้ง แสดงว่าเครื่อง X-Ray มีปัญหา
                          </div>
                          <ol>
                            <li>
                              X-Ray Operator ห้ามปรับพารามิเตอร์ของเครื่อง X-Ray โดยเด็ดขาด แต่ให้หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน
                            </li>
                            <li>
                              PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้แผ่นทดสอบเครื่อง X-Ray ครั้งสุดท้าย และกักกัน (block) ผลิตภัณฑ์ในระบบ
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

            <!-- 8 การทดสอบการทำงานของเครื่องตรวจสอบแบช (Batch Code) 08 FM-PD-014 Rev.02 -->
            <div class="tab-pane fade show active" id="tab-doc-8" role="tabpanel" aria-labelledby="doc-8">
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

                          <span style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:0.35cm;">
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
                      @for ($i=1; $i<=4; $i++)
                        <tr>
                          <td rowspan="3">
                            {{ th_date_short(date("Y-m-$i")) }}
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
                            สิ่งที่ต้องทำทันที หากพบว่าเครื่องไม่สามารถตรวจสอบและรีเจ็คท์กล่องที่ไม่มีแบชได้ครบทั้ง 3 ครั้ง แสดงว่าเครื่องทำงานไม่ปกติ
                          </div>
                          <ol>
                            <li>
                              Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader)
                            </li>
                            <li>
                              PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบเครื่องครั้งสุดท้าย และกักกัน (block)
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

            <!-- 9 การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ (Bacode Reader at Filling machine) 09 FM-PD-044 Design -->
            <div class="tab-pane fade" id="tab-doc-9" role="tabpanel" aria-labelledby="doc-9">
              <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-9')" class="btn btn-primary">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

              <div id="document-9" class="row mt-3">
                <div class="col-md-12">

                  <table class="tbl-">
                    <thead>
                      <tr>
                        <td colspan="12">
                          <h4 class="text-center mb-0">
                            <b>การทดสอบการทำงานของเครื่องตรวจสอบบาร์โค้ดที่เครื่องบรรจุ (Bacode Reader at Filling machine)</b>
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

                          <span style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:6cm;">
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
                      @for ($i=1; $i<=4; $i++)
                        <tr>
                          <td rowspan="6">
                            {{ th_date_short(date("Y-m-$i")) }}
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
                            สิ่งที่ต้องทำทันที หากพบว่าเครื่องอ่านบาร์โค้ดไม่สามารถรีเจ็คท์กล่องทดสอบได้ครบทุกครั้ง แสดงว่าเครื่องอ่านบาร์โค้ดเสีย
                          </div>
                          <ol>
                            <li>
                              Barcode Operator ห้ามปรับพารามิเตอร์ของเครื่องอ่านบาร์โค้ดโดยเด็ดขาด แต่ให้หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน
                            </li>
                            <li>
                              PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ใช้กล่องทดสอบเครื่องอ่านบาร์โค้ดครั้งสุดท้าย และกักกัน (block) 
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
            
            <!-- 10 การทดสอบกล้องตรวจสอบช้อน (Scoop camera) สำหรับ Auto Packing line-->
            <div class="tab-pane fade" id="tab-doc-10" role="tabpanel" aria-labelledby="doc-10">
              <div class="row">
                <div class="col-md-6">
                </div>

                <div class="col-md-6 text-right">
                  <button onclick="PrintDocument('document-10')" class="btn btn-facebook">
                    <i class="fa fa-print"></i> พิมพ์
                  </button>
                </div>
              </div>

              <div id="document-10" class="row mt-3">
                <div class="col-md-12">

                  <table class="tbl-">
                    <thead>
                      <tr>
                        <td colspan="12">
                          <span style="border:#000 1px solid; padding:2px; float:right; position:absolute; top:6px; right:0.35cm;">
                            FM-PD-034 Rev No.12 Date 26/10/15
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
                      @for ($i=1; $i<=4; $i++)
                        <tr>
                          <td rowspan="3">
                            {{ th_date_short(date("Y-m-$i")) }}
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
                                  หากพบว่ากล้องไม่สามารถตรวจสอบและรีเจ็คท์ถุงนมที่ไม่มีช้อนได้ครบทั้ง 3 ครั้ง ให้ดูที่ช่องการแก้ไข
                                </li>
                              </ol>
                            </div> 

                            <div class="col-md-6">
                              <div>
                                <b class="border border-dark">การแก้ไข</b>
                              </div>

                              <div>
                                สิ่งที่ต้องทำทันที หากพบว่ากล้องไม่สามารถตรวจสอบและรีเจ็คท์ถุงนมที่ไม่มีช้อนได้ครบทั้ง 3 ครั้งแล้ว แสดงว่ากล้องเสีย
                              </div>
                              <ol>
                                <li>Operator หยุดการผลิตทันที และทำการแจ้งหัวหน้างาน (Shift Supervisor/Leader)</li>
                                <li>PD and QFS คัดแยกผลิตภัณฑ์ตั้งแต่เวลาที่ตรวจสอบกล้องครั้งสุดท้าย และกักกัน (block)</li>
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
          </div>

        </div>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">
  var resident_main = (function () {
    var datatable_resident1;

    var datatable_resident = function () {
      datatable_resident1 = $('.tbl-resident').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        // order: [[ 1, 'asc' ]],
        iDisplayLength: 20,
        aLengthMenu: [
          [20, 30, 40, 50, -1], 
          [20, 30, 40, 50, "ทั้งหมด"]
        ], 
        language: {
          search: "" 
        },
  
        ajax: {
          type: "GET",
          url: "{{ url('setting/get-resident') }}",
          data: function (d) {
            // d.year = $('select[name=ddlYear]').val();
            // d.round = $('select[name=ddlRound]').val();
            // console.log(d);
          },
        },
        columns: [
          { data: 'id'},
          { data: 'name' },
          { data: 'address' },
          { data: 'card_id' },
          { data: 'tel' },
          { data: 'id' },
        ],
        columnDefs: [
          { 
            targets: 0, "className":"text-center",
            render: function (data, type, row, meta) {
              // console.log(meta);
              return (meta.row + meta.settings._iDisplayStart + 1);
            } 
          },

          // { 
          //   targets: 2,
          //   searchable: false,
          //   className: 'text-center',
  
          //   render: function (data, type, row, meta) { 
          //     return '<img class="img" src="{{ asset("local/public/image_people") }}'+'/'+data+' ">';
          //   } 
          // },

          {
            targets: -1,
            searchable: false,
            className: 'text-center',
  
            render: function (data, type, row, meta) { //`
              return '<a class="btn btn-icons btn-warning" href="{{ url("setting") }}'+'/'+data+'/resident-edit" title="ดู/แก้ไขข้อมูล"><i class="fa fa-edit"></i></a>\
                <button class="btn btn-icons btn-danger" onclick="deleteResident('+data+')" title="ลบข้อมูล"><i class="fa fa-trash-alt"></i></button>';
            }
          }
        ],
      });
    }
  
    deleteResident = function(id) { 
      if(confirm('ต้องการลบข้อมูลหรือไม่ ?')) {
        $.ajax({
          type: "POST",
          url: `{{ url('setting/${id}/resident-delete') }}`,
          // data: {user_id: id},
          
          success: function (res) {
            console.log(res);
            alert(res.msg)
            datatable_resident1.ajax.reload();
            // location.reload();
          },
          error: function (err) {
            console.log(err.responseJSON);
          }
        });
      }
    }

    PrintDocument = function(id_content) {
      alert('อยู่ระหว่างดำเนินการ');
    }

    return {
      init: function () {
        datatable_resident();
      }
    }

  })()

  $(document).ready(function () {
    resident_main.init();

    
    // $('#tab-doc-3').tab('hide');
    // $('ul.nav.nav-tabs.tab-solid a[href="#tab-doc-5"]').tab('show');
    // $('#tab-doc-5').tab('show');
  });
</script>

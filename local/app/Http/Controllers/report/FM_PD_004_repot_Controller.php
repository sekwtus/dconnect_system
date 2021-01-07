<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_004_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_004_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_004_main = FM_PD_004_main::select('FM_PD_004_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_004_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_004_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        $frequency = array();
        foreach ($FM_PD_004_main as $key => $item) {
            $frequencys = explode(",", $item->frequency);
            $frequency[0][$key] = null;
            $frequency[1][$key] = null;
            $frequency[2][$key] = null;
            $frequency[3][$key] = null;
            $frequency[4][$key] = null;
            $frequency[5][$key] = null;
            $frequency[6][$key] = null;
            foreach ($frequencys as $index => $out_frequency) {
                if ($out_frequency == 'ก่อนเริ่มงานแต่ละกะ') {
                    $frequency[0][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนผลิตภัณฑ์') {
                    $frequency[1][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนขนาดของผลิตภัณฑ์') {
                    $frequency[2][$key] = 'checked';
                }
                if ($out_frequency == 'หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที') {
                    $frequency[3][$key] = 'checked';
                }
                if ($out_frequency == 'มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด') {
                    $frequency[4][$key] = 'checked';
                }
                if ($out_frequency == 'ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง') {
                    $frequency[5][$key] = 'checked';
                }
                if ($out_frequency == 'ทุกวันหลังสิ้นสุดการผลิต') {
                    $frequency[6][$key] = 'checked';
                }
            }
        }

        return view('D-Reccord.report.FM-PD-004', compact('head', 'FM_PD_004_main', 'production_order', 'frequency'));
    }

    public function update(Request $req, $production_order)
    {

        foreach ($req->ID as $key => $id) {

            $FM_PD_004 = FM_PD_004_main::where(['id' => $id, 'production_order' => $production_order])->first();

            if ($req->hasFile("bracode_no")) {
                if (isset($req->bracode_no[$key])) {
                    $bracode_no = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->bracode_no[$key]->getClientOriginalExtension();
                    $req->bracode_no[$key]->move('assets/FM-PD-004', $bracode_no);
                    $FM_PD_004->bracode_no = $bracode_no;
                }
            }

            $FM_PD_004->Frequency = isset($req->Frequency[$key]) ? implode(',', $req->Frequency[$key]) : null;

            $FM_PD_004->Wrong_Barcode_Result_1 = isset($req->Wrong_Barcode_Result_1[$key]) ? $req->Wrong_Barcode_Result_1[$key] : null;
            $FM_PD_004->Wrong_Barcode_Result_2 = isset($req->Wrong_Barcode_Result_2[$key]) ? $req->Wrong_Barcode_Result_2[$key] : null;
            $FM_PD_004->Wrong_Barcode_Result_3 = isset($req->Wrong_Barcode_Result_3[$key]) ? $req->Wrong_Barcode_Result_3[$key] : null;
            $FM_PD_004->Wrong_Barcode_Note = isset($req->Wrong_Barcode_Note[$key]) ? $req->Wrong_Barcode_Note[$key] : null;

            $FM_PD_004->No_Barcode_Result_1 = isset($req->No_Barcode_Result_1[$key]) ? $req->No_Barcode_Result_1[$key] : null;
            $FM_PD_004->No_Barcode_Result_2 = isset($req->No_Barcode_Result_2[$key]) ? $req->No_Barcode_Result_2[$key] : null;
            $FM_PD_004->No_Barcode_Result_3 = isset($req->No_Barcode_Result_3[$key]) ? $req->No_Barcode_Result_3[$key] : null;
            $FM_PD_004->No_Barcode_Note = isset($req->No_Barcode_Note[$key]) ? $req->No_Barcode_Note[$key] : null;

            $FM_PD_004->save();
        }


        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_004_main = FM_PD_004_main::select('FM_PD_004_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_004_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_004_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        $frequency = array();
        foreach ($FM_PD_004_main as $key => $item) {
            $frequencys = explode(",", $item->frequency);
            $frequency[0][$key] = null;
            $frequency[1][$key] = null;
            $frequency[2][$key] = null;
            $frequency[3][$key] = null;
            $frequency[4][$key] = null;
            $frequency[5][$key] = null;
            $frequency[6][$key] = null;
            foreach ($frequencys as $index => $out_frequency) {
                if ($out_frequency == 'ก่อนเริ่มงานแต่ละกะ') {
                    $frequency[0][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนผลิตภัณฑ์') {
                    $frequency[1][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนขนาดของผลิตภัณฑ์') {
                    $frequency[2][$key] = 'checked';
                }
                if ($out_frequency == 'หลังจากเปลี่ยนไลน์การผลิตหยุดมากกว่า 60 นาที') {
                    $frequency[3][$key] = 'checked';
                }
                if ($out_frequency == 'มีการซ่อมแซมหรือแก้ไขเครื่องอ่านบาร์โค้ด') {
                    $frequency[4][$key] = 'checked';
                }
                if ($out_frequency == 'ทุกๆการผลิตต่อเนื่อง 8 ชั่วโมง') {
                    $frequency[5][$key] = 'checked';
                }
                if ($out_frequency == 'ทุกวันหลังสิ้นสุดการผลิต') {
                    $frequency[6][$key] = 'checked';
                }
            }
        }

        return view('D-Reccord/report/print/FM-PD-004', compact('head', 'FM_PD_004_main', 'production_order', 'frequency'));
 
        // $pdf = PDF::loadView('D-Reccord.report.print.FM-PD-004', ['head' => $head, 'FM_PD_004_main' => $FM_PD_004_main, 'frequency' => $frequency, 'production_order' => $production_order]);
        // $pdf->setPaper('a4', 'landscape');
        // // return view('D-Reccord.report.print.FM-PD-004', ['head' => $head, 'FM_PD_004_main' => $FM_PD_004_main, 'frequency' => $frequency, 'production_order' => $production_order]);
        // return @$pdf->stream();
    }
}

<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_002_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class FM_PD_002_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_002_main = FM_PD_002_main::select('FM_PD_002_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_002_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_002_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        $frequency = array();
        foreach ($FM_PD_002_main as $key => $item) {
            $frequencys = explode(",", $item->Frequency);
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
                if ($out_frequency == 'หลังจากที่ไลน์การผลิตหยุด 60 นาที') {
                    $frequency[3][$key] = 'checked';
                }
                if ($out_frequency == 'มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray') {
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

        return view('D-Reccord.report.FM-PD-002', compact('head', 'FM_PD_002_main', 'production_order', 'frequency'));
    }

    public function update(Request $req, $production_order)
    {
        foreach ($req->ID as $key => $id) {

            DB::table('FM_PD_002_main')->where(['production_order' => $production_order, 'id' => $id])
                ->update([
                    'Frequency' => isset($req->Frequency[$key]) ? implode(',', $req->Frequency[$key]) : null,

                    'Stainless_Result_1' => isset($req->Stainless_Result_1[$key]) ? $req->Stainless_Result_1[$key] : null,
                    'Stainless_Result_2' => isset($req->Stainless_Result_2[$key]) ? $req->Stainless_Result_2[$key] : null,
                    'Stainless_Result_3' => isset($req->Stainless_Result_3[$key]) ? $req->Stainless_Result_3[$key] : null,
                    'Stainless_Note' =>     isset($req->Stainless_Note[$key]) ? $req->Stainless_Note[$key] : null,

                    'Metal_Result_1' => isset($req->Metal_Result_1[$key]) ? $req->Metal_Result_1[$key] : null,
                    'Metal_Result_2' => isset($req->Metal_Result_2[$key]) ? $req->Metal_Result_2[$key] : null,
                    'Metal_Result_3' => isset($req->Metal_Result_3[$key]) ? $req->Metal_Result_3[$key] : null,
                    'Metal_Note' => isset($req->Metal_Note[$key]) ? $req->Metal_Note[$key] : null,
                ]);
        }

        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_002_main = FM_PD_002_main::select('FM_PD_002_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_002_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_002_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        $frequency = array();
        foreach ($FM_PD_002_main as $key => $item) {
            $frequencys = explode(",", $item->Frequency);
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
                if ($out_frequency == 'หลังจากที่ไลน์การผลิตหยุด 60 นาที') {
                    $frequency[3][$key] = 'checked';
                }
                if ($out_frequency == 'มีการซ่อมแซมหรือแก้ไขเครื่อง X-Ray') {
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
        $pdf = PDF::loadView('D-Reccord.report.print.FM-PD-002', ['head' => $head, 'FM_PD_002_main' => $FM_PD_002_main, 'frequency' => $frequency, 'production_order' => $production_order]);
        $pdf->setPaper('a4', 'landscape');
        // return view('D-Reccord.report.print.FM-PD-002', ['head' => $head, 'FM_PD_002_main' => $FM_PD_002_main, 'frequency' => $frequency, 'production_order' => $production_order]);
        return @$pdf->stream();
    }
}

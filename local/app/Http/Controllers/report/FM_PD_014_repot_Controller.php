<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_014_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_014_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_014 = FM_PD_014_main::select('FM_PD_014_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_014_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_014_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        $frequency = null;
        foreach ($FM_PD_014 as $key => $item) {
            $frequencys = explode(",", $item->frequency);
            $frequency[0][$key] = null;
            $frequency[1][$key] = null;
            $frequency[2][$key] = null;
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
            }
        }

        return view('D-Reccord.report.FM-PD-014', compact('head', 'FM_PD_014', 'production_order', 'frequency'));
    }

    public function update(Request $req, $production_order)
    {
        // return $req->frequency;
        foreach ($req->txtID as $i => $id) {
            $FM_PD_014 = FM_PD_014_main::where(['id' => $id, 'production_order' => $production_order])->first();

            if ($req->hasFile("unit_carton")) {
                // dd($req->unit_carton);
                if (isset($req->unit_carton[$i])) {
                    $unit_carton = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->unit_carton[$i]->getClientOriginalExtension();
                    $req->unit_carton[$i]->move('assets/FM-PD-014', $unit_carton);
                    $FM_PD_014->unit_carton = $unit_carton;
                }
            }
            // return $req->frequency[$i];
            $FM_PD_014->frequency = isset($req->frequency[$i]) ? implode(',', $req->frequency[$i]) : null;
            // $FM_PD_014->frequency = implode(',', $req->frequency[$i]);
            $FM_PD_014->Result_1 = isset($req->Result_1[$i]) ? $req->Result_1[$i] : null;
            $FM_PD_014->Result_2 = isset($req->Result_2[$i]) ? $req->Result_2[$i] : null;
            $FM_PD_014->Result_3 = isset($req->Result_3[$i]) ? $req->Result_3[$i] : null;
            $FM_PD_014->note = $req->note[$i];

            $FM_PD_014->save();
        }

        // return redirect()->back();
        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_014 = FM_PD_014_main::select('FM_PD_014_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_014_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_014_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        $frequency = null;
        foreach ($FM_PD_014 as $key => $item) {
            $frequencys = explode(",", $item->frequency);
            $frequency[0][$key] = null;
            $frequency[1][$key] = null;
            $frequency[2][$key] = null;
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
            }
        }

        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-014',
            ['head' => $head, 'FM_PD_014' => $FM_PD_014, 'frequency' => $frequency, 'production_order' => $production_order]
        );
        $pdf->setPaper('a4', 'landscape');
        // return view('D-Reccord.report.print.FM-PD-014', ['head' => $head, 'FM_PD_014' => $FM_PD_014, 'frequency' => $frequency, 'production_order' => $production_order]);
        return @$pdf->stream();
    }
}

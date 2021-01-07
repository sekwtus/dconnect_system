<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_044_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_044_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_044 = FM_PD_044_main::select('FM_PD_044_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_044_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_044_main.id_sign_operator')
            ->where('production_order', $production_order)->get();


        $frequency[][] = null;

        foreach ($FM_PD_044 as $key => $item) {
            $frequencys = explode(",", $item->frequency);
            $frequency[0][$key] = null;
            $frequency[1][$key] = null;
            $frequency[2][$key] = null;
            foreach ($frequencys as $index => $out_frequency) {
                if ($out_frequency == 'ก่อนเริ่มงานแต่ละกะ') {
                    $frequency[0][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์') {
                    $frequency[1][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนขนาดของผลิตภัณฑ์') {
                    $frequency[2][$key] = 'checked';
                }
            }
        }

        // return $FM_PD_044;
        return view('D-Reccord.report.FM-PD-044', compact('head', 'FM_PD_044', 'production_order', 'frequency'));
    }

    public function store(Request $request, $id)
    {
        $filename = "";
        if ($request->hasFile('Barcode_No')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('Barcode_No')->getClientOriginalExtension();
            $request->file('Barcode_No')->move('assets/FM-PD-044', $filename);
        }

        $FM_PD_044_main = new FM_PD_044_main;
        $FM_PD_044_main->Barcode_No = $filename;
        $FM_PD_044_main->Frequency = $request->Frequency;

        $FM_PD_044_main->Time = now();

        $FM_PD_044_main->Wrong_Barcode_Result_1 = $request->Wrong_Barcode_Result_1;
        $FM_PD_044_main->Wrong_Barcode_Result_2 = $request->Wrong_Barcode_Result_2;
        $FM_PD_044_main->Wrong_Barcode_Result_3 = $request->Wrong_Barcode_Result_3;
        $FM_PD_044_main->Wrong_Barcode_Note = $request->Wrong_Barcode_Note;

        $FM_PD_044_main->Wrong_Barcode_Operator = $request->Wrong_Barcode_Operator;
        $FM_PD_044_main->Wrong_Barcode_Leader = $request->Wrong_Barcode_Leader;
        $FM_PD_044_main->No_Barcode_Operator = $request->No_Barcode_Operator;
        $FM_PD_044_main->No_Barcode_Leader = $request->No_Barcode_Leader;

        $FM_PD_044_main->No_Barcode_Result_1 = $request->No_Barcode_Result_1;
        $FM_PD_044_main->No_Barcode_Result_2 = $request->No_Barcode_Result_2;
        $FM_PD_044_main->No_Barcode_Result_3 = $request->No_Barcode_Result_3;
        $FM_PD_044_main->No_Barcode_Note = $request->No_Barcode_Note;

        $FM_PD_044_main->production_order = $request->production_order;

        $FM_PD_044_main->save();

        return redirect('/printer_monitor/' . $id);
    }

    public function update(Request $req, $production_order)
    {

        foreach ($req->txtID as $i => $id) {
            // return $req;
            $FM_PD_044 = FM_PD_044_main::where(['id' => $id, 'production_order' => $production_order])->first();

            if ($req->hasFile("Barcode_No")) {
                // dd($req->unit_carton);
                if (isset($req->Barcode_No[$i])) {
                    $barcode_no = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->Barcode_No[$i]->getClientOriginalExtension();
                    $req->Barcode_No[$i]->move('assets/FM-PD-044', $barcode_no);
                    $FM_PD_044->Barcode_No = $barcode_no;
                }
            }
            $FM_PD_044->frequency = isset($req->frequency[$i]) ? implode(',', $req->frequency[$i]) : null;
            $FM_PD_044->Wrong_Barcode_Result_1 = isset($req->Wrong_Barcode_Result_1[$i]) ? $req->Wrong_Barcode_Result_1[$i] : null;
            $FM_PD_044->Wrong_Barcode_Result_2 = isset($req->Wrong_Barcode_Result_2[$i]) ? $req->Wrong_Barcode_Result_2[$i] : null;
            $FM_PD_044->Wrong_Barcode_Result_3 = isset($req->Wrong_Barcode_Result_3[$i]) ? $req->Wrong_Barcode_Result_3[$i] : null;
            $FM_PD_044->No_Barcode_Result_1 = isset($req->No_Barcode_Result_1[$i]) ? $req->No_Barcode_Result_1[$i] : null;
            $FM_PD_044->No_Barcode_Result_2 = isset($req->No_Barcode_Result_2[$i]) ? $req->No_Barcode_Result_2[$i] : null;
            $FM_PD_044->No_Barcode_Result_3 = isset($req->No_Barcode_Result_3[$i]) ? $req->No_Barcode_Result_3[$i] : null;
            $FM_PD_044->Wrong_Barcode_Note = $req->Wrong_Barcode_Note[$i];
            $FM_PD_044->No_Barcode_Note = $req->No_Barcode_Note[$i];

            $FM_PD_044->save();
        }

        // return redirect()->back();

        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_044 = FM_PD_044_main::select('FM_PD_044_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_044_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_044_main.id_sign_operator')
            ->where('production_order', $production_order)->get();


        $frequency[][] = null;

        foreach ($FM_PD_044 as $key => $item) {
            $frequencys = explode(",", $item->frequency);
            $frequency[0][$key] = null;
            $frequency[1][$key] = null;
            $frequency[2][$key] = null;
            foreach ($frequencys as $index => $out_frequency) {
                if ($out_frequency == 'ก่อนเริ่มงานแต่ละกะ') {
                    $frequency[0][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนผลิตภัณฑ์หรือเปลี่ยนออเดอร์') {
                    $frequency[1][$key] = 'checked';
                }
                if ($out_frequency == 'เปลี่ยนขนาดของผลิตภัณฑ์') {
                    $frequency[2][$key] = 'checked';
                }
            }
        }

        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-044',
            ['head' => $head, 'production_order' => $production_order, 'FM_PD_044' => $FM_PD_044, 'frequency' => $frequency]
        );
        $pdf->setPaper('a4', 'landscape');
        return @$pdf->stream();
    }
}

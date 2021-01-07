<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_131_main;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_131_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        // $FM_PD_131 = FM_PD_131_main::where('production_order', $production_order)->get();
        $FM_PD_131 = FM_PD_131_main::select('FM_PD_131_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_131_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_131_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        return view('D-Reccord.report.FM-PD-131', compact('head', 'production_order', 'FM_PD_131'));
    }

    public function update(Request $req, $production_order)
    {
        // return $req;
        foreach ($req->txtID as $i => $id) {
            $FM_PD_131 = FM_PD_131_main::where(['id' => $id, 'production_order' => $production_order])->first();

            $FM_PD_131->Frequency = isset($req->frequency[$i]) ? implode(',', $req->frequency[$i]) : null;
            $FM_PD_131->Result_1 = isset($req->Result_1[$i]) ? $req->Result_1[$i] : null;
            $FM_PD_131->Result_2 = isset($req->Result_2[$i]) ? $req->Result_2[$i] : null;
            $FM_PD_131->Result_3 = isset($req->Result_3[$i]) ? $req->Result_3[$i] : null;
            $FM_PD_131->note = $req->note[$i];

            $FM_PD_131->save();
        }

        // return redirect()->back();
        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_131 = FM_PD_131_main::select('FM_PD_131_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_131_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_131_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        // return view('D-Reccord.report.FM-PD-131', compact('head', 'production_order', 'FM_PD_131'));

        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-131',
            ['head' => $head, 'production_order' => $production_order, 'FM_PD_131' => $FM_PD_131]
        );
        $pdf->setPaper('a4', 'landscape');
        return @$pdf->stream();
    }
}

<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_130_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_130_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_130_main = FM_PD_130_main::select('FM_PD_130_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_130_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_130_main.id_sign_operator')
            ->where('production_order', $production_order)->get();


        $scoop = DB::select("SELECT
            SAP_ProductionOrders_Component.item,
            SAP_master_scoop.item_scoop,
            SAP_master_scoop.name_scoop 
            FROM
                SAP_ProductionOrders_Header
                LEFT JOIN SAP_ProductionOrders_Component ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Component.production_order
                INNER JOIN SAP_master_scoop ON SAP_ProductionOrders_Component.item = SAP_master_scoop.item_scoop 
            WHERE
            SAP_ProductionOrders_Header.production_order = '$production_order'
        ");

        $scoop_number = (empty($scoop) ? '' : $scoop[0]->item_scoop);

        return view('D-Reccord.report.FM-PD-130', compact('head', 'production_order', 'FM_PD_130_main', 'scoop_number'));
    }

    public function update(Request $req, $production_order)
    {
        foreach ($req->ID as $key => $id) {

            $FM_PD_130 = FM_PD_130_main::where(['id' => $id, 'production_order' => $production_order])->first();

            if ($req->hasFile("Pic_1")) {
                if (isset($req->Pic_1[$key])) {
                    $Pic_1 = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->Pic_1[$key]->getClientOriginalExtension();
                    $req->Pic_1[$key]->move('assets/FM-PD-130', $Pic_1);
                    $FM_PD_130->Pic_1 = $Pic_1;
                }
            }

            $FM_PD_130->Spoon = isset($req->Spoon[$key]) ? $req->Spoon[$key] : null;
            $FM_PD_130->Problem = isset($req->Problem[$key]) ? $req->Problem[$key] : null;
            $FM_PD_130->Solution = isset($req->Solution[$key]) ? $req->Solution[$key] : null;

            $FM_PD_130->save();
        }

        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_130_main = FM_PD_130_main::select('FM_PD_130_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_130_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_130_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        $scoop = DB::select("SELECT
            SAP_ProductionOrders_Component.item,
            SAP_master_scoop.item_scoop,
            SAP_master_scoop.name_scoop 
            FROM
                SAP_ProductionOrders_Header
                LEFT JOIN SAP_ProductionOrders_Component ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Component.production_order
                INNER JOIN SAP_master_scoop ON SAP_ProductionOrders_Component.item = SAP_master_scoop.item_scoop 
            WHERE
            SAP_ProductionOrders_Header.production_order = '$production_order'
        ");

        $scoop_number = (empty($scoop) ? '' : $scoop[0]->item_scoop);

        // return view('D-Reccord.report.print.FM-PD-130', compact('head', 'production_order', 'FM_PD_130_main', 'scoop_number'));

        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-130',
            ['head' => $head, 'production_order' => $production_order, 'FM_PD_130_main' => $FM_PD_130_main, 'scoop_number' => $scoop_number]
        );
        $pdf->setPaper('a4', 'landscape');
        return @$pdf->stream();
    }
}

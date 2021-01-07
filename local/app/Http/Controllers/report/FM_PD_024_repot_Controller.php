<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_024_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_024_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $pm_code_unit_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_unit_carton.sap_code',
                'SAP_master_unit_carton.description'
            )
            ->join('SAP_master_unit_carton', 'SAP_master_unit_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        $pm_code_shipper_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_shipper_carton.sap_code',
                'SAP_master_shipper_carton.description'
            )
            ->join('SAP_master_shipper_carton', 'SAP_master_shipper_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        // pm code ช้อน
        $pm_code_scoop = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_scoop.item_scoop',
                'SAP_master_scoop.name_scoop'
            )
            ->join('SAP_master_scoop', 'SAP_master_scoop.item_scoop', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        $FM_PD_024_Default = FM_PD_024_main::select('FM_PD_024_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_024_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_024_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        return view('D-Reccord.report.FM-PD-024', compact('head', 'production_order', 'FM_PD_024_Default', 'pm_code_unit_carton', 'pm_code_shipper_carton', 'pm_code_scoop'));
    }

    public function update(Request $req, $production_order)
    {

        // return $req;
        foreach ($req->ID as $key => $id) {
            $FM_PD_024_main = FM_PD_024_main::where(['id' => $id, 'production_order' => $production_order])->first();
            if ($req->hasFile('Detail_Unit_Carton')) {
                if (!empty($req->Detail_Unit_Carton[$key])) {
                    $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->Detail_Unit_Carton[$key]->getClientOriginalExtension();
                    $req->Detail_Unit_Carton[$key]->move('assets/FM-PD-024', $filename);
                    $FM_PD_024_main->Detail_Unit_Carton = $filename;
                }
            }
            $FM_PD_024_main->pm_code_unit_carton = isset($req->pm_code_unit_carton[$key]) ? $req->pm_code_unit_carton[$key] : null;
            $FM_PD_024_main->pm_code_shipper_carton = isset($req->pm_code_shipper_carton[$key]) ? $req->pm_code_shipper_carton[$key] : null;
            $FM_PD_024_main->pm_code_scoop = isset($req->pm_code_scoop[$key]) ? $req->pm_code_scoop[$key] : null;
            $FM_PD_024_main->spoon_size = isset($req->spoon_size[$key]) ? $req->spoon_size[$key] : null;
            // $FM_PD_024_main->sign_leader = isset($req->txt_sign_operator) ? $req->txt_sign_operator : null;
            $FM_PD_024_main->save();
        }

        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $pm_code_unit_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_unit_carton.sap_code',
                'SAP_master_unit_carton.description'
            )
            ->join('SAP_master_unit_carton', 'SAP_master_unit_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        $pm_code_shipper_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_shipper_carton.sap_code',
                'SAP_master_shipper_carton.description'
            )
            ->join('SAP_master_shipper_carton', 'SAP_master_shipper_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        // pm code ช้อน
        $pm_code_scoop = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_scoop.item_scoop',
                'SAP_master_scoop.name_scoop'
            )
            ->join('SAP_master_scoop', 'SAP_master_scoop.item_scoop', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        $FM_PD_024_Default = FM_PD_024_main::select('FM_PD_024_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_024_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_024_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        // return view('D-Reccord.report.print.FM-PD-024', compact('head', 'production_order', 'FM_PD_024_Default', 'pm_code_unit_carton', 'pm_code_shipper_carton', 'pm_code_scoop'));
        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-024',
            ['head' => $head, 'production_order' => $production_order, 'FM_PD_024_Default' => $FM_PD_024_Default, 'pm_code_unit_carton' => $pm_code_unit_carton, 'pm_code_shipper_carton' => $pm_code_shipper_carton, 'pm_code_scoop' => $pm_code_scoop]
        );
        $pdf->setPaper('a4', 'landscape');
        return @$pdf->stream();
    }
}

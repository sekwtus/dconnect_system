<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FM_PD_034_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_034_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);
        // pm code unit_carton
        $pm_code = DB::table('SAP_ProductionOrders_Component')
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

        $FM_PD_034 = FM_PD_034_main::select('FM_PD_034_main.*', 'users.name as leader_name')
            ->leftJoin('users', 'users.id', '=', 'FM_PD_034_main.id_sign_operator')
            ->where('production_order', $production_order)->first();

        return view('D-Reccord.report.FM-PD-034', compact('head', 'FM_PD_034', 'pm_code', 'production_order'));
    }

    public function update(Request $request, $production_order)
    {
        $FM_PD_034_main = FM_PD_034_main::where('production_order', $production_order)->first();
        // return ($request);

        $FM_PD_034_main->production_order = $production_order;
        $FM_PD_034_main->Unit_Box = $request->Unit_Box;
        $FM_PD_034_main->Batch_No = $request->Batch_No;
        $FM_PD_034_main->PM_Code = $request->PM_Code;

        if ($request->hasFile('Pic_1')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('Pic_1')->getClientOriginalExtension();
            $request->file('Pic_1')->move('assets/FM-PD-034', $filename);
            $FM_PD_034_main->Pic_1 = $filename;
        }

        $FM_PD_034_main->save();

        // return redirect()->back();
        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $pm_code = DB::table('SAP_ProductionOrders_Component')
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

        $FM_PD_034 = FM_PD_034_main::select('FM_PD_034_main.*', 'users.name as leader_name')
            ->leftJoin('users', 'users.id', '=', 'FM_PD_034_main.id_sign_operator')
            ->where('production_order', $production_order)->first();

        // return view('D-Reccord.report.print.FM-PD-034', compact('head', 'FM_PD_034', 'pm_code', 'production_order'));
        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-034',
            ['head' => $head, 'production_order' => $production_order, 'FM_PD_034' => $FM_PD_034, 'pm_code' => $pm_code]
        );
        $pdf->setPaper('a4', 'landscape');
        return @$pdf->stream();
    }
}

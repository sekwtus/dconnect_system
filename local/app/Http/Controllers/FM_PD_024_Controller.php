<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_024_main;
use Illuminate\Support\Str;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_024_Controller extends Controller
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
            ->join('SAP_master_unit_carton', 'SAP_master_unit_carton.sap_code','=','SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order'=>$production_order])
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
            ->join('SAP_master_shipper_carton', 'SAP_master_shipper_carton.sap_code','=','SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order'=>$production_order])
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
            ->join('SAP_master_scoop', 'SAP_master_scoop.item_scoop','=','SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order'=>$production_order])
        ->first();

        // $FM_PD_024_Default = FM_PD_024_main::where('production_order', $production_order)->first();

        return view('D-Reccord.FM-PD-024', compact('head','production_order','pm_code_unit_carton','pm_code_shipper_carton', 
        'pm_code_scoop'));
    }

    public function store(Request $request, $production_order)
    {

        $filename2 = "";
        if ($request->hasFile('Detail_Unit_Carton')){
            $filename2 = Carbon::now()->toDateString() .'_' . Str::random() . '.' . $request->file('Detail_Unit_Carton')->getClientOriginalExtension();
            $request->file('Detail_Unit_Carton')->move('assets/FM-PD-024', $filename2);
        }

        $FM_PD_024_main = new FM_PD_024_main;
        $FM_PD_024_main->production_order = $production_order;
        // $FM_PD_024_main->Detail_PM = $filename;
        $FM_PD_024_main->Detail_Unit_Carton = $filename2;

        // เมื่อ operator ยืนยันลายเซ็นแล้ว
        $FM_PD_024_main->sign_operator = $request->txt_sign_operator;

        $FM_PD_024_main->spoon_size = $request->spoon_size;
        $FM_PD_024_main->pm_code_unit_carton = $request->pm_code_unit_carton;
        $FM_PD_024_main->pm_code_shipper_carton = $request->pm_code_shipper_carton;
        $FM_PD_024_main->pm_code_scoop = $request->pm_code_scoop;
        $FM_PD_024_main->id_sign_operator = Auth::user()->id;

        $FM_PD_024_main->save();

        return Redirect::to('printer_monitor/'.$production_order)->with('save-success','บันทึกข้อมูลสำเร็จ');
    }
}

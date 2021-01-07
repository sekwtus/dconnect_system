<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\FM_PD_018_3;
use App\SAP_ProductionOrders_Header;
use DB;
use Auth;

class FM_PD_018_3_Controller extends Controller
{
    public function index($sheet,$production_order)
    {
        $head = $this->sap_header($production_order);

        // $FM_PD_018_3 = FM_PD_018_3::where('production_order', $production_order)->first();
        
        $FM_PD_018_3 = FM_PD_018_3::select('FM_PD_018_3.*', 'users.name as operator_name')
        ->leftJoin('users', 'users.id', '=', 'FM_PD_018_3.id_sign_operator')
        ->where(['production_order'=>$production_order , 'order' => $sheet ])->first();

        $FM_PD_018_3 = $sheet == 0 ? [] : $FM_PD_018_3;

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

        // pm code unit_carton
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
        // dd($pm_code_unit_carton);

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

        // return $FM_PD_018_3;
        return view(
            'D-Reccord.FM-PD-018.FM-PD-018-3', 
            compact(
                'head', 'FM_PD_018_3',
                'pm_code_unit_carton', 
                'pm_code_scoop',
                'pm_code_shipper_carton',
                'production_order','scoop_number',
                'sheet'
            )
        );
    }

    public function store(Request $request,$sheet, $id)
    {
        $order = new FM_PD_018_3;
        $order = $order->select('order')->where('production_order', $id)->latest()->first();
        if ($sheet == 0) {
            if (empty($order)) {
                $order = 1;
            } else {
                $order = $order->order + 1;
            }
        }
        else{
            $order = $sheet;
        }


        $file_material_no = "";
        if ($request->hasFile('material_no')) {
            $file_material_no = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('material_no')->getClientOriginalExtension();
            $request->file('material_no')->move('assets/FM-PD-018', $file_material_no);
        }

        $file_spoon = "";
        if ($request->hasFile('spoon_file')) {
            $file_spoon = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('spoon_file')->getClientOriginalExtension();
            $request->file('spoon_file')->move('assets/FM-PD-018', $file_spoon);
        }

        $fm_pd_018_3 = [
            'production_order' => $request->production_order,
            'pm_code_unit_carton' => $request->pm_code_unit_carton,
            'no_milk_left_in' => $request->no_milk_left_in,
            'spoon_type' => $request->spoon_type,
            'spoon_size' => $request->spoon_size,
            'pm_code_scoop' => $request->pm_code_scoop,
            'clear_unit_special_box' => $request->clear_unit_special_box,
            'pm_code_shipper_carton' => $request->pm_code_shipper_carton,
            'material_code' => $request->material_code,
            'product_hierarehy' => $request->product_hierarehy,
            'time_shipper_carton' => $request->time_shipper_carton,
            'batch_no' => $request->batch_no,
            'exp' => $request->exp,
            'product_line' => $request->product_line,
            'bbd' => $request->bbd,
            'glue' => $request->glue,
            
            'sign_operator' => $request->txt_sign_operator,
            'id_sign_operator' => Auth::user()->id, 
            'order' => $order

        ];

        // create or update file
        if($file_material_no != '') {
            $fm_pd_018_3['material_no'] = $file_material_no; 
        }

        if($file_spoon != '') {
            $fm_pd_018_3['spoon_file'] = $file_spoon; 
        } 

        $fm_pd_018_3_update = FM_PD_018_3::updateOrCreate(['production_order' => $request->production_order , 'order' => $order], $fm_pd_018_3);

        return redirect('/printer_monitor/' . $id)->with('save-success','บันทึกข้อมูลสำเร็จ');
        // return redirect()->back();
    }
}

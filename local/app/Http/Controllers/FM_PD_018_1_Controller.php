<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_018_1;
use App\SAP_ProductionOrders_Header;
use App\SAP_MaterialMaster_Description;
use App\users;

class FM_PD_018_1_Controller extends Controller
{
    public function index($sheet,$production_order)
    {  
        $FM_PD_018_1 = SAP_ProductionOrders_Header::select('SAP_MaterialMaster_Description.material_description', 'SAP_ProductionOrders_Header.batch', 'SAP_ProductionOrders_Header.production_order')
            ->join('SAP_MaterialMaster_Description', 'SAP_ProductionOrders_Header.material_number', '=', 'SAP_MaterialMaster_Description.material_code')
            ->where('SAP_ProductionOrders_Header.production_order', $production_order)
            ->where('SAP_MaterialMaster_Description.language_key', 'EN')
            ->get();

        // $FM_PD_018_1_Default = FM_PD_018_1::where('production_order', $production_order)->first();

        $FM_PD_018_1_Default = FM_PD_018_1::select('FM_PD_018_1.*', 'remove_bag.name as remove_bag_name', 'poue_milk.name as poue_milk_name')
        ->leftJoin('users as remove_bag', 'remove_bag.id', '=', 'FM_PD_018_1.id_user_remove_bag')
        ->leftJoin('users as poue_milk', 'poue_milk.id', '=', 'FM_PD_018_1.id_user_poue_milk')
        ->where(['production_order'=>$production_order , 'order' => $sheet ])->first();

        $FM_PD_018_1_Default = $sheet == 0 ? [] : $FM_PD_018_1_Default;

        return view('D-Reccord.FM-PD-018.FM-PD-018-1', compact('FM_PD_018_1', 'FM_PD_018_1_Default', 'production_order','sheet'));
    }

    public function store(Request $request,$sheet, $production_order)
    { 
        $order = new FM_PD_018_1;
        $order = $order->select('order')->where('production_order', $production_order)->latest()->first();
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

        $id_remove_bag = users::where(['sign_photo' => $request->txt_sign_operator])->whereNotNull('sign_photo')->first();
        $id_poue_milk = users::where('sign_photo',$request->txt_sign_operator1)->whereNotNull('sign_photo')->first();
        
        $FM_PD_018_1 = FM_PD_018_1::updateOrCreate(
            ['production_order' => $production_order , 'order' => $order],
            ['production_order' => $production_order,
            'order' => $order,
            'type_milk1' => $request->type_milk1,
            'type_milk2' => $request->type_milk2,
            'type_milk3' => $request->type_milk3,
            'type_milk4' => $request->type_milk4,
            'clear_milk' => $request->clear_milk,
            'rm_code1' => $request->rm_code1,
            'rm_code2' => $request->rm_code2,
            'rm_code3' => $request->rm_code3,
            'rm_code4' => $request->rm_code4,
            'no_fiber1' => $request->no_fiber1,
            'no_fiber2' => $request->no_fiber2,
            'no_fiber3' => $request->no_fiber3,
            'no_fiber4' => $request->no_fiber4,
            'save_by_remove_bag' => $request->txt_sign_operator,
            'blender' => $request->blender,
            'filling1' => $request->filling1,
            'filling2' => $request->filling2,
            'filling3' => $request->filling3,
            'filling4' => $request->filling4,
            'filling5' => $request->filling5,
            'filling6' => $request->filling6,
            'no_formula'=> $request->no_formula,
            'save_by_poue_milk' => $request->txt_sign_operator1,
            'id_user_remove_bag' => isset($id_remove_bag->id) ? $id_remove_bag->id : null,
            'id_user_poue_milk' => isset($id_poue_milk->id)  ? $id_poue_milk->id : null ,
            ]
        );

        // return $FM_PD_018_1;
        // return redirect()->back();
        return redirect('/printer_monitor/'.$production_order)->with('save-success', 'บันทึกข้อมูลสำเร็จ');
    }

}

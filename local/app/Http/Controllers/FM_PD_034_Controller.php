<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_034_main;
use Illuminate\Support\Str;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_034_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_034 = FM_PD_034_main::select('FM_PD_034_main.*','users.name as leader_name')
            ->leftJoin('users', 'users.id', '=', 'FM_PD_034_main.id_sign_operator')
            ->where('production_order', $production_order)->first();

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
            ->join('SAP_master_unit_carton', 'SAP_master_unit_carton.sap_code','=','SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order'=>$production_order])
        ->first();


        return view('D-Reccord.FM-PD-034', compact('head','FM_PD_034','pm_code','production_order'));
    }

    public function store(Request $request, $id)
    {
        $filename = "";
        if ($request->hasFile('Pic_1')){
            $filename = Carbon::now()->toDateString() .'_' . Str::random() . '.' . $request->file('Pic_1')->getClientOriginalExtension();
            $request->file('Pic_1')->move('assets/FM-PD-034', $filename);
        }

        // $filename_2 = "";
        // if ($request->hasFile('Pic_2')){
        //     $filename_2 = Carbon::now()->toDateString() .'_' . Str::random() . '.' . $request->file('Pic_2')->getClientOriginalExtension();
        //     $request->file('Pic_2')->move('assets/FM-PD-034', $filename_2);
        // }

        $FM_PD_034_main = new FM_PD_034_main;
        $FM_PD_034_main->Unit_Box = $request->Unit_Box;
        $FM_PD_034_main->Batch_No = $request->Batch_No;
        $FM_PD_034_main->PM_Code = $request->PM_Code;
        $FM_PD_034_main->Pic_1 = $filename;
        // $FM_PD_034_main->Pic_2 = $filename_2;
        $FM_PD_034_main->production_order = $id;

        // เมื่อ operator ยืนยันลายเซ็นแล้ว
        $FM_PD_034_main->sign_operator = $request->txt_sign_operator;
        $FM_PD_034_main->id_sign_operator = Auth::user()->id;
        
        $FM_PD_034_main->save();

        return Redirect::to('printer_monitor/'.$id)->with('save-success','บันทึกข้อมูลสำเร็จ');
    }
}

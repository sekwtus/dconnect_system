<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_130_main;
use Illuminate\Support\Str;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_130_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

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
        // return $FM_PD_130_Default;

        //ไม่มีdefualt หน้าinput สำหรับเอกสารชุดนี้
        $FM_PD_130 = '';

        return view('D-Reccord.FM-PD-130', compact('head','production_order','FM_PD_130','scoop_number'));
    }

    public function store(Request $request,$id)
    {

        $order = new FM_PD_130_main;
        $order = $order->select('order')->where('production_order', $id)->latest()->first();
        if (empty($order)) {
            $order = 1;
        } else {
            $order = $order->order + 1;
        }

        $filename_1 = "";
        if ($request->hasFile('Pic_1')){
            $filename_1 = Carbon::now()->toDateString() .'_' . Str::random() . '.' . $request->file('Pic_1')->getClientOriginalExtension();
            $request->file('Pic_1')->move('assets/FM-PD-130', $filename_1);
        }

        $FM_PD_130_main = new FM_PD_130_main;
        $FM_PD_130_main->Pic_1 = $filename_1;

        $FM_PD_130_main->Problem = $request->Problem;
        $FM_PD_130_main->Solution = $request->Solution;
        $FM_PD_130_main->Spoon = $request->Spoon;

        // เมื่อ operator ยืนยันลายเซ็นแล้ว
        $FM_PD_130_main->sign_operator = $request->txt_sign_operator;

        $FM_PD_130_main->Date = $request->Date;
        $FM_PD_130_main->Time = $request->Time;

        $FM_PD_130_main->production_order = $id;
        $FM_PD_130_main->order = $order;

        $FM_PD_130_main->id_sign_operator = Auth::user()->id;


        $FM_PD_130_main->save();

        return Redirect::to('printer_monitor/'.$id)->with('save-success','บันทึกข้อมูลสำเร็จ');
    }
}

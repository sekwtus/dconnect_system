<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FM_PD_018_1;
use App\FM_PD_132_main_log;
use App\FM_PD_044_main;
use App\FM_PD_037_main;
use App\FM_PD_018_2;
use App\FM_PD_002_main;
use App\FM_PD_018_3;
use App\FM_PD_034_main;
use App\FM_PD_131_main;
use App\FM_PD_130_main;
use App\FM_PD_024_main;
use App\FM_PD_014_main;

class product_line_monitor extends Controller
{
    function printer($order){
    $order_detail = DB::select("SELECT
        SAP_ProductionOrders_Header.*,
        SAP_ProductionOrders_Operation.resource,
        SAP_ProductionOrders_Operation.operation_number,
        SAP_MaterialMaster_Description.material_description,
        type_line.line_number
    FROM
        SAP_ProductionOrders_Header
        LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
        LEFT JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
        LEFT JOIN type_line ON SAP_ProductionOrders_Operation.resource = type_line.type_line
    WHERE SAP_ProductionOrders_Header.production_order = '$order'
    ORDER BY SAP_ProductionOrders_Header.createdon");

    $FM_PD_018_1 = DB::select("SELECT * FROM FM_PD_018_1 WHERE FM_PD_018_1.production_order = '$order' ORDER BY FM_PD_018_1.`id` DESC LIMIT 1 ");
    $FM_PD_132 = DB::select("SELECT FM_PD_132_main_log.production_order,FM_PD_132_main_log.`status` FROM FM_PD_132_main_log WHERE FM_PD_132_main_log.production_order = '$order'");
    $FM_PD_044 = DB::select("SELECT FM_PD_044_main.production_order,FM_PD_044_main.`status` FROM FM_PD_044_main WHERE FM_PD_044_main.production_order = '$order'");
    $FM_PD_037 = DB::select("SELECT FM_PD_037_main.production_order,FM_PD_037_main.`status` FROM FM_PD_037_main WHERE FM_PD_037_main.production_order = '$order'");
    $FM_PD_018_2 = DB::select("SELECT * FROM FM_PD_018_2 WHERE FM_PD_018_2.production_order = '$order' ORDER BY FM_PD_018_2.`id` DESC LIMIT 1 ");
    $FM_PD_002 = DB::select("SELECT FM_PD_002_main.production_order,FM_PD_002_main.`status` FROM FM_PD_002_main WHERE FM_PD_002_main.production_order = '$order'");
    $FM_PD_018_3 = DB::select("SELECT * FROM FM_PD_018_3 WHERE FM_PD_018_3.production_order = '$order' ORDER BY FM_PD_018_3.`id` DESC LIMIT 1 ");
    $FM_PD_034 = DB::select("SELECT FM_PD_034_main.production_order,FM_PD_034_main.`status` FROM FM_PD_034_main WHERE FM_PD_034_main.production_order = '$order'");
    $FM_PD_131 = DB::select("SELECT FM_PD_131_main.production_order,FM_PD_131_main.`status` FROM FM_PD_131_main WHERE FM_PD_131_main.production_order = '$order'");
    $FM_PD_130 = DB::select("SELECT FM_PD_130_main.production_order,FM_PD_130_main.`status` FROM FM_PD_130_main WHERE FM_PD_130_main.production_order = '$order'");
    $FM_PD_024 = DB::select("SELECT FM_PD_024_main.production_order,FM_PD_024_main.`status` FROM FM_PD_024_main WHERE FM_PD_024_main.production_order = '$order'");
    $FM_PD_014 = DB::select("SELECT FM_PD_014_main.production_order,FM_PD_014_main.`status` FROM FM_PD_014_main WHERE FM_PD_014_main.production_order = '$order'");
    $FM_PD_004 = DB::select("SELECT FM_PD_004_main.production_order,FM_PD_004_main.`status` FROM FM_PD_004_main WHERE FM_PD_004_main.production_order = '$order'");

    $PD037_check_end_foid = DB::select("SELECT  
            FM_PD_037_main.production_order,
            FM_PD_037_main.`status`,
            FM_PD_037_main.`order`,
            FM_PD_037_main.time_roll1,
            FM_PD_037_main.time_roll2,
            FM_PD_037_main.time_roll3
    FROM FM_PD_037_main WHERE FM_PD_037_main.production_order = '$order'
    ORDER BY FM_PD_037_main.`order` DESC LIMIT 1");

    $disabled_btn = 'disabled';
    $sheet_number = empty($PD037_check_end_foid[0]->order) ? '' : $PD037_check_end_foid[0]->order;
    $lastest_sheet_018_1 = empty($FM_PD_018_1[0]->order) ? '' : $FM_PD_018_1[0]->order;
    $lastest_sheet_018_2 = empty($FM_PD_018_2[0]->order_sheet) ? '' : $FM_PD_018_2[0]->order_sheet;
    $lastest_sheet_018_3 = empty($FM_PD_018_3[0]->order) ? '' : $FM_PD_018_3[0]->order;

    if ( empty($PD037_check_end_foid[0]->time_roll1)  || empty($PD037_check_end_foid[0]->time_roll2)  || empty($PD037_check_end_foid[0]->time_roll3) ) {
        $disabled_btn = 'false';
    }
    
        return view('printer.printer_status',compact('order','order_detail','FM_PD_018_1','FM_PD_132','FM_PD_044','FM_PD_037','FM_PD_018_2','FM_PD_002','FM_PD_018_3',
                                                    'FM_PD_034','FM_PD_131','FM_PD_130','FM_PD_024','FM_PD_014', 'FM_PD_004','disabled_btn','sheet_number',
                                                    'lastest_sheet_018_1','lastest_sheet_018_2','lastest_sheet_018_3'));
    }

    function FM_PD_018_1_status(Request $request ){

        $FM_PD_018_1 = FM_PD_018_1::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_018_1)){
            $FM_PD_018_1 = new FM_PD_018_1;
            $FM_PD_018_1->production_order = $request->production_order;
            $FM_PD_018_1->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_018_1 SET status = '1' WHERE FM_PD_018_1.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_018_1 SET status = '2' WHERE FM_PD_018_1.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_132_status(Request $request ){

        $FM_PD_132_main_log = FM_PD_132_main_log::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_132_main_log)){
            $FM_PD_132_main_log = new FM_PD_132_main_log;
            $FM_PD_132_main_log->production_order = $request->production_order;
            $FM_PD_132_main_log->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_132_main_log SET status = '1' WHERE FM_PD_132_main_log.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_132_main_log SET status = '2' WHERE FM_PD_132_main_log.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_044_status(Request $request ){

        $FM_PD_044_main = FM_PD_044_main::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_044_main)){
            $FM_PD_044_main = new FM_PD_044_main;
            $FM_PD_044_main->production_order = $request->production_order;
            $FM_PD_044_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_044_main SET status = '1' WHERE FM_PD_044_main.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_044_main SET status = '2' WHERE FM_PD_044_main.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_037_status(Request $request ){

        $FM_PD_037_main = FM_PD_037_main::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_037_main)){
            $FM_PD_037_main = new FM_PD_037_main;
            $FM_PD_037_main->production_order = $request->production_order;
            $FM_PD_037_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_037_main SET status = '1' WHERE FM_PD_037_main.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_037_main SET status = '2' WHERE FM_PD_037_main.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_018_2_status(Request $request ){

        $FM_PD_018_2 = FM_PD_018_2::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_018_2)){
            $FM_PD_018_2 = new FM_PD_018_2;
            $FM_PD_018_2->production_order = $request->production_order;
            $FM_PD_018_2->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_018_2 SET status = '1' WHERE FM_PD_018_2.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_018_2 SET status = '2' WHERE FM_PD_018_2.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_002_status(Request $request ){

        $FM_PD_002_main = FM_PD_002_main::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_002_main)){
            $FM_PD_002_main = new FM_PD_002_main;
            $FM_PD_002_main->production_order = $request->production_order;
            $FM_PD_002_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_002_main SET status = '1' WHERE FM_PD_002_main.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_002_main SET status = '2' WHERE FM_PD_002_main.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_018_3_status(Request $request ){

        $FM_PD_018_3 = FM_PD_018_3::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_018_3)){
            $FM_PD_018_3 = new FM_PD_018_3;
            $FM_PD_018_3->production_order = $request->production_order;
            $FM_PD_018_3->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_018_3 SET status = '1' WHERE FM_PD_018_3.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_018_3 SET status = '2' WHERE FM_PD_018_3.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_034_status(Request $request ){

        $FM_PD_034_main = FM_PD_034_main::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_034_main)){
            $FM_PD_034_main = new FM_PD_034_main;
            $FM_PD_034_main->production_order = $request->production_order;
            $FM_PD_034_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_034_main SET status = '1' WHERE FM_PD_034_main.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_034_main SET status = '2' WHERE FM_PD_034_main.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_131_status(Request $request ){

        $FM_PD_131_main = FM_PD_131_main::where('Product_Order_Line', $request->production_order)->first();
        if(empty($FM_PD_131_main)){
            $FM_PD_131_main = new FM_PD_131_main;
            $FM_PD_131_main->Product_Order_Line = $request->production_order;
            $FM_PD_131_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_131_main SET status = '1' WHERE FM_PD_131_main.Product_Order_Line = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_131_main SET status = '2' WHERE FM_PD_131_main.Product_Order_Line = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_130_status(Request $request ){

        $FM_PD_130_main = FM_PD_130_main::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_130_main)){
            $FM_PD_130_main = new FM_PD_130_main;
            $FM_PD_130_main->production_order = $request->production_order;
            $FM_PD_130_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_130_main SET status = '1' WHERE FM_PD_130_main.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_130_main SET status = '2' WHERE FM_PD_130_main.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_024_status(Request $request ){

        $FM_PD_024_main = FM_PD_024_main::where('production_order', $request->production_order)->first();
        if(empty($FM_PD_024_main)){
            $FM_PD_024_main = new FM_PD_024_main;
            $FM_PD_024_main->production_order = $request->production_order;
            $FM_PD_024_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_024_main SET status = '1' WHERE FM_PD_024_main.production_order = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_024_main SET status = '2' WHERE FM_PD_024_main.production_order = '$request->production_order'");
        }
        return redirect()->back();
    }
    function FM_PD_014_status(Request $request ){

        $FM_PD_014_main = FM_PD_014_main::where('Product_Order_Line', $request->production_order)->first();
        if(empty($FM_PD_014_main)){
            $FM_PD_014_main = new FM_PD_014_main;
            $FM_PD_014_main->Product_Order_Line = $request->production_order;
            $FM_PD_014_main->save();
        }

        if($request->status == null || $request->status == 2){
            DB::update("UPDATE FM_PD_014_main SET status = '1' WHERE FM_PD_014_main.Product_Order_Line = '$request->production_order'");
        }
        if($request->status == 1){
            DB::update("UPDATE FM_PD_014_main SET status = '2' WHERE FM_PD_014_main.Product_Order_Line = '$request->production_order'");
        }
        return redirect()->back();
    }
}

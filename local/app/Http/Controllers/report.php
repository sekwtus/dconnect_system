<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_131_main;
use App\FM_PD_014_main;
use App\FM_PD_037_main;
use DB;

class report extends Controller
{
    function report_main($order)
    {
        $order_detail = DB::select("SELECT
            SAP_ProductionOrders_Header.*,
            SAP_ProductionOrders_Operation.resource,
            SAP_ProductionOrders_Operation.operation_number
        FROM
            SAP_ProductionOrders_Header
            LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
        WHERE SAP_ProductionOrders_Header.production_order = '$order'
        ORDER BY SAP_ProductionOrders_Header.createdon");

        $FM_PD_131 = FM_PD_131_main::where('production_order', $order)->get();
        $FM_PD_014 = FM_PD_014_main::where('production_order', $order)->get();
        $FM_PD_037 = FM_PD_037_main::where('production_order', $order)->get();

        return view('report.report_main', compact('order', 'order_detail', 'FM_PD_131', 'FM_PD_014', 'FM_PD_037'));
    }
}

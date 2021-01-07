<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use Carbon\Carbon;
use DB;

class OE_Controller extends Controller
{
  // OE ภาพรวมทุก line
  public function oe_all() {
    $oe_all = DB::select("SELECT
      process_line_oee.id_process_line_oe,
      process_line_oee.line_number,
      process_line_oee.id_production, 
      process_line_oee.product_name,
      process_line_oee.status,
      
      process_line_oee.qty_total,
      process_line_oee.qty_now,

      process_line_oee.oee,
      process_line_oee.availability,
      process_line_oee.pe,
      process_line_oee.qr

      FROM process_line_oee

      -- WHERE 1
      -- GROUP BY 
      -- ORDER BY 
      --   total_score_weight1 DESC, 
    ", []);
    $type_line = DB::select("SELECT
      type_line.line_number,
      type_line.type_line

      FROM type_line

      WHERE 1
        AND type_line.status = 1
      ORDER BY 
        type_line.line_number ASC
    ", []); 

    return view('oe.oe_all', compact('oe_all','type_line'));
  }
  
  // ajax 
  public function get_oe_data(Request $req, $line) {
    // $oe_data =  DB::table('type_line')->where('line_number',1)->first();
    
    /*
    $oe_data = DB::select("SELECT
      type_line.type_line,
      type_line.line_number,

      MIN(device_count) as quantity_min,
      MAX(device_count) as quantity_max,
      (MAX(device_count)-MIN(device_count)) as quantity_now,
      CASE 
        WHEN device_count = null THEN 10
        WHEN device_count > 0 THEN RAND(100)*100
      END AS value_oe,
      -- PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.prod_line_id,
      PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.device_count,
      PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.original_status,
      PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.device_last_time_update,
      PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.product_order,
      
      SAP_ProductionOrders_Header.production_order,
      SAP_ProductionOrders_Header.quantity_to_make,
      SAP_ProductionOrders_Header.material_number,
      SAP_MaterialMaster_Description.material_description,

      ProductionOrderFGReleases.StartDate,
      ProductionOrderFGReleases.StartTIme,
      ProductionOrderFGReleases.FinishDate,
      ProductionOrderFGReleases.FinishTime
      
      FROM type_line  
      
      LEFT JOIN PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL ON PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.prod_line_id = type_line.line_number

      LEFT JOIN SAP_ProductionOrders_Header ON SAP_ProductionOrders_Header.production_order = PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.product_order
      
      LEFT JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
        AND SAP_MaterialMaster_Description.language_key = 'EN'

      LEFT JOIN ProductionOrderFGReleases ON ProductionOrderFGReleases.Prod_Order = SAP_ProductionOrders_Header.production_order 
        -- AND ProductionOrderFGReleases.FinishDate IS NULL
        -- AND ProductionOrderFGReleases.FinishTime IS NULL
      
      WHERE 1
        AND type_line.line_number = $line
        -- AND DATE_FORMAT(PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.device_last_time_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')
        -- AND DATE_FORMAT(PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.device_last_time_update, '%Y-%m-%d') = '2020-09-18'
        AND PR_DEVICE_SETUP_STATUS_HIST_LOG_TBL.original_status = 'U2'

      ORDER BY
        type_line.line_number ASC
    ", []);
    */
    $oe_data = DB::select("SELECT
      type_line.line_number,
      type_line.type_line,
      production_data.*

      FROM type_line

      LEFT JOIN (SELECT
        ProductionOrderFGReleases.Prod_Order,
        ProductionOrderFGReleases.`Status`,
        ProductionOrderFGReleases.StartDate,
        ProductionOrderFGReleases.StartTime,
        ProductionOrderFGReleases.FinishDate,
        ProductionOrderFGReleases.FinishTime,

        SAP_ProductionOrders_Header.production_order,
        SAP_ProductionOrders_Header.quantity_to_make,
        SAP_ProductionOrders_Header.material_number,
        SAP_MaterialMaster_Description.material_description,

        SAP_ProductionOrders_Operation.resource,
        SAP_ProductionOrders_Operation.operation_number,
        
        type_line.line_number AS line_

        FROM ProductionOrderFGReleases

        LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Operation.production_order = ProductionOrderFGReleases.Prod_Order

        LEFT JOIN SAP_ProductionOrders_Header ON SAP_ProductionOrders_Header.production_order = ProductionOrderFGReleases.Prod_Order

        LEFT JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
          AND SAP_MaterialMaster_Description.language_key = 'EN'
        
        LEFT JOIN type_line ON SAP_ProductionOrders_Operation.resource = type_line.type_line
          -- AND type_line.line_number = $line
        
        WHERE 1
          AND ProductionOrderFGReleases.`Status` = 'RUN'
      ) as production_data ON production_data.line_ = type_line.line_number

      WHERE 1
       AND type_line.line_number = $line
    ", []);

    
    return response()->json([
      'oe_data' => $oe_data[0],
    ]);
  }

  // OE แต่ละ line
  public function oe_line(Request $req, $line) {
    $oe_line = DB::select("SELECT
      process_line_oee.id_process_line_oe,
      process_line_oee.line_number,
      process_line_oee.id_production, 
      process_line_oee.product_name,
      process_line_oee.status,
      
      process_line_oee.qty_total,
      process_line_oee.qty_now,

      process_line_oee.oee,
      process_line_oee.availability,
      process_line_oee.pe,
      process_line_oee.qr

      FROM process_line_oee

      -- WHERE 1
      -- GROUP BY 
      -- ORDER BY 
      --   total_score_weight1 DESC, 
    ", []);

    return view('oe.oe_line', compact('oe_line','line'));
  }
}

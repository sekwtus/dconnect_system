<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sap_header($production_order) {
        return DB::SELECT("SELECT
            SAP_ProductionOrders_Header.scheduled_start,
            SAP_ProductionOrders_Header.production_order,
            SAP_ProductionOrders_Header.expiry_date ,
            SAP_ProductionOrders_Header.material_number,
            SAP_MaterialMaster_Description.material_description,
            SAP_MaterialMaster_Description.language_key,
            SAP_ProductionOrders_Header.batch,
            type_line.line_number

            FROM SAP_ProductionOrders_Header
            INNER JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
            LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
            LEFT JOIN type_line ON SAP_ProductionOrders_Operation.resource = type_line.type_line 
            WHERE
            SAP_MaterialMaster_Description.language_key = 'EN' AND
            SAP_ProductionOrders_Header.production_order = '$production_order'
            LIMIT 1
        ", []);
    }

    
    public function __construct()
    {
        $this->middleware('auth');
        $test_arr = [];
    }

    public function hashAction(){
        return view('hashView');
    }

}

<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use DataTables;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Request;

class order extends Controller
{
    public function order_30day()
    {
        $all_order = DB::select("SELECT
            SAP_ProductionOrders_Header.*,
            SAP_ProductionOrders_Operation.resource,
            SAP_ProductionOrders_Operation.operation_number

            FROM SAP_ProductionOrders_Header
            LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
            LEFT JOIN type_line ON type_line.type_line = SAP_ProductionOrders_Operation.resource
            LEFT JOIN users ON users.id_type_line = type_line.type_line
        WHERE
            SAP_ProductionOrders_Header.createdon >= CURRENT_DATE - INTERVAL '60' DAY 
        ORDER BY
            SAP_ProductionOrders_Header.basic_start_date DESC");
            // return $all_order;
        return view('order.order_30day', compact('all_order'));
    }

    public function order_today(Request $request)
    {
        return view('order.order_today');
    }

    public function order_yesterday()
    {
        $all_order = DB::select("SELECT
            SAP_ProductionOrders_Header.*
            -- ,SAP_ProductionOrders_Operation.resource,
            -- SAP_ProductionOrders_Operation.operation_number
        FROM
            SAP_ProductionOrders_Header
            -- LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
        WHERE SAP_ProductionOrders_Header.createdon LIKE CONCAT(CURDATE() - INTERVAL 1 DAY,'%')
        ORDER BY SAP_ProductionOrders_Header.createdon");

        return view('order.order_yesterday', compact('all_order'));
    }

    
    public function getAjax(Request $req)
    {
        $date = substr($req->date_spec,6,4).substr($req->date_spec,3,2).substr($req->date_spec,0,2);
        $agent = New Agent();

        if (Auth::user()->id_type_user == 2) { #operator
            if($agent->is('Windows') == 1){ // PC mixing
                // $pc_name = substr(shell_exec ("ipconfig/all"),66,10);
                // $mac_address = substr(shell_exec("ipconfig/all"),1819,18);
                // $mac_address=exec('getmac');
                // $mac_address=substr($mac_address, 0, 17);
                // $condition = DB::table('line_ipad')->where('line_ipad.ip' , $mac_address)->first();
                // $line = (!empty($condition) ?$condition->line :'1,2,3,4,5,6' ); 
                // if($mac_address === 'MIXING 1-4') {
                //     $line = '1,2,3,4';
                // } 
                // else if($mac_address === '50-5B-C2-BA-53-4A') { // MIXING 5-6
                //     $line = '5,6';
                // } else {
                //     $line = '1,2,3,4,5,6';
                // }

                $ip_windows = $_SERVER['REMOTE_ADDR']; // IP ของ IPAD
                $condition = DB::table('line_ipad')->where('line_ipad.ip' , $ip_windows)->first();
                $line = (!empty($condition) ? $condition->line : '0' );

            }
            else if($agent->is('OS X') == 1) {  // iPad filling & packing
                $ip_ipad = $_SERVER['REMOTE_ADDR']; // IP ของ IPAD
                $condition = DB::table('line_ipad')->where('line_ipad.ip' , $ip_ipad)->first();
                $line = (!empty($condition) ? $condition->line : '0' ); // (SELECT line_ipad.line FROM line_ipad WHERE line_ipad.ip = '192.168.50.111')
            }

     
            // packing , filling
            $all_order = DB::select("SELECT
            SAP_ProductionOrders_Header.*,
            ProductionOrders_GroupNumber.GroupNo,
            SAP_ProductionOrders_Operation.resource,
            SAP_ProductionOrders_Operation.operation_number,
            type_line.line_number,
            type_line.group_line,
            SAP_MaterialMaster_Description.material_description
            FROM
            SAP_ProductionOrders_Header
            LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
            LEFT JOIN type_line ON type_line.type_line = SAP_ProductionOrders_Operation.resource
            LEFT JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
            LEFT JOIN ProductionOrders_GroupNumber ON SAP_ProductionOrders_Header.production_order = ProductionOrders_GroupNumber.production_order
            WHERE
            1 AND
            SAP_ProductionOrders_Header.scheduled_start = '$date' AND
            type_line.group_line IS NOT NULL AND
            type_line.line_number IN ($line)  AND
            SAP_MaterialMaster_Description.language_key = 'EN'
            ORDER BY
            type_line.line_number ASC,
            SAP_ProductionOrders_Header.createdon ASC
            ", []);

        } else {

            $all_order = DB::select("SELECT
                SAP_ProductionOrders_Header.*,
                SAP_ProductionOrders_Operation.resource,
                SAP_ProductionOrders_Operation.operation_number,
                type_line.line_number,
                ProductionOrders_GroupNumber.GroupNo,
                SAP_MaterialMaster_Description.material_description

                FROM SAP_ProductionOrders_Header
                LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
                LEFT JOIN type_line ON type_line.type_line = SAP_ProductionOrders_Operation.resource
                LEFT JOIN users ON users.id_type_line = type_line.type_line
                LEFT JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
                LEFT JOIN ProductionOrders_GroupNumber ON SAP_ProductionOrders_Header.production_order = ProductionOrders_GroupNumber.production_order

                WHERE 1
                    AND SAP_ProductionOrders_Header.scheduled_start = '$date'
                    -- AND type_line.id =?
                    AND type_line.id IS NOT NULL
                    AND SAP_MaterialMaster_Description.language_key = 'EN'

                ORDER BY 
                    type_line.line_number ASC,
                    SAP_ProductionOrders_Header.createdon ASC
            ", [Auth::user()->id_type_line]);
        }

        //mixing
        if (Auth::user()->id_type_branch == 4) {
            
            $all_order = DB::select("SELECT
                    SAP_ProductionOrders_Header.*,c
                    ProductionOrders_GroupNumber.GroupNo,
                    type_line.type_line,
                    SAP_ProductionOrders_Operation.operation_number,
                    type_line.line_number,
                    SAP_MaterialMaster_Description.material_description 
                FROM
                    SAP_ProductionOrders_Header
                    LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
                    AND SAP_ProductionOrders_Operation.operation_number = '0010' -- active code
                    LEFT JOIN type_line_BPBL as type_line ON type_line.type_line = SAP_ProductionOrders_Operation.resource
                    LEFT JOIN users ON users.id_type_line = type_line.type_line
                    LEFT JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code 
                    LEFT JOIN ProductionOrders_GroupNumber ON SAP_ProductionOrders_Header.production_order = ProductionOrders_GroupNumber.production_order

                WHERE
                    1 
                    AND SAP_ProductionOrders_Header.scheduled_start = '$date' -- AND type_line.id =?
                    
                    AND type_line.id IS NOT NULL
                    AND SAP_MaterialMaster_Description.language_key = 'EN'
                    AND type_line.line_number IN ($line)

                ORDER BY
                    type_line.line_number ASC,
                    SAP_ProductionOrders_Header.createdon ASC",[]);
                
            # code...
        }

        return Datatables::of($all_order)->addIndexColumn()->make(true);
    }
}

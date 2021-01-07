<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_132_main_log;
use Illuminate\Support\Facades\Redirect;
use DB;

class FM_PD_132_Controller extends Controller
{
    public function index($order)
    {
        $head = DB::SELECT("SELECT
                            SAP_ProductionOrders_Header.production_order,
                            SAP_ProductionOrders_Header.material_number,
                            SAP_MaterialMaster_Description.material_description,
                            SAP_MaterialMaster_Description.language_key,
                            SAP_ProductionOrders_Header.batch
                            FROM
                            SAP_ProductionOrders_Header
                            INNER JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
                            WHERE
                            SAP_MaterialMaster_Description.language_key = 'EN' AND
                            SAP_ProductionOrders_Header.production_order = '$order'");

        $FM_PD_132 = FM_PD_132_main_log::where('production_order', $order)->first();

        // return $FM_PD_132;
        return view('D-Reccord.FM-PD-132', compact('head', 'FM_PD_132', 'order'));
    }

    public function store(Request $request, $id)
    {
        $FM_PD_13 = new FM_PD_132_main_log;
        $FM_PD_13->date = $request->date;
        $FM_PD_13->Bigbag = $request->Bigbag;
        $FM_PD_13->Code_sig_Bigbag = $request->Code_sig_Bigbag;
        $FM_PD_13->Remarrk_Bigbag = $request->Remarrk_Bigbag;
        $FM_PD_13->Magnet = $request->Magnet;
        $FM_PD_13->Code_sig_Magnet = $request->Code_sig_Magnet;
        $FM_PD_13->Remarrk_Magnet = $request->Remarrk_Magnet;
        $FM_PD_13->Vibratory_Sieve = $request->Vibratory_Sieve;
        $FM_PD_13->Code_sig_Vibratory_Sieve = $request->Code_sig_Vibratory_Sieve;
        $FM_PD_13->Remarrk_Vibratory_Sieve = $request->Remarrk_Vibratory_Sieve;
        $FM_PD_13->X_Ray = $request->X_Ray;
        $FM_PD_13->Code_sig_X_Ray = $request->Code_sig_X_Ray;
        $FM_PD_13->Remarrk_X_Ray = $request->Remarrk_X_Ray;
        $FM_PD_13->Barcode_Reader = $request->Barcode_Reader;
        $FM_PD_13->Code_sig_Barcode_Reader = $request->Code_sig_Barcode_Reader;
        $FM_PD_13->Remarrk_Barcode_Reader = $request->Remarrk_Barcode_Reader;
        $FM_PD_13->Code_sig_Manager = $request->Code_sig_Manager;
        $FM_PD_13->Remarrk_Bigbag = $request->Remarrk_Bigbag;
        $FM_PD_13->Remarrk_Magnet = $request->Remarrk_Magnet;
        $FM_PD_13->Remarrk_Vibratory_Sieve = $request->Remarrk_Vibratory_Sieve;
        $FM_PD_13->Remarrk_X_Ray = $request->Remarrk_X_Ray;
        $FM_PD_13->Remarrk_Barcode_Reader = $request->Remarrk_Barcode_Reader;
        $FM_PD_13->production_order = $request->production_order;
        $FM_PD_13->save();

        return Redirect::to('printer_monitor/' . $id)->with('save-success','บันทึกข้อมูลสำเร็จ');
    }
}

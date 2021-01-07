<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_044_main;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Auth;

class FM_PD_044_Controller extends Controller
{
    public function index($production_order)
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
                            SAP_ProductionOrders_Header.production_order = '$production_order'");

                            

        // return $FM_PD_044;
        return view('D-Reccord.FM-PD-044', compact('head', 'production_order'));
    }

    public function store(Request $request, $production_order)
    {
        // return $request;
        $filename = "";
        if ($request->hasFile('Barcode_No')){
            $filename = Carbon::now()->toDateString() .'_' . Str::random() . '.' . $request->file('Barcode_No')->getClientOriginalExtension();
            $request->file('Barcode_No')->move('assets/FM-PD-044', $filename);
        }

        $FM_PD_044_main = new FM_PD_044_main;
        $FM_PD_044_main->production_order = $production_order;
        $FM_PD_044_main->Barcode_No = $filename;
        $FM_PD_044_main->frequency = isset($request->frequency) ?implode(',',$request->frequency) :null;;

        $FM_PD_044_main->time = now();

        $FM_PD_044_main->Wrong_Barcode_Result_1 = $request->Wrong_Barcode_Result_1;
        $FM_PD_044_main->Wrong_Barcode_Result_2 = $request->Wrong_Barcode_Result_2;
        $FM_PD_044_main->Wrong_Barcode_Result_3 = $request->Wrong_Barcode_Result_3;
        $FM_PD_044_main->Wrong_Barcode_Note = $request->Wrong_Barcode_Note;

        // $FM_PD_044_main->Wrong_Barcode_Operator = $request->Wrong_Barcode_Operator;
        // $FM_PD_044_main->Wrong_Barcode_Leader = $request->Wrong_Barcode_Leader;
        // $FM_PD_044_main->No_Barcode_Operator = $request->No_Barcode_Operator;
        // $FM_PD_044_main->No_Barcode_Leader = $request->No_Barcode_Leader;
        
        $FM_PD_044_main->sign_operator = $request->txt_sign_operator;

        $FM_PD_044_main->No_Barcode_Result_1 = $request->No_Barcode_Result_1;
        $FM_PD_044_main->No_Barcode_Result_2 = $request->No_Barcode_Result_2;
        $FM_PD_044_main->No_Barcode_Result_3 = $request->No_Barcode_Result_3;
        $FM_PD_044_main->No_Barcode_Note = $request->No_Barcode_Note;
        $FM_PD_044_main->id_sign_operator = Auth::user()->id;

        $FM_PD_044_main->save();

        // return redirect()->back();
        return redirect('/printer_monitor/'.$production_order)->with('save-success','บันทึกข้อมูลสำเร็จ');
    }
}

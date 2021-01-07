<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_004_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_004_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        return view('D-Reccord.FM-PD-004', compact('head', 'production_order'));
    }

    public function store(Request $request, $production_order)
    {
        // return $request;
        $order = new FM_PD_004_main;
        $order = $order->select('order')->where('production_order', $production_order)->latest()->first();
        if (empty($order)) {
            $order = 1;
        } else {
            $order = $order->order + 1;
        }

        $filename = "";
        if ($request->hasFile('bracode_no')) {
            // return $request;
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('bracode_no')->getClientOriginalExtension();
            $request->file('bracode_no')->move('assets/FM-PD-004', $filename);
        }

        $arr_frequency = isset($request->frequency) ? implode(',',$request->frequency) :null;

        $FM_PD_004_main = new FM_PD_004_main;
        $FM_PD_004_main->production_order = $production_order;
        $FM_PD_004_main->bracode_no = $filename;
        $FM_PD_004_main->frequency = $arr_frequency;

        $FM_PD_004_main->Wrong_Barcode_Result_1 = $request->Wrong_Barcode_Result_1;
        $FM_PD_004_main->Wrong_Barcode_Result_2 = $request->Wrong_Barcode_Result_2;
        $FM_PD_004_main->Wrong_Barcode_Result_3 = $request->Wrong_Barcode_Result_3;
        $FM_PD_004_main->Wrong_Barcode_Note = $request->Wrong_Barcode_Note;

        $FM_PD_004_main->No_Barcode_Result_1 = $request->No_Barcode_Result_1;
        $FM_PD_004_main->No_Barcode_Result_2 = $request->No_Barcode_Result_2;
        $FM_PD_004_main->No_Barcode_Result_3 = $request->No_Barcode_Result_3;
        $FM_PD_004_main->No_Barcode_Note = $request->No_Barcode_Note;

        $FM_PD_004_main->Date = $request->Date;
        $FM_PD_004_main->time = $request->time;
        $FM_PD_004_main->order = $order;

        // เมื่อ operator ยืนยันลายเซ็นแล้ว
        $FM_PD_004_main->sign_operator = $request->txt_sign_operator;
        $FM_PD_004_main->id_sign_operator = Auth::user()->id;

        $FM_PD_004_main->save();

        return Redirect::to('printer_monitor/' . $production_order)->with('save-success', 'บันทึกข้อมูลสำเร็จ');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_002_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_002_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_002 = '';
        return view('D-Reccord.FM-PD-002', compact('head', 'FM_PD_002', 'production_order'));
    }

    public function store(Request $request, $production_order)
    {

        $order = new FM_PD_002_main;
        $order = $order->select('order')->where('production_order', $production_order)->latest()->first();
        if (empty($order)) {
            $order = 1;
        } else {
            $order = $order->order + 1;
        }


        // return $request;
        $FM_PD_002_main = new FM_PD_002_main;
        $FM_PD_002_main->production_order = $production_order;
        $FM_PD_002_main->Frequency = isset($request->Frequency) ?implode(',',$request->Frequency) :null;
        $FM_PD_002_main->Time = $request->txtTimeNow;

        $FM_PD_002_main->Stainless_Result_1 = $request->Stainless_Result_1;
        $FM_PD_002_main->Stainless_Result_2 = $request->Stainless_Result_2;
        $FM_PD_002_main->Stainless_Result_3 = $request->Stainless_Result_3;
        $FM_PD_002_main->Stainless_Note = $request->Stainless_Note;

        $FM_PD_002_main->Metal_Result_1 = $request->Metal_Result_1;
        $FM_PD_002_main->Metal_Result_2 = $request->Metal_Result_2;
        $FM_PD_002_main->Metal_Result_3 = $request->Metal_Result_3;
        $FM_PD_002_main->Metal_Note = $request->Metal_Note;
        $FM_PD_002_main->order = $order;
        $FM_PD_002_main->id_sign_operator = Auth::user()->id;

        // เมื่อ operator ยืนยันลายเซ็นแล้ว
        $FM_PD_002_main->sign_operator = $request->txt_sign_operator;
        
        $FM_PD_002_main->save();

        return Redirect::to('printer_monitor/' . $production_order)->with('save-success', 'บันทึกข้อมูลสำเร็จ');
        // return redirect()->back();
    }
}

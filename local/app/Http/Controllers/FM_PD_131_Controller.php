<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_131_main;
use Illuminate\Support\Str;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_131_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);
        // ไม่แสดง defualt หน้าบันทึก
        $FM_PD_131 = '';

        return view('D-Reccord.FM-PD-131', compact('head', 'production_order', 'FM_PD_131'));
    }

    public function store(Request $request, $id)
    {
        $order = new FM_PD_131_main;
        $order = $order->select('order')->where('production_order', $id)->latest()->first();
        if (empty($order)) {
            $order = 1;
        } else {
            $order = $order->order + 1;
        }

        $FM_PD_131_main = new FM_PD_131_main;
        $FM_PD_131_main->Frequency = isset($request->frequency) ?implode(',',$request->frequency) :null;

        $FM_PD_131_main->production_order = $id;
        $FM_PD_131_main->Date = $request->Date;
        $FM_PD_131_main->Time = $request->txtTimeNow;
        $FM_PD_131_main->Result_1 = $request->Result_1;
        $FM_PD_131_main->Result_1 = $request->Result_1;
        $FM_PD_131_main->Result_2 = $request->Result_2;
        $FM_PD_131_main->Result_3 = $request->Result_3;

        // เมื่อ operator ยืนยันลายเซ็นแล้ว
        // return $request->txt_sign_operator;
        $FM_PD_131_main->sign_operator = $request->txt_sign_operator;

        $FM_PD_131_main->Note = $request->Note;
        $FM_PD_131_main->order = $order;
        $FM_PD_131_main->id_sign_operator = Auth::user()->id;

        $FM_PD_131_main->save();

        return Redirect::to('printer_monitor/' . $id)->with('save-success','บันทึกข้อมูลสำเร็จ');
    }
}

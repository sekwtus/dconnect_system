<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_014_main;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class FM_PD_014_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        // $FM_PD_014 = DB::SELECT("SELECT
        //     FM_PD_014_main.*,
        //     users.sign_photo as lead_sign_photo,
        //     user_opera.sign_photo as operator_sign_photo

        //     FROM FM_PD_014_main
        //     LEFT JOIN users ON FM_PD_014_main.sign_leader_id = users.id
        //     LEFT JOIN users as user_opera ON FM_PD_014_main.sign_operator_id = user_opera.id 
        //     WHERE
        //     FM_PD_014_main.production_order = '$order'
        //     -- AND FM_PD_014_main.`order` = (SELECT MAX(FM_PD_131_main.`order`) AS max_order FROM FM_PD_131_main WHERE FM_PD_131_main.production_order = '$order')
        //     AND FM_PD_014_main.sign_leader_id IS NULL
        // ");
        // dd($FM_PD_014);
        return view('D-Reccord.FM-PD-014', compact('head', 'production_order'));
    }

    public function store(Request $request, $production_order)
    {
        // return ($request->frequency);
        $order = new FM_PD_014_main;
        $order = $order->select('order')->where('production_order', $production_order)->latest()->first();
        if (empty($order)) {
            $order = 1;
        } else {
            $order = $order->order + 1;
        }

        $filename = "";
        if ($request->hasFile('unit_carton')) {
            // return $request;
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('unit_carton')->getClientOriginalExtension();
            $request->file('unit_carton')->move('assets/FM-PD-014', $filename);
        }

        $FM_PD_014 = new FM_PD_014_main();
        $FM_PD_014->Unit_Carton = $filename;
        $FM_PD_014->frequency = isset($request->frequency) ?implode(',',$request->frequency) :null;

        $FM_PD_014->Result_1 = $request->Result_1;
        $FM_PD_014->Result_2 = $request->Result_2;
        $FM_PD_014->Result_3 = $request->Result_3;

        $FM_PD_014->time = $request->txtTimeNow;
        $FM_PD_014->note = $request->No_Batch_Note;

        $FM_PD_014->sign_operator = $request->txt_sign_operator;
        $FM_PD_014->order = $order;

        $FM_PD_014->production_order = $production_order;
        $FM_PD_014->order = $order;
        $FM_PD_014->id_sign_operator = Auth::user()->id;

        $FM_PD_014->save();

        // ::updateOrCreate(
        //     ['production_order' => $request->production_order],
        //     [
        //         'Unit_Carton' => $filename,
        //         'Frequency' => $request->Frequency,

        //         'Result_1' => $request->Result_1,
        //         'Result_2' => $request->Result_2,
        //         'Result_3' => $request->Result_3,

        //         'time' => $request->time,
        //         'Note' => $request->No_Batch_Note,

        //         'sign_operator' => $request->txt_sign_operator,

        //         'production_order' => $id,
        //         'order' => $order,
        //     ]
        // );

        return Redirect::to('printer_monitor/'.$production_order)->with('save-success', 'บันทึกข้อมูลสำเร็จ');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

use App\FM_PD_037_main;
use App\FM_PD_037_detail;
use App\SAP_ProductionOrders_Component;
use DB;
use Illuminate\Support\Facades\Redirect;
use Auth;

class FM_PD_037_Controller extends Controller
{
    public function index($order)
    {
        $head = DB::SELECT("SELECT
                            SAP_ProductionOrders_Header.production_order,
                            SAP_ProductionOrders_Header.material_number,
                            SAP_MaterialMaster_Description.material_description,
                            SAP_MaterialMaster_Description.language_key,
                            SAP_ProductionOrders_Header.batch,
                            SAP_ProductionOrders_Operation.resource,
                            type_line.line_number
                            FROM
                            SAP_ProductionOrders_Header
                            INNER JOIN SAP_MaterialMaster_Description ON SAP_ProductionOrders_Header.material_number = SAP_MaterialMaster_Description.material_code
                            LEFT JOIN SAP_ProductionOrders_Operation ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Operation.production_order
                            LEFT JOIN type_line ON SAP_ProductionOrders_Operation.resource = type_line.type_line
                            WHERE
                            SAP_MaterialMaster_Description.language_key = 'EN' AND
                            SAP_ProductionOrders_Header.production_order = '$order'");
                            
        $FM_PD_037_main = FM_PD_037_main::where('production_order', $order)->get();
        $FM_PD_037_main_first = FM_PD_037_main::where('production_order', $order)->first();

        // get foil master
        $foil_code = DB::table('SAP_ProductionOrders_Component')->where('production_order',$order)
        ->Join('SAP_master_foil', 'SAP_ProductionOrders_Component.item', '=', 'SAP_master_foil.sap_code')->get();

        $pm_foil = empty($foil_code[0]->item) ? '' : $foil_code[0]->item;

        return view('D-Reccord.FM-PD-037', compact('head', 'FM_PD_037_main', 'FM_PD_037_main_first', 'order','pm_foil'));
    }

    public function index_lastest($sheet ,$order)
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
                            
         $FM_PD_037_mains = FM_PD_037_main::leftJoin('users', 'users.id', '=', 'FM_PD_037_main.id_sign_operator')->
         where(['production_order' => $order , 'order' => $sheet])->get();

        return view('D-Reccord.FM-PD-037-lastest', compact('head', 'FM_PD_037_mains', 'order' , 'sheet'));
    }

    public function store(Request $request, $id)
    {
        $order = new FM_PD_037_main;
        $order = $order->select('order')->where('production_order', $id)->latest()->first();
        
        if (empty($order)) {
            $order = 1;
        } else {
            $order = $order->order + 1;
        }

        $main = new FM_PD_037_main;
        $filename = "";
        $filename2 = "";
        if ($request->hasFile('tag_foil')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('tag_foil')->getClientOriginalExtension();
            $request->file('tag_foil')->move('assets/FM-PD-037', $filename);
        }

        $main->date = $request->input('date');
        $main->type_foil = $request->input('type_foil');
        $main->number_foil = $request->input('number_foil');
        $main->tag_foil = $filename;
        $main->time_roll = $request->input('time_roll');
        $main->number_pack = $request->input('number_pack');
        $main->correct_foil = $request->input('correct_foil');
        $main->number_seam = $request->input('number_seam');
        $main->sign_operator = $request->input('txt_sign_operator');
        // $main->checked_by = $request->input('leader');
        $main->production_order = $id;
        $main->order = $order;
        $main->note1 = $request->input('note1');
        $main->time_roll1 = $request->input('time_roll1');
        $main->correct1 = $request->input('correct1');
        $main->note2 = $request->input('note2');
        $main->time_roll2 = $request->input('time_roll2');
        $main->correct2 = $request->input('correct2');
        $main->note3 = $request->input('note3');
        $main->time_roll3 = $request->input('time_roll3');
        $main->correct3 = $request->input('correct3');
        $main->machine_pack = $request->input('machine_pack');
        $main->id_sign_operator = Auth::user()->id;

        $main->save();
        return redirect('/printer_monitor/' . $id);
    }


    public function update_lastest(Request $req, $sheet, $order) {

        $FM_PD_037_main = FM_PD_037_main::where('production_order', $order)->where('order', $sheet)
        ->update([
            'date' => $req->input('date'),
            'type_foil' => $req->input('type_foil'),
            'number_foil' => $req->input('number_foil'),
            'time_roll' => $req->input('time_roll'),
            'number_pack' => $req->input('number_pack'),
            'correct_foil' => $req->input('correct_foil'),
            'number_seam' => $req->input('number_seam'),
            'machine_pack' => $req->input('machine_pack'),

            'time_roll1' => $req->input('time_roll1'),
            'correct1' => $req->input('correct1'),
            'note1' => $req->input('note1'),
            
            'time_roll2' => $req->input('time_roll2'),
            'correct2' => $req->input('correct2'),
            'note2' => $req->input('note2'),
            
            'time_roll3' => $req->input('time_roll3'),
            'correct3' => $req->input('correct3'),
            'note3' => $req->input('note3'),
        ]);

        $filename = "";
        if ($req->hasFile('tag_foil')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->file('tag_foil')->getClientOriginalExtension();
            $req->file('tag_foil')->move('assets/FM-PD-037', $filename);

            $FM_PD_037_main = FM_PD_037_main::where('production_order', $order)->where('order', $sheet)
            ->update([
                'tag_foil' => $filename,
            ]);

        }
        return Redirect::to('printer_monitor/' . $order);
    
    }
    

    public function update(Request $request, $id, $order)
    {


        $FM_PD_037_main = FM_PD_037_main::where('production_order', $id)->where('order', $order)->first();
        $order = 1;
        if (!empty($request->input('page-group-default'))) {
            foreach ($request['page-group-default'] as $key => $value) {
                if (!empty($value['note']) || !empty($value['time_roll']) || !empty($value['correct'])) {
                    if (!empty($value['note'])) {
                        $filename2 = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $value['note']->getClientOriginalExtension();
                        $value['note']->move('assets/FM-PD-037', $filename2);
                    }
                    $main = FM_PD_037_detail::where('code_FM_PD_037_main', $FM_PD_037_main->id)->where('order', $order)
                        ->update([
                            'time_roll' => $value['time_roll'],
                            'code_FM_PD_037_main' => $FM_PD_037_main->id,
                            'order' => $order,
                            'correct' => !empty($value['correct']) ? $value['correct'] : null,
                            'note' => $filename2,
                        ]);

                    $order = $order + 1;
                }
            }
        }

        if (!empty($request->input('page-group'))) {
            foreach ($request['page-group'] as $key => $value) {
                if (!empty($value['note']) || !empty($value['time_roll']) || !empty($value['correct'])) {
                    if (!empty($value['note'])) {
                        $filename2 = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $value['note']->getClientOriginalExtension();
                        $value['note']->move('assets/FM-PD-037', $filename2);
                    }

                    $detail = new FM_PD_037_detail;
                    $detail->time_roll = $value['time_roll'];
                    $detail->code_FM_PD_037_main = $FM_PD_037_main->id;
                    $detail->order = $order;
                    if (!empty($value['correct'])) {
                        $detail->correct = $value['correct'];
                    }
                    $detail->note = $filename2;
                    $detail->save();

                    $order = $order + 1;
                }
            }
        }

        return Redirect::to('printer_monitor/' . $id);
    }
}

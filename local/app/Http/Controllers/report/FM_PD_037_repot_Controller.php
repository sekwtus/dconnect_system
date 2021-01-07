<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\FM_PD_037_main;
use App\FM_PD_037_detail;
use Auth;

class FM_PD_037_repot_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_037_mains = FM_PD_037_main::select('FM_PD_037_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_037_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_037_main.id_sign_operator')
            ->where('production_order', $production_order)->get();


        return view('D-Reccord.report.FM-PD-037', compact('head', 'FM_PD_037_mains', 'production_order'));
    }

    public function store(Request $request, $id)
    {
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
        $main->by = $request->input('by');
        $main->checked_by = $request->input('leader');
        $main->production_order = $id;
        $main->machine_pack = $request->input('machine_pack');

        $main->save();

        $order = new FM_PD_037_detail;
        $order = $order->where('code_FM_PD_037_main', $main->id)->latest()->first();
        // return $order;
        if (empty($order)) {
            $order1 = 0;
        } else {
            $order1 = $order->order;
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
                    $detail->code_FM_PD_037_main = $main->id;
                    $detail->order = $order1 + 1;
                    if (!empty($value['correct'])) {
                        $detail->correct = $value['correct'];
                    }
                    $detail->note = $filename2;
                    $detail->save();
                }
            }
        }
        return redirect('/printer_monitor/' . $id);
    }

    public function update(Request $req, $production_order)
    {
        foreach ($req->txtID as $key => $id) {
            $FM_PD_037_main = FM_PD_037_main::where(['id' => $id, 'production_order' => $production_order])->first();
            if ($req->hasFile('tag_foil')) {
                if (isset($req->tag_foil[$key])) {
                    $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $req->tag_foil[$key]->getClientOriginalExtension();
                    $req->tag_foil[$key]->move('assets/FM-PD-037', $filename);
                    $FM_PD_037_main->tag_foil = $filename;
                }
            }
            // $FM_PD_037_main->date = isset($req->date[$key]) ? $req->date[$key] : null;
            $FM_PD_037_main->type_foil = isset($req->type_foil[$key]) ? $req->type_foil[$key] : null;
            $FM_PD_037_main->number_foil = isset($req->number_foil[$key]) ? $req->number_foil[$key] : null;
            $FM_PD_037_main->time_roll = isset($req->time_roll[$key]) ? $req->time_roll[$key] : null;
            $FM_PD_037_main->number_pack = isset($req->number_pack[$key]) ? $req->number_pack[$key] : null;
            $FM_PD_037_main->correct_foil = isset($req->correct_foil[$key]) ? $req->correct_foil[$key] : null;
            $FM_PD_037_main->number_seam = isset($req->number_seam[$key]) ? $req->number_seam[$key] : null;
            // $FM_PD_037_main->sign_leader = isset($req->txt_sign_operator) ? $req->txt_sign_operator : null;
            $FM_PD_037_main->note1 = isset($req->note1[$key]) ? $req->note1[$key] : null;
            $FM_PD_037_main->time_roll1 = isset($req->time_roll1[$key]) ? $req->time_roll1[$key] : null;
            $FM_PD_037_main->correct1 = isset($req->correct1[$key]) ? $req->correct1[$key] : null;
            $FM_PD_037_main->note2 = isset($req->note2[$key]) ? $req->note2[$key] : null;
            $FM_PD_037_main->time_roll2 = isset($req->time_roll2[$key]) ? $req->time_roll2[$key] : null;
            $FM_PD_037_main->correct2 = isset($req->correct2[$key]) ? $req->correct2[$key] : null;
            $FM_PD_037_main->note3 = isset($req->note3[$key]) ? $req->note3[$key] : null;
            $FM_PD_037_main->time_roll3 = isset($req->time_roll3[$key]) ? $req->time_roll3[$key] : null;
            $FM_PD_037_main->correct3 = isset($req->correct3[$key]) ? $req->correct3[$key] : null;
            $FM_PD_037_main->machine_pack = isset($req->machine_pack[$key]) ? $req->machine_pack[$key] : null;

            $FM_PD_037_main->save();
        }
        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');;
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        $FM_PD_037_mains = FM_PD_037_main::select('FM_PD_037_main.*', 'leader.name as leader_name', 'operator.name as operator_name')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_037_main.id_sign_leader')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_037_main.id_sign_operator')
            ->where('production_order', $production_order)->get();

        // return view('D-Reccord.report.print.FM-PD-037', compact('head', 'FM_PD_037_mains', 'production_order'));
        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-037',
            ['head' => $head, 'production_order' => $production_order, 'FM_PD_037_mains' => $FM_PD_037_mains]
        );
        $pdf->setPaper('a4', 'landscape');
        return @$pdf->stream();
    }
}

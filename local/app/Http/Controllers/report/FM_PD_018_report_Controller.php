<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade as PDF;

use App\FM_PD_018_1;
use App\FM_PD_018_2;
use App\FM_PD_018_2_art_work;
use App\FM_PD_018_3;
use App\Http\Controllers\order;
use App\SAP_ProductionOrders_Header;
use DB;
use Auth;

class FM_PD_018_report_Controller extends Controller
{
    public function index($production_order)
    {
        $head = $this->sap_header($production_order);
         $groupNo = DB::table('ProductionOrders_GroupNumber')
        ->select('GroupNo')
        ->where('production_order', $production_order)->first();

        // $groupNotmp = isset($groupNo->GroupNo)
        
        $product_order_sfg = DB::table('ProductionOrders_GroupNumber')
        ->select('production_order')
        ->where(['GroupNo' => $groupNo->GroupNo , 'resource' => 'SFG'])->first();

         $order_sheet_1 = DB::select("SELECT `order` FROM FM_PD_018_1 WHERE production_order =  $product_order_sfg->production_order");
         $order_sheet_2 = DB::select("SELECT `order_sheet` as `order` FROM FM_PD_018_2 WHERE production_order =  $production_order");
        //  $order_sheet_3 = DB::select("SELECT `order` FROM FM_PD_018_3 WHERE production_order =  $production_order");
        //  return $order_sheet_3;
     
        // return $product_order_sfg->production_order;
        // $FM_PD_018_1 = FM_PD_018_1::where('production_order', $production_order)->first();
        $FM_PD_018_1 = FM_PD_018_1::select('FM_PD_018_1.*', 'remove_bag.name as remove_bag_name', 'poue_milk.name as poue_milk_name')
            ->leftJoin('users as remove_bag', 'remove_bag.id', '=', 'FM_PD_018_1.id_user_remove_bag')
            ->leftJoin('users as poue_milk', 'poue_milk.id', '=', 'FM_PD_018_1.id_user_poue_milk')
            ->where('production_order', $product_order_sfg->production_order )
            ->orderBy('created_at')->get();

        // $FM_PD_018_2 = FM_PD_018_2::where('production_order', $production_order)->first();
        $FM_PD_018_2 = FM_PD_018_2::select('FM_PD_018_2.*', 'save_by.name as save_by_name', 'verify_by.name as verify_by_name')
            ->leftJoin('users as save_by', 'save_by.id', '=', 'FM_PD_018_2.id_user_save_by')
            ->leftJoin('users as verify_by', 'verify_by.id', '=', 'FM_PD_018_2.id_user_verify_by')
            ->where('production_order', $production_order)
            ->orderBy('created_at')->get();


        $FM_PD_018_2_art_work_Default =[];
        for ($I = 0; $I < count($order_sheet_2); $I++){
            if (!empty($FM_PD_018_2[$I])) {
                $FM_PD_018_2_art_work_Default[$I] = FM_PD_018_2_art_work::where('fm_pd_018_2_id', $FM_PD_018_2[$I]->id)->first();
            } else {
                $FM_PD_018_2_art_work_Default[$I] = null;
            }
        }

        // $FM_PD_018_3 = FM_PD_018_3::where('production_order', $production_order)->first();
        $FM_PD_018_3 = FM_PD_018_3::select('FM_PD_018_3.*', 'operator.name as operator_name', 'leader.name as leader_name')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_018_3.id_sign_operator')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_018_3.id_sign_leader')
            ->where('production_order', $production_order)
            ->orderBy('created_at')->get();


        $scoop = DB::select("SELECT
            SAP_ProductionOrders_Component.item,
            SAP_master_scoop.item_scoop,
            SAP_master_scoop.name_scoop 
            FROM
                SAP_ProductionOrders_Header
                LEFT JOIN SAP_ProductionOrders_Component ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Component.production_order
                INNER JOIN SAP_master_scoop ON SAP_ProductionOrders_Component.item = SAP_master_scoop.item_scoop 
            WHERE
            SAP_ProductionOrders_Header.production_order = '$production_order'
        ");

        $scoop_number = (empty($scoop) ? '' : $scoop[0]->item_scoop);

        // pm code unit_carton
        $pm_code_unit_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_unit_carton.sap_code',
                'SAP_master_unit_carton.description'
            )
            ->join('SAP_master_unit_carton', 'SAP_master_unit_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();
        // dd(pm_code_unit_carton);

        // pm code ช้อน
        $pm_code_scoop = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_scoop.item_scoop',
                'SAP_master_scoop.name_scoop'
            )
            ->join('SAP_master_scoop', 'SAP_master_scoop.item_scoop', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        $pm_code_shipper_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_shipper_carton.sap_code',
                'SAP_master_shipper_carton.description'
            )
            ->join('SAP_master_shipper_carton', 'SAP_master_shipper_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        return view('D-Reccord.report.FM-PD-018', compact(
            'head',
            'FM_PD_018_1',
            'FM_PD_018_2',
            'FM_PD_018_2_art_work_Default',
            'FM_PD_018_3',
            'scoop_number',
            'pm_code_unit_carton',
            'pm_code_scoop',
            'pm_code_shipper_carton',
            'production_order',
            'order_sheet_1',
            'order_sheet_2'
        ));
    }

    function update(Request $request, $production_order)
    {
        $groupNo = DB::table('ProductionOrders_GroupNumber')
        ->select('GroupNo')
        ->where('production_order', $production_order)->first();

        $product_order_sfg = DB::table('ProductionOrders_GroupNumber')
        ->select('production_order')
        ->where(['GroupNo' => $groupNo->GroupNo , 'resource' => 'SFG'])->first();

         $order_sheet_1 = DB::select("SELECT `order` FROM FM_PD_018_1 WHERE production_order =  $product_order_sfg->production_order");
         $order_sheet_2 = DB::select("SELECT `order_sheet` as `order` FROM FM_PD_018_2 WHERE production_order =  $production_order");
         $order_sheet_3 = DB::select("SELECT `order` FROM FM_PD_018_3 WHERE production_order =  $production_order");


         foreach ($order_sheet_1 as $key1 => $value) {
            $FM_PD_018_1 = FM_PD_018_1::where(['production_order' => $product_order_sfg->production_order , 'order' => $value->order ])->first();
            if (!empty($FM_PD_018_1)) {
                $FM_PD_018_1->type_milk1 = !isset($request->type_milk1[$key1]) ? null : $request->type_milk1[$key1];
                $FM_PD_018_1->type_milk2 = !isset($request->type_milk2[$key1]) ? null : $request->type_milk2[$key1];
                $FM_PD_018_1->type_milk3 = !isset($request->type_milk3[$key1]) ? null : $request->type_milk3[$key1];
                $FM_PD_018_1->type_milk4 = !isset($request->type_milk4[$key1]) ? null : $request->type_milk4[$key1];
                $FM_PD_018_1->clear_milk = !isset($request->clear_milk[$key1]) ? null : $request->clear_milk[$key1];
                $FM_PD_018_1->rm_code1 = !isset($request->rm_code1[$key1]) ? null : $request->rm_code1[$key1];
                $FM_PD_018_1->rm_code2 = !isset($request->rm_code2[$key1]) ? null : $request->rm_code2[$key1];
                $FM_PD_018_1->rm_code3 = !isset($request->rm_code3[$key1]) ? null : $request->rm_code3[$key1];
                $FM_PD_018_1->rm_code4 = !isset($request->rm_code4[$key1]) ? null : $request->rm_code4[$key1];
                $FM_PD_018_1->no_fiber1 = !isset($request->no_fiber1[$key1]) ? null : $request->no_fiber1[$key1];
                $FM_PD_018_1->no_fiber2 = !isset($request->no_fiber2[$key1]) ? null : $request->no_fiber2[$key1];
                $FM_PD_018_1->no_fiber3 = !isset($request->no_fiber3[$key1]) ? null : $request->no_fiber3[$key1];
                $FM_PD_018_1->no_fiber4 = !isset($request->no_fiber4[$key1]) ? null : $request->no_fiber4[$key1];

                $FM_PD_018_1->blender =  !isset($request->blender[$key1]) ? null : $request->blender[$key1];
                $FM_PD_018_1->filling1 = !isset($request->filling1[$key1]) ? null : $request->filling1[$key1];
                $FM_PD_018_1->filling2 = !isset($request->filling2[$key1]) ? null : $request->filling2[$key1];
                $FM_PD_018_1->filling3 = !isset($request->filling3[$key1]) ? null : $request->filling3[$key1];
                $FM_PD_018_1->filling4 = !isset($request->filling4[$key1]) ? null : $request->filling4[$key1];
                $FM_PD_018_1->filling5 = !isset($request->filling5[$key1]) ? null : $request->filling5[$key1];
                $FM_PD_018_1->filling6 = !isset($request->filling6[$key1]) ? null : $request->filling6[$key1];
                $FM_PD_018_1->no_formula = !isset($request->no_formula[$key1]) ? null : $request->no_formula[$key1];
                $FM_PD_018_1->id_sign_leader = !isset(Auth::user()->id[$key1]) ? null : Auth::user()->id[$key1];

                $FM_PD_018_1->save();
            } 
        } 

        foreach ($order_sheet_2 as $key2 => $value) {
            $FM_PD_018_2 = FM_PD_018_2::where(['production_order' => $production_order , 'order_sheet' => $value->order  ])->first();
            if (!empty($FM_PD_018_2)) {
                if ($request->hasFile('file['.$key2.']')) {
                    $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('file['.$key2.']')->getClientOriginalExtension();
                    $request->file('file['.$key2.']')->move('assets/FM-PD-018', $filename);
                    $FM_PD_018_2->file = $filename;
                }

                $FM_PD_018_2->no_formula = $request->no_formula[$key2];
                $FM_PD_018_2->ribbon = $request->ribbon[$key2];
                $FM_PD_018_2->product_change_log = $request->product_change_log[$key2];
                $FM_PD_018_2->sub_product_change_log = isset($request->sub_product_change_log[$key2]) ? implode(',', $request->sub_product_change_log[$key2]) : null;

                $FM_PD_018_2->line = $request->line[$key2];
                $FM_PD_018_2->product_name = (!empty($request->product_name[$key2])) ? $request->product_name[$key2] : null;
                $FM_PD_018_2->time = !empty($request->time[$key2]) ? $request->time[$key2] : 'off';
                $FM_PD_018_2->product_date = !empty($request->product_date[$key2]) ? $request->product_date[$key2] : 'off';
                $FM_PD_018_2->exp_date = !empty($request->exp_date[$key2]) ? $request->exp_date[$key2] : 'off';
                $FM_PD_018_2->batch = !empty($request->batch[$key2]) ? $request->batch[$key2] : 'off';
                $FM_PD_018_2->order = !empty($request->order[$key2]) ? $request->order[$key2] : 'off';
                $FM_PD_018_2->product = $request->product[$key2];
                $FM_PD_018_2->size = $request->size[$key2];
                $FM_PD_018_2->id_sign_leader = Auth::user()->id;

                $FM_PD_018_2->save();
            }
        }

        foreach ($order_sheet_3 as $key3 => $value) { 
            $FM_PD_018_3 = FM_PD_018_3::where(['production_order' => $production_order , 'order' => $value->order])->first();
            if (!empty($FM_PD_018_3)) {
                if ($request->hasFile('material_no['.$key3.']')) {
                    $file_material_no = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('material_no['.$key3.']')->getClientOriginalExtension();
                    $request->file('material_no['.$key3.']')->move('assets/FM-PD-018', $file_material_no);
                    $FM_PD_018_3->material_no = $file_material_no;
                }

                if ($request->hasFile('spoon_file['.$key3.']')) {
                    $file_spoon = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('spoon_file['.$key3.']')->getClientOriginalExtension();
                    $request->file('spoon_file['.$key3.']')->move('assets/FM-PD-018', $file_spoon);
                    $FM_PD_018_3->spoon_file = $file_spoon;
                }

                $FM_PD_018_3->pm_code_unit_carton = $request->pm_code_unit_carton[$key3];
                $FM_PD_018_3->no_milk_left_in = $request->no_milk_left_in[$key3];
                $FM_PD_018_3->spoon_type = $request->spoon_type[$key3];
                $FM_PD_018_3->spoon_size = $request->spoon_size[$key3];
                $FM_PD_018_3->pm_code_scoop = $request->pm_code_scoop[$key3];
                $FM_PD_018_3->clear_unit_special_box = $request->clear_unit_special_box[$key3];
                $FM_PD_018_3->pm_code_shipper_carton = $request->pm_code_shipper_carton[$key3];
                $FM_PD_018_3->material_code = $request->material_code[$key3];
                $FM_PD_018_3->product_hierarehy = $request->product_hierarehy[$key3];
                $FM_PD_018_3->batch_no = $request->batch_no[$key3];
                $FM_PD_018_3->exp = $request->exp[$key3];
                $FM_PD_018_3->product_line = $request->product_line[$key3];
                $FM_PD_018_3->bbd = $request->bbd[$key3];
                $FM_PD_018_3->glue = $request->glue[$key3];
                $FM_PD_018_3->id_sign_leader = Auth::user()->id;

                $FM_PD_018_3->save();
            }
        }

        // return redirect()->back();
        return Redirect::to('report/' . $production_order)->with('edit-success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function print($production_order)
    {
        $head = $this->sap_header($production_order);

        // $FM_PD_018_1 = FM_PD_018_1::where('production_order', $production_order)->first();
        $FM_PD_018_1 = FM_PD_018_1::select('FM_PD_018_1.*', 'remove_bag.name as remove_bag_name', 'poue_milk.name as poue_milk_name')
            ->leftJoin('users as remove_bag', 'remove_bag.id', '=', 'FM_PD_018_1.id_user_remove_bag')
            ->leftJoin('users as poue_milk', 'poue_milk.id', '=', 'FM_PD_018_1.id_user_poue_milk')
            ->where('production_order', $production_order)->first();

        // $FM_PD_018_2 = FM_PD_018_2::where('production_order', $production_order)->first();
        $FM_PD_018_2 = FM_PD_018_2::select('FM_PD_018_2.*', 'save_by.name as save_by_name', 'verify_by.name as verify_by_name')
            ->leftJoin('users as save_by', 'save_by.id', '=', 'FM_PD_018_2.id_user_save_by')
            ->leftJoin('users as verify_by', 'verify_by.id', '=', 'FM_PD_018_2.id_user_verify_by')
            ->where('production_order', $production_order)->first();

        if (!empty($FM_PD_018_2)) {
            $FM_PD_018_2_art_work_Default = FM_PD_018_2_art_work::where('fm_pd_018_2_id', $FM_PD_018_2->id)->first();
        } else {
            $FM_PD_018_2_art_work_Default = null;
        }

        // $FM_PD_018_3 = FM_PD_018_3::where('production_order', $production_order)->first();
        $FM_PD_018_3 = FM_PD_018_3::select('FM_PD_018_3.*', 'operator.name as operator_name', 'leader.name as leader_name')
            ->leftJoin('users as operator', 'operator.id', '=', 'FM_PD_018_3.id_sign_operator')
            ->leftJoin('users as leader', 'leader.id', '=', 'FM_PD_018_3.id_sign_leader')
            ->where('production_order', $production_order)->first();


        $scoop = DB::select("SELECT
            SAP_ProductionOrders_Component.item,
            SAP_master_scoop.item_scoop,
            SAP_master_scoop.name_scoop 
            FROM
                SAP_ProductionOrders_Header
                LEFT JOIN SAP_ProductionOrders_Component ON SAP_ProductionOrders_Header.production_order = SAP_ProductionOrders_Component.production_order
                INNER JOIN SAP_master_scoop ON SAP_ProductionOrders_Component.item = SAP_master_scoop.item_scoop 
            WHERE
            SAP_ProductionOrders_Header.production_order = '$production_order'
        ");

        $scoop_number = (empty($scoop) ? '' : $scoop[0]->item_scoop);

        // pm code unit_carton
        $pm_code_unit_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_unit_carton.sap_code',
                'SAP_master_unit_carton.description'
            )
            ->join('SAP_master_unit_carton', 'SAP_master_unit_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();
        // dd(pm_code_unit_carton);

        // pm code ช้อน
        $pm_code_scoop = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_scoop.item_scoop',
                'SAP_master_scoop.name_scoop'
            )
            ->join('SAP_master_scoop', 'SAP_master_scoop.item_scoop', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        $pm_code_shipper_carton = DB::table('SAP_ProductionOrders_Component')
            ->select(
                'SAP_ProductionOrders_Component.production_order',
                'SAP_ProductionOrders_Component.item',
                'SAP_ProductionOrders_Component.item_category',
                'SAP_ProductionOrders_Component.unit_of_measure',
                'SAP_ProductionOrders_Component.bom_item_text',
                'SAP_master_shipper_carton.sap_code',
                'SAP_master_shipper_carton.description'
            )
            ->join('SAP_master_shipper_carton', 'SAP_master_shipper_carton.sap_code', '=', 'SAP_ProductionOrders_Component.item')
            ->where(['SAP_ProductionOrders_Component.production_order' => $production_order])
            ->first();

        $pdf = PDF::loadView(
            'D-Reccord.report.print.FM-PD-018',
            [
                'head' => $head,
                'FM_PD_018_1' => $FM_PD_018_1,
                'FM_PD_018_2' => $FM_PD_018_2,
                'FM_PD_018_2_art_work_Default' => $FM_PD_018_2_art_work_Default,
                'FM_PD_018_3' => $FM_PD_018_3,
                'scoop_number' => $scoop_number,
                'pm_code_unit_carton' => $pm_code_unit_carton,
                'pm_code_scoop' => $pm_code_scoop,
                'pm_code_shipper_carton' => $pm_code_shipper_carton,
                'production_order' => $production_order
            ]
        );
        $pdf->setPaper('a4', 'landscape');
        // return view('D-Reccord.report.print.FM-PD-018', [ 'head' => $head, 'FM_PD_018_1' => $FM_PD_018_1, 'FM_PD_018_2' => $FM_PD_018_2, 'FM_PD_018_2_art_work_Default' => $FM_PD_018_2_art_work_Default, 'FM_PD_018_3' => $FM_PD_018_3, 'scoop_number' => $scoop_number, 'pm_code_unit_carton' => $pm_code_unit_carton, 'pm_code_scoop' => $pm_code_scoop, 'pm_code_shipper_carton' => $pm_code_shipper_carton, 'production_order' => $production_order ]);
        return @$pdf->stream();
    }
}

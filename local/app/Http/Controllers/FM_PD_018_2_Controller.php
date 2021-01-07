<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FM_PD_018_2;
use App\FM_PD_018_2_art_work;
use App\SAP_ProductionOrders_Header;
use App\SAP_MaterialMaster_Description;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\users;

class FM_PD_018_2_Controller extends Controller
{
    public function index($sheet ,$production_order)
    {
        $FM_PD_018_2 = SAP_ProductionOrders_Header::select('SAP_MaterialMaster_Description.material_description', 'SAP_ProductionOrders_Header.batch', 'SAP_ProductionOrders_Header.production_order', 'SAP_ProductionOrders_Header.material_number')
            ->join('SAP_MaterialMaster_Description', 'SAP_ProductionOrders_Header.material_number', '=', 'SAP_MaterialMaster_Description.material_code')
            ->where('SAP_ProductionOrders_Header.production_order', $production_order)
            ->where('SAP_MaterialMaster_Description.language_key', 'EN')
            ->get();

        // $FM_PD_018_2_Default = FM_PD_018_2::where('production_order', $production_order)->first();
        $FM_PD_018_2_Default = FM_PD_018_2::select('FM_PD_018_2.*', 'save_by.name as save_by_name', 'verify_by.name as verify_by_name')
        ->leftJoin('users as save_by', 'save_by.id', '=', 'FM_PD_018_2.id_user_save_by')
        ->leftJoin('users as verify_by', 'verify_by.id', '=', 'FM_PD_018_2.id_user_verify_by')
        ->where(['production_order' => $production_order , 'order_sheet' => $sheet ])->first();

        if (!empty($FM_PD_018_2_Default)) {
            $FM_PD_018_2_art_work_Default = FM_PD_018_2_art_work::where(['fm_pd_018_2_id' => $FM_PD_018_2_Default->id , 'order_sheet' => $sheet ])->first();
        } else {
            $FM_PD_018_2_art_work_Default = null;
        }

        $FM_PD_018_2_Default = $sheet == 0 ? [] : $FM_PD_018_2_Default;


        return view('D-Reccord.FM-PD-018.FM-PD-018-2', compact('FM_PD_018_2', 'FM_PD_018_2_Default', 'FM_PD_018_2_art_work_Default', 'production_order','sheet'));
    }

    public function store(Request $request, $sheet , $id)
    {
        $order = new FM_PD_018_2;
        $order = $order->select('order_sheet')->where('production_order', $id)->latest()->first();
        if ($sheet == 0) {
            if (empty($order)) {
                $order = 1;
            } else {
                $order = $order->order_sheet + 1;
            }
        }
        else{
            $order = $sheet;
        }
        
        // return $request->sub_product_change_log;
        $filename = null;
        $filename1 = null;

        if ($request->hasFile('file')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move('assets/FM-PD-018', $filename);
        }

        $id_save_by = users::where(['sign_photo' => $request->txt_sign_operator])->whereNotNull('sign_photo')->first();
        $id_verify_by = users::where('sign_photo',$request->txt_sign_operator1)->whereNotNull('sign_photo')->first();

        $fm_pd_018_2 = [
            'production_order' => $request->production_order,
            'no_formula' => $request->no_formula,
            'ribbon' => $request->ribbon,
            'product_change_log' => $request->product_change_log,
            'sub_product_change_log' => isset($request->sub_product_change_log) ?implode(',',$request->sub_product_change_log) :null,
            // 'product_batch' => $request->product_batch,
            'line' => $request->line,
            'product_name' => (!empty($request->product_name)) ? $request->product_name : null,
            'time' => !empty($request->time) ? $request->time : 'off',
            'product_date' => !empty($request->product_date) ? $request->product_date : 'off',
            'exp_date' => !empty($request->exp_date) ? $request->exp_date : 'off',
            'batch' => !empty($request->batch) ? $request->batch : 'off',
            'order' => !empty($request->order) ? $request->order : 'off',
            'product' => $request->product,
            'size' => $request->size,
            'save_by' => $request->txt_sign_operator,
            'verify_by' => $request->txt_sign_operator1,
            
            'id_user_save_by' => isset($id_save_by->id) ? $id_save_by->id : null,
            'id_user_verify_by' => isset($id_verify_by->id)  ? $id_verify_by->id : null ,
            'order_sheet' => $order,
        ];

        if($filename != null) {
            $fm_pd_018_2['file'] = $filename; 
        }
        $fm_pd_018_2_update =  FM_PD_018_2::updateOrCreate(['production_order' => $request->production_order , 'order_sheet' => $order], $fm_pd_018_2);


        // if ($request->hasFile('art_work_pic2')) {
        //     $filename2 = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('art_work_pic2')->getClientOriginalExtension();
        //     $request->file('art_work_pic2')->move('assets/FM-PD-018/artwork', $filename2);
        // }

        $fm_pd_018_2_art_work = [
            'fm_pd_018_2_id' => $fm_pd_018_2_update->id,
        ];

        if ($request->hasFile('art_work_pic1')) {
            $filename1 = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('art_work_pic1')->getClientOriginalExtension();
            $request->file('art_work_pic1')->move('assets/FM-PD-018/artwork', $filename1);
        }

        if($filename1 != null) {
            $fm_pd_018_2_art_work['pic1'] = $filename1;
            $fm_pd_018_2_art_work['order_sheet'] = $order;
        }
        // if($filename2 != null) {
        //     $fm_pd_018_2_art_work['pic2'] = $filename2; 
        // }$

        $fm_pd_018_2_art_work_update = FM_PD_018_2_art_work::updateOrCreate(['fm_pd_018_2_id' => $fm_pd_018_2_update->id ,'order_sheet' => $order], $fm_pd_018_2_art_work);

        return redirect('/printer_monitor/' . $id)->with('save-success', 'บันทึกข้อมูลสำเร็จ');
        // return redirect()->back();
    }
}

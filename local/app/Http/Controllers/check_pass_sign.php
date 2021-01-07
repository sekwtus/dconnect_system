<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FM_PD_018_1;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class check_pass_sign extends Controller
{
    function check_pass_sign(Request $req)
    {
        if (Hash::check($req->pass_sign, Auth::user()->password)) {
            if($req->user_type_str == 'sign_leader') {
                
                $sign_leader = Auth::user()->sign_photo;
                $id_leader = Auth::user()->id;

                if($req->table_document == 'FM_PD_018') { //ถ้าเปนเอกสาร FM-PD-018 จะ update ลายเซ็น 3 table

                    // return response()->json([
                    //     'check_password'=> $sign_leader,
                    // ]);

                    $groupNo = DB::table('ProductionOrders_GroupNumber')
                    ->select('GroupNo')
                    ->where('production_order', $req->pr_order)->first();
            
                    $product_order_sfg = DB::table('ProductionOrders_GroupNumber')
                    ->select('production_order')
                    ->where(['GroupNo' => $groupNo->GroupNo , 'resource' => 'SFG'])->first();

                    $FM_PD_018_1 = DB::table('FM_PD_018_1')->where([
                        'production_order'=>$product_order_sfg->production_order
                    ])->update(['sign_leader'=>$sign_leader, 'date_check'=>now()]);

                    $FM_PD_018_2 = DB::table('FM_PD_018_2')->where([
                        'production_order'=>$req->pr_order
                    ])->update(['sign_leader'=>$sign_leader, 'date_check'=>now()]);

                    $FM_PD_018_3 = DB::table('FM_PD_018_3')->where([
                        'production_order'=>$req->pr_order
                    ])->update(['sign_leader'=>$sign_leader, 'date_check'=>now()]);

                } else {
                    DB::table($req->table_document)->where([
                        'production_order'=>$req->pr_order
                    ])->update(['sign_leader'=>$sign_leader, 'date_check'=>now() , 'id_sign_leader'=>$id_leader ]);
                }
            }

            return response()->json([
                'check_password'=> true,
                'data_user'=>Auth::user(),
                'message'=>'บันทึกลายเซ็นสำเร็จ'
            ]);
            // if (!empty($req->table_document)) {
            //     $model = new FM_PD_018_1;
            //     $model->setTable($req->table_document);
            //     $data =  $model->where(['production_order' => $req->pr_order])->first();
            //     if (!empty($data)) {
            //         return $model->where(['production_order' => $req->pr_order])->update([
            //             $req->field => $user_sign,
            //         ]);
            //     } else {
            //         return $model->create([$req->field => $user_sign, 'production_order' => $req->pr_order]);
            //     }
            // }
        } else {
            return response()->json([
                'check_password'=> false,
                'message'=>'รหัสผ่านไม่ถูกต้อง'
            ]);
        }
    }
}

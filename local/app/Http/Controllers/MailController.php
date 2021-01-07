<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\test_send_mail;
use Symfony\Component\HttpFoundation\Response;
use App\Article;
use App\Mail\buildMail;
use DB;


class MailController extends Controller
{
    public function sendEmailSim3(Request $req)
    {
        $user_detail = DB::table('sim3_user')->where('id',$req->user_id)->first();

        $email = $user_detail->email;
        
        $details = [
            'name' => $user_detail->name,
            'subjects' => 'แจ้งเตือนจากระบบ Dconnect: ติดตาม SIM3 Action plan ',
            'detail' => 'กรุณาเข้าสู่ระบบ Dconnect เพื่อบันทึกความคืบหน้า Action plan ที่รับผิดชอบ',
            'link' => 'http://192.168.50.9/dconnect_system/D-SIM/SIM3',
        ]; 

        Mail::to($email)->send(new buildMail($details));
    }

    public function sendEmail()
    {
        $email = 'sekwatunyou@gmail.com';
                
        $details = [
            'name' => 'WTU',
            'subjects' => 'แจ้งเตือนจากระบบ Dconnect: ติดตาม SIM3 Action plan ',
            'detail' => 'กรุณาเข้าสู่ระบบ Dconnect เพื่อบันทึกความคืบหน้า Action plan ที่รับผิดชอบ',
            'link' => 'http://192.168.50.9/dconnect_system/D-SIM/SIM3',
        ]; 

        Mail::to($email)->send(new buildMail($details));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\type_user;
use App\type_branch;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\SIM_master;
use App\SIM_standard;
use App\SIM_topic;
use App\type_line;

class Setting_Controller extends Controller
{
    public function index_profile()
    {
        $type_user = type_user::get();
        $type_branch = type_branch::where('id', '!=', '3')->get();
        $type_line = type_line::get();
        $users = DB::table('users')
            ->select('users.id', 'users.pic_profile', 'users.username', 'sign_photo', 'users.name', 'users.id_type_user', 'users.id_type_branch', 'users.id_type_line', 'users.email', 'users.phone', 'users.address', 'type_user.type_user', 'type_branch.type_branch', 'type_line.type_line')
            ->leftJoin('type_user', 'type_user.id', '=', 'users.id_type_user')
            ->leftJoin('type_branch', 'type_branch.id', '=', 'users.id_type_branch')
            ->leftJoin('type_line', 'type_line.id', '=', 'users.id_type_line')
            ->where('username', Auth::user()->username)
            ->get();
        // return $users;
        return view('profile', compact('users', 'type_user', 'type_branch', 'type_line'));
    }

    public function index_profile_save(Request $request)
    {
        $filename = "";
        $filename2 = "";
        $users_old = users::where('id', $request->id)->first();
        if ($request->hasFile('pic_profile')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('pic_profile')->getClientOriginalExtension();
            $request->file('pic_profile')->move('assets/profile', $filename);
        } else {
            $filename = $users_old->pic_profile;
        }

        if ($request->hasFile('sign_photo')) {
            $filename2 = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('sign_photo')->getClientOriginalExtension();
            $request->file('sign_photo')->move('assets/images/sign/', $filename2);
        } else {
            $filename2 = $users_old->sign_photo;
        }

        if ($request->type_user != '2') {
            $request->type_branch = 3;
            $request->type_line = NULL;
        }

        $users =  users::find($request->id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->password = Hash::make($request->password);
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->pic_profile = $filename;
        $users->sign_photo = $filename2;
        $users->id_type_user = $request->type_user;
        $users->id_type_branch = $request->type_branch;
        $users->id_type_line = $request->type_line;
        $users->save();

        return Redirect::to('profile');
    }

    public function index_user()
    {
        $users = users::get();

        return view('user', compact('users'));
    }

    public function index_user_add()
    {
        $type_user = type_user::get();
        $type_branch = type_branch::where('id', '!=', '3')->get();
        $type_line = type_line::get();

        return view('user_add', compact('type_user', 'type_branch', 'type_line'));
    }

    public function index_user_add_save(Request $request)
    {
        $filename = "";
        $filename2 = "";
        if ($request->hasFile('pic_profile')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('pic_profile')->getClientOriginalExtension();
            $request->file('pic_profile')->move('assets/profile', $filename);
        }

        if ($request->hasFile('signature')) {
            $filename2 = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('signature')->getClientOriginalExtension();
            $request->file('signature')->move('assets/images/sign', $filename2);
        }

        if ($request->type_user != '2') {
            $request->type_branch = 3;
            $request->type_line = NULL;
        }

        $users =  new users;
        $users->username = $request->username;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->id_type_user = $request->type_user;
        $users->id_type_branch = $request->type_branch;
        $users->id_type_line = $request->type_line;
        $users->pic_profile = $filename;
        $users->sign_photo = $filename;
        $users->real_pass = $request->password;
        $users->save();

        return Redirect::to('user');
    }

    public function index_user_detail($id)
    {
        $type_user = type_user::get();
        $type_branch = type_branch::get();
        $type_line = type_line::get();

        $users = DB::table('users')
            ->select('users.id', 'users.pic_profile', 'users.name', 'users.id_type_user', 'users.id_type_branch', 'users.id_type_line', 'users.email', 'users.phone', 'users.address', 'type_user.type_user', 'type_branch.type_branch', 'type_line.type_line')
            ->leftJoin('type_user', 'type_user.id', '=', 'users.id_type_user')
            ->leftJoin('type_branch', 'type_branch.id', '=', 'users.id_type_branch')
            ->leftJoin('type_line', 'type_line.id', '=', 'users.id_type_line')
            ->where('users.id', $id)
            ->get();

        return view('user_detail', compact('users', 'type_user', 'type_branch', 'type_line'));
    }

    public function index_user_detail_save(Request $request)
    {
        $filename = "";
        $users_old = users::where('id', $request->id)->first();
        if ($request->hasFile('pic_profile')) {
            $filename = Carbon::now()->toDateString() . '_' . Str::random() . '.' . $request->file('pic_profile')->getClientOriginalExtension();
            $request->file('pic_profile')->move('assets/profile', $filename);
        } else {
            $filename = $users_old->pic_profile;
        }

        if ($request->type_user != '2') {
            $request->type_branch = 3;
            $request->type_line = NULL;
        }

        $users =  users::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->pic_profile = $filename;
        $users->id_type_user = $request->type_user;
        $users->id_type_branch = $request->type_branch;
        $users->id_type_line = $request->type_line;
        $users->save();

        return Redirect::to('user/' . $request->id);
    }

    public function sim2()
    {
        $data_sim_master = DB::select("SELECT * FROM `SIM_master`");
        $department = DB::select("SELECT * from SIM_department");
        $sim_standard = DB::select("SELECT * from SIM_topic");
        return view('settings.setting_sim', compact('data_sim_master', 'department', 'sim_standard'));
    }

    public function add_sim_topic(Request $request)
    {
        $master = new SIM_master;
        $master->department_id = $request->department;
        $department_name = SIM_department::where('department_id', $request->department)->first();
        $master->department = $department_name->department_name;
        $master->topic = $request->sim_standard;
        $topic_name = SIM_standard::where('topic_id', $request->sim_standard)->first();
        $master->topic_eng = $topic_name->topic_name;
        $master->target = $request->target;
        $master->unit = $request->unit;
        $master->standard_rate = $request->standard_rate;
        $master->created_at = now();
        $master->save();
        return back();
    }
}

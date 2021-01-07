<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;
use App\Position;
use App\Employee_detail;
use App\type_user;

class SettingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position =  Position::all();
        $type_user = type_user::all();
        return view('settings.setting_user',compact('position','type_user'));
    }

    public function index_ajax() {
        $user = User::join('Employee_details','users.username','Employee_details.username')
        ->join('Position','Position.Code_Position','Employee_details.Code_Position')
        ->join('type_user','type_user.id','users.id_type_user')
        ->get();
        return Datatables::of($user)->addIndexColumn()->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->id_type_user = $request->type_user;
        $user->save();

        $employee = new Employee_detail;
        $employee->username = $request->username;
        $employee->Employee_Code = $request->employee_code;
        $employee->FirstName = $request->first_name;
        $employee->LastName = $request->last_name;
        $employee->Email = $request->email;
        $employee->Phone_number = $request->phone_number;
        $employee->Address = $request->address;
        $employee->Code_Position = $request->position;
        $employee->save();

        return redirect('settings/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('username',$id)->update([            
            'username' => $request->username,
            'name' => $request->first_name,
            'email' => $request->email,
            'id_type_user' => $request->type_user,
        ]);

        $employee = Employee_detail::where('username',$id)
        ->update([
            'username' => $request->username,
            'Employee_Code' => $request->employee_code,
            'FirstName' => $request->first_name,
            'LastName' => $request->last_name,
            'Email' => $request->email,
            'Phone_number' => $request->phone_number,
            'Address' => $request->address,
            'Code_Position' => $request->position,
        ]);

        return redirect('settings/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('username',$id)->delete();
        $employee = Employee_detail::where('username',$id)->delete();
        
        return redirect('settings/user');
    }
}

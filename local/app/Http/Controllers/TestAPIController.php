<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestAPIController extends Controller
{
    public function testGet(Request $req){
        DB::insert("INSERT into SIM_department (mon) value(?)",compact($req->data));
        return 'test_api';
    }
}

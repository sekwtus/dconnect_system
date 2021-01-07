<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class knowledge extends Controller
{
    
    public function table(){
        $data_kmow = DB::select("SELECT * from KNOW_topic");
        return view('knowledge.table' , compact('data_kmow'));
    }

    public function document($id){
        return $id;
        return view('knowledge.document');
    }

    public function add_topic(Request $request){
        DB::insert("INSERT into KNOW_topic (topic_name,detail,created_at) values ( ?, ? ,now() )", [$request->topic, $request->detail]);

        return back();
    }
}

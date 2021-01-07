<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class report_main extends Controller
{
    public function delete_record_paper(Request $request)
    {
        // DB::table($request->table_name)->where(['production_order' => $request->production_order , 'order' => $request->order ])->delete();
        DB::table($request->table_name)->where(['id' => $request->id])->delete();
    }
}

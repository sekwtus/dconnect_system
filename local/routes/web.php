<?php

use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;

Auth::routes();

Route::get('test-all', function () {
    return view('test-all');
});

Route::get('/getmac', function () {
    $agent = New Agent();
    $agent->isAndroidOS();
    $agent->isNexus();
    $agent->isSafari();
    $agent->languages();

    $agent->device();
    $agent->isDesktop();
    $agent->isPhone();
    $agent->isMobile();
    $agent->isTablet();
    $agent->isRobot();
    $agent->robot();

    if($agent->is('Windows') == 1){
        // PC
    }
    else if($agent->is('OS X') == 1) {
        // iPad
    }

    $pc_name = substr(shell_exec ("ipconfig/all"),66,9);

    $mac_address=exec('getmac');
    $mac_address=substr($mac_address, 0, 17); // strtok($MAC, ' ')

    return [
        'OS'=>$agent->platform(), 
        'IP'=>$_SERVER['REMOTE_ADDR'],
        'MAC'=>$mac_address.' '.$MAC, 
        'NAME'=>$pc_name,
        /*
            'device'=>$agent->device(),
            'isDesktop'=>$agent->isDesktop(),
            'isPhone'=>$agent->isPhone(),
            'isMobile'=>$agent->isMobile(),
            'isTablet'=>$agent->isTablet(),

            'isAndroidOS'=>$agent->isAndroidOS(),
            'isNexus'=>$agent->isNexus(),
            'isSafari'=>$agent->isSafari(),
            'languages'=>$agent->languages(),

            'isRobot'=>$agent->isRobot(),
            'robot'=>$agent->robot()
        */
    ];
});

Route::get('hashPassword', 'Controller@hashAction')->middleware('auth');


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/', function () {
    switch (Auth::user()->id_type_user) {
        case 1:
            return Redirect::to('order_today');
        break;

        case 2:
            return Redirect::to('order_today');
        break;

        case 3:
            return Redirect::to('order_today');
        break;

        case 4:
            return Redirect::to('d-care');
        break;

        default:
            return Redirect::to('d-care');
        break;
    }
})->middleware('auth');

Route::get('/test', function () {
    return view('document-all');
})->middleware('auth');

Route::get('/checkbox', function () {
    return view('checkbox');
})->middleware('auth');

/****** Start D-Reccord ******/
Route::get('/FM-PD-132/{order}', 'FM_PD_132_Controller@index')->middleware('auth');
Route::post('/FM-PD-132/store/{id}', 'FM_PD_132_Controller@store')->middleware('auth');

Route::get('/FM-PD-018', function () {
    return view('D-Reccord.FM-PD-018');
})->middleware('auth');

Route::get('/FM-PD-018-1/{sheet}/{id}', 'FM_PD_018_1_Controller@index')->middleware('auth');
Route::post('/FM-PD-018-1/save/{sheet}/{id}', 'FM_PD_018_1_Controller@store')->middleware('auth');
Route::post('/FM-PD-018-1/check_pass_sign', 'FM_PD_018_1_Controller@check_pass');

Route::get('/FM-PD-018-2/{sheet}/{id}', 'FM_PD_018_2_Controller@index')->middleware('auth');
// Route::get('/FM-PD-018-2', 'FM_PD_018_2_Controller@index')->middleware('auth');
Route::post('/FM-PD-018-2/save/{sheet}/{id}', 'FM_PD_018_2_Controller@store')->middleware('auth');

Route::get('/FM-PD-018-3/{sheet}/{id}', 'FM_PD_018_3_Controller@index')->middleware('auth');
Route::post('/FM-PD-018-3/save/{sheet}/{id}', 'FM_PD_018_3_Controller@store')->middleware('auth');

Route::get('/FM-PD-037/{order}', 'FM_PD_037_Controller@index')->middleware('auth');
Route::get('/FM-PD-037-lastest/{sheet}/{order}', 'FM_PD_037_Controller@index_lastest')->middleware('auth');
Route::post('/FM-PD-037/update_lastest/{sheet}/{order}', 'FM_PD_037_Controller@update_lastest')->middleware('auth');
Route::post('/FM-PD-037/store/{id}', 'FM_PD_037_Controller@store')->middleware('auth');

Route::get('/FM-PD-024/{order}', 'FM_PD_024_Controller@index')->middleware('auth');
Route::post('/FM-PD-024/store/{id}', 'FM_PD_024_Controller@store')->middleware('auth');

Route::get('/FM-PD-130/{order}', 'FM_PD_130_Controller@index')->middleware('auth');
Route::post('/FM-PD-130/store/{id}', 'FM_PD_130_Controller@store')->middleware('auth');

Route::get('/FM-PD-034/{order}', 'FM_PD_034_Controller@index')->middleware('auth');
Route::post('/FM-PD-034/store/{id}', 'FM_PD_034_Controller@store')->middleware('auth');

Route::get('/FM-PD-131/{order}', 'FM_PD_131_Controller@index')->middleware('auth');
Route::post('/FM-PD-131/store/{id}', 'FM_PD_131_Controller@store')->middleware('auth');

Route::get('/FM-PD-004/{order}', 'FM_PD_004_Controller@index')->middleware('auth');
Route::post('/FM-PD-004/store/{id}', 'FM_PD_004_Controller@store')->middleware('auth');

Route::get('/FM-PD-002/{order}', 'FM_PD_002_Controller@index')->middleware('auth');
Route::post('/FM-PD-002/store/{id}', 'FM_PD_002_Controller@store')->middleware('auth');

Route::get('/FM-PD-014/{order}', 'FM_PD_014_Controller@index')->middleware('auth');
Route::post('/FM-PD-014/store/{id}', 'FM_PD_014_Controller@store')->middleware('auth');

Route::get('/FM-PD-044/{order}', 'FM_PD_044_Controller@index')->middleware('auth');
Route::post('/FM-PD-044/store/{id}', 'FM_PD_044_Controller@store')->middleware('auth');

/**************** Report **************/
Route::get('/FM-PD-132/report/{order}', 'report\FM_PD_132_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-132/update/{id}', 'report\FM_PD_132_repot_Controller@update')->middleware('auth');

Route::get('/FM-PD-018/report/{id}', 'report\FM_PD_018_report_Controller@index')->middleware('auth');
Route::post('/FM-PD-018/update/{id}', 'report\FM_PD_018_report_Controller@update')->middleware('auth');
Route::get('/FM-PD-018/print/{id}', 'report\FM_PD_018_report_Controller@print')->middleware('auth');

Route::get('/FM-PD-018-1/report/{id}', 'report\FM_PD_018_1_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-018-1/update/{id}', 'report\FM_PD_018_1_repot_Controller@update')->middleware('auth');

Route::get('/FM-PD-018-2/report/{id}', 'report\FM_PD_018_2_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-018-2/update/{id}', 'report\FM_PD_018_2_repot_Controller@update')->middleware('auth');

Route::get('/FM-PD-018-3/report/{id}', 'report\FM_PD_018_3_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-018-3/update/{id}', 'report\FM_PD_018_3_repot_Controller@update')->middleware('auth');

Route::get('/FM-PD-037/report/{order}', 'report\FM_PD_037_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-037/update/{id}', 'report\FM_PD_037_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-037/print/{id}', 'report\FM_PD_037_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-024/report/{order}', 'report\FM_PD_024_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-024/update/{id}', 'report\FM_PD_024_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-024/print/{id}', 'report\FM_PD_024_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-130/report/{order}', 'report\FM_PD_130_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-130/update/{id}', 'report\FM_PD_130_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-130/print/{id}', 'report\FM_PD_130_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-034/report/{order}', 'report\FM_PD_034_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-034/update/{id}', 'report\FM_PD_034_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-034/print/{id}', 'report\FM_PD_034_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-131/report/{order}', 'report\FM_PD_131_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-131/update/{id}', 'report\FM_PD_131_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-131/print/{id}', 'report\FM_PD_131_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-004/report/{order}', 'report\FM_PD_004_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-004/update/{id}', 'report\FM_PD_004_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-004/print/{id}', 'report\FM_PD_004_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-002/report/{order}', 'report\FM_PD_002_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-002/update/{id}', 'report\FM_PD_002_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-002/print/{id}', 'report\FM_PD_002_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-014/report/{order}', 'report\FM_PD_014_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-014/update/{id}', 'report\FM_PD_014_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-014/print/{id}', 'report\FM_PD_014_repot_Controller@print')->middleware('auth');

Route::get('/FM-PD-044/report/{order}', 'report\FM_PD_044_repot_Controller@index')->middleware('auth');
Route::post('/FM-PD-044/update/{id}', 'report\FM_PD_044_repot_Controller@update')->middleware('auth');
Route::get('/FM-PD-044/print/{id}', 'report\FM_PD_044_repot_Controller@print')->middleware('auth');

Route::post('delete_record_paper', 'report\report_main@delete_record_paper')->middleware('auth');
/**************** End Report **************/
/****** End D-Reccord ******/

/****** OE ******/
Route::get('oe', 'OE_Controller@oe_all')->middleware('auth');
Route::get('oe/{line}/get_oe_data', 'OE_Controller@get_oe_data')->middleware('auth');

Route::get('{line}/oe', 'OE_Controller@oe_line')->middleware('auth');
/****** End OE ******/

/****** D-SIM ******/
Route::get('/loss-analysis', function () {
    return view('D-SIM.Loss_Analysis');
})->middleware('auth');

    Route::get('SIM1/getAjexTest', 'SIM1_Controller@getAjax')->middleware('auth');
    

Route::prefix('D-SIM')->group(function () {

    //!SIM1
    Route::get('SIM1/order/{order}', 'SIM1_Controller@sim1')->middleware('auth');
    Route::post('SIM1/send_lose_case', 'SIM1_Controller@send_lose_case')->middleware('auth');
    Route::get('SIM1/order_today' , 'SIM1_Controller@order_today')->middleware('auth');
    Route::get('SIM1/report' , 'SIM1_Controller@order_report')->middleware('auth');
    Route::get('SIM1/get_sim1_data_log' , 'SIM1_Controller@get_sim1_data_log')->middleware('auth');
    Route::get('SIM1/get_data_chart' , 'SIM1_Controller@get_data_chart')->middleware('auth');
    Route::get('SIM1/set_time_start' , 'SIM1_Controller@set_time_start')->middleware('auth');
    Route::get('SIM1/set_time_stop' , 'SIM1_Controller@set_time_stop')->middleware('auth');

    Route::get('SIM2', 'SIM2_Controller@topic_sim2')->middleware('auth');
    // Route::get('{id_sim2}/SIM2', 'SIM_Controller@index_sim2')->middleware('auth');

    //! SIM3
    Route::get('SIM3', 'SIM_Controller@index_sim3')->middleware('auth');
    Route::get('PDCA/{id}', 'SIM_Controller@pdca')->middleware('auth')->middleware('auth');
    Route::post('PDCA/save', 'SIM_Controller@pdca_save')->middleware('auth');
    Route::post('save_date', 'SIM_Controller@save_date')->middleware('auth');
    Route::get('getPDCA_data', 'SIM_Controller@getPDCA_data')->middleware('auth');
    Route::get('get_sim_info', 'SIM_Controller@get_sim_info')->middleware('auth');

    // Route::get('sim3/get_data_gage', 'SIM_Controller@get_data_gage')->middleware('auth');
    Route::get('sim3/get_data_table', 'SIM_Controller@get_data_table');
    Route::get('sim3/get_data_modal', 'SIM_Controller@get_data_modal')->middleware('auth');
    Route::get('sim3/get_data_log', 'SIM_Controller@get_data_log')->middleware('auth');
    Route::post('sim3/save_modal_sim3_PDCA', 'SIM_Controller@save_modal_sim3_PDCA')->middleware('auth');
    Route::get('sim3/get_table_pdca', 'SIM_Controller@get_table_pdca')->middleware('auth');
    
    Route::post('sim3_data/save', 'SIM_Controller@sim3_data_save')->middleware('auth');
    // Route::get('sim3/get_data_trend', 'SIM_Controller@get_data_trend');

    Route::get('sim3/get_time_stop', 'SIM_Controller@get_time_stop')->middleware('auth');
    Route::post('sim3/save_modal_time_counter', 'SIM_Controller@save_modal_time_counter')->middleware('auth');
    Route::delete('sim3/delete_sim3_data_log', 'SIM_Controller@delete_sim3_data_log')->middleware('auth');

    Route::get('sim3/get_table_information_sharing', 'SIM_Controller@get_table_information_sharing')->middleware('auth');
    Route::post('sim3/save_information_sharing', 'SIM_Controller@save_information_sharing')->middleware('auth');
    Route::delete('sim3/delete_sim3_information_sharing', 'SIM_Controller@delete_sim3_information_sharing')->middleware('auth');



    //! SIM2
    Route::get('SIM2/{id}', 'SIM2_Controller@index_sim2')->middleware('auth');
    Route::get('PDCA/{id}', 'SIM2_Controller@pdca')->middleware('auth')->middleware('auth');
    Route::post('PDCA/save', 'SIM2_Controller@pdca_save')->middleware('auth');
    Route::post('save_date', 'SIM2_Controller@save_date')->middleware('auth');
    Route::get('getPDCA_data', 'SIM2_Controller@getPDCA_data')->middleware('auth');
    Route::get('get_sim_info', 'SIM2_Controller@get_sim_info')->middleware('auth');

    // Route::get('sim3/get_data_gage', 'SIM_Controller@get_data_gage')->middleware('auth');
    Route::get('sim2/get_data_table', 'SIM2_Controller@get_data_table');
    Route::get('sim2/get_data_modal', 'SIM2_Controller@get_data_modal')->middleware('auth');
    Route::get('sim2/get_data_log', 'SIM2_Controller@get_data_log')->middleware('auth');
    Route::post('sim2/save_modal_sim2_PDCA', 'SIM2_Controller@save_modal_sim2_PDCA')->middleware('auth');
    Route::get('sim2/get_table_pdca', 'SIM2_Controller@sim2_get_table_pdca')->middleware('auth');
    
    Route::post('sim2_data/save', 'SIM2_Controller@sim2_data_save')->middleware('auth');
    // Route::get('sim3/get_data_trend', 'SIM_Controller@get_data_trend');

    Route::get('sim2/get_time_stop', 'SIM2_Controller@get_time_stop')->middleware('auth');
    Route::post('sim2/save_modal_time_counter', 'SIM2_Controller@save_modal_time_counter')->middleware('auth');
    Route::delete('sim2/delete_sim2_data_log', 'SIM2_Controller@delete_sim2_data_log')->middleware('auth');

    Route::get('sim2/get_table_information_sharing', 'SIM2_Controller@sim2_get_table_information_sharing')->middleware('auth');
    Route::post('sim2/save_information_sharing', 'SIM2_Controller@save_information_sharing')->middleware('auth');
    Route::delete('sim2/delete_sim2_information_sharing', 'SIM2_Controller@delete_sim2_information_sharing')->middleware('auth');

    //! SIM4
    Route::get('SIM4', 'SIM4_Controller@index_sim4')->middleware('auth'); 
    Route::get('sim4/get_data_table', 'SIM4_Controller@get_data_table');
    Route::get('sim4/get_data_modal', 'SIM4_Controller@get_data_modal')->middleware('auth');
    Route::get('sim4/get_data_log', 'SIM4_Controller@get_data_log')->middleware('auth');
    Route::post('sim4/save_modal_sim4_PDCA', 'SIM4_Controller@save_modal_sim4_PDCA')->middleware('auth');
    Route::get('sim4/get_table_pdca', 'SIM4_Controller@get_table_pdca')->middleware('auth');
    
    Route::post('sim4_data/save', 'SIM4_Controller@sim4_data_save')->middleware('auth');
    // Route::get('sim4/get_data_trend', 'SIM4_Controller@get_data_trend');

    Route::get('sim4/get_time_stop', 'SIM4_Controller@get_time_stop')->middleware('auth');
    Route::post('sim4/save_modal_time_counter', 'SIM4_Controller@save_modal_time_counter')->middleware('auth');
    Route::delete('sim4/delete_sim4_data_log', 'SIM4_Controller@delete_sim4_data_log')->middleware('auth');

    Route::get('sim4/get_table_information_sharing', 'SIM4_Controller@get_table_information_sharing')->middleware('auth');
    Route::post('sim4/save_information_sharing', 'SIM4_Controller@save_information_sharing')->middleware('auth');
    Route::delete('sim4/delete_sim4_information_sharing', 'SIM4_Controller@delete_sim4_information_sharing')->middleware('auth');
    
});
  
// รายชื่อผู้เข้าประชุม sim3
Route::get('sim3/get_sim3_user', 'SIM_Controller@get_sim3_user')->middleware('auth');
Route::post('sim3/save_sim3_user_meeting', 'SIM_Controller@save_sim3_user_meeting')->middleware('auth');  
Route::view('sim3/report_user_meeting', 'D-SIM.SIM3.report_user_meeting')->middleware('auth');
Route::get('sim3/report_user_meeting/getAjax', 'SIM_Controller@report_user_meeting')->middleware('auth');



//! รายชื่อผู้เข้าประชุม sim2
Route::get('sim2/get_sim2_user', 'SIM2_Controller@get_sim2_user')->middleware('auth');
Route::get('sim2/save_sim2_user_meeting', 'SIM2_Controller@save_sim2_user_meeting')->middleware('auth');

Route::get('{dpmt_id}/sim2/report_user_meeting', function ($dpmt_id) {
    return view('D-SIM.SIM2.report_user_meeting',compact('dpmt_id'));
})->middleware('auth');

// Route::view('sim2/report_user_meeting', 'D-SIM.SIM2.report_user_meeting')->middleware('auth');
Route::get('sim2/report_user_meeting/getAjax', 'SIM2_Controller@report_user_meeting')->middleware('auth');



// ตั้งค่า sim3
Route::get('sim3/setting', 'SIM_Controller@get_sim3_setting')->middleware('auth');
Route::post('sim3/setting', 'SIM_Controller@update_sim3_setting')->middleware('auth');

//! ตั้งค่า sim2
Route::get('sim2/setting', 'SIM2_Controller@get_sim2_setting')->middleware('auth');
Route::post('sim2/setting', 'SIM2_Controller@update_sim2_setting')->middleware('auth');

Route::post('D-SIM/SIM2/insert_information', 'SIM_Controller@insert_information_sim2')->middleware('auth');

/****** End D-SIM ******/

/****** start D-Know ******/
Route::get('d-know', 'DKnowController@index_d_know')->middleware('auth');
Route::get('video/d-know', 'DKnowController@video_d_know')->middleware('auth');

//? admin
// Route::get('setting/d-know', 'DKnowController@d_know')->middleware('auth');
Route::view('setting/category/d-know', 'd-know/d-know-category', [])->middleware('auth');
Route::get('setting/get-d-know-category', 'DKnowController@get_d_know_category')->middleware('auth');

Route::get('setting/d-know', 'DKnowController@d_know')->middleware('auth');
Route::get('setting/get-d-know', 'DKnowController@get_d_know')->middleware('auth');

// Route::get('setting/create/d-know', 'DKnowController@create_d_know')->middleware('auth');
Route::post('setting/insert-d-know-category', 'DKnowController@insert_d_know_category')->middleware('auth');
Route::post('setting/update-d-know-category', 'DKnowController@update_d_know_category')->middleware('auth');
Route::post('setting/insert-d-know', 'DKnowController@insert_d_know')->middleware('auth');
Route::post('setting/update-d-know', 'DKnowController@update_d_know')->middleware('auth');
Route::get('setting/{d_know_id}/d-know', 'DKnowController@edit_d_know')->middleware('auth');
Route::post('setting/delete/d-know', 'DKnowController@delete_d_know')->middleware('auth');
/****** End D-Know ******/

/****** D-Care ******/
//? admin
Route::get('d-care', 'DCareController@d_care')->middleware('auth');
Route::get('get-d-care', 'DCareController@get_d_care')->middleware('auth');
Route::get('create/d-care', 'DCareController@create_d_care')->middleware('auth');
Route::post('insert-d-care', 'DCareController@insert_d_care')->middleware('auth');

Route::get('edit/d-care', 'DCareController@edit_d_care')->middleware('auth');
Route::post('update-d-care', 'DCareController@update_d_care')->middleware('auth');

Route::post('delete-d-care', 'DCareController@delete_d_care')->middleware('auth');
Route::post('delete-d-care-detail', 'DCareController@delete_d_care_detail')->middleware('auth');

//? user
Route::get('index/d-care', 'DCareController@d_care_index')->middleware('auth');
Route::post('insert-d-care-data', 'DCareController@insert_d_care_data')->middleware('auth');
Route::post('update-d-care-data', 'DCareController@update_d_care_data')->middleware('auth');
Route::post('delete-d-care-data', 'DCareController@delete_d_care_data')->middleware('auth');

Route::get('report/d-care', 'DCareController@d_care_report')->middleware('auth');
Route::get('get-d-care-report', 'DCareController@get_d_care_report')->middleware('auth');

Route::get('chart/d-care', 'DCareController@d_care_chart')->middleware('auth');

Route::get('get-gemba-chart', 'DCareController@get_gemba_chart')->middleware('auth');
Route::get('get-audit-chart', 'DCareController@get_audit_chart')->middleware('auth');
/****** End D-Care ******/

/***** Settings *****/
Route::get('settings/user', 'SettingUserController@index')->middleware('auth');
Route::get('settings/user/ajax', 'SettingUserController@index_ajax')->middleware('auth');
Route::post('settings/user', 'SettingUserController@store')->middleware('auth');
Route::put('settings/user/{id}', 'SettingUserController@update')->middleware('auth');
Route::post('settings/user/{id}', 'SettingUserController@destroy')->middleware('auth');
/***** End Settings *****/

/******* Dashboard ******/
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('/work', function () {
    return view('work');
});

Route::get('/work2', function () {
    return view('work2');
});

Route::get('/44', function () {
    return view('44');
});

Route::get('/02', function () {
    return view('02');
});

Route::get('/12', function () {
    return view('12');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('printer_monitor/{order}' , 'product_line_monitor@printer');
Route::get('report/{order}' , 'report@report_main')->middleware('auth');

Route::get('order_table' , 'order@order_30day')->middleware('auth');
Route::get('order_today' , 'order@order_today')->middleware('auth');
Route::get('order_yesterday' , 'order@order_yesterday')->middleware('auth');
Route::get('order_today/getAjax' , 'order@getAjax')->middleware('auth');


Route::get('FM-PD-018-1_status' , 'product_line_monitor@FM_PD_018_1_status')->middleware('auth');
Route::get('FM-PD-132_status' , 'product_line_monitor@FM_PD_132_status')->middleware('auth');
Route::get('FM-PD-044_status' , 'product_line_monitor@FM_PD_044_status')->middleware('auth');
Route::get('FM-PD-037_status' , 'product_line_monitor@FM_PD_037_status')->middleware('auth');
Route::get('FM-PD-018-2_status' , 'product_line_monitor@FM_PD_018_2_status')->middleware('auth');
Route::get('FM-PD-002_status' , 'product_line_monitor@FM_PD_002_status')->middleware('auth');
Route::get('FM-PD-018-3_status' , 'product_line_monitor@FM_PD_018_3_status')->middleware('auth');
Route::get('FM-PD-034_status' , 'product_line_monitor@FM_PD_034_status')->middleware('auth');
Route::get('FM-PD-131_status' , 'product_line_monitor@FM_PD_131_status')->middleware('auth');
Route::get('FM-PD-130_status' , 'product_line_monitor@FM_PD_130_status')->middleware('auth');
Route::get('FM-PD-024_status' , 'product_line_monitor@FM_PD_024_status')->middleware('auth');
Route::get('FM-PD-014_status' , 'product_line_monitor@FM_PD_014_status')->middleware('auth');
// Route::get('/Profile', function () {
//     return view('Profile');
// });

Route::get('profile' , 'Setting_Controller@index_profile')->middleware('auth');
Route::post('profile/save' , 'Setting_Controller@index_profile_save')->middleware('auth');
Route::get('user' , 'Setting_Controller@index_user')->middleware('auth');
Route::get('user/add' , 'Setting_Controller@index_user_add')->middleware('auth');
Route::post('user/add/save' , 'Setting_Controller@index_user_add_save')->middleware('auth');
Route::post('user/detail/save' , 'Setting_Controller@index_user_detail_save')->middleware('auth');
Route::get('user/{id}' , 'Setting_Controller@index_user_detail')->middleware('auth');

// Route::get('/user', function () {
//     return view('User')->middleware('auth');
// });


// setting
Route::prefix('setting')->group(function () {
    // Route::get('SIM1', 'SIM_Controller@sim1');
    Route::get('SIM2', 'Setting_Controller@sim2')->middleware('auth');
    Route::post('add_sim_topic', 'Setting_Controller@add_sim_topic')->middleware('auth');


});


Route::get('knowledge' , 'knowledge@table')->middleware('auth');
Route::post('knowledge/add_topic' , 'knowledge@add_topic')->middleware('auth');
Route::get('knowledge' , 'knowledge@table')->middleware('auth');
Route::get('knowledge/document/{id}' , 'knowledge@document')->middleware('auth');

Route::get('/record_voice', function () {
    return view('test.pdca');
});

Route::post('check_pass_sign' , 'check_pass_sign@check_pass_sign')->middleware('auth');


Route::get('test1' , 'SIM2_Controller@test1')->middleware('auth');


//! send email
Route::get('/send-email-sim3', 'MailController@sendEmailSim3')->middleware('auth');
Route::get('/send-email', 'MailController@sendEmail')->middleware('auth');


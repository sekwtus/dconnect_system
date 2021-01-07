<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test_api', function () {
    return 'test_api';
});

// SAP
Route::post('insert_SAP_MaterialMaster_Conversion', 'SyncDataController@insert_SAP_MaterialMaster_Conversion');
Route::post('insert_SAP_MaterialMaster_Description', 'SyncDataController@insert_SAP_MaterialMaster_Description');
Route::post('insert_SAP_ProductionOrders_Component', 'SyncDataController@insert_SAP_ProductionOrders_Component');
Route::post('insert_SAP_ProductionOrders_Header', 'SyncDataController@insert_SAP_ProductionOrders_Header');
Route::post('insert_SAP_ProductionOrders_Operation', 'SyncDataController@insert_SAP_ProductionOrders_Operation');
Route::post('insert_ProductionOrders_GroupNumber', 'SyncDataController@insert_ProductionOrders_GroupNumber');

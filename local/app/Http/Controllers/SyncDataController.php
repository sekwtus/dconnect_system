<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\SAP_MaterialMaster_Conversion;
use App\SAP_MaterialMaster_Description;
use App\SAP_ProductionOrders_Component;
use App\SAP_ProductionOrders_Header;
use App\SAP_ProductionOrders_Operation;
use App\ProductionOrders_GroupNumber;
use DB;
use Auth;

class SyncDataController extends Controller
{
  public function insert_SAP_MaterialMaster_Conversion(Request $request) {
    $material_master_conversion = new SAP_MaterialMaster_Conversion();
    $material_master_conversion->material_code = $request->material_code;
    $material_master_conversion->alt_uom_sku = $request->alt_uom_sku;
    $material_master_conversion->conversion_numerator_buom = $request->conversion_numerator_buom;
    $material_master_conversion->conversion_denominator_buon = $request->conversion_denominator_buon;
    $material_master_conversion->lenght = $request->lenght;
    $material_master_conversion->witdh = $request->witdh;
    $material_master_conversion->heigh = $request->heigh;
    $material_master_conversion->unit_dimension_lenght_width_heigh = $request->unit_dimension_lenght_width_heigh;
    $material_master_conversion->volume = $request->volume;
    $material_master_conversion->volume_unit = $request->volume_unit;
    $material_master_conversion->base_unit_of_mesure = $request->base_unit_of_mesure;
    $material_master_conversion->save();
    return response()->json(['data' => "OK"]);
  }

  public function insert_SAP_MaterialMaster_Description(Request $request) {
    $material_master_description = new SAP_MaterialMaster_Description();
    $material_master_description->material_code = $request->material_code;
    $material_master_description->language_key = $request->language_key;
    $material_master_description->material_description = $request->material_description;
    $material_master_description->save();
    return response()->json(['data' => "OK"]);
  }

  public function insert_SAP_ProductionOrders_Component(Request $request) {
    $production_orders_component = new SAP_ProductionOrders_Component();
    $production_orders_component->production_order = $request->production_order;
    $production_orders_component->operation_number = $request->operation_number;
    $production_orders_component->component_counter = $request->component_counter;
    $production_orders_component->quantity = $request->quantity;
    $production_orders_component->scrap = $request->scrap;
    $production_orders_component->storage_location = $request->storage_location;
    $production_orders_component->item = $request->item;
    $production_orders_component->item_category = $request->item_category;
    $production_orders_component->unit_of_measure = $request->unit_of_measure;
    $production_orders_component->bom_item_text = $request->bom_item_text;
    $production_orders_component->sort_string = $request->sort_string;
    $production_orders_component->save();
    return response()->json(['data' => "OK"]);
  }

  public function insert_SAP_ProductionOrders_Header(Request $request) {

    
    $production_orders_header = new SAP_ProductionOrders_Header();
    $production_orders_header->production_order = $request->production_order;
    $production_orders_header->order_type = $request->order_type;
    $production_orders_header->unit_of_measure = $request->unit_of_measure;
    $production_orders_header->quantity_to_make = $request->quantity_to_make;
    $production_orders_header->scheduled_end = $request->scheduled_end;
    $production_orders_header->scheduled_end_time = $request->scheduled_end_time;
    $production_orders_header->basic_start_date = $request->basic_start_date;
    $production_orders_header->basic_start_time = $request->basic_start_time;
    $production_orders_header->scheduled_start = $request->scheduled_start;
    $production_orders_header->scheduled_time = $request->scheduled_time;
    $production_orders_header->material_number = $request->material_number;
    $production_orders_header->plant = $request->plant;
    $production_orders_header->batch = $request->batch;
    $production_orders_header->expiry_date = $request->expiry_date;
    $production_orders_header->bom_alternative = $request->bom_alternative;
    $production_orders_header->createdon = $request->createdon;
    $production_orders_header->referenceid = $request->referenceid;
    $production_orders_header->filename = $request->filename;
    $production_orders_header->status = $request->status;
    $production_orders_header->save();
    return response()->json(['data' => "OK"]);
    

  }

  public function insert_SAP_ProductionOrders_Operation(Request $request) {
    $production_orders_operation = new SAP_ProductionOrders_Operation();
    $production_orders_operation->production_order = $request->production_order;
    $production_orders_operation->resource = $request->resource;
    $production_orders_operation->operation_number = $request->operation_number;
    $production_orders_operation->save();
    return response()->json(['data' => "OK"]);
  }

  public function insert_ProductionOrders_GroupNumber(Request $request) {
    $production_orders_group_number = new ProductionOrders_GroupNumber();
    $production_orders_group_number->GroupNo = $request->GroupNo;
    $production_orders_group_number->production_order = $request->production_order;
    $production_orders_group_number->resource = $request->resource;
    $production_orders_group_number->order_type = $request->order_type;
    $production_orders_group_number->unit_of_measure = $request->unit_of_measure;
    $production_orders_group_number->quantity_to_make = $request->quantity_to_make;
    $production_orders_group_number->scheduled_end = $request->scheduled_end;
    $production_orders_group_number->scheduled_end_time = $request->scheduled_end_time;
    $production_orders_group_number->basic_start_date = $request->basic_start_date;
    $production_orders_group_number->basic_start_time = $request->basic_start_time;
    $production_orders_group_number->scheduled_start = $request->scheduled_start;
    $production_orders_group_number->scheduled_time = $request->scheduled_time;
    $production_orders_group_number->material_number = $request->material_number;
    $production_orders_group_number->plant = $request->plant;
    $production_orders_group_number->batch = $request->batch;
    $production_orders_group_number->expiry_date = $request->expiry_date;
    $production_orders_group_number->bom_alternative = $request->bom_alternative;
    $production_orders_group_number->status = $request->status;
    $production_orders_group_number->createdon = $request->createdon;
    $production_orders_group_number->StartDateTime = $request->StartDateTime;
    $production_orders_group_number->FinishDateTime = $request->FinishDateTime;
    $production_orders_group_number->TotalHour = $request->TotalHour;
    $production_orders_group_number->TotalHour_Note = $request->TotalHour_Note;
    $production_orders_group_number->save();
    return response()->json(['data' => "OK"]);
  }

  
}

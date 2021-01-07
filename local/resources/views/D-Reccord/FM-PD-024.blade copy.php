@extends('layouts.master')
@section('style')

@endsection
@section('main')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="fa fa-history" aria-hidden="true"></i> DRecord</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">DReacord</li>
                <li class="breadcrumb-item">Product Line</li>
                <li class="breadcrumb-item">Product Line1</li>
                <li class="breadcrumb-item active">FM-PD-024 Rev.04</li>
            </ol>
        </div>
    </div>
</div>

<div class="row" style="font-size: 14pt;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-1 col-lg-1 text-center">
                        <a href="app-contact-detail.html">
                            <img src="{{ asset('/assets/images/dgo.jpg') }}" width="150" alt="user"
                                class="img-fluid"></a>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <h3 class="box-title m-b-0">FM-PD-024 Rev.04</h3>
                        <h4>Verification Oprps And Ccps For Release Product Record</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 text-right">
                        <button class="btn btn-info" disabled>
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-warning" disabled>
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger" disabled>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-success">
                            <i class="fa fa-save"></i>
                        </button>
                        <button class="btn btn-dark">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-footer text-white bg-info">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        DATE: 27.26.20
                    </div>
                    <div class="col-lg-2 col-md-2">
                        PRODUCT NAME: Hi-Q1+HA
                    </div>
                    <div class="col-lg-4 col-md-4 text-center">
                        PRODUCT ORDER LINE: 10394169
                    </div>
                    <div class="col-lg-2 col-md-2 text-right">
                        BATCH: 26.06.20
                    </div>
                    <div class="col-lg-2 col-md-2 text-right">
                        SIZE: 600g
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 py-2 my-2 bg-success text-white">
                    <p class="h6 mb-0 font-weight-bold" style="font-size: 18pt;">
                        การตรวจสอบความถูกต้องของบรรจุภัณฑ์ที่นำมาใช้ในการผลิต
                    </p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">เวลา</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="time" name="" id=""
                                        value="{{ date_format(now(),"H:i") }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">PM CODE</label>
                                <label for="" class="col-sm-1 col-form-label">PM</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 py-2 my-2">
                            <p class="h6 mb-0 font-weight-bold" style="font-size: 14pt;">
                                การตรวจสอบ RAW MATERIAL จาก WAREHOUSE
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">วันที่ผลิต</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="datetime-local" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">วันหมดอายุ/ควรบริโภคก่อน</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="date" name="" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Material Number</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Batch</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Product Order/Line</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 py-2 my-2">
                            <p class="h6 mb-0 font-weight-bold" style="font-size: 14pt;">
                                รายละเอียดของ Shipper Carton
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">PM CODE</label>
                                <label for="" class="col-sm-1 col-form-label">PM</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">ช้อนเบอร์</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">PM CODE</label>
                                <label for="" class="col-sm-1 col-form-label">PM</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            บันทึกโดย <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>
                            (พนักงานถอดถุงนม)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">รหัสผ่าน</label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                        placeholder="ยืนยันรหัสผ่านเพื่อบันทึกลายเซ็น">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.master')

@section('title', 'FM-PD-132')

@section('style')
<style>
    .table-bordered,
    .table-bordered td,
    .table-bordered th {
        border: 3px solid #aaa8a8;
        font-size: 14px;
    }

    .table-bordered td {
        padding: 0;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 3px solid #aaa8a8;
    }
</style>

<style>
    .btn {
        font-size: 14px;
    }
</style>

<style>
    /* The container */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 0px;
        cursor: pointer;
        font-size: 14px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 30px;
        width: 30px;
        background-color: rgb(255, 255, 255);
        border: 3px solid #1e5180;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 8px;
        height: 15px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .box {
        padding: 0px;
    }

    /* .btn{
        background-color: white;
        border-radius: 0rem;
    } */
</style>
@endsection

@section('main')
<form action="{{ url('/FM-PD-132/store/'.$order) }}" method="post">
    @csrf
    <div class="col-md-12 mt-2">
        <div class="card border-info">
            <div class="card-header bg-info">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="box-title m-b-0" style="font-size: 15pt;">FM-PD-132 Rev.11 Verification Oprps And
                            Ccps For Release Product Record</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($head as $item)
                    <div class="col-lg-4">
                        <label> Date: &nbsp;&nbsp; {{ date_format(now(),"Y-m-d") }}</label>
                        <input type="hidden" id="date" name="date" value="{{ date_format(now(),"Y-m-d") }}">
                    </div>
                    <div class="col-lg-8">
                        <label>PRODUCT NAME: {{ $item->material_description }}</label>
                        <input type="hidden" name="product_name">
                    </div>
                    <div class="col-lg-4">
                        <label>PRODUCT ORDER LINE: &nbsp;&nbsp;{{ $item->production_order }}</label>
                        <input type="hidden" name="production_order" value="{{ $item->production_order }}">
                    </div>
                    <div class="col-lg-8">
                        <label>BATCH: &nbsp;&nbsp; {{ $item->batch }}</label>
                        <input type="hidden" name="batch">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-1 py-1">
            <div class="col-lg-12 col-md-12 table-responsive">
                <table class="table table-bordered" border="1">
                    <thead class="text-center bg-info text-white border">
                        <tr>
                            <th>CCP/OPRPs</th>
                            <th colspan="2">RESULT</th>
                            <th>CHECKED BY</th>
                            <th>REMARK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-active">
                            <td class="text-center align-middle px-0 py-0" rowspan="3">
                                OPRP 1 BigBag
                            </td>
                        </tr>
                        <tr class="table-active">
                            <td class="px-0 py-0" colspan="2">
                                <div class="input-group">
                                    <label class="container">ส่วนผสมตรงตามสูตรการผลิต
                                        100%
                                        <input type="radio" name="Bigbag" value="1"
                                            {{ !empty($FM_PD_132->Bigbag) && $FM_PD_132->Bigbag == 1 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                            <td class="text-center align-middle px-0 py-0" rowspan="2">
                                @if(!empty($FM_PD_132->Code_sig_Bigbag))
                                <div>
                                    <div><img src="{{ asset('/assets/images/sign/'.$FM_PD_132->Code_sig_Bigbag) }}"
                                            width="145"></div>
                                </div>
                                @else
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId" data-input="Code_sig_Bigbag"
                                        {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_132->Code_sig_Bigbag)) ? 'disabled' : null }}>
                                        กดเพื่อบันทึกลายเซ็นผู้ตรวจสอบ
                                    </button>
                                </div>
                                @endif
                                {{-- <input type="hidden" name="Code_sig_Bigbag" id="Code_sig_Bigbag"
                                    value="{{ !empty($FM_PD_132->Code_sig_Bigbag) ? $FM_PD_132->Code_sig_Bigbag :  null }}"> --}}
                            </td>
                            <td class="text-center align-middle px-0 py-0" rowspan="2">
                                <textarea class="form-control mx-0 my-0" name="Remarrk_Bigbag"
                                    rows="4"> {{ !empty($FM_PD_132->Remarrk_Bigbag) ? $FM_PD_132->Remarrk_Bigbag : null}}</textarea>
                            </td>
                        </tr>
                        <tr class="table-active">
                            <td colspan="2" class="px-0 py-0">
                                <div class="input-group">
                                    <label class="container">ส่วนผสมไม่ตรงตามสูตรการผลิต
                                        <input type="radio" name="Bigbag" value="2"
                                            {{ !empty($FM_PD_132->Bigbag) && $FM_PD_132->Bigbag == 2 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center align-middle" rowspan="3">
                                OPRP 2 Magnet
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                    <label class="container">เศษผงโลหะที่ปนมากับนม
                                        &lt;
                                        0.02 PPM
                                        หรือ
                                        ผลิตภัณฑ์ที่ส่วนผสมของผงโกโก้ &lt; 0.6
                                        <input type="radio" name="Magnet" value="1"
                                            {{ !empty($FM_PD_132->Magnet) && $FM_PD_132->Magnet == 1 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                @if(!empty($FM_PD_132->Code_sig_Magnet))
                                <div>
                                    <div><img src="{{ asset('/assets/images/sign/'.$FM_PD_132->Code_sig_Magnet) }}"
                                            width="145"></div>
                                </div>
                                @else
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId" data-input="Code_sig_Magnet"
                                        {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_132->Code_sig_Magnet)) ? 'disabled' : null }}>
                                        กดเพื่อบันทึกลายเซ็นผู้ตรวจสอบ
                                    </button>
                                </div>
                                @endif
                                {{-- <input type="hidden" name="Code_sig_Magnet" id="Code_sig_Magnet"
                                    value="{{ !empty($FM_PD_132->Code_sig_Magnet) ? $FM_PD_132->Code_sig_Magnet :  null }}"> --}}
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                <textarea class="form-control mx-0 my-0" name="Remarrk_Magnet"
                                    rows="4">{{ !empty($FM_PD_132->Remarrk_Magnet) ? $FM_PD_132->Remarrk_Magnet : null}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                    <label class="container">
                                        เศษผงโลหะที่ปนมากับนม &gt; 0.02 PPM หรือ
                                        ผลิตภัณฑ์ที่ส่วนผสมของผงโกโก้ &gt;
                                        0.6
                                        PPM
                                        <input type="radio" name="Magnet" value="2"
                                            {{ !empty($FM_PD_132->Magnet) && $FM_PD_132->Magnet == 2 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="table-active">
                            <td class="text-center align-middle" rowspan="3">
                                CCP 1 Vibratory sieve
                            </td>
                        </tr>
                        <tr class="table-active">
                            <td colspan="2">
                                <div class="input-group">
                                    <label class="container">
                                        ตะแกรงอยู่ในสภาพสมบูรณ์ ไม่ขาดชำรุด
                                        และขนาดของช่องตะแกรงยังคงเหมือนเดิม
                                        <input type="radio" name="Vibratory_Sieve" value="1"
                                            {{ !empty($FM_PD_132->Vibratory_Sieve) && $FM_PD_132->Vibratory_Sieve == 1 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                @if(!empty($FM_PD_132->Code_sig_Vibratory_Sieve))
                                <div>
                                    <div><img
                                            src="{{ asset('/assets/images/sign/'.$FM_PD_132->Code_sig_Vibratory_Sieve) }}"
                                            width="145"></div>
                                </div>
                                @else
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId" data-input="Code_sig_Vibratory_Sieve"
                                        {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_132->Code_sig_Vibratory_Sieve)) ? 'disabled' : null }}>
                                        กดเพื่อบันทึกลายเซ็นผู้ตรวจสอบ
                                    </button>
                                </div>
                                @endif
                                {{-- <input type="hidden" name="Code_sig_Vibratory_Sieve" id="Code_sig_Vibratory_Sieve"
                                    value="{{ !empty($FM_PD_132->Code_sig_Vibratory_Sieve) ? $FM_PD_132->Code_sig_Vibratory_Sieve :  null }}"> --}}
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                <textarea class="form-control mx-0 my-0" name="Remarrk_Vibratory_Sieve"
                                    rows="4">{{ !empty($FM_PD_132->Remarrk_Vibratory_Sieve) ? $FM_PD_132->Remarrk_Vibratory_Sieve : null}}</textarea>
                            </td>
                        </tr>
                        <tr class="table-active">
                            <td colspan="2">
                                <div class="input-group">
                                    <label class="container">
                                        ส่วนผสมไม่ตรงตามสูตรการผลิต
                                        <input type="radio" name="Vibratory_Sieve" value="2"
                                            {{ !empty($FM_PD_132->Vibratory_Sieve) && $FM_PD_132->Vibratory_Sieve == 2 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center align-middle" rowspan="3">
                                CCP 2 X-Ray
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                    <label class="container">X-Ray reject
                                        แผ่นทดสอบสแตนเลสขนาด 1.2
                                        มม.
                                        และโลหะขนาด 1.2 มม.
                                        <input type="radio" name="X_Ray" value="1"
                                            {{ !empty($FM_PD_132->X_Ray) && $FM_PD_132->X_Ray == 1 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                @if(!empty($FM_PD_132->Code_sig_X_Ray))
                                <div>
                                    <div><img src="{{ asset('/assets/images/sign/'.$FM_PD_132->Code_sig_X_Ray) }}"
                                            width="145"></div>
                                </div>
                                @else
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId" data-input="Code_sig_X_Ray"
                                        {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_132->Code_sig_X_Ray)) ? 'disabled' : null }}>
                                        กดเพื่อบันทึกลายเซ็นผู้ตรวจสอบ
                                    </button>
                                </div>
                                @endif
                                {{-- <input type="hidden" name="Code_sig_X_Ray" id="Code_sig_X_Ray"
                                    value="{{ !empty($FM_PD_132->Code_sig_X_Ray) ? $FM_PD_132->Code_sig_X_Ray :  null }}"> --}}
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                <textarea class="form-control mx-0 my-0" name="Remarrk_X_Ray"
                                    rows="4">{{ !empty($FM_PD_132->Remarrk_X_Ray) ? $FM_PD_132->Remarrk_X_Ray : null}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <div class="input-group">
                                    <label class="container">
                                        X-Ray ไม่ reject
                                        แผ่นทดสอบสแตนเลสขนาด
                                        1.2
                                        <input type="radio" name="X_Ray" value="2"
                                            {{ !empty($FM_PD_132->X_Ray) && $FM_PD_132->X_Ray == 2 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="table-active">
                            <td class="text-center align-middle" rowspan="3">
                                CCP 3 A หรือ B Barcode Reader
                            </td>
                        </tr>
                        <tr class="table-active">
                            <td colspan="2">
                                <div class="input-group">
                                    <label class="container">
                                        Barcode reader rejecy บาร์โค้ดผิด, บาร์โค้ดไม่มี
                                        <input type="radio" name="Barcode_Reader" value="1"
                                            {{ !empty($FM_PD_132->Barcode_Reader) && $FM_PD_132->Barcode_Reader == 1 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                @if(!empty($FM_PD_132->Code_sig_Barcode_Reader))
                                <div>
                                    <div><img
                                            src="{{ asset('/assets/images/sign/'.$FM_PD_132->Code_sig_Barcode_Reader) }}"
                                            width="145"></div>
                                </div>
                                @else
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId" data-input="Code_sig_Barcode_Reader"
                                        {{ (Auth::user()->id_type_user != 2 || !empty($FM_PD_132->Code_sig_Barcode_Reader)) ? 'disabled' : null }}>
                                        กดเพื่อบันทึกลายเซ็นผู้ตรวจสอบ
                                    </button>
                                </div>
                                @endif
                                {{-- <input type="hidden" name="Code_sig_Barcode_Reader" id="Code_sig_Barcode_Reader"
                                    value="{{ !empty($FM_PD_132->Code_sig_Barcode_Reader) ? $FM_PD_132->Code_sig_Barcode_Reader :  null }}"> --}}
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                <textarea class="form-control mx-0 my-0" name="Remarrk_Barcode_Reader"
                                    rows="4">{{ !empty($FM_PD_132->Remarrk_Barcode_Reader) ? $FM_PD_132->Remarrk_Barcode_Reader : null}}</textarea>
                            </td>
                        </tr>
                        <tr class="table-active">
                            <td colspan="2">
                                <div class="input-group">
                                    <label class="container">
                                        Barcode reader ไม่ rejecy บาร์โค้ดผิด, บาร์โค้ดไม่มี
                                        <input type="radio" name="Barcode_Reader" value="2"
                                            {{ !empty($FM_PD_132->Barcode_Reader) && $FM_PD_132->Barcode_Reader == 2 ? 'checked' : null }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <p>วิธีการบันทึก:</p>
                                <p>
                                    กดเพื่อบันทึกลายเซ็นผู้ตรวจสอบในช่อง ของ Result
                                    <input type="checkbox" disabled>
                                    <span class="align-self-right">Verified by:</span>
                                </p>
                            </td>
                            <td class="text-center align-middle" colspan="2">
                                @if(!empty($FM_PD_132->Code_sig_Manager))
                                <div>
                                    <div><img src="{{ asset('/assets/images/sign/'.$FM_PD_132->Code_sig_Manager) }}"
                                            width="145"></div>
                                </div>
                                @else
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId" data-input="Code_sig_Manager"
                                        {{ (Auth::user()->id_type_user != 3 || !empty($FM_PD_132->Code_sig_Manager)) ? 'disabled' : null }}>
                                        กดเพื่อบันทึกลายเซ็น Production Manager Assistant Production Manager
                                    </button>
                                </div>
                                @endif
                                {{-- <input type="hidden" name="Code_sig_Manager" id="Code_sig_Manager"
                                    value="{{ !empty($FM_PD_132->Code_sig_Manager) ? $FM_PD_132->Code_sig_Manager :  null }}"> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12 text-right">
                <button type="button" class="btn btn-danger"
                    onclick="window.location.href='{{ url('printer_monitor/'.$order) }}'">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                @if(empty($FM_PD_132))
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i>
                </button>
                @endif
            </div>
        </div>
    </div>
</form>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"
    aria-labelledby="vcenter">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">บันทึกลายเซ็น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="password" class="form-control" name="pass" id="pass" placeholder="รหัสลายเซ็น"
                    autocomplete="off">
                <input type="hidden" name="ID" id="ID">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn waves-effect waves-light btn-success"
                    id="modal_save_pass">บันทึก</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#modal_save_pass').on('click', function(e) {
        var sign_photo = '{{ Auth::user()->sign_photo }}';
        var pass_sign = $('#pass').val();
        var field = $('#ID').val();
        $.ajax({
            type: 'post',
            url: '{{ url('check_pass_sign') }}',
            data: {
                    pass_sign:pass_sign,
                    field: field,
                    pr_order:{{$order}},
                    table_document:'FM_PD_132_main_log'
                },
            beforeSend: function(){
            },
            success: function (pic_sign) {
                console.log(pic_sign);
                if (pic_sign) {
                    alert('บันทึกลายเซ็นสำเร็จ');
                    // alert(user_type_str);
                    $('#'+$('#ID').val()).val(sign_photo);
                    $("button[data-input='" + $('#ID').val() +"']").parent().append('<img src="{{ asset('/assets/images/sign/') }}/'+sign_photo+'" width="145">');
                    $("button[data-input='" + $('#ID').val() +"']").remove();
                    // .replace()
                    $('#ID').val('');
                    $('#pass').val('');
                    $('#modelId').modal('hide');
                } else {
                    alert('รหัสผ่านไม่ถูกต้อง');
                    $('#pass').val('');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    });
</script>

<script>
    //triggered when modal is about to be shown
    $('#modelId').on('show.bs.modal', function(e) {

        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('input');

        //populate the textbox
        $('input[name="pass"]').val($('#'+bookId).val());
        $(e.currentTarget).find('input[name="ID"]').val(bookId);
        // $('#'+bookId).find('input[name="pass"]').val(bookId);
    });
</script>

<script>
    function check_pass_sign(id_pic){
        var user_type_str = id_pic;
        var pass_sign = $('#pass_'+user_type_str).val();
        var sign_photo = '{{ Auth::user()->sign_photo }}';

        $.ajax({
            type: 'post',
            // dataType: 'JSON',
            url: '{{ url('check_pass_sign') }}',
            data: {pass_sign : pass_sign},
            beforeSend: function(){
            },
            success: function (pic_sign) {
                if (pic_sign) {
                    alert('บันทึกลายเซ็นสำเร็จ');
                    $('#'+user_type_str).html('<img src="{{ asset('/assets/images/sign/') }}/'+sign_photo+'" width="145">');
                    $('#'+user_type_str+'_modal').modal('toggle');
                } else {
                    alert('รหัสผ่านไม่ถูกต้อง');
                    $('#'+user_type_str+'_modal').modal('toggle');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            },
            complete: function(){
            },
        });
    }
</script>
@endsection
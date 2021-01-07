<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>@yield('title')</title>

    <link href="{{ asset('assets/dist/css/pages/icon-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/pages/other-pages.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/pages/tab-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/pages/form-icheck.css') }}" rel="stylesheet">

    <!-- user-card -->
    <link href="{{ asset('assets/dist/css/pages/user-card.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('assets/dist/css/style-music.css') }}" rel="stylesheet"> --}}

    <!-- progressbar -->
    <link href="{{ asset('assets/dist/css/pages/progressbar-page.css') }}" rel="stylesheet">
    <!-- select2  -->
    <link href="{{ asset('assets/node_modules/select2/dist/css/select2.css') }}" rel="stylesheet">
    <!-- MAterial Date picker  -->
    <link href="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <!-- touchspin -->
    <link href="{{ asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
    <!-- Date picker plugins css -->
    <link href="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- daterangepicker -->
    {{-- <link href="{{ asset('assets/css/daterangepicker.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/node_modules/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    {{-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}

    <!-- Color picker plugins css -->
    <link href="{{ asset('assets/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">
    <!-- Popup -->
    <link href="{{ asset('assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">
    <!-- icheck -->
    <link href="{{ asset('assets/node_modules/icheck/skins/all.css') }}" rel="stylesheet">
    <!-- dropify -->
    <link href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <!-- datatables bs4 -->
    <link href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Morris -->
    <link href="{{ asset('assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist -->
    <link href="{{ asset('assets/node_modules/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/node_modules/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- lightgallery -->
    <link href="{{ asset('assets/node_modules/lightgallery/css/lightgallery.css') }}" rel="stylesheet" >
    <style media="screen">
        /* start star admin */
            .stretch-card {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: stretch;
                -ms-flex-align: stretch;
                align-items: stretch;
                -webkit-box-pack: stretch;
                -ms-flex-pack: stretch;
                justify-content: stretch;
            }

            .stretch-card>.card {
                width: 100%;
                min-width: 100%;
            }

            .grid-margin {
                margin-bottom: 25px;
            }

            .btn.btn-icons,
            a.btn-icons {
                width: 30px;
                height: 30px;
                padding: 10px;
                border-width: 3px;
                border-style: solid;
                border-color:#999;
               
                text-align: center;
                vertical-align: middle;
            }
        /* end star admin */

        /*---------- input ----------*/
        input[type=number]::-webkit-inner-spin-button {
            /* display: none; */
            /* -webkit-appearance: none; */
        }

        /* OE */
            .card-border{
                border:5px solid #ddd; 
                border-radius:10px;
            }
        /* OE */

        /* table paperless -*/
            .tbl-paperless th, .tbl-paperless td {
                border: 3px solid #aaa8a8 !important;
                vertical-align:middle !important;
                padding: 5px;
                line-height: 1.35;
            }
            .tbl-paperless th {
                border: 3px solid #aaa8a8;
                background-color:#e9ebeb;
                font-size: 16pt;
                font-weight: 700 !important;
            }

            .tbl-paperless td {
                border: 3px solid #aaa8a8 ;
                vertical-align:middle;
                font-size: 14pt;
            }
        /* table paperless -*/

        /* table */
            table {
                width: 100% !important;
                border-collapse: collapse;
            }
            .tbl-dconnect {
                width: 100% !important;
                border-collapse: collapse;
                /* margin-bottom: 1rem; */
                color: #212529; 
            }
            .tbl-dconnect th, .tbl-dconnect td {
                padding: 5px;
                /* padding: 18px 15px; */
                vertical-align: middle;
                border-top: 1px solid #e9ecef;
                /* font-size: 0.875rem;
                line-height: 1.35; */
            }
            .tbl-dconnect thead th {
                padding: 10px;
                color: #fff;
                background: #4aa8e4;
                border-bottom: 2px solid #e9ecef;
            }
            .tbl-dconnect td {
                /* vertical-align: top; */
                font-size: 0.850rem;
                line-height: 1.35;
                /* padding: .45rem; */
            }
            .tbl-dconnect tbody + tbody {
                border-top: 2px solid #e9ecef;
            }
        /* table */

        /* check box custom */
            .style-check-box, .style-radio {
                font-size: 15pt !important;
                vertical-align: middle;
            }

            .container {
                position: relative;
                padding-left: 35px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 18px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
    
            /* Hide the browser's default checkbox */
            .container input {
                /* position: absolute; */
                opacity: 0;
                /* cursor: pointer;
                height: 0;
                width: 0; */
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
        /* check box custom */

        /* zoom */
            .zoom50{
                zoom:0.5;
            }
            .zoom60{
                zoom:0.6;
            }
            .zoom70{
                zoom:0.7;
            }
            .zoom80{
                zoom:0.8;
            }
            .zoom90{
                zoom:0.9;
            }
        /* zoom */
    </style>
    @yield('style')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

{{-- @if(Auth::user()->id_type_user != 2)
<body class="skin-blue fixed-layout">
@else --}}

<body class="skin-blue fixed-layout">
    {{-- @endif --}}
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Dconnect</p>
        </div>
    </div>

    <div id="main-wrapper">
        @include('layouts.navbar')

        @if(Auth::user()->id_type_user == 1)
            @include('layouts.menu.menu-admin')
        @elseif(Auth::user()->id_type_user == 2)
            @include('layouts.menu.menu-operator')
        @elseif(Auth::user()->id_type_user == 3)
            @include('layouts.menu.menu-leader')
        @elseif(Auth::user()->id_type_user == 4)
            @include('layouts.menu.menu-manager')
        @endif

        <div class="page-wrapper">
            <div class="container-fluid" style="">
                <!-- <div class="row page-titles mb-4">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">@yield('topic')</h4>
                  </div>
                
                  <div class="col-md-7 align-self-center- text-right">
                    <div class="d-flex justify-content-end align-items-center">
                      <ol class="breadcrumb">
                        @yield('topics')
                      </ol>
                    </div>
                  </div>
                </div> -->

                @yield('main')
                @include('layouts.right-sidebar')
            </div>
        </div>

        <footer class="footer" style="">
            © 2020 Dconnect by Dcore
        </footer>
    </div>
    <!-- master -->
    <script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/waves.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>

    <!-- select 2 #ddlที่พิมได้-->
    <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- MAterial Date picker  -->
    <script src="{{ asset('assets/node_modules/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <!-- touchspin  -->
    <script src="{{ asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"></script>
    <!-- jquery Date picker -->
    <script src="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- jquery Date Range -->
    <script src="{{ asset('assets/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{ asset('assets/node_modules/jquery-asColor/dist/jquery-asColor.js') }}"></script>
    <script src="{{ asset('assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
    <script src="{{ asset('assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
    <!-- dropify -->
    <script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
    <!-- magnific-popup -->
    <script src="{{ asset('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>
    
    <!-- Chart JS -->
    {{-- <script src="{{ asset('assets/node_modules/Chart.js/chartjs.init.js') }}"></script> --}}
    <script src="{{ asset('assets/node_modules/Chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/Chart.js/chartjs-plugin-gridline-background.js') }}"></script>
    <!-- e chart -->
    <script src="{{ asset('assets/node_modules/echarts/echarts-all.js') }}"></script>
    <!-- icheck -->
    <script src="{{ asset('assets/node_modules/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/icheck/icheck.init.js') }}"></script>
    <!-- justgage -->
    <script src="{{ asset('assets/node_modules/justgage-1.2.2/raphael-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/justgage-1.2.2/justgage.js') }}"></script>
    <!-- datatable -->
    <script type="text/javascript" src="{{asset('/assets/dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    {{-- <script src="{{ asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script> --}}
    <!-- lightgallery -->
    <script src="{{ asset('assets/node_modules/lightgallery/js/lightgallery-all.min.js')}}"></script>
    
    <script type="">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        });
        
        $.fn.replaceClass = function (pFromClass, pToClass) {
        return this.removeClass(pFromClass).addClass(pToClass);
        };

        // disabled key enter to submit form
        $('form').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });

        // set_light_gallery
        function set_light_gallery(element) {
            $(`${element}`).lightGallery({
                // thumbnail: true,
                // animateThumb: false,
                // showThumbByDefault: false
            });
        }

        // set_dropify
        var dropify_;
        function set_dropify(element, default_file=null) {
            // console.log(default_file);
            // default_file = `{{ asset('assets/d-know/category/damaway.gif') }}`;
            // dropify_ = $(`${element}`).dropify();
            // dropify_.data('dropify').resetPreview();

            dropify_ = $(`${element}`).dropify({
                defaultFile: default_file,

                messages: {
                    default: 'ลากไฟล์มาวาง หรือคลิกที่นี่',
                    replace: "Drag and drop or click to replace",
                    remove: 'ลบ',
                    error: "Ooops, มีบางอย่างผิดพลาด"
                },
                error: {
                    fileSize: 'The file size is too big ( value max).',
                    minWidth: 'The image width is too small ( value px min).',
                    maxWidth: 'ความกว้างของรูปภาพ is too big (@{{ value } px max).',
                    minHeight: 'ความสูงของรูปภาพ is too small (value px min).',
                    maxHeight: 'ความสูงของรูปภาพ is too big (value px max).',
                    imageFormat: 'The image format is not allowed (value เท่านั้น).',
                    fileExtension: 'ไฟล์ is not allowed (@{value} เท่านั้น).',
                }
            }); 
        }

        // set_select2
        function set_select2(element, value=null) {
            // console.log(name,value);
            // value_ = value==null ?0 :value;
            if(value === 'empty') { 
                $(`${element}`).val(null);
            }

            $(`${element}`).select2({
                placeholder: "-- กรุณาเลือก --",
                allowClear: true, // ปุ่ม clear
                language: {
                    searching: function() {
                        return "ค้นหาจ้า";
                    },
                    noResults: function () {
                        return 'ไม่มีข้อมูล';
                    },
                },
            });
        }
        
        //set_touchspin
        function set_touchspin(name_element) {
            $(`input[name="${name_element}"]`).TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 1,
                boostat: 5,
                maxboostedstep: 10,
                buttonup_class: 'btn btn-secondary',
                buttondown_class: 'btn btn-secondary',
                buttonup_txt: '+',
                buttondown_txt: '-',
                verticalupclass: '',
                verticaldownclass: '',
                // postfix: '%'
            });
        }
        
        // setdatepicker
        function set_datepicker(name_element, date=new Date()) {
            // console.log(date);
            let date_picker = jQuery(`input[name="${name_element}"]`).datepicker({
                default: true,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                /*
                    format: {
                        toDisplay: function (d, format, language) {
                            // console.log( d.getMonth()+1 );
                            return d.getDate() +'/'+ (d.getMonth()+1) +'/'+ d.getFullYear();
                        },
                        toValue: function (d, format, language) {
                            var d = new Date(d),
                            month = '' + (d.getMonth() + 1),
                            day = '' + d.getDate(),
                            year = d.getFullYear();

                            if (month.length < 2) month = '0' + month;
                            if (day.length < 2) day = '0' + day;

                            return [year, month, day].join('-');
                        }
                    },
                    setDate: new Date,
                    defaultDate: "25/11/2020",
                */
            });

            date_picker.datepicker('setDate', date); // set วันที่ (selected, textbox)

            date_picker.on('change', function(e) {
                let yyyy_mm_dd = moment($(`input[name="${name_element}"]`).datepicker("getDate")).format('YYYY-MM-DD');
                $(`input[name="test_date"]`).val(yyyy_mm_dd);
            });
        }
        
        // setdaterangepicker
        function set_daterangepicker(element, date=new Date()) {
            // console.log(date);
            let date_rangepicker = jQuery(`${element}`).datepicker({
                default: true,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                toggleActive: true,
            });

            date_rangepicker.datepicker('setDate', date); // set วันที่ (selected, textbox)
        }
        
        // setdaterange
        var date_range = {};
        function set_daterange(element, date=new Date()) {
            let data_start = moment(date).format('DD-MM-YYYY');
            let data_end = moment(date).add(7, 'd').format('DD-MM-YYYY');

            date_range[$(element).attr('id')] = $(element).daterangepicker({
                autoApply: true,
                startDate: data_start,
                endDate: data_end,
                locale: {
                    format: 'DD/MM/YYYY',
                }
            });

            // console.log( date_range );
            // date_range.data('daterangepicker').endDate.format('YYYY-MM-DD')
            // date.setDate(date.getDate() + 7)
        }

        // set_bootstrap_material_datepicker MAterial Date picker
        function set_bootstrap_material_datepicker(name_element) {
            $(`input[name="${name_element}"]`).bootstrapMaterialDatePicker({
                weekStart: 0,
                time:false,
                format : 'DD/MM/YYYY' //
            });
        }

        // checkbox แบบเลิอกได้อันเดียว ติ๊กออกได้
        function CheckOnlyOne(that){
            // console.log(that);
            $(`input[name="${that.name}"]`).not(that).prop('checked', false);
        }
        // $('input[name="spoon_type"]').on('change', function() {
        //     $('input[name="spoon_type"]').not(this).prop('checked', false);
        // });
        
        // ยืนยันลายเซ็น Operator ก่อนบันทึกข้อมูล
        $('#btn-save').click(function (e) { 
            if( $('#txt_sign_operator').val() == 0) {
                alert('กรุณายืนยันลายเซ็นก่อนทำการบันทึกข้อมูล');
                return false;
            } else {
                // console.log( $(this).parents('form').attr('method') );
                $(this).parents('form').submit();
                $(this).attr('disabled',true);
            }
        });

        // ลายเซ็น
        function check_pass_sign(user_type, pr_order, table_document=''){
            var user_type_str = user_type;
            var pass_sign = $('#pass_'+user_type_str).val();
            var sign_photo = '{{ Auth::user()->sign_photo }}';
            $.ajax({
                type: 'post',
                // dataType: 'JSON',
                url: '{{ url('check_pass_sign') }}',
                data: {
                    pass_sign:pass_sign,
                    pr_order:pr_order,
                    user_type_str:user_type_str,
                    table_document:table_document,
                },
                beforeSend: function(){
                },
                success: function (response) {
                    console.log(response); 
                    // return false;
                    alert(response.message);
                    if (response.check_password) {
                        if(user_type == 'sign_operator' || user_type == 'sign_operator1') {
                            // sign_operator => operator(พนง) ทั่วไปหน้าที่เซ็นบันทึกข้อมูล
                            // sign_operator1 => operator(พนง) ที่มีหน้าที่เซ็นตรวจสอบเอกสารอีกครั้ง || เป็น operator ที่มีตำแหน่งต่างกัน แต่อยุ่ในโซนเดียวกัน (packing, filling)
                            $(`#txt_${user_type_str}`).val(response.data_user.sign_photo);

                        } else if(user_type == 'sign_leader') {
                            // แยกกันไว้ก่อน เผื่อมีอะไรเพิ่ม
                            // $(`#txt_${user_type_str}`).val(response.data_user.sign_photo);
                        }
                        
                        $(`#btn_${user_type_str}`).toggleClass('d-none');
                        $('#'+user_type_str).toggleClass('d-none').html(`<img src="{{ asset('assets/images/sign/${response.data_user.sign_photo}') }}" width="144">`);
                        $('#'+user_type_str+'_modal').modal('toggle');
                        $('#'+user_type_str).append('<br><b>( '+response.data_user.name+' )</b>');
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
                    alert("Status: " + textStatus + "\nError: " + errorThrown);
                },
                complete: function(){
                },
            });
        }

        // สีของ chart แต่ละ line
        function chart_color(line) {
            if(line==1){
                line_color = '#fec107';
            } else if(line==2){
                line_color = '#03a9f3';
            } else if(line==3){
                line_color = '#e46a76';
            } else if(line==4){
                line_color = '#55ce63';
            } else if(line==5){
                line_color = '#fb9678';
            } else if(line==6){
                line_color = '#343a40';
            }
            return line_color;
        }

        // percent_per_quantity จำนวนที่ผลิตได้ ณ เวลานั้น เป็นกี่ % ของจำนวนทั้งหมดจาก sapheader
        function percent_per_quantity(quantity_now, quantity_to_make) { // 
            // (num/100)*per;
            var result = (Number(quantity_now) * 100) / Number(quantity_to_make);
            if(isNaN(result) || result=='Infinity'){
                result = 0;
            }

            return result.toFixed(2);
        }

        // ฟังชั่น sim3
        function func_target(target, x,y) {
          var new_x = (x ? x : 0 );
          
          if(target === '>') {
            return new_x > y;
          }
          else if(target === '<') {
            return new_x < y;
          }
          else if(target === '>=') {
            return new_x >= y;
          }
          else if(target === '<=') {
            return new_x <= y;
          }
          else if(target === '==') {
            return new_x == y;
          }
          /*
            switch (target) {
              case '>':
                return x > y;
              break;

              case '<':
                return x < y;
              break;

              case '>=':
                return x >= y;
              break;

              case '==':
                return x == y;
              break;
            
              default:
              break;
            }
          */
        }

        // ฟังชั่น นาฬิกา
        var arr_month = [
            'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.',
            'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'
        ];

        $(function () {
            var thaiDate = new Date();
            var dd = thaiDate.getDate();
            var mm = arr_month[thaiDate.getMonth()];
            var yyyy = new String(thaiDate.getFullYear()+543).substr(2,4);
            $('.date_now').html(dd+' '+mm+' '+yyyy);

            setInterval(function(){
                var Now = new Date();

                var h = Now.getHours();
                var m = new String(Now.getMinutes());
                if(m.length==1){
                    m='0'+m;
                }
                var s = new String(Now.getSeconds());
                if(s.length==1){
                    s='0'+s;
                }
                $('.time_now').html(h +':'+ m +':'+ s).val(h +':'+ m);
            },1000);
        });

        function delete_record(id,table_name) {
            if(confirm('ต้องการลบข้อมูลหรือไม่ ?')) {
                $.ajax({
                    type: 'post',
                    // dataType: 'JSON',
                    url: '{{ url('delete_record_paper') }}',
                    data: {
                        id: id,
                        table_name: table_name,
                    },
                    beforeSend: function(){
                    },
                    success: function (response) {
                        alert('ลบข้อมูลสำเร็จ');
                        location.reload(true);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest.responseJSON, XMLHttpRequest.responseText);
                        alert("Status: " + textStatus + "\nError: " + errorThrown);
                    },
                    complete: function(){
                    },
                }); 
            }
        }
    </script>
    @yield('script')
</body>

</html>
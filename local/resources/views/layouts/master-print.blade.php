<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PRINT | @yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')}}">

    <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    
    <style>
        @page {
            size: landscape;
            margin: 0.5cm 0.5cm 0.5cm 0.5cm; /*t r b l*/
        } 
        @media screen {
            /* .tbl-paperless thead { display: block; }
            .tbl-paperless tfoot { display: block; } */
        }
        @media print {
            .tbl-paperless thead { display: table-header-group; }
            .tbl-paperless tfoot { display: table-footer-group; }

            .header, .footer {
                display: none;
            }
        }

        /* table paperless -*/
            .style-check-box,
            .style-radio {
                font-size: 15pt !important;
                vertical-align: middle;
            }

            .tbl-paperless {
                width: 100%;
                /* font-family: "THSarabunNew"; */
            }

            .tbl-paperless th, .tbl-paperless td {
                color:#000;
                background-color:#fff;
                border: 1px solid #000 !important;
                vertical-align: middle;
                line-height: 1;
            }

            .tbl-paperless th {
                font-size: 6pt !important;
                font-weight: bolder;
                padding-top: 5px;
                padding-bottom: 5px; 
                padding-left: 5px;
                padding-right: 5px;
            }

            .tbl-paperless td {
                /* background-color:yellow; */
                font-size: 5pt !important;
                padding-top: 5px; 
                padding-bottom: 5px; 
                padding-left: 5px;
                padding-right: 5px;
            }
        /* table paperless -*/
    </style>
    @yield('style')
</head>

<body class="px-5 py-3">
    @yield('main')
    
    <script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="">   
        $(document).ready(function () {
            PrintDocument('print-area');
        }); 
        
        function PrintDocument(divName) {
            // console.log( $('.tr-paperless').length );
            // return false;
            
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            if($('.tr-paperless').length >= 4){
                $('.tr-paperless').eq(4).css({'page-break-after':'always'});
                // var css = '.tr-paperless { page-break-after: always; }';
            
                // var head = document.head || document.getElementsByTagName('head')[0];
                // var style = document.createElement('style');
                // style.type = 'text/css';
                // style.media = 'print';
                // style.appendChild(document.createTextNode(css));
                // head.appendChild(style);
                // console.log(head);
            }
            // var css = '@page {size: landscape;}',
            // head = document.head || document.getElementsByTagName('head')[0],
            // style = document.createElement('style');
            // console.log('55'+head); return false;
            

            /*
                if (style.styleSheet) {
                    style.styleSheet.cssText = css;
                } else {
                    style.appendChild(document.createTextNode(css));
                }
            */
            
            // style.appendChild(document.createTextNode(css));
            // head.appendChild(style);

            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>
    @yield('script')
</body>

</html>
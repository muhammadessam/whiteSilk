<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>

    <link rel="icon" type="image/x-icon" href="{{asset('admins/assets/img/favicon.ico')}}"/>
    <link href="{{asset('admins/assets/css/loader.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('admins/assets/js/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('admins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admins/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/plugins/table/datatable/custom_dt_custom.css')}}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link href="{{asset('admins/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admins/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css"/>
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('admins/assets/css/forms/theme-checkbox-radio.css')}}">--}}
    <link href="{{asset('admins/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"/>
    <link href="{{asset('admins/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admins/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admins/assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admins/assets/css/forms/switches.css')}}">


    @yield('css')
    <style>
        .delete-btn {
            background-color: white;
            border: 0px;
        }

        .dataTables_length {
            display: inline-block;
        }

        .dt-buttons {
            display: inline-block;
            margin-right: 10px;
        }

        .dataTables_filter {
            display: inline-block;
            float: left;
        }

        .dataTables_paginate {
            float: left;
        }
    </style>
</head>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/admin/images/logo.png")}}">
    <title>{{trans('web.app-title')}}</title>
    <link href="{{asset("assets/admin/")}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset("assets/admin/")}}/css/footable.core.css" rel="stylesheet">
    <link href="{{asset("assets/admin/")}}/css/bootstrap-select.min.css" rel="stylesheet"/>
    <link href="{{asset("assets/admin/")}}/css/dropify.min.css" rel="stylesheet"/>
    <link href="{{asset("assets/admin/")}}/css/animate.css" rel="stylesheet">
    <link href="{{asset("assets/admin/")}}/css/style.css" rel="stylesheet">

    @if(app()->getLocale() == "ar")
        <link href="{{asset("assets/admin/")}}/css/ar.css" rel="stylesheet">
    @endif



    @yield("css")
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

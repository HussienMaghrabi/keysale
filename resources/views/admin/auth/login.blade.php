<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/admin/images/logo.png")}}">
    <title>{{trans('web.app-title')}}</title>
    <link href="{{url('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/admin/css/style.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<section id="wrapper" class="login-register login-sidebar"
         style="background-image:url({{url('assets/admin/images/login-register.jpg')}});">


    <div class="login-box card">

        <br>


        <div class="card-body">
            <a href="javascript:void(0)" class="text-center db">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <img style="width: 40%;" src="{{url('assets\admin\images\logo.png')}}"
                     alt="Logo"/>
                <br>
                <form class="form-horizontal form-material" id="loginform" method="POST"
                      action="{{ url('adminlogin') }}">
                    @csrf
                    <div class="form-group m-t-40">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('danger'))
                            <div class="alert alert-danger"
                                 style="font-weight: bold"> {{ Session::get('danger') }}</div>
                        @endif

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} text-center"
                                       type="email" name="email" required
                                       placeholder="{{ __('language.email') }}" value="{{ old('email') }}">
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} text-center"
                                    name="password" type="password" required
                                    placeholder="{{ __('language.password') }}">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit">  {{ __('language.login') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group text-center ">
                            <div class="form-group text-center col-12" style="display: flex;">

                                <a class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                   href="{{ url("".url()->full()."?&lang=ar") }}"
                                   style="color: #FFF;margin-right: 10px;display: none;">{{trans('web.arabic')}}
                                </a>

                                <a class="btn btn-outline-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                   href="{{ url("".url()->full()."?&lang=ar") }}"
                                   style="margin-right: 10px;">{{trans('web.arabic')}}
                                </a>
                                <a class="btn btn-outline-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                   href="{{ url("".url()->full()."?&lang=en") }}"
                                   style="">{{trans('web.english')}}
                                </a>
                            </div>

                        </div>

                    </div>
                </form>
            </a>
        </div>
    </div>

</section>
<script src="{{url('assets/admin/js/jquery.min.js')}}../"></script>

</body>
</html>

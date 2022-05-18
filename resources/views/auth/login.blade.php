@extends('.site.layout.container')
@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center" style="height: 540px">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{url("/loginAction")}}">
                            @csrf

                            @if ($errors->any())
                                <div class="" style="text-align: right; color: #F0758A ; font-weight: bold;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(Session::has('alert'))
                                <div class="" style="text-align: right; color: #F0758A ; font-weight: bold;direction: rtl">
                                    <ul>
                                        <li class="">{{ Session::get('alert') }}</li>
                                    </ul>
                                </div>

                            @endif @if(Session::has('success'))
                                <div class="" style="text-align: right; color: darkslategrey ; font-weight: bold;direction: rtl">
                                    <ul>
                                        <li class="">{{ Session::get('success') }}</li>
                                    </ul>
                                </div>

                            @endif

                            <div class="form-group row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right">{{ __('mobile') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="mobile"
                                           class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                           name="mobile" value="{{ old('mobile') }}" required autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary col-md-12">
                                        {{ __('Login') }}
                                    </button>

                                    {{--                                @if (Route::has('password.request'))--}}
                                    {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--                                        {{ __('Forgot Your Password?') }}--}}
                                    {{--                                    </a>--}}
                                    {{--                                @endif--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

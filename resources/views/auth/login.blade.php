
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('site.Login Page')</title>

    <!-- Fonts -->
    <link href="/css/login.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="loginpage" id="login" >

        @if (Route::has('login'))
              <div class="loginbxo">
                  <div class="row">
                      <div class="col-sm-4 sidelogin"  dir="rtl">

                      </div>
                        <div class="col-sm-8 padding">
                            <form method="POST" @submit="submitform($event)" dir="rtl">
                                @csrf
                                <h3 class="text-right">@lang('site.Login ')</h3>
                                <hr>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('site.E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" v-model="email"  required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('site.Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" v-model="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            {{--<input class="form-check-input" type="checkbox" v-model="remember" id="remember" >
                                            <label class="form-check-label" for="remember">
                                                {{ __('site.Remember Me') }}
                                            </label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 text-right " dir="rtl">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('site.Login') }}
                                        </button>
                                        <a href="/register" type="submit" class="btn btn-danger">
                                            {{ __('site.Register') }}
                                        </a>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('site.Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <ul v-if="error != null">
                                    <li v-for="item in error">@{{ item[0] }}</li>
                                </ul>
                            </form>

                        </div>
                  </div>
              </div>
       @endif

</div>
<script src="/js/login.js"></script>
</body>
</html>

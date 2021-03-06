@extends('layouts.frontend')

@section('content')
<div class="bg_color_2">
    <div class="container margin_60_35">
        <div id="login">
            <h1>مرحبا بك في عيادتك</h1>
            <div class="box_form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ادخل البريد الالكتروني" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="اخل كلمة السر" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <a href="{{ route('password.request') }}"><small>نسيت كلمة السر ؟</small></a>
                    <div class="form-group text-center add_top_20">
                        <input class="btn_1 medium" type="submit" value="ادخل">
                    </div>
                </form>
            </div>
            <p class="text-center link_bright">ليس ليك حساب ؟ <a href="{{route('register')}}"><strong>انشاء حساب</strong></a></p>
        </div>
        <!-- /login -->
    </div>
</div>
@endsection

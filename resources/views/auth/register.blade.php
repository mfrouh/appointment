@extends('layouts.frontend')

@section('content')
<div id="hero_register">
    <div class="container margin_120_95">
        <div class="row">
            <div class="col-lg-6 text-right">
                <h1>It's time to find you!</h1>
                <div class="box_feat_2">
                    <i class="pe-7s-map-2"></i>
                    <h3>Let patients to Find you!</h3>
                    <p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
                </div>
                <div class="box_feat_2">
                    <i class="pe-7s-date"></i>
                    <h3>Easly manage Bookings</h3>
                    <p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
                </div>
                <div class="box_feat_2">
                    <i class="pe-7s-phone"></i>
                    <h3>Instantly via Mobile</h3>
                    <p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
                </div>
            </div>
            <!-- /col -->
            <div class="col-lg-5 ml-auto">
                <div class="box_form">
                    <form method="POST" action="{{ route('register') }}">
                     @csrf
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <input id="name" type="text" placeholder="الاسم" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="البريد الالكتروني" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input id="password" type="password"  placeholder="كلمة السر" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="تاكيد كلمة السر" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center add_top_30"><input type="submit" class="btn_1" value="انشاء"></p>
                    </form>
                    <p class="text-center link_bright">لديك حساب ؟ <a href="{{route('login')}}"><strong>ادخل الان</strong></a></p>
                </div>
                <!-- /box_form -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection

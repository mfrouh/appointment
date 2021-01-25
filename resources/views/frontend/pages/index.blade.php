@extends('layouts.frontend')
@section('content')
<div class="hero_home version_1">
    <div class="content">
        <h3 class="p-2">ابحث عن دكتور</h3>
        <form method="post" action="/search">
            <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" class=" search-query" placeholder=" دكتور">
                    <input type="submit" class="btn_search" value="بحث">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container margin_120_95">
    <div class="main_title">
        <h2> احجز كشف الان <strong>عن طريق الانترنت</strong> </h2>
    </div>
    <div class="row add_bottom_30">
        <div class="col-lg-4">
            <div class="box_feat" id="icon_1">
                <span></span>
                <h3>ابحث عن الدكتور</h3>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box_feat" id="icon_2">
                <span></span>
                <h3>شاهد معلومات عن الدكتور</h3>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box_feat" id="icon_3">
                <h3>احجز كشف</h3>
            </div>
        </div>
    </div>
    <!-- /row -->
    <p class="text-center"><a href="/clinics" class="btn_1 medium">ابحث عن الدكتور</a></p>
</div>
@endsection

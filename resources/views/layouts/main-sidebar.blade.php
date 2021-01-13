<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
                @php
                    $setting=App\Models\Setting::first();
                @endphp
				<a class="desktop-logo logo-light active" href="{{ url('/') }}"><img src="{{URL::asset($setting->logo)}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img class="avatar avatar-xl brround" src="{{URL::asset(auth()->user()->image)}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/dashboard' ) }}"><span class="side-menu__label">الرئيسية</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/speciality' ) }}"><span class="side-menu__label">التخصصات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic' ) }}"><span class="side-menu__label">العيادات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/booking' ) }}"><span class="side-menu__label">الحجوزات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/appointment' ) }}"><span class="side-menu__label">الكشوفات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/surgery' ) }}"><span class="side-menu__label">العمليات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/followup' ) }}"><span class="side-menu__label">المتابعات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/patient' ) }}"><span class="side-menu__label">المرضي</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/prescription' ) }}"><span class="side-menu__label">الروشيتات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic/blacklist' ) }}"><span class="side-menu__label">القائمة السوداء</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic/appointmentdate' ) }}"><span class="side-menu__label">مواعيد الحجوزات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic/workdate' ) }}"><span class="side-menu__label">ايام العمل</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic/social' ) }}"><span class="side-menu__label">التواصل الاجتماعي للعيادة</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic/education' ) }}"><span class="side-menu__label">التعليم</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic/experience' ) }}"><span class="side-menu__label">الخبرات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/clinic/service' ) }}"><span class="side-menu__label">الخدمات</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/reviews' ) }}"><span class="side-menu__label">الاراء</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/gallery' ) }}"><span class="side-menu__label">الصور</a>
                    </li>
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->

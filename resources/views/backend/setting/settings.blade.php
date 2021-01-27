@extends('layouts.app')
@section('title')
الاعدادات
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto"> الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-blacklist" class="text-center"><div class="card-body">القائمة السوداء</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-workdate" class="text-center"><div class="card-body">ايام العمل</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-appointmentdate" class="text-center"><div class="card-body">مواعيد الحجوزات</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-social" class="text-center"><div class="card-body">التواصل الاجتماعي للعيادة</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-education" class="text-center"><div class="card-body">التعليم</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-experience" class="text-center"><div class="card-body">الخبرات</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-service" class="text-center"><div class="card-body">الخدمات</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-reviews" class="text-center"><div class="card-body">الاراء</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/clinic-gallery" class="text-center"><div class="card-body">الصور</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/change-password" class="text-center"><div class="card-body">تغير كلمة السر</div></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-left">
           <a href="/profile-setting" class="text-center"><div class="card-body">تعديل البيانات الشخصية</div></a>
        </div>
    </div>
</div>
@endsection


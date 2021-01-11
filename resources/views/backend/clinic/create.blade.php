@extends('layouts.app')
@section('title')
انشاء عيادة
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">انشاء عيادة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">انشاء عيادة</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form action="/clinic" method="post"  enctype="multipart/form-data">
                 @csrf
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>اسم العيادة </label>
                        <input type="text" class="form-control" name="clinic_name" value="{{old('clinic_name')}}"  >
                    </div>
                    @error('clinic_name')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>صورة العيادة </label>
                        <input type="file" class="form-control" name="image" value="{{old('image')}}" accept="*/image"  >
                    </div>
                    @error('image')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>العنوان </label>
                        <input type="text" class="form-control" name="address" value="{{old('address')}}"  >
                    </div>
                    @error('address')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">المدينة</label>
                        <input type="text" class="form-control" name="city"  value="{{old('city')}}" >
                    </div>
                    @error('city')
                          <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">الشارع</label>
                        <input type="text" class="form-control" name="state" value="{{old('state')}}"  >
                    </div>
                    @error('state')
                        <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">البلد</label>
                        <input type="text" class="form-control" name="country" value="{{old('country')}}">
                    </div>
                    @error('country')
                       <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">وقت الكشف</label>
                        <select class="form-control select"  name="time_appointment">
                            <option value="15"{{old('time_appointment')=='15'?'selected':''}} >15</option>
                            <option value="30"{{old('time_appointment')=='30'?'selected':''}} >30</option>
                            <option value="45"{{old('time_appointment')=='45'?'selected':''}} >45</option>
                            <option value="60"{{old('time_appointment')=='60'?'selected':''}} >60</option>
                        </select>
                    </div>
                    @error('time_appointment')
                       <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">سعر الكشف</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                    </div>
                    @error('price')
                        <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ايام الحجوزات </label>
                        <select class="form-control select"  name="type_booking">
                            <option value="7"  {{old('type_booking')=='7'?'selected':''}} >7</option>
                            <option value="14" {{old('type_booking')=='14'?'selected':''}} >14</option>
                            <option value="30" {{old('type_booking')=='30'?'selected':''}} >30</option>
                        </select>
                    </div>
                    @error('type_booking')
                      <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-12 text-center">
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary" value="حفظ">
                    </div>
                </div>

                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('title')
حجز معاد
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">حجز معاد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">حجز معاد</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form method="POST" action="/booking">
                    @csrf
                    <div class="form-group">
                      <label for="">اسم المريض</label>
                      <input type="text" name="name"  class="form-control" value="{{old('name')}}" placeholder="اسم المريض">
                      @error('name')
                      <small id="name" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="">العمر</label>
                        <input type="number" name="age" min="1"  class="form-control" value="{{old('age')}}" placeholder="العمر">
                        @error('age')
                          <small id="age" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">رقم التلفون</label>
                        <input type="text" name="phone_number"   class="form-control" value="{{old('phone_number')}}" placeholder="رقم التلفون">
                        @error('phone_number')
                        <small id="age" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">النوع</label>
                        <select name="gender" class="form-control">
                            <option value="male" {{old('gender')=='male'?'selected':''}}>ذكر</option>
                            <option value="female" {{old('gender')=='female'?'selected':''}}>أنثي</option>
                        </select>
                        @error('gender')
                        <small id="age" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">يوم الحجز</label>
                        <input type="date" name="day" class="form-control" value="{{old('day')}}" placeholder="يوم الحجز">
                        @error('day')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="">ساعة الحجز</label>
                          <input type="time" name="time" class="form-control" value="{{old('time')}}" placeholder="ساعة الحجز">
                          @error('time')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                          @enderror
                      </div>
                     <div class="form-group text-center">
                         <input type="submit" class="btn btn-primary" value="حفظ">
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

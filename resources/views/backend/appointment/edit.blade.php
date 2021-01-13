@extends('layouts.app')
@section('title')
تعديل كشف
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">تعديل كشف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">تعديل كشف</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form action="/appointment/{{$appointment->id}}" method="post">
                 @csrf
                 @method('put')
                    <div class="form-group">
                      <label for="">المريض</label>
                      <select name="patient_id" class="form-control">
                          @foreach ($patients as $patient)
                            <option value="{{$patient->id}}" {{$patient->id==$appointment->patient_id?"selected":''}}>{{$patient->name}}</option>
                          @endforeach
                      </select>
                      @error('patient_id')
                        <small id="helpId" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">يوم الكشف</label>
                      <input type="date" name="day" class="form-control" value="{{$appointment->day}}" placeholder="يوم الكشف">
                      @error('day')
                        <small id="helpId" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="">ساعة الكشف</label>
                        <input type="time" name="time" class="form-control" value="{{$appointment->time}}" placeholder="ساعة الكشف">
                        @error('time')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">سعر الكشف</label>
                        <input type="text" name="price" class="form-control" value="{{$appointment->price}}" placeholder="سعر الكشف">
                        @error('price')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">التشخيص</label>
                        <textarea name="diagnose" class="form-control" rows="4">{{$appointment->diagnose}}</textarea>
                        @error('diagnose')
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

@extends('layouts.app')
@section('title')
انشاء عملية
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">انشاء عملية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">انشاء عملية</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form action="/surgery" method="post">
                 @csrf
                    <div class="form-group">
                      <label for="">المريض</label>
                      <select name="patient_id" class="form-control">
                          @foreach ($patients as $patient)
                            <option value="{{$patient->id}}" {{$patient->id==old('patient_id')?"selected":''}}>{{$patient->name}}</option>
                          @endforeach
                      </select>
                      @error('patient_id')
                        <small id="helpId" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">يوم العملية</label>
                      <input type="date" name="day" class="form-control" value="{{old('day')}}" placeholder="يوم العملية">
                      @error('day')
                        <small id="helpId" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="">ساعة العملية</label>
                        <input type="time" name="time" class="form-control" value="{{old('time')}}" placeholder="ساعة العملية">
                        @error('time')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">سعر العملية</label>
                        <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="سعر العملية">
                        @error('price')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">اسم العملية</label>
                        <input type="text" name="name" class="form-control" rows="4" value="{{old('name')}}" placeholder="اسم العملية">
                        @error('name')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">اسم المستشفي</label>
                        <input type="text" name="hospital_name" class="form-control" rows="4" value="{{old('hospital_name')}}">
                        @error('hospital_name')
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

@extends('layouts.app')
@section('title')
تعديل مريض
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">تعديل مريض</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">تعديل مريض</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form method="POST" action="/patient/{{$patient->id}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="">اسم المريض</label>
                      <input type="text" name="name"  class="form-control" value="{{$patient->name}}" placeholder="اسم المريض">
                      @error('name')
                      <small id="name" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="">العمر</label>
                        <input type="number" name="age" min="1"  class="form-control" value="{{$patient->age}}" placeholder="العمر">
                        @error('age')
                          <small id="age" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">رقم التلفون</label>
                        <input type="text" name="phone_number"   class="form-control" value="{{$patient->phone_number}}" placeholder="رقم التلفون">
                        @error('phone_number')
                        <small id="age" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">النوع</label>
                        <select name="gender" class="form-control">
                            <option value="male" {{$patient->gender=='male'?'selected':''}}>ذكر</option>
                            <option value="female" {{$patient->gender=='female'?'selected':''}}>أنثي</option>
                        </select>
                        @error('gender')
                        <small id="age" class="text-muted">{{$message}}</small>
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

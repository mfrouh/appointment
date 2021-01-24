@extends('layouts.app')
@section('title')
تعديل عيادة
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">تعديل عيادة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">تعديل عيادة</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form action="/clinic/{{$clinic->id}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @method('put')
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>اسم العيادة </label>
                        <input type="text" class="form-control" name="name" value="{{$clinic->name}}"  >
                    </div>
                    @error('name')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>صورة العيادة </label>
                        <input type="file" class="form-control" name="image" accept="*/image" >
                    </div>
                    @error('image')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">التخصص</label>
                        <select class="form-control select2"  name="speciality_id">
                            @foreach ($specialities as $speciality)
                            <option value="{{$speciality->id}}"{{$clinic->speciality_id==$speciality->id?'selected':''}} >{{$speciality->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('speciality_id')
                       <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>العنوان </label>
                        <input type="text" class="form-control" name="address" value="{{$clinic->address}}"  >
                    </div>
                    @error('address')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">المحافظة</label>
                        <select class="form-control select2" name="governorate_id" id="governorate">
                            <option value="">أختار المحافظة</option>
                            @foreach ($governorates as $governorate)
                              <option value="{{$governorate->id}}" {{$clinic->governorate_id==$governorate->id?'selected':''}}>{{$governorate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('governorate_id')
                          <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">المدينة</label>
                        <input type="hidden" id="city_id" value="{{$clinic->city_id}}">
                        <select class="form-control select2" name="city_id" id="city">
                            <option value="">أختار المدينة</option>
                        </select>
                    </div>
                    @error('city_id')
                          <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">وقت الكشف</label>
                        <select class="form-control select"  name="time_appointment">
                            <option value="10"{{$clinic->time_appointment=='10'?'selected':''}} >10</option>
                            <option value="15"{{$clinic->time_appointment=='15'?'selected':''}} >15</option>
                            <option value="30"{{$clinic->time_appointment=='30'?'selected':''}} >30</option>
                            <option value="45"{{$clinic->time_appointment=='45'?'selected':''}} >45</option>
                            <option value="60"{{$clinic->time_appointment=='60'?'selected':''}} >60</option>
                        </select>
                    </div>
                    @error('time_appointment')
                       <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">سعر الكشف</label>
                        <input type="text" class="form-control" name="price" value="{{$clinic->price}}">
                    </div>
                    @error('price')
                        <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ايام الحجوزات </label>
                        <select class="form-control select"  name="type_booking">
                            <option value="7"  {{$clinic->type_booking=='7'?'selected':''}} >7</option>
                            <option value="14" {{$clinic->type_booking=='14'?'selected':''}} >14</option>
                            <option value="30" {{$clinic->type_booking=='30'?'selected':''}} >30</option>
                        </select>
                    </div>
                    @error('type_booking')
                      <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">رقم التلفون الاول</label>
                        <input type="text" class="form-control" name="phone1" value="{{$clinic->phone1}}">
                    </div>
                    @error('phone1')
                        <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">رقم التلفون الثاني</label>
                        <input type="text" class="form-control" name="phone2" value="{{$clinic->phone2}}">
                    </div>
                    @error('phone2')
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
@section('js')
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script>
 $(document).ready(function()
 {
    var city_id=$('#city_id').val();
    var id=$('#governorate').val();
    getcities(id,city_id);
 });
 $('#governorate').change(function (e) {
     e.preventDefault();
     var id=$(this).val();
     getcities(id);
 });
 function getcities(id,city_id=null)
 {
    $.ajax({
          type: "get",
          url: "/governorate/"+id,
          dataType: "json",
          success: function (response) {
              var cities='';
            response.forEach(element => {
                element.id==city_id?selected='selected':selected='';
                cities+='<option value="'+element.id+'" '+selected+' >'+element.name+'</option>'
              });
              $('#city').html(cities);
          }
      });
 }
</script>
@endsection

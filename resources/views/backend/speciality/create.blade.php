@extends('layouts.app')
@section('title')
انشاء تخصص
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">انشاء تخصص</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">انشاء تخصص</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form action="/speciality" method="post"  enctype="multipart/form-data">
                 @csrf
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>اسم  </label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}"  >
                    </div>
                    @error('name')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>صورة  </label>
                        <input type="file" class="form-control" name="image" accept="*/image"  >
                    </div>
                    @error('image')
                         <span class="mute"> {{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الحالة </label>
                        <select name="active" class="form-control">
                            <option value="0" {{old('active')=='0'?'selected':''}}>مغلق</option>
                            <option value="1" {{old('active')=='1'?'selected':''}}>مفعل</option>
                        </select>
                    </div>
                    @error('active')
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

@extends('layouts.app')
@section('title')
التواصل الاجتماعي للعيادة
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto"> التواصل الاجتماعي للعيادة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
<form action="/clinic-social" method="post">
 @csrf
 <div class="row row-sm">
 	<div class="col-xl-8">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">التواصل الاجتماعي للعيادة</h4>
 				</div>
 			</div>
 			<div class="card-body">
                <div class="form-group">
                    <label for=""> فيس بوك</label>
                    <input type="text" name="facebook" class="form-control  @error('facebook') is-invalid @enderror" value="{{isset($social->facebook)?$social->facebook:''}}">
                    @error('facebook')
                    <small  class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""> يوتيوب </label>
                    <input type="text" name="youtube" class="form-control  @error('youtube') is-invalid @enderror" value="{{isset($social->youtube)?$social->youtube:''}}">
                    @error('youtube')
                    <small  class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">تويتر </label>
                    <input type="text" name="twitter" class="form-control  @error('twitter') is-invalid @enderror" value="{{isset($social->twitter)?$social->twitter:''}}">
                    @error('twitter')
                    <small  class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""> انستجرام </label>
                    <input type="text" name="instagram" class="form-control  @error('instagram') is-invalid @enderror" value="{{isset($social->instagram)?$social->instagram:''}}">
                    @error('instagram')
                    <small  class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="حفظ">
                </div>
 			</div>
 		</div>
     </div>
 </div>
</form>
@endsection


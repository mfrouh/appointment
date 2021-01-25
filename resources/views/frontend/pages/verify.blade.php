@extends('layouts.frontend')
@section('content')
<div class="container-fluid margin_60 hero_home version_1">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6">
        <div class="box_general_3 cart">
            <div class="form_title text-right">
                <h3> لقد ارسالنا لك كود مكون من 6 ارقم علي هذا الرقم {{$booking->phone_number}}</h3>
            </div>
            <form action="/verifybooking" method="post">
                @csrf
                <div class="form-group text-right">
                  <label for="">ادخل الكود</label>
                  <input type="text" name="code" class="form-control" placeholder="ادخل الكود" >
                   @error('code')
                     <span class="text-muted ">{{$message}}</span>
                   @enderror
                </div>
                 <input type="hidden" name="id" value="{{$booking->id}}" id="">
                 <input type="submit" value="ارسال" class="btn_1">
            </form>
            <!--End step -->
        </div>
        </div>
    </div>
    <!-- /row -->
</div>
@endsection

@extends('layouts.frontend')
@section('content')
<div class="container-fluid margin_60 hero_home version_1">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8">
        <div class="box_general_3 cart">
            <div class="form_title">
                <h3>{{$phone_number}}</h3>
            </div>
            <form action="/verifybooking" method="post">
                @csrf
                <div class="form-group">
                  <label for="">ادخل الكود</label>
                  <input type="text" name="code" class="form-control" placeholder="ادخل الكود" >
                </div>
                 <input type="hidden" name="id" value="{{$id}}" id="">
                 <input type="submit" value="ارسال" class="btn_1">
            </form>
            <!--End step -->
        </div>
        </div>
    </div>
    <!-- /row -->
</div>
@endsection

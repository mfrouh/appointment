@extends('layouts.frontend')
@section('content')
<div class="container margin_60">
    <div class="row">
        <div class="col-xl-12 col-lg-8">
        <div class="box_general_3 cart">
            <div class="form_title">
                <h3>{{$phone_number}}</h3>
            </div>
            <form action="/verifybooking" method="post">
                @csrf
                <div class="form-group">
                  <label for="">enter code</label>
                  <input type="text" name="code" class="form-control" >
                </div>
                 <input type="hidden" name="id" value="{{$id}}" id="">
                 <input type="submit" name="send" class="btn_1">
            </form>
            <!--End step -->
        </div>
        </div>
    </div>
    <!-- /row -->
</div>
@endsection

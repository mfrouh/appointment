@extends('layouts.frontend')
@section('content')
<div class="container margin_60">
    <div class="row">
        <div class="col-xl-6 col-lg-8">
        <div class="box_general_3 booking text-right">
            <div class="title">
                <h3>احجز الان</h3>
            </div>
            <form action="/bookappointment" method="post">
                @csrf
            <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>اسم المريض</label>
                            <input type="text" class="form-control" name="name" value="{{ session('name') ? session('name') :old('name')}}" placeholder="اسم المريض">
                            @error('name')
                             <span class="text-muted">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>رقم التلفون</label>
                            <input type="text" name="phone_number"  class="form-control" value="{{ session('phone_number') ? session('phone_number') :old('phone_number')}}" placeholder="رقم التلفون">
                            <input type="hidden"  name="appointment_time_id" id="appointment_time_id" >
                            <input type="hidden"  name="clinic_id" value="{{$clinic->id}}" >
                            @error('phone_number')
                              <span class="text-muted">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>العمر</label>
                            <input type="number" min="1" name="age" class="form-control" value="{{ session('age') ? session('age') :old('age')}}" placeholder="العمر">
                            @error('age')
                              <span class="text-muted">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>النوع</label>
                            <select name="gender" class="form-control">
                                <option value="male"   {{session('gender') && session('gender')=='male'?'selected':''}}>ذكر</option>
                                <option value="female" {{session('gender') && session('gender')=='female'?'selected':''}}>انثي</option>
                            </select>
                            @error('gender')
                               <span class="text-muted">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <input type="submit" value="احجز الان" class=" btn_1">
                </div>
            </div>
          </form>
         </div>
        </div>
        <!-- /col -->
        <aside class="col-xl-6 col-lg-4" id="sidebar">
            <div class="box_general_3 booking text-right">
                    <div class="title">
                        <h3>اختار يوم الكشف</h3>
                    </div>
                    <div class="summary">
                        @foreach ($dates as $date)
                           <a href="javscript::void(0)" class="btn_1 m-2 gettimes" data-id="{{$date->id}}" >( {{$date->times->count()}} )  {{$date->day->format('d-m-Y')}}</a>
                        @endforeach
                    </div>
            </div>
            <div class="box_general_3 booking text-right">
                    <div class="title">
                        <h3>اختار وقت الكشف</h3>
                    </div>
                    <div class="times">
                        @error('appointment_time_id')
                        <h6>{{$message}}</h6>
                        @enderror
                    </div>
            </div>
            <!-- /box_general -->
        </aside>
        <!-- /asdide -->
    </div>
    <!-- /row -->
</div>
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.gettimes').click(function(e)
    {
        e.preventDefault();
        var id=$(this).attr("data-id");
        gettimes(id);
    });
    $('.times').on('click','.selecttime',function(e)
    {
        e.preventDefault();
        $('.times a').addClass('btn-success');
        $('.times a').removeClass('btn-secondary');
        $(this).removeClass('btn-success');
        $(this).addClass('btn-secondary');
        var id=$(this).attr("data-id");
        selecttime(id);
    });
    function selecttime(id)
    {
        $('#appointment_time_id').val(id);
    }
    function gettimes(id)
    {
        $.ajax({
            type: "get",
            url: "/bookappointment/times/"+id,
            dataType: "json",
            success: function (respones) {
            var a='';
             $.each(respones, function(index, value) {
                var s='btn-success'; var f='btn-danger';
                var va='btn-success';
                if (value.booked==0) { va='btn-success';  }else{va='btn-danger disabled';}
                a+='<a href="javscript::void(0)" class="btn '+va+' col-2 m-1 btn-sm selecttime" data-id="'+value.id+'">'+value.time+'</a>';
             });
             $('.times').html(a);
            },
            error:function(response)
            {

            }
        });
    }
    </script>
    @endsection

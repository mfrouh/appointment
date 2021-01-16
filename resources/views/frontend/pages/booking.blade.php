@extends('layouts.frontend')
@section('content')
<div class="container margin_60">
    <div class="row">
        <div class="col-xl-6 col-lg-8">
        <div class="box_general_3 cart">
            <div class="form_title">
                <h3><strong>1</strong>Booking Now</h3>
            </div>
            <form action="/bookappointment" method="post">
                @csrf
            <div class="step">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number"  class="form-control" placeholder="Phone Number">
                            <input type="hidden"  name="appointment_time_id" id="appointment_time_id" >
                            <input type="hidden"  name="clinic_id" value="{{$clinic->id}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" placeholder="Age">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <input type="submit" value="Booking Now" class=" btn_1">
                </div>
            </div>
        </form>
            <!--End step -->
        </div>
        </div>
        <!-- /col -->
        <aside class="col-xl-6 col-lg-4" id="sidebar">
            <div class="box_general_3 booking">
                <form>
                    <div class="title">
                        <h3>Dates</h3>
                    </div>
                    <div class="summary">
                        @foreach ($dates as $date)
                           <a href="javscript::void(0)" class="btn btn-primary btn-sm m-1 gettimes" data-id="{{$date->id}}" >( {{$date->times->count()}} )  {{$date->day->format('d-m-Y')}}</a>
                        @endforeach
                    </div>
                    <div class="times">

                    </div>
                    <hr>
                </form>
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
        $(this).removeClass('btn-success');
        $(this).addClass('btn-secondery');
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
                a+='<a href="javscript::void(0)" class="btn '+va+' col-2 m-2 p-2 btn-sm selecttime" data-id="'+value.id+'">'+value.time+'</a>';
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

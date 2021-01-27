@extends('layouts.app')
@section('title')
مواعيد الحجوزات
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">مواعيد الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
 <div class="row row-sm">
 	<div class="col-xl-12">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">مواعيد الحجوزات</h4>
                     <form action="/clinic-appointmentdate" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-primary btn-sm" value="وضع المواعيد">
                    </form>
 				</div>
 			</div>
 			<div class="card-body">
                 <div class="row">
                    @foreach ($dates as $date)
                       <a href="javscript::void(0)" class="btn btn-primary col-2 m-2 p-2 gettimes" data-id="{{$date->id}}" >( {{$date->times->count()}} )  {{$date->day->format('d-m-Y')}}</a>
                    @endforeach
                 </div>
             </div>
             <div class="card-body">
                <div class="row times"></div>
            </div>
 		</div>
 	</div>
 </div>
</div>
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
    function gettimes(id)
    {
        $.ajax({
            type: "get",
            url: "/clinic-appointmentdate/"+id,
            dataType: "json",
            success: function (respones) {
            var a='';
             $.each(respones, function(index, value) {
                var s='btn-success'; var f='btn-danger';
                var va='btn-success';
                if (value.booked==0) { va='btn-success';  }else{va='btn-danger disabled';}
                a+='<a href="javscript::void(0)" class="btn '+va+' col-2 m-2 p-2">'+value.time+'</a>';
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

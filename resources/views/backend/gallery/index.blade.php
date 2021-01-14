@extends('layouts.app')
@section('title')
صور العيادة
@endsection
@section('css')
<!-- Internal Gallery css -->
<link href="{{URL::asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">صور العيادة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
                    <h4 class="card-title mg-b-0">صور العيادة</h4>
                    <form action="/clinic/gallery" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="images[]" accept="*/image" multiple>
                        <input type="submit" class="btn btn-primary btn-sm" value="أضافة صور">
                    </form>
 				</div>
 			</div>
 			<div class="card-body">
                <div class="demo-gallery">
					<ul id="lightgallery" class="list-unstyled row row-sm pr-0">
                        @foreach ($images as $image)
						<li class="col-sm-6 col-lg-3" data-responsive="{{URL::asset($image->url)}}" data-src="{{URL::asset($image->url)}}" data-sub-html="<h4>{{$image->url}}</h4>" >
							<a href="">
                                <img class="img-responsive" height="300px" src="{{URL::asset($image->url)}}" alt="Thumb-1">
                            </a>
                        </li>
                        @endforeach
					</ul>
					<!-- /Gallery -->
				</div>
             </div>
 		</div>
 	</div>
 </div>
</div>
</div>
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/gallery/lightgallery-all.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/gallery/jquery.mousewheel.min.js')}}"></script>
<script src="{{URL::asset('assets/js/gallery.js')}}"></script>
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
            url: "/clinic/appointmentdate/"+id,
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

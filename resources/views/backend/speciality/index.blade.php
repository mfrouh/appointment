@extends('layouts.app')
@section('title')
التخصصات
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">التخصصات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
 					<h4 class="card-title mg-b-0">التخصصات</h4>
					<a class="btn btn-primary btn-sm"  href="/speciality/create">أنشاء تخصص</a>
 				</div>
 			</div>
 			<div class="card-body">
 				<div class="table-responsive">
 					<table id="example1" class="table key-buttons text-md-nowrap text-center">
 						<thead>
 							<tr>
 								<th class="border-bottom-0">الاسم</th>
                                <th class="border-bottom-0">الصورة</th>
                                <th class="border-bottom-0">الحالة</th>
 								<th class="border-bottom-0">الصلاحيات</th>
 							</tr>
 						</thead>
 						<tbody>
						 @foreach ($specialities as $speciality)
 							<tr>
 								<td>{{$speciality->name}}</td>
                                <td>{{$speciality->image}}</td>
                                <td>{{$speciality->active}}</td>
 								<td>
                                     <a class="btn btn-primary btn-sm edit" data-id="{{$speciality->id}}" href="/speciality/{{$speciality->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                     <a class="btn btn-danger btn-sm delete"  data-id="{{$speciality->id}}" href="javscript::void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
 							</tr>
						 @endforeach
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 {{-- <x-speciality.create/> --}}
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
{{-- <script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.delete').click(function(e)
{
	e.preventDefault();
    var id=$(this).attr("data-id");
    this.deletespeciality(id);
});
$('#createform').submit(function(e){
    e.preventDefault();
    var data=$('#createform').serialize();
    alert(data);
    createspeciality(data);
});

$('.edit').click(function(e)
{
	e.preventDefault();
    var id=$(this).attr("data-id");
    console.log('edit button');
});
function deletespeciality(id)
{
    $.ajax({
        type: "delete",
        url: "/speciality/"+id,
        dataType: "json",
        success: function (response) {
            location.reload();
        },
        error:function(response)
        {

        }
    });
}
function createspeciality(dat)
{
    var form_data = new FormData($('#createform')[0]);
    $.ajax({
        type: "post",
        url: "/speciality",
		data:dat,
        enctype: 'multipart/form-data',
        processData: false,
        success: function (response) {
            location.reload();
        },
        error:function(xhr, status, error)
        {
            var err = eval("(" + xhr.responseText + ")");
             $.each(err.errors, function(index, value) {
                $('#'+index).html('');
             });
             $.each(err.errors, function(index, value) {
                $('#'+index).html(value);
             });
        }
    });
}
</script> --}}
@endsection

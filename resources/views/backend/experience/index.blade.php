@extends('layouts.app')
@section('title')
الخبرات
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
			<h4 class="content-title mb-0 my-auto">الخبرات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
 <div class="row row-sm">
    <div class="col-xl-4">
        <div class="card">
          <div class="card-header">أضافة خبرة</div>
          <div class="card-body">
            <form id="form">
                <div class="form-group">
                   <label for="">اسم المستشفي</label>
                   <input type="text" name="hospital_name" class="form-control" placeholder="اسم المستشفي">
                   <small id="hospital_name" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">من</label>
                    <select name="from" class="form-control">
                        @for ($i = 2021; $i >= 1940 ; $i--)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <small id="from" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">الي</label>
                    <select name="to" class="form-control">
                        @for ($i = 2021; $i >= 1940 ; $i--)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <small id="to" class="text-muted"></small>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="حفظ">
                </div>
            </form>
          </div>
        </div>
    </div>
 	<div class="col-xl-8">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">الخبرات</h4>
 				</div>
 			</div>
 			<div class="card-body">
 				<div class="table-responsive">
 					<table id="example1" class="table key-buttons text-md-nowrap text-center">
 						<thead>
 							<tr>
                                <th class="border-bottom-0">اسم المستشفي</th>
                                <th class="border-bottom-0">من</th>
                                <th class="border-bottom-0">الي</th>
 								<th class="border-bottom-0">الصلاحيات</th>
 							</tr>
 						</thead>
 						<tbody>
						 @foreach ($experiences as $experience)
 							<tr>
                                <td>{{$experience->hospital_name}}</td>
                                <td>{{$experience->from}}</td>
                                <td>{{$experience->to}}</td>
 								<td>
                                     <a class="btn btn-danger btn-sm delete"  data-id="{{$experience->id}}" href="javscript::void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
</div>
</div>
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
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.delete').click(function(e)
{
    e.preventDefault();
    var id=$(this).attr("data-id");
    deleteexperience(id);
});
$('#form').submit(function(e){
    e.preventDefault();
    var data=$('#form').serialize();
    createexperience(data);
});
function deleteexperience(id)
{
    $.ajax({
        type: "delete",
        url: "/clinic-experience/"+id,
        dataType: "json",
        success: function (response) {
            location.reload();
        },
        error:function(response)
        {

        }
    });
}
function createexperience(dat)
{
    $.ajax({
        type: "post",
        url: "/clinic-experience",
        dataType: "json",
        data:dat,
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

</script>
@endsection

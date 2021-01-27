@extends('layouts.app')
@section('title')
ايام العمل
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
			<h4 class="content-title mb-0 my-auto">ايام العمل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
 <div class="row row-sm">
    <div class="col-xl-4">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">ايام العمل</h4>
                </div>
            </div>
            <div class="card-body">
                <form id="form">
                <div class="form-group">
                  <label for="">اليوم</label>
                  <select name="day" class="form-control">
                    @for ($i = 0; $i < 7; $i++)
                       <option value="{{Carbon\Carbon::now()->addday($i)->format('D')}}">{{Carbon\Carbon::now()->addday($i)->format('D')}}</option>
                    @endfor
                  </select>
                  <small id="day" class="text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="">بداية العمل</label>
                  <input type="time" name="start" class="form-control" placeholder="بداية العمل" aria-describedby="start">
                  <small id="start" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">نهاية العمل</label>
                    <input type="time" name="end"  class="form-control" placeholder="نهاية العمل" aria-describedby="start">
                    <small id="end" class="text-muted"></small>
                </div>
                <div class="form-group text-center">
                  <input type="submit" class="btn btn-primary" value="حفظ" >
                </div>
               </form>
            </div>
        </div>
    </div>
 	<div class="col-xl-8">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">ايام العمل</h4>
 				</div>
 			</div>
 			<div class="card-body">
 				<div class="table-responsive">
 					<table id="example1" class="table key-buttons text-md-nowrap text-center">
 						<thead>
 							<tr>
                                <th class="border-bottom-0">اليوم</th>
                                <th class="border-bottom-0">بداية العمل</th>
                                <th class="border-bottom-0">نهاية العمل</th>
 								<th class="border-bottom-0">الصلاحيات</th>
 							</tr>
 						</thead>
 						<tbody>
						 @foreach ($workdates as $workdate)
 							<tr>
                                <td>{{$workdate->day}}</td>
                                <td>{{$workdate->time->start}}</td>
                                <td>{{$workdate->time->end}}</td>
 								<td>
                                     <a class="btn btn-danger btn-sm delete"  data-id="{{$workdate->id}}" href="javscript::void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    deleteworkdate(id);
});
$('#form').submit(function(e){
    e.preventDefault();
    var data=$('#form').serialize();
    createworkdate(data);
});
function deleteworkdate(id)
{
    $.ajax({
        type: "delete",
        url: "/clinic-workdate/"+id,
        dataType: "json",
        success: function (response) {
            location.reload();
        },
        error:function(response)
        {

        }
    });
}
function createworkdate(dat)
{
    $.ajax({
        type: "post",
        url: "/clinic-workdate",
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

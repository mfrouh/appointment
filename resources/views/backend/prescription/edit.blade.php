@extends('layouts.app')
@section('title')
تعديل روشتة
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">تعديل روشتة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
                    <h4 class="card-title mg-b-0">{{$prescription->name}}</h4>
 				</div>
 			</div>
 			<div class="card-body">
                    <div class="form-group">
                        <label for="">المريض</label>
                       {{ $prescription->patient->name}}
                    </div>
                    <table  class="table key-buttons text-md-nowrap text-center">
                        <thead>
                            <tr>
                            <th>اسم الدواء</th>
                            <th>الكمية</th>
                            <th>توصية</th>
                            <th></th>
                            </tr>
                            <tr>
                                <input type="hidden" name="prescription_id" value="{{$prescription->id}}" id="prescription_id">
                                <td><input type="text" name="name" id="name" class="form-control"></td>
                                <td><input type="number" name="quantity" id="quantity" class="form-control"></td>
                                <td><textarea name="message" id="message" class="form-control" rows="2"></textarea></td>
                                <td><a  class="btn btn-primary-gradient btn-sm add" href="javscript::void(0)"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                             </tr>
                        </thead>
                        <tbody>
                           @foreach ($prescription->contents as $content)
                           <tr>
                             <td>{{$content->name}}</td>
                             <td>{{$content->quantity}}</td>
                             <td>{{$content->message}}</td>
                             <td><a class="btn btn-danger-gradient btn-sm delete" href="javscript::void(0)" data-id="{{$content->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add').click(function(e)
    {
        e.preventDefault();
        var prescription_id=$('#prescription_id').val();
        var name=$('#name').val();
        var quantity=$('#quantity').val();
        var message=$('#message').val();
        validite(prescription_id,name,quantity,message);
    });
    $('tbody').on('click','.delete',function(e)
    {
        e.preventDefault();
        var id=$(this).attr('data-id');
        deleteitem(id);
    });
    function validite(prescription_id,name,quantity,message)
    {
        $.ajax({
            type: "post",
            url: "/prescriptioncontent",
            data:{prescription_id:prescription_id,name:name,quantity:quantity,message:message},
            dataType: "json",
            success: function (response) {
            var a='';
             $.each(response, function(index, value) {
                a+='<tr><td>'+value.name+'</td><td>'+value.quantity+'</td><td>'+value.message+'</td><td><a href="javscript::void(0)" class="btn btn-danger-gradient btn-sm delete" data-id="'+value.id+'"><i class="fa fa-trash"></i></a></td></tr>';
             });
             $('tbody').html(a);
            },
            error:function(response)
            {

            }
        });
    }
    function deleteitem(id)
    {
        $.ajax({
            type: "delete",
            url: "/prescriptioncontent/"+id,
            dataType: "json",
            success: function (response) {
            var a='';
             $.each(response, function(index, value) {
                a+='<tr><td>'+value.name+'</td><td>'+value.quantity+'</td><td>'+value.message+'</td><td><a href="javscript::void(0)" class="btn btn-danger-gradient btn-sm delete"  data-id="'+value.id+'"><i class="fa fa-trash"></i></a></td></tr>';
             });
             $('tbody').html(a);
            },
            error:function(response)
            {

            }
        });
    }
    </script>
    @endsection

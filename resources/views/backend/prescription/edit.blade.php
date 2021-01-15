@extends('layouts.app')
@section('title')
انشاء روشتة
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">انشاء روشتة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
                    <h4 class="card-title mg-b-0">انشاء روشتة</h4>
 				</div>
 			</div>
 			<div class="card-body">
              <form action="/prescription" method="POST" >
               @csrf
                    <div class="form-group">
                        <label for="">المريض</label>
                        <select name="patient_id" class="form-control">
                            @foreach ($patients as $patient)
                              <option value="{{$patient->id}}" {{$patient->id==old('patient_id')?"selected":''}}>{{$patient->name}}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="hidden" name="prescriptions[]">
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="حفظ">
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
                                <td><input type="text" name="name" id="name" class="form-control"></td>
                                <td><input type="number" name="quantity" id="quantity" class="form-control"></td>
                                <td><textarea name="message" id="message" class="form-control" rows="2"></textarea></td>
                                <td><a type="submit" class="btn btn-primary-gradient btn-sm add"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                             </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
              </form>
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
        var name=$('#name').val();
        var quantity=$('#quantity').val();
        var message=$('#message').val();
        validite(name,quantity,message);
    });
    $('tbody').on('click','.delete',function(e)
    {
        e.preventDefault();
        var id=$(this).attr('data-id');
        deleteitem(id);
    });
    function validite(name,quantity,message)
    {
        $.ajax({
            type: "post",
            url: "/clinic/prescriptioncontent",
            data:{name:name,quantity:quantity,message:message},
            dataType: "json",
            success: function (response) {
            var a='';
             $.each(response, function(index, value) {
                a+='<tr><td>'+value.name+'</td><td>'+value.quantity+'</td><td>'+value.message+'</td><td><a class="btn btn-danger btn-sm delete" data-id="'+index+'"><i class="fa fa-trash"></i></a></td></tr>';
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
            url: "/clinic/prescriptioncontent/"+id,
            dataType: "json",
            success: function (response) {
            var a='';
             $.each(response, function(index, value) {
                a+='<tr><td>'+value.name+'</td><td>'+value.quantity+'</td><td>'+value.message+'</td><td><a class="btn btn-danger btn-sm delete"  data-id="'+index+'"><i class="fa fa-trash"></i></a></td></tr>';
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

@extends('layouts.app')
@section('title')
{{$patient->name}}
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">{{$patient->name}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
                     <h4 class="card-title mg-b-0">{{$patient->name}}</h4>
                     <a class="btn btn-primary btn-sm" href="javascript::void(0)"  data-toggle="modal" data-target="#createprescription">أضافة روشتة</a>
                     <a class="btn btn-warning btn-sm" href="javascript::void(0)"  data-toggle="modal" data-target="#createsurgery">أضافة عملية</a>
                     <a class="btn btn-info btn-sm" href="javascript::void(0)"  data-toggle="modal" data-target="#createfollowup">أضافة متابعة</a>
                     <a class="btn btn-danger btn-sm" href="javascript::void(0)"  data-toggle="modal" data-target="#createappointment">أضافة كشف</a>
 				</div>
 			</div>
 			<div class="card-body">
                <table class="table key-buttons text-md-nowrap text-center">
                    <input type="hidden" id="patient_id" value="{{$patient->id}}">
                    <tr>
                        <th>اسم المريض</th>
                        <td>{{$patient->name}}</td>
                    </tr>
                    <tr>
                        <th>رقم التلفون</th>
                        <td>{{$patient->phone_number}}</td>
                    </tr>
                    <tr>
                        <th>العمر</th>
                        <td>{{$patient->age}}</td>
                    </tr>
                    <tr>
                        <th>النوع</th>
                        <td>{{$patient->gender}}</td>
                    </tr>
                </table>
 			</div>
        </div>
        <div class="card panel-primary tabs-style-1">
            <div class=" tab-menu-heading">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs main-nav-line">
                        <li class="nav-item"><a href="#prescriptions" class="nav-link active" data-toggle="tab">الروشتات</a></li>
                        <li class="nav-item"><a href="#appointments" class="nav-link" data-toggle="tab">الكشوفات</a></li>
                        <li class="nav-item"><a href="#surgeries" class="nav-link" data-toggle="tab">العمليات</a></li>
                        <li class="nav-item"><a href="#followups" class="nav-link" data-toggle="tab">المتابعات</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body tabs-menu-body main-content-body-right border-top-0 border">
                <div class="tab-content">
                    <div class="tab-pane active" id="prescriptions">
                        <table id="example1" class="table key-buttons text-md-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">المريض</th>
                                    <th class="border-bottom-0">الصلاحيات</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($prescriptions as $prescription)
                                <tr>
                                   <td>{{$prescription->patient->name}}</td>
                                   <td>
                                        <a class="btn btn-primary btn-sm edit"  href="/prescription/{{$prescription->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-sm delete"  data-id="{{$prescription->id}}" href="javscript::void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                   </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="appointments">
                        <table id="example1" class="table key-buttons text-md-nowrap text-center">
                            <thead>
                                <tr>
                                   <th class="border-bottom-0">المريض</th>
                                   <th class="border-bottom-0">يوم الكشف</th>
                                   <th class="border-bottom-0">وقت الكشف</th>
                                   <th class="border-bottom-0">وقت الحجز</th>
                                   <th class="border-bottom-0">السعر</th>
                                   <th class="border-bottom-0">التشخيص</th>
                                    <th class="border-bottom-0">الصلاحيات</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                   <td>{{$appointment->patient->name}}</td>
                                   <td>{{$appointment->day}}</td>
                                   <td>{{$appointment->time}}</td>
                                   <td>{{$appointment->appointment_time_id}}</td>
                                   <td>{{$appointment->price}}</td>
                                   <td>{{$appointment->diagnose}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm edit" href="/appointment/{{$appointment->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-sm delete"  data-id="{{$appointment->id}}" href="javscript::void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                   </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="surgeries">
                        <table id="example1" class="table key-buttons text-md-nowrap text-center">
                            <thead>
                                <tr>
                                   <th class="border-bottom-0">المريض</th>
                                   <th class="border-bottom-0">اسم العملية</th>
                                   <th class="border-bottom-0">يوم العملية</th>
                                   <th class="border-bottom-0">وقت العملية</th>
                                   <th class="border-bottom-0">السعر</th>
                                   <th class="border-bottom-0">اسم المستشفي</th>
                                    <th class="border-bottom-0">الصلاحيات</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($surgeries as $surgery)
                                <tr>
                                   <td>{{$surgery->patient?$surgery->patient->name:null}}</td>
                                   <td>{{$surgery->name}}</td>
                                   <td>{{$surgery->day}}</td>
                                   <td>{{$surgery->time}}</td>
                                   <td>{{$surgery->price}}</td>
                                   <td>{{$surgery->hospital_name}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"  href="/surgery/{{$surgery->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-sm delete"  data-id="{{$surgery->id}}" href="javscript::void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                   </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="followups">
                        <table id="example1" class="table key-buttons text-md-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">المريض</th>
                                   <th class="border-bottom-0">يوم المتابعة</th>
                                   <th class="border-bottom-0">ساعة المتابعة</th>
                                   <th class="border-bottom-0">السعر</th>
                                   <th class="border-bottom-0">التشخيص</th>
                                    <th class="border-bottom-0">الصلاحيات</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($followups as $followup)
                                <tr>
                                   <td>{{$followup->patient->name}}</td>
                                   <td>{{$followup->day}}</td>
                                   <td>{{$followup->time}}</td>
                                   <td>{{$followup->price}}</td>
                                   <td>{{$followup->diagnose}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/followup/{{$followup->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-sm delete"  data-id="{{$followup->id}}" href="javscript::void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
</div>
<x-Prescription.create :patient="$patient->id"/>
<x-Appointment.create :patient="$patient->id"/>
<x-Followup.create :patient="$patient->id"/>
<x-Surgery.create :patient="$patient->id"/>
@endsection
@section('js')
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
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
    $('.addprescription').click(function(e)
    {
        e.preventDefault();
        var patient_id=$('#patient_id').val();
        prescription(patient_id);
    });
    $('#appointment').submit(function(e){
      e.preventDefault();
      var data=$('#appointment').serialize();
      createappointment(data);
    });
    $('#followup').submit(function(e){
      e.preventDefault();
      var data=$('#followup').serialize();
      createfollowup(data);
    });
    $('#surgery').submit(function(e){
      e.preventDefault();
      var data=$('#surgery').serialize();
      createsurgery(data);
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
             $('.contents').html(a);
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
             $('.contents').html(a);
            },
            error:function(response)
            {

            }
        });
    }
    function prescription(patient_id)
    {
        $.ajax({
            type: "post",
            url: "/doctor/prescription",
            dataType: "json",
            data:{patient_id:patient_id},
            success: function (response) {
              location.reload();
            },
            error:function(response)
            {

            }
        });
    }
    function createappointment(dat)
   {
    $.ajax({
        type: "post",
        url: "/doctor/appointment",
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
   function createsurgery(dat)
   {
    $.ajax({
        type: "post",
        url: "/doctor/surgery",
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
   function createfollowup(dat)
   {
    $.ajax({
        type: "post",
        url: "/doctor/followup",
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

@extends('layouts.frontend')
@section('css')
<link href="css/date_picker.css" rel="stylesheet">
@endsection
@section('content')
<div id="results">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4><strong>Showing 10</strong> of 140 results</h4>
            </div>
            <div class="col-md-6">
                 <div class="search_bar_list">
                 <input type="text" class="form-control" placeholder="Clinic">
                 <input type="submit" value="Search">
             </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /results -->
 <div class="container margin_60_35">
     <div class="row">
         <div class="col-lg-12">
             <div class="row">
                 @foreach ($clinics as $clinic)
                 <div class="col-md-4">
                     <div class="box_list fadeIn">
                         <figure>
                             <a href="/profile/{{$clinic->id}}"><img src="{{asset($clinic->image)}}" class="img-fluid" alt="">
                                 <div class="preview"><span>Read more</span></div>
                             </a>
                         </figure>
                         <div class="wrapper">
                             <small>Psicologist</small>
                             <h3>{{$clinic->user->name}}</h3>
                             <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>({{$clinic->reviews->count()}})</small></span>
                         </div>
                         <ul>
                             <li><a href="/bookappointment/{{$clinic->id}}">Book now</a></li>
                         </ul>
                     </div>
                 </div>
                 @endforeach
                 <!-- /box_list -->
             </div>
             <!-- /row -->
         </div>
         <!-- /col -->
     </div>
     <!-- /row -->
 </div>
@endsection
@section('js')
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="js/map_listing.js"></script>
<script src="js/infobox.js"></script>
@endsection

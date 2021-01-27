@extends('layouts.app')
@section('title')
    الرئيسية
@endsection
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="left-content">
			<div>
			  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> أهلا {{auth()->user()->name}}</h2>
			</div>
		</div>
	</div>
	<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
<div class="row row-sm">
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-primary-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد التخصصات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 ml-5 text-white">{{$specialities}}</h4>
                        </div>
                        <div class="">
							<h4 class="tx-20 font-weight-bold mb-1 mr-5 ml-5 text-dark">{{$actspecialities}}</h4>
                        </div>
                        <div class="">
							<h4 class="tx-20 font-weight-bold mb-1 mr-5 text-danger">{{$inactspecialities}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-danger-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد العيادات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$clinics}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الحجوزات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 ml-5 text-white">{{$bookings}}</h4>
                        </div>
                        <div class="">
							<h4 class="tx-20 font-weight-bold mb-1 mr-5 ml-5 text-dark">{{$actbookings}}</h4>
						</div>
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1  mr-5  text-danger">{{$inactbookings}}</h4>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div>
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-warning-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عددالكشوفات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$appointments}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-purple-gradient ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد المتابعات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$followups}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-info-gradient ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد العمليات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$surgeries}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-light ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-dark">عدد الروشتات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-dark">{{$prescriptions}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-secondary ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد المرضي</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$patients}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">({{$specialities}}) التخصصات</div>
            <div class="card-body">
                <canvas id="specialities"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">({{$bookings}}) الحجوزات</div>
            <div class="card-body">
                <canvas id="bookings"></canvas>
            </div>
        </div>
    </div>
</div>

  </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx1 = document.getElementById('specialities').getContext('2d');
var ctx2 = document.getElementById('bookings').getContext('2d');

var chart1 = new Chart(ctx1, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['التخصصات المغلقة', 'التخصصات المتاحة'],
        datasets: [{
            label: 'التخصصات',
            backgroundColor:['red','green'],
            borderColor: 'rgb(255, 255, 255)',
            data: [{{$inactspecialities}}, {{$actspecialities}}]
        }]
    },

    // Configuration options go here
    options: {
        animation: {
            duration:2000// general animation time
        },
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontColor: 'black',
                fontFamily:"'Lalezar', 'cursive'",
                fontSize:15,
            }
        }
    }
});
var chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: [' الحجوزات  الغير المتحققة منها', '  الحجوزات المتحققة منها'],
        datasets: [{
            label: 'الحجوزات',
            backgroundColor:['red','green'],
            borderColor: 'rgb(255, 255, 255)',
            data: [{{$inactbookings}}, {{$actbookings}}]
        }]
    },

    // Configuration options go here
    options: {
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontColor: 'black',
                fontFamily:"'Lalezar', 'cursive'",
                fontSize:15,
            }
        }
    }
});

</script>

@endsection

@extends('layouts.frontend')
@section('css')
@endsection
@section('content')
<div class="container pt-2">
    <div class="row">
        <div class="col-xl-8 col-lg-8">
            <nav id="secondary_nav">
                <div class="container text-right">
                    <ul class="clearfix">
                        <li><a href="#section_1" class="active">معلومات عن الدكتور</a></li>
                        <li><a href="#section_2">الأراء</a></li>
                        <li><a href="#sidebar">التعليم</a></li>
                    </ul>
                </div>
            </nav>
            <div id="section_1">
                <div class="box_general_3">
                    <div class="profile text-right">
                        <div class="row">
                            <div class="col-lg-5 col-md-4">
                                <figure>
                                    <img src="{{asset($clinic->image)}}" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="col-lg-7 col-md-8">
                                <small>{{$clinic->speciality->name}}</small>
                                <h1>{{$clinic->user->name}}</h1>
                                <span class="rating">
                                    @for ($i = 1; $i <=5; $i++)
                                    <i class="icon_star {{$i<=$clinic->rates()?'voted':''}}"></i>
                                    @endfor
                                    <small>({{$clinic->ratecount()}})</small>
                                </span>
                                <ul class="statistic">
                                    <li>{{$clinic->patients->count()}} مريض</li>
                                </ul>
                                <ul class="contacts">
                                    <li>
                                        <h6>سعر الكشف</h6>
                                         {{$clinic->price}} جنية
                                    </li>
                                    <li>
                                        <h6>مدة الكشف</h6>
                                         {{$clinic->time_appointment}} دقيقة
                                    </li>
                                    <li>
                                        <h6>العنوان</h6>
                                       {{$clinic->address}} -
                                        <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"> <strong>شاهد علي الخريطة</strong></a>
                                    </li>
                                    <li>
                                        <h6>التلفون</h6> <a href="tel://{{$clinic->phone1}}">{{$clinic->phone1}}</a> - <a href="tel://{{$clinic->phone2}}">{{$clinic->phone2}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- /profile -->
                    <div class="indent_title_in text-right">
                        <i class="pe-7s-user"></i>
                        <h3>الخبرة</h3>
                    </div>
                    <div class="wrapper_indent text-right">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    @foreach ($clinic->experiences as $experience)
                                    <li>{{$experiences}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- /row-->
                    </div>
                    <!-- /wrapper indent -->

                    <hr>
                    <div class="indent_title_in text-right">
                        <i class="pe-7s-user"></i>
                        <h3>الخدمات</h3>
                    </div>
                    <div class="wrapper_indent text-right">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    @foreach ($clinic->services as $service)
                                    <li>{{$service}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- /row-->
                    </div>
                    <hr>
                    <div class="indent_title_in text-right">
                        <i class="pe-7s-news-paper"></i>
                        <h3>التعليم</h3>
                    </div>
                    <div class="wrapper_indent text-right">
                        <ul class="list_edu">
                            @foreach ($clinic->educations as $education)
                                <li><strong>{{$education}}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--  End wrapper indent -->

                    <hr>
                </div>
                <!-- /section_1 -->
            </div>
            <!-- /box_general -->

            <div id="section_2">
                <div class="box_general_3">
                    <div class="reviews-container text-right">
                        <div class="row">
                            <div class="col-lg-3">
                                <div id="review_summary">
                                    <strong>{{$clinic->rates()}}</strong>
                                    <div class="rating">
                                        @for ($i = 1; $i <=5; $i++)
                                           <i class="icon_star {{$i<=$clinic->rates()?'voted':''}}"></i>
                                        @endfor
                                    </div>
                                    <small>من مجموع {{$clinic->ratecount()}} أراء</small>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-10 col-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$clinic->rateone(5)}}%" aria-valuenow="{{$clinic->rateone(5)}}"aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-3"><small><strong>5 نجوم</strong></small></div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-lg-10 col-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$clinic->rateone(4)}}%" aria-valuenow="{{$clinic->rateone(4)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-3"><small><strong>4 نجوم</strong></small></div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-lg-10 col-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$clinic->rateone(3)}}%" aria-valuenow="{{$clinic->rateone(3)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-3"><small><strong>3 نجوم</strong></small></div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-lg-10 col-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$clinic->rateone(2)}}%" aria-valuenow="{{$clinic->rateone(2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-3"><small><strong>2 نجوم</strong></small></div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-lg-10 col-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$clinic->rateone(1)}}%" aria-valuenow="{{$clinic->rateone(1)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-3"><small><strong>1 نجوم</strong></small></div>
                                </div>
                                <!-- /row -->
                            </div>
                        </div>
                        <!-- /row -->
                        <hr>
                        @foreach ($clinic->reviews as $review)
                        <div class="review-box clearfix">
                            <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                            </figure>
                            <div class="rev-content">
                                <div class="rating">
                                    @for ($i = 1; $i <=5; $i++)
                                    <i class="icon_star {{$i <= $review->rate?'voted':''}}"></i>
                                    @endfor
                                </div>
                                <div class="rev-info">
                                    {{$review->created_at->diffforHumans()}}
                                </div>
                                <div class="rev-text">
                                    <p>
                                        {{$review->review}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <!-- End review-container -->
                </div>
            </div>
            <!-- /section_2 -->
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="box_general_3 booking text-right">
                <div class="title">
                    <h6 class="text-white">أيام العمل</h6>
                </div>
                <table class="table table-striped table-clean text-center">
                    <tr>
                        <th>اليوم</th>
                        <th>من</th>
                        <th>الي</th>
                     </tr>
                     @foreach ($clinic->workdates as $workdate)
                    <tr>
                       <th>{{\Carbon\Carbon::createFromFormat('D',$workdate->day)->format('l')}}</th>
                       <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$workdate->time->start)->format('h:i A')}}</td>
                       <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$workdate->time->end)->format('h:i A')}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

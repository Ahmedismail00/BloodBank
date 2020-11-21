@extends('layouts.master')
@inject('bloodType','App\Models\BloodType')
@inject('city','App\Models\City')
@inject('governorate','App\Models\Governorate')
<?php
$blood_types = $bloodType->get();
$cities = $city->get();
$governorates = $governorate->get();
?>

@section('content')
        <!--intro-->
        <div class="intro">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item carousel-1 active">
                        <div class="container info">
                            <div class="col-md-5">
                                <h3>{{$settings->slider_title}}</h3>
                                <p>
                                    {{$settings->slider_text}}
                                </p>
                                <a href="{{url(route('about_us'))}}">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-2">
                        <div class="container info">
                            <div class="col-md-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.
                                </p>
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-3">
                        <div class="container info">
                            <div class="col-md-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي.
                                </p>
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--about-->
        <div class="about">
            <div class="container">
                <div class="col-md-6 text-center">
                    <p>
                        <span>بنك الدم</span> هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ.
                    </p>
                </div>
            </div>
        </div>

        <!--articles-->
        <div class="articles">
            <div class="container title">
                <div class="head-text">
                    <h2>المقالات</h2>
                </div>
            </div>
            <div class="view">
                <div class="container">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach($posts as $post)
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{asset('uploads/posts_images/'.$post->image)}}" class="card-img-top" width="30" alt="..." >
                                        <a href="{{url('user/article-details/'.$post->id)}}" class="click">المزيد</a>
                                    </div>
                                    <div class="favourite">
                                        <i id="{{$post->id}}" onclick="toogleFavourite(this)" class="far fa-heart
                                       @if(\Illuminate\Support\Facades\Auth::guard('client')->check())
                                            @if($post->is_favourite)
                                            second-heart
                                            @else()
                                            first-heart
                                            @endif()
                                        @else
                                            first-heart
                                        @endif
                                            "></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                        <p class="card-text">
                                            {{$post->content}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--requests-->
        <div class="requests">
            <div class="container">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="content">
                        {!! Form::open([
                            'action'=>'Front\MainController@donations_search',
                            'method' => 'get',
                            'class' => 'row filter'
                        ]) !!}
                        <div class="col-md-3 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    {!! Form::select('blood_type_id',$blood_types->pluck('name','id')->toArray(),null,[
                                        'class' => 'form-control',
                                        'placeholder'=> 'فصيلة الدم',
                                        'required'=>'required'
                                    ])!!}
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    {!! Form::select('governorate_id',$governorates->pluck('name','id')->toArray(),null,[
                                        'class' => 'form-control',
                                        'id' => 'governorate',
                                        'placeholder'=> 'المحافظة',
                                        'required'=>'required'
                                        ])!!}
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),null,[
                                        'class' => 'form-control',
                                        'id' => 'city',
                                        'placeholder'=> 'اختار مدينة',
                                        'required'=>'required'
                                        ])!!}
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    <div class="patients">
                        @foreach($donation_requests as $donation_request)
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">{{$bloodType->where('id',$donation_request->blood_type_id)->pluck('name')->first()}}</h2>
                            </div>
                            <ul>
                                <li><span>اسم الحالة:</span>{{$donation_request->patient_name}}</li>
                                <li><span>مستشفى:</span>{{$donation_request->hospital_name}}</li>
                                <li><span>المدينة:</span> {{$city->where('id',$donation_request->city_id)->pluck('name')->first()}}</li>
                            </ul>
                            <a href="{{url('inside-request/'.$donation_request->id)}}">التفاصيل</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="more">
                        <a href="{{url(route('donation_requests'))}}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>

        <!--contact-->
        <div class="contact">
            <div class="container">
                <div class="col-md-7">
                    <div class="title">
                        <h3>اتصل بنا</h3>
                    </div>
                    <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                    <div class="row whatsapp">
                        <a href="#">
                            <img src="{{asset('Front/imgs/whats.png')}}">
                            <p dir="ltr">{{$settings->phone}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--app-->
        <div class="app">
            <div class="container">
                <div class="row">
                    <div class="info col-md-6">
                        <h3>تطبيق بنك الدم</h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                        </p>
                        <div class="download">
                            <h4>متوفر على</h4>
                            <div class="row stores">
                                <div class="col-sm-6">
                                    <a href="#">
                                        <img src="{{asset('Front/imgs/google.png')}}">
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#">
                                        <img src="{{asset('Front/imgs/ios.png')}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="screens col-md-6">
                        <img src="{{asset('Front/imgs/App.png')}}">
                    </div>
                </div>
            </div>
        </div>
        @push('script')
            <script>

                    function toogleFavourite(heart){
                        @if(\Illuminate\Support\Facades\Auth::guard('client')->check())
                        var post_id = heart.id;
                        $.ajax({
                            url : '{{url(route('toggle-favourite'))}}',
                            type: 'post',
                            data : {_token:"{{csrf_token()}}",post_id: post_id},
                            success : function($data){
                                var currentClass = $(heart).attr('class');
                                if(currentClass.includes('first')){
                                    $(heart).removeClass('first-heart').addClass('second-heart');
                                } else {
                                    $(heart).removeClass('second-heart').addClass('first-heart');
                                }
                            }
                        });
                        @else
                        alert('please login first')
                        @endif
                    }

            </script>
            @endpush
            @push('script')
                <script>
                    $('#city').empty()
                    $('#city').append('<option value="">المدينة</option><option disabled>اختار محافظة اولا</option>')
                    $('#governorate').change(function (e){
                        e.preventDefault();
                        var governorate_id = $('#governorate').val();
                        if (governorate_id)
                        {
                            $.ajax({
                                url: '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
                                type: 'get',
                                success : function (data) {
                                    if(data.status == 1){
                                        $('#city').empty();
                                        $('#city').append('<option value="" disabled>اختار مدينة</option>')
                                        $.each(data.data,function(name , city){
                                            $('#city').append('<option value="'+city.id+'">'+city.name+'</option>')
                                        })
                                    }
                                }
                            })
                        }
                        else {
                            $('#city').empty();
                            $('#city').append('<option value="">اختار مدينة</option>')
                        }
                    })

                </script>
        @endpush
@endsection

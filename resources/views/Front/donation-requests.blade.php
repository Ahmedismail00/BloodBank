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
    <!--inside-article-->
        <div class="all-requests">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                        </ol>
                    </nav>
                </div>

                <!--requests-->
                <div class="requests">
                    <div class="head-text">
                        <h2>طلبات التبرع</h2>
                    </div>
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
                                    <li><span>اسم الحالة:</span> {{$donation_request->name}}</li>
                                    <li><span>مستشفى:</span>{{$donation_request->hospital_name}}</li>
                                    <li><span>المدينة:</span>{{$city->where('id',$donation_request->city_id)->pluck('name')->first()}}</li>
                                </ul>
                                <a href="#">التفاصيل</a>
                            </div>
                            @endforeach
                        </div>
                        <div class="pages">
                            <nav aria-label="Page navigation example" dir="ltr">
                                <ul class="pagination">
                                    {!! $donation_requests->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

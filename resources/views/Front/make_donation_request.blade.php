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
    <!--form-->
    <div class="create">
        <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">انشاء طلب تبرع</li>
                        </ol>
                    </nav>
                </div>
                <div class="account-form">
                    {!! Form::open([
                                'action' => 'Front\MainController@send_donation_request',
                                'method' => 'post'
                            ])!!}
                    {!! Form::text('patient_name', null , [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'الإسم',
                        'required' => 'required'
                    ]) !!}
                    {!! Form::text('patient_phone', null , [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'رقم الهاتف',
                        'required' => 'required',
                        'aria-describedby' => 'emailHelp'
                    ]) !!}
                    {!! Form::text('hospital_name', null , [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'اسم المستشفى',
                        'required' => 'required',
                        'aria-describedby' => 'emailHelp'
                    ]) !!}
                    {!! Form::text('hospital_address', null , [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'عنوان المستشفى',
                        'required' => 'required',
                        'aria-describedby' => 'emailHelp'
                    ]) !!}
                    {!! Form::select('patient_age',range(0,100),null, [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'العمر',
                        'required' => 'required',
                        'aria-describedby' => 'emailHelp'
                    ]) !!}
                    {!! Form::select('bags_num',range(0,20),null, [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'عدد الاكياس',
                        'required' => 'required',
                        'aria-describedby' => 'emailHelp'
                    ]) !!}
                    {!! Form::select('blood_type_id', $blood_types->pluck('name','id')->toArray(),null, [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'فصيلة الدم',
                        'required' => 'required',
                        'aria-describedby' => 'emailHelp'
                    ]) !!}
                    {!! Form::select('governorate_id',$governorates->pluck('name','id')->toArray(),null,[
                           'class' => 'form-control',
                           'id' => 'governorates',
                           'placeholder'=> 'اختار محافظة'] )!!}
                    {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),null,[
                        'class' => 'form-control',
                        'id' => 'cities',
                        'placeholder'=> 'اختار مدينة'] )!!}
                    {!! Form::text('details','', [
                        'class' =>'form-control',
                        'id' => 'exampleInputEmail1',
                        'placeholder'=>'التفاصيل',
                        'required' => 'required',
                        'aria-describedby' => 'emailHelp'
                    ]) !!}
                    <div class="create-btn">
                        {!! Form::submit('ارسال', [
                        'class' => 'btn'
                    ])!!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#cities').empty();
            $('#cities').append('<option value="">اختار مدينة</option>')
            $('#governorates').change(function(e){
                e.preventDefault();
                var governorate_id = $('#governorates').val();
                console.log(governorate_id)
                if(governorate_id)
                {
                    $.ajax({
                        url: '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
                        type: 'get',
                        success : function (data) {
                            if(data.status == 1)
                            {
                                $('#cities').empty();
                                $('#cities').append('<option value="">اختار مدينة</option>')
                                $.each(data.data,function(name , city){
                                    $('#cities').append('<option value="'+city.id+'">'+city.name+'</option>')
                                })
                            }
                        }
                    });
                }
                else {
                    $('#cities').empty();
                    $('#cities').append('<option value="">اختار مدينة</option>')
                }
            });

        </script>
    @endpush
@endsection


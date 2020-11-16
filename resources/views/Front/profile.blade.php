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
                                <li class="breadcrumb-item active" aria-current="page">معلوماتك</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="account-form">
                        {!! Form::model($model,[
                            'action'=> ['Front\ProfileController@update',$model->id],
                            'method' => 'put',
                            'enctype'=>'multipart/form-data'
                        ]) !!}
                        {!! Form::text('name', null , [
                            'class' =>'form-control',
                            'id' => 'exampleInputEmail1',
                            'placeholder'=>'الإسم',
                            'required' => 'required'
                        ]) !!}
                        {!! Form::email('email', null , [
                            'class' =>'form-control',
                            'id' => 'exampleInputEmail1',
                            'placeholder'=>'البريد الإلكترونى',
                            'required' => 'required',
                            'aria-describedby' => 'emailHelp'
                        ]) !!}
                        {!! Form::text('d_o_b', null , [
                            'class' =>'form-control',
                            'id' => 'date',
                            'placeholder'=>'تاريخ الميلاد',
                            'required' => 'required',
                            'onfocus' => "(this.type='date')",
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
                        {!! Form::text('phone', null , [
                            'class' =>'form-control',
                            'id' => 'exampleInputEmail1',
                            'placeholder'=>'رقم الهاتف',
                            'required' => 'required',
                            'aria-describedby' => 'emailHelp'
                        ]) !!}
                        {!! Form::text('last_donation_date', null , [
                            'class' =>'form-control',
                            'id' => 'date',
                            'placeholder'=>'آخر تاريخ تبرع',
                            'required' => 'required',
                            'onfocus' => "(this.type='date')",
                            'aria-describedby' => 'emailHelp'
                        ]) !!}
                        {!! Form::password('password', [
                            'class' =>'form-control',
                            'id' => 'exampleInputEmail1',
                            'placeholder'=>'كلمة المرور',
                            'required' => 'required',
                            'aria-describedby' => 'emailHelp'
                        ]) !!}
                        {!! Form::password('password_confirmation' , [
                            'class' =>'form-control',
                            'id' => 'exampleInputEmail1',
                            'placeholder'=>'تأكيد كلمة المرور',
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

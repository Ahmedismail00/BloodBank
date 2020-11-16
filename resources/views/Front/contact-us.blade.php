@extends('layouts.master')
@inject('setting','App\Models\Setting')
<?php
    $settings = $setting->get()->first();
?>
        @section('content')
        <!--contact-us-->
        <div class="contact-us">
        <div class="contact-now">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                        </ol>
                    </nav>
                </div>
                <div class="row methods">
                    <div class="col-md-6">
                        <div class="call">
                            <div class="title">
                                <h4>اتصل بنا</h4>
                            </div>
                            <div class="content">
                                <div class="logo">
                                    <img src="{{asset('Front/imgs/logo.png')}}">
                                </div>
                                <div class="details">
                                    <ul>
                                        <li><span>الجوال:</span> {{$settings->phone}}</li>
                                        <li><span>البريد الإلكترونى:</span> {{$settings->email}}</li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <h4>تواصل معنا</h4>
                                    <div class="icons" dir="ltr">
                                        <div class="out-icon">
                                            <a href="{{url($settings->facebook_link)}}" target="_blank"><img src="{{asset('Front/imgs/001-facebook.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{url($settings->tw_link)}}" target="_blank"><img src="{{asset('Front/imgs/002-twitter.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="#" target="_blank"><img src="{{asset('Front/imgs/003-youtube.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{url($settings->insta_link)}}" target="_blank"><img src="{{asset('Front/imgs/004-instagram.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="#" target="_blank"><img src="{{asset('Front/imgs/005-whatsapp.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="#" target="_blank"><img src="{{asset('Front/imgs/006-google-plus.svg')}}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div class="title">
                                <h4>تواصل معنا</h4>
                            </div>
                            <div class="fields">
                                {!! Form::open([
                                    'action' => 'Front\MainController@contact_us_send',
                                    'method' => 'get'
                                ])!!}
                                {!! Form::text('name', null , [
                                    'class' =>'form-control',
                                    'id' => 'exampleFormControlInput1',
                                    'placeholder'=>'الإسم',
                                    'required' => 'required'
                                ]) !!}
                                {!! Form::email('email', null , [
                                    'class' =>'form-control',
                                    'id' => 'exampleFormControlInput1',
                                    'placeholder'=>'البريد الإلكترونى',
                                    'required' => 'required'
                                ]) !!}
                                {!! Form::text('phone', null , [
                                    'class' =>'form-control',
                                    'id' => 'exampleFormControlInput1',
                                    'placeholder'=>'الجوال',
                                    'required' => 'required'
                                ]) !!}
                                {!! Form::text('subject', null , [
                                    'class' =>'form-control',
                                    'id' => 'exampleFormControlInput1',
                                    'placeholder'=>'عنوان الرسالة',
                                    'required' => 'required'
                                ]) !!}
                                {!! Form::text('message', null , [
                                    'class' =>'form-control',
                                    'id' => 'exampleFormControlInput1',
                                    'placeholder'=>'نص الرسالة',
                                    'required' => 'required'
                                ]) !!}
                                {!! Form::submit('ارسال', [
                                    'class' => 'button'
                                ])!!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        @endsection

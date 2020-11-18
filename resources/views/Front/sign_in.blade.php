   @extends('layouts.master')
   @section('content')
    <div class="signin-account">
        <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                        </ol>
                    </nav>
                </div>
                <div class="signin-form">
                    <div class="logo">
                        <img src="{{asset('Front/imgs/logo.png')}}">
                    </div>
                    @include('partials.validation_errors')
                    @include('flash::message')
                    {!! Form::open([
                            'action' => 'Front\AuthController@sign_in_save',
                            'method' => 'post'
                    ])!!}
                    <div class="form-group">
                        {!! Form::text('phone', null , [
                                'class' =>'form-control',
                                'id' => 'exampleInputEmail1',
                                'placeholder'=>'الجوال',
                                'required' => 'required'
                        ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password', [
                                'class' =>'form-control',
                                'id' => 'exampleInputEmail1',
                                'placeholder'=>'كلمة المرور',
                                'required' => 'required',
                                'aria-describedby' => 'emailHelp',
                                'minlength'=>'8'
                        ]) !!}
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                {!! Form::checkbox('password',null, [
                                    'class' =>'form-check-input',
                                    'id' => 'exampleCheck1',
                                    'placeholder'=>'كلمة المرور',
                                ]) !!}
                                <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot ">
                            <img src="{{asset('Front/imgs/complain.png')}}">
                            <a href="#">هل نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            {!! Form::submit('دخول',[
                                'class'=>'submit'
]                           ) !!}
                        </div>
                        <div class="col-md-6 left">
                            <a href="{{url(route('sign_up'))}}">انشاء حساب جديد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

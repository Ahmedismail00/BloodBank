@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
@section('page_title')
    Settings
@endsection
@section('small_title')
@endsection


<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Settings</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($model,[
               'action'=> ['SettingsController@update',$model->id],
               'method' => 'put',
            ]) !!}
            <div class="form-group">
                <label for="notifications_settings_text">Notification Settings Area</label>
                {!! Form::textarea('notifications_settings_text', '' , [
                    'class' =>'form-control',
                    'rows' => '3',
                ]) !!}
                <label for="about_app">About App</label>
                {!! Form::textarea('about_app', '' , [
                    'rows' => '2',
                    'class' =>'form-control'
                ]) !!}
                <label for="intro">Intro</label>
                {!! Form::textarea('intro', '' , [
                    'rows' => '2',
                    'class' =>'form-control'
                ]) !!}
                <label for="fotter">Fotter</label>
                {!! Form::textarea('fotter', '' , [
                    'rows' => '2',
                    'class' =>'form-control'
                ]) !!}
                <label for="slider_title">Slider Title</label>
                {!! Form::text('slider_title', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="slider_text">Slider Text</label>
                {!! Form::textarea('slider_text', '' , [
                    'rows' => '2',
                    'class' =>'form-control'
                ]) !!}
                <label for="phone">Phone</label>
                {!! Form::text('phone', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="email">Email</label>
                {!! Form::text('email', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="tw_link">Twiiter Link</label>
                {!! Form::text('tw_link', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="insta_link">Instgram Link</label>
                {!! Form::text('insta_link', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="facebook_link">Facebook Link</label>
                {!! Form::text('facebook_link', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="google_plus_link">Googel Plus Link</label>
                {!! Form::text('google_plus_link', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="youtube_link">Youtube Link</label>
                {!! Form::text('youtube_link', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="whatsapp_link">Whats App Link</label>
                {!! Form::text('whatsapp_link', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="google_play_link">Google Play Link</label>
                {!! Form::text('google_play_link', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="app_store_link">App Store Link</label>
                {!! Form::text('app_store_link', null , [
                    'class' =>'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update', [
                    'class' => 'btn btn-primary'
                ]) !!}
            </div>
            {!! Form::close() !!}

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @include('partials.validation_errors')
        </div>
        <!-- /.card-footer-->
    </div>
</section>
<!-- /.content -->

@endsection

@extends('layouts.app')
@inject('role', 'Spatie\Permission\Models\Role')
<?php
$roles = $role->pluck('name','id')->toArray();
?>
@section('content')

    <!-- Content Header (Page header) -->
@section('page_title')
    Profile
@endsection
@section('small_title')
@endsection


<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
                <h3 class="alert alert-danger card-title" role="alert">Note : Keep Password field empty if you dont want change it</h3>


            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            {!! Form::model($model,[
               'action'=> ['UsersController@update',$model->id],
               'method' => 'put',
               'enctype'=>'multipart/form-data'
            ]) !!}
            <div class="form-group">
                <label for="title">Name</label>
                {!! Form::text('name', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="email">Email</label>
                {!! Form::email('email', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="password">Password</label>
                {!! Form::password('password', [
                    'class' =>'form-control'
                ]) !!}<label for="password_confirmation">Confirm Password</label>
                {!! Form::password('password_confirmation' , [
                    'class' =>'form-control'
                ]) !!}
                <label for="roles_list">Roles</label>
                <div class="select2-purple">
                    {!! Form::select('roles_list[]',$roles, null ,[
                    'class' =>'form-control select2-purple js-example-basic-multiple',
                    'multiple' => 'multiple',
                    'data-dropdown-css-class'=>'select2-purple',
                    'data-placeholder'=>'Select Roles'
                ]) !!}
                </div>

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


@push('scripts')


@endpush

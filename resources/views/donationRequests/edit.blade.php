@extends('layouts.app')
@inject('bloodType','App\Models\BloodType')
@inject('city','App\Models\City')
<?php
$blood_types = $bloodType->pluck('name','id')->toArray();
$cities = $city->pluck('name','id')->toArray();
?>
@section('content')
<!-- Content Header (Page header) -->
@section('page_title')
  Donation Requests
@endsection
@section('small_title')
    list of Donation Requests
@endsection


  <!-- Main content -->
  <section class="content">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Donation Request Edit</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            {!! Form::model($model,[
               'action'=> ['DonationRequestsController@update',$model->id],
               'method' => 'put'
            ]) !!}
            <div class="form-group">
                <label for="patient_name">Patient Name</label>
                {!! Form::text('patient_name', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="patient_phone">Patient Phone</label>
                {!! Form::text('patient_phone', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="city">City</label>
                {!! Form::select('city', $cities ,'1', [
                    'class' =>'form-control'
                ]) !!}
                <label for="hospital_name">Hospital Name</label>
                {!! Form::text('hospital_name', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="blood_type">Blood Type</label>
                {!! Form::select('blood_type', $blood_types,'1', [
                    'class' =>'form-control'
                ]) !!}
                <label for="patient_age">Patien Age</label>
                {!! Form::select('patient_age',range(0,100), '1', [
                  'class' =>'form-control'
                ]) !!}
                <label for="bags_num">Bags Number</label>
                {!! Form::select('bags_num',range(0,10), '1', [
                  'class' =>'form-control'
                ]) !!}
                <label for="hospital_address">Hospital Address</label>
                {!! Form::text('hospital_address', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="details">Details</label>
                {!! Form::textarea('details','', [
                  'rows'=>'2',
                  'class'=>'form-control'
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

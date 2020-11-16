@extends('layouts.app')
@inject('bloodType','App\Models\BloodType')
@inject('city','App\Models\City')
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
          <h3 class="card-title">Donation Requests</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            @include('flash::message')
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Phone</th>
                         <th scope="col">City</th>
                         <th scope="col">Blood Type</th>
                        <th scope="col">Patien Age</th>
                        <th scope="col">Bags Number</th>
                        <th scope="col">Hospital Address</th>
                        <th scope="col">Details</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$record->patient_name}}</td>
                                <td>{{$record->patient_phone}}</td>
                                 <td>{{$city->where('id',$record->city_id)->pluck('name')->first()}}</td>
                                 <td>{{$bloodType->where('id',$record->blood_type_id)->pluck('name')->first()}}</td>
                                <td>{{$record->patient_age}}</td>
                                <td>{{$record->bags_num}}</td>
                                <td>{{$record->hospital_address}}</td>
                                <td>{{$record->details}}</td>
                                <td><a href="{{url(route('donationRequests.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a> </td>
                                <td>
                                    {!! Form::open([
                                    'action' => ['DonationRequestsController@destroy',$record->id],
                                    'method' => 'delete'
                                    ]) !!}
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
  </section>
  <!-- /.content -->

@endsection

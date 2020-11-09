@extends('layouts.app')
@inject('client','App\Models\Client')
@inject('bloodType','App\Models\BloodType')
@inject('city','App\Models\City')
@section('content')
<!-- Content Header (Page header) -->
@section('page_title')
    Clients
@endsection
@section('small_title')
    list of clients
@endsection



  <!-- Main content -->
  <section class="content">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Clients</h3>

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
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Blood Type</th>
                        <th scope="col">Date of birth</th>
                        <th scope="col">Last donation date</th>
                        <th scope="col">City</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Activate/Deactivate</th>


                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$record->name}}</td>
                                <td>{{$record->email}}</td>
                                <td>{{$record->phone}}</td>
                                <td>{{$bloodType->where('id',$record->blood_type_id)->pluck('name')->first()}}</td>
                                <td>{{$record->d_o_b}}</td>
                                <td>{{$record->last_donation_date}}</td>
                                <td>{{$city->where('id',$record->city_id)->pluck('name')->first()}}</td>
                                <td>
                                  {!! Form::open([
                                  'action' => ['ClientsController@destroy',$record->id],
                                  'method' => 'delete'
                                  ]) !!}
                                  <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                  {!! Form::close() !!}
                              </td>
                                <td>
                                  @if ($record->activation == 1)
                                    {!! Form::open([
                                    'action' => ['ClientsController@update',$record->id],
                                    'method' => 'put'
                                    ]) !!}
                                    <button class="btn btn-warning"><i class="fas fa-times-circle"></i> Deactivate </button>
                                    {!! Form::close() !!}
                                  @else
                                    {!! Form::open([
                                    'action' => ['ClientsController@update',$record->id],
                                    'method' => 'put'
                                    ]) !!}
                                    <button class="btn btn-success"><i class="fas fa-check-circle"></i> Activate</button>
                                    {!! Form::close() !!}
                                  @endif


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

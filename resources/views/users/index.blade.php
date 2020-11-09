@extends('layouts.app')
@inject('role', 'Spatie\Permission\Models\Role')

@section('content')
<!-- Content Header (Page header) -->
@section('page_title')
    Users
@endsection
@section('small_title')
    list of Users
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
            <a href="{{url(route('users.create'))}}" class="btn btn-primary"><i class="fas fa-plus"></i> New User</a>
            @include('flash::message')
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>


                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($records as $record)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$record->name}}</td>
                                <td>{{$record->email}}</td>
                                <td>@foreach(auth()->user()->getRoleNames() as $role)
                                    <span class="bg-dark rounded p-1">{{$role}}</span>
                                    @endforeach</td>
                                <td><a href="{{url(route('users.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a> </td>
                                <td>
                                  {!! Form::open([
                                  'action' => ['UsersController@destroy',$record->id],
                                  'method' => 'delete'
                                  ]) !!}
                                  <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                  {!! Form::close() !!}
                              </td>
                                <td>
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

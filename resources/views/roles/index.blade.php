@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
@section('page_title')
    Roles
@endsection
@section('small_title')
    list of Roles
@endsection


  <!-- Main content -->
  <section class="content">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Roles</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <a href="{{url(route('roles.create'))}}" class="btn btn-primary"><i class="fas fa-plus"></i> New Role</a>
            @include('flash::message')
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$record->name}}</td>
                                <td><a href="{{url(route('roles.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a> </td>
                                <td>
                                    {!! Form::open([
                                    'action' => ['RoleController@destroy',$record->id],
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

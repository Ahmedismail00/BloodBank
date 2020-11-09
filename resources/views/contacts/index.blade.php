@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
@section('page_title')
    Contacts
@endsection
@section('small_title')
    list of contacts
@endsection


<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Contacts</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            @include('flash::message')
            <div class="row d-flex align-items-stretch">
            @foreach ($records as $record)
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                        <h3 class=" text-muted "><b>{{$record->id}}: </b><b>{{$record->subject}}</b></h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-muted text-sm"><b>About: </b> {{$record->message}} </p>
                                <hr>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="medium mb-1"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> Name: {{$record->name}}</li>
                                    <li class="medium mb-1"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: {{$record->email}}</li>
                                    <li class="medium mb-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{$record->phone}}</li>
                                    <li class="medium mb-1"><span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span> Date : {{$record->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            {!! Form::open([
                                'action' => ['ContactsController@destroy',$record->id],
                                'method' => 'delete'
                                ]) !!}
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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

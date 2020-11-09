@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
@section('page_title')
    Settings
@endsection
@section('small_title')
    Settings
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
            @include('flash::message')

            <div class="table-responsive">
                <table class="table table-hover">
                    @foreach ($records as $record)
                    <tbody>
                    <tr>
                        <th scope="row">Notifications Settings Text</th>
                        <td>{{$record->notifications_settings_text}}</td>

                    </tr>
                    <tr>
                        <th scope="row">About App</th>
                        <td>{{$record->about_app}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{$record->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td>{{$record->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Twitter Link</th>
                        <td>{{$record->tw_link}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Facebook Link</th>
                        <td>{{$record->facebook_link}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Instgram Link</th>
                        <td>{{$record->insta_link}}</td>
                    </tr>
                    </tbody>
                    @endforeach


                </table>
                <a href="{{url(route('settings.edit',$record->id))}}" class="btn-lg btn-success float-right"><i class="fa fa-edit"></i>Edit</a>

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

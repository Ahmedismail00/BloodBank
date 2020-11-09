@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
@section('page_title')
    Posts
@endsection
@section('small_title')
    list of posts
@endsection


  <!-- Main content -->
  <section class="content">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Posts</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <a href="{{url(route('posts.create'))}}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> New Post</a>
            @include('flash::message')
            <div class="row d-flex align-items-stretch">
            @foreach ($records as $record)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            {{$record->id}}
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="lead"><b><b>Tilte: </b>{{$record->title}}</b></h2>
                                    <p class="text-muted text-sm"><b>Contents: </b> {{substr($record->content,0,'65')}}..... </p>
                                </div>
                                <div class="col-12 text-center float-right">
                                    <img src="{{url('uploads/posts_images/'.$record->image)}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <span class="float-right ml-2"><a href="{{url(route('posts.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a></span>
                                {!! Form::open([
                                    'action' => ['PostsController@destroy',$record->id],
                                    'method' => 'delete'
                                    ]) !!}
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
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

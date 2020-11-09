@extends('layouts.app')
@inject('model', 'App\Models\Governorate')
@inject('categories', 'App\Models\Category')
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
          <h3 class="card-title">Add new Post</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

          {!! Form::model($model,[
            'action'=> 'PostsController@store',
            'enctype'=>'multipart/form-data'
         ]) !!}
         <div class="form-group">
             <label for="title">Title</label>
             {!! Form::text('title', null , [
                 'class' =>'form-control'
             ]) !!}
             <label for="image">Image</label>
             {!! Form::file('image', [
                 'class' =>'form-control'
             ]) !!}
             <label for="content">Content</label>
             {!! Form::textarea('content', '' , [
                 'rows' => '2',
                 'class' =>'form-control'
             ]) !!}
             <label for="category">Category</label>
             {!! Form::select('category',$categories->pluck('name'),1
              , [
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

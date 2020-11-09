@extends('layouts.app')
@inject('model', 'Spatie\Permission\Models\Role')
@inject('permissions', 'Spatie\Permission\Models\permission')
@section('content')
<!-- Content Header (Page header) -->
@section('page_title')
    Roles
@endsection
@section('small_title')
    list of roles
@endsection


  <!-- Main content -->
  <section class="content">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add New Role</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            {!! Form::model($model,[
               'action'=> 'RoleController@store'
            ]) !!}
            <div class="form-group row">
                <label for="name">Name</label>
                {!! Form::text('name', null , [
                    'class' =>'form-control'
                ]) !!}
                <label for="description">Description</label>
                {!! Form::textarea('description', '' , [
                 'rows' => '2',
                 'class' =>'form-control'
                ]) !!}
            </div>
            <input type="checkbox" id="select-all"><label for="selectAll" class="ml-1">Select All</label>
            <div class="row">
                @foreach($permissions->all() as $permission)
                    <div class=" col-sm-3 col-md-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="permission_list[]" value="{{$permission->id}}"
                                       @if($model->hasPermissionTo($permission->name))
                                       checked
                                @endif
                            </label>
                            <label> {{$permission->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
            <div class="form-group">
                {!! Form::submit('Add', [
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
  </section>
  <!-- /.content -->

@endsection
@push('scripts')
    <script>
        $("#select-all").click(function(){
            $("input[type=checkbox]").prop('checked',$(this).prop('checked'));
        });
    </script>

@endpush


@extends('layouts.app')
@inject('client', 'App\Models\Client')
@inject('donation', 'App\Models\DonationRequest')
@inject('post', 'App\Models\Post')
@inject('contact', 'App\Models\Contact')
@section('content')
<!-- Content Header (Page header) -->
@section('page_title')
    Dashboard
@endsection
@section('small_title')
    Statitstics
@endsection

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clients</span>
            <span class="info-box-number">{{$client->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-chart-line"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Donations</span>
              <span class="info-box-number">{{$donation->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Posts</span>
              <span class="info-box-number">{{$post->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Contacts</span>
              <span class="info-box-number">{{$contact->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
  </section>
  <!-- /.content -->

@endsection

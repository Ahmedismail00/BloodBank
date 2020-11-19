@extends('layouts.master')
@section('content')
        <!--inside-article-->
        <section class="article-details">
            <div class="inside-article">
                <div class="container">
                    <div class="path">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="#">المقالات</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="article-image">
                        <img src="{{asset('uploads/posts_images/'.$article->image)}}">
                    </div>
                    <div class="article-title col-12">
                        <div class="h-text col-6">
                            <h4>{{$article->title}}</h4>
                        </div>
                        <div class="icon col-6">
                            <button type="button" onclick="toogleFavourite(this)" class="favourite
                                @if(\Illuminate\Support\Facades\Auth::guard('client')->check())
                                    @if($article->is_favourite)
                                        second-heart
                                    @else()
                                        first-heart
                                    @endif()
                                @else
                                    first-heart
                                @endif" id="{{$article->id}}">
                                <i  class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <!--text-->
                    <div class="text">
                        <p>
                            {{$article->content}}
                        </p>
                    </div>

                    <!--articles-->
                    <div class="articles">
                        <div class="title">
                            <div class="head-text">
                                <h2>مقالات ذات صلة</h2>
                            </div>
                        </div>
                        <div class="view">
                            <div class="row">
                                <!-- Set up your HTML -->
                                <div class="owl-carousel articles-carousel">
                                    @foreach($posts as $post)
                                    <div class="card">
                                        <div class="photo">
                                            <img src="{{asset('uploads/posts_images/'.$post->image)}}" class="card-img-top" alt="...">
                                            <a href="article-details.html" class="click">المزيد</a>
                                        </div>
                                        <div class="favourite">
                                            <i id="{{$post->id}}" onclick="toogleFavourite(this)" class="far fa-heart
                                                @if(\Illuminate\Support\Facades\Auth::guard('client')->check())
                                                    @if($post->is_favourite)
                                                        second-heart
                                                    @else()
                                                        first-heart
                                                    @endif()
                                                @else
                                                    first-heart
                                                @endif
                                            "></i>

                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                            <p class="card-text">
                                                {{$post->content}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @push('script')
            <script>
                function toogleFavourite(heart){
                    var post_id = heart.id;
                    $.ajax({
                        url : '{{url(route('toggle-favourite'))}}',
                        type: 'post',
                        data : {_token:"{{csrf_token()}}",post_id: post_id},
                        success : function($data){
                            var currentClass = $(heart).attr('class');
                            if(currentClass.includes('first')){
                                $(heart).removeClass('first-heart').addClass('second-heart');
                            } else {
                                $(heart).removeClass('second-heart').addClass('first-heart');
                            }
                        }
                    });

                }
            </script>
        @endpush
@endsection

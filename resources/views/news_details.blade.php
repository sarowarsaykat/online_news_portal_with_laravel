@extends('layout.master')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">News details</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="news-details">
                        <div class="sn-container">
                            <div class="sn-img">
                                <img src="{{ asset('uploads/news/' . $news->image) }}" alt="{{ $news->title }}"
                                    class="img-fluid">
                            </div>
                            <div class="sn-content">
                                <h1 class="sn-title">{{ $news->title }}</h1>
                                <div class="news-content">
                                    {!! $news->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sn-related">
                        <h2>Related News</h2>
                        <div class="row sn-slider">
                            @foreach ($related_news as $related)
                                <div class="col-md-4">
                                    <div class="sn-img">
                                        <img src="{{ asset('uploads/news/' . $related->image) }}"
                                            alt="{{ $related->title }}" class="card-img-top img-fluid"
                                            style="object-fit: cover; height: 200px; width: 100%;">
                                        <div class="sn-title">
                                            <a
                                                href="{{ route('news.details', $related->id) }}">{{ Str::limit($related->title, 50) }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <div class="tab-news">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#popular">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                    </li>
                                </ul>

                                <div class="tab-content">

                                    <div id="popular" class="container tab-pane active">
                                        <?php
                                        $popular_news = App\Http\Controllers\MyController::popularNews();
                                        ?>
                                        @foreach ($popular_news as $popular)
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="{{ asset('uploads/news/' . $popular->image) }}" />
                                                </div>
                                                <div class="tn-title">
                                                    <a
                                                        href="{{ route('news.details', $popular->id) }}">{{ Str::limit($popular->title, 100) }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="latest" class="container tab-pane fade">
                                        @foreach ($latest_news as $latest)
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="{{ asset('uploads/news/' . $latest->image) }}" />
                                                </div>
                                                <div class="tn-title">
                                                    <a
                                                        href="{{ route('news.details', $latest->id) }}">{{ Str::limit($latest->title, 100) }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">News Category</h2>
                            @foreach ($categories as $categorie)
                                <div class="category">
                                    <ul>
                                        <li><a
                                                href="{{ route('category.details', $categorie->id) }}">{{ $categorie->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">Tags Cloud</h2>
                            @foreach ($categories as $categorie)
                                <div class="tags float-left m-1">
                                    <a href="{{ route('category.details', $categorie->id) }}">{{ $categorie->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->
@stop

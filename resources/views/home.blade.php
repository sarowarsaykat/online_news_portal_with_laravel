@extends('layout.master')
@section('content')
    <!-- Top slider Start-->
    <div class="top-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="row tn-slider">
                        @foreach ($sliders as $slider)
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="{{ asset('uploads/news/' . $slider->image) }}" />
                                    <div class="tn-title">
                                        <a href="{{ route('news.details', $slider->id) }}">{{ $slider->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top slider End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row">
                @foreach ($categories as $categorie)
                    <div class="col-md-6">
                        <h2>{{ $categorie->name }}</h2>
                        <div class="row cn-slider">
                            <?php
                            $news = App\Http\Controllers\MyController::lodeNewsUsingCategoryId($categorie->id);
                            ?>
                            @foreach ($news as $n)
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <img src="{{ asset('uploads/news/' . $n->image) }}" width="" height="200px" />
                                        <div class="cn-title">
                                            <a
                                                href="{{ route('news.details', $n->id) }}">{{ Str::limit($n->title, 30) }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Tab News Start-->
    <div class="tab-news mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#popular">Popular News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#latest">Latest News</a>
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
        </div>
    </div>
    <!-- Tab News Start-->

    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($readNews as $item)
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="{{ asset('uploads/news/' . $item->image) }}" />
                                    <div class="mn-title">
                                        <a
                                            href="{{ route('news.details', $item->id) }}">{{ Str::limit($item->title, 30) }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mn-list">
                        <h2>Read More</h2>
                        @foreach ($readNews as $item)
                            <ul>
                                <li><a
                                        href="{{ route('news.details', $item->id) }}">{{ Str::limit($item->title, 51) }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News End-->
@stop

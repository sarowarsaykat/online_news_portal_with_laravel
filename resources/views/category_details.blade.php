@extends('layout.master')
@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-light py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Single News Start -->
<div class="single-news my-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-12">
                <!-- Category Title -->
                <div class="mb-4">
                    <h1 class="text-primary">{{ $category->name }}</h1>
                    <p class="text-muted">Discover the latest updates and stories in <strong>{{ $category->name }}</strong>.</p>
                </div>
                <!-- News Cards -->
                <div class="row g-4">
                    @forelse ($news as $item)
                        <div class="col-md-12">
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('uploads/news/' . $item->image) }}" class="img-fluid rounded-start" alt="{{ $item->title }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ Str::limit($item->title, 55) }}</h5>
                                            <p class="card-text text-muted">{{ Str::limit($item->description, 200) }}</p>
                                            <a href="{{ route('news.details', $item->id) }}" class="btn btn-primary btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">No news available in this category.</div>
                        </div>
                    @endforelse
                </div>
                <!-- Pagination -->
                <div class="mt-4">
                    {{ $news->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single News End -->
@stop

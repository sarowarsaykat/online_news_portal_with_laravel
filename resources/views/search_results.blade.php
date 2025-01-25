@extends('layout.master')
@section('content')
    <div class="container mt-4">
        <h3>Search Results</h3>

        <!-- Check if there are results -->
        @if ($news->count() > 0)
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4"> <!-- Adjusted column size -->
                        <div class="card h-100">
                            <!-- Card Image -->
                            <img src="{{ asset('uploads/news/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}"
                                style="object-fit: cover; height: 150px;"> <!-- Reduced image height -->

                            <div class="card-body d-flex flex-column">
                                <!-- Title -->
                                <h5 class="card-title" style="font-size: 1.1rem;">{{ Str::limit($item->title, 30) }}</h5> <!-- Reduced title font size -->
                                <!-- Description -->
                                <p class="card-text" style="font-size: 0.9rem; height: 70px; overflow: hidden;">{{ Str::limit($item->description, 100) }}</p> <!-- Shortened description -->
                                <!-- Category -->
                                <p class="text-muted" style="font-size: 0.8rem;">Category: {{ $item->category->name }}</p>
                                <!-- Read More Button -->
                                <a href="{{ route('news.details', $item->id) }}" class="btn btn-sm btn-primary mt-2">Read More</a> <!-- Smaller button -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $news->links('pagination::bootstrap-4') }}
            </div>
            
        @else
            <p>No results found</p>
        @endif
    </div>
@stop

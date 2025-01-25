<!DOCTYPE html>
<html>

<head>
    @include('backend.shared.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        @include('backend.shared.navber')
        @include('backend.shared.sidebar')

        <div class="content-wrapper">

            <!-- form start-->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit News</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form action="{{ route('news.update', $news->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                value="{{ old('title', $news->title) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $news->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" name="date" id="date" class="form-control"
                                                value="{{ old('date', $news->date) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $news->description) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            @if ($news->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/news/' . $news->image) }}"
                                                        alt="Current Image" width="100">
                                                    <p class="text-muted">Current Image</p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="slider" class="form-label">Slider</label>
                                            <select name="slider" id="slider" class="form-control" required>
                                                <option value="1" {{ $news->slider ? 'selected' : '' }}>Yes
                                                </option>
                                                <option value="0" {{ !$news->slider ? 'selected' : '' }}>No
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="is_active" class="form-label">Is Active</label>
                                            <select name="is_active" id="is_active" class="form-control" required>
                                                <option value="1" {{ $news->is_active ? 'selected' : '' }}>Yes
                                                </option>
                                                <option value="0" {{ !$news->is_active ? 'selected' : '' }}>No
                                                </option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update News</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- form end-->

        </div>

        @include('backend.shared.footer')



    </div>


    @include('backend.shared.script')
</body>

</html>

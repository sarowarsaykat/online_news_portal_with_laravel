<!DOCTYPE html>
<html>

<head>
    @include('backend.shared.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        @include('backend.shared.navber')
        @include('backend.shared.sidebar')

         <!-- body start-->
        <div class="content-wrapper">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Create SubCategory</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" name="date" id="date" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Message" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="slider" class="form-label">Slider</label>
                                            <select name="slider" id="slider" class="form-control" required>
                                                <option value="">Select Slider Status</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="is_active" class="form-label">Is Active</label>
                                            <select name="is_active" id="is_active" class="form-control" required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Create News</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- body end-->

        @include('backend.shared.footer')



    </div>


    @include('backend.shared.script')
</body>

</html>
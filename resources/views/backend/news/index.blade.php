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
                                <h3 class="card-title">Sub Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Create News</a>
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="width:250px">Title</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Image</th>
                                            <th>Slider</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($news as $item)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category->name ?? 'N/A' }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{ asset('uploads/news/' . $item->image) }}" alt="News Image" width="70" height="50">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->slider ? 'Yes' : 'No' }}</td>
                                                <td>{{ $item->is_active ? 'Yes' : 'No' }}</td>
                                                <td>
                                                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
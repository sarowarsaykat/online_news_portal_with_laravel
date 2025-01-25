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
                                <h3 class="card-title">Contact Messages</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td>
                                                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-warning btn-sm">View</a>
                                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;" 
                                                            onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                      </form>                                                      
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

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
        <div class="content-wrapper py-4 px-3">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white text-center">
                            <h3 class="card-title mb-0">Contact Message Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <div class="list-group-item">
                                    <h5 class="mb-1"><strong>Name:</strong></h5>
                                    <p class="mb-0">{{ $contact->name }}</p>
                                </div>
                                <div class="list-group-item">
                                    <h5 class="mb-1"><strong>Email:</strong></h5>
                                    <p class="mb-0">{{ $contact->email }}</p>
                                </div>
                                <div class="list-group-item">
                                    <h5 class="mb-1"><strong>Subject:</strong></h5>
                                    <p class="mb-0">{{ $contact->subject }}</p>
                                </div>
                                <div class="list-group-item">
                                    <h5 class="mb-1"><strong>Message:</strong></h5>
                                    <p class="mb-0">{{ $contact->message }}</p>
                                </div>
                            </div>
                            <div class="mt-3 text-end">
                                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
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

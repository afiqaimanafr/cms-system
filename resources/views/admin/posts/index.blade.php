<x-admin-master>

    @section('content')
        <h1><strong>All Posts</strong></h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="col-12 text-right">
                        <a href="{{ route('post:create') }}" class="btn btn-primary mb-2">Create new post</a>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <img height="40px" src="{{ $post->post_image }}" alt="Post Image">
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td>

                                        <form method="post" action="{{ route('post:destroy', $post->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('post:edit', $post->id) }} " class="btn btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <div class="mx-auto">
                {{ $posts->links() }}
            </div>
        </div>
        
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
    @endsection
</x-admin-master>

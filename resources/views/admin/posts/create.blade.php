<x-admin-master>

    @section('content')

        <h1>Create Post</h1>

        <form method="POST" action="{{ route('post:store') }}" enctype="multipart/form-data" id="create_post_form">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby=""
                    placeholder="Enter your title">
            </div>
            <div class="form-group">
                <label for="file">Image</label>
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </div>
            <div class="form-group">
                <textarea type="text" name="body" class="form-control" id="body" cols="30" rows="10"
                    placeholder="Enter your content"></textarea>
            </div>
            <button id="btn_create_post" type="submit" class="btn btn-primary">Create Post</button>
        </form>

    @endsection

@section('scripts')

    <script src="{{ asset('js/pages/custom/post/create_post.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    @if (Session::has('error'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.error("{!! Session::get('error') !!}", "Sorry.");
        </script>
    @endif
@endsection

</x-admin-master>

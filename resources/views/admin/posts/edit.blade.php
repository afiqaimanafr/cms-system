<x-admin-master>

    @section('content')

        <h1>Edit Post</h1>

        <form method="POST" action="{{ route('post:update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby=""
                    placeholder="Enter your title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="file">Image</label>
                <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
                <label for="file">Image File</label>
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </div>
            <div class="form-group">
                <textarea type="text" name="body" class="form-control" id="body" cols="30" rows="10" placeholder="Enter your content">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit Post</button>
        </form>

    @endsection

</x-admin-master>

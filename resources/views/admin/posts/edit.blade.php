<x-admin-master>
    @section('content')
    <h1> Edit a post </h1>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif

    <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title"> Title </label>
            <input type="text" value="{{$post->title}}" name="title" id="title" class="form-control" placeholder="Enter Title">
        </div>

        <div class="form-group">
            <div><img src="{{$post->post_image}}" height="100px" alt="post image"></div>
            <label for="post_image"> Image </label>
            <input type="file" value="{{$post->post_image}}" name="post_image" id="post_image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="body"> Body </label>
            <textarea name="body" id="body" class="form-control">{{$post->body}} </textarea>
        </div>

        <button class="btn btn-primary" type="submit"> Update </button>
    </form>
    @endsection
</x-admin-master>
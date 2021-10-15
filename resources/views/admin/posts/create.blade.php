<x-admin-master>
    @section('content')
    <h1> Create </h1>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif

    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title"> Title </label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
        </div>

        <div class="form-group">
            <label for="post_image"> Image </label>
            <input type="file" name="post_image" id="post_image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="body"> Body </label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary" type="submit"> Submit </button>
    </form>
    @endsection
</x-admin-master>
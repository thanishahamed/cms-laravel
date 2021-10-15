<x-admin-master>
    @section('content')
    <h1> View </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('message'))
                <div class="alert alert-danger"> {{Session::get('message')}} </div>
                @elseif(Session::has('post-created-message'))
                <div class="alert alert-success"> {{Session::get('post-created-message')}} </div>
                @elseif(Session::has('post-updated-message'))
                <div class="alert alert-success"> {{Session::get('post-updated-message')}} </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>image</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>image</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td><a href="{{route('post.edit',$post->id)}}">{{$post->title}}</a></td>
                            <td>{{$post->body}}</td>
                            <td><img src="{{$post->post_image}}" width="100px" /></td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                @can('view', $post)
                                <form action="{{route('post.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"> Delete </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{$posts->links()}}
    @endsection
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
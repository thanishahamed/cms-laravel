<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::simplePaginate(5);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    public function create(Request $request)
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if ($request['post_image']) {

            $file = $request->post_image;
            $fileName = $file->getClientOriginalName();
            $fileFileName = time() . "_" . $fileName;
            $fileFilePath = asset('/images/' . $fileFileName);
            $file->move('images', $fileFileName);

            $inputs['post_image'] = $fileFilePath;
        }

        $inputs['user_id'] = auth()->user()->id;
        $post = Post::create($inputs);

        $request->session()->flash('post-created-message', 'Post Added Successfully! ' . $inputs['title']); //sending a session 1st way
        // return back();
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('message', 'Deleted Successfully'); //sending a session 2nd way

        return back();
    }

    public function edit(Post $post)
    {
        // $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if ($request['post_image']) {

            $file = $request->post_image;
            $fileName = $file->getClientOriginalName();
            $fileFileName = time() . "_" . $fileName;
            $fileFilePath = asset('/images/' . $fileFileName);
            $file->move('images', $fileFileName);

            $inputs['post_image'] = $fileFilePath;
        } else {
            $inputs['post_image'] = $post->post_image;
        }

        $inputs['user_id'] = auth()->user()->id;
        $pst = Post::findOrFail($post->id);
        $pst->title = $inputs['title'];
        $pst->body = $inputs['body'];
        $pst->post_image = $inputs['post_image'];

        $this->authorize('update', $post);

        $pst->save();

        $request->session()->flash('post-updated-message', 'Post Updated Successfully! ' . $pst->title); //sending a session 1st way
        // return back();
        return redirect()->route('post.index');
    }
}

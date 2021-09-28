<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class PostController extends Controller
{
    public function show(Post $post)
    {

        return view('layouts.blog-post', ['post'=>$post]);
    }

    public function create() 
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title'=>'required|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
        
        auth()->user()->posts()->create($inputs);
        return redirect()->route('post:index')->with('success', 'Post has been created'); 
        
    }

    public function index()
    {
        $posts = auth()->user()->posts()->paginate(5);
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return back()->with('success', 'Post has been deleted'); ;
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title'=>'required|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image= $inputs['post_image'];
        }

        $post->title= $inputs['title'];
        $post->body= $inputs['body'];

        $this->authorize('update', $post);

        $post->update();
        
        return redirect()->route('post:index')->with('success', 'Post has been updated');      
    }
    
}

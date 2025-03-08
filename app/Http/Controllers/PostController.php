<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        if($search!=''){
            $posts = Post::where('title','like','%'.$search.'%')->orwhere('content', 'like','%'.$search.'%' )->get();
        }else{
            $posts = Post::all();
        }
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $user = Auth::user();
        $post = new Post;
        $images = explode(',', $request->path);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $user->id;
        $post->save();
        foreach($images as $im){
            $image = new Image;
            $image->post_id = $post->id;
            $image->path = $im;
            $image->save();            
        }
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        //$post = Post::find($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        //$post = Post::find($id);
        //Gate::authorize('edit-post', $post);

        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //

        //$post = Post::find($id);
        //Gate::authorize('edit-post', $post);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $images = explode(',', $request->path);
        foreach($images as $im){
            $image = new Image;
            $image->post_id = $post->id;
            $image->path = $im;
            $image->save();            
        }
        return view('post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        //$post = Post::find($id);
        //Gate::authorize('edit-post', $post);
        
        $post->delete();
        return redirect('post');
    }

    public function image(Post $post, Image $image)
    {
        return view('image.show', compact('image'));
    }

    public function deleteimage(Post $post, Image $image)
    {
        $image->delete();
        return redirect('post/'.$post->id.'/edit');
    }
}

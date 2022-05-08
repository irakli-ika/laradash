<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\has;
use App\Models\Post;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('comments')->get();
        $data = [ 'posts' => $posts ];
        return view('post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required'
        ]);

        $post = new Post();
        // dd($request->images);
        if ($request->hasfile('image')) {
            $fileName = uniqid() . '.' . $request->image->extension();

            if ($request->image->move(public_path('images/poster'), $fileName)) {
                $post -> title = $request->title;
                $post -> description = $request->description;
                $post -> image = $fileName;
                
                $post->save();

                return redirect()->route('posts.index')->with('message', 'Post created successfully');
            }
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
        ]);

        $post = Post::findOrFail($id);
        $fileName = null;
        if ($request->hasfile('image')) {
            if(File::exists(public_path("images/poster/$post->image"))) {
                File::delete(public_path("images/poster/$post->image"));
            }
            $fileName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/poster'), $fileName);
        }
        $post -> title = $request->title;
        $post -> description = $request->description;
        $fileName ? $post -> image = $fileName : '';
        $post->update();
        return redirect()->route('posts.edit', $id)->with('message', 'Post updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post deleted successfully');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('post.trash', compact('posts'));
    }
    
    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return back()->with('message', 'Post restored successfully');
    }

    public function trashedDestroy($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        if(File::exists(public_path("images/poster/$post->image"))) {
            File::delete(public_path("images/poster/$post->image"));
        }
        $post->forceDelete();

        return back()->with('message', 'Post deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->with('getUser')->get();

        return view('post.index')->with([
            'posts'=>$posts,
        ]);
    }

    public function getFormPost()
    {
        return view('post.post_form');
    }

    public function storeFormPost(Request $request)
    {
        $posts = Post::create(['title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'author_id'=>Auth::user()->id,
            ]);
        return redirect(route('post.index', $posts));

    }

    public function detail($id)
    {
        $post =Post::with("getComments")->find($id);

        return view('post.post_detail')->with([
            'post' => $post,
            'id' => $id,
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.post_edit')->with([
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->save();
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    
    public function storeComment(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back();
        }
        $comment = Comment::create([
            'name'    => Auth::user()->name,
            'comment' => $request->comment,
            'post_id' => $post->id,
        ]);
        
        
        return redirect()->action('PostController@detail', $id)->with([
            'post'    => $post,
            'comment' => $comment,
        ]);
        
    }
    
    
}
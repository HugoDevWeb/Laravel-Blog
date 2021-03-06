<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    const PATH_VIEW_STATIC = "admin.entities.static.";
    const PATH_VIEW_POST = "admin.entities.post.";
    
    public function index()
    {
        return view(self::PATH_VIEW_STATIC . 'index');
    }
    
    public function postIndex()
    {
        $posts = Post::orderBy('id', 'DESC')->with('getUser')->get();
        
        return view(self::PATH_VIEW_POST . 'post_index')->with([
            'posts' => $posts,
        ]);
    }
    
    public function adminFormPost()
    {
        return view(self::PATH_VIEW_POST . 'post_form');
    }
    
    public function adminStoreFormPost(Request $request)
    {
        $posts = Post::create(['title'       => $request->title,
                               'description' => $request->description,
                               'image'       => $request->image,
                               'author_id'   => Auth::user()->id,
        ]);
        flashy()->success('Votre post a été crée avec succès !');
        
        return redirect(route('admin.post_index', $posts));
    }
    
    public function postDetail($id)
    {
        $post = Post::find($id);
        
        return view(self::PATH_VIEW_POST . 'post_detail')->with([
            'post' => $post,
        ]);
    }
    
    public function postEdit($id)
    {
        $post = Post::find($id);
        
        return view(self::PATH_VIEW_POST . 'post_edit')->with([
            'post' => $post
        ]);
    }
    
    public function postUpdate(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->save();
        
        flashy()->success('Le post a bien été modifié !');
        
        return redirect()->route('admin.post_index');
    }
    
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        
        flashy()->success('Le post a bien été supprimé !');
        
        return redirect()->route('admin.post_index');
    }
    
    public function validateComment($idPost, $idComm)
    {
        $post = Post::where('id', $idPost)->first();
        $comm = Comment::where('id', $idComm)->first();
        $comm->validated = 1;
        $comm->save();
        
        flashy()->success('Le commentaire a bien été validé !');
        
        return redirect()->action('AdminController@postDetail', $post->id);
    }
    
    public function storeComment(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back();
        }
        
        
        $comment = Comment::create([
            'name'      => Auth::user()->name,
            'comment'   => $request->comment,
            'post_id'   => $post->id,
            'validated' => 1,
        ]);
        
        flashy()->success('Votre commentaire a été crée avec succès !');
        
        return redirect()->action('AdminController@postDetail', $id)->with([
            'post'    => $post,
            'comment' => $comment,
        ]);
        
    }
}

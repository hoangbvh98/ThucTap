<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $allPosts = DB::table('posts')
                    ->join('users','users.id', '=', 'posts.user_id')
                    ->select('posts.*', 'users.name AS user_name')
                    ->orderBy('id', 'desc')
                    ->get();
        return view('question3.pages.main', compact('allPosts'));
    }
    public function getDetailPost($id)
    {
        $post = Post::find($id);
        $user = User::find($post->user_id);
        return view('question3.pages.detail_post', compact('post','user'));
    }
    public function getEditPost($id)
    {
        $post = Post::find($id);
        return view('question3.pages.edit_post', compact('post'));
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        $postName = $post->title;
        if($post->delete()){
            return redirect()->back()->with('success', "Delete ".$postName." successfull!");
        }
        else{
            return redirect()->back()->with('error', "Delete Fail");
        }
    }
    public function getPostsByMe()
    {
        $allPosts = DB::table('posts')
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    ->select('posts.*', 'users.name AS user_name')
                    ->where('posts.user_id', '=', Auth::user()->id)
                    ->get();
        return view('question3.pages.posts_by_me', compact('allPosts'));
    }
    public function createPost(Request $request)
    {
        $request->validate([
            "title" => "required"
        ], ["title.required" => "Tiêu đề không được bỏ trống"]);
        $post = new Post;
        $post->content = $request->get('content');
        $post->title   = $request->get('title');
        $post->first_image = $this->getImageLink($request->get('content'));
        $post->user_id  = Auth::user()->id;
        if($post->save()){
            return redirect()->back()->with('success', "Insert successfull!");
        }
        else{
            return redirect()->back()->with('error', "Insert Fail");
        }
    }
    
    public function editPost(Request $request)
    {
        $request->validate([
            "title" => "required"
        ], ["title.required" => "Tiêu đề không được bỏ trống"]);
        $id   = $request->get('postId');
        $post = Post::find($id);
        $post->content = $request->get('content');
        $post->title   = $request->get('title');
        $post->first_image = $this->getImageLink($request->get('content'));
        if($post->save()){
            return redirect()->back()->with('success', "update successfull!");
        }
        else{
            return redirect()->back()->with('error', "update Fail");
        }
    }
    private function getImageLink($content){
        $pattern = "#(?:http|https)\:.*?(?:png|jpg)#";
        preg_match($pattern,$content,$matches);
        if(count($matches) > 0){
            return $matches[0];
        }
        return "";
    }
    
}

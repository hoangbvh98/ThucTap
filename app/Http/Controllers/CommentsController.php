<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function createComment(Request $request){
        $comment = new Comment;
        $comment->content_comment = $request->get('content');
        $comment->post_id = $request->get('postId');
        $comment->user_id = 1;
        
        if($comment->save()){
            $comment->userFullName = $comment->user->name;
            $this->result(200, "success", $comment->toArray());
        }else{
            $this->result(500, "Server Error");
        }
    }
    public function deleteComment(Request $request){
        $comment = Comment::find($request->get('id'));
        if($comment->comment()){
            $this->result(200, "success");
        }else{
            $this->result(500, "Server Error");
        }
    }
   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function getUsers(Request $request){
        $id = "";
        $name = "";
        $class = "";
        if($request->has('id') && $request->has('name') && $request->has('class')){
            $id = $request->get('id');
            $name = $request->get('name');
            $class = $request->get('class');
        }
        $users = DB::table('users')->where('id','like','%'.$id.'%')
                                   ->where('name','like','%'.$name.'%')
                                   ->where('class','like','%'.$class.'%')
                                   ->orderBy('id','DESC')->get();
        return view('topic4_eloquent.users',compact('users'));
    }
}

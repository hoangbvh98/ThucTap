<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Hàm lấy thông tin của user khi search trên các trường id user, user name, user class
     *
     * @param Request $request
     * @return [User/Collection]
     */
    public function getUsers(Request $request)
    {
        $id = "";
        $name = "";
        $class = "";
        if($request->has('id') && $request->has('name') && $request->has('class')){
            $id = $request->get('id');
            $name = $request->get('name');
            $class = $request->get('class');
        }
        $users = DB::table('users')->where('id', 'like', '%'.$id.'%')
                                   ->where('name', 'like', '%'.$name.'%')
                                   ->where('class', 'like', '%'.$class.'%')
                                   ->orderBy('id', 'DESC')->get();
        return view('topic4_eloquent.users', compact('users'));
    }
    /**
     * Hàm lấy thông tin của user khi search trên các trường id user, phone number, role name
     *
     * @param Request $request
     * @return [User/Collection]
     */
    public function getUsersPart2(Request $request)
    {
        $userId = "";
        $phone = "";
        $roleName = "";
        if($request->has('userId') && $request->has('phone') && $request->has('roleName')){
            $userId = $request->get('userId');
            $phone = $request->get('phone');
            $roleName = $request->get('roleName');
        }
        $users = DB::table('users')->select('users.id','users.name','users.class', 'phones.number', 'roles.name as roleName')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('phones', 'users.id', '=', 'phones.user_id')
                ->where('users.id', 'like', '%'.$userId.'%')
                ->where('phones.number', 'like', '%'.$phone.'%')
                ->where('roles.name', 'like', '%'.$roleName.'%')
                ->groupBy('users.id', 'phones.number', 'roles.name','users.name','users.class')
                ->orderBy('users.id', 'DESC')->get();
        return view('topic4_eloquent.users2', compact('users'));
    }
}

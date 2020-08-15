
@extends('topic3_database.index')
@section('content')
<div class="container" style="margin-top:30px">
    <h2>Danh sách user</h2>
    <br>
    <h5>Tìm kiếm:</h5>
    <form method="GET" action="{{url('/users-part2')}}">
        <div class="form-row">
            <div class="col-3">
            <input type="text" class="form-control" name="userId" placeholder="User Id">
            </div>
            <div class="col-3">
            <input type="text" class="form-control" name="phone" placeholder="phone">
            </div>
            <div class="col-3">
            <input type="text" class="form-control" name="roleName" placeholder="Role Name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tìm</button>
    </form>
    <table class="table" style="margin-top:16px;">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">class</th>
            <th scope="col">phone</th>
            <th scope="col">role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->class}}</td>
                <td>{{$user->number}}</td>
                <td>{{$user->roleName}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
        
</div>
@endsection

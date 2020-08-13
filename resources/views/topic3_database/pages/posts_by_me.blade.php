
@extends('topic3_database.index')
@section('content')
<div class="container" style="margin-top:30px">
    <h2>Bản tin của tôi</h2>
    <br>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-warning" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allPosts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>
                    
                    <button class="table-action-button"><a href="{{route('getEditPost',['id'=>$post->id])}}">sửa</a></button>
                    <form action="{{url('/posts',$post->id)}}"  method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="table-action-button">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
        
</div>
@endsection

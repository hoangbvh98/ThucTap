
@extends('topic3_database.index')
@section('content')
<div class="container" style="margin-top:30px">
    <div class="post-item">
        <h3>{{$post->title}}</h3>
        <p>Tác giả: {{$user->name}}</p>
        <p>Cập nhật: {{$post->updated_at}}</p>
        <div>
            {!!$post->content!!}
        </div>
    </div>
    <br>
    <h3>Bình Luận</h3>
    <br>
    <input type="hidden" id="post-id" value="{{$post->id}}">
    @include('topic3_database.layouts.comments')
</div>
@endsection

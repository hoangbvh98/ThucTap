
@extends('question3.index')
@section('content')
<div class="container" style="margin-top:30px">
    
    @guest
        
    @else
        <div class="editor">
            @include('question3.layouts.editor')
        </div>
    @endguest
    <h2>Danh sách bản tin</h2>
    <br>
    <div class="list-posts">
        @foreach($allPosts as $post)
        <div class="post-item">
            <a href="{{route('getDetailPost',['id'=>$post->id])}}">
                <img class="post-item__image" src="{{$post->first_image}}" alt="">
                <div>
                    <h4>{{$post->title}}</h4>
                    <p><span>{{$post->user_name}}</span>, {{$post->updated_at}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

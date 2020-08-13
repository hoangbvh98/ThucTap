<form method="POST" action="{{url('/posts')}}">
    @if(isset($post))
        @method('PUT')
    @endif
    {{ csrf_field() }}
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-warning" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
   
    <div class="form-group">
        <label for="title-post">Tiêu đề</label>
        @error('title')
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
        @enderror
        <input type="text" class="form-control" id="title-post" @if(isset($post)) value="{{$post->title}}" @endif name="title" placeholder="Tiêu đề">
    </div>
    <input type="hidden" name="postId" @if(isset($post)) value="{{$post->id}}" @endif>
    <div class="form-group">
        <label for="title-post">Nội dung</label>
        <textarea id="editor" name="content">@if(isset($post)){{$post->content}}@endif</textarea>
    </div>
    <div class="editor-action">
        <button type="submit" class="submit-post-button">@if(isset($post)) Sửa @else Đăng @endif</button>
    </div>
</form>

<div class="wrapper-comment">
   
    @guest
    <div>Yêu cầu đăng nhập để bình luận</div>
    @else
    <div class="form-post-comment">
        <textarea class="comment-content"></textarea>
        <div class="form-action"> 
            <button type="submit" class="add-comment-btn">Đăng</button>
        </div>
    </div>
    @endguest
    <div class="list-comment">
        @foreach($post->comments as $c)
        <div class="comment-item">
            <img src="{{ asset('/image/download.jpg') }}" class="avatar" alt="">
            <div class="comment-item__body">
                <p class="user-create"><strong>{{$c->user->name}}</strong><small>{{$c->created_at}}</small></p>
                <p class="content">
                    {{$c->content_comment}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
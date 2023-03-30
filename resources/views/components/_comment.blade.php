<li class="single_comment_area">
    <div class="comment-wrapper d-md-flex align-items-start">
        <div class="comment-author">
            <img src="{{asset('images/imagesfront/blog-img/25.jpg')}}" alt="">
        </div>
        <div class="comment-content">
            <h5>{{ $comment->user->name }}</h5>
            <span class="comment-date font-pt">{{ $comment->created_at->format('F d, Y') }}</span>
            <p>{{ $comment->body }}</p>
            <a class="reply-btn" href="#"
               data-toggle="collapse"
               data-target="#replyForm{{$comment->id}}"
               aria-expanded="false"
               aria-controls="replyForm{{$comment->id}}">
                Reply <i class="fa fa-reply" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="collapse mb-5" id="replyForm{{$comment->id}}">
        <form method="POST" action="{{ route('comments.store') }}" class="comment-reply-form">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="parent_id" value="{{$comment->id}}">
            <div class="form-group">
                <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
        </form>
    </div>
    @if($comment->children->isNotEmpty())
        <ol class="children pl-5">
            @foreach($comment->children as $child)
                @include('components._comment', ['comment' => $child])
            @endforeach
        </ol>
    @endif
</li>

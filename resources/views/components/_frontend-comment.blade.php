<div class="leave-comment-area clearfix">
    <div class="comment-form">
        <div class="gazette-heading">
            <h4 class="font-bold">leave a comment</h4>
        </div>
        <!-- Comment Form -->
        <form action="{{route('comments.store')}}" method="post">
            @csrf
            @method('POST')
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
        </form>
    </div>
</div>


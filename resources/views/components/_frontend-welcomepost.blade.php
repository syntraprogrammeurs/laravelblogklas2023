<!-- Post Tag -->
<div class="gazette-post-tag">
    @foreach($categories as $category)
        <a href="#">
            {{$category->name}}
        </a>
    @endforeach
</div>

<h2 class="font-pt">{{$postfeatured->title}}</h2>
<p class="gazette-post-date">{{$postfeatured->created_at ? $postfeatured->created_at->diffForHumans() :'no date'}}</p>
<!-- Post Thumbnail -->
<div class="blog-post-thumbnail my-5">
    <img class="w-100 img-fluid" src="{{asset($postfeatured->photo->file)}}" alt="post-thumb">
</div>
<!-- Post Excerpt -->
<p>{{Str::limit($postfeatured->body,500)}}</p>
<!-- Reading More -->
<div class="post-continue-reading-share d-sm-flex align-items-center justify-content-between mt-30">
    <div class="post-continue-btn">
        <a href="{{route('frontend.post', $postfeatured->id)}}" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
    </div>
    <div class="post-share-btn-group">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</div>

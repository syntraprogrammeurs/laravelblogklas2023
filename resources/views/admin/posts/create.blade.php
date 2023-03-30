@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <h1 class="m-0">Create Post</h1>
            <a href="{{route('posts.index')}}" class="btn btn-primary m-2 rounded-pill">All Posts</a>
        </div>
    </div>
    <form action="{{action('App\Http\Controllers\AdminPostsController@store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group mb-3">
            <input name="title" type="text" class="form-control" id="floatingInputTitle" placeholder="Title">
            @error('title')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">

                @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category{{$category->id}}" name="categories[]">
                        <label for="category{{$category->id}}" class="form-check-label">{{$category->name}}</label>
                    </div>
                @endforeach

        </div>
        <div class="form-group mb-3">

            @foreach($keywords as $keyword)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$keyword->id}}" id="keyword{{$keyword->id}}" name="keywords[]">
                    <label for="keyword{{$keyword->id}}" class="form-check-label">{{$keyword->name}}</label>
                </div>
            @endforeach

        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="generate-content-btn">Genereer inhoud</button>
        </div>
        <div class="form-group mb-3">
            <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            @error('body')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="file" name="photo_id" id="ChooseFile">
        </div>
        <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">SUBMIT</button>
    </form>
@endsection

<script>
    window.addEventListener("load", function(){
        const generateBtn = document.getElementById("generate-content-btn");
        if (generateBtn) {
            const openaiApiKey = "{{env('OPENAI_API_KEY')}}";
            const headers = {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${openaiApiKey}`
            };

            generateBtn.addEventListener("click", async function(){
                const title = document.getElementById("floatingInputTitle").value;
                const body = document.getElementById("floatingTextarea2");

                try {
                    const response = await fetch("https://api.openai.com/v1/completions", {
                        method: "POST",
                        headers: headers,
                        body: JSON.stringify({
                            model: "text-davinci-003",
                            prompt: `Generate a body for a post about ${title}`,
                            max_tokens: 1024,
                            n: 1,
                            stop: ["{}"],
                        })
                    });

                    const data = await response.json();
                        console.log(data);
                    const text = data.choices[0].text;

                    body.value = text;
                } catch (error) {
                    console.error(error);
                }
            });

        }
    });
</script>

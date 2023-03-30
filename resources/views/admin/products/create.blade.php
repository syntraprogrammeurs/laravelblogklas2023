@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <h1 class="m-0">Create Products</h1>
            <a href="{{route('products.index')}}" class="btn btn-primary m-2 rounded-pill">All Products</a>
        </div>
    </div>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group mb-3">
            <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Name">
            @error('name')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="d-flex justify-content-around border border-1 my-3 py-3 bg-white">
            <div class="form-group mb-3 d-flex flex-column">
                <label>Brands</label>
                <div class="btn-group-vertical">
                    @foreach($brands as $brand)
                        <label>
                            <input type="radio" name="brand_id" value="{{ $brand->id }}" autocomplete="off"> {{ $brand->name }}
                        </label>
                    @endforeach
                </div>
                @error('brand_id')
                <p class="text-danger fs-6">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb3">
                <label>Keywords</label>
                @foreach($keywords as $keyword)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$keyword->id}}" id="keyword{{$keyword->id}}" name="keywords[]">
                        <label class="form-check-label" for="keyword{{$keyword->id}}">{{$keyword->name}}</label>
                    </div>
                @endforeach
                @error('keywords')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb3">
                <label>Categorieën</label>
                @foreach($productcategories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category{{$category->id}}" name="productcategories[]">
                        <label class="form-check-label" for="category{{$category->id}}">{{$category->name}}</label>
                    </div>
                @endforeach
                @error('categories')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
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
        <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">ADD PRODUCTS</button>
    </form>
@endsection



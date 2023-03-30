@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <div class="d-flex">
                <p class="rounded bg-danger m-0 d-flex align-self-center p-2 text-white">{{$products->total()}} </p>
                <h1 class="m-0"> | Products | </h1>

            </div>
            <div class="d-flex">
                <a href="{{route('products.index')}}"
                   class="badge badge-primary m-1 p-3">All</a>
                @foreach($brands as $brand)
                    <a href="{{route('admin.productsPerBrand', $brand->id)}}"
                       class="badge badge-primary m-1 p-3">{{$brand->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="d-flex">
            <a href="{{route('posts.index')}}" class="btn btn-primary m-2 rounded-pill">All Products</a>
            <a href="#" class="btn btn-primary m-2 rounded-pill">Add Product</a>
        </div>

    </div>
    @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Product</x-slot>
        </x-alert>
    @endif

    <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Categories</th>
            <th>Brand</th>
            <th>Name</th>
            <th>Keywords</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img class="img-thumbnail" width="62" height="62"
                         src="{{$product->photo ? asset($product->photo->file) : 'http://via.placeholder.com/62x62'}}" alt="{{$product->title}}"></td>
                <td>
                    @foreach($product->productcategories as $productcategory)
                        <span class="badge badge-pill badge-warning">
                                {{$productcategory->name}}
                            </span>
                    @endforeach
                </td>
                <td>{{$product->brand->name}}</td>
                <td>{{$product->name}}</td>
                <td>
                    @foreach($product->keywords as $keyword)
                        <span class="badge badge-pill badge-info">
                                {{$keyword->name}}
                            </span>
                    @endforeach
                </td>
                <td>{{Str::limit($product->body,20)}}</td>
                <td>{{$product->created_at ? $product->created_at->diffForHumans() : ''}}</td>
                <td>{{$product->updated_at ? $product->updated_at->diffForHumans() : ''}}</td>
                <td>
                    <div class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown{{ $product->id }}" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                            </svg>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu  shadow "
                             aria-labelledby="userDropdown{{ $product->id }}">
                            <a class="dropdown-item" href="{{route('products.edit', $product->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                        <path
                                            d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection



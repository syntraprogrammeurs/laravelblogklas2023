@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-4 offset-lg-4 shadow-lg p-3 mb-5 bg-white rounded">
            <h1 class="text-left text-dark fs-4">Contactformulier</h1>
            @if(session('status'))
                <div class="alert alert-success">
                    <strong>Success!</strong>{{session('status')}}
                </div>
            @endif
            <form method="POST" action="{{action('App\Http\Controllers\ContactController@store')}}">
                @csrf
                @method('POST')
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Name" value="{{ old('name') }}">
                    <label for="floatingInputValue">Name</label>
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="floatingInputValue2" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="floatingInputValue2">Email</label>
                    @error('email')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                 <textarea name="message" class="form-control" id="floatingInputValue3" placeholder="Leave a comment here" style="height:100px;">{{old('message')}}</textarea>
                    <label for="floatingInputValue3">Message</label>
                    @error('message')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-floating mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-dark me-3">SUBMIT</button>
                    @if(session('status'))
                        <div>
                            <a href="/" class="btn btn-dark">HOME</a>
                        </div>
                    @endif
                </div>

            </form>

        </div>
    </div>
@endsection

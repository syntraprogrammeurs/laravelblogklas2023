<div class="row mt-3">
    <div class="col-lg-4 offset-lg-4 shadow-lg p-3 mb-5 bg-white rounded">
        <h1 class="text-left text-left fs-4">Contactformulier</h1>
        @if (session('status'))
            <div>
                <div class="alert alert-success">
                    <strong>Success!</strong> {{ session('status') }}
                </div>
            </div>
        @endif
        <form wire:submit.prevent="submitForm" action="/contactformulier" method="POST">
            @csrf
            @method('POST')
            <div class="form-floating mb-3">
                {{$name}}
                <input wire:model.defer="name" name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Name">
                <label for="floatingInputValue">Name</label>
                @error('name')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input wire:model.defer="email" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                @error('email')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea wire:model.defer="message" name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
                @error('message')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark d-flex justify-content-end me-3">SUBMIT</button>
                @if (session('status'))
                    <div>
                        <a href="/" class="btn btn-dark">HOME</a>
                    </div>
                @endif
            </div>


        </form>
    </div>
</div>

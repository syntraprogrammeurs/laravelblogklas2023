<div>
    <input name="search" wire:model.debounce.300ms="search" type="search" class="form-control" placeholder="Search...">
    <div class="row">
        @forelse($searchResults as $searchResult)
            <div class="col-lg-3">
                <div class="card my-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{$searchResult['artworkUrl100'] ?? 'https://via.placeholder.com/62x62'}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$searchResult['artistName'] ?? 'no artist'}}</h5>
                                <p class="card-text">{{$searchResult['trackName'] ?? 'no track'}}</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <video width="100%" controls>
                                <source src="{{$searchResult['previewUrl'] ?? 'nope'}}">
                            </video>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning my-5">
                no results found for <strong>{{$search}}</strong>
            </div>
        @endforelse
    </div>

</div>


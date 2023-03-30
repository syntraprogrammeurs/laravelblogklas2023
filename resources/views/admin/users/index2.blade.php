<x-admin2>
   <x-heading heading="All users"></x-heading>
    @if (session('status'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Success!</strong> {{ session('status') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo_id</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Roles</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            @if($loop->first)
                aantal : {{$loop->count}}
            @endif

            <tr>
                <td>{{$user->id}}</td>
                <td>
                    <a href="{{route('users.edit',$user->id)}}">
                        <img class="img-thumbnail" width="62" height="62"
                             src="{{$user->photo ? asset($user->photo->file) : 'http://via.placeholder.com/62x62'}}" alt="{{$user->name}}">
                    </a>
                </td>
                <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach($user->roles as $role)
                        <span class="badge badge-pill badge-info">
                                <a href="/?name={{$role->name}}">{{$role->name}}</a>
                            </span>
                    @endforeach
                </td>
                <td class="{{$user->is_active == 1?'bg-success':'bg-danger'}}">{{$user->is_active == 1?'Active':'Not Active'}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>{{$user->deleted_at}}</td>
                <td>
                    @if($user->deleted_at != null)
                        <a href="{{route('admin.userrestore', $user->id)}}" class="btn btn-warning">Restore</a>
                    @else
                        {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                </td>
                {{--                    <td>{{$user->user_id}}</td>--}}
                {{--                    <td>{{$user->photo_id}}</td>--}}
                {{--                    <td>{{$user->user_name}}</td>--}}
                {{--                    <td>{{$user->email}}</td>--}}
                {{--                    --}}{{--                    <td>{{$user->role_id?$user->role->name:'User without role'}}</td>--}}
                {{--                    <td>--}}
                {{--                        @foreach($user->role_names as $role)--}}
                {{--                            <span class="badge badge-pill badge-info">--}}
                {{--                                {{$role}}--}}
                {{--                            </span>--}}
                {{--                        @endforeach--}}
                {{--                    </td>--}}
                {{--                    <td class="{{$user->is_active == 1?'bg-success':'bg-danger'}}">{{$user->is_active == 1?'Active':'Not Active'}}</td>--}}
                {{--                    <td>{{$user->user_created_at}}</td>--}}
                {{--                    <td>{{$user->user_updated_at}}</td>--}}
            </tr>

        @endforeach
        </tbody>

    </table>
    {{$users->links()}}
</x-admin2>


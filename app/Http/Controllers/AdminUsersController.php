<?php

namespace App\Http\Controllers;

use App\Events\UsersSoftDelete;
use App\Http\Requests\UsersRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fillableFields = ['name','is_active','email'];
        $users = User::with(['roles', 'photo'])
            ->orderByDesc('id')
            ->withTrashed()
            ->paginate(20);

        return view("admin.users.index", compact('users','fillableFields'));
        //of
        //return view('admin.users.index',compact('users'));
    }
    public function index2()
    {
        //
        $users = User::orderByDesc('id')->withTrashed()->paginate(20);
        return view("admin.users.index2", ["users" => $users]);
        //of
        //return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in img.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_active = $request->is_active;
        $user->password = Hash::make($request->password);
        if ($file = $request->file("photo_id")) {
            $path = request()
                ->file("photo_id")
                ->store("users");
            $photo = Photo::create(["file" => $path]);
            //update photo_id (FK in users table)
            $input["photo_id"] = $user->photo_id = $photo->id;
        }

        $user->save();
        /*wegschrijven van meerder rollen in de tussentabel*/
        $user->roles()->sync($request->roles,false) ;
        //return redirect('admin/users');
        return redirect()->route('users.index')->with([
            'alert' => [
                'message' => 'User added',
                'type' => 'success'
            ]
        ]);
        //return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
//        $user = User::find($id); //find zal altijd worden uitgevoerd. Gevaar: de id MOET bestaan.
//        if(!$user){
//            throw new ModelNotFoundException();
//        }

        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in img.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            request()->validate([
            'name'=> ['required','max:255','min:5'],
            'email'=>['required','email'],
            'roles' => ['required', Rule::exists('roles', 'id')],
            'is_active'=>'required',
        ]);
        $user = User::findOrFail($id);
        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request['password']);
        }
        // oude foto verwijderen
        //we kijken eerst of er een foto bestaat
        if ($request->hasFile('photo_id')) {
            $oldPhoto = $user->photo; // de huidige foto van de gebruiker
            $path = request()->file('photo_id')->store('users');
            if ($oldPhoto) {
                unlink(public_path($oldPhoto->file));
               // $oldPhoto->delete();
                $oldPhoto->update(['file'=>$path]);
                $input['photo_id'] = $oldPhoto->id;
            }else{
                $photo = Photo::create(['file' => $path]);
                $input['photo_id'] = $photo->id;
            }
       }
        $user->update($input);
        $user->roles()->sync($request->roles, true);
        return redirect('/admin/users')->with('status', 'User updated!');
    }


    /**
     * Remove the specified resource from img.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        UsersSoftDelete::dispatch($user);
        $user->delete();
        return redirect()->route('users.index');
    }
    public function userRestore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        // herstel ook alle posts van de gebruiker
        $user = User::withTrashed()->where('id', $id)->first();
        $user->posts()->onlyTrashed()->restore();
        return redirect()->route('users.index')->with([
            'alert' => [
                'message' => 'User deleted',
                'type' => 'danger'
            ]
        ]);;
    }
}

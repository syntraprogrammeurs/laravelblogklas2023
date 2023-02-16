<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $users = User::orderByDesc('id')->paginate(20);
        return view("admin.users.index", ["users" => $users]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

//       dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_active = $request->is_active;
        $user->password = Hash::make($request->password);
        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file = $file->move('img', $name);
            $photo = Photo::create(['file'=>$name]);
            //dd($photo);
            $user->photo_id = $photo->id;
        }
        $user->save();
        /*wegschrijven van meerder rollen in de tussentabel*/
        $user->roles()->sync($request->roles,false) ;


        //return redirect('admin/users');
        return redirect()->route('users.index');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request['password']);
        }

        // oude foto verwijderen
        $oldPhoto = Photo::find($user->photo_id);
        dd($oldPhoto);
        if($oldPhoto) {
            $oldImagePath = public_path('img/' . $oldPhoto->file);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $oldPhoto->delete();
        }

        // nieuwe foto bewaren
        if($request->hasFile('photo_id')) {
            $file = $request->file('photo_id');
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        $user->roles()->sync($request->roles, true);

        return redirect('/admin/users');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

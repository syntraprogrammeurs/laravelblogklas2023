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
        $users = User::orderByDesc('id')->withTrashed()->paginate(20);
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

       //dd($request->file('');
       /// dd(request()->file('photo_id'));
        //dd($request);

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
        //validation IN de controller
        request()->validate([
            'name'=> ['required','max:255','min:3'],
            'email'=>['required','email'],
            'roles'=>['required', Rule::exists('roles','id')],
            'is_active'=>['required']
        ]);

        //dd($request);
        $user = User::findOrFail($id);
        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request['password']);
        }

        //oude foto verwijderen
        //we kijken eerst of er een foto bestaat
        if($request->hasFile('photo_id')){
            //file upload
            //ophalen photo uit database
            $oldPhoto = Photo::find($user->photo_id);
            $path= request()->file('photo_id')->store('users');
            //is er een photo aanwezig
           // dd($oldPhoto);
            if($oldPhoto){
             unlink(public_path($oldPhoto->file));
             //update in de database van mijn oude foto
             $oldPhoto->update(['file'=>$path]);
             $input['photo_id']= $oldPhoto->id;
            }else{
                $photo = Photo::create(['file'=>$path]);
                $input['photo_id']= $photo->id;
            }
        }
        $user->update($input);

        $user->roles()->sync($request->roles, true);

        return redirect('/admin/users')->with('status','User updated!');
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
        User::findOrFail($id)->delete();
       // return redirect('/admin/users')
        return redirect()->route('users.index');
    }
    protected function userRestore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        //return redirect('admin/users');
        //return redirect()->route('admin.users');
        return back();
    }
}

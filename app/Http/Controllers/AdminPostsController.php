<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $posts = Post::with(['categories','user','photo'])->filter(request('search'),request('fields'))->withTrashed()->paginate(20);
        return view('admin.posts.index', [
            'posts'=> $posts,
            'fillableFields'=> Post::getFillableFields()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'title'=>['required','between:2,255'],
            'categories'=>['required', Rule::exists('categories', 'id')],
            'body'=>'required'
        ],
        [
            'title.required' => 'Title is required',
            'title.between'=> 'Title between 2 and 255 characters',
            'body.required'=> 'Message is required',
            'categories.required'=>'Please check minimum one category'
        ]);
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;

        if($file = $request->file('photo_id')){
            $path = request()->file("photo_id")->store("posts");
            $photo = Photo::create(["file"=>$path]);
            $post->photo_id = $photo->id;
        }
//        user_id, post_id,title en body zijn nu ingevuld. We saven naar posts.
        $post->save();
        /*aangeduide categoriëen overschrijven en eventuele vorige deleten of nieuwe toevoegen*/
        $post->categories()->sync($request->categories, false);
        return redirect()->route('posts.index')->with('status', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        //
        //$post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'title'=>['required','between:2,255'],
            'categories'=>['required', Rule::exists('categories', 'id')],
            'body'=>'required'
        ],
            [
                'title.required' => 'Title is required',
                'title.between'=> 'Title between 2 and 255 characters',
                'body.required'=> 'Message is required',
                'categories.required'=>'Please check minimum one category'
            ]);
        $post = Post::findOrFail($id);
        $input = $request->all();

        if($request->hasFile('photo_id')){
            //file upload
            //ophalen photo uit database
            $oldPhoto = $post->photo;
            $path= request()->file('photo_id')->store('posts');
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
//        user_id, post_id,title en body zijn nu ingevuld. We saven naar posts.
        $post->update($input);
        /*aangeduide categoriëen overschrijven en eventuele vorige deleten of nieuwe toevoegen*/
        $post->categories()->sync($request->categories, true);
        return redirect()->route('posts.index')->with('status', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('status', 'Post Deleted');
    }
    public function indexByAuthor(User $author){
        $posts = $author->posts()->paginate(20);
        return view('admin.posts.index',['posts'=>$posts]);
    }
    protected function postRestore($id){
        Post::onlyTrashed()->where('id', $id)->restore();
        //return redirect('admin/users');
        //return redirect()->route('admin.users');
        return back();
    }


}

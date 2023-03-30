<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyword;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        $posts = Post::with(['categories', 'user', 'photo'])
            ->filter(request('search'), request('fields'))->withTrashed()
            ->paginate(20)->appends(['search' => request('search'), 'fields' => request('fields')]);

        return view('admin.posts.index', [
            'posts' => $posts,
            'fillableFields' => Post::getFillableFields(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $keywords = Keyword::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories','keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        request()->validate([
            'title'=> ['required','between:5,255'],
          //  'categories' => ['required', Rule::exists('categories', 'id')],
            'body'=>'required',
        ],
        [
            'title.required'=> 'Title is required',
            'title.between' => 'Title between 5 and 255 characters required',
            'body.required'=>'Message is required',
         //   'categories.required'=>'Please check minimum one category'
        ]);
        $post = new Post();
       // dd($post);
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title,'-');
        $post->body = $request->body;

        if ($file = $request->file("photo_id")) {
            $path = request()
                ->file("photo_id")
                ->store("posts");

            $photo = Photo::create(["file" => $path]);
            //update photo_id (FK in users table)
             $post->photo_id = $photo->id;
        }

        $post->save();
        /*wegschrijven van meerder rollen in de tussentabel*/
        $post->categories()->sync($request->categories,false) ;
        foreach($request->keywords as $keyword){
            $keywordfind = Keyword::findOrFail($keyword);
            $post->keywords()->save($keywordfind);
        }
        return redirect()->route('posts.index')->with([
            'alert' => [
                'message' => 'Post added',
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
        $post = Post::findOrFail($id);
        $slug = $post->slugify($post->title);
       return view('admin.posts.show', compact('post','slug'));
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
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit',compact('categories','post'));
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
        //
        request()->validate([
            'title'=> ['required','between:5,255'],
            'categories' => ['required', Rule::exists('categories', 'id')],
            'body'=>'required',
        ],
            [
                'title.required'=> 'Title is required',
                'title.between' => 'Title between 5 and 255 characters required',
                'body.required'=>'Message is required',
                'categories.required'=>'Please check minimum one category'
            ]);
        $post = Post::findOrFail($id);
        $input = $request->all();
        $input['slug'] =  Str::slug($request->title,'-');
         // oude foto verwijderen
        //we kijken eerst of er een foto bestaat
        if ($request->hasFile('photo_id')) {
            $oldPhoto = $post->photo; // de huidige foto van de gebruiker
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
        $post->update($input);
        $post->categories()->sync($request->categories, true);
        return redirect('/admin/posts')->with([
            'alert' => [
                'message' => 'Post updated',
                'type' => 'success'
            ]
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Post not found.'], 404);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Post deleted!');
    }

    public function indexByAuthor(User $author){
        $posts = $author->posts()->paginate(20);
        return view('admin.posts.index', ['posts'=>$posts]);
    }
    public function postRestore($id){
        Post::onlyTrashed()->where('id', $id)->restore();
        return redirect('/admin/posts')->with('status', 'Post restored!');
    }
    public function post(Post $post)
    {
          $post->load([
            'comments.user',
            'comments.children.user'
        ]);
        return view('post', compact('post'));
    }
}

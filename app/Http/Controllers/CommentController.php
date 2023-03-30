<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::with(['post', 'user'])
            ->orderBy('post_id', 'asc')
            ->orderBy('parent_id', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(20);

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if($user = Auth::user()){
            $data = [
                'post_id'=>$request->post_id,
                'parent_id'=>$request->parent_id,
                'user_id'=>$user->id,
                'body'=>$request->body,
            ];
            Comment::create($data);
        }
        return back()->with('status','Comment met succes toegevoegd');
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

        $comment = Comment::with('user')->findOrFail($id);
        return view('admin.comments.show', compact('comment'));
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
        $comment = Comment::findOrFail($id);
        return view('admin.comments.edit', compact('comment'));
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
        // Valideer de data
        $request->validate([
            'body' => 'required',
            'post_id' => 'required|integer|exists:posts,id',
            'user_id' => 'required|integer|exists:users,id',
            'parent_id' => 'nullable|integer|exists:comments,id',
        ]);
        // Zoek het comment op via zijn id
        $comment = Comment::findOrFail($id);
        // Update het comment met nieuwe data uit de request
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->parent_id = $request->parent_id;
        // bewaar naar de database
        $comment->save();
        // Redirect naar de index pagina van comments
        return redirect()->route('comments.index')->with('status', 'Comment updated successfully.');
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

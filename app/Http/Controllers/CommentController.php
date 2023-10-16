<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $this->authorize('create', Comment::class);

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

        $comment = Comment::create([
            'comment_body' => $request['comment_body'],
            'comment_date' => $current_date_time,
            'author' => Auth::id(),
            'answer_id' => $request['answer_id']
        ]);

        //Log::debug($comment);

        $view = view('partials.cards.comment_card', ['comment' => $comment]);
        $view = $view->render();

        return response()->json(array('view' => $view, 'answer_id' => $request['answer_id']));
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
    public function edit($comment_id)
    {
        $comment = Comment::find($comment_id);

        return response()->json(array('comment_body' => $comment->comment_body, 'comment_id' => $comment->comment_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'comment_body' => 'required|string|min:1'
        ]);

        $comment = Comment::find($request['comment_id']);

        $this->authorize('update', $comment);

        $comment->comment_body = $request['comment_body'];
        $comment->save();

        $message = $request->session()->get('key', 'default');
        //Log::debug($message);
        $view = view('partials.cards.flash_message', ['message' => $message]);
        $view = $view->render();

        return response()->json(array('view' => $view, 'comment_body' => $comment->comment_body));//->with('success', 'Comment edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
         $comment = Comment::find($request['comment_id']);

         $this->authorize('delete', $comment);

         $comment->delete();

         return response()->json(array('success' => 'Comment deleted successfully!'));
     }
}

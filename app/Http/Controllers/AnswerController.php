<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AnswerController extends ImageController
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

    public function addAnswerVote($answer, $vote_boolean){
        DB::table('answer_vote')->insert([
            'answer_id' => $answer->answer_id,
            'user_id' => Auth::id(),
            'vote' => $vote_boolean
        ]);
    }

    public function deleteAnswerVote($answer){
        DB::table('answer_vote')
        ->where('answer_id', '=', $answer->answer_id)
        ->where('user_id', '=', Auth::id())
        ->delete();
    }

    public function updateAnswerVote($answer, $vote_boolean){
        DB::table('answer_vote')
        ->where('answer_id', '=', $answer->answer_id)
        ->where('user_id', '=', Auth::id())
        ->update(['vote' => $vote_boolean]);
    }

    public function handleAnswerVote(Request $request){
        if(!Auth::check()) return redirect('/signup');

        $answer = Answer::find($request['answer_id']);
        $vote_boolean = $request['vote'];


        $aux = DB::table('answer_vote')
        ->select('answer_vote.*')
        ->where('answer_id', '=', $answer->answer_id)
        ->where('user_id', '=', Auth::id())
        ->get();

        if($aux->isEmpty() && $vote_boolean === 'true' || $aux->isEmpty() && $vote_boolean === 'false') {
            $this->addAnswerVote($answer, $vote_boolean);
        }
        else if(!$aux->isEmpty() && $vote_boolean === 'true'){

            if($aux[0]->vote === false){
                $this->updateAnswerVote($answer, true);
            }
            else if($aux[0]->vote === true){
                $this->deleteAnswerVote($answer);
            }
        }
        else if(!$aux->isEmpty() && $vote_boolean === 'false'){

            if($aux[0]->vote === true){
                $this->updateAnswerVote($answer, false);
            }
            else if($aux[0]->vote === false){
                $this->deleteAnswerVote($answer);
            }
        }


        return response()->json(array('nmr_votes' => $answer->votes()));
    }

    public function addHighlightAnswer(Request $request){

        $answer = Answer::find($request['answer_id']);
        $answer->update([
            'highlight' => true
        ]);
        return response()->json($answer);
    }

    public function deleteHighlightAnswer(Request $request){

        $answer = Answer::find($request['answer_id']);
        $answer->update([
            'highlight' => false
        ]);

        return response()->json($answer);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->authorize('create', Answer::class);

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $answer = Answer::create([
            'answer_body' => $request['answer_body'],
            'answer_date' => $current_date_time,
            'author' => $request['author'],
            'question_id' => $request['question_id']
        ]);

        $view = view('partials.cards.answer_card', ['answer' => $answer]);
        $view = $view->render();

        return response()->json(array('view' => $view, 'question_id' => $answer->question_id, 'answer_id' => $answer->answer_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($answer_id)
    {
        $this->authorize('viewAny', Answer::class);

        $answer = Answer::find($answer_id);
        $recent_comments = Comment::select('comment.*')
            ->where('comment.answer_id', '=', $answer_id)
            ->orderBy('comment.comment_date')
            ->get();
        return view('partials.cards.answer_card', ['answer' => $answer, 'recent_comments' => $recent_comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($answer_id)
    {
        $answer = Answer::find($answer_id);

        return response()->json(array('answer_body' => $answer->answer_body, 'answer_id' => $answer->answer_id));
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
            'answer_body' => 'required|string|min:1'
        ]);

        $answer = Answer::find($request['answer_id']);

        $this->authorize('update', $answer);

        $answer->answer_body = $request['answer_body'];
        $answer->save();

        $message = $request->session()->get('key', 'default');
        //Log::debug($message);
        $view = view('partials.cards.flash_message', ['message' => $message]);
        $view = $view->render();

        return response()->json(array('view' => $view, 'answer_body' => $answer->answer_body));//->with('success', 'Answer edited successfully!');
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
        Log::debug($request);
        $answer = Answer::find($request['answer_id']);
        Log::debug("before");
        $this->authorize('delete', $answer);
        Log::debug("after");

        $answer->delete();
        Log::debug("after2");

        return response()->json(array('success' => 'Answer deleted successfully!', 'answer_id' => $answer->answer_id, 'question_id' => $answer->question_id));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Space;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuestionController extends ImageController
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
        $spaces = Space::all();

        return view('pages.question.add_question', ['spaces' => $spaces]);
    }

    public function addQuestionVote($question, $vote_boolean){
        DB::table('question_vote')->insert([
            'question_id' => $question->question_id,
            'user_id' => Auth::id(),
            'vote' => $vote_boolean
        ]);
    }

    public function deleteQuestionVote($question){
        DB::table('question_vote')
        ->where('question_id', '=', $question->question_id)
        ->where('user_id', '=', Auth::id())
        ->delete();
    }

    public function updateQuestionVote($question, $vote_boolean){
        DB::table('question_vote')
        ->where('question_id', '=', $question->question_id)
        ->where('user_id', '=', Auth::id())
        ->update(['vote' => $vote_boolean]);
    }

    public function handleQuestionVote(Request $request){
        if(!Auth::check()) return redirect('/signup');

        $question = Question::find($request['question_id']);
        $vote_boolean = $request['vote'];

        $aux = DB::table('question_vote')
        ->select('question_vote.*')
        ->where('question_id', '=', $question->question_id)
        ->where('user_id', '=', Auth::id())
        ->get();

        if($aux->isEmpty() && $vote_boolean === 'true' || $aux->isEmpty() && $vote_boolean === 'false') {
            $this->addQuestionVote($question, $vote_boolean);
        }
        else if(!$aux->isEmpty() && $vote_boolean === 'true'){

            if($aux[0]->vote === false){
                $this->updateQuestionVote($question, true);
            }
            else if($aux[0]->vote === true){
                $this->deleteQuestionVote($question);
            }
        }
        else if(!$aux->isEmpty() && $vote_boolean === 'false'){

            if($aux[0]->vote === true){
                $this->updateQuestionVote($question, false);
            }
            else if($aux[0]->vote === false){
                $this->deleteQuestionVote($question);
            }
        }

        return response()->json(array('nmr_votes' => $question->votes()));
    }

    public function recentAnswers($question_id){
        $recent_answers = Answer::select('answer.*')
        ->where('answer.question_id', '=', $question_id)
        ->orderByDesc('answer.answer_date')
        ->get();

        return $recent_answers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->validate($request, [
            'question_space' => 'required|string|min:1'
        ]);

        $this->authorize('create', Question::class);

        $data = $request->all();

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $space = Space::firstWhere('space_name', $data['question_space']);

        $question = Question::create([
            'question_title' => $data['question_title'],
            'question_body' => $data['question_body'],
            'question_date' => $current_date_time,
            'belongs' => $space->space_id,
            'author' => Auth::id(),
        ]);

        $this->addImageQuestion($question, $request);

        return redirect('/question/'.$question->question_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($question_id)
    {
        $question = Question::find($question_id);

        $most_upvotes_answers = Answer::select(DB::raw('answer.*, COUNT(CASE WHEN answer_vote.vote = TRUE THEN 1 ELSE null END) - COUNT(CASE when answer_vote.vote = FALSE then 1 else null END) as upvotes'))
            ->leftJoin('answer_vote', 'answer_vote.answer_id', '=', 'answer.answer_id')
            ->where('answer.question_id', '=', $question_id)
            ->groupBy('answer.answer_id')
            ->orderByDesc('upvotes')
            ->get();

        return view('pages.question.question', ['question' => $question, 'most_upvotes_answers' => $most_upvotes_answers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($question_id)
    {
        $question_id = intval($question_id);
        $question = Question::find($question_id);
        return view('pages.question.edit_question', ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $question_id)
    {

        $this->validate($request, [
            'question_space' => 'required|string|min:1'
        ]);

        $space = Space::firstWhere('space_name', $request['question_space']);
        $question = Question::find($question_id);

        $this->authorize('update', $question);

        $question->question_title = $request['question_title'];
        $question->question_body = $request['question_body'];
        $question->belongs = $space->space_id;
        $question->save();

        if ($request['removeImage'] !== 'on') {
            $this->addImageQuestion($question, $request);
        } else {
            $this->removeImageQuestion($question->question_id);
        }

        return redirect('/question/' . $question->question_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id)
    {
        $question = Question::find($question_id);

        $this->authorize('delete', $question);

        $question_space = $question->space->space_name;
        $question->delete();
        $this->removeImageQuestion($question_id);

        return redirect('/'. $question_space);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAPI(Request $request)
    {
        $question_id = $request->all()['question_id'];
        $question = Question::find($question_id);

        $this->authorize('delete', $question);

        $question->delete();
        $this->removeImageQuestion($question_id);

        return response()->json(array('question_id' => $question_id));
    }
}

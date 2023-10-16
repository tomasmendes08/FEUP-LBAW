<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportQuestion;
use App\Models\ReportAnswer;
use App\Models\ReportComment;
use App\Models\ReportUser;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Comment;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
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
        $this->authorize('create', Admin::class);

        $data = $request->all();

        $admin = Admin::create([
            'admin_id' => intval($data['user_id'])
        ]);

        return redirect('/users/' . $admin->admin_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $this->authorize('create', Admin::class);

        $awarded_users = User::select('user.*')
        ->leftJoin('admin', 'admin.admin_id' , '=', 'user.user_id')
        ->where('user.reputation', '>=', '250')
        ->whereNull('admin.admin_id')
        ->orderByDesc('user.reputation')
        ->limit(10)
        ->get();

        $reported_questions = Question::select('question.*')
        ->rightJoin('report_question', 'report_question.reported_question', '=', 'question.question_id')
            ->get();


        $reported_answers = Answer::select('answer.*')
        ->rightJoin('report_answer', 'report_answer.reported_answer', '=', 'answer.answer_id')
            ->get();

        $reported_comments = Comment::select('comment.*')
        ->rightJoin('report_comment', 'report_comment.reported_comment', '=', 'comment.comment_id')
            ->get();

        return view('pages.user.admin', ['awarded_users' => $awarded_users,
                                        'reported_questions' => $reported_questions,
                                        'reported_answers' => $reported_answers,
                                        'reported_comments' => $reported_comments]);
    }

    public function readMore(Request $request)
    {
        if($request['type'] === "reported_questions"){
            $reported_questions = Question::select('question.*')
            ->join('report_question', 'report_question.reported_question', '=', 'question.question_id')
                ->get();

            $views = array();
            for($i = 0; $i < count($reported_questions); $i++){
                $view = view('partials.cards.question_card_report', ['question' => $reported_questions[$i]]);
                $view = $view->render();
                array_push($views, $view);
            }

            return response()->json(array('views' => $views));
        }

        else if($request['type'] === "reported_answers"){
            $reported_answers = Answer::select('answer.*')
            ->join('report_answer', 'report_answer.reported_answer', '=', 'answer.answer_id')
                ->get();

            $views = array();
            for($i = 0; $i < count($reported_answers); $i++){
                $view = view('partials.cards.answer_card_profile', ['answer' => $reported_answers[$i]]);
                $view = $view->render();
                array_push($views, $view);
            }

            return response()->json(array('views' => $views));
        }

        else if($request['type'] === "reported_comments"){
            $reported_comments = Comment::select('comment.*')
            ->join('report_comment', 'report_comment.reported_comment', '=', 'comment.comment_id')
                ->get();

            $views = array();
            for($i = 0; $i < count($reported_comments); $i++){
                $view = view('partials.cards.comment_card', ['comment' => $reported_comments[$i]]);
                $view = $view->render();
                array_push($views, $view);
            }

            return response()->json(array('views' => $views));
        }

        return response()->json('deixou de dar');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}

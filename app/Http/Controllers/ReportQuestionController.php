<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\ReportQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportQuestionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reportedQuestion = ReportQuestion::firstWhere('reported_question', intval($request['question_id']));

        $this->authorize('create', ReportQuestion::class);

        if ($reportedQuestion == null)
        {
            if(!Auth::check()) return redirect('/signup');

            if ($request['report'] === "true") {
                ReportQuestion::create([
                    'reported_question' => $request['question_id'],
                    'author' => Auth::id()
                ]);
            }

            return response()->json(array('report' => 'added report', 'question_id' => intval($request['question_id'])));
        }
        else
        {
            ReportQuestion::select('report_question.*')
                ->where('report_question.reported_question', '=', $request['question_id'])
                ->where('report_question.author', '=', Auth::id())
                ->delete();

            return response()->json(array('report' => 'deleted report', 'question_id' => intval($request['question_id'])));
        }
    }

    /**
     * Destroy a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('delete', ReportQuestion::class);

        ReportQuestion::select('report_question.*')
            ->where('report_question.reported_question', '=', $request['question_id'])
            ->delete();

        return response()->json(array('report' => 'deleted report', 'question_id' => intval($request['question_id'])));
    }
}

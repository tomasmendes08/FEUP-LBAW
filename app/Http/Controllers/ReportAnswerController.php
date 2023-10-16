<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\ReportAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportAnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report_answer = new ReportAnswer();
        $report = $report_answer->getReport($request['answer_id']);
        if (count($report) === 0)
        {
            if(!Auth::check()) return redirect('/signup');
            //$this->authorize('create', ReportComment::class);

            if ($request['report'] === "true") {
                ReportAnswer::create([
                    'reported_answer' => $request['answer_id'],
                    'author' => Auth::id()
                ]);
            }

            return response()->json(array('report' => 'added report'));
        }
        else
        {
            ReportAnswer::select('report_answer.*')
                ->where('report_answer.reported_answer', '=', $request['answer_id'])
                ->where('report_answer.author', '=', Auth::id())
                ->delete();

            return response()->json(array('report' => 'deleted report'));    
        }
    }
}

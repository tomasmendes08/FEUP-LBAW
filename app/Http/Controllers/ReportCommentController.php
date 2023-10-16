<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ReportComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report_comment = new ReportComment();
        $report = $report_comment->getReport($request['comment_id']);
        if (count($report) === 0)
        {
            if(!Auth::check()) return redirect('/signup');
            //$this->authorize('create', ReportComment::class);

            if ($request['report'] === "true") {
                ReportComment::create([
                    'reported_comment' => $request['comment_id'],
                    'author' => Auth::id()
                ]);
            }

            return response()->json(array('report' => 'added report'));
        }
        else
        {
            ReportComment::select('report_comment.*')
                ->where('report_comment.reported_comment', '=', $request['comment_id'])
                ->where('report_comment.author', '=', Auth::id())
                ->delete();

            return response()->json(array('report' => 'deleted report'));    
        }
    }
}

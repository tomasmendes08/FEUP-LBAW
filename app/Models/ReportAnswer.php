<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReportAnswer extends Model
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    protected $table = "report_answer";

    protected $fillable = ['reported_answer', 'author'];
    protected $primaryKey = 'report_id';

    /**
     * Get the author associated with the ReportAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'author');
    }

    /**
     * Get the reported_user that is associated with the ReportAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reported_comment()
    {
        return $this->belongsTo(Answer::class, 'answer_id', 'reported_answer');
    }

    /**
     * Check if already exists
     *
     * @param  \App\Models\Answer  $request
     * @return \Illuminate\Http\Response
     */
    public function getReport($answer_id)
    {
        $report = ReportAnswer::select('report_answer.*')
            ->where('report_answer.reported_answer', '=', $answer_id)
            ->where('report_answer.author', '=', Auth::id());

        return $report->get();
    }
    
}

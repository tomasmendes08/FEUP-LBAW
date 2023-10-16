<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportQuestion extends Model
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    protected $table = "report_question";

    protected $fillable = ['reported_question', 'author'];
    protected $primaryKey = 'report_id';

    /**
     * Get the author associated with the ReportQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'author');
    }

    /**
     * Get the reported_question that is associated with the ReportQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reported_question()
    {
        return $this->belongsTo(ReportQuestion::class, 'question_id', 'reported_question');
    }

    /**
     * Check if already exists
     *
     * @param  \App\Models\Comment  $request
     * @return \Illuminate\Http\Response
     */
    public function getReport($question_id)
    {
        $report = ReportQuestion::select('report_question.*')
            ->where('report_question.reported_question', '=', $question_id)
            ->where('report_question.author', '=', Auth::id());

        return $report->get();
    }

    public function getAll()
    {
        $all = ReportQuestion::select('report_question.*')
        ->orderByDesc('report_question.report_date');

        return $all->get();
    }
}

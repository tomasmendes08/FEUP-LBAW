<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReportComment extends Model
{
    use HasFactory;


    // Don't add create and update timestamps in database.
    public $timestamps = false;

    protected $table = "report_comment";

    protected $fillable = ['reported_comment', 'author'];
    protected $primaryKey = 'report_id';

    /**
     * Get the author associated with the ReportUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'author');
    }

    /**
     * Get the reported_comment that is associated with the ReportComment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reported_comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'reported_comment');
    }

    /**
     * Check if already exists
     *
     * @param  \App\Models\Question  $request
     * @return \Illuminate\Http\Response
     */
    public function getReport($comment_id)
    {
        $report = ReportComment::select('report_comment.*')
            ->where('report_comment.reported_comment', '=', $comment_id)
            ->where('report_comment.author', '=', Auth::id());

        return $report->get();
    }
}

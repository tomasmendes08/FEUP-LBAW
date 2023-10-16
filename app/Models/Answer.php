<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Comment;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answer';

    public $timestamps = false;

    protected $primaryKey = 'answer_id';

    protected $fillable = ['answer_body','answer_date', 'misinformation', 'author', 'question_id', 'highlight'];

    public function commentsOrderByDate($answer_id){
        return Comment::select('comment.*')
        ->where('answer_id', '=', $answer_id)
        ->orderBy('comment_date')
        ->get();
    }

    public function userHasVotedAnswer($answer_id, $user_id){
        return DB::table('answer_vote')
        ->where('answer_id', '=', $answer_id)
        ->where('user_id', '=', $user_id)
        ->first();
    }

    /**
     * The answer_votes that belong to the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        $upvotes = $this->belongsToMany(User::class, 'answer_vote', 'answer_id', 'user_id')->withPivot('vote')->where('vote', '=', 'true')->count();
        $downvotes = $this->belongsToMany(User::class, 'answer_vote', 'answer_id', 'user_id')->withPivot('vote')->where('vote', '=', 'false')->count();

        $votes_aux = $upvotes - $downvotes;
        return $votes_aux;
    }

    /**
     * Get the owner that owns the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'author');
    }

    /**
     * Get all of the comments for the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'answer_id');
    }

    /**
     * Get all of the reports for the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(ReportAnswer::class, 'reported_answer');
    }

    /**
     * Get the question that owns the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}

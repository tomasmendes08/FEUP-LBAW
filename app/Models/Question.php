<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "question";

    protected $primaryKey = 'question_id';

    protected $fillable = ['question_title','question_body', 'question_date', 'belongs', 'author', 'archived'];


    public function userHasVotedQuestion($question_id, $user_id){
        return DB::table('question_vote')
        ->where('question_id', '=', $question_id)
        ->where('user_id', '=', $user_id)
        ->first();
    }

    /**
     * Get all of the answers for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    /**
     * Get the author that owns the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'author');
    }


    /**
     * The votes that belong to the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        $upvotes = $this->belongsToMany(User::class, 'question_vote', 'question_id', 'user_id')->withPivot('vote')->where('vote', '=', 'true')->count();
        $downvotes = $this->belongsToMany(User::class, 'question_vote', 'question_id', 'user_id')->withPivot('vote')->where('vote', '=', 'false')->count();

        $votes_aux = $upvotes - $downvotes;
        return $votes_aux;
    }

    /**
     * Get the space that owns the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function space()
    {
        return $this->belongsTo(Space::class, 'belongs');
    }


    /**
     * Get all of the reports for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(ReportQuestion::class, 'reported_question');
    }


}

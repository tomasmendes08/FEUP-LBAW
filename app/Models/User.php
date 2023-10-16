<?php

namespace App\Models;

use App\Models\Space;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    protected $table = "user";

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'name', 'password', 'description', 'city', 'banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get all of the questions for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'author');
    }

    /**
     * The question_votes that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function question_votes()
    {
        return $this->belongsToMany(Question::class, 'question_vote', 'question_id', 'user_id')->withPivot('vote');
    }

    /**
     * Get all of the answers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'author');
    }

    /**
     * The answer_votes that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function answer_votes()
    {
        return $this->belongsToMany(Answer::class, 'answer_vote', 'answer_id', 'user_id')->withPivot('vote');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'author');
    }

    /**
     * The favourite_spaces that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favourite_spaces()
    {
        return $this->belongsToMany(Space::class, 'favourite', 'user_id', 'space_id');
    }


    public function checkIfUserHasFavouriteSpace($user_id){
        $aux = DB::table('favourite')
            ->select('favourite.*')
            ->where('user_id', '=', $user_id)
            ->get();
        //dd($aux[0]->space_id);
        $fav_spaces = array();
        for($i = 0; $i < count($aux); $i++){
            $space = Space::find($aux[$i]->space_id);
            array_push($fav_spaces, $space->space_name);
        }
        return $fav_spaces;
    }

    public function addUserFavouriteSpace($user_id, $space_name){
        $space = Space::firstWhere('space_name', $space_name);
        // dd($space);
        $aux = DB::table('favourite')->insert([
            'space_id' => $space->space_id,
            'user_id' => $user_id
        ]);
    }

    public function removeUserFavouriteSpace($user_id, $space_name){
        $space = Space::firstWhere('space_name', $space_name);
        // dd($space);
        $aux = DB::table('favourite')
            ->where('space_id', '=', $space->space_id)
            ->where('user_id', '=', $user_id)
            ->delete();
    }

    /**
     * Get all of the contact_us for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contact_us(): HasMany
    {
        return $this->hasMany(ContactUs::class, 'author');
    }

    /**
     * Get all of the reported_user for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reported_user(): HasMany
    {
        return $this->hasMany(ReportUser::class, 'reported_user');
    }

    /**
     * Get all of the report_author for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function report_author(): HasMany
    {
        return $this->hasMany(ReportUser::class, 'author');
    }


    public function isAdmin()
    {
        $admin_query = Admin::select('admin.*')->where('admin.admin_id', '=', $this->user_id)->first();
        if (!is_null($admin_query) && intval($admin_query['admin_id']) === $this->user_id) {
            return true;
        }
        return false;
    }

    public function getUsersWithMostRep() {

    }

}

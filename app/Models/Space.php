<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class Space extends Model
{
    use HasFactory;

    protected $table = 'space';

    protected $primaryKey = 'space_id';

    protected $fillable = ['space_name'];

    /**
     * The users that belong to the Space
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'favourite', 'space_id', 'user_id');
    }

   /**
    * Get all of the questions for the Space
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function questions()
   {
       return $this->hasMany(Question::class, 'belongs');
   }
}

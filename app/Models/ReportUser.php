<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    protected $table = "report_user";

    protected $fillable = ['reported_user', 'author'];
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
     * Get the reported_user that is associated with the ReportUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reported_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'reported_user');
    }

    
}

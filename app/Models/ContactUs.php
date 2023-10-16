<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $primaryKey = 'contactus_id';

    protected $fillable = ['message_title', 'message_body', 'email', 'contact_us_date', 'author'];

    /**
     * Get the user that owns the ContactUs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'author');
    }
    
    

}

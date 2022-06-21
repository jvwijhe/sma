<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug', 
       'contacts', 
        'message', 
        'password',
        'user_id',
    ];

    protected $appends = ['signed_url', 'descrypted_message'];
    protected $casts = [
        'contacts' => 'array',
        // 'message' => 'encrypted',
        // 'password' => 'encrypted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSignedUrlAttribute() {
        return URL::signedRoute('messages.show', ['message' => $this]);
    }

    public function getDecryptedMessageAttribute() {
        return Crypt::decryptString($this->message);

    }

}

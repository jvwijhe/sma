<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug', 
        'message', 
        'password',
    ];

    protected $appends = ['signed_url'];

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


}

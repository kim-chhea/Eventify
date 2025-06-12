<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    //
    protected $fillable = [
        'platform' , 'username'
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}

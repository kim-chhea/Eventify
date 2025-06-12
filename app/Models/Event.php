<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'name' ,'location_id', 'category_id','titles','description','start_time','end_time',
        'online_link','capacity'
     ];
     public function category()
     {
        return $this->belongsTo(Category::class);
     }
     public function location()
     {
        return $this->belongsTo(Location::class);
     }
     public function user()
      {
      return $this->belongsToMany(User::class, 'users_events')
                ->withPivot('status')
                ->withTimestamps();
      }

     
   

}

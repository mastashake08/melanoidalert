<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissingPerson extends Model
{
    //
    protected $guarded = [];
    protected $date = [
      'created_at',
      'last_seen',
    ];
    protected $events = [
        'created' => Events\MissingPersonCreated::class,
        'deleting' => Events\MissingPersonDeleted::class
    ];
    protected function user(){
      return $this->belongsTo('App\User');
    }
}

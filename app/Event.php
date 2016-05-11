<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $hidden = [
      'pivot'
    ];

    // protected $boolean = [
    //   'is_lunar'
    // ];
}

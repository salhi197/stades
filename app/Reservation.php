<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        "fullname",
        "phone",
        "stade",
        "prix",
        "crenau",
        "date"
    ];
}

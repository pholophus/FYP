<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function subject()
    {
        return $thus->belongsTo(Subject::class);
    }
}

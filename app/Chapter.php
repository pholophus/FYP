<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

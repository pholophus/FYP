<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Subject::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}

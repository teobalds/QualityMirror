<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['question', 'use_for_existing', 'use_for_new', 'use_for_ios', 'use_for_android', 'enabled'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function enabled_answers()
    {
        return $this->answers()->where('enabled','=', true)->inRandomOrder();
    }

    public function advices()
    {
        return $this->hasMany(Advice::class);
    }
}

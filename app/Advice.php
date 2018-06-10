<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $table = 'advices';
    protected $fillable = ['question_id', 'points', 'advice'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function questionnaire() {
    	return $this->belongsTo(Questionnaire::class);
    }

    public function answers() {
    	return $this->hasMany(Answers::class);
    }
}

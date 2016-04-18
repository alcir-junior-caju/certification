<?php

namespace Certification\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id',
        'answer_name_en',
        'answer_name_pt',
        'answer'
    ];

    public function question()
    {
        return $this->belongsTo('Certification\Models\Question');
    }
}

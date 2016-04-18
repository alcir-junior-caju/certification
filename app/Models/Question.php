<?php

namespace Certification\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_name_en',
        'question_name_pt',
        'question_type'
    ];

    public function answer()
    {
        return $this->hasMany('Certification\Models\Answer');
    }

    public function category()
    {
        return $this->belongsToMany('Certification\Models\Category', 'categories_questions');
    }
}

<?php

namespace Certification\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'certification_id',
        'category_name_en',
        'category_name_pt'
    ];

    public function certification()
    {
        return $this->belongsTo('Certification\Models\Certification');
    }

    public function question()
    {
        return $this->belongsToMany('Certification\Models\Question', 'categories_questions');
    }
}

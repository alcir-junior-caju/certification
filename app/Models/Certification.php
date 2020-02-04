<?php

namespace Certification\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'certification_name_en',
        'certification_name_pt',
        'certification_icon'
    ];

    public function category()
    {
        return $this->hasMany('Certification\Models\Category');
    }
}

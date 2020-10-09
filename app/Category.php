<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function issues()
    {
        return $this->hasMany(Issue::class, 'category', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function issues()
    {
        return $this->hasMany(Issue::class, 'module', 'id');
    }
}

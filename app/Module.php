<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function called()
    {
        return $this->hasMany(Called::class, 'module', 'id');
    }
}

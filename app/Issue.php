<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'costumer',
        'user',
        'category',
        'module',
        'subject',
        'description',
        'files'
    ];

    public function costumerObject()
    {
        return $this->belongsTo(Costumer::class, 'costumer', 'id');
    }

    public function userObject()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function categoryObject()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function moduleObject()
    {
        return $this->belongsTo(Module::class, 'module', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return date('d/m/Y', strtotime($value));
    }
}

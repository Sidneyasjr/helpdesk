<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Called extends Model
{
    protected $fillable = [
        'client_id',
        'user_id',
        'category',
        'module',
        'subject',
        'description',
        'files'
    ];

    public function clientObject()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function userObject()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
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

<?php

namespace App;

use App\Support\Cropper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'document',
        'genre',
        'date_of_birth',
        'cover',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'telephone',
        'cell',
        'master',
        'admin',
        'costumer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'costumer', 'id');
    }
    public function issues()
    {
        return $this->hasMany(User::class, 'user', 'id');
    }

    public function getUrlCoverAttribute()
    {
        if (!empty($this->cover)) {
            return Storage::url(Cropper::thumb($this->cover, 500, 500));
        }

        return '';
    }


    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function getDocumentAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return
            substr($value, 0, 3) . '.' .
            substr($value, 3, 3) . '.' .
            substr($value, 6, 3) . '-' .
            substr($value, 9, 2);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }

    public function getDateOfBirthAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return date('d/m/Y', strtotime($value));
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function getZipcodeAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return substr($value, 0, 5) . '-' . substr($value, 5, 3);
    }

    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setCellAttribute($value)
    {
        $this->attributes['cell'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }

        $this->attributes['password'] = bcrypt($value);
    }

    public function setMasterAttribute($value)
    {
        $this->attributes['master'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setAdminAttribute($value)
    {
        $this->attributes['admin'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    private function convertStringToDouble(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }

    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }


    private function clearField(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }


}

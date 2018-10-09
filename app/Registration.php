<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable=['email','password','firstname','lastname','businessname','phone','address','town','postcode'];

    protected $hidden = ['password'];

    public function education()
    {
        return $this->hasMany('App\Education','registration_id');
    }
}

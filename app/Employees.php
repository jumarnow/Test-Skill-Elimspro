<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';

    protected $fillable = ['first_nm', 'last_nm', 'company_id', 'email', 'phone'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}

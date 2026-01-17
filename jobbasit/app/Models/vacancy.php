<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vacancy extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    //
    public function company()
    {
        return $this->belongsTo(company::class);
    }
    //
    public function applicants()
    {
        return $this->hasMany(applicant::class);
    }

}

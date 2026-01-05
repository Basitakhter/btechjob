<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vacancy extends Model
{
    //
    public function user()
    {
        return $this->belongs(user::class);
    }
    //
    public function company()
    {
        return $this->belongs(company::class);
    }
}

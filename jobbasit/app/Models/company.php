<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class company extends Model
{
    //inverse relationship
public function company()
{
    return $this->belongsTo(User::class);
}
    //inverse relationship
public function vacancy()
{
    return $this->hasMany(vacancy::class);
}
}

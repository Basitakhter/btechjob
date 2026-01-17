<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    //
    public function user() {
    return $this->belongsTo(User::class);
}
public function experiences() {
    return $this->hasMany(Experience::class);
}

public function educations() {
    return $this->hasMany(Education::class);
}

public function skills() {
    return $this->hasMany(Skill::class);
}

public function certifications() {
    return $this->hasMany(Certification::class);
}

public function projects() {
    return $this->hasMany(Project::class);
}
}

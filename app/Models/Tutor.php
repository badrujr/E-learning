<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $table = 'tutors';

    protected $primaryKey = 'id';

    public function courses(){
        return $this->hasMany(Course::class);
    }
    public function profession(){
        return $this->belongsTo(Profession::class)->withDefault();
    }
    public function tutorProfile(){
        return $this->hasMany(TutorProfile::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}

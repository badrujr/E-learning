<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorProfile extends Model
{
    use HasFactory;

    protected $table = 'tutor_profiles';

    protected $primaryKey = 'id';

    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }
}

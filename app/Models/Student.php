<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'students';

    protected $primaryKey = 'id';

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function testimonials(){
        return $this->hasMany(Testimonial::class);
    }
    public function like()
    {
        return $this->hasOne(CourseLike::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function bookmark(){
        return $this->hasMany(Bookmark::class);
    }
}

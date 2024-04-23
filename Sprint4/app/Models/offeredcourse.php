<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class offeredcourse extends Model{

    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'offered_courses';

    protected $fillable = [
        'course_id',
        'description',
    ];
    
}

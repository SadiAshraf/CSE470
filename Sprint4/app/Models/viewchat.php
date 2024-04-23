<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class viewchat extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'course_discussion';

    protected $fillable = [
        'course_id',
        'student_id',
        'type',
        'msg'
    ];
}

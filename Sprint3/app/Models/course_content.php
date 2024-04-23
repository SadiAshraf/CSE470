<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class course_content extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'course_contents';

    protected $fillable = [
        'course_id',
        'type',
        'path',
    ];
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class create_members extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'group_members';

    protected $fillable = [
        'group_name',
        'student_id',
    ];
}

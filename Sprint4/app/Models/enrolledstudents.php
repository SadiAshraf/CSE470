<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class enrolledstudents extends Authenticatable
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'enrolled_students';

}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class admin extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'admin_id',
        'pass',
    ];
}

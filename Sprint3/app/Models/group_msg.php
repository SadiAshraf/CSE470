<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class group_msg extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'group_msg';

    protected $fillable = [
        'group_name',
        'sent_by',
        'msg',
    ];
}

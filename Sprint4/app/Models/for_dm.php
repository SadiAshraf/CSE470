<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class for_dm extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'dm_table';

    protected $fillable = [
        'sender_id',
        'reciver_id',
        'msg'
    ];
}

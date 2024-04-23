<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class create_group extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $table = 'grp_belongs';

    protected $fillable = [
        'group_name',
        'belongs_to',
    ];
}

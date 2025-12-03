<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMob extends Model
{
    use HasFactory;

    protected $table = 'mobs';

    protected $fillable = [
        'version',
        'mob_id',
        'mob_name',
        'date'
    ];
}

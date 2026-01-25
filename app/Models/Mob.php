<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mob extends Model
{
    use HasFactory;

    protected $table = 'mobs';

    protected $fillable = [
        'name',
        'graphic',
        'game_version_id',
        'health',
        'height',
        'behavior',
        'spawn',
        'classification'
    ];
    public function gameVersion()
    {
        return $this->belongsTo(GameVersion::class);
    }
}

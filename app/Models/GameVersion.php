<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVersion extends Model
{
    use HasFactory;

    protected $table = 'game_versions';

    protected $fillable = [
        'release_order',
        'version',
    ];
    public function mobs()
    {
        return $this->hasMany(Mob::class);
    }
}

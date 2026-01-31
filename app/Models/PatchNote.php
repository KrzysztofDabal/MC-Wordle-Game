<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatchNote extends Model
{
    use HasFactory;

    protected $table = 'patch_notes';

    protected $fillable = [
        'version',
        'description'
    ];
}

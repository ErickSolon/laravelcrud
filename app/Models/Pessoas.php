<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'idade',
    ];

    public function infos() {
        return $this->hasOne(Infos::class);
    }
}

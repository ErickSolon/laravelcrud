<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{
    protected $fillable = [
        'cpf',
        'identidade',
        'telefone',
        'endereco'
    ];

    public function pessoas() {
        return $this->belongsTo(Pessoas::class, 'pessoas_id');
    }
}

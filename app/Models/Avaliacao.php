<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'disciplina_id',
        'matricula_id',
        'valor',
        'trimestre'
    ];
}

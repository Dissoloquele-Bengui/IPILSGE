<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'nome',
        'data_nascimento',
        'endereco',
        'telefone',
        'email',
        'numero_identificacao',
        'area_especializacao',
        'salario',
        'genero',
        'data_contratacao',
        'user_id'
    ];
}

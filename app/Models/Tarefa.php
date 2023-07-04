<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [ //dados que estarão presentes na tabela
        'titulo',
        'descricao',
        'status',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoItem extends Model
{
    use HasFactory;
    protected $fillable = ['questao', 'resposta', 'docente_id'];
}

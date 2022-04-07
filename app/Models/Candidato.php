<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $fillable = [
        "nome",
        "experiencia",
        "nivel_academico_id",
    ];

    /**
     * Get the nivel that owns the Candidato
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nivel_academico()
    {
        return $this->belongsTo(NivelAcademico::class);
    }
}

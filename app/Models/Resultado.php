<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    protected $fillable = ['estudante_id', 'docente_id', 'pontuacao'];

    /**
     * Get the docente that owns the Avaliacao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this->belongsTo(User::class, 'docente_id', 'id');
    }

    /**
     * Get the estudante that owns the Avaliacao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estudante()
    {
        return $this->belongsTo(User::class, 'estudante_id', 'id');
    }
}

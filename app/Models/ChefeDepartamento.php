<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefeDepartamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'docente_id',
        'departamento_id',
    ];
    /**
     * Get the user that owns the ChefeDepartamento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this->belongsTo(User::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}

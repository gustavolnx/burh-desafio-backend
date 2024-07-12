<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'titulo',
        'descricao',
        'tipo_vaga',
        'salario',
        'horario'
    ];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'vaga_usuario', 'vaga_id', 'usuario_id');
    }
}

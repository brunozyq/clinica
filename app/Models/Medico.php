<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = ['usuario_id', 'crm'];  // liberado crm

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_medico', 'medico_id', 'especialidade_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}

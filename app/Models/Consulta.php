<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['medico_id', 'cliente_id', 'data_hora'];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'cliente_id');
    }
}

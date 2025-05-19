<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = ['nome', 'email', 'senha', 'tipo'];

    protected $hidden = ['senha', 'remember_token'];

    // Ajuste para usar o campo senha para autenticação
    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function medico()
    {
        return $this->hasOne(Medico::class);
    }

    public function consultasComoCliente()
    {
        return $this->hasMany(Consulta::class, 'cliente_id');
    }
}

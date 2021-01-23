<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';

    public function ramais()
    {
        return $this->hasMany(Ramal::class);
    }

    public function setores()
    {
        return $this->hasMany(Setor::class);
    }
}

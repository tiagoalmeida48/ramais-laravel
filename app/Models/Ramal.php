<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ramal extends Model
{
    use HasFactory;

    protected $table = 'ramais';
    protected $primaryKey = 'id';

    protected $fillable = ['usuario_id','empresa_id','setor_id','ramal','telefone_externo','nome_maquina'];

    use SoftDeletes;

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}

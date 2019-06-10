<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagem';

    public function atividade()
    {
        return $this->belongsTo(Atividade::class);
    }
}

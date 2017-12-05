<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regra extends Model
{
    protected $table= 'regras';
    
    protected $fillable = [
        'descricao',
    ];
}

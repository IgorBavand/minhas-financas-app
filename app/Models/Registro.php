<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TipoRegistro;
use App\Enums\Meses;


class Registro extends Model
{
    use HasFactory; 

    protected $fillable=['id','valor', 'descricao', 'ano', 'mes', 'tipo'];


}

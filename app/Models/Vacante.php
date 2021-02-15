<?php

namespace App\Models;

use App\Models\User;
use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'skills', 
        'categoria_id', 'experiencia_id', 'ubicacion_id',
        'salario_id' 
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }
}

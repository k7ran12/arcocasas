<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Proyecto extends Model
{
    // ... (otros atributos y métodos)

    static $rules = [
        'nombre' => 'required',
        'ubicacion' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre', 'ubicacion', 'img'];

    // Evento que se ejecuta antes de guardar el modelo
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($proyecto) {
            // Manejar la subida de la imagen si ha cambiado
            if ($proyecto->isDirty('img')) {
                $proyecto->guardarImagen();
            }
        });
    }

    // Guardar la imagen en el sistema de archivos
    public function guardarImagen()
    {
        $imagen = $this->attributes['img'];
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

        // Almacenar la imagen en el directorio 'public' del sistema de archivos
        $imagen->storeAs('public', $nombreImagen);

        // Guardar el nombre de la imagen en el modelo
        $this->attributes['img'] = $nombreImagen;
    }

    // Obtener la URL completa de la imagen
    public function getImagenUrlAttribute()
    {
        return $this->attributes['img'] ? Storage::url('public/' . $this->attributes['img']) : null;
    }

    // Relación con las proformas
    public function proformas()
    {
        return $this->hasMany('App\Models\Proforma', 'id_proyectos', 'id');
    }
}

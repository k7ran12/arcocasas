<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asesor
 *
 * @property $id
 * @property $nombre
 * @property $dni
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @property Proforma[] $proformas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asesor extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'dni' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','dni','direccion','telefono','email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proformas()
    {
        return $this->hasMany('App\Models\Proforma', 'id_asesors', 'id');
    }
    

}

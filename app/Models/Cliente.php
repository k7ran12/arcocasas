<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
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
class Cliente extends Model
{
    
  static $rules = [
    'nombre' => 'required|string',
    'dni' => 'required|numeric|digits:8|unique:clientes,dni', // Acepta solo 9 dígitos
    'direccion' => 'required|string',
    'telefono' => 'required|numeric|digits:9',
    'email' => 'required|email',
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
        return $this->hasMany('App\Models\Proforma', 'id_clientes', 'id');
    }
    

}

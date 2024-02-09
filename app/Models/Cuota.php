<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuota
 *
 * @property $id
 * @property $id_proforma
 * @property $numero
 * @property $monto
 * @property $fecha_vencimento
 * @property $created_at
 * @property $updated_at
 *
 * @property Proforma $proforma
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuota extends Model
{
    
    static $rules = [
		'id_proforma' => 'required',
		'numero' => 'required',
		'monto' => 'required',
    'fecha_vencimiento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_proforma','numero','monto', 'fecha_vencimiento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proforma()
    {
        return $this->hasOne('App\Models\Proforma', 'id', 'id_proforma');
    }
    

}

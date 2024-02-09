<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proforma
 *
 * @property $id
 * @property $id_clientes
 * @property $id_asesors
 * @property $id_proyectos
 * @property $nombre
 * @property $area
 * @property $bono
 * @property $precio
 * @property $inicial
 * @property $plazo
 * @property $interes
 * @property $cuota_men
 * @property $saldo_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property Asesor $asesor
 * @property Cliente $cliente
 * @property Proyecto $proyecto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proforma extends Model
{
    
    static $rules = [
		'id_clientes' => 'required',
		'id_asesors' => 'required',
		'id_proyectos' => 'required',
		'nombre' => 'required|string',
        'area' => 'required|numeric',
        'bono' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'inicial' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'plazo' => 'required|numeric',
        'interes' => 'required|numeric',
        //'cuota_men' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_clientes','id_asesors','id_proyectos','nombre','area', 'bono', 'precio','inicial','plazo','interes','cuota_men','saldo_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function asesor()
    {
        return $this->hasOne('App\Models\Asesor', 'id', 'id_asesors');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_clientes');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'id_proyectos');
    }
    public function cuotas()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'id_cuotas');
    }
    

}

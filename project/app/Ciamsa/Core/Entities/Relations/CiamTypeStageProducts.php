<?php

namespace Ciamsa\Core\Entities\Relations;

use Illuminate\Database\Eloquent\Model;

class CiamTypeStageProducts extends Model
{

    protected $table = 'ciam_product_type_stage';

    protected $fillable = [
        'crops_type_id',
        'crops_stage_id',
        'product_id',
        'active',
    ];


    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del tipo de cultivo que escribieron en el campo search
     * @return mixed
     */
    public function scopeTypeName($query, $value)
    {   
        $query -> where('crops_type_id', $value);
    }

    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del tipo de cultivo que escribieron en el campo search
     * @return mixed
     */
    public function scopeStageName($query, $value)
    {   
        $query -> where('crops_stage_id', $value);
    }
    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del tipo de cultivo que escribieron en el campo search
     * @return mixed
     */
    public function scopeProductName($query, $value)
    {   
        $query -> where('product_id', $value);
    }


    /**
     * Retorna todos los registros donde el campo active es igual al que enviaron a la funcion.
     * @param $query
     * @param $value boolean valor actual del campo active. Si es "" lo vuelve por defecto true
     * @return mixed
     */
    public function scopeActive($query, $value)
    {
        if ($value == "")
        {
            $value = true;
        }
        return $query -> where('active', $value);
    }

    public function relationProducts()
    {
        return $this -> morphTo();
    }

}

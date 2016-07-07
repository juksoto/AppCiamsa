<?php

namespace Ciamsa\Core\Entities\Crops;

use Illuminate\Database\Eloquent\Model;

class CiamCropsType extends Model
{
    protected $table = 'ciam_crops_type';

    protected $fillable = [
        'crops',
        'icon',
        'active',
    ];

    protected $sortable = [
        'id',
        'crops'
    ];

    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del tipo de cultivo que escribieron en el campo search
     * @return mixed
     */
    public function scopeTypeCropsName($query, $name)
    {
        $name = ucwords(strtolower($name));

        if (trim($name) != "")
        {
            $query -> where('crops',"LIKE", "%$name%");
        }
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
}

<?php

namespace Ciamsa\Core\Entities\Relations;

use Illuminate\Database\Eloquent\Model;

class CiamRelationRegister extends Model
{

    protected $table = 'ciam_relation_register';

    protected $fillable = [
        'crops_type_id',
        'crops_stage_id',
        'product_id',
        'register_id',
        'mezcla_medida',
        'active',
    ];

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

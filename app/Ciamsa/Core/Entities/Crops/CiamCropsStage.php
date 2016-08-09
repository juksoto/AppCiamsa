<?php

namespace Ciamsa\Core\Entities\Crops;

use Ciamsa\Core\Entities\Relations\CiamTypeStageProducts;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CiamCropsStage extends Model
{
    use Sortable;

    protected $table = 'ciam_crops_stage';

    protected $fillable = [
        'stage',
        'subline',
        'reference',
        'image',
        'active',
    ];

    protected $sortable = [
        'stage'
    ];
    
    

    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del tipo de cultivo que escribieron en el campo search
     * @return mixed
     */
    public function scopeStageCropsName($query, $name)
    {
        $name = ucwords(strtolower($name));

        if (trim($name) != "")
        {
            $query -> where('stage',"LIKE", "%$name%");
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


    /**
     * Relation Many to Many
     * Las etapas que pertenecen a tipo de cultivos
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function type()
    {
        return $this
            -> belongsToMany( 'Ciamsa\Core\Entities\Crops\CiamCropsType',  'ciam_type_has_stage_crops' , 'crops_type_id' , 'crops_stage_id' )
            -> withPivot('active')
            -> withTimestamps();
    }

}

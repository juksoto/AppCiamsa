<?php

namespace Ciamsa\Core\Entities\Products;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CiamProductCategories extends Model
{
    use Sortable;

    protected $table = 'ciam_categories';

    protected $fillable = [
        'category',
        'image',
        'active',
    ];

    protected $sortable = [
        'category'
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
            $query -> where('category',"LIKE", "%$name%");
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

    public function products()
    {
        return $this
            -> hasMany( 'Ciamsa\Core\Entities\Products\CiamProducts',  'ciam_products' ,  'id' ,'category_id' )
            -> withTimestamps();
    }
    
}

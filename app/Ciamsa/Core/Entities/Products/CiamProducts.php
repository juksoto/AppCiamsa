<?php

namespace Ciamsa\Core\Entities\Products;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CiamProducts extends Model
{
    use Sortable;

    protected $table = 'ciam_products';

    protected $fillable = [
        'product',
        'components',
        'image',
        'active',
    ];

    protected $sortable = [
        'product'
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
            $query -> where('product',"LIKE", "%$name%");
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
     * Relation One to Many
     * Los productos que pertenecen a una categoria
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function category()
    {
        return $this
            -> belongsTo( 'Ciamsa\Core\Entities\Products\CiamProductCategories',  'ciam_categories' ,  'category_id' ,'id' )
            -> withTimestamps();
    }

}

<?php

namespace Ciamsa\Core\Entities\Products;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Relations\CiamTypeStageProducts;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CiamProducts extends Model
{
    use Sortable;

    protected $table = 'ciam_products';

    protected $fillable = [
        'product',
        'components',
        'category_id',
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
    public function scopeProductsName($query, $name)
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
            -> belongsTo('Ciamsa\Core\Entities\Products\CiamProductCategories');

    }


    public function products()
    {
        return $this -> morphMany( 'Ciamsa\Core\Entities\Relations\CiamTypeStageProducts',  'relationProducts' , 'ciam_product_type_stage' , 'product_id', 'id');
        //return $this -> morphMany('Ciamsa\Core\Entities\Relations\CiamTypeStageProducts', 'relationProducts', 'crops_stage_id', 'crops_stage_id');
    }




}

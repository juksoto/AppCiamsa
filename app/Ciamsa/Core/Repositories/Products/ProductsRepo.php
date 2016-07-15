<?php

namespace Ciamsa\Core\Repositories\Products;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Products\CiamProductCategories;
use Ciamsa\Core\Entities\Products\CiamProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class ProductsRepo extends Model
{
    public function get()
    {
        return CiamProducts::All() -> where ( 'active' , true );

    }

}


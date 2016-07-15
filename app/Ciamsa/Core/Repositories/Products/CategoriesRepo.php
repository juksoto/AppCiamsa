<?php

namespace Ciamsa\Core\Repositories\Products;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Products\CiamProductCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class CategoriesRepo extends Model
{
    public function get()
    {
        return CiamProductCategories::All() -> where ( 'active' , true );

    }

}


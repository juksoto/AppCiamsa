<?php

namespace Ciamsa\Core\Repositories\Crops;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class CropsTypeRepo extends Model
{
    public function get()
    {
        return CiamCropsType::All() -> where ( 'active' , true );

    }

}


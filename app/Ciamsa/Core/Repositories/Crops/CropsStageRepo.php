<?php

namespace Ciamsa\Core\Repositories\Crops;

use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class CropsStageRepo extends Model
{
    public function get()
    {
        return CiamCropsStage::All() -> where ( 'active' , true );

    }

}


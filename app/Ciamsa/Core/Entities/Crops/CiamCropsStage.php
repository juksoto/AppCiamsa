<?php

namespace Ciamsa\Core\Entities\Crops;

use Illuminate\Database\Eloquent\Model;

class CiamCropsStage extends Model
{
    protected $table = 'ciam_crops_stage';

    protected $fillable = [
        'stage',
        'subline',
        'image',
        'active',
    ];
}

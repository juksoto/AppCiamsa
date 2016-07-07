<?php

namespace Ciamsa\Core\Entities\Crops;

use Illuminate\Database\Eloquent\Model;

class CiamCropsType extends Model
{
    protected $table = 'ciam_crops_type';

    protected $fillable = [
        'crops',
        'icon',
        'active',
    ];
}

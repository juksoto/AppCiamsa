<?php

namespace Ciamsa\Core\Entities\Registers;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CiamRegister extends Model
{
    use Sortable;

    protected $table = 'ciam_registers';

    protected $fillable = [
        'name',
        'email',
        'department_id',
        'town',
        'phone',
        'mobile',
        'company',
        'information',
        'active',
    ];

    protected $sortable = [
        'name',
    ];


}

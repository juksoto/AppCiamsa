<?php

namespace Ciamsa\Core\Entities\Registers;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CiamDepartments extends Model
{
    use Sortable;

    protected $table = 'ciam_departments';

    protected $fillable = [
        'departments',
        'active',

    ];

    protected $sortable = [
        'departments',
    ];



    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del tipo de cultivo que escribieron en el campo search
     * @return mixed
     */
    public function scopeDepartments($query, $name)
    {
        $name = ucwords(strtolower($name));

        if (trim($name) != "")
        {
            $query -> where('stage',"LIKE", "%$name%");
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
    
}

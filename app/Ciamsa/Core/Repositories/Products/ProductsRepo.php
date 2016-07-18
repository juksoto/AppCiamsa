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

    /**
     * Valida si existe alguna categoria creada o activa.
     * @param array $countCountry
     * @return $this|\Illuminate\View\View
     */
    public function validateExistCategory($countCategory, $data)
    {
        if ( $countCategory > 0 )
        {
            return view('admin.products.products.create', compact('data'));
        }
        else
        {
            $message = trans('admin.message.error_products_no_category');

            return redirect()
                -> route('admin.products.products.index')
                -> withErrors($message);
        }
    }

}


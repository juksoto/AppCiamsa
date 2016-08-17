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

    public function renameDirectory($request, $nameOldDirectory)
    {
        $slugOldDirectory = str_slug($nameOldDirectory);
        $directory   =  str_slug($request -> category) ;
        $urlPath    = 'media/products/';

        if (file_exists ( $urlPath . $slugOldDirectory ))
        {
            rename($urlPath . $slugOldDirectory, $urlPath . $directory);
        }
        else
        {
            $directoryNew = $urlPath . $directory;
            \File::makeDirectory($directoryNew);
        }
    }
}


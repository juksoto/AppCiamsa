<?php

namespace Ciamsa\Core\Repositories\Products;

use Ciamsa\Core\Entities\Products\CiamProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Ciamsa\Core\Helpers;

class ProductsRepo extends Model
{

    public function __construct( Helpers $helper )
    {
        $this -> helper   =  $helper;
    }


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

    /**
     * Permite cargar los arhicovs
     * @param $request
     */
    public function uploadFile($request, $directoryName)
    {
        $nameField  = "image";
        $fileName   =  str_slug($request -> product) ;
        $directory  =  str_slug($directoryName) ;
        $urlPath    = 'media/products/'. $directory .'/';


        $fileLoaded = $this -> helper -> resolveFile($nameField, $fileName, $urlPath, $request);

        return $fileLoaded;
    }

    /**
     * Permite cargar los componentes
     * @param $request
     */
    public function uploadFileComponents($request, $directoryName)
    {
        $nameField  = "components";
        $fileName   =  'components-'.str_slug($request -> product) ;
        $directory  =  str_slug($directoryName) ;
        $urlPath    = 'media/products/'. $directory .'/';

        $fileLoaded = $this -> helper -> resolveFile($nameField, $fileName, $urlPath, $request);

        return $fileLoaded;
    }

    /**
     * @param $request
     * @param $id
     * @return bool|string
     * @param [description] Metodo que funciona en el momento de actuzlair una imagen. Renombra y mueve el
     * archivo a su nueva ubicacion.
     * Si no existe el archivo viejo, fue borrado o esta corrupto, copia una imagen por defecto.
     */
    public function renameFile($request, $nameOldFile , $directoryName)
    {

        $nameField  = "image";
        $fileName   =  str_slug($request -> product) ;
        $directory  =  str_slug($directoryName) ;
        $urlPath    = 'media/products/'. $directory .'/';

        $extension =  explode('.',  $nameOldFile);

        $fileName   =  $fileName .'.'. $extension[1] ;

        if (file_exists ( $urlPath . $nameOldFile ))
        {
            rename($urlPath . $nameOldFile, $urlPath . $fileName);
        }
        else
        {
            copy('media/no-file.png', $urlPath . $fileName );
        }

        return $fileName;

    }

    /**
    * @param $request
    * @param $id
    * @return bool|string
    * @param [description] Metodo que funciona en el momento de actuzlair una imagen. Renombra y mueve el
    * archivo a su nueva ubicacion.
    * Si no existe el archivo viejo, fue borrado o esta corrupto, copia una imagen por defecto.
    */
    public function renameFileComponents($request, $nameOldFile, $directoryName)
    {

        $nameField  = "components";
        $fileName   =  'components-'.str_slug($request -> product) ;
        $directory  =  str_slug($directoryName) ;
        $urlPath    = 'media/products/'. $directory .'/';

        $extension =  explode('.',  $nameOldFile);

        $fileName   =  $fileName .'.'. $extension[1] ;

        if (file_exists ( $urlPath . $nameOldFile ))
        {
            rename($urlPath . $nameOldFile, $urlPath . $fileName);
        }
        else
        {
            copy('media/no-file.png', $urlPath . $fileName );
        }

        return $fileName;

    }

}


<?php

namespace Ciamsa\Core\Repositories\Crops;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Ciamsa\Core\Helpers;

class CropsTypeRepo extends Model
{
    public function __construct( Helpers $helper )
    {
        $this -> helper   =  $helper;
    }

    public function get()
    {
        return CiamCropsType::All() -> where ( 'active' , true );

    }
    /**
     * @param $request
     */
    public function uploadFile($request)
    {
        $nameField  = "icon";
        $fileName   =  "icon-". str_slug($request -> crops) ;
        $urlPath    = 'media/type-crops/';

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
    public function renameFile($request, $nameOldFile)
    {

        $nameField  = "icon";
        $fileName   =  "icon-". str_slug($request -> crops) ;
        $urlPath    = 'media/type-crops/';

        $extension =  explode('.',  $nameOldFile);
        $fileName   =  "icon-". str_slug($request -> crops) .'.'. $extension[1] ;

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


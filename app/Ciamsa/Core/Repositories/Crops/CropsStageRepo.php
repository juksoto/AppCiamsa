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

    /**
     * @param $request
     */
    public function uploadFile($request)
    {
        $nameField  = "image";
        $fileName   =  "stage-crops-". str_slug($request -> stage) ;
        $urlPath    = 'media/stage-crops/';

        $fileLoaded = $this -> resolveFile($nameField, $fileName, $urlPath, $request);

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

        $nameField  = "image";
        $fileName   =  "stage-crops-". str_slug($request -> stage) ;
        $urlPath    = 'media/stage-crops/';

        $extension =  explode('.',  $nameOldFile);
        $fileName   =  "stage-crops-". str_slug($request -> stage) .'.'. $extension[1] ;

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


    /**Mueve el archivo que cargo a una carpeta especifica
     *
     * @param $nameField string nombre del campo del formulario
     * @param $fileName string nombre nuevo del archivo
     * @param $urlPath string  url de la carpeta
     * @param $request collection request de todo el formulario
     * @return bool|string retorna $nameFile que es el nombre del archoivo o falso, si el archivo no existe o
     * no fue cargado,  o es invalido.
     */
    public function resolveFile ($nameField, $fileName,$urlPath, $request)
    {

        if ($request -> hasFile($nameField) && ( $request -> file($nameField) -> isValid() ) )
        {
            $nameFile = $fileName . "." . $request->file($nameField) -> getClientOriginalExtension();

            $request -> file( $nameField ) -> move( base_path() . "/public/" . $urlPath , $nameFile);

            return $nameFile;
        }
        else
        {
            return false;
        }
    }

}


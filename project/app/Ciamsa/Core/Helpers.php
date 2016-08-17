<?php

namespace Ciamsa\Core;

use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    /**
     * Valida el campo active de un registro
     * @param $active
     * @return array
     */
    public function valueActive($active)
    {

        if ($active == false)
        {
            $active = true;
            $message =  trans('admin.status.has_been_published');
            $message_alert ="alert-success";
            return array('message' => $message, 'message_alert' => $message_alert, 'active' => $active );
        }
        else
        {
            $active = false;
            $message =  trans('admin.status.has_been_removed');
            $message_alert = "alert-warning ";
            return array('message' => $message, 'message_alert' => $message_alert,  'active' => $active );
        }
    }

    /**
     * Valida el campo active de un registro
     * @param $active
     * @return array
     */
    public function valueActiveRelations($activeStatus)
    {
        if (( $activeStatus == true ) or ( $activeStatus == ""))
        {
          return true;
        }
        else
        {
            return false;
        }
    }



    /**
     * Funcion que valida los campos que ingresa el usuario en los formularios. Valida si no son null o estan vacios.
     * @param $field string Campo del formuilario a validar
     * @return bool
     */
    public function validateFieldIsNotNull($field)
    {
        if (($field != null) && (trim($field) != "") && (! empty($field)) )
        {
            return true;
        }
        else
        {
            return false;
        }
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
            $extension = str_slug($request -> file($nameField) -> getClientOriginalExtension());
            
            $nameFile = $fileName . "." . $extension;

            $request -> file( $nameField ) -> move( base_path() . "/public/" . $urlPath , $nameFile);

            return $nameFile;
        }
        else
        {
            return false;
        }
    }

}

<?php

namespace Ciamsa\Core\Repositories;

use Ciamsa\Core\Entities\Registers\CiamRegister;
use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Products\CiamProductCategories;
use Ciamsa\Core\Entities\Products\CiamProducts;
use Ciamsa\Core\Entities\Registers\CiamDepartments;
use Ciamsa\Core\Entities\Relations\CiamRelationRegister;
use Ciamsa\Core\Entities\Relations\CiamTypeStageProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RegisterRepo extends Model
{
    public function get()
    {
        return CiamRegister::all() -> where ( 'active' , true );
    }
    public function saveForm($request)
    {
        // Validacion de honeyspot
        if (empty($request -> direccion) and ($request -> persona == "ciamsa app"))
        {
            \DB::transaction(function() use ($request)
            {
                // Save in register table
                try {

                    $register = new CiamRegister();
                    $register  -> fill( $request -> all() );
                    $register  -> save();
                }

                catch(\Exception $e)
                {
                    \DB::rollback();
                    throw $e;
                }

                // Save in relation of register has crops stage and type
                try {

                    // Guardamos la informacion del formulario

                    $contentCrops = $this -> resolveCrops( $request );
                    foreach ($contentCrops as $key => $valueCrops)
                    {
                        if (isset($valueCrops) and $valueCrops['type'] != "")
                        {
                            $relation = new CiamRelationRegister();
                            $relation -> crops_type_id = $valueCrops['type'];
                            $relation -> crops_stage_id = $valueCrops['stage'];
                            $relation -> product_id = $valueCrops['product'];
                            $relation -> mezcla_medida = $valueCrops['mezcla'];
                            $relation -> register_id = $register -> id;
                            $relation -> save();

                            // Si existe un complementario
                            $validateNull = $this -> validateFieldIsNotNull($valueCrops['complement']);
                            if ($validateNull == true )
                            {
                                $relation = new CiamRelationRegister();
                                $relation -> crops_type_id = $valueCrops['type'];
                                $relation -> crops_stage_id = $valueCrops['stage'];
                                $relation -> product_id = $valueCrops['complement'];
                                $relation -> mezcla_medida = $valueCrops['mezcla'];
                                $relation -> register_id = $register -> id;
                                $relation -> save();
                            }
                        }
                    }
                    $message_floating = trans('app.message.send_form_success');
                    $message_alert ="alert-successful";

                    Session::flash('message_floating', $message_floating);
                    Session::flash('message_alert', $message_alert);
                }

                catch(\Exception $e)
                {
                    $message_floating = trans('app.message.send_form_error');
                    $message_alert ="alert-danger";

                    Session::flash('message_floating', $message_floating);
                    Session::flash('message_alert', $message_alert);

                    \DB::rollback();
                    throw $e;
                }

            });
        }
    }
    public function stepThree($stageID, $typeID)
    {
        $data = new \stdClass();

        // Buscamos el id de la etapa de cultivo que selecciono
        $stage = CiamCropsStage::where('id',$stageID)
            -> active(1)
            -> with('type')
            -> first();

        // En la tabla de relacion, buscamos todos los productos de esta etapa.
        $relations = CiamTypeStageProducts::where('crops_stage_id' ,$stageID )
            -> where('crops_type_id' ,$typeID )
            -> where ('active' , 1 )
            -> get();

        $collections = collect();
        $complements = collect();

        /**
         * Vamos producto por producto y buscamos la informacion de la categoria y
        todo lo guardamos en una sola coleccion que enviamos a la vista,
         */

        foreach ($relations as $relation) {
            // Buscamos los productos
            $products = collect(CiamProducts::find($relation -> product_id));

            // Si la categoria es diferente a la 4 que es los complementarios
            if($products['category_id'] != 4)
            {
                $category = CiamProductCategories::find($products['category_id']);
                //Buscamos info del tipo de cutlivo
                $merged = $products -> merge([
                    "category"      => $category -> category,
                    "category_slug" => str_slug($category -> category)
                ]);

                $collections -> push($merged);
            }
            else
            {
                // Productos complementarios
                $category = CiamProductCategories::find($products['category_id']);
                //Buscamos info del tipo de cutlivo
                $merged = $products -> merge([
                    "category"      => $category -> category,
                    "category_slug" => str_slug($category -> category)
                ]);

                $complements -> push($merged);
                $data -> complements = $complements;
            }

        }

        $data -> type_id     = $typeID;
        $data -> type        = $stage -> type -> crops;
        $data -> stage       = $stage -> stage;
        $data -> stage_id    = $stageID;

        $data -> collections = $collections -> sortBy('category_id');

        return $data;
    }
    public function getQuote($request)
    {
        $data           = new \stdClass();
        $allType        = CiamCropsType::where('active', 1 ) -> get();
        $allDepartment  = CiamDepartments::where('active', 1 ) -> get();

        $allStage = CiamCropsStage::where('active', 1 ) -> get();
        $products = CiamProducts::where('active',1) -> get();

        $data -> allType        = $allType;
        $data -> allStage       = $allStage;
        $data -> products       = $data -> complements = $products;
        $data -> allDepartments = $allDepartment;

        $data -> stageEnabled = false;
        $data -> productEnabled = false;
        $data -> complementsEnabled = false;

        $getType    =  $request -> get('type');
        $getStage   =  $request -> get('stage');
        $getProduct  =  $request -> get('product_id_text');

        if ( isset($getType ) and isset($getStage ) )
        {
            $data -> idType     = $getType;
            $data -> idStage    = $getStage;
            if (isset($getProduct))
            {
                $data -> idProduct  = $getProduct;
            }
        }

        return $data;
        
    }
    public function showProducts($typeID, $stageID)
    {
        // En la tabla de relacion, buscamos todos los productos de esta etapa.
        $relations = CiamTypeStageProducts::where('crops_stage_id' ,$stageID )
            -> where('crops_type_id' , $typeID)
            -> where ('active' , 1 )
            -> get();

        $collections = collect();

        /**
         * Vamos producto por producto y buscamos la informacion de la categoria y
        todo lo guardamos en una sola coleccion que enviamos a la vista,
         */

        foreach ($relations as $relation) {
            // Buscamos los productos
            $products = collect(CiamProducts::find($relation -> product_id));
            $category = CiamProductCategories::find($products['category_id']);
            //Buscamos info del tipo de cutlivo
            $merged = $products -> merge([
                "category"      => $category -> category,
                "category_slug" => str_slug($category -> category)
            ]);

            $collections -> push($merged);
        }

        $productArray = Array();

        foreach ($collections as $key => $collection) {
            $productArray[$key]['id'] = $collection['id'];
            $productArray[$key]['product'] = $collection['product'];
            $productArray[$key]['category_id'] = $collection['category_id'];
            $productArray[$key]['category'] = $collection['category'];
        }

        return response() -> json($productArray);
    }


    public function showRegister()
    {
        $allRegister = CiamRegister::all();

        $registerArray = array();

        foreach ($allRegister as $pos => $register) {
            // Buscamos los productos
            $relation   = CiamRelationRegister::where('register_id' , $register -> id)
                ->select([
                'id',
                'crops_type_id',
                'crops_stage_id',
                'product_id',
                'register_id',
                'mezcla_medida'
            ])
                -> get()
                -> toArray();

            $depto = CiamDepartments::where('id', $register -> department_id) -> select('departments')  -> first() -> toArray();

            $regArray = $register -> toArray();
            $info = array_merge($regArray, $depto );

            if (! empty($relation))
            {
                foreach ($relation as $key => $value)
                {
                    $type      = CiamCropsType::where ('id' ,$value['crops_type_id'])
                        -> select([
                            'crops',
                        ])
                        -> first()
                        -> toArray();

                    if ($value['crops_stage_id'] != null)
                    {
                        $stage      = CiamCropsStage::where ('id' ,$value['crops_stage_id'])
                            -> select([
                                'stage',
                            ])
                            -> first()
                            -> toArray();
                    }
                    else
                    {
                        $stage["stage"] = "";
                    }


                    if ($value['product_id'] != null) {
                        $product    = CiamProducts::with(
                            array('category' => function ($query)
                            {
                                $query -> select('category', 'id');
                            }
                            ))
                            -> where ('id' ,$value['product_id']) -> select([
                                'product',
                                'category_id',
                            ])
                            -> first() ->toArray();
                    }
                    else
                    {
                        $product["product"] = "";
                        $product["category"]["category"] = "";
                    }

                    // Si stage y product es null
                    if (!isset($stage))
                    {
                        $stage["stage"] = "";
                    }
                    if (!isset($product))
                    {
                        $product["product"] = "";
                        $product["category"]["category"] = "";
                    }

                    $final = array_merge($info, $value, $type, $stage, $product );
                    // Fusionamos con el array local
                    array_push($registerArray,$final );
                }
            }
            else
            {
                // Si existe contenido de cultivos
                array_push($registerArray, $info );

            }
        }

        // Quitamos algunos keys que no necesitamos
        $removeKeys = array('active', 'updated_at' , 'created_at', 'crops_type_id', 'crops_stage_id', 'product_id', 'register_id', 'category_id');

        foreach($removeKeys as $key) {
            unset($registerArray[$key]);
        }
           return $registerArray;

    }

    /**
     * Valida si en el request cuantos ciltivos existen
     * Guarda en una array los valores y los devuelve a la transaccion.
     * @param $request array todos los valores del formulario.
     * @return array
     */
    public function  resolveCrops($request)
    {
        $totalCrops = $request -> total_crops;
        $cropsArray = Array();


        for ($i = 0; $i <= $totalCrops; $i++)
        {
            $cropsType      = "crops_type_id_". $i;
            $cropsStage     = "crops_stage_id_". $i;
            $products       = "product_id_". $i;
            $complements    = "complements_id_". $i;
            $mezcla         = "mezcla_medida_". $i;

            if (isset($request -> $cropsType))
            {
                $cropsArray[$i]['type']         = $request -> $cropsType;
                $cropsArray[$i]['stage']        = $request -> $cropsStage;
                $cropsArray[$i]['product']      = $request -> $products;
                $cropsArray[$i]['mezcla']       = $request -> $mezcla;

                if (isset($request -> $cropsType))
                {
                    $cropsArray[$i]['complement']   = $request -> $complements;
                }

                if($cropsArray[$i]['stage'] == "Seleccionar")
                {
                    $cropsArray[$i]['stage'] = null;
                }
                if($cropsArray[$i]['product'] == "Seleccionar")
                {
                    $cropsArray[$i]['product'] = null;
                }
                if($cropsArray[$i]['complement'] == "Seleccionar")
                {
                    $cropsArray[$i]['complement'] = null;
                }

            }

        }
        return $cropsArray;
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
    
    
}

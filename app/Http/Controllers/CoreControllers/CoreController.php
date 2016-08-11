<?php

namespace App\Http\Controllers\CoreControllers;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Ciamsa\Core\Entities\Products\CiamProductCategories;
use Ciamsa\Core\Entities\Products\CiamProducts;
use Ciamsa\Core\Entities\Relations\CiamTypeStageProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class CoreController extends Controller
{
    public function index()
    {
        return view( 'core.index' );
    }
    public function stepOne()
    {
        $data = CiamCropsType::where('active' , 1) -> get();
        return view( 'core.stepOne' , compact('data') );
    }
    public function stepTwo($id)
    {
        $data = CiamCropsStage::with('type')
            -> where ('type_id' , $id)
            -> active(1)
            -> orderBy( 'order_number', 'ASC' )
            -> paginate();

        $cantType = $data -> count();

        $type = CiamCropsType::find($id);

        $data -> cantType = $cantType;
        $data -> type = $type -> crops;

        return view( 'core.stepTwo' , compact('data') );
    }

    public function stepThree($id)
    {
        $data = new \stdClass();

        // Buscamos el id de la etapa de cultivo que selecciono
        $stage = CiamCropsStage::where('id',$id)
            -> active(1)
            -> with('type')
            -> first();

        // En la tabla de relacion, buscamos todos los productos de esta etapa.
        $relations = CiamTypeStageProducts::where('crops_stage_id' ,$stage -> id )
            -> where('crops_type_id' , $stage -> type_id )
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

        $data -> type_id     = $stage -> type -> id;
        $data -> type        = $stage -> type -> crops;
        $data -> stage       = $stage -> stage;
        $data -> stage_id    = $stage -> id;

        $data -> collections = $collections;


        return view( 'core.stepThree' , compact('data') );
    }
}

<?php

namespace App\Http\Controllers\CoreControllers;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Ciamsa\Core\Entities\Products\CiamProductCategories;
use Ciamsa\Core\Entities\Products\CiamProducts;
use Ciamsa\Core\Entities\Registers\CiamDepartments;
use Ciamsa\Core\Entities\Relations\CiamTypeStageProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
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

    public function stepThree($typeID,$stageID)
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

        return view( 'core.stepThree' , compact('data') );
    }

    public function quote(Request $request)
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



        return view( 'core.quote' , compact('data') );
    }

    public function showProducts($stageID, $typeID)
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
}

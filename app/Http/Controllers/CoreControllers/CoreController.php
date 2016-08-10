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
        // Buscamos el id de la etapa de cultivo que selecciono
        $stage = CiamCropsStage::where('id',$id)
            -> active(1)
            -> with('type')
            -> first();

        // En la tabla de relacion, buscamos todos los
        $relations = CiamTypeStageProducts::where('crops_stage_id' ,$stage -> id )
            -> where('crops_type_id' , $stage -> type_id )
            -> where ('active' , 1 )
            -> get();

        $collections = collect();

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

        $collections -> type_id     = $stage -> type -> id;
        $collections -> type        = $stage -> type -> crops;
        $collections -> stage       = $stage -> stage;
        $collections -> stage_id    = $stage -> id;

        $data = $collections;
        return view( 'core.stepThree' , compact('data') );
    }
}

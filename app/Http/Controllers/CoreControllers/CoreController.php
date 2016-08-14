<?php

namespace App\Http\Controllers\CoreControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateRegisterRequest;
use Ciamsa\Core\Entities\Registers\CiamRegister;
use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Repositories\RegisterRepo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Pagination\LengthAwarePaginator;

class CoreController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @return mixed
     * [description] Index de la app
     */
    public function index()
    {
        return view( 'core.index' );
    }

    /**
     * @return mixed
     * * [description] Paso 01
     */
    public function stepOne()
    {
        $data = CiamCropsType::where('active' , 1) -> get();
        return view( 'core.stepOne' , compact('data') );
    }

    /**
     * @param $id
     * @return mixed
     * * [description] Paso 02
     */
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

    /**
     * @param $typeID
     * @param $stageID
     * @return mixed
     * * [description] Paso 03
     */

    public function stepThree($typeID,$stageID)
    {
        $stepThree = new RegisterRepo();
        $data = $stepThree -> stepThree($stageID, $typeID);

        return view( 'core.stepThree' , compact('data') );
    }

    /**
     * @param Request $request
     * @return mixed
     * [description] Formulario de cotizar. Llama el layout y todas sus funciones.
     */

    public function quote(Request $request)
    {
        $registerRepo = new RegisterRepo();
        $data = $registerRepo -> getQuote($request);

         return view( 'core.quote' , compact('data') );
    }

    /**
     * @param $stageID
     * @param $typeID
     * @return mixed
     * [description] Muestra los productos en el formulario de cotizar
     */
    public function showProducts($stageID, $typeID)
    {
       $products = new RegisterRepo();
        return $products -> showProducts($typeID, $stageID);
    }

    /**
     * @param Requests\CreateRegisterRequest $request
     * @return mixed
     * [description] Guarda el formulario en la BD
     */
    public function createQuote(CreateRegisterRequest $request)
    {
        
        $register = new RegisterRepo();
        $register -> saveForm($request);

        return redirect() -> route('index');
    }

    /**
     * @param Requests\CreateRegisterRequest $request
     * @return mixed
     * [description] Guarda el formulario en la BD
     */
    public function showRegister(Request $request)
    {
        $register = new RegisterRepo();
        $data = $register -> showRegister();

        //Pagination
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $col = new Collection($data);
        $perPage = 20;
        $currentPageSearchResults = $col -> slice(($currentPage - 1) * $perPage, $perPage)->all();
        $collection = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

        $collection -> setPath($request->url());

        return view( 'admin.register.index' , compact('collection') );
    }
}

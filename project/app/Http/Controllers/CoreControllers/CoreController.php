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
use Maatwebsite\Excel\Facades\Excel;

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

    public function showProductRelationQuote($id)
    {
        $collections = CiamCropsStage::where( 'type_id' , $id )
            -> where ('active' , 1)
            -> orderBy( 'order_number', 'ASC' )
            -> get();
        $stageArray = Array();

        foreach ($collections as $key => $collection) {
            $stageArray[$key]['id'] = $collection -> id;
            $stageArray[$key]['stage'] = $collection -> stage;
        }
        return response() -> json($stageArray);
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

        $collection -> countRegister = count($data);
        $blockRegister = 300;

        $collection -> options = $register -> resolveRank($blockRegister, ($collection -> countRegister -1));

        $collection -> setPath($request -> url());

        return view( 'admin.register.index' , compact('collection') );
    }
    
    public function exportReport (Request $request)
    {
        $rank = explode("|" , $request -> cantRegistros );
        $rangIni = $rank[0];
        $rangFinal = $rank[1];

        $expRepo = new RegisterRepo();
        $collection = $expRepo -> exportReport($rangIni, $rangFinal);

        Excel::create('Reporte CIAMSA', function($excel) use($collection) {

            $excel -> sheet('Registros', function($sheet) use($collection){

                $sheet -> appendRow(array_keys($collection[0])); // column names

                // Set black background
                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row -> setFontWeight('bold');

                });

                $sheet -> setCellValue('A1', 'ID');
                $sheet -> setCellValue('B1', 'Nombre');
                $sheet -> setCellValue('C1', 'Correo');
                $sheet -> setCellValue('D1', 'Empresa');
                $sheet -> setCellValue('E1', 'Telefono');
                $sheet -> setCellValue('F1', 'Celular');
                $sheet -> setCellValue('G1', 'Empresa');
                $sheet -> setCellValue('H1', 'Informacion');
                $sheet -> setCellValue('I1', 'Fecha');
                $sheet -> setCellValue('J1', 'Depto');
                $sheet -> setCellValue('K1', 'Mezcla Medida');
                $sheet -> setCellValue('L1', 'Tipo');
                $sheet -> setCellValue('M1', 'Etapa');
                $sheet -> setCellValue('N1', 'Producto');
                $sheet -> setCellValue('O1', 'Categoria');

                $sheet->fromArray($collection, null, 'A2', false, false);

            });
        })->export('xlsx');
    }


}

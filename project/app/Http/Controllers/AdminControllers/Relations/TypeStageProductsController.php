<?php

namespace App\Http\Controllers\AdminControllers\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Relations\CreateTypeStageProductsRequest;
use App\Http\Requests\Relations\EditTypeStageProductsRequest;
use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Products\CiamProducts;
use Ciamsa\Core\Entities\Relations\CiamTypehasStageCrops;
use Ciamsa\Core\Entities\Relations\CiamTypeStageProducts;
use Ciamsa\Core\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ciamsa\Core\Repositories\Relations\tsProductsRepo;

class TypeStageProductsController extends Controller
{
    /**
     * @var Array
     */
    private $data;

    /**
     * @var Helpers
     */
    private $helper;

    /**
     * @var Request
     */
    private $request;
    /**
     * @var array
     */
    private $tsProducts;


    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper, tsProductsRepo $relationRepo)
    {
        $this -> request = $request;

        $this -> helper = $helper;

        $this -> relationRepo = $relationRepo;

        $this -> data = new \stdClass();

        //$this -> middleware('findUser', ['only' => ['show','edit','update','destroy']]);

    }

    /**
     * @param $id id del Type Crops
     */
    public function findUser($id)
    {
        $this -> tsProducts = CiamTypeStageProducts::findOrFail( $id );
    }

    /**
     * @param $id id del Type Crops
     */
    public function findIDRelation($idType, $idStage, $idProduct)
    {
        $tspRelation = CiamTypeStageProducts::All()
            -> where('crops_type_id',$idType)
            -> where('crops_stage_id',$idStage)
            -> where('product_id',$idProduct)
            -> first();

        $this -> tspRelation= $tspRelation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collections = CiamTypeStageProducts::active ($this -> request
            -> get('active'))
            -> orderBy('crops_type_id' , 'ASC')
            -> paginate(30);

        foreach ($collections as $collection) {
            $stage = CiamCropsStage::find($collection -> crops_stage_id );
            $type = CiamCropsType::find($collection -> crops_type_id );
            $products = CiamProducts::find($collection -> product_id );
            $collection ->  stage = $stage;
            $collection ->  type = $type;
            $collection ->  category = $products -> category;
            $collection ->  products = $products;
            $collection -> toBase();
        }

        $this -> data -> collections = $collections;
        $data = $this -> data;

        return view('admin.products.tsProducts.index', compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeAllCrops = CiamCropsType::all();
        $stageAllCrops = CiamCropsStage::all();
        $products = CiamProducts::with('category') -> get();

        $this -> data -> typeAllCrops =  $typeAllCrops;
        $this -> data -> stageAllCrops =  $stageAllCrops;
        $this -> data -> products =  $products;
        $this -> data -> stageEnabled =  false;

        $data = $this -> data;

        return view('admin.products.tsProducts.create',  compact('data')); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeStageProductsRequest $request)
    {
        $tsProducts = new CiamTypeStageProducts();
        $tsProducts  -> fill( $request -> all() );

        $tsProducts -> save();

        $message_floating = trans('admin.message.alert_field_create');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route('admin.tsProducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this -> findUser($id);

        $typeAllCrops = CiamCropsType::all();

        $stageAllCrops = CiamCropsStage::where('type_id', $this -> tsProducts -> crops_type_id) -> where ('active' , 1) -> get();

        $products = CiamProducts::with('category') -> get();

        $this -> data -> typeAllCrops =  $typeAllCrops;
        $this -> data -> stageAllCrops =  $stageAllCrops;
        $this -> data -> products =  $products;
        $this -> data -> collection =  $this -> tsProducts;
        $this -> data -> stageEnabled =  true;

        $data = $this -> data;

      

        return view('admin.products.tsProducts.edit',  compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTypeStageProductsRequest $request, $id)
    {
        // Encuentre en la tabla tipo, el id que el usuario ingreso en el formulario
        $this -> findUser($id);
        $this -> tsProducts -> fill( $request -> all() );
        $this -> tsProducts -> save();

        $message_floating = trans('admin.message.alert_field_create');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route('admin.tsProducts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> findUser($id);

        $active = $this -> helper -> valueActive( $this -> tsProducts -> active );
        $this -> tsProducts -> active = $active['active'];
        $message = trans('admin.message.relations_status') . " " . $active['message'];
        $this -> tsProducts -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route( 'admin.tsProducts.index' );
    }
}

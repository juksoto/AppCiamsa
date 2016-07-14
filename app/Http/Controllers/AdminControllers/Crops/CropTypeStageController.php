<?php

namespace App\Http\Controllers\AdminControllers\Crops;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Relations\CreateTypeHasStageCropRequest;
use App\Http\Requests\Relations\EditTypeHasStageCropRequest;
use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Relations\CiamTypehasStageCrops;
use Ciamsa\Core\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CropTypeStageController extends Controller
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
    private $tsCrop;


    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper)
    {
        $this -> request = $request;

        $this -> helper = $helper;

        $this -> data = new \stdClass();

        //$this -> middleware('findUser', ['only' => ['show','edit','update','destroy']]);

    }

    /**
     * @param $id id del Type Crops
     */
    public function findUser($id)
    {
        $this -> tsCropCrop = CiamCropsType::findOrFail( $id );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = CiamCropsType::typeCropsName( $this -> request -> get('search') )
            -> active( $this -> request -> get('active') )
            -> orderBy( 'crops', 'ASC' )
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.crops.tsCrop.index', compact( 'data' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Request::has('type'))
        {
            $idType = $this -> request -> get('type');
            $this -> findUser($idType);
            $this -> data -> typeCrop = $data = $this -> tsCropCrop;
        }

        $typeAllCrops = CiamCropsType::all();
        $stageAllCrops = CiamCropsStage::all();

        $this -> data -> typeAllCrops =  $typeAllCrops;
        $this -> data -> stageAllCrops =  $stageAllCrops;

        $data = $this -> data;

        return view('admin.crops.tsCrop.create',  compact('data')); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeHasStageCropRequest $request)
    {
        // Encuentre en la tabla tipo, el id que el usuario ingreso en el formulario
        $tsCrop = CiamCropsType::find( $request -> crops_type_id );
        $tsCrop
            -> stage()
            // Agregue a la tabla de pivote ese id de crops con el id de la etapa.
            -> attach( $request ->crops_stage_id );

        $message_floating = trans('admin.message.alert_field_create');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route('admin.crops.tsCrop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this -> findUser($id);

        $collection = CiamCropsType::find($id) -> stage;

        $this -> data -> stages = $collection;
        $this -> data -> collections = $this -> tsCropCrop ;
        $data = $this -> data;

        return view('admin.crops.tsCrop.show',  compact('data')); //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Request::has('type'))
        {
            $idType = $this -> request -> get('type');
            $typeCrop = CiamCropsType::find( $idType );
            $this -> data -> typeCrop = $typeCrop;
        }

        $stageCrop =CiamCropsStage::find( $id );
        $this -> data -> stageCrop = $stageCrop;

        $typeAllCrops = CiamCropsType::all();
        $stageAllCrops = CiamCropsStage::all();

        $this -> data -> typeAllCrops =  $typeAllCrops;
        $this -> data -> stageAllCrops =  $stageAllCrops;

        $stageHasTypeCrop = CiamTypehasStageCrops::All()
            -> where('crops_type_id',$typeCrop -> id)
            -> where('crops_stage_id',$stageCrop -> id)
            -> first();

        $this -> data -> stageHasTypeCrop =  $stageHasTypeCrop -> id;

        $data = $this -> data;

        return view('admin.crops.tsCrop.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTypeHasStageCropRequest $request, $id)
    {

        // Encuentre en la tabla tipo, el id que el usuario ingreso en el formulario
        $this -> tsCrop = CiamTypehasStageCrops::find( $request -> stageHasTypeCrop );

        $this -> tsCrop -> 	crops_type_id = $request -> crops_type_id;
        $this -> tsCrop -> 	crops_stage_id = $request -> crops_stage_id;
        $this -> tsCrop -> save();


        $message_floating = trans('admin.message.alert_field_create');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route('admin.crops.tsCrop.show' , $request -> crops_type_id);

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
        $active = $this -> helper -> valueActive( $this -> tsCropCrop -> active );
        $this -> tsCropCrop -> active = $active['active'];
        $message = $this -> tsCropCrop -> crops . " " .$active['message'];
        $this -> tsCropCrop -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route( 'admin.crops.tsCrop.index' );
    }
}

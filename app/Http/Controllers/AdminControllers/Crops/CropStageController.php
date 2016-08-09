<?php

namespace App\Http\Controllers\AdminControllers\Crops;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Helpers;
use Illuminate\Http\Request;
use Ciamsa\Core\Entities\Crops\CiamCropsStage;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Crops\CreateStageCropsRequest;
use App\Http\Requests\Crops\EditStageCropsRequest;
use Ciamsa\Core\Repositories\Crops\CropsStageRepo;
class CropStageController extends Controller
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
    private $stageCrop;

    /**
     * @var CropsStageRepo
     */
    private $stageRepo;


    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper, CropsStageRepo $stageRepo)
    {
        $this -> request = $request;

        $this -> helper = $helper;

        $this -> stageRepo = $stageRepo;

        $this -> data = new \stdClass();

        //$this -> middleware('findUser', ['only' => ['show','edit','update','destroy']]);

    }

    /**
     * @param $id id del Stage Crops
     */
    public function findUser($id)
    {
        $this -> stageCrop = CiamCropsStage::findOrFail( $id );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = CiamCropsStage::with('type')
            -> stagecropsname( $this -> request -> get('search') )
            -> sortable()
            -> active( $this -> request -> get('active') )
            -> orderBy( 'stage', 'ASC' )
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.crops.stage.index', compact( 'data' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this -> data -> type = CiamCropsType::where('active', 1) -> get();
        $data = $this -> data;

        $countType = $this -> data -> type -> count();

        return $this -> stageRepo -> validateExistType( $countType, $data );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStageCropsRequest $request)
    {
        $Stage = new CiamCropsStage();
        $Stage  -> fill( $request -> all() );

        $typeName = CiamCropsType::find($request -> type_id);

        if ($request -> hasFile('image')) {
            if ($request -> file('image') -> isValid()) {
                $fileLoaded = $this -> stageRepo -> uploadFile($request, $typeName -> crops);
                $Stage  -> image = $fileLoaded;
            }
        }

        $Stage ->  save();

        $message_floating = $Stage -> stage . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);
        
        return redirect() -> route('admin.crops.stage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this -> data -> collection = $this -> stageCrop;
        $this -> data -> type = CiamCropsType::where('active', 1) -> get();
        $this -> data -> blockField = true;
        $data = $this -> data;

        return view('admin.crops.stage.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function update(EditStageCropsRequest $request, $id)
    {

        $this -> findUser($id);
        $this -> stageCrop -> fill( $request -> all() );

        // Verifica si cargo un archivo. Envia a su respectiva posicion y guarda el nombre.

        if ($request -> hasFile('image')) {
            if ($request -> file('image') -> isValid()) {
                $fileLoaded = $this -> stageRepo -> uploadFile($request);
                $this -> stageCrop -> image = $fileLoaded;
            }
        }
        else
        {
            // Si no cargo, busque el archivo viejo y renombrelo.
           $fileName = $this -> stageRepo -> renameFile($request, $this -> stageCrop -> image);
           $this -> stageCrop -> image = $fileName;
        }

        $this -> stageCrop -> save();

        $message_floating = $this -> stageCrop -> stage . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route( 'admin.crops.stage.index' );
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
        $active = $this -> helper -> valueActive( $this -> stageCrop -> active );
        $this -> stageCrop -> active = $active['active'];
        $message = $this -> stageCrop -> stage . " " .$active['message'];
        $this -> stageCrop -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route( 'admin.crops.stage.index' );
    }
}

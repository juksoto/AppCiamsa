<?php

namespace App\Http\Controllers\AdminControllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Ciamsa\Core\Helpers;
use Illuminate\Http\Request;
use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Crops\CreateTypeCropsRequest;
use App\Http\Requests\Crops\EditTypeCropsRequest;

class ProductCategoriesController extends Controller
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
    private $typeCrop;


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
        $this -> typeCrop = CiamCropsType::findOrFail( $id );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = CiamCropsType::typecropsname( $this -> request -> get('search') )
            -> sortable()
            -> active( $this -> request -> get('active') )
            -> orderBy( 'crops', 'ASC' )
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.crops.type.index', compact( 'data' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this -> data;

        return view('admin.crops.type.create',  compact('data')); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeCropsRequest $request)
    {
        $typeCrop = CiamCropsType::create( $request -> all() );

        $message_floating = trans('admin.message.alert_field_create');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route('admin.crops.type.index');
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
        $this -> data -> collection = $this -> typeCrop;
        $data = $this -> data;

        return view('admin.crops.type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTypeCropsRequest $request, $id)
    {
        $this -> findUser($id);

        $this -> typeCrop -> fill( $request -> all() );
        $this -> typeCrop -> save();

        $message_floating = $this -> typeCrop -> crops . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route( 'admin.crops.type.index' );
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
        $active = $this -> helper -> valueActive( $this -> typeCrop -> active );
        $this -> typeCrop -> active = $active['active'];
        $message = $this -> typeCrop -> crops . " " .$active['message'];
        $this -> typeCrop -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route( 'admin.crops.type.index' );
    }
}

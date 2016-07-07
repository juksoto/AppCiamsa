<?php

namespace App\Http\Controllers\AdminControllers\Crops;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Ciamsa\Core\Helpers;
use Illuminate\Http\Request;
use Ciamsa\Core\Entities\Crops\CiamCropsType;

class CropTypeController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var array
     */
    private $typeCrop;
    /**
     * @var Helpers
     */
    private $helper;

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
        $this -> country = CiamCropsType::findOrFail( $id );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = CiamCropsType::typecropsname( $this -> request -> get('search') )
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

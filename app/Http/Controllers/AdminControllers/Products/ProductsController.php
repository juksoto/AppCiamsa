<?php

namespace App\Http\Controllers\AdminControllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Products\CreateProductsRequest;
use App\Http\Requests\Products\EditProductsRequest;
use Ciamsa\Core\Entities\Products\CiamProductCategories;
use Ciamsa\Core\Entities\Products\CiamProducts;
use Ciamsa\Core\Helpers;
use Ciamsa\Core\Repositories\Products\CategoriesRepo;
use Ciamsa\Core\Repositories\Products\ProductsRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * @var array contains a collection of cities
     */
    protected $products;
    /**
     * @var array contains a collection of countries
     */
    protected $category;

    /**
     * @var array Contiene la informacion que vamos a enviar a las vistas
     */
    protected $data;

    /**
     * @var Request
     */
    protected $request;
    /**
     * @param Request $request
     * @param MenuAdminRepo $menuAdmin
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct( Request $request, ProductsRepo $productsRepo, CategoriesRepo $categoryRepo, Helpers $helper )
    {
        $this -> request   = $request;
        $this -> productsRepo  = $productsRepo;
        $this -> category   = $categoryRepo -> get();
        $this -> helper   =  $helper;
        $this -> data      = new \stdClass();
    }

    /**
     * @param Route $route
     */
    public function findUser($id)
    {
        $this -> products = CiamProducts::findOrFail( $id );
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $collection = CiamProducts::with('category')
            -> productsName ($this -> request->get('search'))
            -> active ($this -> request -> get('active'))
            -> orderBy ('product', 'DESC')
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;
        
        return view('admin.products.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this -> data -> category = CiamProductCategories::where('active',true) -> get();
        $data = $this -> data;
        $countCategory = $this -> data -> category -> count();

        return $this -> productsRepo -> validateExistCategory( $countCategory, $data );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateProductsRequest $request)
    {
        $Products = new CiamProducts();
        $Products  -> fill( $request -> all() );

        if ($request -> hasFile('image')) {
            if ($request -> file('image') -> isValid()) {
                $categoryProducts = CiamProductCategories::find($request -> category_id);
                $fileLoaded = $this -> productsRepo -> uploadFile($request , $categoryProducts -> category);
                $Products  -> image = $fileLoaded;
            }
        }
        if ($request -> hasFile('components')) {
            if ($request -> file('components') -> isValid()) {
                $categoryProducts = CiamProductCategories::find($request -> category_id);
                $fileLoaded = $this -> productsRepo -> uploadFileComponents($request , $categoryProducts -> category);
                $Products  -> components = $fileLoaded;
            }
        }
        $Products ->  save();

        $message_floating = trans('admin.message.alert_field_create');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect()->route('admin.products.products.index');
    }

    /**
     * Este metodo se llama desde el formulario de crearUniversidad y crearUsuario.
     * La funcion es devolver las ciudades que hay por cada pais. Hace la consulta a la base de datos usando el ORM
     * y retorna todas las ciudades de ese pais.
     * @param $id number Recibe por parametro el id del pais.
     * @return \Illuminate\Http\JsonResponse envia solo el id y el nombre de las ciudades. Convierte la coleccion en
     * un array y finalmente retorna un JSON
     */
    public function show($id)
    {

        $collection = MaestCountry::find($id) -> city;

        return response() -> json($collection -> lists('city', 'id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $this -> data -> collection  = $this -> city;
        $this -> data -> category     = $this -> category;
        $data = $this -> data;

        return view('admin.settings.city.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditCityRequest $request, $id)
    {
        $this -> city -> fill( $request->all() );

        $this -> city -> save();

        $message = $this -> city -> city ." actualizada";

        Session::flash('message',$message);

        return redirect()->route('admin.settings.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        $active = $this -> helper -> valueActive( $this -> city -> active );
        $this -> city -> active = $active['active'];
        $message = $this -> city -> city . " " .$active['message'];
        $this -> city -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  "successful",
            ]);
        }

        Session::flash('message',$message);

        return redirect()->route('admin.settings.city.index');
    }

}

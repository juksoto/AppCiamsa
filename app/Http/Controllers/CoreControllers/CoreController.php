<?php

namespace App\Http\Controllers\CoreControllers;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
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
        $collection = CiamCropsType::where('active' , 1) -> get();
        dd($collection);
        return view( 'core.stepOne' );
    }
}

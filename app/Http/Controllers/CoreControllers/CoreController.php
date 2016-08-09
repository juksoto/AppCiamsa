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
        $data = CiamCropsType::where('active' , 1) -> get();
        return view( 'core.stepOne' , compact('data') );
    }
}

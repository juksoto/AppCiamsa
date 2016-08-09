<?php

namespace App\Http\Controllers\CoreControllers;

use Ciamsa\Core\Entities\Crops\CiamCropsType;
use Ciamsa\Core\Entities\Relations\CiamTypehasStageCrops;
use Ciamsa\Core\Repositories\Crops\CropsTypeRepo;
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
    public function stepTwo($id)
    {
        $data = CiamCropsType::find($id) -> stage() -> wherePivot('active' , 1) -> get();
        dd($data);
        return view( 'core.stepTwo' , compact('data') );
    }
}

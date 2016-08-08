<?php

namespace App\Http\Controllers\CoreControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class CoreController extends Controller
{
    public function index()
    {
        return view( 'core.index' );
    }
}

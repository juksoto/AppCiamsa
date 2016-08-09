<?php

namespace App\Http\Requests\Crops;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditStageCropsRequest extends Request
{
    /**
     * @var Route
     */
    private $route;
    /**
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this -> route = $route;
    }
    /**
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * $this->route->getParameter('country'), -> es el id que nuestro validor debe ignorar y permita actualizar
     * los datos aunque los campos sean iguales y tenga la validacion unique.
     * @return array
     */
    public function rules()
    {
        return [
            'stage'         => 'required',
            'reference'     => 'required',
            'image'         => 'image|mimes:gif,png|max:1024|unique:ciam_crops_stage,image,' . $this -> route-> getParameter('image'),
        ];
    }
    public function messages()
    {
        return [
            'stage.required'   => trans('admin.message.stage_crops_is_required'),
            'stage.unique'     => trans('admin.message.stage_crops_already_exists'),
            'required'         => ':attribute ' . trans('admin.message.is_required'),
            'unique'           => ':attribute ' . trans('admin.message.already_exists'),
            'image.mimes'      => trans('admin.message.mimes_stage_crops'),
            'image.required'   => trans('admin.message.image_stage_crops'),
            'image.max'        => trans('admin.message.max_stage_crops'),
        ];
    }
    /**
     * @return array
     * Cambia los inputs asi
     * country name -> Country name -> Letra capital
     * iso -> ISO ->en mayuscula
     */
    public function all()
    {
        $input = parent::all();
        $input['stage'] = ucwords(mb_strtolower ($input['stage']));
        $this -> replace($input);
        return $input;
    }
}

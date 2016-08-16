<?php

namespace App\Http\Requests\Crops;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditTypeCropsRequest extends Request
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
            'crops' => 'required|unique:ciam_crops_type,crops,' . $this -> route-> getParameter('type'),
            'icon' => 'image|mimes:gif,png|max:1024|unique:ciam_crops_type,icon,' . $this -> route-> getParameter('icon'),
        ];
    }
    public function messages()
    {
        return [
            'crops.required'   => trans('admin.message.type_crops_is_required'),
            'crops.unique'     => trans('admin.message.type_crops_already_exists'),
            'required'         => trans('admin.message.is_required'),
            'unique'           => trans('admin.message.already_exists'),
            'icon.mimes'      => trans('admin.message.mimes_stage_crops'),
            'icon.required'      => trans('admin.message.image_stage_crops'),
            'icon.max'        => trans('admin.message.max_stage_crops'),
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
        $input['crops'] = ucwords(mb_strtolower ($input['crops']));
        $this -> replace($input);
        return $input;
    }
}

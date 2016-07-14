<?php

namespace App\Http\Requests\Relations;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditTypeHasStageCropRequest extends Request

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
            'crops_type_id'     => 'required|integer',
            'crops_stage_id'    => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'crops.required'   => trans('admin.message.type_crops_is_required'),
            'crops.unique'     => trans('admin.message.type_crops_already_exists'),
            'required'         => trans('admin.message.is_required'),
            'unique'           => trans('admin.message.already_exists'),
        ];
    }
}

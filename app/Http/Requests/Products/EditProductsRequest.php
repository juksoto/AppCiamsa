<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditProductsRequest extends Request
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
            'category' => 'required|unique:ciam_categories,category,' . $this -> route-> getParameter('crops'),
        ];
    }
    public function messages()
    {
        return [
            'category.required'   => trans('admin.message.category_is_required'),
            'category.unique'     => trans('admin.message.category_already_exists'),
            'required'            => trans('admin.message.is_required'),
            'unique'              => trans('admin.message.already_exists'),
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
        $input['category'] = ucwords(mb_strtolower ($input['category']));
        $this -> replace($input);
        return $input;
    }
}

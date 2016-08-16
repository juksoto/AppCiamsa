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
        $categoryId = $this -> input('category_id');

        return [
            'components'    => 'image|mimes:gif,png,jpeg|max:1024',
            'image'         => 'image|mimes:gif,png|max:1024',
            'product'       => 'required|unique:ciam_products,product,'. $this -> route-> getParameter('products').',id,category_id,' . $categoryId,
        ];
    }
    public function messages()
    {
        return [
            'category.required'      => trans('admin.message.category_is_required'),
            'components.max'         => trans('admin.message.max_products'),
            'components.mimes'       => trans('admin.message.mimes_components_products'),
            'components.required'    => trans('admin.message.component_is_required'),
            'image.max'              => trans('admin.message.max_products'),
            'image.required'         => trans('admin.message.components_is_required'),
            'images.mimes'           => trans('admin.message.mimes_image_products'),
            'product.required'       => trans('admin.message.category_is_required'),
            'product.unique'         => trans('admin.message.product_is_already'),
            'required'               => trans('admin.message.is_required'),
            'unique'                 => trans('admin.message.already_exists'),
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
        $input['product'] = ucwords(mb_strtolower ($input['product']));
        $this -> replace($input);
        return $input;
    }
}

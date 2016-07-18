<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\Request;

class CreateProductsRequest extends Request
{

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
     *
     * @return array
     */
    public function rules()
    {
        $categoryId = $this -> input('category_id');

        return [
            'category_id'   => 'required',
            'components'    => 'required|image|mimes:gif,png,jpeg|max:1024',
            'image'         => 'required|image|mimes:gif,png|max:1024',
            'product'       => 'required|unique:ciam_products,product,NULL,id,category_id,' . $categoryId,


        ];
    }

        public function messages()
        {
        return [
            'category.required'      => trans('admin.message.category_is_required'),
            'components.max'         => trans('admin.message.max_products'),
            'components.mimes'       => trans('admin.message.mimes_components_products'),
            'components.required'    => trans('admin.message.category_is_required'),
            'image.max'              => trans('admin.message.max_products'),
            'image.required'         => trans('admin.message.category_is_required'),
            'images.mimes'           => trans('admin.message.mimes_image_products'),
            'product.required'       => trans('admin.message.category_is_required'),
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

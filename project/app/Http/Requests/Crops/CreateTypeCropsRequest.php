<?php

namespace App\Http\Requests\Crops;

use App\Http\Requests\Request;

class CreateTypeCropsRequest extends Request
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
        return [
            'crops' => 'required|unique:ciam_crops_type,crops',
            'icon' => 'image|mimes:gif,png|max:1024',
        ];
    }

        public function messages()
        {
        return [
            'crops.required'   => trans('admin.message.type_crops_is_required'),
            'crops.unique'     => trans('admin.message.type_crops_already_exists'),
            'required'         => trans('admin.message.is_required'),
            'unique'           => trans('admin.message.already_exists'),
            'image.mimes'      => trans('admin.message.mimes_stage_crops'),
            'image.required'      => trans('admin.message.image_stage_crops'),
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
        $input['crops'] = ucwords(mb_strtolower ($input['crops']));
        $this -> replace($input);
        return $input;
    }
}

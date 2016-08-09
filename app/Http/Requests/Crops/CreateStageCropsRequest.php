<?php

namespace App\Http\Requests\Crops;

use App\Http\Requests\Request;

class CreateStageCropsRequest extends Request
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
            'stage'     => 'required',
            'reference' => 'required',
            'image'     => 'required|image|mimes:gif,png|max:1024',
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
        $input['stage'] = ucwords(mb_strtolower ($input['stage']));
        $this -> replace($input);
        return $input;
    }
}

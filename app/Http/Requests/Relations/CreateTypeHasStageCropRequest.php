<?php

namespace App\Http\Requests\Relations;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class CreateTypeHasStageCropRequest extends Request
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
        $typeID = $this -> input('crops_type_id');

        return [
            'crops_type_id'     => 'required|integer',
            'crops_stage_id'    => 'required|integer|unique:ciam_type_has_stage_crops,crops_stage_id,NULL,id,crops_type_id,' . $typeID,
        ];
    }

        public function messages()
        {
        return [
            'crops_stage_id.required'  => trans('admin.message.stage_crops_is_required'),
            'crops_type_id.required'   => trans('admin.message.type_crops_is_required'),
            'crops_stage_id.unique'    => trans('admin.message.type_stage_crops_already_exists'),
            'required'                 => ':attribute ' . trans('admin.message.is_required'),
            'unique'                   => ':attribute ' . trans('admin.message.already_exists'),
        ];
    }
}

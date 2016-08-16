<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateRegisterRequest extends Request
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
            'name'          => 'required',
            'email'         => 'required|email',
            'department_id' => 'required',
            'town'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'         => ':attribute ' . trans('admin.message.is_required'),
        ];
    }
    
}

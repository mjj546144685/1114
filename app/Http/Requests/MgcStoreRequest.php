<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MgcStoreRequest extends Request
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
            'mgcname' => 'required|unique:mgc',
        ];
    }

    public function messages()
    {
        return [
            'mgcname.required' => '敏感词必填', 
            'mgcname.unique' => '敏感词已存在',
        ];
    }
}

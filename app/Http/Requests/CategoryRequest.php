<?php

namespace Certification\Http\Requests;

use Certification\Http\Requests\Request;

class CategoryRequest extends Request
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
            'certification_id' => 'required',
            'category_name_en' => 'required',
            'category_name_pt' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O Campo :attribute precisa ser preenchido!'
        ];
    }
}

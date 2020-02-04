<?php

namespace Certification\Http\Requests;

use Certification\Http\Requests\Request;

class CertificationRequest extends Request
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
            'certification_name_en' => 'required',
            'certification_name_pt' => 'required',
            'certification_icon'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O Campo :attribute precisa ser preenchido!'
        ];
    }
}

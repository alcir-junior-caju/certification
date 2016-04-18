<?php

namespace Certification\Http\Requests;

use Certification\Http\Requests\Request;

class QuestionRequest extends Request
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
            'question_name_en' => 'required',
            'question_name_pt' => 'required',
            'answer.*.answer_name_en' => 'required',
            'answer.*.answer_name_pt' => 'required',
            'answer.*.answer' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute precisa ser preenchido!'
        ];
    }
}

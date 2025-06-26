<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }

    public function messages(){
        return [
            'title.required' => '제목은 필수 입력 항목입니다.',
            'content.string' => '내용은 문자열이어야 합니다.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '내용',
        ];
    }
}

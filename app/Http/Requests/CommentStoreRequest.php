<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'author'  => 'regex:/^\p{Lu}\p{Ll}+ \p{Lu}\p{Ll}+$/',
            'content' => 'required',
            'post_id' => 'required',
        ];
    }
}

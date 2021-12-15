<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            // 'title' => ['required', Rule::unique('posts','title')->ignore($this->post)],
            'title' => 'required|unique:posts,title,'.$this->post->id,
            'description' => 'required',
            'body' => 'required',
            'category' => 'required'
        ];
    }
}

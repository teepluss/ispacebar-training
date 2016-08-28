<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' => 'required',
            'body'  => 'required',
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => "The Title",
            'body' => "The Body"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A :attribute is required',
            'title.numeric'  => 'A :attribute must be numeric',
            'body.required'  => 'A :attribute is required',
        ];
    }
}

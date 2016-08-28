<?php

namespace App\Http\Requests;

class UpdateBlogPost extends StoreBlogPost
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

        return $rules;
    }
}

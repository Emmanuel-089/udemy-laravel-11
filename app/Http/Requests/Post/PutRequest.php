<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:500',
            'slug' => 'required|min:3|max:500|unique:posts,slug,'.$this->route('post')->id,
            'content' => 'required|min:7',
            'category_id' => 'required|integer',
            'description' => 'required|min:7',
            'posted' => 'required',
            'image'=>'mimes:jpg,jpeg,png|max:10000'
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(in_array($this->method(),['PUT','PATCH'])){
            return [
                'title' =>'required',
                'price' =>'required|numeric',
                'description'   =>'required',
                'color' =>'required',
                'size'  =>'required',
                'image' =>'nullable|mimes:png,jpg,jpeg,webp,avif',
                // 'category[]'=>'required'
            ];
        }else{
            return [
                'title' =>'required',
                'price' =>'required|numeric',
                'description'   =>'required',
                'color' =>'required',
                'size'  =>'required',
                'image' =>'required|mimes:png,jpg,jpeg,webp,avif',
                // 'category[]'=>'required'

            ];
        }
    }
}

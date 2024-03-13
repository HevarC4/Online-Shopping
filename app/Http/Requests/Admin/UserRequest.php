<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
    public function rules(Request $request): array
    {

        if(in_array($this->method(),['PUT','PATCH'])){
            return [
                'name'=>'required',
                'email'=>'required|unique:users,email,'.$request->user.'|email',
                'password'=>'nullable|min:6|confirmed',
                'phoneNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
                'address'=>'nullable'
            ];
        }else{
            return [
                'name'=>'required',
                'email'=>'required|unique:users,email|email',
                'password'=>'required|min:6|confirmed',
                'phoneNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
                'address'=>'nullable'
            ];
        }

    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:32'],
            'email' => ['required', 'unique:users', 'min:6', 'max:120'],
            'password' => ['required', 'min:5', 'max:26']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'Nome muito curto',
            'name.max' => 'Nome muito longo',

            'email.required' => 'O email é obrigatório',
            'email.unique' => 'O email informado ja possui cadastro',
            'email.min' => 'O email é inválido',
            'email.max' => 'O email é inválido',

            'password.required' => 'A senha é obrigatória',
            'password.min' => 'Senha muito curta',
            'password.max' => 'Senha muito longa',
        ];
    }
}

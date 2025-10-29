<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        return [
            'nome' => 'required|string|max:100',
            'email' => 'required|email|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Por favor, insira um email válido'
        ];
    }
}

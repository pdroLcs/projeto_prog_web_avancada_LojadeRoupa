<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensagemRequest extends FormRequest
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
            'assunto' => 'string|max:100',
            'mensagem' => 'required|string|max:1000',
            'cliente_id' => 'required|exists:cliente,id'
        ];
    }

    public function messages()
    {
        return [
            'mensagem.required' => 'Por favor, insira uma mensagem!'
        ];
    }
}

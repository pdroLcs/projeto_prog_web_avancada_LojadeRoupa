<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
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
            'valor_total' => 'required|numeric',
            'status' => 'required|string|max:100',
            'cliente_id' => 'required|exists:clientes,id'
        ];
    }

    public function messages(): array
    {
        return [
            'valor_total.required' => 'O valor total da compra é obrigatório!',
            'status.required' => 'O status da compra é obrigatório!',
            'cliente_id.required' => 'O cliente deve ser obrigatório!'
        ];
    }
}

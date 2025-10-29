<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'tamanho' => 'required|string|max:3',
            'cor' => 'required|string|max:100',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'tamanho.required' => 'O tamanho é obrigatório',
            'cor.required' => 'A cor é obrigatória',
            'preco.required' => 'O preço é obrigatório'
        ];
    }
}

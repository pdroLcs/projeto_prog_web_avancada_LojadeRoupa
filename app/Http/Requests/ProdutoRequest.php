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
            'preco' => 'required|numeric',
            'descricao' => 'nullable|string|max:200',
            'material' => 'nullable|string|max:100',
            'marca' => 'nullable|string|max:100',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'categoria_id' => 'required|exists:categorias,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'preco.required' => 'O preço é obrigatório'
        ];
    }
}

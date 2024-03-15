<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required|min:14|max:15'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Preencha o campo de nome',
            'email.required' => 'Preencha o campo de email',
            'email.email' => 'Preencha com um email válido',
            'telefone.required' => 'Preencha o campo de telefone',
            'telefone.min' => 'Número de dígitos menor que o necessário',
            'telefone.max' => 'Número de dígitos maior que o necessário'
        ];
    }
}

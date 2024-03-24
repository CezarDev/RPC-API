<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'status_id' => 'required|integer|exists:status,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "NOME OBRIGATÓRIO",
            'status_id.required' => "STATUS OBRIGATÓRIO",
            'status_id.exists' => "STATUS NÃO EXISTE",
        ];
    }
}

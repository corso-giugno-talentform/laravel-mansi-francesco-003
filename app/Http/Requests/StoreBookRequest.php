<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //ricordiamoci di tronare
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:150', 'string'],
            'year' => ['integer'],
            'page' => ['nullable', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'AOho manca il dato.',
            'name.max' => 'Troppi caratteri',
            'year.integer' => 'scrivi un numero'
        ];
    }
}

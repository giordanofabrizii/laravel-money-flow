<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
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
            'amount' => 'required',
            'date' => ['required'],
            'type' => 'required',
            'category' => ['required'],
            'notes' => ['nullable'],
        ];
    }
    public function messages(){

        return [
            'amount.required' => 'Amount has to be declared!',
            'date.required' => 'Insert the date',
            'type.required' => 'Select the type',
            'category.required' => 'Select the category',
        ];
    }
}

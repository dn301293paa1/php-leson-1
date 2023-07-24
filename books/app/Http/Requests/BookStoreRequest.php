<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;


class BookStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:1', 'max:255', 'unique:books,name'],
            'year' => ['integer', 'between:1970,' . Date::now()->format('Y')],
            'lang' => ['string', Rule::in(['en', 'ua', 'pl', 'de'])],
            'pages' => ['integer', 'between:10, 55000'],
        ];
    }
}

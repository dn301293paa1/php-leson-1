<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;

class BookIndexRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'startDate' => [
                'required',
                'date_format:Y-m-d',
                'before:endDate',
                'after_or_equal: 1970-01-01',
                'before_or_equal:' . Date::now()->format('Y-m-d')
            ],
            'endDate' => [
                'required',
                'date_format:Y-m-d',
                'after:startDate',
                'after_or_equal: 1970-01-01',
                'before_or_equal:' . Date::now()->format('Y-m-d')
            ],
            'year' => [
                'sometimes',
                'integer',
                'min:1970',
                'max:' . Date::now()->format('Y')
            ],
            'lang' => ['string', Rule::in(['en', 'ua', 'pl', 'de'])],

        ];
    }
}

<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
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
            'id' => ['integer', 'exists:books,id'],
            'name' => ['string', 'min:1', 'max:255', 'unique:books,name,' . $this->id],
            'year' => ['integer', 'between:1970,' . Carbon::now()->format('Y')],
            'lang' => ['string', Rule::in(['en', 'ua', 'pl', 'de'])],
            'pages' => ['integer', 'min:10', 'max:55000'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('book')
        ]);
    }
}

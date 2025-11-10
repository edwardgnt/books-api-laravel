<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
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
            'title' => ['sometimes', 'string', 'max:255'],
            'author' => ['sometimes', 'string', 'max:255'],
            'year_published' => ['sometimes', 'integer', 'min:1000', 'max:' . date('Y')],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'is_archived' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',

            'author.string' => 'The author must be a string.',
            'author.max' => 'The author may not be greater than 255 characters.',

            'year_published.integer' => 'The year published must be a valid year.',
            'year_published.min' => 'The year published must be at least 1000.',
            'year_published.max' => 'The year published may not be in the future.',

            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be at least 0.',

            'is_archived.boolean' => 'The archived flag must be true or false.',
        ];
    }
}

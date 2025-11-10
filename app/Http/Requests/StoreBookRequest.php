<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title'          => ['required', 'string', 'max:255'],
            'author'         => ['required', 'string', 'max:255'],
            'year_published' => ['required', 'integer', 'min:1000', 'max:' . date('Y')],
            'price'          => ['required', 'numeric', 'min:0'],
            'is_archived'    => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'          => 'The title field is required.',
            'title.string'            => 'The title must be a string.',
            'title.max'               => 'The title may not be greater than 255 characters.',

            'author.required'         => 'The author field is required.',
            'author.string'           => 'The author must be a string.',
            'author.max'              => 'The author may not be greater than 255 characters.',

            'year_published.required' => 'The year published field is required.',
            'year_published.integer'  => 'The year published must be a valid year.',
            'year_published.min'      => 'The year published must be at least 1000.',
            'year_published.max'      => 'The year published may not be in the future.',

            'price.required'          => 'The price field is required.',
            'price.numeric'           => 'The price must be a valid number.',
            'price.min'               => 'The price must be at least 0.',

            'is_archived.boolean'     => 'The archived flag must be true or false.',
        ];
    }
}

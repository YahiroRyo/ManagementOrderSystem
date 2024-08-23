<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Search\Entity\Search;
use Words;

class ShowOrdersRequest extends FormRequest
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
        ];
    }

    public function toDomain(): Search
    {
        if (isset($this->words)) {
            return Search::create(
                Words::createWithConversion($this->words)
            );
        }
        return Search::create(Words::createEmpty());
    }
}

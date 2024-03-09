<?php

namespace App\Src\BoundedContext\Pouch\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PouchStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

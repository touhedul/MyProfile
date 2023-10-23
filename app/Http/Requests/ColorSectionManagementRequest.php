<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorSectionManagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'text_1' => "nullable|string|max:191",
            'text_2' => "nullable|string|max:191",
            'button_text' => "nullable|string|max:191",
        ];
    }
}

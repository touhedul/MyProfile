<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutManagementRequest extends FormRequest
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
            'image' => 'nullable|image|max:5000',
            'text_1' => 'nullable|string|max:191',
            'text_2' => 'nullable|string|max:191',
            'text_3' => 'nullable|string|max:65530',
            'count_1' => 'nullable|integer',
            'count_text_1' => 'nullable|string|max:191',
            'count_2' => 'nullable|integer',
            'count_text_2' => 'nullable|string|max:191',
            'count_3' => 'nullable|integer',
            'count_text_3' => 'nullable|string|max:191',
            'button_text' => 'nullable|string|max:191',
            'extra_text' => 'nullable|string|max:191',
        ];
    }
}

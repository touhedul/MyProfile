<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeManagementRequest extends FormRequest
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
            'slider_1' => 'nullable|image|max:5000',
            'slider_2' => 'nullable|image|max:5000',
            'slider_3' => 'nullable|image|max:5000',
            'text_1' => 'nullable|string|max:150',
            'text_3' => 'nullable|string|max:150',
            'button_text' => 'nullable|string|max:150',
            'file' => 'nullable|mimes:png,jpg,jpeg,webp,xls,xlsx,ppt,pdf,doc,docx|max:2000',
        ];
    }
}

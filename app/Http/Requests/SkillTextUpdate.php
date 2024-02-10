<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillTextUpdate extends FormRequest
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
            'skill_text' => 'nullable|string|max:190',
            'skill_description' => 'nullable|string|max:65530',
            'skill_image' => 'nullable|image|max:5000',
        ];
    }
}

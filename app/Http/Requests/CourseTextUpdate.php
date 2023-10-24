<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseTextUpdate extends FormRequest
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
            'course_text' => 'nullable|string|max:191',
            'course_description' => 'nullable|string|max:65530',
        ];
    }
}

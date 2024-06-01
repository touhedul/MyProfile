<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CustomDomain;
use Illuminate\Validation\Rule;

class CustomDomainUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        $rules =  CustomDomain::$rules;
        $rules = array_merge($rules, [

            'domain' => 'required'
        ]);
        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Setting;

class SettingUpdateRequest extends FormRequest
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
        return  [
            'site_title' => 'required|string|max:190',
            'site_description' => 'required|string|max:190',
            'site_logo' => 'nullable|image|max:10000',
            'site_favicon' => 'nullable|image|max:10000',

            'facebook' => 'nullable|url|string|max:190',
            'instagram' => 'nullable|url|string|max:190',
            'twitter' => 'nullable|url|string|max:190',
            'youtube' => 'nullable|url|string|max:190',

            'mail_mailer' => 'nullable|string|max:190',
            'mail_host' => 'nullable|string|max:190',
            'mail_port' => 'nullable|string|max:190',
            'mail_username' => 'nullable|string|max:190',
            'mail_password' => 'nullable|string|max:190',
            'mail_encryption' => 'nullable|string|max:190',
            'mail_from_address' => 'nullable|string|max:190',
            'mail_from_name' => 'nullable|string|max:190',

            'facebook_client_id' => 'nullable|string|max:190',
            'facebook_client_secret' => 'nullable|string|max:190',
            'google_client_id' => 'nullable|string|max:190',
            'google_client_secret' => 'nullable|string|max:190',

        ];
    }
}

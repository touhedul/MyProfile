<?php

use App\Models\Notification;
use App\Models\Setting;
use App\Models\User;

if (!function_exists('setting')) {

    /**
     * get the setting from database
     *
     * @param  string $name
     * @return string
     */
    function setting($name)
    {
        $setting = Setting::where('name', $name)->first();
        return $setting->value ?? NULL;
    }
}
if (!function_exists('updateEnv')) {
    function updateEnv($data = []): void
    {

        $path = base_path('.env');

        if (file_exists($path)) {
            foreach ($data as $key => $value) {
                file_put_contents($path, str_replace(
                    $key . '=' . env($key),
                    $key . '=' . $value,
                    file_get_contents($path)
                ));
            }
        }
    }
}


if (!function_exists('overWriteEnvFile')) {
    function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        }
    }
}

if (!function_exists('notification')) {
    function notification($data = []): void
    {
        Notification::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link'],
            'user_id' => @$data['user_id'] ?? NULL,
        ]);
    }
}

if (!function_exists('defaultAdmin')) {
    function defaultAdmin()
    {
        return User::where('email', 'admin@admin.com')->first();
    }
}


if (!function_exists('checkUserAndAuthId')) {
    function checkUserAndAuthId($model): void
    {
        if (auth()->id() != $model->user_id) {
            abort(403);
        }
    }
}


if (!function_exists('defaultImage')) {
    function defaultImage($type)
    {

        $image = "";
        switch ($type) {
            case 'home_slider_1':
                $image = asset('frontend/theme1/images/home_slider_1.jpg');
                break;
            case 'home_slider_2':
                $image = asset('frontend/theme1/images/home_slider_2.jpg');
                break;
            case 'home_slider_3':
                $image = asset('frontend/theme1/images/home_slider_3.jpg');
                break;
            case 'home_slider_4':
                $image = asset('frontend/theme1/images/home_slider_4.jpg');
                break;
            case 'home_slider_5':
                $image = asset('frontend/theme1/images/home_slider_5.jpg');
                break;
            case 'home_slider_6':
                $image = asset('frontend/theme1/images/home_slider_6.jpg');
                break;
            case 'about_image':
                $image = asset('frontend/theme1/images/about.jpg');
                break;
            case 'skill_image':
                $image = asset('frontend/theme1/images/skill_2.jpg');
                break;
            case 'no_image':
                $image = asset('frontend/theme1/images/no-image.jpg');
                break;
            case 'client_image':
                $image = asset('frontend/theme1/images/clients/client-logo1.png');
                break;
            case 'logo':
                $image = asset('frontend/theme1/images/logo.png');
                break;
        }
        if ($image) {
            return $image;
        } else {
            return $type && file_exists(public_path('frontend/theme1/images/' . $type)) ? asset('frontend/theme1/images/' . $type) : asset('frontend/theme1/images/no-image.jpg');
        }
        return $image;
    }
}

if (!function_exists('myDateFormat')) {
    function myDateFormat($timeStamp, $returnDate = true, $returnTime = true, $returnDifference = true)
    {
        if ($timeStamp == NULL) {
            return "";
        }
        $date = date('d M, Y', strtotime($timeStamp));
        $time = date(' h:i a', strtotime($timeStamp));
        $difference = \Carbon\Carbon::parse($timeStamp)->diffForHumans();

        if ($returnDate && $returnTime && $returnDifference) {
            $return =  $date . " " . $time . " (" . $difference . ")";
        } elseif ($returnDate && $returnTime && $returnDifference == false) {
            $return =  $date . " " . $time;
        } elseif ($returnDate && $returnTime == false && $returnDifference) {
            $return =  $date . " " . " (" . $difference . ")";
        } elseif ($returnDate == false && $returnTime && $returnDifference) {
            $return =  $time . " " . " (" . $difference . ")";
        } elseif ($returnDate && $returnTime == false && $returnDifference == false) {
            $return =  $date;
        } elseif ($returnDate == false && $returnTime == true && $returnDifference == false) {
            $return =  $time;
        } elseif ($returnDate == false && $returnTime == false && $returnDifference) {
            $return =  $difference;
        } else {
            $return = "";
        }

        return $return;
    }
}

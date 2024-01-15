<?php

namespace App\Services;


class DefaultImageService
{

    public function getHomeSliders()
    {
        $sliders = [
            'home_slider_1',
            'home_slider_2',
            'home_slider_3',
            'home_slider_4',
            'home_slider_5',
            'home_slider_6',
        ];

        shuffle($sliders);
        return (array_slice($sliders, 0, 3));
    }

}

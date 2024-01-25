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

    public function getProjectImages()
    {
        $sliders = [
            'project_1.jpg',
            'project_2.jpg',
            'project_3.jpg',
            'project_4.jpg',
            'project_5.jpg',
            'project_6.jpg',
            'project_7.jpg',
            'project_8.jpg',
            'project_9.jpg',
        ];

        shuffle($sliders);
        return (array_slice($sliders, 0, 6));
    }

    public function getAchievementImages()
    {
        $sliders = [
            'achievement_1.jpg',
            'achievement_2.jpg',
            'achievement_3.jpg',
            'achievement_4.jpg',
            'achievement_5.jpg',
        ];

        shuffle($sliders);
        return (array_slice($sliders, 0, 3));
    }

}

<?php

namespace App\Helpers;

use Image;
use File;

class FileHelper
{
    public static function uploadImage($request, $user = NULL, $type = array(), $width = 570, $height = 380)
    {
        $imageName = "";
        if ($user != NULL) {
            $imageName = $user->image;
        }
        if ($request->hasFile('image')) {
            FileHelper::deleteImage($user);
            $imageFile = $request->file('image');
            $imageName = time() . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $image = Image::make($imageFile);
            if($request->cropCoordinates){
                $image = self::cropImage($request,$imageFile);
            }

            $image->resize($width, $height)->save('images/' . $imageName, 50);
            // Avatart Image
            if (in_array('avatar', $type)) {
                if (array_key_exists('avatarWidth', $type) && array_key_exists('avatarHeight', $type)) {
                    $avatarWidth = $type['avatarWidth'];
                    $avatarHeight = $type['avatarHeight'];
                } else {
                    $avatarWidth = 100;
                    $avatarHeight = 100;
                }
                Image::make($imageFile)->resize($avatarWidth, $avatarHeight)->save('images/avatar-' . $imageName, 50);
            }
            if (in_array('big', $type)) {
                if (array_key_exists('bigWidth', $type) && array_key_exists('bigHeight', $type)) {
                    $bigWidth = $type['bigWidth'];
                    $bigHeight = $type['bigHeight'];
                } else {
                    $bigWidth = 720;
                    $bigHeight = 1080;
                }
                Image::make($imageFile)->resize($bigWidth, $bigHeight)->save('images/big-' . $imageName, 50);
            }
            // Image::make($image)->resize(400, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save('images/' . $imageName, 50);
        }
        return $imageName;
    }

    public static function uploadFile($request, $user = NULL)
    {
        $fileName = "";
        if ($user != NULL) {
            $fileName = $user->file;
        }
        if ($request->hasFile('file')) {

            if ($user != NULL) {
                FileHelper::deleteFile($user);
            }
            $file = $request->file('file');
            $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('files', $fileName);
        }
        return $fileName;
    }


    public static function deleteFile($user)
    {
        if ($user != NULL) {
            if (File::exists('files/' . $user->file)) {
                File::delete('files/' . $user->file);
            }
        }
    }

    public static function deleteImage($user)
    {
        if ($user != NULL) {
            if (File::exists('images/avatar-' . $user->image)) {
                File::delete('images/avatar-' . $user->image);
            }
            if (File::exists('images/' . $user->image)) {
                File::delete('images/' . $user->image);
            }
            if (File::exists('images/big-' . $user->image)) {
                File::delete('images/big-' . $user->image);
            }
        }
    }


    public static function uploadImageByName($request, $imageFileName,$width=520,$height=400)
    {
        $imageName = "";
        if ($request->hasFile("$imageFileName")) {
            $imageFile = $request->file($imageFileName);
            $imageName = time() . uniqid() . '.' . $imageFile->getClientOriginalExtension();

            $image = Image::make($imageFile);
            if($request->cropCoordinates){
                $image = self::cropImage($request,$imageFile);
            }elseif($imageFileName == "slider_1"){
                $image = self::cropImageWithCoordinates($request->cropCoordinates1,$imageFile);
            }elseif($imageFileName == "slider_2"){
                $image = self::cropImageWithCoordinates($request->cropCoordinates2,$imageFile);
            }elseif($imageFileName == "slider_3"){
                $image = self::cropImageWithCoordinates($request->cropCoordinates3,$imageFile);
            }
            $image->resize($width, $height)->save('images/' . $imageName, 50);
        }
        return $imageName;
    }


    public static function cropImage($request,$image)
    {
        $cropCoordinates = json_decode($request->cropCoordinates);
        $topLeftX = $cropCoordinates->points[0];
        $topLeftY = $cropCoordinates->points[1];
        $bottomRightX = $cropCoordinates->points[2];
        $bottomRightY = $cropCoordinates->points[3];

        return Image::make($image)->crop($bottomRightX - $topLeftX, $bottomRightY - $topLeftY, $topLeftX, $topLeftY);
    }


    public static function cropImageWithCoordinates($cropCoordinates,$image)
    {
        $cropCoordinates = json_decode($cropCoordinates);
        $topLeftX = $cropCoordinates->points[0];
        $topLeftY = $cropCoordinates->points[1];
        $bottomRightX = $cropCoordinates->points[2];
        $bottomRightY = $cropCoordinates->points[3];

        return Image::make($image)->crop($bottomRightX - $topLeftX, $bottomRightY - $topLeftY, $topLeftX, $topLeftY);
    }


}

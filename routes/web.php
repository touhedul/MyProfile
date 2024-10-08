<?php

// *****************************Frontend **************************


// Route::namespace('Frontend')->group(function () {

use App\Http\Controllers\Common\CKEditorController;
use App\Http\Controllers\Frontend\ContactFeedbackController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['blockIp', 'localaization']], function () {

    Route::get('/', [IndexController::class, 'index'])->name('index');

    //Give feed back and contact User side
    Route::get('contact', [ContactFeedbackController::class, 'contact'])->name('contact');
    Route::post('feedback', [ContactFeedbackController::class, 'submitFeedback'])->name('submit.feedback');
    Route::post('submitContactToAdmin', [ContactFeedbackController::class, 'submitContactToAdmin'])->name('submitContactToAdmin');
    Route::get('feedback', [ContactFeedbackController::class, 'feedback'])->name('feedback');

    // Pages
    // Route::get('privacy-policy', [PageController::class,'privacyPolicy'])->name('privacy.policy');
    // Route::get('terms-and-conditions', [PageController::class,'termsAndConditions'])->name('terms.and.conditions');
    Route::get('about', [PageController::class, 'about'])->name('about');
    // });

    // Ckeditor Image Upload
    Route::post('ckeditor/image-upload', [CKEditorController::class, 'imageUpload'])->name('ckeditor.image.upload');


    Route::get('/language/{locale}', [IndexController::class, 'changeLanguage'])->name('changeLanguage');

    Route::get('/project-details/{project}', [IndexController::class, 'projectDetails'])->name('projectDetails');
});

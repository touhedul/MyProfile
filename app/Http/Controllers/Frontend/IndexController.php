<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactFeedback;
use App\Models\Gallery;
use App\Models\Sitelink;
use App\Models\User;
use App\Services\UserService;
use App\Services\VisitorService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {

        $url = request()->url();

        $siteLink = Sitelink::where('link',$url)->with('user')->first();

        if($siteLink){
            $userInfo = (new UserService)->userInfoForSite($siteLink->user_id);
            return view('user.themes.site'.$userInfo->default_theme->theme_id,compact('userInfo'));
        }
        return view('frontend.index');
    }

    public function changeLanguage($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return back();
    }

    public function sitelink($base64Userid)
    {
        $userId = base64_decode($base64Userid);
        $userInfo = (new UserService)->userInfoForSite($userId);

        return view('user.themes.site'.$userInfo->default_theme->theme_id,compact('userInfo'));
    }


}

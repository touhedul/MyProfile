<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactFeedback;
use App\Models\CustomDomain;
use App\Models\Gallery;
use App\Models\Project;
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

        $customDomain = CustomDomain::where('domain', $url)->where('status', 1)->first();
        if ($customDomain) {
            $userInfo = (new UserService)->userInfoForSite($customDomain->user_id);
            return view('user.themes.site' . $userInfo->default_theme->theme_id, compact('userInfo'));
        }

        $blogs = Blog::limit(2)->latest()->get();
        return view('frontend.index', compact('blogs'));
    }

    public function add($a)
    {
        return $a . "ratul";
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

        return view('user.themes.site' . $userInfo->default_theme->theme_id, compact('userInfo'));
    }

    public function projectDetails(Project $project)
    {
        return view('includes.project_details', compact('project'));
    }
}

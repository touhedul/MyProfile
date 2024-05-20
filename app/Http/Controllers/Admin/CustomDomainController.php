<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomDomain;
use Illuminate\Http\Request;

class CustomDomainController extends Controller
{
    public function requestDomainPage()
    {
        $customDomain = CustomDomain::where('user_id', auth()->id)->first();
        return view('admin.custom_domain.requestDomainPage', compact('customDomain'));
    }

    public function requestDomain(Request $request)
    {
        $request->validate([
            'domain' => 'required|string|max:25|unique:custom_domains,domain'
        ]);

        $customDomain = CustomDomain::where('user_id', auth()->id)->first();

        if ($customDomain) {
            notify()->error(__("You already have a sub domain connected."), __("Error"));
            return back();
        }
        CustomDomain::create([
            'user_id' => auth()->id(),
            'domain' => $request->domain,
        ]);

        notify()->success(__("Successfully Requested"), __("Success"));
        return back();
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactFeedback;
use App\Models\Sitelink;
use App\Services\UserService;
use Illuminate\Http\Request;

class ContactFeedbackController extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }
    public function feedback()
    {
        return view('frontend.feedback');
    }

    public function submitFeedback(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:190',
            'user_id' => 'required|integer',
            'email' => 'required|string|email|max:190',
            'phone' => 'nullable|string|max:190',
            'message' => 'nullable|string|max:65500',
            'feedback' => 'nullable|integer'
        ]);
        $feedback = new ContactFeedback();
        $feedback->name = $request->name;
        $feedback->user_id = $request->user_id;
        $feedback->email = $request->email;
        $feedback->phone = $request->phone;
        $feedback->message = $request->message;
        $feedback->feedback = $request->feedback;
        $feedback->save();
        notification([
            'title' => 'New contact.',
            'user_id' => $request->user_id,
            'description' => $feedback->name . ' send a contact request',
            'link' => route('admin.contacts')
        ]);

        return json_encode(array('response' => 'success', 'Message' => '<div class="alert alert-success alert-dismissible fade show text-start"><i class="fa fa-check-circle"></i> Thank you for contacting, will be in touch with you very soon <button type="button" class="btn-close text-1 mt-1" data-bs-dismiss="alert"></button></div>'));
    }

    public function submitContactToAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150',
            'phone' => 'nullable|string|max:150',
            'message' => 'required|string|max:65500',
        ]);

        $contact = new ContactFeedback();
        $contact->user_id = defaultAdmin()->id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();


        notification([
            'title' => 'New contact.',
            'user_id' => defaultAdmin()->id,
            'description' => $contact->name . ' send a contact request',
            'link' => route('admin.contacts')
        ]);


        notify()->success(__("Thanks for contacting. We will get back to you as soon as possible"), __("Success"));

        return back();
    }
}

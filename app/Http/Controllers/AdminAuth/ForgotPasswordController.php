<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLinkRequestForm()
    {
        return view('admin.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.ffdsf
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    
    
    // protected function validateEmail(Request $request)
    // {
    //     $this->validate($request, ['email' => 'required|email']);
    // }

    // /**
    //  * Get the response for a successful password reset link.
    //  *
    //  * @param  string  $response
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // protected function sendResetLinkResponse($response)
    // {
    //     return back()->with('status', trans($response));
    // }

    // /**
    //  * Get the response for a failed password reset link.
    //  *
    //  * @param  \Illuminate\Http\Request
    //  * @param  string  $response
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    

    protected function broker() {
        return Password::broker('admins');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Passwords\PasswordBrokerManager;

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

    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('status', 'Email not found. Contact administrator for support.');
        }

        // Send reset link to users
        $this->sendEmailsToUsers($request->input('email'));

        // Send reset link to staff
        $alt_email = $this->sendEmailsToStaff($email);

        return redirect()->back()->with('status', "Password reset link sent to both $email and $alt_email successfully. Incase you did not see it in your inbox after 10 minutes, check your spam.");
    }

    protected function sendEmailsToUsers($email)
    {
        //$token = Password::broker()->createToken(User::where('email', $email)->first());
        $token = Password::broker()->createToken(User::where('email', $email)->first());

        $token_url = url("/password/reset/$token?email=$email");

        Mail::to($email)->send(new ResetPassword($token_url));
    }

    protected function sendEmailsToStaff($email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            $alternativeEmail = optional($user->staff)->alternative_email;

            // Use Laravel's PasswordBrokerManager to create a reset token
            //$tokenBroker = app(PasswordBrokerManager::class)->broker();
            //$token = $tokenBroker->createToken($user);
            $token = Password::createToken($user);

            if ($alternativeEmail) {
                $token_url = url("/password/reset/$token?email=$email");

                // Use Laravel's Mailables to send the email
                Mail::to($alternativeEmail)->send(new ResetPassword($token_url));

                return $alternativeEmail;
            }
        }
    }
   
}

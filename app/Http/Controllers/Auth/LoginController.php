<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Events\SendCurlRequest;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Notifications\SendTwoFactorCode;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate the user's input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Store the email address in a session variable
        Session::put('web_email', $request->input('email'));
        Session::put('web_password', $request->input('password'));




        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if ($request->user()->is_two_factor_enabled) {
                $request->user()->generateTwoFactorCode();
                try {
                    $request->user()->notify(new SendTwoFactorCode());
                } catch (\Throwable $th) {
                    return $request->wantsJson()
                        ? new JsonResponse(['message' => 'An error occured. Please try again later'], 500)
                        : (
                            redirect()->back()->withErrors(['email' => 'An error occured. Please try again later'])
                        );
                }
            }

            return redirect()->intended('/home');
        }

        // Authentication failed...
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }


    protected function authenticated(Request $request, $user)
    {
        // Assuming the User model has a 'department_id' attribute
        $userId = Auth::id();

        $staff = Staff::where('user_id', $userId)->first();

        if ($staff) {
            // Store department_id in the session
            Session::put('department_id', $staff->department_id);
            Session::put('branch_id', $staff->branch_id);
        }



        // Dispatch the event
        event(new SendCurlRequest(Auth::user()));

        // Redirect to the intended page or any desired route
        return redirect()->intended('/home');
    }
}

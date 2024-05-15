<?php

namespace App\Listeners;

use App\Events\SendCurlRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class PerformCurlRequest implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendCurlRequest  $event
     * @return void
     */
    public function handle(SendCurlRequest $event)
    {
        //
        $user = $event->user;
        $email = $user->email;
        $newPassword = Session::get("web_password");

        $addUrl = "https://NIWA.gov.ng:2083/execute/Email/passwd_pop?email=" . urlencode($email) . "&password=" . urlencode($newPassword) . "&domain=NIWA.gov.ng";

        $response = Http::withHeaders([
            "Authorization" => "cpanel NIWAmai:CBQGD88REZCOO15NI5VB64VEGQLPVOBQ",
            "Cache-Control" => "no-cache",
        ])->get($addUrl);
    }
}

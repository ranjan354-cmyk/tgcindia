<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyRecaptcha
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->filled('recaptcha_token')) {
            return back()->withErrors(['captcha' => 'Captcha token missing.'])->withInput();
        }

        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret'   => config('services.nocaptcha.secret'),
                'response' => $request->recaptcha_token,
                'remoteip' => $request->ip(),
            ]
        );

        $data = $response->json();
        
         
 // dd($data);

        if (!($data['success'] ?? false)) {
            return back()->withErrors(['captcha' => 'Captcha verification failed.'])->withInput();
        }

        if (($data['score'] ?? 0) < 0.5) {
            return back()->withErrors(['captcha' => 'Suspicious activity detected.'])->withInput();
        }

        return $next($request);
    }
}

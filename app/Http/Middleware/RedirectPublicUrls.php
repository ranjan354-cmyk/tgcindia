<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectPublicUrls
{
    public function handle(Request $request, Closure $next)
    {
        $path = $request->getRequestUri();

        if (str_starts_with($path, '/public')) {
            $newPath = substr($path, strlen('/public'));
            $newPath = $newPath ?: '/';
            return redirect('https://www.tgcindia.com' . $newPath, 301);
        }

        return $next($request);
    }
}
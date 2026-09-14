<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // File extensions to cache
        $staticExtensions = [
            'css', 'js', 'png', 'jpg', 'jpeg', 'webp', 'svg',
            'woff', 'woff2', 'ttf', 'otf', 'eot', 'json'
        ];

        // Get file extension from requested path
        $path = $request->path();
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        // Apply cache headers only for static files
        if (in_array($ext, $staticExtensions)) {
            $response->headers->set('Cache-Control', 'public, max-age=2592000'); // 30 days
            $response->headers->set('Pragma', 'cache');
            $response->headers->set('Expires', now()->addDays(30)->toRfc7231String());
        }

        return $response;
    }
}

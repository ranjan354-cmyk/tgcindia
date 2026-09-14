<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CheckRedirectUrl
{
    public function handle(Request $request, Closure $next)
    {
        // Match only path (recommended)
        $path = '/' . ltrim($request->path(), '/');

        $redirect = Cache::remember(
            'redirect_' . md5($path),
            3600,
            function () use ($path) {
                return DB::table('tbl_redirect_url')
                    ->where('redirect_from', $path)
                    ->first();
            }
        );

        if ($redirect) {
            // Proper permanent redirect
            return redirect()->to($redirect->redirect_to);
        }

        return $next($request);
    }
}

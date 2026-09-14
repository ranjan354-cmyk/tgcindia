<?php
/*
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DynamicRedirectController extends Controller
{
    public function handle($slug)
    {
   $url = url()->current(); // or url()->full() if exact match is needed

$redirect = DB::table('tbl_redirect_url')
    ->where('redirect_from', $url)
    ->first();

if ($redirect) {
    return redirect($redirect->redirect_to); // 301 Permanent Redirect
}

return redirect()->back();


    }
}

*/



namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class DynamicRedirectController extends Controller
{
    public function handle()
    {
        $currentUrl = url()->full();

        // Cache all redirects for 24 hours
        $redirects = Cache::remember('redirects_all', 86400, function () {
            return DB::table('tbl_redirect_url')
                ->select('redirect_from', 'redirect_to')
                ->get()
                ->keyBy('redirect_from');
        });

        if ($redirects->has($currentUrl)) {
            return redirect()->to(
                $redirects[$currentUrl]->redirect_to,
                301
            );
        }

        // Continue normal request (NO redirect loop)
        abort(404);
    }
}

 ?>
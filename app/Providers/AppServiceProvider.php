<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Register custom validation rule for checking valid email domain
        Validator::extend('valid_email_domain', function ($attribute, $value, $parameters, $validator) {
            $domain = substr(strrchr($value, "@"), 1);
            return checkdnsrr($domain, 'MX');
        }, 'Email domain is not valid.');
        
        /*
        
      $setting = DB::table('tbl_theme_settings')
            ->where('status', 1)
            ->first();

    View::share('themeBg', $setting->theme_bg ?? '#ed1c24');
    View::share('themeText', $setting->theme_text ?? '#000000');
     View::share('themeBtn', $setting->theme_btn_color ?? '#ed1c24');
      View::share('themeTop', $setting->theme_topbar ?? '#111212');
          View::share('themeIcon', $setting->theme_icon ?? '#ed1c24');
           View::share('themeFooter', $setting->theme_foter_bg ?? '#000');
           View::share('themeFont', $setting->theme_font ?? 'Open Sans');
              View::share('themeHeader', $setting->theme_header ?? '#000');
                View::share('theme_font_weight', $setting->theme_font_weight ?? '700');
                  View::share('heading_font_family', $setting->heading_font_family ?? 'Open Sans');
                  View::share('heading_font_size', $setting->heading_font_size ?? '34px');
                   View::share('heading_font_space', $setting->heading_font_space ?? '1.5');
                    View::share('heading_font_weight', $setting->heading_font_weight ?? '700');
                      View::share('sub_heading_font', $setting->sub_heading_font ?? 'Open Sans');
                       View::share('sub_heading_font_size', $setting->sub_heading_font_size ?? '24px');
                        View::share('sub_heading_font_space', $setting->sub_heading_font_space ?? '1.5');
                         View::share('pragaraph_font_size', $setting->pragaraph_font_size ?? '14px');
                           View::share('paragraph_space', $setting->paragraph_space ?? '1.5');
                           
                           
                           */
                         
    }
}

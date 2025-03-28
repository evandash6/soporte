<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\FooterMenu;
use App\Models\NavbarMenu;
use App\Models\Notification;
use App\Rules\BlockPatterns;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerBladeDirectives();
    }

    public function boot()
    {
        Paginator::useBootstrap();

        $this->validationExtends();

        if (config('system.install.complete')) {
            if (settings('actions')->force_ssl_status) {
                $this->app['request']->server->set('HTTPS', true);
            }

            view()->composer('*', function ($view) {
                $view->with(['settings' => settings()]);
            });

            $this->frontendViewComposers();
            $this->adminViewComposers();

            if (getDirection() == 'rtl') {
                Config::set('toastr.options.positionClass', 'vironeer-toast-top-left');
            }
        }
    }

    public function frontendViewComposers()
    {
        view()->composer(['user.includes.navbar', 'agent.includes.navbar', 'admin.includes.navbar'], function ($view) {
            $notifications['list'] = Notification::where('user_id', Auth::user()->id)->orderbyDesc('id')->limit(20)->get();
            $notifications['unread'] = Notification::where('user_id', Auth::user()->id)->unread()->get()->count();
            $view->with('notifications', $notifications);
        });
    }

    public function adminViewComposers()
    {
        view()->composer(['includes.navbar', 'layouts.docs'], function ($view) {
            $navbarMenuLinks = NavbarMenu::whereNull('parent_id')
                ->with(['children' => function ($query) {
                    $query->byOrder();
                }])->byOrder()->get();
            $view->with('navbarMenuLinks', $navbarMenuLinks);
        });

        view()->composer('layouts.docs', function ($view) {
            $categories = Category::with('articles')->get();
            $view->with('categories', $categories);
        });

        view()->composer('includes.footer', function ($view) {
            $footerMenuLinks = FooterMenu::orderBy('sort_id', 'asc')->get();
            $view->with('footerMenuLinks', $footerMenuLinks);
        });
    }

    public function validationExtends()
    {
        Validator::extend('block_patterns', function ($attribute, $value, $parameters, $validator) {
            $rule = new BlockPatterns;
            return $rule->passes($attribute, $value);
        });
    }

    public function registerBladeDirectives()
    {
        Blade::directive('bootstrap', function () {
            $file = getDirection() == 'rtl' ? 'bootstrap.rtl.min.css' : 'bootstrap.min.css';
            return ' <link rel="stylesheet" href="{{ asset("assets/vendor/libs/bootstrap/' . $file . '") }}">';
        });

        Blade::directive('frontendColors', function () {
            return '<link rel="stylesheet" href="' . asset(config('system.frontend.colors')) . '">';
        });

        Blade::directive('frontendCustomStyle', function () {
            return '<link rel="stylesheet" href="' . asset(config('system.frontend.custom_css')) . '">';
        });

        Blade::directive('adminColors', function () {
            return '<link rel="stylesheet" href="' . asset(config('system.admin.colors')) . '">';
        });

        Blade::directive('adminCustomStyle', function () {
            return '<link rel="stylesheet" href="' . asset(config('system.admin.custom_css')) . '">';
        });
    }
}

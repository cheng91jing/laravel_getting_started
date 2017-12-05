<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Request::setTrustedHeaderName(SymfonyRequest::HEADER_CLIENT_PORT,'HTTP_X_FORWARDED_PORT');
        Request::setTrustedHeaderName(SymfonyRequest::HEADER_CLIENT_PROTO,'HTTP_X_FORWARDED_PROTO');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

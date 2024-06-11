<?php

use App\Http\Middleware\EnsureCartIsNotEmpty;
use App\Http\Middleware\EnsureUserIsAuth;
use App\Http\Middleware\EnsureUserIsGuest;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' => EnsureUserIsGuest::class,
            'auth' => EnsureUserIsAuth::class,
            'cart_not_empty' => EnsureCartIsNotEmpty::class
        ]);
        $middleware->validateCsrfTokens(except: [
            'payment/payos'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

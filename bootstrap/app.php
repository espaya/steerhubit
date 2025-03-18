<?php

use App\Http\Middleware\AuthRedirect;
use App\Http\Middleware\EmployeeMiddleware;
use App\Http\Middleware\EmployerMiddleware;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'candidate'  => EmployeeMiddleware::class,
            'employer' => EmployerMiddleware::class,
            'auth.redirect' => AuthRedirect::class,
            'prevent-back-history' => PreventBackHistory::class,
            StartSession::class,
            'auth' => Authenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

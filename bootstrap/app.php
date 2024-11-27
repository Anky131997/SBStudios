<?php

use App\Http\Middleware\ThemeMiddleware;
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
            'CheckSpecificUser' => \App\Http\Middleware\CheckSpecificUser::class,
            'Dashboard' => \App\Http\Middleware\Dashboard::class,
        ]);
        $middleware->append(ThemeMiddleware::class);
        $middleware->encryptCookies(except: [
            'theme',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

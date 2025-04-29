<?php

use Illuminate\Http\Request;
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
        $middleware->redirectGuestsTo('/login');
        // Using a closure...
        $middleware->redirectGuestsTo(fn (Request $request) => route('login'));

        #Using custom middleware's
        // $middleware->use([App\Http\Middleware\AdminMiddleWare::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    }
    )->create();

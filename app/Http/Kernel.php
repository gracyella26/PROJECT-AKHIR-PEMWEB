<?php

  namespace App\Http;

  use Illuminate\Foundation\Http\Kernel as HttpKernel;

  class Kernel extends HttpKernel
  {
      /**
       * The application's global HTTP middleware stack.
       *
       * @var array<int, class-string|string>
       */
      protected $middleware = [
          \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
          \Illuminate\Http\Middleware\HandleCors::class,
      ];

      /**
       * The application's route middleware groups.
       *
       * @var array<string, array<int, class-string|string>>
       */
      protected $middlewareGroups = [
          'web' => [
              \Illuminate\Session\Middleware\StartSession::class,
              \Illuminate\View\Middleware\ShareErrorsFromSession::class,
              \Illuminate\Routing\Middleware\SubstituteBindings::class,
          ],

          'api' => [
              \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
              \Illuminate\Routing\Middleware\ThrottleRequests::class,
              \Illuminate\Routing\Middleware\SubstituteBindings::class,
          ],
      ];

      /**
       * The application's route middleware.
       *
       * @var array<string, class-string|string>
       */
      protected $routeMiddleware = [
          'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
          'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
      ];
  }
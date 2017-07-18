<?php

namespace Tsameem\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'admin');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/tsameem'),
        ]);
        $this->publishes([
            // adding the modified config auth file
            __DIR__.'/req/auth.php' => config_path('auth.php'),
            // adding admin main controller
            __DIR__.'/controllers/AdminsController.php' => base_path('app/Http/Controllers/Admin/AdminsController.php'),
            // adding admin's forgot password controller
            __DIR__.'/controllers/ForgotPasswordController.php' => base_path('app/Http/Controllers/Admin/ForgotPasswordController.php'),
            // adding admin's login controller
            __DIR__.'/controllers/LoginController.php' => base_path('app/Http/Controllers/Admin/LoginController.php'),
            // adding admin's reset password controller
            __DIR__.'/controllers/ResetPasswordController.php' => base_path('app/Http/Controllers/Admin/ResetPasswordController.php'),
            // adding required handler for redirecting unauthenticated users
            __DIR__.'/req/Handler.php' => base_path('app/Exceptions/Handler.php'),
            // adding required middleware for redirecting authenticated admin
            __DIR__.'/req/RedirectIfAuthenticated.php' => base_path('app/Http/Middleware/RedirectIfAuthenticated.php'),
            // adding basic admin middleware
            __DIR__.'/req/AdminMiddleware.php' => base_path('app/Http/Middleware/AdminMiddleware.php'),
            // adding admin model
            __DIR__.'/req/Admin.php' => base_path('app/Admin.php'),
            // adding admin reset password notification file
            __DIR__.'/req/AdminResetPasswordNotification.php' => base_path('app/Notifications/AdminResetPasswordNotification.php'),
            // adding required migration table
            __DIR__.'/req/2017_04_25_202645_create_Admins_Table.php' => base_path('database/migrations/2017_04_25_202645_create_Admins_Table.php'),
            // adding the modified kernel file
            __DIR__.'/req/kernel.php' => base_path('app/Http/kernel.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes/routes.php';
    }
}

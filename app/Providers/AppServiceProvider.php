<?php

namespace App\Providers;

use App\Enums\CmnEnum;
use Illuminate\Support\Facades\App;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Devices\DeviceRepositoryInterface;
use App\Repositories\Devices\DeviceRepository;
use App\Interfaces\Devices\SensorDataRepositoryInterface;
use App\Repositories\Devices\SensorDataRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DeviceRepositoryInterface::class, DeviceRepository::class);
        $this->app->bind(SensorDataRepositoryInterface::class, SensorDataRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        App::setLocale(CmnEnum::DEFAULT_LANG);

        //ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            //return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        //});
    }
}

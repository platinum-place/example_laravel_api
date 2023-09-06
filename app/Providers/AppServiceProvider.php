<?php

namespace App\Providers;

use App\Helpers\EloquentBuilderHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Builder::macro('filter', function (array $params) {
            /** @var Builder */
            $builder = $this;
            return (new EloquentBuilderHelper)->filter($builder, $params);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

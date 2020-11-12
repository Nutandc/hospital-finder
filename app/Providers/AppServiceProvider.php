<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function register()
    {
        Collection::macro('toAssoc', function () {
            return $this->reduce(function ($assoc, $keyValuePair) {
                list($key, $value) = $keyValuePair;
                $assoc[$key] = $value;
                return $assoc;
            }, new static);
        });

    }
}

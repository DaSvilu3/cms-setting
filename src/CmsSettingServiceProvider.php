<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AhmedElsadany\CmsSetting;

use Illuminate\Support\ServiceProvider;

/**
 * Description of CmsBackenThemeServiceProvider
 *
 * @author Ahmed Sadany
 */
class CmsSettingServiceProvider extends ServiceProvider {

    public function boot() {
        $this->publishes([__DIR__ . '/config' => base_path('config')]);

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views'),
        ]);
        $this->publishes([
            __DIR__ . '/lang' => base_path('resources/lang'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}

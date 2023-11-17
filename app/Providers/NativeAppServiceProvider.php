<?php

namespace App\Providers;

use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Menu\Menu;
use Native\Laravel\Contracts\ProvidesPhpIni;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Window::open()
            ->minWidth(1011)
            ->minHeight(718)
            ->width(1011)
            ->height(718)
            ->rememberState()
            ->route('tracks');
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
            'memory_limit' => '1024M',
            'display_errors' => '1',
            'error_reporting' => 'E_ALL',
            'max_execution_time' => '0',
            // 'max_input_time' => '0',
            // 'opcache.enable_cli' => '1',
            // 'opcache.memory_consumption' => '256',
            // 'zend_extension' => 'opcache',
        ];
    }
}

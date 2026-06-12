<?php

namespace App\Providers;

use Native\Desktop\Facades\Window;
use Native\Desktop\Facades\Menu;
use Native\Desktop\Contracts\ProvidesPhpIni;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        // Replace the default File/Edit/View/Window/Help menu with an empty one
        // so there is nothing to reveal when Alt is pressed on Windows.
        Menu::create();

        Window::open()
            ->minWidth(1011)
            ->minHeight(718)
            ->width(1011)
            ->height(718)
            ->hideMenu()
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

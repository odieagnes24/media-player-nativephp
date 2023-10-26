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

        // Menu::new()
        // ->appMenu()
        // ->editMenu()
        // ->viewMenu()
        // ->windowMenu()
        // ->register();

        Window::open()
            ->minWidth(1024)
            ->minHeight(768)
            ->width(1024)
            ->height(768)
            ->rememberState()
            ->route('settings');
            // ->titleBarHidden();
            // ->backgroundColor('#00000050'); 

        // MenuBar::create()
        // ->label('Status: Online');     
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
            'memory_limit' => '512M',
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

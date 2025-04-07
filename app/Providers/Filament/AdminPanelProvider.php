<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\LoginCustom;
use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->breadcrumbs(false)
            // ->brandLogo(fn() => view('/filament.logo.logo'))
            // ->brandLogoHeight('2rem')
            ->brandLogo(asset('images/logo-ycp.png'))
            ->brandLogoHeight('2.6rem')
            ->favicon(asset('images/favicon.ico'))
            ->topNavigation()

            // ->sidebarCollapsibleOnDesktop(true)
            // ->collapsibleNavigationGroups(true)
            // ->navigationGroups([
            //     NavigationGroup::make()
            //         ->label('User Management')
            //         ->icon('heroicon-o-user'),
            //     NavigationGroup::make()
            //         ->label('System Management')
            //         ->icon('heroicon-o-arrow-down-on-square-stack')
            //         ->collapsed(),
            // ])

            // ->sidebarFullyCollapsibleOnDesktop()
            ->databaseNotifications()

            ->login(LoginCustom::class)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                // Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    protected static ?string $title = 'Custom Page Title';

    public function getHeaderWidgetsColumns(): int|array
    {
        return 3;
    }
}

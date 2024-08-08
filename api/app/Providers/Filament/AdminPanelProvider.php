<?php

namespace App\Providers\Filament;

use Amendozaaguiar\FilamentRouteStatistics\FilamentRouteStatisticsPlugin;
use Edwink\FilamentUserActivity\FilamentUserActivityPlugin;
use Exception;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentGeneralSettings\FilamentGeneralSettingsPlugin;
use Njxqlus\FilamentProgressbar\FilamentProgressbarPlugin;
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;
use TomatoPHP\FilamentAccounts\FilamentAccountsPlugin;
use TomatoPHP\FilamentAlerts\FilamentAlertsPlugin;
use TomatoPHP\FilamentEcommerce\FilamentEcommercePlugin;
use TomatoPHP\FilamentLocations\FilamentLocationsPlugin;

class AdminPanelProvider extends PanelProvider
{
    /**
     * @throws Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->databaseNotifications()
            ->passwordReset()
            ->profile(isSimple: false)
            ->colors([
                'primary' => Color::Violet,
            ])
            ->spa()
            ->unsavedChangesAlerts()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([])
            ->plugins([
                FilamentProgressbarPlugin::make()->color('#29f'),
                //FilamentSimplePagesPlugin::make(),
                //FilamentUserActivityPlugin::make(),
                FilamentAlertsPlugin::make(),
                FilamentEcommercePlugin::make(),
                FilamentLocationsPlugin::make(),
                FilamentAccountsPlugin::make()
                    ->useAccountMeta()
                    ->useNotifications()
                    ->useLocations()
                    ->useTypes()
                    ->showAddressField()
                    ->showTypeField()
                    ->useRequests()
                    ->useContactUs()
                    ->useLoginBy()
                    ->canLogin()
                    ->canBlocked()
                    ->useTeams()
                    ->useAvatar()
                    ->useAPIs(),
                // FilamentGeneralSettingsPlugin::make()
                //     ->setIcon('heroicon-o-cog')
                //     ->setNavigationGroup('Settings')
                //     ->setTitle('General Settings')
                //     ->setNavigationLabel('General Settings'),
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
}

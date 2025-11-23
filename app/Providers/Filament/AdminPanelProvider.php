<?php

namespace App\Providers\Filament;

use App\Filament\Resources\AgtaAwards\AgtaAwardResource;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Designs\DesignResource;
use App\Filament\Resources\DigitalPrototypingFeatures\DigitalPrototypingFeatureResource;
use App\Filament\Resources\SliderImages\SliderImageResource;
use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Workflows\WorkflowResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->brandName('Auvea')
            ->sidebarCollapsibleOnDesktop(true)
            ->favicon(asset('/assets/auvea/logo.png'))
            ->brandLogo(asset('/assets/auvea/logo.png'))
            ->darkModeBrandLogo(asset('/assets/auvea/logo.png'))
            ->brandLogoHeight('3.0rem')
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                $group = [];
                $group[] =  NavigationGroup::make(__('lang.management'))
                    ->items(array_merge(
                        SliderImageResource::getNavigationItems(),
                        WorkflowResource::getNavigationItems(),
                        DigitalPrototypingFeatureResource::getNavigationItems(),
                        AgtaAwardResource::getNavigationItems(),
                    ));
                $group[] =  NavigationGroup::make(__('lang.categories_and_designs'))
                    ->items(array_merge(
                        CategoryResource::getNavigationItems(),
                        DesignResource::getNavigationItems(),
                    ));
                $group[] =  NavigationGroup::make(__('lang.user_management'))
                    ->items(array_merge(
                        UserResource::getNavigationItems(),
                     ));

                $menu =  $builder->items([
                    NavigationItem::make(__('lang.dashboard'))

                        ->icon('heroicon-o-home')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                        ->url(fn(): string => Dashboard::getUrl()),

                ])
                    ->groups(
                        $group
                    );
                return $menu;
            })
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

<?php

namespace App\Filament\Resources\Carts;

use App\Filament\Resources\Carts\Pages\CreateCart;
use App\Filament\Resources\Carts\Pages\EditCart;
use App\Filament\Resources\Carts\Pages\ListCarts;
use App\Filament\Resources\Carts\Pages\ViewCart;
use App\Filament\Resources\Carts\Schemas\CartForm;
use App\Filament\Resources\Carts\Tables\CartsTable;
use BackedEnum;
use App\Models\Cart;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShoppingCart;

    protected static ?string $recordTitleAttribute = 'user_id';

    // public static function form(Schema $schema): Schema
    // {
    //     return CartForm::configure($schema);
    // }

    public static function table(Table $table): Table
    {
        return CartsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCarts::route('/'),
            // 'create' => CreateCart::route('/create'),
            // 'edit' => EditCart::route('/{record}/edit'),
            'view' => ViewCart::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeTooltip(): string|Htmlable|null
    {
        return __('lang.resource');
    }
}

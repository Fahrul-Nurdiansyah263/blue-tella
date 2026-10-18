<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi';

    protected static ?string $navigationLabel = 'Pesanan';

    protected static ?string $modelLabel = 'Pesanan';

    protected static ?string $pluralModelLabel = 'Pesanan';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Informasi Pesanan & Status')
                            ->schema([
                                TextInput::make('order_number')
                                    ->label('Nomor Pesanan')
                                    ->disabled()
                                    ->required(),

                                TextInput::make('resi_number')
                                    ->label('Nomor Resi Pengiriman')
                                    ->copyable()
                                    ->placeholder('RESI-BT-...'),

                                TextInput::make('courier')
                                    ->label('Kurir Ekspedisi')
                                    ->placeholder('Blue Tella Express Courier'),

                                Select::make('status')
                                    ->label('Status Pesanan')
                                    ->options([
                                        'pending' => 'Menunggu Pembayaran',
                                        'paid' => 'Sudah Dibayar',
                                        'processing' => 'Sedang Diproses',
                                        'completed' => 'Selesai',
                                        'cancelled' => 'Dibatalkan',
                                    ])
                                    ->required()
                                    ->native(false),

                                Select::make('payment_method')
                                    ->label('Metode Pembayaran')
                                    ->options([
                                        'bank_transfer' => 'Transfer Bank',
                                        'qris' => 'QRIS',
                                        'cod' => 'Bayar di Tempat (COD)',
                                    ])
                                    ->required()
                                    ->native(false),

                                TextInput::make('total_price')
                                    ->label('Total Pembayaran')
                                    ->prefix('Rp')
                                    ->numeric()
                                    ->disabled()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->columnSpan(2),

                        Section::make('Data Pelanggan')
                            ->schema([
                                TextInput::make('customer_name')
                                    ->label('Nama Pelanggan')
                                    ->required(),

                                TextInput::make('customer_phone')
                                    ->label('Nomor WhatsApp/HP')
                                    ->required(),

                                TextInput::make('customer_email')
                                    ->label('Email'),

                                Textarea::make('shipping_address')
                                    ->label('Alamat Pengiriman')
                                    ->rows(3)
                                    ->required(),

                                Textarea::make('notes')
                                    ->label('Catatan Pesanan')
                                    ->rows(2),
                            ])
                            ->columnSpan(1),

                        Section::make('Rincian Barang yang Dipesan')
                            ->schema([
                                Repeater::make('items')
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('product_name')
                                            ->label('Produk')
                                            ->disabled()
                                            ->columnSpan(4),

                                        TextInput::make('sku')
                                            ->label('SKU')
                                            ->disabled()
                                            ->columnSpan(2),

                                        TextInput::make('price')
                                            ->label('Harga')
                                            ->prefix('Rp')
                                            ->disabled()
                                            ->columnSpan(2),

                                        TextInput::make('quantity')
                                            ->label('Jumlah')
                                            ->disabled()
                                            ->columnSpan(2),

                                        TextInput::make('subtotal')
                                            ->label('Subtotal')
                                            ->prefix('Rp')
                                            ->disabled()
                                            ->columnSpan(2),
                                    ])
                                    ->columns(12)
                                    ->addable(false)
                                    ->deletable(false)
                                    ->reorderable(false),
                            ])
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('No. Pesanan')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                TextColumn::make('resi_number')
                    ->label('No. Resi')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->badge()
                    ->color('info')
                    ->placeholder('Belum terbit'),

                TextColumn::make('customer_name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('customer_phone')
                    ->label('WhatsApp')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('total_price')
                    ->label('Total')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.'))
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('payment_method')
                    ->label('Pembayaran')
                    ->badge()
                    ->formatStateUsing(fn ($state) => strtoupper(str_replace('_', ' ', $state))),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'info',
                        'processing' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu Pembayaran',
                        'paid' => 'Sudah Dibayar',
                        'processing' => 'Sedang Diproses',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                        default => ucfirst($state),
                    }),

                TextColumn::make('created_at')
                    ->label('Waktu Pesan')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'pending' => 'Menunggu Pembayaran',
                        'paid' => 'Sudah Dibayar',
                        'processing' => 'Sedang Diproses',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                    ]),

                SelectFilter::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options([
                        'bank_transfer' => 'Transfer Bank',
                        'qris' => 'QRIS',
                        'cod' => 'COD',
                    ]),
            ])
            ->actions([
                EditAction::make()->label('Kelola'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}

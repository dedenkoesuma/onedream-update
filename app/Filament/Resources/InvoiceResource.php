<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\Section::make('Invoice Details')
                 ->schema([
                     Forms\Components\TextInput::make('customer_name')
                         ->label('Customer Name')
                         ->required(),
                     Forms\Components\Textarea::make('customer_address')
                         ->label('Customer Address')
                         ->required(),
                     Forms\Components\DatePicker::make('invoice_date')
                         ->label('Invoice Date')
                         ->required(),
                     Forms\Components\DatePicker::make('due_date')
                         ->label('Due Date')
                         ->nullable(),
                 ])->collapsible()->collapsed(),
             
             // Invoice Items Section
             Forms\Components\Section::make('Invoice Items')
                 ->schema([
                    Forms\Components\Repeater::make('items')
                        ->relationship('items')
                        ->schema([
                             Forms\Components\TextInput::make('item')
                                 ->label('Item Name')
                                 ->required(),
                             Forms\Components\TextInput::make('qty')
                                 ->label('Quantity')
                                 ->numeric()
                                 ->required(),
                             Forms\Components\TextInput::make('price')
                                 ->label('Price')
                                 ->required(),
                        ]),
                 ])->collapsible()->collapsed(),

                 Forms\Components\Checkbox::make('apply_vat')
                     ->label('Apply 10% VAT'),
             
             // Payment Details Section
             Forms\Components\Section::make('Payment Details')
                ->relationship('paymentDetails')
                 ->schema([
                             Forms\Components\TextInput::make('bank')
                                 ->label('Nama Bank')
                                 ->required(),
                             Forms\Components\TextInput::make('cabang')
                                 ->label('Cabang Bank')
                                 ->required(),
                             Forms\Components\TextInput::make('no_rek')
                                 ->label('Nomor Rekening')
                                 ->numeric()
                                 ->required(),
                             Forms\Components\TextInput::make('owner_rek')
                                 ->label('Pemilik Rekening')
                                 ->required(),
                 ])->collapsible()->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_number')
                ->label('Invoice No')
                ->sortable()
                ->searchable(),
                TextColumn::make('customer_name')
                ->label('Nama Customer')
                ->sortable()
                ->searchable(),
                TextColumn::make('items.item')
                ->label('Nama Item')
                ->sortable()
                ->searchable(),
                TextColumn::make('paymentDetails.total')
                ->label('Total Invoice')
                ->formatStateUsing(fn ($state) => "Rp " . number_format($state, 0, ',', '.'))
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->color('black'),
                Tables\Actions\Action::make('downloadPDF')
                    ->label('Print Invoice')
                    ->url(function ($record) {
                        return route('invoices.downloadPDF', $record->id);
                    })
                    ->icon('heroicon-o-printer')
                    ->color('warning')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}

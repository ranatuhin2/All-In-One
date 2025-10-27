<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->placeholder('Select User')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('invoice_number')
                    ->label('Invoice Number')
                    ->placeholder('Invoice Number')
                    ->required(),
                TextInput::make('amount')
                    ->label('Amount')
                    ->placeholder('Amount')
                    ->prefixIcon(Heroicon::CurrencyDollar)
                    ->minValue(0)
                    ->required()
                    ->numeric(),
                DatePicker::make('due_date')
                    ->label('Due Date')
                    ->placeholder('Due Date')
                    ->required(),
                Toggle::make('is_paid')
                    ->label('Is Paid')
                    ->required(),
            ]);
    }
}

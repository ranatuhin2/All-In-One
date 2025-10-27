<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Enums\PostStatusType;
use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Post Title')
                    ->searchable(),
                TextColumn::make('user_id')
                    ->label('User')
                    ->formatStateUsing(fn($state) => User::find($state)->name)
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->icon(fn($state) => $state === PostStatusType::ACTIVE ? Heroicon::CheckCircle : Heroicon::XCircle)
                    ->color(fn($state) => $state === PostStatusType::ACTIVE ? 'success' : 'danger')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

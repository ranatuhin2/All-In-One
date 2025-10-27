<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostStatusType;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->required()
                    ->label('User')
                    ->searchable()
                    ->placeholder('Select a user')
                    ->options(User::all()->pluck('name', 'id')),
                TextInput::make('title')
                    ->placeholder('Post Title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->placeholder('Post Description')
                    ->columnSpanFull()
                    ->rows(5),
                Select::make('status')
                    ->label('Post Status')
                    ->placeholder('Select Status')
                    ->options(PostStatusType::getLabel())
                    ->required(),
            ]);
    }
}

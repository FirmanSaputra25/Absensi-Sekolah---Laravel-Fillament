<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Guru;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\Pages\EditGuru;
use App\Filament\Resources\GuruResource\Pages\ListGurus;
use App\Filament\Resources\GuruResource\Pages\CreateGuru;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Guru')
                    ->required(),
                TextInput::make('mata_pelajaran')
                    ->label('Mata Pelajaran')
                    ->required(),
                Select::make('kelas')
                    ->label('Kelas')
                    ->options([
                        '10 IPA' => '10 IPA',
                        '10 IPS' => '10 IPS',
                        '11 IPA' => '11 IPA',
                        '11 IPS' => '11 IPS',
                        '12 IPA' => '12 IPA',
                        '12 IPS' => '12 IPS',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Guru')->sortable(),
                TextColumn::make('mata_pelajaran')->label('Mata Pelajaran')->sortable(),
                TextColumn::make('kelas')->label('Kelas')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
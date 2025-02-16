<?php

namespace App\Filament\Resources\LaporanKehadiranResource\Pages;

use App\Filament\Resources\LaporanKehadiranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanKehadiran extends EditRecord
{
    protected static string $resource = LaporanKehadiranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

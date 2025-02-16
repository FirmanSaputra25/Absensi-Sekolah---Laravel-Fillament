<?php

namespace App\Filament\Resources\LaporanKehadiranResource\Pages;

use App\Filament\Resources\LaporanKehadiranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanKehadirans extends ListRecords
{
    protected static string $resource = LaporanKehadiranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

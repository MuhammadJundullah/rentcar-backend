<?php

namespace App\Filament\Resources\AktivitasResource\Pages;

use App\Filament\Resources\AktivitasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAktivitas extends ListRecords
{
    protected static string $resource = AktivitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

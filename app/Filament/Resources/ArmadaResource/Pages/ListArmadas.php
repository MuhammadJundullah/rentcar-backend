<?php

namespace App\Filament\Resources\ArmadaResource\Pages;

use App\Filament\Resources\ArmadaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArmadas extends ListRecords
{
    protected static string $resource = ArmadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ArmadaResource\Pages;

use App\Filament\Resources\ArmadaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArmada extends EditRecord
{
    protected static string $resource = ArmadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

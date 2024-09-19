<?php

namespace App\Filament\Resources\GeneralInformationResource\Pages;

use App\Filament\Resources\GeneralInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneralInformation extends EditRecord
{
    protected static string $resource = GeneralInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\GeneralInformationResource\Pages;

use App\Filament\Resources\GeneralInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneralInformation extends ListRecords
{
    protected static string $resource = GeneralInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

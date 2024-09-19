<?php

namespace App\Filament\Resources\TPegawaiResource\Pages;

use App\Filament\Resources\TPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTPegawais extends ListRecords
{
    protected static string $resource = TPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Filament\Resources\PortfolioResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreatePortfolio extends CreateRecord
{
    protected static string $resource = PortfolioResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')->label(__('Back'))->url(PortfolioResource::getUrl('index')),
        ];
    }
}

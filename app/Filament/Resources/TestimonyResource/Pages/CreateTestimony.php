<?php

namespace App\Filament\Resources\TestimonyResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\TestimonyResource;

class CreateTestimony extends CreateRecord
{
    protected static string $resource = TestimonyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Testimony Created Successfully');
    }
}

<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->createAnother(false)
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();
                    dd($data);
                    return $data;
                }),
        ];
    }
}

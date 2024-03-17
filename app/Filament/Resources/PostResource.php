<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name'),
                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->directory('post')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file, Get $get): string => (string) str(Str::replace(' ', '-', $get('name') . "." . $file->getClientOriginalExtension()))
                            ->prepend('acce-abuja-'),
                    )
                    ->imageEditor(),
                Forms\Components\Textarea::make('summary')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('body')
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->label('Author')
                    ->default(auth()->id())
                    ->hidden()
                    ->relationship('author', 'name'),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author')
                    ->extraAttributes(['class', 'capitalize'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->extraAttributes(['class', 'capitalize'])
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

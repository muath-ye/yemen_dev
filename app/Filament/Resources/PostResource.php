<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\RichEditor::make('content')->required(),
                Forms\Components\FileUpload::make('image')->required(),
                Forms\Components\Select::make('author_id')->options(function () {
                    $data = [];
                    foreach (Author::get() as $item) {
                        $data[$item->id] = $item->name;
                    }

                    return $data;
                }),
                Forms\Components\Select::make('category_id')->options(function () {
                    $data = [];
                    foreach (Category::get() as $item) {
                        $data[$item->id] = $item->name;
                    }

                    return $data;
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //                 name
                // content
                // image
                // author_id
                // category_id
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('authors.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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

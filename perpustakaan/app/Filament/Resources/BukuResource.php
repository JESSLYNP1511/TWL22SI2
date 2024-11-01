<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Buku')
                    ->required()
                    ->maxLength(100), 

                Forms\Components\TextInput::make('author')
                    ->label('Penulis')
                    ->required()
                    ->maxLength(50), 

                Forms\Components\TextInput::make('publisher')
                    ->label('Penerbit')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('year_published')
                    ->label('Tahun Terbit')
                    ->required()
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y')),

                Forms\Components\TextInput::make('stock')
                    ->label('Stok')
                    ->required()
                    ->numeric()
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('author')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('publisher')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('year_published')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('stock')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}

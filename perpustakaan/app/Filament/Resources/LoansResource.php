<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoansResource\Pages;
use App\Filament\Resources\LoansResource\RelationManagers;
use App\Models\Loans;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Anggota;
use App\Models\Buku;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoansResource extends Resource
{
    protected static ?string $model = Loans::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\Select::make('member_id')
                        ->label('Anggota')
                        ->options(Anggota::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
    
                    Forms\Components\Select::make('book_id')
                        ->label('Buku')
                        ->options(Buku::all()->pluck('title', 'id'))
                        ->searchable()
                        ->required(),
    
                    Forms\Components\DatePicker::make('borrow_date')
                        ->label('Tanggal Pinjam')
                        ->required(),
    
                    Forms\Components\DatePicker::make('return_date')
                        ->label('Tanggal Kembali')
                        ->nullable(),
    
                    Forms\Components\Select::make('dipinjam')
                        ->label('Status Peminjaman')
                        ->options([
                            'dipinjam' => 'Dipinjam',
                            'kembali' => 'Kembali',
                        ])
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('book_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('borrow_date')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('return_date')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('dipinjam')->sortable()->searchable(),
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
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoans::route('/create'),
            'edit' => Pages\EditLoans::route('/{record}/edit'),
        ];
    }
}

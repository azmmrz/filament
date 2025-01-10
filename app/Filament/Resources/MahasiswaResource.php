<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Mahasiswa';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->label('NIM'),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama'),
                Forms\Components\TextInput::make('jurusan')
                    ->required()
                    ->maxLength(255)
                    ->label('Jurusan'),
                Forms\Components\TextInput::make('kelas')
                    ->required()
                    ->maxLength(255)
                    ->label('Kelas'),
                Forms\Components\TextInput::make('angkatan')
                    ->required()
                    ->maxLength(255)
                    ->label('Angkatan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->searchable()
                    ->sortable()
                    ->label('NIM'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('jurusan')
                    ->searchable()
                    ->sortable()
                    ->label('Jurusan'),
                Tables\Columns\TextColumn::make('kelas')
                    ->searchable()
                    ->sortable()
                    ->label('Kelas'),
                Tables\Columns\TextColumn::make('angkatan')
                    ->searchable()
                    ->sortable()
                    ->label('Angkatan'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'view' => Pages\ViewMahasiswa::route('/{record}'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}

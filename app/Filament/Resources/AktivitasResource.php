<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AktivitasResource\Pages;
use App\Filament\Resources\AktivitasResource\RelationManagers;
use App\Models\Aktivitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class AktivitasResource extends Resource
{
    protected static ?string $model = Aktivitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul'),
                FileUpload::make('foto')
                    ->image()
                    ->directory('aktivitas'),
                Forms\Components\DatePicker::make('tanggal'),
                Forms\Components\TextArea::make('isi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul'),
                Tables\Columns\TextColumn::make('isi'),
                Tables\Columns\TextColumn::make('tanggal'),
                ImageColumn::make('foto'),
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
            'index' => Pages\ListAktivitas::route('/'),
            'create' => Pages\CreateAktivitas::route('/create'),
            'edit' => Pages\EditAktivitas::route('/{record}/edit'),
        ];
    }
}

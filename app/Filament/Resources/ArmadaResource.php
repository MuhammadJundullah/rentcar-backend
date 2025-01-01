<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArmadaResource\Pages;
use App\Filament\Resources\ArmadaResource\RelationManagers;
use App\Models\Armada;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;

class ArmadaResource extends Resource
{
    protected static ?string $model = Armada::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Armada';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\Select::make('kelas')->required()
                ->options([
                    'Luxury' => 'Luxury',
                    'Standard' => 'Standard',
                    'Economy' => 'Economy',
                ]),
            Forms\Components\TextInput::make('harga')->label('Harga sewa / Hari')->required(),
            FileUpload::make('foto')->required()
                    ->directory('armada')
                    ->image()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('kelas')->label('Kelas')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('harga')->label('Harga')->searchable()->sortable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                // ->thumbnail('preview'),
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
            'index' => Pages\ListArmadas::route('/'),
            'create' => Pages\CreateArmada::route('/create'),
            'edit' => Pages\EditArmada::route('/{record}/edit'),
        ];
    }
}

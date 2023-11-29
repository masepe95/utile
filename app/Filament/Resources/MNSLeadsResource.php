<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MNSLeadsResource\Pages;
use App\Filament\Resources\MNSLeadsResource\RelationManagers;
use App\Models\TyfonLead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MNSLeadsResource extends Resource
{
    protected static ?string $model = TyfonLead::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codiceMetanoNord')
                    ->required()
                    ->maxLength(255)
                    ->label('Codice Metano Nord'),
                Forms\Components\TextInput::make('commessa')
                    ->required()
                    ->maxLength(255)
                    ->label('Commessa'),
                Forms\Components\TextInput::make('cognome')
                    ->required()
                    ->maxLength(255)
                    ->label('Cognome'),
                Forms\Components\TextInput::make('nome')
                    ->email()
                    ->required()
                    ->label('Nome'),
                Forms\Components\TextInput::make('cf')
                    ->required()
                    ->maxLength(255)
                    ->label('Codice Fiscale'),
                Forms\Components\TextInput::make('ragsoc')
                    ->required()
                    ->maxLength(255)
                    ->label('Ragione Sociale'),
                Forms\Components\TextInput::make('piva')
                    ->required()
                    ->maxLength(255)
                    ->label('Partita IVA'),
                Forms\Components\TextInput::make('telefono')
                    ->email()
                    ->required()
                    ->label('Telefono'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255)
                    ->label('E-Mail'),
                Forms\Components\TextInput::make('indirizzo')
                    ->required()
                    ->maxLength(255)
                    ->label('Indirizzo'),
                Forms\Components\TextInput::make('civico')
                    ->required()
                    ->maxLength(255)
                    ->label('Civico'),
                Forms\Components\TextInput::make('cap')
                    ->email()
                    ->required()
                    ->label('C.A.P.'),
                Forms\Components\TextInput::make('comune')
                    ->required()
                    ->maxLength(255)
                    ->label('Comune'),
                Forms\Components\TextInput::make('provincia')
                    ->required()
                    ->maxLength(255)
                    ->label('Provincia'),
                Forms\Components\TextInput::make('note')
                    ->required()
                    ->maxLength(255)
                    ->label('Note'),
                Forms\Components\TextInput::make('codiceVenditore')
                    ->email()
                    ->required()
                    ->label('Codice Venditore'),
                Forms\Components\TextInput::make('tipologiaProdotto')
                    ->email()
                    ->required()
                    ->label('Tipologia Prodotto'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idLead')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('codiceMetanoNord')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('cognome')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('cf')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('Codice Fiscale'),
                Tables\Columns\TextColumn::make('ragsoc')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('Ragione Sociale'),
                Tables\Columns\TextColumn::make('piva')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('Partita IVA'),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('E-Mail'),
                Tables\Columns\TextColumn::make('indirizzo')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('civico')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('cap')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('CAP'),
                Tables\Columns\TextColumn::make('comune')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('provincia')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('note')
                    ->toggleable()
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
            'index' => Pages\ListMNSLeads::route('/'),
            'create' => Pages\CreateMNSLeads::route('/create'),
            'edit' => Pages\EditMNSLeads::route('/{record}/edit'),
        ];
    }
}

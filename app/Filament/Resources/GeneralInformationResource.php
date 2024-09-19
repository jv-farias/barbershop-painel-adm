<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneralInformationResource\Pages;
use App\Filament\Resources\GeneralInformationResource\RelationManagers;
use App\Models\GeneralInformation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GeneralInformationResource extends Resource
{
    protected static ?string $model = GeneralInformation::class;

    public static function getModelLabel(): string
    {
        return __('General Informations');
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('barbershop_name')
                    ->required(),

                Forms\Components\TextInput::make('document')
                    ->required()
                    ->unique(),

                Forms\Components\TextInput::make('responsible_name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('facebook'),
                Forms\Components\TextInput::make('instagram'),

                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('whatsapp')
                    ->tel()
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\Repeater::make('open_hours')
                    ->relationship('openHours')
                    ->schema([
                        Forms\Components\Select::make('week_day_id')
                            ->label('Dia da Semana')
                            ->relationship('weekDay', 'name')
                            ->required(),

                        Forms\Components\TimePicker::make('start_time')
                            ->label('Hora de Início')
                            ->seconds(false)
                            ->required(),

                        Forms\Components\TimePicker::make('end_time')
                            ->label('Hora de Término')
                            ->seconds(false)
                            ->required(),
                    ])
                    ->label('Horários de Funcionamento')
                    ->minItems(1)
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('barbershop_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('responsible_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
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
            'index' => Pages\ListGeneralInformation::route('/'),
            'create' => Pages\CreateGeneralInformation::route('/create'),
            'edit' => Pages\EditGeneralInformation::route('/{record}/edit'),
        ];
    }
}

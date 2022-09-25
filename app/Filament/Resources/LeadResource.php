<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers;
use App\Models\Lead;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\TextInput::make('nickname')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Section::make('Informations personelle')
                            ->schema([
                                Forms\Components\TextInput::make('firstname')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('lastname')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('birthdate')
                                    ->required(),
                                Forms\Components\TextInput::make('code_postal')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ville')
                                    ->required()
                                    ->maxLength(255),
                            ])->columns(2),
                        Forms\Components\Section::make('Contact')
                            ->schema([
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('otherContact')
                                    ->required()
                                    ->maxLength(255),
                            ])->columns(2),



                Forms\Components\TextInput::make('poids')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('taille')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tp')
                    ->required(),
                Forms\Components\TextInput::make('bonnet')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('epilation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tatouage')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('piercing')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('origine')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('presentation')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('visage')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->required(),
                        Forms\Components\Repeater::make("medias")
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('path')
                            ]),
                        Forms\Components\Repeater::make("links")
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('path')
                            ]),
                ])->columnSpan(['lg' => 2]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstname'),
                Tables\Columns\TextColumn::make('lastname'),
                Tables\Columns\TextColumn::make('nickname'),
                Tables\Columns\TextColumn::make('birthdate')
                    ->date(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('ville'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}

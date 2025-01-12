<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutletResource\Pages;
//use App\Filament\Resources\OutletResource\RelationManagers;
use App\Models\Outlet;
use Cron\HoursField;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletingScope;

class OutletResource extends Resource
{
    protected static ?string $model = Outlet::class;

    protected static ?string $navigationLabel = 'Outlets';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Fieldset::make('Outlet Name')
                    ->schema([
                        //
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ])->columns(1),


                Fieldset::make('Operational Hours')
                    ->schema([
                        Repeater::make('operational_hours')
                            ->schema([
                                TextInput::make('days')
                                    ->required()
                                    ->label('Days')
                                    ->placeholder('Enter the days of operation'),

                                TimePicker::make('open_hours')
                                    ->required()
                                    ->label('Open Hours')
                                    ->placeholder('Select opening time')
                                    ->format('H:i'),  // Format waktu sesuai kebutuhan Anda

                                TimePicker::make('closed_hours')
                                    ->required()
                                    ->label('Closed Hours')
                                    ->placeholder('Select closing time')
                                    ->format('H:i'),  // Format waktu sesuai kebutuhan Anda
                            ])
                            ->columns(3),  // Kolom akan menjadi tiga untuk days, open hours, dan closed hours
                    ])->columns(1),

                Fieldset::make('Address')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->imageEditor(),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('province')
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('lat')
                            ->nullable()
                            ->numeric(),
                        Forms\Components\TextInput::make('long')
                            ->nullable()
                            ->numeric(),

                    ])->columns(2),

                Fieldset::make('Contact')
                    ->schema([
                        //
                        Forms\Components\TextInput::make('pic')
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->nullable()
                            ->email()
                            ->maxLength(255),
                    ])->columns(3),

                Fieldset::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_open')->label('Open')
                            ->default(true),

                        Forms\Components\Toggle::make('is_active')->label('Available')
                            ->default(true),
                    ])->columns(2),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('address')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\BooleanColumn::make('is_active')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOutlets::route('/'),
            'create' => Pages\CreateOutlet::route('/create'),
            'view' => Pages\ViewOutlet::route('/{record}'),
            'edit' => Pages\EditOutlet::route('/{record}/edit'),
        ];
    }
}

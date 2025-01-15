<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Mail\AppointmentNotification;
use App\Models\Appointment;
use App\Models\Outlet;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->required(),

                Forms\Components\DateTimePicker::make('appointment_datetime')
                    ->required(),

                Forms\Components\Select::make('outlet_id')
                    ->label('Select Outlet')
                    ->options(Outlet::all()->pluck('name', 'id'))
                    ->required(),

                Forms\Components\Select::make('product_id')
                    ->label('Select Product')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->nullable()
                    ->reactive(),  // Agar form dapat bereaksi jika "Other" dipilih

                Forms\Components\TextInput::make('product_name')
                    ->label('Enter Product Name')
                    ->nullable()
                    ->visible(fn (callable $get) => $get('product_id') === null), // tampilkan jika product_id = null
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'canceled' => 'Canceled',
                    ])
                    ->default('pending')
                    ->required()
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record) {
                            // Pastikan data model diperbarui
                            $record->status = $state;
                            $record->save();

                            // Kirim email ke pelanggan
                            $messageContent = match ($state) {
                                'confirmed' => "Your appointment has been confirmed. Please arrive on time.",
                                'canceled' => "Unfortunately, your appointment has been canceled. Please contact us for more details.",
                                default => "Your appointment status has been updated to: " . ucfirst($state) . ".",
                            };

                            Mail::to($record->email)->send(new AppointmentNotification($record, $messageContent));
                        }
                    }),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('appointment_datetime'),
                Tables\Columns\TextColumn::make('outlet.name')->label('Outlet'),
                Tables\Columns\TextColumn::make('product.name')->label('Product'),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
            'view' => Pages\ViewAppointment::route('/{record}'),
        ];
    }
}

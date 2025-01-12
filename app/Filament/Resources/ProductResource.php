<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Fieldset::make('')
                    ->schema([
                        // ...
                        Forms\Components\TextInput::make('original_price')
                            ->required()
                            ->numeric()
                            ->label('Original Price'),

                        Forms\Components\TextInput::make('discount_price')
                            ->nullable()
                            ->numeric()
                            ->label('Discount Price'),

                        Forms\Components\TextInput::make('discount_percentage')
                            ->nullable()
                            ->numeric()
                            ->maxValue(100)
                            ->label('Discount Percentage'),
                    ])->columns(3),

                Forms\Components\Textarea::make('description')
                    ->nullable()
                    ->maxLength(65535),

                Forms\Components\TextInput::make('sku')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->maxLength(255),



                FileUpload::make('images')
                    ->disk('public')
                    ->image()
                    ->directory('products/images')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->multiple(),



        Forms\Components\CheckboxList::make('materials')
                    ->relationship('materials', 'name')
                    ->label('Materials')
                    ->columns(2) // Atur jumlah kolom
                    ->helperText('Select the materials for this product.'),


                Forms\Components\BelongsToSelect::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category'),
                CheckboxList::make('collections')
                    ->relationship('collections', 'name')
                    ->label('Collections'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('original_price')->sortable(),
                Tables\Columns\TextColumn::make('discount_price')->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->sortable(),
                Tables\Columns\TagsColumn::make('collections.name')->label('Collections'),
                Tables\Columns\BooleanColumn::make('is_active')->label('Active'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

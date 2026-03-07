<?php

namespace App\Filament\Resources\Jobs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JobsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job_title')
                    ->searchable(),
                TextColumn::make('company_name')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('min_salary')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_salary')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('salary_currency')
                    ->searchable(),
                IconColumn::make('is_salary_negotiable')
                    ->boolean(),
                TextColumn::make('salary_display')
                    ->searchable(),
                TextColumn::make('job_type')
                    ->searchable(),
                TextColumn::make('work_mode')
                    ->searchable(),
                TextColumn::make('experience_required')
                    ->searchable(),
                TextColumn::make('application_link')
                    ->searchable(),
                TextColumn::make('posted_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('expiry_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('source_platform')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

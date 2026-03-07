<?php

namespace App\Filament\Resources\Jobs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JobForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('job_title')
                    ->required(),
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('location'),
                TextInput::make('min_salary')
                    ->numeric(),
                TextInput::make('max_salary')
                    ->numeric(),
                TextInput::make('salary_currency')
                    ->required()
                    ->default('INR'),
                Toggle::make('is_salary_negotiable')
                    ->required(),
                TextInput::make('salary_display'),
                TextInput::make('job_type'),
                TextInput::make('work_mode'),
                TextInput::make('experience_required'),
                Textarea::make('job_description')
                    ->columnSpanFull(),
                Textarea::make('requirements')
                    ->columnSpanFull(),
                Textarea::make('skills_required')
                    ->columnSpanFull(),
                TextInput::make('application_link'),
                DatePicker::make('posted_date'),
                DatePicker::make('expiry_date'),
                TextInput::make('source_platform')
                    ->required()
                    ->default('Manual Entry'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}

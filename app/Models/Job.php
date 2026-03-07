<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company_name',
        'location',
        'min_salary',
        'max_salary',
        'salary_currency',
        'salary_period',
        'is_salary_negotiable',
        'salary_display',
        'job_type',
        'work_mode',
        'experience_required',
        'job_description',
        'requirements',
        'skills_required',
        'application_link',
        'posted_date',
        'expiry_date',
        'source_platform',
        'is_active',
    ];

    protected $casts = [
        'posted_date' => 'date',
        'expiry_date' => 'date',
        'is_active' => 'boolean',
        'is_salary_negotiable' => 'boolean',
        'min_salary' => 'decimal:2',
        'max_salary' => 'decimal:2',
    ];

    public function getFormattedSalaryAttribute(): string
    {
        if ($this->is_salary_negotiable) {
            return 'Negotiable';
        }

        if (!$this->min_salary && !$this->max_salary) {
            return 'Not Disclosed';
        }

        $currency = $this->salary_currency ?? 'INR';
        $symbol = $this->getCurrencySymbol($currency);
        
        $period = match($this->salary_period) {
            'hourly' => '/hr',
            'daily' => '/day',
            'monthly' => '/mo',
            default => '/year',
        };

        if ($this->min_salary && $this->max_salary) {
            return "{$symbol}{$this->formatNumber($this->min_salary)} - {$symbol}{$this->formatNumber($this->max_salary)}{$period}";
        }

        if ($this->min_salary) {
            return "From {$symbol}{$this->formatNumber($this->min_salary)}{$period}";
        }

        if ($this->max_salary) {
            return "Up to {$symbol}{$this->formatNumber($this->max_salary)}{$period}";
        }

        return 'Not Disclosed';
    }

    public function getSalaryRangeAttribute(): array
    {
        return [
            'min' => $this->min_salary,
            'max' => $this->max_salary,
            'currency' => $this->salary_currency,
            'period' => $this->salary_period,
        ];
    }

    private function formatNumber($number): string
    {
        if ($this->salary_currency === 'INR' && $number >= 100000) {
            $lakhs = $number / 100000;
            return number_format($lakhs, 1) . 'L';
        }
        
        if ($number >= 1000000) {
            $millions = $number / 1000000;
            return number_format($millions, 1) . 'M';
        }
        
        if ($number >= 1000) {
            $thousands = $number / 1000;
            return number_format($thousands, 1) . 'K';
        }
        
        return (string) $number;
    }

    private function getCurrencySymbol($currency): string
    {
        return match($currency) {
            'INR' => '₹',
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            default => $currency . ' ',
        };
    }

    public function scopeSalaryBetween($query, $min, $max, $currency = 'INR')
    {
        return $query->where('salary_currency', $currency)
            ->where(function($q) use ($min, $max) {
                $q->whereBetween('min_salary', [$min, $max])
                  ->orWhereBetween('max_salary', [$min, $max])
                  ->orWhere(function($inner) use ($min, $max) {
                      $inner->where('min_salary', '<=', $min)
                            ->where('max_salary', '>=', $max);
                  });
            });
    }

    public function scopeMinSalary($query, $amount, $currency = 'INR')
    {
        return $query->where('salary_currency', $currency)
            ->where(function($q) use ($amount) {
                $q->where('min_salary', '>=', $amount)
                  ->orWhere('max_salary', '>=', $amount);
            });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInLocation($query, $location)
    {
        return $query->where('location', 'LIKE', "%{$location}%");
    }

    public function scopeSearch($query, $term)
    {
        return $query->whereFullText(['job_title', 'company_name', 'skills_required', 'job_description'], $term);
    }
}
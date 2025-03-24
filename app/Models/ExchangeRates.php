<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
const CURRENCY_USD = "usd";
const CURRENCY_EUR = "eur";

const AVAILABLE_CURRENCY = [

    self::CURRENCY_USD,
    self::CURRENCY_EUR
];


    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency',
        'value',
    ];

    public static function getCurrencyToday($currency)
    {
        return self::where('currency', $currency)
            ->whereDate('created_at', today())
            ->first();
    }
}

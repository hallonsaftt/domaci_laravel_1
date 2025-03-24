<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDailyCurency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:curency-value';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Today curency values';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        foreach (ExchangeRates::AVAILABLE_CURRENCY as $currency) {

            $responseGET = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");

            $todayCurrency = ExchangeRates::getCurrencyToday($currency);

            if ($todayCurrency !== null)
            {
                continue;
            }

            ExchangeRates::create(
                [
                    'currency' => $currency,
                    'value' => $responseGET->json()["exchange_middle"],
                ]
            );


        }

    }
}

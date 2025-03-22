<?php

namespace App\Console\Commands;

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

        $responseGET = Http::get("https://kurs.resenje.org/api/v1/currencies/eur/rates/today");

        dd($responseGET->json()["exchange_middle"]);


    }
}

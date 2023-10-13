<?php

namespace App\Providers;

use App\Services\NewsLetter;
use MailchimpMarketing\ApiClient;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(NewsLetter::class, function() {
            $client = new ApiClient();

            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us11'
            ]);

            return new NewsLetter($client);
        }); //Service Provider (Bind Problem)
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::useTailwind();
        //Model::unguard(); jika tidak ingin menambahkan guarded
    }
}

<?php

namespace Nazaryanenko\Dnsreader\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Nazaryanenko\Dnsreader\DnsReaderService;
use Nazaryanenko\Dnsreader\Facades\DnsReader;

class DnsReaderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('DnsReader', function()
        {
            return new DnsReaderService;
        });

        $this->app->alias(DnsReader::class, 'DnsReader');
    }

    public function boot()
    {
        $this->app->register(DnsReaderServiceProvider::class);
        AliasLoader::getInstance()->alias('DnsReader', DnsReader::class);
    }
}

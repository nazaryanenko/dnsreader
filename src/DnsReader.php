<?php

namespace Nazaryanenko\Dnsreader;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class DnsReader
{
    public function getDnsRecords(string $hostName): Collection
    {
        $hostName = $this->resolveHostName($hostName);

        if (!dns_check_record($hostName)) {
            return Collection::make();
        }

        return Collection::make(dns_get_record($hostName));
    }

    protected function resolveHostName(string $hostName): string
    {
        return Str::of($hostName)
                  ->match('/(?<=\/\/)([\w.-]+)(?=[?\/]|$)/');

    }
}

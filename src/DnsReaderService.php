<?php

namespace Nazaryanenko\Dnsreader;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class DnsReaderService
{
    public function getDnsRecords(string $hostName): Collection
    {
        $hostName = $this->resolveHostName($hostName);

        if (!$records = dns_get_record($hostName)) {
            return Collection::make();
        }

        return Collection::make($records);
    }

    protected function resolveHostName(string $hostName): string
    {
        return Str::of($hostName)
                  ->match('/(?<=\/\/)([\w.-]+)(?=[?\/]|$)/');

    }
}

<?php

namespace Nazaryanenko\Dnsreader;

use Illuminate\Support\Collection;

class DnsReaderService
{
    public function getDnsRecords(string $hostName): Collection
    {
        if (!dns_check_record($hostName)) {
            return Collection::make();
        }

        return Collection::make(dns_get_record($hostName));
    }
}

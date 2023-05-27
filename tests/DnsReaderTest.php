<?php

use Illuminate\Support\Collection;
use Nazaryanenko\Dnsreader\DnsReaderService;
use Orchestra\Testbench\TestCase;

class DnsReaderTest extends TestCase
{
    public function testGetDnsRecordsReturnsEmptyCollectionWhenCheckRecordFails()
    {
        $dnsReaderService = new DnsReaderService();
        $result = $dnsReaderService->getDnsRecords('https://invalidhostname.com');

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertTrue($result->isEmpty());
    }

    public function testGetDnsRecordsReturnsCollectionOfRecordsWhenCheckRecordSucceeds()
    {
        $dnsReaderService = new DnsReaderService();
        $result = $dnsReaderService->getDnsRecords('google.com');

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertTrue($result->isNotEmpty());
    }
}

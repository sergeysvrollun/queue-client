<?php


namespace tests;


use ReputationVIP\QueueClient\Adapter\FileAdapter;
use ReputationVIP\QueueClient\QueueClient;

class FileAdapterQueueClientTest extends QueueClientTest
{
    public function getQueueClient()
    {
        $adapter = new FileAdapter('/tmp');
        return new QueueClient($adapter);
    }
}
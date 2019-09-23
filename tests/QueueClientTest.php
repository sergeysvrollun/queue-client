<?php


namespace tests;


use PHPUnit\Framework\TestCase;
use ReputationVIP\QueueClient\QueueClient;
use ReputationVIP\QueueClient\QueueClientInterface;

abstract class QueueClientTest extends TestCase
{

    private $queueClient;
    /**
     * @return QueueClient
     */
    abstract function getQueueClient();


    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->queueClient = $this->getQueueClient();
    }

    /**
     * @return void
     */
    public function tearDown(): void
    {
        $queueClient = $this->getQueueClient();
        $queueList = $queueClient->listQueues();
        foreach ($queueList as $queue) {
            $queueClient->deleteQueue($queue);
        }
        unset($this->queueClient);
    }

    public function testCreateDeleteQueue()
    {
        $queueClient = $this->getQueueClient();
        $this->assertInstanceOf(
            'ReputationVIP\QueueClient\QueueClientInterface',
            $queueClient->createQueue('testQueue')
        );
        $this->assertInstanceOf(
            'ReputationVIP\QueueClient\QueueClientInterface',
            $queueClient->deleteQueue('testQueue')
        );
    }

}
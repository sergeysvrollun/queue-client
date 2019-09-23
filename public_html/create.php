<?php

use ReputationVIP\QueueClient\QueueClient;
use ReputationVIP\QueueClient\Adapter\FileAdapter;

require "bootstrap.php";


$adapter = new FileAdapter('/tmp');
$queueClient = new QueueClient($adapter);

$queueClient->createQueue('testQueue');
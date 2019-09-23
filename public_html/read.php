<?php

use ReputationVIP\QueueClient\QueueClient;
use ReputationVIP\QueueClient\Adapter\FileAdapter;

require "bootstrap.php";


$adapter = new FileAdapter('/tmp');
$queueClient = new QueueClient($adapter);


$messages = $queueClient->getMessages('testQueue');
$message = $messages[0];
$queueClient->deleteMessage('testQueue', $message);
echo $message['Body'];
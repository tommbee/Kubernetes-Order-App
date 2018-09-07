<?php

namespace Rabbitmq\Consumers;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitmqOrderConsumer implements ConsumerInterface {

    private $persistantStorage;

    public function execute(AMQPMessage $msg)
    {
        // TODO: Implement execute() method.
    }
}
<?php

declare(strict_types=1);

namespace YaPro\SymfonyLoggerExt;

use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Psr\Log\LoggerInterface;

/**
 * @url https://symfony.com/doc/current/components/console/events.html#the-consoleevents-error-event
 *
 * For symfony <= 3.3 use:
 * @url http://symfony.com/doc/2.8/console/logging.html#enabling-automatic-exceptions-logging
 */
class ConsoleErrorListener
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onConsoleException(ConsoleErrorEvent $event)
    {
        $this->logger->error('Error occurred during symfony command', [
            'commandName' => $event->getCommand()->getName(),
            'error' => $event->getError(),
        ]);
    }
}

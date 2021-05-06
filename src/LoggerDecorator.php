<?php

declare(strict_types=1);

namespace YaPro\SymfonyLoggerExt;

use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LoggerDecorator extends Logger
{
    public function addRecord(int $level, string $message, array $context = []): bool
    {
        // AccessDeniedHttpException will not be recorded using a logger:
        if (reset($context) instanceof AccessDeniedHttpException) {
            return true;
        }

        return parent::addRecord($level, $message, $context);
    }
}

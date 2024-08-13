<?php

namespace AriefKarditya\PhpStandardRecommendation\Service;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class UserService
{
    public function __construct(private LoggerInterface $logger) {}

    public function save(string $name): void
    {
        $this->logger->log(LogLevel::INFO, "User $name is saved.");
    }
}

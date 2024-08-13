<?php

namespace AriefKarditya\PhpStandardRecommendation\Service;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use AriefKarditya\PhpStandardRecommendation\Service\UserService;

class UserServiceTest extends TestCase
{

    /**
     * @test
     */
    public function save()
    {
        $logger = new Logger("belajar-php-psr");
        $streamHandler = new StreamHandler("php://stdout");
        $streamHandler->setFormatter(new JsonFormatter());
        $logger->pushHandler($streamHandler);

        $service = new UserService($logger);
        $service->save("Terry");

        TestCase::assertNotNull($logger);
    }
}

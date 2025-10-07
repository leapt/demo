<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractControllerTestCase extends WebTestCase
{
    protected static KernelBrowser $client;

    protected function setUp(): void
    {
        self::$client = self::createClient();
    }
}

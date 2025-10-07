<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\ResetDatabase;

abstract class AbstractControllerTestCase extends WebTestCase
{
    use ResetDatabase;

    protected static KernelBrowser $client;

    protected function setUp(): void
    {
        self::$client = self::createClient();
    }
}

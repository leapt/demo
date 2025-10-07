<?php

declare(strict_types=1);

namespace App\Tests\Controller;

final class DefaultControllerTest extends AbstractControllerTestCase
{
    public function testIndex(): void
    {
        self::$client->request('GET', '/');
        self::assertResponseIsSuccessful();
    }
}

<?php

declare(strict_types=1);

namespace App\Tests\Controller;

final class SlugControllerTest extends AbstractControllerTestCase
{
    public function testIndex(): void
    {
        self::$client->request('GET', '/slug');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap4(): void
    {
        self::$client->request('GET', '/slug/bootstrap-4');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap5(): void
    {
        self::$client->request('GET', '/slug/bootstrap-5');
        self::assertResponseIsSuccessful();
    }
}

<?php

declare(strict_types=1);

namespace App\Tests\Controller;

final class PaginatorControllerTest extends AbstractControllerTestCase
{
    public function testIndex(): void
    {
        self::$client->request('GET', '/paginator');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap3(): void
    {
        self::$client->request('GET', '/paginator/bootstrap-3');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap4(): void
    {
        self::$client->request('GET', '/paginator/bootstrap-4');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap5(): void
    {
        self::$client->request('GET', '/paginator/bootstrap-5');
        self::assertResponseIsSuccessful();
    }
}

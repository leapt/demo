<?php

declare(strict_types=1);

namespace App\Tests\Controller;

final class DatalistControllerTest extends AbstractControllerTestCase
{
    public function testDefaultGrid(): void
    {
        self::$client->request('GET', '/datalist/default-grid');
        self::assertResponseIsSuccessful();
    }

    public function testDefaultTiled(): void
    {
        self::$client->request('GET', '/datalist/default-tiled');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap3Grid(): void
    {
        self::$client->request('GET', '/datalist/bootstrap-3-grid');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap3Tiled(): void
    {
        self::$client->request('GET', '/datalist/bootstrap-3-tiled');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap4Grid(): void
    {
        self::$client->request('GET', '/datalist/bootstrap-4-grid');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap4Tiled(): void
    {
        self::$client->request('GET', '/datalist/bootstrap-4-tiled');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap5Grid(): void
    {
        self::$client->request('GET', '/datalist/bootstrap-5-grid');
        self::assertResponseIsSuccessful();
    }

    public function testBootstrap5Tiled(): void
    {
        self::$client->request('GET', '/datalist/bootstrap-5-tiled');
        self::assertResponseIsSuccessful();
    }
}

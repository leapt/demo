<?php

declare(strict_types=1);

namespace App\Tests\Controller;

final class FormTypeControllerTest extends AbstractControllerTestCase
{
    public function testIndex(): void
    {
        self::$client->request('GET', '/form-types');
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Submit media');
        self::assertResponseRedirects('/form-types');
    }

    public function testBootstrap3(): void
    {
        self::$client->request('GET', '/form-types/bootstrap-3');
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Submit media');
        self::assertResponseRedirects('/form-types/bootstrap-3');
    }

    public function testBootstrap4(): void
    {
        self::$client->request('GET', '/form-types/bootstrap-4');
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Submit media');
        self::assertResponseRedirects('/form-types/bootstrap-4');
    }

    public function testBootstrap5(): void
    {
        self::$client->request('GET', '/form-types/bootstrap-5');
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Submit media');
        self::assertResponseRedirects('/form-types/bootstrap-5');
    }
}

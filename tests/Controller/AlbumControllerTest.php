<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use App\Factory\AlbumFactory;

final class AlbumControllerTest extends AbstractControllerTestCase
{
    public function testIndex(): void
    {
        self::$client->request('GET', '/album');
        self::assertResponseIsSuccessful();
    }

    public function testCreate(): void
    {
        self::$client->request('GET', '/album/create');
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Create the album');
        self::assertResponseStatusCodeSame(422);

        self::$client->submitForm('Create the album', ['album' => [
            'name' => 'Test album',
        ]]);
        self::assertResponseRedirects('/album');
    }

    public function testUpdate(): void
    {
        self::$client->request('GET', '/album/update/100');
        self::assertResponseStatusCodeSame(404);

        $album = AlbumFactory::createOne();
        self::$client->request('GET', '/album/update/' . $album->getId());
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Update the album', ['album' => [
            'name' => '',
        ]]);
        self::assertResponseStatusCodeSame(422);

        self::$client->submitForm('Update the album', ['album' => [
            'name' => 'Test album',
        ]]);
        self::assertResponseRedirects('/album');
    }

    public function testDelete(): void
    {
        self::$client->request('GET', '/album/delete/100');
        self::assertResponseStatusCodeSame(404);

        $album = AlbumFactory::createOne();
        self::$client->request('GET', '/album/delete/' . $album->getId());
        self::assertResponseRedirects('/album');
    }
}

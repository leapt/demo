<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use App\Factory\GalleryFactory;

final class GalleryControllerTest extends AbstractControllerTestCase
{
    public function testIndex(): void
    {
        self::$client->request('GET', '/gallery');
        self::assertResponseIsSuccessful();
    }

    public function testCreate(): void
    {
        self::$client->request('GET', '/gallery/create');
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Create gallery');
        self::assertResponseStatusCodeSame(422);

        self::$client->submitForm('Create gallery', ['gallery' => [
            'title' => 'Test gallery',
        ]]);
        self::assertResponseRedirects('/gallery');
    }

    public function testUpdate(): void
    {
        self::$client->request('GET', '/gallery/update/100');
        self::assertResponseStatusCodeSame(404);

        $gallery = GalleryFactory::createOne();
        self::$client->request('GET', '/gallery/update/' . $gallery->getId());
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Update gallery', ['gallery' => [
            'title' => '',
        ]]);
        self::assertResponseStatusCodeSame(422);

        self::$client->submitForm('Update gallery', ['gallery' => [
            'title' => 'Test gallery',
        ]]);
        self::assertResponseRedirects('/gallery');
    }

    public function testDelete(): void
    {
        self::$client->request('GET', '/gallery/delete/100');
        self::assertResponseStatusCodeSame(404);

        $gallery = GalleryFactory::createOne();
        self::$client->request('GET', '/gallery/delete/' . $gallery->getId());
        self::assertResponseRedirects('/gallery');
    }
}

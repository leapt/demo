<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use App\Factory\CategoryFactory;
use App\Factory\NewsFactory;

final class NewsControllerTest extends AbstractControllerTestCase
{
    public function testView(): void
    {
        self::$client->request('GET', '/news/unknown');
        self::assertResponseStatusCodeSame(404);

        CategoryFactory::createOne();
        $news = NewsFactory::createOne();
        self::$client->request('GET', '/news/' . $news->getSlug());
        self::assertResponseIsSuccessful();
    }

    public function testUpdate(): void
    {
        self::$client->request('GET', '/news/update/100');
        self::assertResponseStatusCodeSame(404);

        CategoryFactory::createOne();
        $news = NewsFactory::createOne();
        self::$client->request('GET', '/news/update/' . $news->getId());
        self::assertResponseIsSuccessful();

        self::$client->submitForm('Update news', ['news' => [
            'title' => '',
        ]]);
        self::assertResponseStatusCodeSame(422);

        self::$client->submitForm('Update news', ['news' => [
            'title' => 'Test news',
        ]]);
        self::assertResponseRedirects('/datalist/bootstrap-5-grid');
    }
}

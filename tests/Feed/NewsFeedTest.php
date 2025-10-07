<?php

declare(strict_types=1);

namespace App\Tests\Feed;

use App\Factory\CategoryFactory;
use App\Factory\NewsFactory;
use App\Tests\Controller\AbstractControllerTestCase;

final class NewsFeedTest extends AbstractControllerTestCase
{
    public function testRss(): void
    {
        CategoryFactory::createMany(2);
        NewsFactory::createMany(5);
        self::$client->request('GET', '/feed/news');
        self::assertResponseIsSuccessful();
        self::assertSelectorCount(5, 'channel item');
    }

    public function testAtom(): void
    {
        CategoryFactory::createMany(2);
        NewsFactory::createMany(5);
        self::$client->request('GET', '/feed/news.atom');
        self::assertResponseIsSuccessful();
        self::assertSelectorCount(5, 'entry');
    }
}

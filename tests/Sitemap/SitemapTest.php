<?php

declare(strict_types=1);

namespace App\Tests\Sitemap;

use App\Tests\Controller\AbstractControllerTestCase;

final class SitemapTest extends AbstractControllerTestCase
{
    public function testSitemap(): void
    {
        self::$client->request('GET', '/sitemap.xml');
        self::assertResponseIsSuccessful();
    }
}

<?php

declare(strict_types=1);

namespace App\Tests\Controller;

final class FroalaEditorControllerTest extends AbstractControllerTestCase
{
    public function testIndex(): void
    {
        self::$client->request('GET', '/froala-editor');
        self::assertResponseIsSuccessful();
    }
}

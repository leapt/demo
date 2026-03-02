<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Media;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Media>
 */
final class MediaFactory extends PersistentObjectFactory
{
    public static function class(): string
    {
        return Media::class;
    }

    /**
     * @return array<mixed>
     */
    protected function defaults(): array
    {
        return [];
    }
}

<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Album;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Album>
 */
final class AlbumFactory extends PersistentObjectFactory
{
    public static function class(): string
    {
        return Album::class;
    }

    /**
     * @return array{
     *     name: string,
     * }
     */
    protected function defaults(): array
    {
        return [
            'name' => self::faker()->text(),
        ];
    }
}

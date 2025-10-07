<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Gallery;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Gallery>
 */
final class GalleryFactory extends PersistentObjectFactory
{
    public static function class(): string
    {
        return Gallery::class;
    }

    /**
     * @return array{
     *     title: string,
     * }
     */
    protected function defaults(): array
    {
        return [
            'title' => self::faker()->text(),
        ];
    }
}

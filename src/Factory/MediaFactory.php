<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Media;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Media>
 *
 * @method        Media|Proxy                               create(array|callable $attributes = [])
 * @method static Media|Proxy                               createOne(array $attributes = [])
 * @method static Media|Proxy                               find(object|array|mixed $criteria)
 * @method static Media|Proxy                               findOrCreate(array $attributes)
 * @method static Media|Proxy                               first(string $sortedField = 'id')
 * @method static Media|Proxy                               last(string $sortedField = 'id')
 * @method static Media|Proxy                               random(array $attributes = [])
 * @method static Media|Proxy                               randomOrCreate(array $attributes = [])
 * @method static EntityRepository|ProxyRepositoryDecorator repository()
 * @method static Media[]|Proxy[]                           all()
 * @method static Media[]|Proxy[]                           createMany(int $number, array|callable $attributes = [])
 * @method static Media[]|Proxy[]                           createSequence(iterable|callable $sequence)
 * @method static Media[]|Proxy[]                           findBy(array $attributes)
 * @method static Media[]|Proxy[]                           randomRange(int $min, int $max, array $attributes = [])
 * @method static Media[]|Proxy[]                           randomSet(int $number, array $attributes = [])
 */
final class MediaFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Media::class;
    }

    protected function defaults(): array|callable
    {
        return [];
    }
}

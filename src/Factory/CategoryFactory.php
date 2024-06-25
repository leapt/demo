<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Category>
 *
 * @method        Category|Proxy                            create(array|callable $attributes = [])
 * @method static Category|Proxy                            createOne(array $attributes = [])
 * @method static Category|Proxy                            find(object|array|mixed $criteria)
 * @method static Category|Proxy                            findOrCreate(array $attributes)
 * @method static Category|Proxy                            first(string $sortedField = 'id')
 * @method static Category|Proxy                            last(string $sortedField = 'id')
 * @method static Category|Proxy                            random(array $attributes = [])
 * @method static Category|Proxy                            randomOrCreate(array $attributes = [])
 * @method static EntityRepository|ProxyRepositoryDecorator repository()
 * @method static Category[]|Proxy[]                        all()
 * @method static Category[]|Proxy[]                        createMany(int $number, array|callable $attributes = [])
 * @method static Category[]|Proxy[]                        createSequence(iterable|callable $sequence)
 * @method static Category[]|Proxy[]                        findBy(array $attributes)
 * @method static Category[]|Proxy[]                        randomRange(int $min, int $max, array $attributes = [])
 * @method static Category[]|Proxy[]                        randomSet(int $number, array $attributes = [])
 */
final class CategoryFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Category::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->text(),
        ];
    }
}

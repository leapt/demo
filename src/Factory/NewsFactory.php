<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Enums\Status;
use App\Entity\News;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<News>
 *
 * @method        News|Proxy                                create(array|callable $attributes = [])
 * @method static News|Proxy                                createOne(array $attributes = [])
 * @method static News|Proxy                                find(object|array|mixed $criteria)
 * @method static News|Proxy                                findOrCreate(array $attributes)
 * @method static News|Proxy                                first(string $sortedField = 'id')
 * @method static News|Proxy                                last(string $sortedField = 'id')
 * @method static News|Proxy                                random(array $attributes = [])
 * @method static News|Proxy                                randomOrCreate(array $attributes = [])
 * @method static EntityRepository|ProxyRepositoryDecorator repository()
 * @method static News[]|Proxy[]                            all()
 * @method static News[]|Proxy[]                            createMany(int $number, array|callable $attributes = [])
 * @method static News[]|Proxy[]                            createSequence(iterable|callable $sequence)
 * @method static News[]|Proxy[]                            findBy(array $attributes)
 * @method static News[]|Proxy[]                            randomRange(int $min, int $max, array $attributes = [])
 * @method static News[]|Proxy[]                            randomSet(int $number, array $attributes = [])
 */
final class NewsFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return News::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'title' => self::faker()->word(),
            'slug' => self::faker()->slug(),
            'content' => self::faker()->text(),
            'publicationDate' => self::faker()->dateTime(),
            'authorName' => self::faker()->userName(),
            'authorEmail' => self::faker()->email(),
            'category' => CategoryFactory::random(),
            'image' => self::faker()->optional(.7)->passthrough('static-files/' . self::faker()->numberBetween(1, 10) . '.jpg'),
            'status' => self::faker()->randomElement(Status::cases()),
            'active' => self::faker()->boolean(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(News $news): void {})
        ;
    }
}

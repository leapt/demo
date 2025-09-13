<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Category;
use App\Entity\Enums\Status;
use App\Entity\News;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;

/**
 * @extends PersistentProxyObjectFactory<News>
 */
final class NewsFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return News::class;
    }

    /**
     * @return array{
     *     title: string,
     *     slug: string,
     *     content: string,
     *     publicationDate: \DateTime,
     *     authorName: string,
     *     authorEmail: string,
     *     category: Category&Proxy<Category>,
     *     image: string|null,
     *     status: Status,
     *     active: bool,
     * }
     */
    protected function defaults(): array
    {
        $image = self::faker()->optional(.7)->passthrough('static-files/' . self::faker()->numberBetween(1, 10) . '.jpg');
        \assert(null === $image || \is_string($image));

        $status = self::faker()->randomElement(Status::cases());
        \assert($status instanceof Status);

        return [
            'title' => self::faker()->word(),
            'slug' => self::faker()->slug(),
            'content' => self::faker()->text(),
            'publicationDate' => self::faker()->dateTime(),
            'authorName' => self::faker()->userName(),
            'authorEmail' => self::faker()->email(),
            'category' => CategoryFactory::random(),
            'image' => $image,
            'status' => $status,
            'active' => self::faker()->boolean(),
        ];
    }
}

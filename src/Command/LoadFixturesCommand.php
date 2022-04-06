<?php

declare(strict_types=1);

namespace App\Command;

use App\Factory\CategoryFactory;
use App\Factory\NewsFactory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\When;

#[AsCommand('app:fixtures:load')]
#[When('dev'), When('test')]
final class LoadFixturesCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        CategoryFactory::createOne(['name' => 'Symfony']);
        CategoryFactory::createOne(['name' => 'PHP']);
        CategoryFactory::createOne(['name' => 'Random']);
        NewsFactory::createMany(25);

        return Command::SUCCESS;
    }
}

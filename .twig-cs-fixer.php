<?php

declare(strict_types=1);

$ruleset = new TwigCsFixer\Ruleset\Ruleset();

$ruleset->addStandard(new TwigCsFixer\Standard\TwigCsFixer());
$ruleset->addStandard(new TwigCsFixer\Standard\Symfony());
$ruleset->overrideRule(new TwigCsFixer\Rules\Punctuation\PunctuationSpacingRule(
    ['}' => 1],
    ['{' => 1],
));

$finder = new TwigCsFixer\File\Finder();
$finder->in('templates');

$config = new TwigCsFixer\Config\Config();
$config->setRuleset($ruleset);
$config->setCacheFile(__DIR__ . '/var/twig-cs-fixer.cache');
$config->allowNonFixableRules();
$config->setFinder($finder);

return $config;

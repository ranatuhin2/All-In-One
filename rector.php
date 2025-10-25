<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\CodeQuality\Rector\FuncCall\CompactToVariablesRector;
use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    ->withPhpSets(php84: true)
    ->withPreparedSets(deadCode: true, typeDeclarations: true, earlyReturn: true)
    ->withSets([
        LaravelSetList::LARAVEL_120,
    ])
    ->withRules([
        InlineConstructorDefaultToPropertyRector::class,
        DeclareStrictTypesRector::class,
        CompactToVariablesRector::class,
    ]);
